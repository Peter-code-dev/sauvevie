<?php

namespace App\Http\Controllers;

use App\Models\DemandeUrgence;
use Illuminate\Http\Request;

class UrgenceController extends Controller
{
    // Côté CNTS : Voir toutes les alertes (Le Centre de Commandement)
    public function index() {
        $urgences = DemandeUrgence::orderBy('created_at', 'desc')->get();
        return view('urgences.index', compact('urgences'));
    }

    // Côté Hôpital : Formulaire d'envoi
    public function create() {
        return view('urgences.create');
    }

    // Enregistrement de l'alerte
    public function store(Request $request) {
        $validated = $request->validate([
            'hopital_nom' => 'required|string',
            'groupe_sanguin' => 'required|string',
            'poches_requises' => 'required|integer|min:1',
        ]);

        DemandeUrgence::create($validated);
        return redirect()->route('urgences.create')->with('success', 'ALERTE ENVOYÉE ! Le CNTS a été notifié immédiatement.');
    }

    // Action : Marquer comme Livrée
    public function livrer($id) {
        $urgence = DemandeUrgence::findOrFail($id);
        $urgence->update(['statut' => 'livree']);
        return back()->with('success', 'Statut mis à jour : Sang expédié !');
    }
}