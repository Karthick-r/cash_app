<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->increments('reading_id');
            $table->integer('water_reading');
            $table->integer('water_maintance_reading')->default(0);
            $table->integer('today_water_reading')->default(0);
            $table->integer('water_price')->default(0);


            $table->integer('bottle_reading');


            $table->integer('bottle_maintance_reading')->default(0);
            $table->integer('bottle_today_reading')->default(0);
            $table->integer('bottle_price')->default(0);
            $table->integer('store_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->integer('route_id')->default(0);
            $table->integer('salary')->default(0);
            $table->integer('cash_collect')->default(0);
            $table->integer('status')->default(1);



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
        Schema::dropIfExists('readings');
    }
}
