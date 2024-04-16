@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="text-center mb-4">Liste de vos demandes</h1>

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Demandes finalisées</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="col-4">Titre</th>
                                    <th scope="col" class="col-4">Compétences</th>
                                    <th scope="col" class="col-3">Statut</th>
                                    <th scope="col" class="col-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes_finalisees as $demande)
                                    <tr>
                                        <td>{{ $demande->titre }}</td>
                                        <td>
                                            @foreach ($demande->competences as $competence)
                                                {{ $competence->nom }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $demande->statut ? $demande->statut->statut : 'Aucun statut trouvé' }}</td>
                                        <td>
                                            <a href="{{ route('demande.show', $demande->id) }}" class="btn btn-info">Infos</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-4 shadow">
                <div class="card-header bg-secondary text-white">
                    <h2 class="mb-0">Demandes en brouillon</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="col-4">Titre</th>
                                    <th scope="col" class="col-4">Compétences</th>
                                    <th scope="col" class="col-3">Statut</th>
                                    <th scope="col" class="col-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes_brouillon as $demande)
                                    <tr>
                                        <td>{{ $demande->titre }}</td>
                                        <td>
                                            @foreach ($demande->competences as $competence)
                                                {{ $competence->nom }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $demande->statut ? $demande->statut->statut : 'Aucun statut trouvé' }}</td>
                                        <td>
                                            <a href="{{ route('demande.show', $demande->id) }}" class="btn btn-info">Infos</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
