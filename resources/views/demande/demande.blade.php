@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="text-center mb-4">Liste de vos demandes</h1>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Compétences</th>
                        <th scope="col">Action</th>
                        <!-- Ajoutez plus de colonnes au besoin -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($demandes as $demande)
                    <tr>
                        <td>{{ $demande->id }}</td>
                        <td>{{ $demande->titre }}</td>
                        <td>{{ $demande->competence }}</td>
                        <td>
                            <a href="{{ route('demande.show', $demande->id) }}" class="btn btn-info">Infos</a>
                        </td>
                        <!-- Ajoutez plus de colonnes au besoin -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('demande.create') }}" class="btn btn-primary btn-lg btn-block">Nouvelle demande</a>
        </div>
    </div>
</div>
@endsection
