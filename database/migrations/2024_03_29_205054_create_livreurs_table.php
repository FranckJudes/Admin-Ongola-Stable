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
        Schema::create('livreurs', function (Blueprint $table) {
            $table->id();
            $table->string('adresse')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('photo')->nullable();
            $table->string('telephone')->nullable();
            $table->string('sexe')->nullable();
            $table->string('password')->nullable();
            $table->string('photo_permi')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->enum('status',['1','2'])->default();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livreurs');
    }
};