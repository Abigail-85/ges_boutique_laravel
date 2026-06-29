<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'commande_id',
        'numero_facture',
        'date_facture',
        'montant_total'
    ];

    protected $casts = [
        'date_facture' => 'date',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}