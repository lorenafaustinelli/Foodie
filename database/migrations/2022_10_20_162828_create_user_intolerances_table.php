<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserIntolerancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_intolerances', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('intolerance_id')->unsigned();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_intolerances');
    }
}
