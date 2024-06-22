<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    //
    public function index(){
        $items = Etudiant::all();
        //dd($items);
        if(auth()->user()->role_id==1){
            return view('Etudiants.index',compact('items'));
        }

        if(auth()->user()->role_id==2){
            return view('Etudiants._index',compact('items'));
        }

    }
}
