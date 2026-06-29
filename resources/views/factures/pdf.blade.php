<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<style>

body{
    font-family: DejaVu Sans, sans-serif;
    font-size: 14px;
    color: #333;
}


.header{

    text-align:center;
    margin-bottom:30px;

}


.header h1{

    margin:0;
    font-size:30px;
    color:#2563eb;

}


.header p{

    margin:5px;

}



.box{

    width:100%;
    margin-bottom:20px;

}


.box table{

    width:100%;
    border-collapse:collapse;

}


.box td{

    padding:8px;

    border:1px solid #ddd;

}



.products{

    width:100%;
    border-collapse:collapse;
    margin-top:20px;

}


.products th{

    background:#2563eb;
    color:white;
    padding:10px;

}


.products td{

    border:1px solid #ddd;
    padding:8px;

}



.total{

    margin-top:25px;

    text-align:right;

    font-size:18px;

    font-weight:bold;

}



.footer{

    margin-top:50px;

    text-align:center;

    font-size:12px;

    color:#777;

}


</style>


</head>


<body>



<div class="header">

<h1>BOUTIQUE ALI</h1>

<p>Facture de vente</p>

</div>




<div class="box">

<table>


<tr>

<td>

<strong>N° Commande :</strong>

CMD-{{ $commande->id }}

</td>


<td>

<strong>Date :</strong>

{{ $commande->date_commande }}

</td>


</tr>



<tr>

<td colspan="2">

<strong>Client :</strong>

{{ $commande->client->nom }}

{{ $commande->client->prenom }}


<br>


<strong>Téléphone :</strong>

{{ $commande->client->telephone }}

<br>
<strong>Email :</strong>

{{ $commande->client->email }}
<br>
<strong>Adresse :</strong>

{{ $commande->client->adresse }}
</td>


</tr>


</table>

</div>





<table class="products">


<tr>

<th>Produit</th>

<th>Quantité</th>

<th>Prix</th>

<th>Sous total</th>

</tr>




@foreach($commande->produits as $produit)


<tr>


<td>

{{ $produit->designation }}

</td>


<td align="center">

{{ $produit->pivot->quantite }}

</td>



<td align="right">

{{ number_format($produit->pivot->prix_unitaire,0,' ',' ') }}

FCFA

</td>



<td align="right">

{{ number_format($produit->pivot->sous_total,0,' ',' ') }}

FCFA

</td>


</tr>



@endforeach



</table>





<div class="total">


TOTAL :

{{ number_format($commande->montant_total,0,' ',' ') }}

FCFA


</div>





<div class="footer">

Merci pour votre achat.

<br>

BOUTIQUE ALI - À bientôt !

</div>



</body>

</html>