@extends('layouts.app')

@section('content')

<h2>Modifier un client</h2>

<form action="{{ route('clients.update',$client->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Nom</label>
<input type="text" name="nom" class="form-control" value="{{ $client->nom }}">
</div>

<div class="mb-3">
<label>Prénom</label>
<input type="text" name="prenom" class="form-control" value="{{ $client->prenom }}">
</div>

<div class="mb-3">
<label>Téléphone</label>
<input type="text" name="telephone" class="form-control" value="{{ $client->telephone }}">
</div>

<div class="mb-3">
<label>Adresse</label>
<input type="text" name="adresse" class="form-control" value="{{ $client->adresse }}">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" value="{{ $client->email }}">
</div>

<button class="btn btn-primary">
Modifier
</button>

<a href="{{ route('clients.index') }}" class="btn btn-secondary">
Retour
</a>

</form>

@endsection