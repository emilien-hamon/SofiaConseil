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
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('competences')->insert([
            ['nom' => 'HTML', 'description' => 'HTML'],
            ['nom' => 'CSS', 'description' => 'CSS'],
            ['nom' => 'JS', 'description' => 'JS'],
            ['nom' => 'C#', 'description' => 'C#'],
            ['nom' => 'Kotlin', 'description' => 'Kotlin'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competences');
    }
};
