<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Affiche l'état actuel des poches de sang au CNTS.
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('stocks.index', compact('stocks'));
    }

    /**
     * Permet d'ajouter ou de retirer des poches (Entrées/Sorties).
     */
    public function ajuster(Request $request, $id)
    {
        $request->validate([
            'mouvement' => 'required|integer', // +1 ou -1
        ]);

        $stock = Stock::findOrFail($id);
        $stock->quantite += $request->mouvement;

        // Empêcher un stock négatif
        if ($stock->quantite < 0) {
            $stock->quantite = 0;
        }

        $stock->save();

        return back()->with('success', 'Mise à jour du stock effectuée avec succès.');
    }
}