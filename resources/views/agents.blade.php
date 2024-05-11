@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">AGENTS</div>

                <div class="card-body">
                    <h2>LISTES DES AGENTS</h2>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>MATRI</th>
                                <th>NOM</th>
                                <th>PRENOM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $agent)
                                <tr>
                                    <td>{{ $agent['matricule'] }}</td>
                                    <td>{{ $agent['nom'] }}</td>
                                    <td>{{ $agent['prenom'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="card">
    <div class="card-body">
        <h3>LISTES DES ARTICLES</h3>
        <table class="table table-sm table-bordered table-hover">
            <thead>
                <th>ID</th>
                <th>TITRE</th>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
