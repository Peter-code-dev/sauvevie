@extends('layouts.guest')

@section('content')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('C\'est une zone sécurisée de l\'application. Veuillez confirmer votre mot de passe avant de continuer.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <label for="password" class="block font-medium text-sm text-gray-700">{{ __('Mot de passe') }}</label>
            <input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            
            @if($errors->has('password'))
                <p class="text-red-500 text-xs mt-2">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Confirmer') }}
            </button>
        </div>
    </form>
@endsection