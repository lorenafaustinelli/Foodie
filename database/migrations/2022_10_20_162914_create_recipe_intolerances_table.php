<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeIntolerancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_intolerances', function (Blueprint $table) {
            $table->bigInteger('recipe_id')->unsigned();
            $table->bigInteger('intolerance_id')->unsigned();
            $table->timestamps();
            

            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('intolerance_id')->references('id')->on('intolerances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_intolerances');
    }
}
