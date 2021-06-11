<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('hotel_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('sales_price');
            $table->unsignedInteger('purchase_price');
            $table->date('arrival_date')->index();
            $table->date('purchase_day')->index();
            $table->smallInteger('nights')->unsigned();
            $table->tinyInteger('accepted')->nullable();
            $table->tinyInteger('weekend_stay')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
