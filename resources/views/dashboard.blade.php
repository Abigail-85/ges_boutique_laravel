@extends('layouts.app')

@section('content')

<div class="text-center">

<h1 class="mb-4">Gestion de Boutique de Ali</h1>

<p class="lead">
Bienvenue dans votre application Laravel.
</p>

<div class="row mt-5">

<div class="col-md-3">
<div class="card shadow">
<div class="card-body">
<h4>Clients</h4>
<a href="{{ route('clients.index') }}" class="btn btn-primary">Voir</a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow">
<div class="card-body">
<h4>Produits</h4>
<a href="{{ route('produits.index') }}" class="btn btn-success">Voir</a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow">
<div class="card-body">
<h4>Commandes</h4>
<a href="{{ route('commandes.index') }}" class="btn btn-warning">Voir</a>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow">
<div class="card-body">
<h4>Factures</h4>
<a href="{{ route('factures.index') }}" class="btn btn-danger">Voir</a>
</div>
</div>
</div>

</div>

</div>

@endsection