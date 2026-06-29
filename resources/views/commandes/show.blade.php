@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">

<h3>Détails de la commande</h3>

</div>

<div class="card-body">

<p><strong>Client :</strong>

{{ $commande->client->nom }}
{{ $commande->client->prenom }}

</p>

<p><strong>Date :</strong>

{{ $commande->date_commande }}

</p>

<p><strong>Montant total :</strong>

{{ $commande->montant_total }} FCFA

</p>

<a href="{{ route('commandes.index') }}"
class="btn btn-secondary">

Retour

</a>

</div>

</div>

@endsection