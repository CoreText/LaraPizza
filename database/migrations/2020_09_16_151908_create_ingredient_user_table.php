<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ingredient_id')
                ->references('id')
                ->on('ingredients')
                //->constrained()
            ;

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                //->constrained()
            ;

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_user');
    }
}
