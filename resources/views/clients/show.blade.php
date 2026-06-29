@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">

<h3>Détails du client</h3>

</div>

<div class="card-body">

<p><strong>Nom :</strong> {{ $client->nom }}</p>

<p><strong>Prénom :</strong> {{ $client->prenom }}</p>

<p><strong>Téléphone :</strong> {{ $client->telephone }}</p>

<p><strong>Adresse :</strong> {{ $client->adresse }}</p>

<p><strong>Email :</strong> {{ $client->email }}</p>

<a href="{{ route('clients.index') }}" class="btn btn-secondary">

Retour

</a>

</div>

</div>

@endsection