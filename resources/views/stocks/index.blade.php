@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-2xl font-black text-gray-800 mb-6 flex items-center">
                <span class="mr-2">🩸</span> État des Stocks Nationaux (CNTS)
            </h2>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($stocks as $stock)
                    <div class="border-2 {{ $stock->quantite <= $stock->seuil_alerte ? 'border-red-500 bg-red-50' : 'border-gray-100' }} rounded-xl p-5 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-3xl font-black text-gray-900">{{ $stock->groupe_sanguin }}</span>
                            @if($stock->quantite <= $stock->seuil_alerte)
                                <span class="bg-red-600 text-white text-[10px] px-2 py-1 rounded-full uppercase animate-pulse">Urgence</span>
                            @endif
                        </div>

                        <div class="text-sm text-gray-500 font-bold uppercase">Poches en stock</div>
                        <div class="text-4xl font-bold mb-4">{{ $stock->quantite }}</div>

                        <div class="flex space-x-2">
                            <form action="{{ route('stocks.ajuster', $stock->id) }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="mouvement" value="1">
                                <button class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 py-1 rounded text-sm font-bold shadow-sm transition">+</button>
                            </form>
                            <form action="{{ route('stocks.ajuster', $stock->id) }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="mouvement" value="-1">
                                <button class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 py-1 rounded text-sm font-bold shadow-sm transition">-</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection