<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
        });

        \Illuminate\Support\Facades\DB::table('categorias')->insert([
            ['nome'=>'Ação e aventura'],
            ['nome'=>'Arte e Fotografia'],
            ['nome'=>'Autoajuda'],
            ['nome'=>'Biografia'],
            ['nome'=>'Conto'],
            ['nome'=>'Crimes Reais'],
            ['nome'=>'Distopia'],
            ['nome'=>'Ensaios'],
            ['nome'=>'Fantasia'],
            ['nome'=>'Ficção científica'],
            ['nome'=>'Ficção Contemporânea'],
            ['nome'=>'Ficção Feminina'],
            ['nome'=>'Ficção histórica'],
            ['nome'=>'Ficção Policial'],
            ['nome'=>'Gastronomia'],
            ['nome'=>'Gêneros de não ficção'],
            ['nome'=>'Graphic Novel'],
            ['nome'=>'Guias & Como fazer '],
            ['nome'=>'História'],
            ['nome'=>'Horror'],
            ['nome'=>'Humanidades e Ciências Sociais'],
            ['nome'=>'Humor'],
            ['nome'=>'Infantil'],
            ['nome'=>'LGBTQ+'],
            ['nome'=>'Memórias e autobiografia'],
            ['nome'=>'New adult – Novo Adulto'],
            ['nome'=>'Paternidade e família'],
            ['nome'=>'Realismo mágico'],
            ['nome'=>'Religião e Espiritualidade'],
            ['nome'=>'Romance'],
            ['nome'=>'Tecnologia e Ciência'],
            ['nome'=>'Thriller e Suspense'],
            ['nome'=>'Viajem'],
            ['nome'=>'Young adult – Jovem adulto'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
