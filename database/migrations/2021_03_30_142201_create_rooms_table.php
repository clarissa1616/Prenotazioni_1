<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ROOMS = (ID, CODE(string), model(string), description(text), price(int), floor(int), n_adults, n_children, n_baths, jacuzzi(bool), shower(bool), balcony(bool), active(bool) ) NOT NULL
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('model');
            $table->text('description');
            $table->float('price');
            $table->integer('floor');
            $table->integer('n_adults');
            $table->integer('n_children');
            $table->integer('n_baths');
            $table->boolean('jacuzzi');
            $table->boolean('shower');
            $table->boolean('balcony');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
