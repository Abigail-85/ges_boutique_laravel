<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    public function index()
    {
        $produits = Produit::all();

        return view('produits.index', compact('produits'));
    }


    public function create()
    {
        return view('produits.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:produits',
            'designation' => 'required',
            'prix' => 'required|numeric',
            'quantite_stock' => 'required|integer',
            'description' => 'nullable'
        ]);


        Produit::create([
            'reference' => $request->reference,
            'designation' => $request->designation,
            'prix' => $request->prix,
            'quantite_stock' => $request->quantite_stock,
            'description' => $request->description
        ]);


        return redirect()
            ->route('produits.index')
            ->with('success','Produit ajouté avec succès');
    }



    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }



    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }



    public function update(Request $request, Produit $produit)
    {

        $request->validate([
            'reference' => 'required',
            'designation' => 'required',
            'prix' => 'required|numeric',
            'quantite_stock' => 'required|integer',
            'description' => 'nullable'
        ]);


        $produit->update([
            'reference' => $request->reference,
            'designation' => $request->designation,
            'prix' => $request->prix,
            'quantite_stock' => $request->quantite_stock,
            'description' => $request->description
        ]);


        return redirect()
            ->route('produits.index')
            ->with('success','Produit modifié avec succès');
    }



    public function destroy(Produit $produit)
    {
        $produit->delete();


        return redirect()
            ->route('produits.index')
            ->with('success','Produit supprimé');
    }
}