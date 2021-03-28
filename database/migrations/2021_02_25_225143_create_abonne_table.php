<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonne', function (Blueprint $table) {
            $table->increments('id');
            $table->string('civilite');
            $table->string('etat_social');
            $table->string('sexe');
            $table->string('cin');
            $table->string('n_compteur')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->text('adresse');
            $table->string('tel');
            $table->string('rib');
            $table->string('email');
            $table->integer('nbr_enfant');
            $table->float('montant');
            $table->text('note');
            $table->integer('dernier_index_compteur');
            $table->date('date_inscription');
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
        Schema::dropIfExists('abonne');
    }
}
