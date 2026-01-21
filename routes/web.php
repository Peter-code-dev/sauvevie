<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/needs', 'pages.needs')->name('needs');
Route::view('/campaigns', 'pages.campaigns')->name('campaigns');
Route::view('/centers', 'pages.centers')->name('centers');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/mentions-legales', 'pages.mentions-legales')->name('mentions-legales');
Route::view('/confidentialite', 'pages.confidentialite')->name('confidentialite');
