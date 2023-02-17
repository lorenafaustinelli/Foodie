<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recipe_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('category_id2')->unsigned()->nullable(); 
            $table->timestamps();


            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('category_id2')->references('id')->on('categories')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_categories');
    }
}
