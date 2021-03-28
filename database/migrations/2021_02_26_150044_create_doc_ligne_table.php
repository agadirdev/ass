<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocLigneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_ligne', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_id');
            $table->string('doc_n');
            $table->string('doc_type');
            $table->string('doc_id_abonne');
            $table->string('doc_n_abonne');
            $table->string('doc_name_abonne');
            $table->string('ref');
            $table->string('designation');
            $table->string('unite');
            $table->float('qte');
            $table->float('prix');
            $table->float('total_ligne');

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
        Schema::dropIfExists('doc_ligne');
    }
}
