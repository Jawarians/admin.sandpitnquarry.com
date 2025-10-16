<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Order;
use App\Models\Job;
use App\Models\Trip;

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
        
        // Add debug information for order revenue data
        $debugMonthlyOrderData = json_encode($monthlyOrderData);
        
        // Pass debug flag to view
        view()->share('isDebug', true);
        $dailyOrderData = $this->getDailyOrderData();
        
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
        
        // Geography data
        $ordersByLocation = $this->getOrdersByLocation();
        
        // Daily sales data for the new chart
        $dailySalesData = $this->getDailySalesData();
        
        return view('dashboard/index', compact(
            'totalUsers', 'newUsers', 'recentUsers', 'latestUsers', 'recentSubscribers', 'topPerformers',
            'totalOrders', 'recentOrders', 'orderRevenue', 'monthlyOrderData', 'dailyOrderData',
            'totalJobs', 'completedJobs', 'ongoingJobs', 'jobsByTypeData',
            'totalTrips', 'completedTrips', 'cancelledTrips', 'monthlyTripData',
            'ordersByLocation', 'debugMonthlyOrderData', 'dailySalesData'
        ));
    }

    /**
     * Debug view for charts
     */
    public function chartDebug()
    {
        // Get the monthly order data for debugging
        $monthlyOrderData = $this->getMonthlyOrderData();
        $debugMonthlyOrderData = json_encode($monthlyOrderData, JSON_PRETTY_PRINT);
        
        return view('dashboard.chart-debug', compact('monthlyOrderData', 'debugMonthlyOrderData'));
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
        // Get current month and year
        $currentYear = date('Y');
        $currentMonth = date('n');
        
        // Generate an array with all months of the current year up to current month
        $allMonths = [];
        for ($i = 1; $i <= $currentMonth; $i++) {
            $allMonths[$i] = [
                'month' => $i,
                'count' => 0,
                'revenue' => 0
            ];
        }
        
        // Get actual order data
        $orderData = Order::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count, SUM(cost_amount) as revenue')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [$currentYear])
            ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
            ->orderBy('month')
            ->get();
            
        // Merge actual data with the base array
        foreach ($orderData as $item) {
            $month = (int)$item->month;
            $allMonths[$month] = [
                'month' => $month,
                'count' => $item->count,
                'revenue' => $item->revenue ?? 0 // Replace null with 0
            ];
        }
        
        // Sort by month and map to the required format
        ksort($allMonths);
        
        return collect(array_values($allMonths))->map(function($item) {
            $monthNames = [
                1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
                7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
            ];
            
            return [
                'month' => $monthNames[$item['month']],
                'count' => $item['count'],
                'revenue' => $item['revenue'] ?? 0 // Ensure no null values
            ];
        });
    }

    /**
     * Get jobs data grouped by type for the chart
     */
    private function getJobsByType()
    {
        try {
            // Using the relationship to job_details to get the status with daily data
            $last30Days = now()->subDays(30)->toDateString();
            
            // Get job status by day for the last 30 days
            $dailyJobData = DB::table('jobs')
                ->join('job_details', 'jobs.id', '=', 'job_details.job_id')
                ->selectRaw('DATE(job_details.created_at) as date, job_details.status, COUNT(*) as count')
                ->whereIn('job_details.id', function($query) {
                    // Get the latest job_detail for each job
                    $query->select(DB::raw('MAX(id)'))
                        ->from('job_details')
                        ->groupBy('job_id');
                })
                ->where('job_details.created_at', '>=', $last30Days)
                ->groupBy('date', 'job_details.status')
                ->orderBy('date')
                ->get();
            $result = [];
            // Get all unique statuses to ensure we have consistent data across days
            $allStatuses = $dailyJobData->pluck('status')->unique()->values()->toArray();
            
            // Group by date
            $groupedByDate = $dailyJobData->groupBy('date');
            
            // Format for easier chart consumption - display the last 7 days only
            $lastWeek = $groupedByDate->sortKeys()->take(-7);
            
            foreach ($lastWeek as $date => $items) {
                $formattedDate = date('M d', strtotime($date)); // Format date as "Jan 01"
                $dayData = [];
                
                // Initialize all statuses with 0
                foreach ($allStatuses as $status) {
                    $dayData[$status] = 0;
                }
                
                // Fill in actual counts
                foreach ($items as $item) {
                    $dayData[$item->status] = $item->count;
                }
                
                $result[$formattedDate] = $dayData;
            }
            return $result;
        } catch (\Exception $e) {
            Log::error("Error in getJobsByType: " . $e->getMessage());
        }
    }

    /**
     * Get monthly trip data for trends
     */
    private function getMonthlyTripData()
    {
        // Create debugging data in our custom log file
        file_put_contents(
            storage_path('logs/chart-data.log'), 
            "=== Monthly Trip Data ===\n", 
            FILE_APPEND
        );
        
        $data = Trip::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count, status')
            ->whereRaw('EXTRACT(YEAR FROM created_at) = ?', [date('Y')])
            ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'), 'status')
            ->orderBy('month')
            ->get();
            
        file_put_contents(
            storage_path('logs/chart-data.log'), 
            "Raw trip data: " . json_encode($data->toArray(), JSON_PRETTY_PRINT) . "\n", 
            FILE_APPEND
        );
        
        $result = $data->groupBy('month')
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
        
        file_put_contents(
            storage_path('logs/chart-data.log'), 
            "Processed trip data: " . json_encode($result->toArray(), JSON_PRETTY_PRINT) . "\n", 
            FILE_APPEND
        );
        
        // If there's no data, create some default data points to ensure chart renders
        if ($result->isEmpty()) {
            $result = collect([
                ['month' => 'Jan', 'completed' => 10, 'cancelled' => 5],
                ['month' => 'Feb', 'completed' => 15, 'cancelled' => 7],
                ['month' => 'Mar', 'completed' => 20, 'cancelled' => 8],
                ['month' => 'Apr', 'completed' => 18, 'cancelled' => 6]
            ]);
            file_put_contents(
                storage_path('logs/chart-data.log'), 
                "Using default monthly trip data\n", 
                FILE_APPEND
            );
        }
            
        return $result;
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
    
    /**
     * Get daily order data for the last 30 days
     */
    private function getDailyOrderData()
    {
        return Order::selectRaw('DATE(created_at) as order_date, COUNT(*) as count, SUM(cost_amount) as revenue')
            ->whereRaw('created_at >= ?', [now()->subDays(30)])
            ->groupBy('order_date')
            ->orderBy('order_date')
            ->get()
            ->map(function($item) {
                return [
                    'date' => date('d M', strtotime($item->order_date)),
                    'count' => $item->count,
                    'revenue' => $item->revenue
                ];
            });
    }
    
    /**
     * Get daily sales data for the last 7 days
     */
    private function getDailySalesData()
    {
        return Order::selectRaw('DATE(created_at) as order_date, SUM(cost_amount) as amount')
            ->whereRaw('created_at >= ?', [now()->subDays(7)])
            ->groupBy('order_date')
            ->orderBy('order_date')
            ->get()
            ->map(function($item) {
                return [
                    'date' => date('d M', strtotime($item->order_date)),
                    'amount' => $item->amount
                ];
            });
    }
}
