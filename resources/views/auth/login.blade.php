@extends('layouts.guest')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
        </div>
        <div class="mt-4">
            <label for="password">Mot de passe</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>
        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="ml-3 bg-blue-500 text-white px-4 py-2 rounded">Se connecter</button>
        </div>
    </form>
@endsection