<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\activites;
use App\Models\categories;
use App\Models\entres;
use App\Models\marchandises;
use App\Models\sorties;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    public function index(Request $request)
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

        // Return the view with the categories data
        if ($request->search) {
            $search=$request->search;
            return view('categories.index', compact('categories', 'entres', 'sorties','search'));
        }else {
            return view('categories.index', compact('categories', 'entres', 'sorties'));
        }
    }

    public function index_cat()
    {
        $categories = categories::all();
        return view('categories.index_cat', compact('categories'));
    }

    public function index_mar(categories $categories)
    {
        dd($categories);
        $marchandise = marchandises::where('id_cat', '=', $categories->id)->get();

        return view('categories.index_mar', ['marchandises' => $marchandise]);
    }

    public function index_mar_acheter(entres $entre)
    {
        $mar_e = marchandises::select('marchandises.*', DB::raw('"entre" as type'), DB::raw('entres.quantite as qte '))
            ->join('entres', 'entres.id_mar', '=', 'marchandises.id')
            ->where('entres.id', $entre->id)
            ->get();

        return view('categories.index_mar', ['marchandises' => $mar_e]);
    }


    public function index_mar_vendre(sorties $sorties)
    {




        $mar_s =  marchandises::select('marchandises.*', DB::raw('"sortie" as type'), DB::raw('sorties.quantite as qte '))
            ->join('sorties', 'sorties.id_mar', '=', 'marchandises.id')
            ->where('sorties.id', $sorties->id)
            ->get();


        return view('categories.index_mar', ['marchandises' => $mar_s]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|min:3|string|unique:categories,nom',
        ]);
        if (stristr($validatedData['nom'], 'Autre')) {
            return redirect()->back()->with('error', 'choisi un autre nom');
        }
        $categorie = new Categories();
        $categorie->nom = $validatedData['nom'];
        $categorie->save();
        $activite = new activites;
        $activite->id_adm = auth()->user()->id;
        $activite->nom_activite = "ajout d'une marchandises " . $categorie->nom;
        $activite->type = 'ajout';
        $activite->save();

        return redirect()->route('marchandises.index_cat')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function edit(categories $categories)
    {
        return view('categories.edit', ['categorie' => $categories]);
    }

    public function update(Request $request, Categories $categorie)
    {
        $validatedData = $request->validate([
            'nom' => 'required|min:3|string|unique:categories,nom' . $categorie->id,
        ]);
        if (stristr($validatedData['nom'], 'Autre')) {
            return redirect()->back()->with('error', 'choisi un autre nom');
        }
        $categorie->nom = $validatedData['nom'];
        $categorie->save();
        $activite = new activites;
        $activite->id_adm = auth()->user()->id;
        $activite->nom_activite = "modification d'une categorie " . $categorie->nom;
        $activite->type = 'modif';
        $activite->save();

        return redirect()->route('marchandises.index_cat')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function entre_sortie(Request $request, categories $categories)
    {
        if ($request->input('search')) {

            $search = $request->input('search');
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->concat($sorties);
        
                // Trier toutes les données ensemble par date de document en ordre décroissant
                $tous = $tous->sort(function ($a, $b) {
                    $comp = strcmp($b->created_at, $a->created_at); // Tri décroissant par 'created_at'
                    if ($comp === 0) {
                        return strcmp($b->created_at, $a->created_at); // Si égaux, tri décroissant par 'created_at'
                    }
                    return $comp;
                });
                // Récupérer les entres en ajoutant une colonne 'type' avec la valeur 'entre'
        
                // Retourner la vue avec toutes les données nécessaires
                return view('categories.entre_sortie', [
                    'categories' => $categories,
                    'tous' => $tous,
                    'entres' => $entres,
                    'sorties' => $sorties,
                    'search'=>$search
                ]);
        } else {
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->orderBy('sorties.created_at', 'desc')
                ->get();

            // Fusionner les collections d'entres et de sorties

            $tous = $entres->concat($sorties);
    
            // Trier toutes les données ensemble par date de document en ordre décroissant
            $tous = $tous->sort(function ($a, $b) {
                $comp = strcmp($b->created_at, $a->created_at); // Tri décroissant par 'created_at'
                if ($comp === 0) {
                    return strcmp($b->created_at, $a->created_at); // Si égaux, tri décroissant par 'created_at'
                }
                return $comp;
            });
            // Récupérer les entres en ajoutant une colonne 'type' avec la valeur 'entre'
    
            // Retourner la vue avec toutes les données nécessaires
            return view('categories.entre_sortie', [
                'categories' => $categories,
                'tous' => $tous,
                'entres' => $entres,
                'sorties' => $sorties
            ]);
        }
    }

    public function entre(Request $request, categories $categories)
    {

        if ($request->input('search')) {

            $search = $request->input('search');
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->merge($sorties);
                $tous = $tous->sortByDesc('created_at');
        
                return view('categories.entre', ['categories' => $categories, 'tous' => $tous, 'entres' => $entres, 'sorties' => $sorties,'search'=>$search]);
        } else {
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->orderBy('sorties.created_at', 'desc')
                ->get();

            // Fusionner les collections d'entres et de sorties

            $tous = $entres->merge($sorties);
            $tous = $tous->sortByDesc('created_at');
    
            return view('categories.entre', ['categories' => $categories, 'tous' => $tous, 'entres' => $entres, 'sorties' => $sorties]);
        }

    }
    public function sortie(Request $request, categories $categories)
    {

        if ($request->input('search')) {

            $search = $request->input('search');
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->merge($sorties);
                $tous = $tous->sortByDesc('created_at');
        
                return view('categories.sortie', ['categories' => $categories, 'tous' => $tous, 'entres' => $entres, 'sorties' => $sorties,'search'=>$search]);
        } else {
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', $categories->id)
                ->orderBy('sorties.created_at', 'desc')
                ->get();

            // Fusionner les collections d'entres et de sorties

            $tous = $entres->merge($sorties);
            $tous = $tous->sortByDesc('created_at');
    
            return view('categories.sortie', ['categories' => $categories, 'tous' => $tous, 'entres' => $entres, 'sorties' => $sorties]);
        }

    }

    public function entre_sortie_A(Request $request)
    {
        if ($request->input('search')) {

            $search = $request->input('search');
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->concat($sorties);
        
                // Trier toutes les données ensemble par date de document en ordre décroissant
                $tous = $tous->sort(function ($a, $b) {
                    $comp = strcmp($b->created_at, $a->created_at); // Tri décroissant par 'created_at'
                    if ($comp === 0) {
                        return strcmp($b->created_at, $a->created_at); // Si égaux, tri décroissant par 'created_at'
                    }
                    return $comp;
                });
        
                // Retourner la vue avec toutes les données nécessaires
                return view('categories.entre_sortie', [
        
                    'tous' => $tous,
                    'entres' => $entres,
                    'sorties' => $sorties,
                    'search'=>$search
                ]);
        } else {
            // Récupérer les entres en ajoutant une colonne 'type' avec la valeur 'entre'
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->concat($sorties);
        
                // Trier toutes les données ensemble par date de document en ordre décroissant
                $tous = $tous->sort(function ($a, $b) {
                    $comp = strcmp($b->created_at, $a->created_at); // Tri décroissant par 'created_at'
                    if ($comp === 0) {
                        return strcmp($b->created_at, $a->created_at); // Si égaux, tri décroissant par 'created_at'
                    }
                    return $comp;
                });
        
                // Retourner la vue avec toutes les données nécessaires
                return view('categories.entre_sortie', [
        
                    'tous' => $tous,
                    'entres' => $entres,
                    'sorties' => $sorties
                ]);
        }
        // Fusionner les collections d'entres et de sorties
    }

    public function entre_A(Request $request)
    {

        if ($request->input('search')) {

            $search = $request->input('search');
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->merge($sorties);
                $tous = $tous->sortByDesc('created_at');
        
                return view('categories.entre', ['tous' => $tous, 'entres' => $entres, 'sorties' => $sorties,'search'=>$search]);
        } else {
            // Récupérer les entres en ajoutant une colonne 'type' avec la valeur 'entre'
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->merge($sorties);
                $tous = $tous->sortByDesc('created_at');
        
                return view('categories.entre', ['tous' => $tous, 'entres' => $entres, 'sorties' => $sorties]);
        }

    }
    public function sortie_A(Request $request)
    {

        if ($request->input('search')) {

            $search = $request->input('search');
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->merge($sorties);
        $tous = $tous->sortByDesc('created_at');

        return view('categories.sortie', ['tous' => $tous, 'entres' => $entres, 'sorties' => $sorties,'search'=>$search]);
        } else {
            // Récupérer les entres en ajoutant une colonne 'type' avec la valeur 'entre'
            $entres = entres::select('entres.*', 'marchandises.nom as nom', DB::raw('"entre" as type'))
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->orderBy('entres.created_at', 'desc')
                ->get();

            // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom', DB::raw('"sortie" as type'))
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->where('marchandises.id_cat', '=', null)
                ->orderBy('sorties.created_at', 'desc')
                ->get();
                $tous = $entres->merge($sorties);
        $tous = $tous->sortByDesc('created_at');

        return view('categories.sortie', ['tous' => $tous, 'entres' => $entres, 'sorties' => $sorties]);
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
        $categorie = categories::find($request->id);
        $activite = new activites;
        $activite->id_adm = auth()->user()->id;
        $activite->nom_activite = "suppression d'une categorie " . $categorie->nom;
        $activite->type = 'suppression';
        $activite->save();
        $categorie->delete();
        return redirect()->back()->with('success', 'Catégorie supprimée avec succès.');
    }
}
