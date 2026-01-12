<?php

namespace App\Http\Controllers;

use App\Models\Donneur;
use App\Models\Stock;
use App\Models\DemandeUrgence;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDonneurs = Donneur::count();
        $urgencesLivrees = DemandeUrgence::where('statut', 'livree')->count();
        $urgencesEnAttente = DemandeUrgence::where('statut', 'en_attente')->count();
        $stocks = Stock::all();
        
        // Calcul pour un petit graphique de stock
        $totalPoches = Stock::sum('quantite');

        return view('dashboard', compact(
            'totalDonneurs', 
            'urgencesLivrees', 
            'urgencesEnAttente', 
            'stocks',
            'totalPoches'
        ));
    }
}