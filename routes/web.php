<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FactureController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Page d'accueil / Tableau de bord
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


// Gestion des clients
Route::resource('clients', ClientController::class);


// Gestion des produits
Route::resource('produits', ProduitController::class);


// Gestion des commandes
Route::resource('commandes', CommandeController::class);


// Gestion des factures

Route::get('/factures', [FactureController::class, 'index'])
    ->name('factures.index');


Route::get('/factures/{id}/pdf', [FactureController::class, 'downloadPDF'])
    ->name('factures.pdf');


Route::get('/factures/{id}', [FactureController::class, 'show'])
    ->name('factures.show');

// Télécharger une facture en PDF
Route::get('/factures/{id}/pdf', [FactureController::class, 'downloadPDF'])
    ->name('factures.pdf');


// Route de recherche produit (optionnel)
Route::get('/recherche-produits', [ProduitController::class, 'search'])
    ->name('produits.search');


// Route tableau de bord statistiques (optionnel)
Route::get('/dashboard', function () {

    return view('dashboard');

})->name('dashboard.statistiques');