<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\activites;
use App\Models\categories;
use App\Models\marchandises;
use App\Models\rapport;
use App\Models\sorties;
use DateTime;
use Illuminate\Http\Request;

class sortieController extends Controller
{
    public function index() {
        $sorties = sorties::all();
        return view('sorties.index', compact('sorties'));
    }

    public function create() {
        return view('sorties.create',['categories'=>categories::all()]);
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
                'quantite'=>'integer',
                'id_mar'=>'exists:marchandises,id'
        ]);
        $marchandises = Marchandises::find($validatedData['id_mar']);
        if ($validatedData['quantite']<0) {
            return redirect()->back()->with('error', 'la quantite doit être positive.');
        }
        if ($validatedData['quantite'] > $marchandises->quantite) {
            return redirect()->back()->with('error','La quantité demandée dépasse la quantité disponible.');
        }
        $sortie = new sorties(); 
       $sortie->quantite=$validatedData['quantite'];
       $sortie->id_mar=$validatedData['id_mar'];
       $marchandises->quantite=$marchandises->quantite-$validatedData['quantite'];
       $marchandises->save();
        $sortie->save();
        $rapports=rapport::all();
        $found = false; 
        foreach ($rapports as $rapport) {
            $rapportDate = (new DateTime($rapport->date))->format('Y-m-d');
                $sortieDate = (new DateTime($sortie->created_at))->format('Y-m-d');

                if ($rapportDate == $sortieDate) {
                $rapport->quantite -= $sortie->quantite;
                $rapport->save();
                $found = true;
                break;
            }
        }

        if (!$found) {
            $rapport = new Rapport();
            $rapport->date = $sortie->created_at;
            $rapport->quantite -= $sortie->quantite;
            $rapport->save();
        }
        $activite=new activites;
        $activite->id_adm=auth()->user()->id;
        $activite->nom_activite="ajouter une sortie de $sortie->quantite $marchandises->nom";
        $activite->save();
        return redirect()->back()->with('success', 'sortie crée avec success.');
    }

    public function storescan(Request $request) {
        // Validation des données de la requête
        $validatedData = $request->validate([
            'quantite' => 'required|integer',
            'id_mar' => 'required|exists:marchandises,id'
        ]);
    
        // Trouver la marchandise correspondante
        $marchandises = Marchandises::find($validatedData['id_mar']);
        
        // Vérifier que la quantité est positive
        if ($validatedData['quantite'] < 0) {
            return response()->json(['error' => 'La quantité doit être positive.'], 400);
        }
    
        // Vérifier que la quantité demandée ne dépasse pas la quantité disponible
        if ($validatedData['quantite'] > $marchandises->quantite) {
            return response()->json(['error' => 'La quantité demandée dépasse la quantité disponible.'], 400);
        }
    
        // Créer une nouvelle sortie
        $sortie = new Sorties();
        $sortie->quantite = $validatedData['quantite'];
        $sortie->id_mar = $validatedData['id_mar'];
    
        // Mettre à jour la quantité de la marchandise
        $marchandises->quantite -= $validatedData['quantite'];
        $marchandises->save();
    
        // Sauvegarder la nouvelle sortie
        $sortie->save();
    
        // Mettre à jour ou créer un nouveau rapport basé sur la date
        $rapports = Rapport::all();
        $found = false;
        foreach ($rapports as $rapport) {
            $rapportDate = (new DateTime($rapport->date))->format('Y-m-d');
            $sortieDate = (new DateTime($sortie->created_at))->format('Y-m-d');
    
            if ($rapportDate == $sortieDate) {
                $rapport->quantite -= $sortie->quantite;
                $rapport->save();
                $found = true;
                break;
            }
        }
    
        if (!$found) {
            $rapport = new Rapport();
            $rapport->date = $sortie->created_at;
            $rapport->quantite = -$sortie->quantite; // Set to negative because it's a sortie
            $rapport->save();
        }
    
        // Retourner une réponse JSON
        return response()->json([
            'success' => true,
            'message' => 'Sortie créée avec succès.',
            'sortie' => $sortie,
            'marchandises' => $marchandises,
            'rapport' => $rapport
        ], 201);
    }
    

    public function vendre(sorties $sorties, categories $categories ){
        $marchandises = $marchandises=marchandises::where('id_cat','=',$categories->id)->get();
        return view('sorties.index_mar',['sorties'=>$sorties,'marchandises'=>$marchandises]);
    }
    

    public function edit(sorties $sorties)
    {
        return view('sorties.edit', ['sortie' => $sorties]);
    }
    
    public function update(Request $request,sorties $sortie )
    {
        $validatedData = $request->validate([
            'quantite'=>'integer',
            'id_mar'=>'exists:marchandises,id'
    ]);
    $sortie = new sorties(); 
   $sortie->quantite=$validatedData['quantite'];
   $sortie->id_mar=$validatedData['id_mar'];
    $sortie->save();

    return redirect()->back()->with('success');
    }

    public function delete(Request $request) {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        $request->validateWithBag('userDeletion', [
            'current_password' => ['required', 'current_password'],
        ]);
        $sortie = sorties::find($request->id);
        if(empty($sortie)){
            return redirect()->back()->with('error', 'Sortier  introuvable.');
        }
        $marchandises=marchandises::find($sortie->id_mar);
            $marchandises->quantite=$marchandises->quantite+$sortie->quantite;
            $marchandises->save();
            $rapports=rapport::all(); 
        foreach ($rapports as $rapport) {
            $rapportDate = (new DateTime($rapport->date))->format('Y-m-d');
                $sortieDate = (new DateTime($sortie->created_at))->format('Y-m-d');

                if ($rapportDate == $sortieDate) {
                $rapport->quantite += $sortie->quantite;
                $rapport->save();
                $found = true;
                break;
            }
        }
               $sortie->delete();

               return redirect()->back();
   }
}
