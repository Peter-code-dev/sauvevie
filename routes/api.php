<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;

Route::post('/donors', [DonorController::class, 'store']);
Route::get('/donors', [DonorController::class, 'index']);
