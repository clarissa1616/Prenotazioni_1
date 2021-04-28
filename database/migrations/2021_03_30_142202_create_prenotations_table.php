<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrenotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ID , PLAN_ID, START_DATE, CHECKOUT_DATE, N_ADULTS, N_CHILDREN, AGES_CHILDREN, TOTAL_PRICE, EMAIL
        Schema::create('prenotations', function (Blueprint $table) {
            $table->id();
            
            // Foreign key su plan 
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->string('code');
            $table->date('start_date');
            $table->date('checkout_date');
            $table->integer('n_adults');
            $table->integer('n_children');
            $table->string('ages_children');
            $table->float('total_price');
            $table->string('email');
            $table->boolean('is_accepted');
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
        Schema::dropIfExists('prenotations');
    }
}
