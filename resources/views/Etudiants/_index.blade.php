@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>INTERFACE AGENT</h1>
        <div class="d-flex justify-between">
            <h1 class="text-center">Hello {{ auth()->user()->name }}</h1>
            <form action="/logout" method="post">
                @csrf
                <button class="btn btn-danger">SE DECONNECTER</button>
            </form>
        </div>
        <h2>LISTE DES ETUDIANTS</h2>
        <table class="table table-sm table-bordered">
            <thead>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>MATRI</th>
                <th>TELEPHONE</th>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->nom }}</td>
                        <td>{{ $item->prenom }}</td>
                        <td>{{ $item->matricule }}</td>
                        <td>{{ $item->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
