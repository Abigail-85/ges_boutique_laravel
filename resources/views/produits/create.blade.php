@extends('layouts.app')

@section('content')

<h2>Ajouter un produit</h2>

<form action="{{ route('produits.store') }}" method="POST">

@csrf

<div class="mb-3">
<label>Référence</label>
<input type="text" name="reference" class="form-control">
</div>

<div class="mb-3">
<label>Désignation</label>
<input type="text" name="designation" class="form-control">
</div>

<div class="mb-3">
<label>Prix unitaire</label>
<input type="number" step="0.01" name="prix" class="form-control">
</div>

<div class="mb-3">
<label>Quantité en stock</label>
<input type="number" name="quantite_stock" class="form-control">
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<button class="btn btn-success">
Enregistrer
</button>

<a href="{{ route('produits.index') }}" class="btn btn-secondary">
Retour
</a>

</form>

@endsection