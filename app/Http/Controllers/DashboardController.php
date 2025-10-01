<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Order;
use App\Models\Job;
use App\Models\Trip;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // User stats
        $totalUsers = User::count();
        $newUsers = User::where('created_at', '>=', now()->subDays(30))->count();
        $recentUsers = User::where('created_at', '>=', now()->subDays(7))->count();
        $latestUsers = User::orderBy('created_at', 'desc')->take(5)->get();
        
        // Recent subscribers (users who recently registered)
        $recentSubscribers = User::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Top performers (users with most orders)
        $topPerformers = User::withCount('orders')
            ->orderByDesc('orders_count')
            ->limit(6)
            ->get();
        
        // Order stats
        $totalOrders = Order::count();
        $recentOrders = Order::where('created_at', '>=', now()->subDays(30))->count();
        $orderRevenue = Order::sum('cost_amount'); // Using cost_amount instead of total_amount
        $monthlyOrderData = $this->getMonthlyOrderData();
        
        // Job stats
        $totalJobs = Job::count();
        $completedJobs = Job::whereHas('latest', function($query) {
            $query->where('status', 'Completed');
        })->count();
        $ongoingJobs = Job::whereHas('latest', function($query) {
            $query->where('status', 'Accepted')->orWhere('status', 'Assigned');
        })->count();
        $jobsByTypeData = $this->getJobsByType();
        
        // Trip stats
        $totalTrips = Trip::count();
        $completedTrips = Trip::where('status', 'Completed')->count();
        $cancelledTrips = Trip::where('status', 'Cancelled')->count();
        $monthlyTripData = $this->getMonthlyTripData();
        
        // Product stats
        $totalProducts = Product::count();
        $activeProducts = Product::where('active', true)->count();
        $productCategoryData = $this->getProductCategoryData();
        
        // Geography data
        $ordersByLocation = $this->getOrdersByLocation();
        
        return view('dashboard/index', compact(
            'totalUsers', 'newUsers', 'recentUsers', 'latestUsers', 'recentSubscribers', 'topPerformers',
            'totalOrders', 'recentOrders', 'orderRevenue', 'monthlyOrderData',
            'totalJobs', 'completedJobs', 'ongoingJobs', 'jobsByTypeData',
            'totalTrips', 'completedTrips', 'cancelledTrips', 'monthlyTripData',
            'totalProducts', 'activeProducts', 'productCategoryData',
            'ordersByLocation'
        ));
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

    /**
     * Get monthly order data for the sales chart
     */
    private function getMonthlyOrderData()
    {
        return Order::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count, SUM(cost_amount) as revenue')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [date('Y')])
            ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
            ->orderBy('month')
            ->get()
            ->map(function($item) {
                $monthNames = [
                    1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
                    7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
                ];
                
                return [
                    'month' => $monthNames[$item->month],
                    'count' => $item->count,
                    'revenue' => $item->revenue
                ];
            });
    }

    /**
     * Get jobs data grouped by type for the chart
     */
    private function getJobsByType()
    {
        // Using the relationship to job_details to get the status
        return DB::table('jobs')
            ->join('job_details', 'jobs.id', '=', 'job_details.job_id')
            ->selectRaw('job_details.status, COUNT(*) as count')
            ->whereIn('job_details.id', function($query) {
                // Get the latest job_detail for each job
                $query->select(DB::raw('MAX(id)'))
                    ->from('job_details')
                    ->groupBy('job_id');
            })
            ->groupBy('job_details.status')
            ->get()
            ->mapWithKeys(function($item) {
                return [$item->status => $item->count];
            });
    }

    /**
     * Get monthly trip data for trends
     */
    private function getMonthlyTripData()
    {
        return Trip::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count, status')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [date('Y')])
            ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'), 'status')
            ->orderBy('month')
            ->get()
            ->groupBy('month')
            ->map(function($items, $month) {
                $monthNames = [
                    1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
                    7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
                ];
                
                $data = ['month' => $monthNames[(int)$month]];
                
                foreach ($items as $item) {
                    $data[strtolower($item->status)] = $item->count;
                }
                
                return $data;
            })
            ->values();
    }

    /**
     * Get product data by category
     */
    private function getProductCategoryData()
    {
        return Product::selectRaw('product_category_id, COUNT(*) as count')
            ->groupBy('product_category_id')
            ->get()
            ->pluck('count', 'product_category_id');
    }

    /**
     * Get orders by location for map visualization
     */
    private function getOrdersByLocation()
    {
        return Order::join('addresses', 'orders.address_id', '=', 'addresses.id')
            ->join('address_details', 'addresses.id', '=', 'address_details.address_id')
            ->join('cities', 'address_details.city', '=', 'cities.name')
            ->selectRaw('cities.name as city, COUNT(*) as count')
            ->groupBy('cities.name')
            ->orderByDesc('count')
            ->limit(10)
            ->get();
    }
}
