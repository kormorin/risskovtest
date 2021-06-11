<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;

class DashboardRepository
{
	public function getTask2()
	{
		return DB::select("
			SELECT hotel_id, COUNT(*) AS cnt FROM bookings
			WHERE accepted = 1 AND weekend_stay = 1 GROUP BY hotel_id ORDER BY cnt ASC LIMIT 5;");
	}	

	public function getTask3()
	{
		return DB::select("
			SELECT
				hotel_id,
				(rejected_count / (accepted_count + rejected_count) ) * 100 as rejection_rate
			FROM
			(SELECT
				b.hotel_id,
			     (select count(*)  from bookings b1 where b1.hotel_id = b.hotel_id and accepted = 1) as accepted_count,
			     (select count(*)  from bookings b2 where b2.hotel_id = b.hotel_id and accepted = 0) as rejected_count
			FROM bookings b GROUP BY b.hotel_id) tmp;");
	}	

	public function getTask4()
	{
		return DB::select("
			SELECT
				week(purchase_day, 1) as week,
				sum(sales_price - purchase_price) as sum_profit
			FROM bookings
			GROUP BY week(purchase_day, 1)
			ORDER BY sum_profit DESC LIMIT 1;
			")[0];
	}	

	public function getTask5()
	{
		return DB::select("
			SELECT
				customer_id,
				count(*) as cnt
			FROM bookings
			WHERE
				accepted = 0
			GROUP BY customer_id
			ORDER BY cnt DESC LIMIT 5;");		
	}	
}