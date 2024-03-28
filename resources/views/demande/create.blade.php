@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center mb-4">Créer une nouvelle demande</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('demande.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input name="titre" id="titre" class="form-control" rows="5" required></input>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="competence">Compétences</label>
                            <input type="text" name="competence" id="competence" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-1 w-100">Créer Demande</button>
                        <a href="{{ route('demande.index') }}" class="btn btn-secondary mt-1 w-100">Retour à la liste</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
