<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_recetas', function ( Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->string('categoria')->comment('el nombre de la categoria');



        });


        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->text('ingredientes');
            $table->text('preparacion');
            $table->string('imagen');
            $table->foreignId('user_id')->references('id')->on('users')->comment('Llave foranea de user');
            $table->foreignId('categoria_id')->index('id')->on('categorias_recetas')->comment('La categoria de la receta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_recetas');
        Schema::dropIfExists('recetas');
    }
}
