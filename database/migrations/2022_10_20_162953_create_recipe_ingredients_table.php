<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recipe_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->integer('quantity')->nullable();
            $table->string('measure');
            $table->timestamps();


            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredients');
    }
}
