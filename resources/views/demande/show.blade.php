@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center mb-4">Détails de la demande</h1>
                </div>
                <div class="card-body">
                    <h5 class="card-title">ID: {{ $demande->id }}</h5>
                    <p class="card-text"><strong>Titre:</strong> {{ $demande->titre }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $demande->description }}</p>
                    <p class="card-text"><strong>Compétences:</strong> {{ $demande->competence }}</p>
                    <p class="card-text"><strong>Statut:</strong> {{ $demande->statut }}</p>
                    <p class="card-text"><strong>Date de demande:</strong> {{ $demande->date_demande }}</p>
                    <!-- Vous pouvez ajouter d'autres champs au besoin -->
                </div>
                <div class="card-footer">
                    <a href="{{ route('demande.index') }}" class="btn btn-primary btn-block mt-1 w-100">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
