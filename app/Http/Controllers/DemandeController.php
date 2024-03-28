<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;

class DemandeController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $demandes = Demande::where('id_users', $userId)->get();
        return view('demande.demande', compact('demandes'));
    }

    public function create()
    {
        return view('demande.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'competence' => 'required',
        ]);

        $demande = new Demande;
        $demande->id_users = auth()->user()->id;
        $demande->date_demande = now();
        $demande->statut = 'En cours de traitement';
        $demande->titre = $request->titre;
        $demande->description = $request->description;
        $demande->competence = $request->competence;
        $demande->save();

        return redirect()->route('demande.index')->with('success', 'Demande créée avec succès!');
    }

    public function show(Demande $demande)
    {
        return view('demande.show', compact('demande'));
    }
}
