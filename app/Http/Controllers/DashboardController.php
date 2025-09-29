<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Job;
use App\Models\Trip;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $newUsers = User::where('created_at', '>=', now()->subDays(30))->count();
        $recentUsers = User::where('created_at', '>=', now()->subDays(7))->count();
        $latestUsers = User::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('dashboard/index', compact('totalUsers', 'newUsers', 'recentUsers', 'latestUsers'));
    }
    
    public function index2()
    {
        return view('dashboard/index2');
    }
    
    public function index3()
    {
        return view('dashboard/index3');
    }
    
    public function index4()
    {
        return view('dashboard/index4');
    }
    
    public function index5()
    {
        return view('dashboard/index5');
    }
    
    public function index6()
    {
        return view('dashboard/index6');
    }
    
    public function index7()
    {
        return view('dashboard/index7');
    }
    
    public function index8()
    {
        return view('dashboard/index8');
    }
    
    public function index9()
    {
        return view('dashboard/index9');
    }
    
    public function index10()
    {
        return view('dashboard/index10');
    }

    /**
     * Analyst dashboard: quick metrics and recent items for Orders, Jobs, Trips.
     */
    public function analyst()
    {
        $ordersCount = Order::count();
        $jobsCount = Job::count();
        $tripsCount = Trip::count();

        $recentOrders = Order::orderBy('created_at', 'desc')->take(5)->get();
        $recentJobs = Job::orderBy('created_at', 'desc')->take(5)->get();
        $recentTrips = Trip::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard/analyst', compact(
            'ordersCount', 'jobsCount', 'tripsCount',
            'recentOrders', 'recentJobs', 'recentTrips'
        ));
    }

    
}
