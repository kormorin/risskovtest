<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookingSeeder extends Seeder
{
    public function run()
    {
        //Bookings-------------------------------------------------------------
    	Booking::truncate();

        $csv = fopen(Storage::path('bookings.csv'), 'r');
        fgetcsv($csv);

        while($row = fgetcsv($csv))
        {
        	Booking::create([
        		'id' => $row[0],
        		'hotel_id' => $row[1],
        		'customer_id' => $row[2],
        		'sales_price' => $row[3],
        		'purchase_price' => $row[4],
        		'arrival_date' => $row[5],
        		'purchase_day' => $row[6],
        		'nights' => $row[7],
        	]);
//        	dump($row);
        }

        fclose($csv);
    }
}
