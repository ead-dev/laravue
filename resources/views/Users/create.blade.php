@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-between">
            <h1 class="text-center">Hello {{ auth()->user()->name }}</h1>
            <form action="/logout" method="post">
                @csrf
                <button class="btn btn-danger">SE DECONNECTER</button>
            </form>
        </div>
        <div>
            <h2>NOUVEAU COMPTE UTILISATEUR</h2>
            
        </div>
        <form action="/users" method="post">
            @csrf
            <div style="width: 500px" class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">NOM DE L'UTILISATEUR</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">MOT DE PASSE</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">ENREGISTRER</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
