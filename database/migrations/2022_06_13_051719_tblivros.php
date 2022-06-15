<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tblivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblivros', function (Blueprint $table) {
            $table->id();
            $table->mediumText('capa');
            $table->string('nome');
            $table->string('autor');
            $table->integer('ano');
            $table->integer('edicao');
            $table->string('editora');
            $table->integer('isbn');
            $table->integer('categoria')->unsigned();
            $table->longText('descricao');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('tipo');
            $table->tinyInteger('status')->unsigned()->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblivros');
    }
}
