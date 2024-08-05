<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuivieLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suivie_livraisons', function (Blueprint $table) {
            $table->string('id_suivi')->primary(); // ID non entier
            $table->string('id_commande')->nullable();
            $table->foreign('id_commande')->references('id_commande')->on('commandes')->onDelete('cascade');
            $table->enum('status',['1','2'])->default(1);  // 1-valider , 2-non valider
            $table->enum('etat',['1','2','3','4'])->default(1);//1-en livraison 1-en preparation 3-livree 4-annuler  status des commandes
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
        Schema::dropIfExists('suivie_livraisons');
    }
}
