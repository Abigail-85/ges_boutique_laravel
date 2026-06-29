@extends('layouts.app')

@section('content')

<h2>Ajouter un client</h2>

<form action="{{ route('clients.store') }}" method="POST">

@csrf

<div class="mb-3">
<label>Nom</label>
<input type="text" name="nom" class="form-control">
</div>

<div class="mb-3">
<label>Prénom</label>
<input type="text" name="prenom" class="form-control">
</div>

<div class="mb-3">
<label>Téléphone</label>
<input type="text" name="telephone" class="form-control">
</div>

<div class="mb-3">
<label>Adresse</label>
<input type="text" name="adresse" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<button class="btn btn-success">
Enregistrer
</button>

<a href="{{ route('clients.index') }}" class="btn btn-secondary">
Retour
</a>

</form>

@endsection