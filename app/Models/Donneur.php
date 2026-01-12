<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donneur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'prenom', 
        'telephone', 
        'groupe_sanguin', 
        'ville', 
        'date_dernier_don', 
        'consentement_sms'
    ];

    // Petit bonus expert : Calculer si le donneur est éligible (3 mois de repos)
    public function estEligible()
    {
        if (!$this->date_dernier_don) return true;
        return \Carbon\Carbon::parse($this->date_dernier_don)->addMonths(3)->isPast();
    }
}