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
        Schema::create('competfree', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_demandes'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table users
            $table->foreign('id_demandes')->references('id')->on('demandes'); // Définition de la contrainte de clé étrangère
            $table->unsignedBigInteger('id_competences'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table users
            $table->foreign('id_competences')->references('id')->on('competences'); // Définition de la contrainte de clé étrangère
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competfree');

    }
};
