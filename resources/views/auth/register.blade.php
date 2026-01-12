@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg border border-gray-100">
        <h2 class="text-center text-2xl font-black text-red-600 mb-6 uppercase">Inscription Expert</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label class="block font-bold text-sm text-gray-700">Nom complet</label>
                <input type="text" name="name" required autofocus class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label class="block font-bold text-sm text-gray-700">Email</label>
                <input type="email" name="email" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label class="block font-bold text-sm text-gray-700">Mot de passe</label>
                <input type="password" name="password" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mt-4">
                <label class="block font-bold text-sm text-gray-700">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Déjà inscrit ?
                </a>
                <button type="submit" class="ms-4 bg-red-600 text-white px-4 py-2 rounded-lg font-bold">
                    S'enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection