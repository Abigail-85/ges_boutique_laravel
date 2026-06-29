@extends('layouts.app')

@section('content')

<h2>Nouvelle Commande</h2>

<form action="{{ route('commandes.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Client</label>

        <select name="client_id" class="form-control">

            @foreach($clients as $client)

                <option value="{{ $client->id }}">
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
               value="{{ date('Y-m-d') }}">

    </div>

    <hr>

    <h4>Produits</h4>

    <table class="table table-bordered" id="tableProduits">

        <thead>

            <tr>

                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th></th>

            </tr>

        </thead>

        <tbody>

            <tr>

                <td>

                    <select name="produits[]" class="form-control">

                        @foreach($produits as $produit)

                        <option
                            value="{{ $produit->id }}"
                            data-prix="{{ $produit->prix_unitaire }}">

                            {{ $produit->designation }}

                        </option>

                        @endforeach

                    </select>

                </td>

                <td>

                    <input type="number"
                           name="quantites[]"
                           class="form-control"
                           min="1"
                           value="1">

                </td>

                <td>

                    <input type="number"
                           name="prix[]"
                           class="form-control"
                           readonly>

                </td>

                <td>

                    <button type="button"
                            class="btn btn-danger supprimer">

                        X

                    </button>

                </td>

            </tr>

        </tbody>

    </table>

    <button type="button"
            id="ajouter"
            class="btn btn-secondary">

        Ajouter un produit

    </button>

    <br><br>

    <button class="btn btn-success">

        Enregistrer la commande

    </button>

</form>

<script>

document.addEventListener('DOMContentLoaded',function(){

    function majPrix(){

        document.querySelectorAll('#tableProduits tbody tr').forEach(function(row){

            let select=row.querySelector('select');

            let prix=select.options[select.selectedIndex].dataset.prix;

            row.querySelector('input[name="prix[]"]').value=prix;

        });

    }

    majPrix();

    document.addEventListener('change',majPrix);

    document.getElementById('ajouter').onclick=function(){

        let ligne=document.querySelector('#tableProduits tbody tr').cloneNode(true);

        document.querySelector('#tableProduits tbody').appendChild(ligne);

        majPrix();

    };

    document.addEventListener('click',function(e){

        if(e.target.classList.contains('supprimer')){

            if(document.querySelectorAll('#tableProduits tbody tr').length>1){

                e.target.closest('tr').remove();

            }

        }

    });

});

</script>

@endsection