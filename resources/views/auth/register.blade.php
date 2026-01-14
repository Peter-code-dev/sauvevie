@extends('layouts.guest')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Nom</label>
            <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
            <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-700">Mot de passe</label>
            <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirmer le mot de passe</label>
            <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Déjà inscrit ?
            </a>
            <button type="submit" class="ml-4 bg-gray-800 text-white px-4 py-2 rounded-md">
                S'inscrire
            </button>
        </div>
    </form>
@endsection