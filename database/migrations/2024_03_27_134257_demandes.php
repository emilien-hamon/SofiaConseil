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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users'); // Utilisation de unsignedBigInteger pour référencer la clé primaire de la table users
            $table->foreign('id_users')->references('id')->on('users'); // Définition de la contrainte de clé étrangère
            $table->date('date_demande');
            $table->string('statut');
            $table->string('titre');
            $table->string('description');
            $table->string('competence');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
