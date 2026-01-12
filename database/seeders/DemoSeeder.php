<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donneur;
use App\Models\Stock;
use App\Models\DemandeUrgence;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Créer des donneurs fictifs dans différentes villes du Togo
        $villes = ['Lomé', 'Kara', 'Sokodé', 'Atakpamé', 'Kpalimé'];
        $groupes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

        for ($i = 0; $i < 50; $i++) {
            Donneur::create([
                'nom' => 'NOM_' . $i,
                'prenom' => 'Prenom_' . $i,
                'telephone' => '900000' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'groupe_sanguin' => $groupes[array_rand($groupes)],
                'ville' => $villes[array_rand($villes)],
                'date_dernier_don' => now()->subMonths(rand(1, 6)),
                'consentement_sms' => true,
            ]);
        }

        // 2. Initialiser les Stocks (si pas déjà fait)
        $stocksInit = [
            ['groupe' => 'A+', 'q' => 45], ['groupe' => 'A-', 'q' => 12],
            ['groupe' => 'B+', 'q' => 30], ['groupe' => 'B-', 'q' => 5],
            ['groupe' => 'AB+', 'q' => 15], ['groupe' => 'AB-', 'q' => 3],
            ['groupe' => 'O+', 'q' => 60], ['groupe' => 'O-', 'q' => 8],
        ];

        foreach ($stocksInit as $s) {
            Stock::updateOrCreate(
                ['groupe_sanguin' => $s['groupe']],
                ['quantite' => $s['q'], 'seuil_alerte' => 10]
            );
        }

        // 3. Créer des Urgences (Historique et en cours)
        DemandeUrgence::create([
            'hopital_nom' => 'CHU Sylvanus Olympio',
            'groupe_sanguin' => 'O-',
            'poches_requises' => 3,
            'statut' => 'en_attente'
        ]);

        DemandeUrgence::create([
            'hopital_nom' => 'Hôpital de Bè',
            'groupe_sanguin' => 'B+',
            'poches_requises' => 2,
            'statut' => 'livree'
        ]);
    }
}