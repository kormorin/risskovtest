<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('hotel_id');
            $table->date('date');
            $table->smallInteger('capacity')->unsigned();
            $table->smallInteger('capacity_after_bookings')->unsigned();
            $table->timestamps();

            $table->unique(['hotel_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacities');
    }
}
