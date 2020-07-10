<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmeAtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filme_ators', function (Blueprint $table) {
            $table->id();
            $table->integer('filme_id')->unsigned();
            $table->foreign('filme_id')->references('id')->on('filmes');
            $table->integer('ator_id')->unsigned();
            $table->foreign('ator_id')->references('id')->on('atores');
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
        Schema::dropIfExists('filme_ators');
    }
}
