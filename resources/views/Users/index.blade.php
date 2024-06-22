@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between">
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
                <th>STATUT</th>
                <th>actions</th>
            </thead>
            <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{!! $item->active?'<span class="badge bg-success">actif</span>':'<span class="badge bg-danger">bloque</span>' !!}</td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    @if($item->active)
                                        <a class="btn btn-danger btn-sm" href="{{ route('users.disable',$item->id) }}">desactiver</a>
                                    @else
                                    <a class="btn btn-success btn-sm" href="{{ route('users.enable',$item->id) }}">activer</a>
                                    @endif
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
