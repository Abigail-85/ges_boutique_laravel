<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Commande;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureController extends Controller
{

    public function index()
    {
        $factures = Facture::with('commande.client')->get();

        return view('factures.index', compact('factures'));
    }



    public function show(Facture $facture)
    {
        $facture->load(
            'commande.client',
            'commande.produits'
        );

        return view('factures.show', compact('facture'));
    }




    // Téléchargement PDF depuis une commande

    public function downloadPDF($id)
    {

        $commande = Commande::with(
            'client',
            'produits'
        )->findOrFail($id);



        $pdf = Pdf::loadView(
            'factures.pdf',
            compact('commande')
        );


        return $pdf->download(
            'facture_'.$commande->id.'.pdf'
        );

    }

}