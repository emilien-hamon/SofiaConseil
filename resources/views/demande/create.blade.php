@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h1 class="text-center mb-0">Créer une nouvelle demande</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('demande.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input maxlength="25" name="titre" id="titre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea maxlength="255" name="description" id="description" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <p>Cocher les compétences nécessaires au projet :</p>
                            <div class="row">
                                @foreach ($competences->chunk(ceil($competences->count() / 4)) as $chunk)
                                    <div class="col-md-3">
                                        <div class="d-flex flex-column align-items-center">
                                            @foreach ($chunk as $competence)
                                                <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" id="competence_{{ $competence->id }}" name="competences[]" class="custom-control-input" value="{{ $competence->id }}">
                                                    <label class="custom-control-label" for="competence_{{ $competence->id }}">{{ $competence->nom }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="en_brouillons" name="en_brouillons">
                                <label class="form-check-label" for="en_brouillons">
                                    Enregistrer en brouillons
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block w-100">Créer Demande</button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('demande.index') }}" class="btn btn-secondary btn-block w-100">Retour à la liste</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
