<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\acheters;
use App\Models\activites;
use App\Models\categories;
use App\Models\entres;
use App\Models\fournisseurs;
use App\Models\marchandises;
use App\Models\rapport;
use DateTime;
use Illuminate\Http\Request;

class entreController extends Controller
{

    public function store(Request $request) {
        $validatedData = $request->validate([
                'quantite'=>'integer',
                'id_mar'=>'exists:marchandises,id'
        ]);
        if ($validatedData['quantite']<0) {
            return redirect()->back()->with('error', 'la quantite doit être positive.');
        }
        $entre = new entres(); 
       $entre->quantite=$validatedData['quantite'];
       $entre->id_mar=$validatedData['id_mar'];
       $marchandises=marchandises::find($validatedData['id_mar']);
       $marchandises->quantite=$marchandises->quantite+$validatedData['quantite'];
       $marchandises->save();
        $entre->save();
        $rapports=rapport::all();
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

        $activite=new activites;
        $activite->id_adm=auth()->user()->id;
        $activite->nom_activite="ajouter une entré de $entre->quantite dans ".$marchandises->nom."de".$marchandises->categories->nom;
        $activite->save();
        
        return redirect()->back()->with('success', 'Entrée  crée avec success.');
    }

    public function storescan(Request $request) {
        // Validation des données de la requête
        $validatedData = $request->validate([
            'quantite' => 'required|integer',
            'id_mar' => 'required|exists:marchandises,id'
        ]);
    
        // Vérifier que la quantité est positive
        if ($validatedData['quantite'] < 0) {
            return response()->json(['error' => 'La quantité doit être positive.'], 400);
        }
    
        // Créer une nouvelle entrée
        $entre = new Entres();
        $entre->quantite = $validatedData['quantite'];
        $entre->id_mar = $validatedData['id_mar'];
        
        // Mettre à jour la quantité de la marchandise
        $marchandises = Marchandises::find($validatedData['id_mar']);
        $marchandises->quantite += $validatedData['quantite'];
        $marchandises->save();
        
        // Sauvegarder la nouvelle entrée
        $entre->save();
    
        // Mettre à jour ou créer un nouveau rapport basé sur la date
        $rapports = Rapport::all();
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
    
        // Retourner une réponse JSON
        return response()->json([
            'success' => true,
            'message' => 'Entrée créée avec succès.',
            'entre' => $entre,
            'marchandises' => $marchandises,
            'rapport' => $rapport
        ], 201);
    }
    
    
    
    
    public function acheter(entres $entres, categories $categories ){
        $marchandises = $marchandises=marchandises::where('id_cat','=',$categories->id)->get();
        return view('entres.index_mar',['entres'=>$entres,'marchandises'=>$marchandises]);
    }

    public function edit(entres $entres)
    {
        return view('entres.edit', ['entre' => $entres]);
    }
    
    public function update(Request $request,entres $entre )
    {
                $validatedData = $request->validate([
                    'quantite'=>'integer',
                    'id_mar'=>'exists:marchandises,id'
                ]); 
                $entre->quantite=$validatedData['quantite'];
                $entre->id_mar=$validatedData['id_mar'];
                $entre->save();

            return redirect()->back()->with('success');
        
    }

    public function delete(Request $request) {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        $request->validateWithBag('userDeletion', [
            'current_password' => ['required', 'current_password'],
        ]);
        $entre=entres::find($request->id);
            if(empty($entre)){
                return redirect()->back()->with('error', 'Entrée  introuvable.');
            }
            $marchandises=marchandises::find($entre->id_mar);
            if ($marchandises->quantite<$entre->quantite) {
                return redirect()->back()->with('error', 'votre stock n\'est pas suffisant');
            }
            $marchandises->quantite=$marchandises->quantite-$entre->quantite;
            $marchandises->save();
            $rapports=rapport::all();
            foreach ($rapports as $rapport) {
                $rapportDate = (new DateTime($rapport->date))->format('Y-m-d');
                    $entreDate = (new DateTime($entre->created_at))->format('Y-m-d');
    
                    if ($rapportDate == $entreDate) {
                        $rapport->quantite -= $entre->quantite;
                        $rapport->save();
                        break;
                }
            }
               $entre->delete();
            

           return redirect()->back();
   }
}
