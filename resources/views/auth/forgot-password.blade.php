@extends('layouts.guest')

@section('content')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Mot de passe oublié ? Indiquez-nous votre adresse email et nous vous enverrons un lien de réinitialisation.') }}
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
            <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md">
                Envoyer le lien
            </button>
        </div>
    </form>
@endsection