<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();

            // La facture appartient à une commande
            $table->foreignId('commande_id')
                  ->constrained()
                  ->onDelete('cascade');


            // Numéro de facture unique
            $table->string('numero_facture')
                  ->unique();


            // Date d'émission
            $table->date('date_facture');


            // Montant total
            $table->decimal('montant_total', 10, 2);


            // Exemple : Payée, Non payée
            $table->string('statut')
                  ->default('Non payée');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
