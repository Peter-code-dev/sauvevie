<?php

namespace App\Http\Controllers;

use App\Models\Donneur; // Indispensable pour parler à la base de données
use Illuminate\Http\Request;

class DonneurController extends Controller
{
    /**
     * Affiche la liste des donneurs
     */
    public function index()
    {
        // On récupère tous les donneurs classés par les plus récents
        $donneurs = Donneur::latest()->get();
        
        return view('donneurs.index', compact('donneurs'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('donneurs.create');
    }

    /**
     * Enregistre un nouveau donneur
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string',
            'groupe_sanguin' => 'required',
            'date_naissance' => 'required|date',
        ]);

        Donneur::create($validated);

        return redirect()->route('donneurs.index')->with('success', 'Donneur ajouté avec succès !');
    }

    // Les autres méthodes (show, edit, update, destroy) restent vides pour l'instant
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}