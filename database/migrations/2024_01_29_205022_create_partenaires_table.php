<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('nom');
            $table->string('adresse');
            $table->string('type');
            $table->string('cni')->nullable();
            $table->string('logo')->nullable();
            $table->time('heure_ouverture')->nullable();
            $table->time('heure_fermeture')->nullable();
            $table->string('password');
            $table->string('passwordConfirm');
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('partenaire_user', function (Blueprint $table) {
            $table->unsignedInteger('partenaires_id'); // Clé étrangère id du partenaire
            $table->foreign('partenaires_id')->references('id')->on('partenaires')->onDelete('cascade')->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->primary(['partenaires_id','user_id']);
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
        Schema::dropIfExists('partenaires');
    }
}
