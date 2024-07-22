<?php

namespace App\Http\Controllers;

use App\Models\activites;
use App\Models\User;
use Illuminate\Http\Request;

class activiteController extends Controller
{
    public function index( User $user){
        $activite = activites::where('id_adm','=',$user->id)->paginate(10)->withQueryString();
        return view('historiques', ['activites'=>$activite,'user'=>$user]);
    }
    
}
