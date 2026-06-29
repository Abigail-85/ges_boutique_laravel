@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

<h2>Liste des clients</h2>

<a href="{{ route('clients.create') }}" class="btn btn-primary">
Ajouter un client
</a>

</div>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Téléphone</th>
<th>Adresse</th>
<th>Email</th>
<th>Actions</th>
</tr>

</thead>

<tbody>

@foreach($clients as $client)

<tr>

<td>{{ $client->id }}</td>
<td>{{ $client->nom }}</td>
<td>{{ $client->prenom }}</td>
<td>{{ $client->telephone }}</td>
<td>{{ $client->adresse }}</td>
<td>{{ $client->email }}</td>

<td>

<a href="{{ route('clients.show',$client->id) }}" class="btn btn-info btn-sm">Voir</a>

<a href="{{ route('clients.edit',$client->id) }}" class="btn btn-warning btn-sm">Modifier</a>

<form action="{{ route('clients.destroy',$client->id) }}" method="POST" class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Supprimer ce client ?')">
Supprimer
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection