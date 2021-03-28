<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsommationEauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consommation_eau', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_compteur');
            $table->string('periode');
            $table->date('date_debut');
            $table->integer('index_debut');
            $table->integer('date_fin');
            $table->date('index_fin');
            $table->integer('qte_consomme');
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
        Schema::dropIfExists('consommation_eau');
    }
}
