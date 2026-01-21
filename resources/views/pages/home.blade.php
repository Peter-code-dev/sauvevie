@extends('layouts.app')

@section('content')
<div class="hero">
    <div class="container">
        <h1 class="fw-bold display-4">SauveVie</h1>
        <p class="lead mt-3">
            Plateforme publique de don de sang et de secours d’urgence
        </p>
        <a href="/contact" class="btn btn-health btn-lg mt-4">
            🩸 Devenir donneur
        </a>
    </div>
</div>

<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <h3 class="section-title">🩸 Don de sang</h3>
            <p>Gestion intelligente des donneurs volontaires.</p>
        </div>
        <div class="col-md-4">
            <h3 class="section-title">🚑 Urgences vitales</h3>
            <p>Réponse rapide en cas de besoin critique.</p>
        </div>
        <div class="col-md-4">
            <h3 class="section-title">🏥 Centres de santé</h3>
            <p>Localisation des centres partenaires.</p>
        </div>
    </div>
</div>
@endsection
