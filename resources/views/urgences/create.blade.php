@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-red-600 p-1 text-white text-center animate-pulse rounded-t-lg font-black tracking-widest uppercase">
        Ligne d'Urgence Vitale - CNTS Togo
    </div>
    
    <div class="bg-white p-8 rounded-b-lg shadow-2xl border-2 border-red-600">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <svg class="w-8 h-8 mr-2 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
            Demande de Sang en Urgence
        </h2>

        @if(session('warning'))
            <div class="mb-6 p-4 bg-orange-100 border-l-4 border-orange-500 text-orange-700 font-bold">
                {{ session('warning') }}
            </div>
        @endif

        <form action="{{ route('urgences.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-700">Nom de l'Hôpital / Centre de Santé</label>
                <input type="text" name="hopital_nom" required class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" placeholder="ex: CHU Sylvanus Olympio">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700">Groupe Sanguin Requis</label>
                    <select name="groupe_sanguin" required class="w-full mt-1 border-gray-300 rounded-md focus:ring-red-500">
                        @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $g)
                            <option value="{{ $g }}">{{ $g }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700">Nombre de Poches</label>
                    <input type="number" name="poches_requises" min="1" required class="w-full mt-1 border-gray-300 rounded-md">
                </div>
            </div>

            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-black py-4 rounded-xl shadow-lg transition transform hover:scale-105 uppercase">
                Déclencher l'alerte CNTS
            </button>
        </form>
    </div>
</div>
@endsection