<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateDenominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denominations', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('reading_id')->default(0);
             $table->integer('rs_2000')->default(0);
             $table->integer('rs_500')->default(0);
             $table->integer('rs_200')->default(0);
             $table->integer('rs_100')->default(0);
             $table->integer('rs_50')->default(0);
             $table->integer('rs_20')->default(0);
             $table->integer('rs_10')->default(0);
             $table->integer('rs_5')->default(0);
             $table->integer('rs_2')->default(0);
             $table->integer('rs_1')->default(0);
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
        Schema::dropIfExists('denominations');
    }
}
