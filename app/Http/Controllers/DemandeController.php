<?php

namespace App\Http\Controllers;

use App\Models\CompetDemande;
use App\Models\Competence;
use App\Models\Competetence;
use App\Models\Statut;
use Illuminate\Http\Request;
use App\Models\Demande;

class DemandeController extends Controller
{
    public function index()
{
    $userId = auth()->user()->id;
    $demandes_finalisees = Demande::where('id_users', $userId)->where('id_statuts', 2)->get();
    $demandes_brouillon = Demande::where('id_users', $userId)->where('id_statuts', 1)->get();

    return view('demande.demande', compact('demandes_finalisees', 'demandes_brouillon'));
}


    public function create()
    {
        $competences = Competence::all();
        return view('demande.create', compact('competences'));
    }

    public function store(Request $request)
{
    // Création de la demande
    $demande = new Demande;
    $demande->id_users = auth()->user()->id;
    $demande->date_demande = now();
    $demande->titre = $request->titre;
    $demande->description = $request->description;

    // Vérifie si "Enregistrer en brouillons" est coché
    if ($request->has('en_brouillons')) {
        $statut = Statut::find(1); // Valeur pour le statut "Brouillon"
    } else {
        $statut = Statut::find(2); // Valeur pour le statut "Enregistré"
    }

    $demande->id_statuts = $statut->id;
    $demande->save();

    // Récupération des compétences sélectionnées
    $competences = $request->input('competences', []);

    // Enregistrement des compétences sélectionnées pour cette demande
    foreach ($competences as $competenceId) {
        $comp = new CompetDemande;
        $comp->id_demandes = $demande->id;
        $comp->id_competences = $competenceId;
        $comp->save();
    }

    return redirect()->route('demande.index');
}



    public function show(Demande $demande)
    {
        return view('demande.show', compact('demande'));
    }
}
