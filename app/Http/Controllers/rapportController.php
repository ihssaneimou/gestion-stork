<?php

namespace App\Http\Controllers;

use App\Exports\MarchendiseDataExport;
use App\Http\Controllers\Controller;


use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\categories;
use App\Models\entres;
use App\Models\marchandises;
use App\Models\sorties;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;


class RapportController extends Controller
{


    public function downloadPdf(Request $request)
    {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        // Fetch the data to be passed to the view
        $search = $request->input('search');
        $start = $request->input('start');
        $end = $request->input('end');
        if ($search !== null && (empty($start) && empty($end))) {
            $marchandises = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orWhere('categories.nom', 'LIKE', '%' . $search . '%')
                ->select('marchandises.*')
                ->get();
            $entres = entres::select('marchandises.id', DB::raw('COALESCE(SUM(entres.quantite), 0) as entre'))
                ->leftJoin('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id')
                ->pluck('entre', 'marchandises.id');

            $sorties = sorties::select('marchandises.id', DB::raw('COALESCE(SUM(sorties.quantite), 0) as sortie'))
                ->leftJoin('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id')
                ->pluck('sortie', 'marchandises.id');
            foreach ($marchandises as $marchandise) {
                $marchandise->entres = $entres[$marchandise->id] ?? 0;
                $marchandise->sorties = $sorties[$marchandise->id] ?? 0;
                $marchandise->solde = $marchandise->entres - $marchandise->sorties;
            }
        } elseif (!empty($start) && !empty($end)) {
            $query = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->select('marchandises.*');

            if (isset($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                        ->orWhere('categories.nom', 'LIKE', '%' . $search . '%');
                });
            }

            $marchandises = $query->get();

            // Initialize the 'entres' and 'sorties' queries
            $entresQuery = entres::select('marchandises.id', DB::raw('COALESCE(SUM(entres.quantite), 0) as entre'))
                ->leftJoin('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id');

            $sortiesQuery = sorties::select('marchandises.id', DB::raw('COALESCE(SUM(sorties.quantite), 0) as sortie'))
                ->leftJoin('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id');

            if ($start == $end) {
                // If start and end dates are the same, use a single date comparison
                $entresQuery->whereDate('entres.created_at', $start);
                $sortiesQuery->whereDate('sorties.created_at', $start);
            } else {
                // Otherwise, use the range comparison
                $entresQuery->whereBetween('entres.created_at', [$start, $end]);
                $sortiesQuery->whereBetween('sorties.created_at', [$start, $end]);
            }


            $entres = $entresQuery->pluck('entre', 'marchandises.id');
            $sorties = $sortiesQuery->pluck('sortie', 'marchandises.id');

            foreach ($marchandises as $marchandise) {
                $marchandise->entres = $entres[$marchandise->id] ?? 0;
                $marchandise->sorties = $sorties[$marchandise->id] ?? 0;
                $marchandise->solde = $marchandise->entres - $marchandise->sorties;
            }
        } else {
            $marchandises = marchandises::paginate(10);
            $entres = entres::select('marchandises.id', DB::raw('COALESCE(SUM(entres.quantite), 0) as entre'))
                ->leftJoin('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id')
                ->pluck('entre', 'marchandises.id');
            $sorties = sorties::select('marchandises.id', DB::raw('COALESCE(SUM(sorties.quantite), 0) as sortie'))
                ->leftJoin('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id')
                ->pluck('sortie', 'marchandises.id');

            foreach ($marchandises as $marchandise) {
                $marchandise->entres = $entres[$marchandise->id] ?? 0;
                $marchandise->sorties = $sorties[$marchandise->id] ?? 0;
                $marchandise->solde = $marchandise->entres - $marchandise->sorties;
            }
        }
        $data = ['title' => 'Rapport PDF', 'marchandises' => $marchandises, 'start' => $start, 'end' => $end];

        // Generate the PDF
        $pdf = Pdf::loadView('rapports.pdf', $data);
        return $pdf->download('rapport.pdf');
    }

    public function downloadExcel(Request $request)
    {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        $filters = $request->only(['search', 'start', 'end']);
        return Excel::download(new MarchendiseDataExport($filters), 'marchendise.xlsx');
    }

    public function index()
    {
        $marchandises = marchandises::paginate(10);
        $entres = entres::select('marchandises.id', DB::raw('COALESCE(SUM(entres.quantite), 0) as entre'))
            ->leftJoin('marchandises', 'entres.id_mar', '=', 'marchandises.id')
            ->groupBy('marchandises.id')
            ->pluck('entre', 'marchandises.id');
        $sorties = sorties::select('marchandises.id', DB::raw('COALESCE(SUM(sorties.quantite), 0) as sortie'))
            ->leftJoin('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
            ->groupBy('marchandises.id')
            ->pluck('sortie', 'marchandises.id');

        foreach ($marchandises as $marchandise) {
            $marchandise->entres = $entres[$marchandise->id] ?? 0;
            $marchandise->sorties = $sorties[$marchandise->id] ?? 0;
            $marchandise->solde = $marchandise->entres - $marchandise->sorties;
        }
        return view('rapports.index', compact('marchandises'));
    }

    public function downloadentre(Request $request)
    {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        // Fetch the data to be passed to the view
        $search = $request->input('search');
        $start = $request->input('start');
        $end = $request->input('end');
        if ($search !== null && (empty($start) && empty($end))) {
            $marchandises = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orWhere('categories.nom', 'LIKE', '%' . $search . '%')
                ->select('marchandises.*')
                ->get();
            $marchandiseIds = $marchandises->pluck('id');
            $entres =  entres::select('entres.*', 'marchandises.nom as nom')
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->wherein('marchandises.id', $marchandiseIds)
                ->orderBy('nom')
                ->get();
        } elseif (!empty($start) && !empty($end)) {
            $query = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->select('marchandises.*');

            if (isset($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                        ->orWhere('categories.nom', 'LIKE', '%' . $search . '%');
                });
            }

            $marchandises = $query->get();
            $marchandiseIds = $marchandises->pluck('id');
            $entresQuery =  entres::select('entres.*', 'marchandises.nom as nom')
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->wherein('marchandises.id', $marchandiseIds)
                ->orderBy('nom');

            if ($start == $end) {
                // If start and end dates are the same, use a single date comparison
                $entresQuery->whereDate('entres.created_at', $start);
            } else {
                // Otherwise, use the range comparison
                $entresQuery->whereBetween('entres.created_at', [$start, $end]);
            }
            $entres = $entresQuery->get();
        } else {

            $entres = entres::select('entres.*', 'marchandises.nom as nom')
                ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->orderBy('nom')
                ->get();
        }

        // Récupérer les entrées pour chaque marchandise

        $data = [
            'title' => 'Liste des entres PDF',
            'entres' => $entres,
            'start' => $start,
            'end' => $end,
        ];


        $pdf = PDF::loadView('rapports.entre', $data);
        return $pdf->download('rapport.entre.pdf');
    }
    public function downloadsortie(Request $request)
    {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        // Fetch the data to be passed to the view
        $search = $request->input('search');
        $start = $request->input('start');
        $end = $request->input('end');
        if ($search !== null && (empty($start) && empty($end))) {
            $marchandises = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orWhere('categories.nom', 'LIKE', '%' . $search . '%')
                ->select('marchandises.*')
                ->get();
            $marchandiseIds = $marchandises->pluck('id');
            $sorties =  sorties::select('sorties.*', 'marchandises.nom as nom')
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->wherein('marchandises.id', $marchandiseIds)
                ->orderBy('nom')
                ->get();
        } elseif (!empty($start) && !empty($end)) {
            $query = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->select('marchandises.*');

            if (isset($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                        ->orWhere('categories.nom', 'LIKE', '%' . $search . '%');
                });
            }

            $marchandises = $query->get();
            $marchandiseIds = $marchandises->pluck('id');
            $sortiesQuery =  sorties::select('sorties.*', 'marchandises.nom as nom')
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->wherein('marchandises.id', $marchandiseIds)
                ->orderBy('nom');

            if ($start == $end) {
                // If start and end dates are the same, use a single date comparison
                $sortiesQuery->whereDate('sorties.created_at', $start);
            } else {
                // Otherwise, use the range comparison
                $sortiesQuery->whereBetween('sorties.created_at', [$start, $end]);
            }
            $sorties = $sortiesQuery->get();
        } else {

            $sorties = sorties::select('sorties.*', 'marchandises.nom as nom')
                ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->orderBy('nom')
                ->get();
        }

        // Récupérer les entrées pour chaque marchandise

        $data = [
            'title' => 'Liste des sorties PDF',
            'sorties' => $sorties,
            'start' => $start,
            'end' => $end,
        ];


        $pdf = PDF::loadView('rapports.sorties', $data);
        return $pdf->download('rapport.sortie.pdf');
    }
    public function downloadqr(Request $request)
    {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        // Fetch the data to be passed to the view
        $search = $request->input('search');
        $start = $request->input('start');
        $end = $request->input('end');
        if ($search !== null && (empty($start) && empty($end))) {
            $marchandises = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orWhere('categories.nom', 'LIKE', '%' . $search . '%')
                ->select('marchandises.*')
                ->get();
        } elseif (!empty($start) && !empty($end)) {
            $query = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->select('marchandises.*');

            if (isset($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                        ->orWhere('categories.nom', 'LIKE', '%' . $search . '%');
                });
            }

            $marchandises = $query->get();
        } else {

            $marchandises = marchandises::all();
        }

        // Récupérer les entrées pour chaque marchandise

        $data = [
            'title' => 'Liste des marchandises PDF',
            'marchandises' => $marchandises,
            'start' => $start,
            'end' => $end,
        ];


        $pdf = PDF::loadView('rapports.qr', $data);
        return $pdf->download('rapport.qr.pdf');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $start = $request->input('start');
        $end = $request->input('end');
        $action = $request->input('action');
        if (strstr($action, 'filter')) {
            $valid = $request->validate([
                'search' => 'required',
            ]);
            $marchandises = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                ->orWhere('categories.nom', 'LIKE', '%' . $search . '%')
                ->select('marchandises.*')
                ->paginate(10)->withQueryString();
            $entres = entres::select('marchandises.id', DB::raw('COALESCE(SUM(entres.quantite), 0) as entre'))
                ->leftJoin('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id')
                ->pluck('entre', 'marchandises.id');

            $sorties = sorties::select('marchandises.id', DB::raw('COALESCE(SUM(sorties.quantite), 0) as sortie'))
                ->leftJoin('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id')
                ->pluck('sortie', 'marchandises.id');
            foreach ($marchandises as $marchandise) {
                $marchandise->entres = $entres[$marchandise->id] ?? 0;
                $marchandise->sorties = $sorties[$marchandise->id] ?? 0;
                $marchandise->solde = $marchandise->entres - $marchandise->sorties;
            }
        } else {
            $valid = $request->validate([
                'start' => 'required',
                'end' => 'required',
            ]);
            // Initialize the query for 'marchandises'
            $query = marchandises::join('categories', 'marchandises.id_cat', '=', 'categories.id')
                ->select('marchandises.*');

            if (isset($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('marchandises.nom', 'LIKE', '%' . $search . '%')
                        ->orWhere('categories.nom', 'LIKE', '%' . $search . '%');
                });
            }

            $marchandises = $query->paginate(10)->withQueryString();

            // Initialize the 'entres' and 'sorties' queries
            $entresQuery = entres::select('marchandises.id', DB::raw('COALESCE(SUM(entres.quantite), 0) as entre'))
                ->leftJoin('marchandises', 'entres.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id');

            $sortiesQuery = sorties::select('marchandises.id', DB::raw('COALESCE(SUM(sorties.quantite), 0) as sortie'))
                ->leftJoin('marchandises', 'sorties.id_mar', '=', 'marchandises.id')
                ->groupBy('marchandises.id');

            if (isset($start) && isset($end)) {
                if ($start > $end) {
                    return redirect()->back()->with('error', 'La première date doit être avant la dernière date.');
                }
                if ($start == $end) {
                    // If start and end dates are the same, use a single date comparison
                    $entresQuery->whereDate('entres.created_at', $start);
                    $sortiesQuery->whereDate('sorties.created_at', $start);
                } else {
                    // Otherwise, use the range comparison
                    $entresQuery->whereBetween('entres.created_at', [$start, $end]);
                    $sortiesQuery->whereBetween('sorties.created_at', [$start, $end]);
                }
            }

            $entres = $entresQuery->pluck('entre', 'marchandises.id');
            $sorties = $sortiesQuery->pluck('sortie', 'marchandises.id');

            foreach ($marchandises as $marchandise) {
                $marchandise->entres = $entres[$marchandise->id] ?? 0;
                $marchandise->sorties = $sorties[$marchandise->id] ?? 0;
                $marchandise->solde = $marchandise->entres - $marchandise->sorties;
            }
        }


        return view('rapports.index', ['marchandises' => $marchandises, 'search' => $search, 'start' => $start, 'end' => $end]);
    }
}
