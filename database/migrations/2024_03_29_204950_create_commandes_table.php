<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->string('id_commande')->primary(); // clé primaire non entière
            $table->unsignedInteger('id_partenaire');// ici c'est l'id du partenaire
            $table->string('type_livraison')->nullable();
            $table->text('elementColis');
            $table->string('reference')->nullable();
            $table->decimal('totaux', 8, 2);
            $table->time('heuredelivraison');
            $table->foreignId('id_receive_client')->constrained('id')->on('receive_clients')->onDelete('cascade');
            $table->foreign('id_partenaire')->references('id')->on('partenaires')->onDelete('cascade'); //id du partenaire
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('commande_produits', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_commande');
            $table->foreign('id_commande')->references('id_commande')->on('commandes')->onDelete('cascade');
            $table->string('id_produit');
            $table->foreign('id_produit')->references('id_produit')->on('produits')->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix', 8, 2);
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
        Schema::dropIfExists('commandes');
        
        Schema::dropIfExists('commande_produit');
    }
}
