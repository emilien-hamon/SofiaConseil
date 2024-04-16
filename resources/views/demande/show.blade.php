@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h1 class="text-center mb-0">Détails de la demande</h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title">ID: {{ $demande->id }}</h5>
                    <p class="card-text"><strong>Titre:</strong> {{ $demande->titre }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $demande->description }}</p>
                    <p class="card-text"><strong>Compétences:</strong>
                        @foreach ($demande->competences as $competence)
                            {{ $competence->nom }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </p>
                    <p class="card-text"><strong>Statut:</strong>
                        @if ($demande->statut)
                            {{ $demande->statut->statut }}
                        @else
                            Aucun statut trouvé
                        @endif
                    </p>
                    <p class="card-text"><strong>Date de demande:</strong> {{ $demande->date_demande }}</p>
                    <!-- Vous pouvez ajouter d'autres champs au besoin -->
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('demande.index') }}" class="btn btn-primary btn-block w-50">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
