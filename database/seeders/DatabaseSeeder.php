<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Capacity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(CapacitySeeder::class);
    	$this->call(BookingSeeder::class);
    }
}
