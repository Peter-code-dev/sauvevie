@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
            <div class="bg-slate-900 p-6 flex justify-between items-center">
                <h2 class="text-xl font-black text-white uppercase tracking-tighter">
                    <span class="text-red-500 mr-2">●</span> Centre de Suivi des Urgences Vitales
                </h2>
                <span class="bg-red-600 text-white text-xs px-3 py-1 rounded-full animate-pulse font-bold">LIVE</span>
            </div>

            <div class="p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-gray-100 text-gray-400 text-xs uppercase font-black">
                            <th class="py-4">Heure</th>
                            <th class="py-4">Hôpital</th>
                            <th class="py-4 text-center">Groupe</th>
                            <th class="py-4 text-center">Quantité</th>
                            <th class="py-4 text-center">Statut</th>
                            <th class="py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($urgences as $u)
                        <tr class="{{ $u->statut == 'en_attente' ? 'bg-red-50/30' : '' }}">
                            <td class="py-4 text-sm font-medium text-gray-500">{{ $u->created_at->format('H:i') }}</td>
                            <td class="py-4 font-bold text-gray-800">{{ $u->hopital_nom }}</td>
                            <td class="py-4 text-center">
                                <span class="bg-red-600 text-white px-3 py-1 rounded-md font-black">{{ $u->groupe_sanguin }}</span>
                            </td>
                            <td class="py-4 text-center font-bold">{{ $u->poches_requises }} poches</td>
                            <td class="py-4 text-center">
                                @if($u->statut == 'en_attente')
                                    <span class="text-red-600 font-bold italic text-sm">⚠️ Non traité</span>
                                @else
                                    <span class="text-green-600 font-bold text-sm">✅ Livré</span>
                                @endif
                            </td>
                            <td class="py-4 text-right">
                                @if($u->statut == 'en_attente')
                                <form action="{{ route('urgences.livrer', $u->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-slate-800 hover:bg-black text-white text-xs font-bold px-4 py-2 rounded-lg transition">Marquer comme Livré</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection