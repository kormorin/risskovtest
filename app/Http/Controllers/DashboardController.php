<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Repository\DashboardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
	public $repository;

	public function __construct()
	{
		$this->repository = new DashboardRepository;
	}

    public function index()
    {
    	$task2 = $this->repository->getTask2();
    	$task3 = $this->repository->getTask3();
    	$task4 = $this->repository->getTask4();
    	$task5 = $this->repository->getTask5();

    	return view('dashboard', compact('task2', 'task3', 'task4', 'task5'));
    }
}
