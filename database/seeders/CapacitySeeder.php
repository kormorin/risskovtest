<?php

namespace Database\Seeders;

use App\Models\Capacity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CapacitySeeder extends Seeder
{
    public function run()
    {
    	Capacity::truncate();

        $csv = fopen(Storage::path('capacity.csv'), 'r');
        fgetcsv($csv);

        while($row = fgetcsv($csv))
        {
        	try
        	{
	        	Capacity::create([
	        		'hotel_id' => $row[0],
	        		'date' => $row[1],
	        		'capacity' => $row[2],
	        		'capacity_after_bookings' => $row[2],
	        	]);
        	}
        	catch(\Illuminate\Database\QueryException $e)
        	{
        		if(Str::contains($e->getMessage(), 'capacities.capacities_hotel_id_date_unique'))
        		{
//        			dump($row);
        			Capacity::where('hotel_id', $row[0])->where('date', $row[1])->delete();

		        	Capacity::create([
		        		'hotel_id' => $row[0],
		        		'date' => $row[1],
		        		'capacity' => $row[2],
		        		'capacity_after_bookings' => $row[2],
		        	]);
        		}
        		else
        		{
        			throw $e;
        		}
        	}
        }

        fclose($csv);

    }
}
