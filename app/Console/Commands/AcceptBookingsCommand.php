<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\Capacity;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AcceptBookingsCommand extends Command
{
    protected $signature = 'risskov:accept-bookings';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $bookings = Booking::orderBy('purchase_day', 'asc')->cursor();
        foreach($bookings as $booking)
        {
            $first_day_home = $booking->arrival_date->copy()->addDays($booking->nights);

            $booking->weekend_stay =
                $first_day_home->gt($booking->arrival_date->nextWeekendDay());

            $capacities = Capacity::where('hotel_id', $booking->hotel_id)
                ->where('date', '>=', $booking->arrival_date)
                ->where('date', '<', $first_day_home)
                ->get();
            
            if($capacities->count() !== $booking->nights)
            {
                $booking->accepted = 0;
                $booking->save();

                echo "Capacities data missing, booking rejected." . PHP_EOL;
            }
            else
            {
                $booking_possible = $capacities->where('capacity_after_bookings', 0)->isEmpty();

                if($booking_possible)
                {
                    foreach($capacities as $capacity_record)
                    {
                        $capacity_record->capacity_after_bookings -= 1;
                        $capacity_record->save();
                    }

                    $booking->accepted = 1;

                    echo "accepted" . PHP_EOL;                    
                }
                else
                {
                    $booking->accepted = 0;

                    echo "rejected" . PHP_EOL;                    
                }
            }

            $booking->save();
        }

        return 0;
    }
}
