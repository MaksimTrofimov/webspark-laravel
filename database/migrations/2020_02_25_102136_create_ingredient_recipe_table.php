<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ingredient_id');
            $table->unsignedBigInteger('recipe_id');
            $table->integer('quantity');
            $table->integer('unit');
            $table->timestamps();
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_recipe');
    }
}
