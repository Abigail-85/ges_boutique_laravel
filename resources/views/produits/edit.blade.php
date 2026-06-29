@extends('layouts.app')

@section('content')

<h2>Modifier un produit</h2>

<form action="{{ route('produits.update',$produit->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Référence</label>
<input type="text" name="reference" class="form-control" value="{{ $produit->reference }}">
</div>

<div class="mb-3">
<label>Désignation</label>
<input type="text" name="designation" class="form-control" value="{{ $produit->designation }}">
</div>

<div class="mb-3">
<label>Prix unitaire</label>
<input type="number" step="0.01" name="prix" class="form-control" value="{{ $produit->prix }}">
</div>

<div class="mb-3">
<label>Quantité en stock</label>
<input type="number" name="quantite_stock" class="form-control" value="{{ $produit->quantite_stock }}">
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control">{{ $produit->description }}</textarea>
</div>

<button class="btn btn-primary">
Modifier
</button>

<a href="{{ route('produits.index') }}" class="btn btn-secondary">
Retour
</a>

</form>

@endsection