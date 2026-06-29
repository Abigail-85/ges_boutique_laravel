@extends('layouts.app')

@section('content')

<h2>Modifier une commande</h2>

<form action="{{ route('commandes.update',$commande->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Client</label>

<select name="client_id" class="form-control">

@foreach($clients as $client)

<option value="{{ $client->id }}"
{{ $commande->client_id==$client->id?'selected':'' }}>

{{ $client->nom }} {{ $client->prenom }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Date</label>

<input type="date"
name="date_commande"
class="form-control"
value="{{ $commande->date_commande }}">

</div>

<div class="mb-3">

<label>Montant</label>

<input type="number"
step="0.01"
name="montant_total"
class="form-control"
value="{{ $commande->montant_total }}">

</div>

<button class="btn btn-primary">
Modifier
</button>

<a href="{{ route('commandes.index') }}" class="btn btn-secondary">
Retour
</a>

</form>

@endsection