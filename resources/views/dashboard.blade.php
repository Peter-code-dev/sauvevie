@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h1 class="text-3xl font-black text-slate-800 mb-8">Tableau de Bord National SauveVie</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-500 text-sm font-bold uppercase">Donneurs Inscrits</div>
                <div class="text-4xl font-black text-indigo-600">{{ $totalDonneurs }}</div>
                <div class="text-xs text-green-500 mt-2">↑ +12% ce mois</div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-500 text-sm font-bold uppercase">Vies Sauvées (Urgences Livrées)</div>
                <div class="text-4xl font-black text-red-600">{{ $urgencesLivrees }}</div>
                <div class="text-xs text-gray-400 mt-2">Basé sur les livraisons réelles</div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-500 text-sm font-bold uppercase">Alertes en Cours</div>
                <div class="text-4xl font-black {{ $urgencesEnAttente > 0 ? 'text-orange-500 animate-pulse' : 'text-gray-300' }}">
                    {{ $urgencesEnAttente }}
                </div>
                <div class="text-xs text-gray-400 mt-2">Nécessitent une action immédiate</div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-bold mb-6">Répartition des Réserves de Sang</h3>
            <div class="space-y-4">
                @foreach($stocks as $stock)
                @php $pourcentage = ($totalPoches > 0) ? ($stock->quantite / $totalPoches) * 100 : 0; @endphp
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-bold">{{ $stock->groupe_sanguin }}</span>
                        <span class="text-sm text-gray-500">{{ $stock->quantite }} poches</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-4">
                        <div class="bg-red-500 h-4 rounded-full" style="width: {{ $pourcentage }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection