@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="section-title text-center mb-4">Contact</h1>

    <form class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="4"></textarea>
        </div>

        <button class="btn btn-health w-100">
            Envoyer
        </button>
    </form>
</div>
@endsection
