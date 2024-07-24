<?php

namespace App\Http\Controllers;

use App\Models\activites;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class activiteController extends Controller
{
    public function index() {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        $activites = activites::orderByDesc('created_at')->get();
        $users = User::all();
        return view('historiques', [
            'activites' => $activites,
            'users' => $users,
            'source' => 'index'
        ]);
    }
    
    public function index_t(Request $request) {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        $validated = $request->validate([
            'type' => 'required|string',
        ]);

        if ($validated['type'] == 'tous') {
            $activites = Activites::orderByDesc('created_at')->get();
        } else {
            $activites = Activites::where('type', $validated['type'])->orderByDesc('created_at')->get();
        }

        $activites->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('d-m-Y H:i:s');
            $item->updated_at = Carbon::parse($item->updated_at)->format('d-m-Y H:i:s');
            return $item;
        });

        $users = User::all();

        return response()->json(['activites' => $activites, 'users' => $users]);
        
    }

    public function index_adm(User $user) {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        
        $activites = Activites::where('id_adm',$user->id)->orderByDesc('created_at')->get();
       
     

        return view('historiques', [
            'activites' => $activites,
            'users' => $user,
            'source' => 'index_adm'
        ]);
    }

    public function type_adm(User $user,Request $request) {
        if (auth()->user()->role != 'S') {
            return abort(403, 'you are not a super admin');
        }
        
        $validated = $request->validate([
            'type' => 'required|string',
        ]);

        if ($validated['type'] == 'tous') {
            $activites = Activites::where('id_adm',$user->id)->orderByDesc('created_at')->get();
        } else {
            $activites = activites::where('id_adm', $user->id)
            ->where('type', $validated['type'])
            ->orderBy('created_at', 'desc')
            ->get();
        }

        $activites->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('d-m-Y H:i:s');
            $item->updated_at = Carbon::parse($item->updated_at)->format('d-m-Y H:i:s');
            return $item;
        });

        return response()->json(['activites' => $activites, 'users' => $user]);
    }
}
