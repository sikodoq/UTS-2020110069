<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->json('types');
            $table->double('height', 5, 2);
            $table->double('weight', 5, 1);
            $table->json('abilities');
            $table->json('evolutions');
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('sp_attack');
            $table->integer('sp_defense');
            $table->integer('speed');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemons');
    }
}
