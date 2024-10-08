<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\activites;
use App\Models\categories;
use App\Models\entres;
use App\Models\marchandises;
use App\Models\rapport;
use App\Models\sorties;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class marchandiseController extends Controller
{

    public function index_cat(Request $request)
    {
        // Retrieve all categories
        if ($request->search) {
            $categories = categories::where('nom', 'like', '%' . $request->search . '%')->paginate(8);
        }else {
            $categories = categories::paginate(8);
        }

        // Fetch total 'entres' (purchases) grouped by category ID
        $entres = marchandises::select('categories.id', DB::raw('COALESCE(SUM(marchandises.quantite), 0) as total_achetes'))
            ->join('categories', 'categories.id', '=', 'marchandises.id_cat')
            ->groupBy('categories.id')
            ->pluck('total_achetes', 'categories.id');

        // Fetch total 'sorties' (sales) grouped by category ID
        $sorties = marchandises::select('categories.id', DB::raw('COALESCE(SUM(sorties.quantite), 0) as total_vendus'))
            ->leftJoin('sorties', 'sorties.id_mar', '=', 'marchandises.id')
            ->join('categories', 'categories.id', '=', 'marchandises.id_cat')
            ->groupBy('categories.id')
            ->pluck('total_vendus', 'categories.id');

        // Combine 'entres' and 'sorties' with categories
        foreach ($categories as $category) {
            $category->total_achetes = $entres[$category->id] ?? 0;
            $category->total_vendus = $sorties[$category->id] ?? 0;
        }

        $entres = marchandises::select(DB::raw('COALESCE(SUM(marchandises.quantite), 0) as total_achetes'))
            ->where('marchandises.id_cat', '=', null)
            ->first();

        $entres = $entres->total_achetes;

        // Fetch total 'sorties' (sales) grouped by category ID
        $sorties = marchandises::select(DB::raw('COALESCE(SUM(sorties.quantite), 0) as total_vendus'))
            ->leftJoin('sorties', 'sorties.id_mar', '=', 'marchandises.id')
            ->where('marchandises.id_cat', '=', null)->first();
        $sorties = $sorties->total_vendus;
        // Return the view with the categories data
        if ($request->search) {
            $search=$request->search;
            return view('marchandises.index_cat', ['categories' => $categories, 'entres' => $entres, 'sorties' => $sorties,'search'=>$search]);
        }else {
            return view('marchandises.index_cat', ['categories' => $categories, 'entres' => $entres, 'sorties' => $sorties]);
        }
    }
    public function index(categories $categories)
    {
        $marchandise = marchandises::where('id_cat', '=', $categories->id)->paginate(10)->withQueryString();
        return view('marchandises.index', ['marchandises' => $marchandise, 'categories' => $categories]);
    }
    public function search(Request $request, categories $categories)
    {
        if ($request->input('search')) {

            $search = $request->input('search');
            $marchandise = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->select('marchandises.*')
                ->paginate(10)->withQueryString();
            return view('marchandises.index', ['marchandises' => $marchandise, 'categories' => $categories, 'search' => $search]);
        } else {
            $marchandise = marchandises::where('id_cat', '=', $categories->id)->paginate(10)->withQueryString();
            return view('marchandises.index', ['marchandises' => $marchandise, 'categories' => $categories]);
        }
    }
    public function search_Autre(Request $request)
    {
        if ($request->input('search')) {
            $search = $request->input('search');
            $marchandise = marchandises::where('id_cat', '=', null)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->select('marchandises.*')
                ->paginate(10)->withQueryString();
            return view('marchandises.index_autre', ['marchandises' => $marchandise, 'search' => $search]);
        } else {
            $marchandise = marchandises::where('id_cat', '=', null)->paginate(10)->withQueryString();
            return view('marchandises.index_autre', ['marchandises' => $marchandise]);
        }
    }
    public function Autre()
    {
        $marchandise = marchandises::where('id_cat', '=', null)->paginate(10)->withQueryString();
        return view('marchandises.index_autre', ['marchandises' => $marchandise]);
    }

    public function getMarchandiseInfo(string $mar)
    {



        $mars = Marchandises::find($mar);
        if ($mars) {
            return view('scanner.mar', ['marchandise' => $mars]);
        }

        return abort(404);
    }
    public function getMarchandiseBare(string $mar)
    {



        $mars = Marchandises::select('marchandises.*')->where('barecode', '=', $mar)->first();
        if ($mars) {
            return view('scanner.mar', ['marchandise' => $mars]);
        }

        return redirect()->back()->with('warning', $mar);
    }

    public function create()
    {
        return view('marchandises.create', ['categorie' => categories::all()]);
    }
    public function create_bar(Request $request)
    {
        $request->validate([
            'barecode' => 'required|numeric',
        ]);
        $barecode = $request->barecode;
        return view('marchandises.create_bar', ['categorie' => categories::all(), 'barecode' => $barecode]);
    }
    public function create_cat(categories $categories)
    {
        return view('marchandises.create', ['categorie' => categories::all(), 'category' => $categories]);
    }
    public function store(Request $request)
    {
        // Valider les données d'entrée

        $valid = $request->validate([
            'nom' => 'required|min:3|string|unique:marchandises,nom',
            'barecode' => 'nullable|numeric|unique:marchandises,barecode',
            'description' => 'string|nullable',
            'quantite' => 'integer|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'categorie' => 'required',

        ]);


        if (strstr($valid['categorie'], 'add')) {
            $valid2 = $request->validate([
                'new_categorie' => 'required|string|min:3',
                'nom' => 'required|min:3|string|unique:marchandises,nom',
            ]);
            if (stristr($valid2['nom'], 'Autre')) {
                return redirect()->back()->with('error', 'choisie un autre nom de categorie');
            }
            $categorie = new Categories();
            $categorie->nom = $valid2['new_categorie'];
            $categorie->save();
            $valid['categorie'] = $categorie->id;
        } else {
            $categorie = $valid['categorie'];
        }


        $marchandise = new marchandises();
        $marchandise->nom = $valid['nom'];
        $marchandise->barecode = $valid['barecode'];

        $marchandise->description = $valid['description'];

        if ($valid['quantite'] < 0) {
            return redirect()->back()->with('error', 'la quantite doit être positive.');
        }
        $marchandise->quantite = $valid['quantite'];

        

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
        
            $image_name = time() . '_' . $image->getClientOriginalName();
            $path = 'logos/' . $image_name;
        
            // Create an image instance, orientate, resize, and save it in storage
            $img = Image::make($image->getRealPath())->orientate()->resize(200, 200);
        
            // Compress the image by reducing its quality (e.g., 75 out of 100)
            $img->stream(null, 25); // The second parameter is the quality (0-100)
        
            // Save the image in storage/app/public/logos
            Storage::disk('public')->put($path, $img->__toString());
        
            // Save the relative path for the model
            $marchandise->image = $path;
        }
        if ($valid['categorie'] == 0) {
            $marchandise->id_cat = null;
        } else {
            $marchandise->id_cat = $valid['categorie'];
        }

        try {
            $marchandise->save();
            if ($valid['quantite'] > 0) {
                $entre = new entres();
                $entre->quantite = $valid['quantite'];
                $entre->id_mar = $marchandise->id;
                $entre->save();
                $rapports = rapport::all();
                $found = false;
                foreach ($rapports as $rapport) {
                    $rapportDate = (new DateTime($rapport->date))->format('Y-m-d');
                    $entreDate = (new DateTime($entre->created_at))->format('Y-m-d');

                    if ($rapportDate == $entreDate) {
                        $rapport->quantite += $entre->quantite;
                        $rapport->save();
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $rapport = new Rapport();
                    $rapport->date = $entre->created_at;
                    $rapport->quantite = $entre->quantite;
                    $rapport->save();
                }
            }
            $activite = new activites;
            $activite->id_adm = auth()->user()->id;
            if ($marchandise->categories) {
                $activite->nom_activite = "ajouter une marchandises : $marchandise->nom dans " . $marchandise->categories->nom;
                $activite->type = 'ajout';
                $activite->save();

                return redirect()->route('marchandises.index', $categorie)->with('success', 'Marchandise ajoutée avec succès.');
            } else {
                $activite->nom_activite = "ajouter une marchandises : $marchandise->nom ";
                $activite->type = 'ajout';
                $activite->save();

                return redirect()->route('marchandises.Autre')->with('success', 'Marchandise ajoutée avec succès.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit(marchandises $marchandises)
    {
        return View('marchandises.edit', ['marchandise' => $marchandises, 'categorie' => categories::all()]);
    }

    public function update(Request $request, marchandises $marchandise)
    {
        $valid = $request->validate([
            'nom' => 'required|min:3|string|unique:marchandises,nom,' . $marchandise->id,
            'description' => 'string|nullable',
            'barecode' => 'nullable|numeric|unique:marchandises,barecode,' . $marchandise->id,
            'quantite' => 'integer|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'categorie' => 'required',
            
        ]);




        if (strstr($valid['categorie'], 'add')) {
            $valid2 = $request->validate([
                'new_categorie' => 'required|string|min:3',
                'nom' => 'required|min:3|string|unique:marchandises,nom',
            ]);
            if (stristr($valid2['nom'], 'Autre')) {
                return redirect()->back()->with('error', 'choisie un autre nom de categorie');
            }
            $categorie = new Categories();
            $categorie->nom = $valid2['new_categorie'];
            $categorie->save();
            $valid['categorie'] = $categorie->id;
        } else {
            $categorie = $valid['categorie'];
        }
        $marchandise->nom = $valid['nom'];
        $marchandise->barecode = $valid['barecode'];
        $marchandise->quantite = $valid['quantite'];
        $marchandise->description = $valid['description'];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
        
            $image_name = time() . '_' . $image->getClientOriginalName();
            $path = 'logos/' . $image_name;
        
            // Create an image instance and orientate
            $img = Image::make($image->getRealPath())->orientate();
        
            // Compress the image by reducing its quality (e.g., 75 out of 100)
            if($image->getSize() > 8 * 1000 * 1000){
                $img->stream(null, 10); // The second parameter is the quality (0-100)

            }elseif ($image->getSize() > 5 * 1000 * 1000) {
                $img->stream(null, 25); // The second parameter is the quality (0-100)
            }elseif($image->getSize() > 2 * 1000 * 1000) {
                $img->stream(null, 50); // The second parameter is the quality (0-100)
            }else{
                $img->stream(null, 75); // The second parameter is the quality (0-100)
            }
        
            // Save the image in storage/app/public/logos
            Storage::disk('public')->put($path, $img->__toString());
        
            // Save the relative path for the model
            $marchandise->image = $path;
        }

        if ($valid['categorie'] == 0) {
            $marchandise->id_cat = null;
        } else {
            $marchandise->id_cat = $valid['categorie'];
        }
        $marchandise->save();

        $activite = new activites;
        $activite->id_adm = auth()->user()->id;
        if ($marchandise->categories) {
            $activite->nom_activite = "modifier une marchandises : $marchandise->nom dans " . $marchandise->categories->nom;
            $activite->type = 'modif';
            $activite->save();

            return redirect()->route('marchandises.index', $categorie)->with('success', 'Marchandise ajoutée avec succès.');
        } else {
            $activite->nom_activite = "modifier une marchandises : $marchandise->nom ";
            $activite->type = 'modif';
            $activite->save();

            return redirect()->route('marchandises.Autre')->with('success', 'Marchandise ajoutée avec succès.');
        }
    }

    public function delete(Request $request)
    {

        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        $request->validateWithBag('userDeletion', [
            'current_password' => ['required', 'current_password'],
        ]);
        $marchandise = marchandises::find($request->id);
        $entres = entres::where('id_mar', '=', $marchandise->id)->get();
        $sorties = sorties::where('id_mar', '=', $marchandise->id)->get();
        foreach ($entres as $entre) {
            $rapports = rapport::all();
            foreach ($rapports as $rapport) {
                $rapportDate = (new DateTime($rapport->date))->format('Y-m-d');
                $entreDate = (new DateTime($entre->created_at))->format('Y-m-d');

                if ($rapportDate == $entreDate) {
                    $rapport->quantite -= $entre->quantite;
                    $rapport->save();
                    break;
                }
            }
        }
        foreach ($sorties as $sortie) {
            $rapports = rapport::all();
            foreach ($rapports as $rapport) {
                $rapportDate = (new DateTime($rapport->date))->format('Y-m-d');
                $sortieDate = (new DateTime($sortie->created_at))->format('Y-m-d');

                if ($rapportDate == $sortieDate) {
                    $rapport->quantite += $sortie->quantite;
                    $rapport->save();
                    break;
                }
            }
        }
        $activite = new activites;
        $activite->id_adm = auth()->user()->id;
        if ($marchandise->categories) {
            $activite->nom_activite = "suppression d'une marchandises $marchandise->nom  dans " . $marchandise->categories->nom;
        } else {
            $activite->nom_activite = "suppression d'une marchandises $marchandise->nom ";
        }

        $activite->type = 'suppression';
        $activite->save();
        $marchandise->delete();
        return redirect()->back()->with('success', 'marchandise supprimer  avec success');
    }
}
