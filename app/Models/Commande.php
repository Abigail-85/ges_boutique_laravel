<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'client_id',
        'date_commande',
        'montant_total',
        'statut'
    ];


    protected $casts = [
        'date_commande' => 'date',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produits')
                    ->withPivot(
                        'quantite',
                        'prix_unitaire',
                        'sous_total'
                    )
                    ->withTimestamps();
    }


    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}