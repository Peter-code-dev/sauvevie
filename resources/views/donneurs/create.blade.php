@extends('layouts.app')

@section('title', 'Nouveau Donneur')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Enregistrer un Volontaire</h2>
        <p class="text-gray-500 mt-2">Assurez-vous de vérifier l'identité du donneur avant validation.</p>
    </div>

    <form action="{{ route('donneurs.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nom</label>
                <input type="text" name="nom" required class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Prénom</label>
                <input type="text" name="prenom" required class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Téléphone (WhatsApp/SMS)</label>
                <input type="text" name="telephone" placeholder="+228..." required class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Groupe Sanguin</label>
                <select name="groupe_sanguin" required class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500">
                    <option value="">Sélectionner...</option>
                    @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $gp)
                        <option value="{{ $gp }}">{{ $gp }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Ville de résidence</label>
                <input type="text" name="ville" required class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Date du dernier don (Optionnel)</label>
                <input type="date" name="date_dernier_don" class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500">
            </div>
        </div>

        <div class="bg-red-50 p-4 rounded-xl border border-red-100 mt-4">
            <div class="flex items-start">
                <input type="checkbox" name="consentement_sms" value="1" class="mt-1 rounded text-red-600 focus:ring-red-500">
                <label class="ml-3 text-sm text-red-800 italic">
                    Le donneur accepte d'être contacté par SMS ou appel en cas de besoin urgent de son groupe sanguin, conformément à la politique de protection des données de santé du Togo.
                </label>
            </div>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-xl transition shadow-lg shadow-red-200">
                Enregistrer le donneur
            </button>
            <a href="{{ route('donneurs.index') }}" class="py-3 px-6 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition">Annuler</a>
        </div>
    </form>
</div>
@endsection