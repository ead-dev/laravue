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
            <h2>LISTE DES COMPTES</h2>
            <a class="btn btn-danger" href="/users/create">Ajouter</a>
        </div>

        <table class="table table-sm table-bordered">
            <thead>
                <th>NOM</th>
                <th>EMAIL</th>
            </thead>
            <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
