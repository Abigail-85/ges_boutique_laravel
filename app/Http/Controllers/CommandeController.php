<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{

    /**
     * Afficher toutes les commandes
     */
    public function index()
    {
        $commandes = Commande::with('client','produits')->get();

        return view('commandes.index', compact('commandes'));
    }



    /**
     * Formulaire d'ajout
     */
    public function create()
    {
        $clients = Client::all();

        $produits = Produit::all();

        return view('commandes.create', compact('clients','produits'));
    }



    /**
     * Enregistrer une commande
     */
    public function store(Request $request)
    {

        $request->validate([

            'client_id' => 'required',

            'date_commande' => 'required',

            'produits' => 'required|array',

            'quantites' => 'required|array'

        ]);



        DB::transaction(function () use ($request) {


            $montant_total = 0;



            // Vérification stock + calcul total

            foreach($request->produits as $index => $produit_id)
            {

                $produit = Produit::findOrFail($produit_id);


                $quantite = $request->quantites[$index];



                if($produit->quantite_stock < $quantite)
                {

                    throw new \Exception(
                        "Stock insuffisant pour ".$produit->designation
                    );

                }



                $montant_total += $produit->prix * $quantite;

            }





            // Création de la commande

            $commande = Commande::create([

                'client_id' => $request->client_id,

                'date_commande' => $request->date_commande,

                'montant_total' => $montant_total,

                'statut' => 'En attente'

            ]);







            // Enregistrement des produits commandés

            foreach($request->produits as $index => $produit_id)
            {

                $produit = Produit::findOrFail($produit_id);


                $quantite = $request->quantites[$index];



                $commande->produits()->attach(

                    $produit_id,

                    [

                        'quantite' => $quantite,

                        'prix_unitaire' => $produit->prix,

                        'sous_total' => $produit->prix * $quantite

                    ]

                );





                // Réduction du stock

                $produit->update([

                    'quantite_stock' => 
                    $produit->quantite_stock - $quantite

                ]);

            }



        });



        return redirect()

            ->route('commandes.index')

            ->with(
                'success',
                'Commande enregistrée avec succès'
            );

    }





    /**
     * Afficher une commande
     */
    public function show(Commande $commande)
    {

        $commande->load('client','produits');


        return view(
            'commandes.show',
            compact('commande')
        );

    }





    /**
     * Modifier une commande
     */
    public function edit(Commande $commande)
    {

        $clients = Client::all();

        $produits = Produit::all();


        return view(
            'commandes.edit',
            compact(
                'commande',
                'clients',
                'produits'
            )
        );

    }





    /**
     * Modifier une commande
     */
    public function update(Request $request, Commande $commande)
    {

        $request->validate([

            'client_id' => 'required',

            'date_commande' => 'required',

            'statut' => 'required'

        ]);



        $commande->update([

            'client_id' => $request->client_id,

            'date_commande' => $request->date_commande,

            'statut' => $request->statut

        ]);



        return redirect()

            ->route('commandes.index')

            ->with(
                'success',
                'Commande modifiée avec succès'
            );

    }





    /**
     * Supprimer une commande
     */
    public function destroy(Commande $commande)
    {

        DB::transaction(function () use ($commande) {



            // Restaurer le stock

            foreach($commande->produits as $produit)
            {

                $produit->update([

                    'quantite_stock' =>

                    $produit->quantite_stock
                    +
                    $produit->pivot->quantite

                ]);

            }





            // Supprimer les produits liés

            $commande->produits()->detach();




            // Supprimer la commande

            $commande->delete();


        });



        return redirect()

            ->route('commandes.index')

            ->with(
                'success',
                'Commande supprimée avec succès'
            );

    }

}