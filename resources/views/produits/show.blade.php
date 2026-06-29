@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-header">

<h3>Détails du produit</h3>

</div>

<div class="card-body">

<p><strong>Référence :</strong> {{ $produit->reference }}</p>

<p><strong>Désignation :</strong> {{ $produit->designation }}</p>

<p><strong>Prix unitaire :</strong> {{ $produit->prix_unitaire }} FCFA</p>

<p><strong>Stock :</strong> {{ $produit->quantite_stock }}</p>

<p><strong>Description :</strong> {{ $produit->description }}</p>

<a href="{{ route('produits.index') }}" class="btn btn-secondary">
Retour
</a>

</div>

</div>

@endsection