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

        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->decimal('prix', 8, 2);
            $table->integer('quantite');
            $table->decimal('poid', 5, 2);
            $table->foreignId('categories_id')->constrained();
            $table->string('image')->default('default.png'); // Nouvelle colonne pour l'image avec une valeur par défaut
            $table->timestamps(); // Assurez-vous que cette ligne est présente pour les colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('produits');
    }
};
