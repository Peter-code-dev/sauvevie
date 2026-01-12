@extends('layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-red-600">
        <h3 class="text-gray-500 text-sm font-bold uppercase">Total Donneurs</h3>
        <p class="text-3xl font-bold text-gray-800">{{ $totalDonneurs }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-orange-500">
        <h3 class="text-gray-500 text-sm font-bold uppercase">Besoin Urgent</h3>
        <p class="text-xl font-bold text-orange-600 italic">O- (Lomé Sud)</p>
    </div>
</div>

<div class="bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-xl font-bold mb-4">Répartition par Groupe Sanguin</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($statsGroupes as $stat)
        <div class="text-center p-4 bg-gray-50 rounded-lg">
            <span class="block text-2xl font-black text-red-600">{{ $stat->groupe_sanguin }}</span>
            <span class="text-gray-600">{{ $stat->total }} donneur(s)</span>
        </div>
        @endforeach
    </div>
</div>
@endsection