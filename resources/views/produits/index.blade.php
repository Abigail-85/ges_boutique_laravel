@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

<h2>Liste des produits</h2>

<a href="{{ route('produits.create') }}" class="btn btn-success">
Ajouter un produit
</a>

</div>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Référence</th>
<th>Désignation</th>
<th>Prix</th>
<th>Stock</th>
<th>Description</th>
<th>Actions</th>
</tr>

</thead>

<tbody>

@foreach($produits as $produit)

<tr>

<td>{{ $produit->id }}</td>
<td>{{ $produit->reference }}</td>
<td>{{ $produit->designation }}</td>
<td>{{ $produit->prix }}</td>
<td>{{ $produit->quantite_stock }}</td>
<td>{{ $produit->description }}</td>

<td>

<a href="{{ route('produits.show',$produit->id) }}" class="btn btn-info btn-sm">
Voir
</a>

<a href="{{ route('produits.edit',$produit->id) }}" class="btn btn-warning btn-sm">
Modifier
</a>

<form action="{{ route('produits.destroy',$produit->id) }}" method="POST" class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Supprimer ce produit ?')">
Supprimer
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection