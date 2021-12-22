<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->integer('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('keyboard_id');
            $table->string('keyboard_name');
            $table->string('keyboard_image');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('keyboard_id')->references('id')->on('keyboards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
