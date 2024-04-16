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
        Schema::create('statuts', function (Blueprint $table) {
            $table->id();
            $table->string('statut');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('statuts')->insert([
            ['statut' => 'Brouillon'],
            ['statut' => 'Envoyé'],
            ['statut' => 'En cours de traitement'],
            ['statut' => 'Finie'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statut');
    }
};
