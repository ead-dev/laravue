<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    //
    public function index(){
        $items = Etudiant::all();
       return view('Etudiants.index',compact('items'));
    }
}
