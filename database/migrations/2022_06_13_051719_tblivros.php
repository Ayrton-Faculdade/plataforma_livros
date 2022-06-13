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
            $table->binary('capa');
            $table->string('nome');
            $table->string('autor');
            $table->integer('ano');
            $table->integer('edicao');
            $table->string('editora');
            $table->integer('isbn');
            $table->string('categoria');
            $table->longText('descricao');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('estado')->default(true);

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
