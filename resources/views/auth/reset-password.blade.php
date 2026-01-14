@extends('layouts.guest')

@section('content')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
            <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
        </div>

        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-700">Nouveau mot de passe</label>
            <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password" required />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirmer le mot de passe</label>
            <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md">
                Réinitialiser
            </button>
        </div>
    </form>
@endsection