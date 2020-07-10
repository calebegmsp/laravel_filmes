<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationFilmeGeneros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Filmes', function (Blueprint $table) {
            $table->integer('genero_id')->unsigned();
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Filmes', function (Blueprint $table) {
            $table->dropForeign(['genero_id']);
            $table->dropColumn('genero_id');
        });
    }
}
