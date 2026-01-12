<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonneurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrgenceController;
use App\Http\Controllers\StockController;

/*
|--------------------------------------------------------------------------
| Web Routes - SauveVie Expert
|--------------------------------------------------------------------------
*/

// Redirection automatique vers le dashboard
Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Groupe de routes protégées (Accessibles uniquement après connexion)
Route::middleware('auth')->group(function () {
    
    // 1. Gestion des donneurs
    Route::resource('donneurs', DonneurController::class);
    
    // 2. Le bouton rouge (Urgences Hôpitaux)
    Route::resource('urgences', UrgenceController::class);

    // 3. Gestion des stocks CNTS
    Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
    Route::post('/stocks/{id}/ajuster', [StockController::class, 'ajuster'])->name('stocks.ajuster');

    // 4. Profil Utilisateur (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/urgences/{id}/livrer', [UrgenceController::class, 'livrer'])->name('urgences.livrer');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';