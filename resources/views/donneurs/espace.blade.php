@extends('layouts.app')

@section('content')
<div class="py-12 bg-red-50 min-h-screen">
    <div class="max-w-md mx-auto sm:px-6 lg:px-8">
        
        <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-3xl p-6 shadow-2xl text-white mb-6 relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-8">
                    <h2 class="text-xl font-bold">Carte Donneur</h2>
                    <span class="text-3xl font-black">{{ Auth::user()->name }}</span>
                </div>
                <div class="mb-4">
                    <p class="text-red-200 text-xs uppercase font-bold tracking-widest">Groupe Sanguin</p>
                    <p class="text-4xl font-black">O-</p>
                </div>
                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-red-200 text-[10px] uppercase font-bold">Dernier Don</p>
                        <p class="font-bold">12 Oct. 2025</p>
                    </div>
                    <div class="bg-white text-red-700 px-3 py-1 rounded-lg text-xs font-black">
                        ÉLIGIBLE ✅
                    </div>
                </div>
            </div>
            <div class="absolute -right-10 -bottom-10 opacity-10">
                <svg width="200" height="200" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-white p-4 rounded-2xl shadow-sm text-center border border-red-100">
                <div class="text-2xl mb-1">📅</div>
                <div class="text-xs font-bold text-gray-800">Prendre RDV</div>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow-sm text-center border border-red-100">
                <div class="text-2xl mb-1">📍</div>
                <div class="text-xs font-bold text-gray-800">Centres Proches</div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-red-600">
            <h3 class="font-black text-gray-800 mb-2 flex items-center">
                <span class="animate-ping mr-2 h-2 w-2 rounded-full bg-red-500"></span>
                ALERTE PROXIMITÉ
            </h3>
            <p class="text-sm text-gray-600 mb-4">L'Hôpital de Bè a besoin de 2 poches de votre groupe (O-). Pouvez-vous aider ?</p>
            <button class="w-full bg-red-600 text-white font-bold py-3 rounded-xl hover:bg-red-700 transition shadow-lg shadow-red-200">
                JE ME PORTE VOLONTAIRE
            </button>
        </div>

    </div>
</div>
@endsection