<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function getItems(){
        $articles = Article::all();
        //dd($articles);
        $agents = [
            [
                'nom'=>'Essomba',
                'prenom'=>'Clement',
                'matricule'=>'068328'
            ],
            [
                'nom'=>'Mabiala',
                'prenom'=>'Alain',
                'matricule'=>'068329'
            ]

        ];
        return view('agents',compact('agents','articles'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
