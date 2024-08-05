<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->string('id_produit')->primary();
            $table->unsignedInteger('id'); // Clé étrangère id du partenaire
            $table->foreign('id')->references('id')->on('partenaires')->onDelete('cascade');
            $table->string('type')->nullable();//enum('type',['TV/Monitors','PC','Gaming/Console','Phones'])->nullable();
            $table->string('nom');
            $table->integer('quantite');
            $table->decimal('prix', 10, 2); // 10 chiffres au total, 2 chiffres après la virgule
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
