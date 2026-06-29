@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Liste des commandes</h2>

    <a href="{{ route('commandes.create') }}" class="btn btn-primary">
        Nouvelle commande
    </a>

</div>


<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>
            <th>N°</th>
            <th>Client</th>
            <th>Date</th>
            <th>Produits</th>
            <th>Montant</th>
            <th>Actions</th>
        </tr>

    </thead>


    <tbody>


    @foreach($commandes as $commande)

        <tr>

            <td>
                {{ $commande->id }}
            </td>


            <td>
                {{ $commande->client->nom }}
                {{ $commande->client->prenom }}
            </td>


            <td>
                {{ $commande->date_commande }}
            </td>


            <td>

                @foreach($commande->produits as $produit)

                    <span class="badge bg-secondary">

                        {{ $produit->designation }}

                        ({{ $produit->pivot->quantite }})

                    </span>

                    <br>

                @endforeach

            </td>


            <td>
                {{ number_format($commande->montant_total,0,' ',' ') }}
                FCFA
            </td>



            <td>


                <a href="{{ route('commandes.show',$commande->id) }}" 
                   class="btn btn-info btn-sm">
                    Voir
                </a>


                <a href="{{ route('commandes.edit',$commande->id) }}" 
                   class="btn btn-warning btn-sm">
                    Modifier
                </a>



                <a href="{{ route('factures.pdf',$commande->id) }}"
                   class="btn btn-success btn-sm">

                    Télécharger facture

                </a>




                <form action="{{ route('commandes.destroy',$commande->id) }}" 
                      method="POST" 
                      class="d-inline">

                    @csrf
                    @method('DELETE')


                    <button class="btn btn-danger btn-sm">
                        Supprimer
                    </button>

                </form>


            </td>

        </tr>


    @endforeach


    </tbody>

</table>


@endsection