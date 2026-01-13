<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonneurController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UrgenceController;
use Illuminate\Support\Facades\Route;

// Page d'accueil (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Groupe de routes protégées (nécessitent d'être connecté)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // UNE SEULE ROUTE DASHBOARD (C'est ici qu'était l'erreur)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestion du Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gestion des Donneurs
    Route::resource('donneurs', DonneurController::class);
    Route::get('/mon-espace', [DonneurController::class, 'espace'])->name('donneurs.espace');

    // Gestion des Stocks
    Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');

    // Gestion des Urgences
    Route::resource('urgences', UrgenceController::class);
});

require __DIR__.'/auth.php';