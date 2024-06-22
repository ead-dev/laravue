<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('Users.index',compact('users'));
    }

    public function create(){
        return view('Users.create');
    }

    public function disable($id){
        $user = User::find($id);
        if($user){
            $user->active = 0;
            $user->save();
        }
        return redirect()->back();
    }

    public function enable($id){
        $user = User::find($id);
        if($user){
            $user->active = 1;
            $user->save();
        }
        return redirect()->back();
    }

    public function store(Request $request){
       // dd($request->all());


       $data=[
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password)
       ];

       User::create($data);

       return redirect('/users');

    }
}
