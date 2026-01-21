@extends('layouts.app')

@section('content')
<h2 class="mb-4">Besoins actuels en sang (simulation)</h2>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card border-danger">
            <div class="card-body text-center">
                <h5>O+</h5>
                <span class="badge bg-danger">Besoin urgent</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-warning">
            <div class="card-body text-center">
                <h5>A−</h5>
                <span class="badge bg-warning text-dark">Besoin modéré</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-success">
            <div class="card-body text-center">
                <h5>B+</h5>
                <span class="badge bg-success">Stock stable</span>
            </div>
        </div>
    </div>
</div>

<p class="text-muted mt-4">
    * Données fictives à but pédagogique. Aucune information médicale réelle n’est collectée.
</p>
@endsection
