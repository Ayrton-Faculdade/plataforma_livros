<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTblivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tblivros', function (Blueprint $table){
            $table->foreignId('categoria')->change();
            $table->foreign('categoria', 'fk_categoria_livro')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tblivros', function (Blueprint $table){
            $table->dropForeign('fk_categoria_livro');
        });
    }
}
