<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Wheel;
use App\Models\Product;
use App\Models\User;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orders(Request $request)
    {
        // Parse per_page parameter and ensure it's an integer
        $perPage = (int)$request->input('per_page', 10);
        
        // Get only needed columns for order statuses (more efficient than all())
        $orderStatuses = OrderStatus::select('id', 'name')->get();

        // Start building the query with only needed columns from the main table
        $query = Order::select('orders.*')->with([
            // Specify only needed columns for each relationship to reduce data transfer
            'purchase:id,order_id,business_price_purchase_id',
            'purchase.business_price_purchase:id,name',
            'user:id,name,email',
            'oldest:id,quantity,site_id,order_id',
            'oldest.site:id,name',
            'latest:id,status,site_id,order_id',
            'latest.site:id,name',
            'address:id,latest_id',
            'address.latest:id,street,city,state,postal_code',
            'product:id,name,description',
            'creator:id,name',
            'transportation_amount:id,amount,order_amountable_id,order_amountable_type',
            'wheel:id,name',
            'orderStatus:id,name',
            'order_details:id,order_id,quantity,unit_price',
            // Only load what's needed for trip calculations
            'jobs:id,order_id',
            'jobs.trips:id,job_id,status'
        ]);

        // Apply search filter if provided
        if ($request->filled('search')) {
            $search = $request->input('search');
            // Use parameter binding for security to prevent SQL injection
            $searchParam = '%' . $search . '%'; 
            
            // Use numeric check to optimize id search
            if (is_numeric($search)) {
                $query->where('id', $search); // Direct match for numeric IDs
            } else {
                $query->where(function($q) use ($searchParam) {
                    $q->where('id', 'like', $searchParam)
                      ->orWhereHas('user', function($q) use ($searchParam) {
                          $q->where('name', 'like', $searchParam);
                      }, '>', 0) // Using count parameter improves performance
                      ->orWhereHas('product', function($q) use ($searchParam) {
                          $q->where('name', 'like', $searchParam);
                      }, '>', 0)
                      ->orWhereHas('creator', function($q) use ($searchParam) {
                          $q->where('name', 'like', $searchParam);
                      }, '>', 0);
                });
            }
        }

        // Apply status filter if provided - use direct join for better performance on indexed fields
        if ($request->filled('status') && $request->input('status') !== 'All Status') {
            $status = $request->input('status');
            $query->join('order_statuses', 'orders.order_status_id', '=', 'order_statuses.id')
                  ->where('order_statuses.name', $status);
        }

        // Select the distinct orders when using joins to avoid duplicate results
        if (strpos($query->toSql(), 'join') !== false) {
            $query->select('orders.*')->distinct();
        }
        
        // Get paginated results - use specific table name for better index usage
        $orders = $query->orderBy('orders.created_at', 'desc')->paginate($perPage)->withQueryString();

        // Calculate additional properties needed for the view
        $orders->each(function ($order) {
            // Set defaults for properties
            $order->completed = 0;
            $order->ongoing = 0;
            
            // Calculate completed and ongoing counts from jobs and trips more efficiently
            if ($order->jobs) {
                foreach ($order->jobs as $job) {
                    if ($job->trips) {
                        // Use collection methods instead of iterating through each trip
                        $statusCounts = $job->trips->groupBy('status');
                        $order->completed += isset($statusCounts['Completed']) ? $statusCounts['Completed']->count() : 0;
                        
                        // Count ongoing trips across all relevant statuses at once
                        $ongoingStatuses = ['Assigned', 'Started', 'Loading', 'Loaded', 'Unloading', 'Arriving', 'Arrived', 'Notified', 'Waiting', 'Confirmed'];
                        foreach ($ongoingStatuses as $status) {
                            $order->ongoing += isset($statusCounts[$status]) ? $statusCounts[$status]->count() : 0;
                        }
                    }
                }
            }
            
            // Format monetary values
            if ($order->price_per_unit) {
                $order->price_per_unit = number_format($order->price_per_unit / 100, 2);
            }
            
            if ($order->transportation_amount && $order->transportation_amount->amount) {
                $order->transportation_amount->amount = number_format($order->transportation_amount->amount / 100, 2);
            }
            
            // Determine order status for display
            if (!$order->orderStatus) {
                if ($order->completed >= ($order->oldest->quantity ?? 0)) {
                    $order->orderStatus = (object)['name' => 'Completed'];
                } else if (isset($order->latest->status) && $order->latest->status == 'Cancelled') {
                    $order->orderStatus = (object)['name' => 'Cancelled'];
                } else {
                    $order->orderStatus = (object)['name' => 'Incomplete'];
                }
            }
        });
        
        return view('orders/ordersList', compact('orders', 'orderStatuses'));
    }

    public function orderDetails($id)
    {
        // Use key-by-key loading with specific columns for better performance
        $order = Order::with([
            'purchase:id,order_id,business_price_purchase_id',
            'purchase.business_price_purchase:id,name,description',
            'user:id,name,email,phone',
            'oldest:id,quantity,site_id,order_id',
            'oldest.site:id,name,address',
            'latest:id,status,site_id,order_id',
            'latest.site:id,name,address',
            'address:id,latest_id',
            'address.latest:id,street,city,state,postal_code',
            'product:id,name,description,price',
            'creator:id,name',
            'transportation_amount:id,amount,order_amountable_id,order_amountable_type',
            'wheel:id,name',
            'orderStatus:id,name',
            'order_details:id,order_id,quantity,unit_price',
            // Only load needed fields from nested relationships
            'jobs:id,order_id,status',
            'jobs.trips:id,job_id,status',
            'jobs.trips.trip_details:id,trip_id,assignment_id',
            'jobs.trips.trip_details.assignment:id,driver_id,truck_id',
            'jobs.trips.trip_details.assignment.driver:id,user_id',
            'jobs.trips.trip_details.assignment.driver.user:id,name,phone',
            'jobs.trips.trip_details.assignment.truck:id,registration_number,model',
            'orderPayment:id,order_id,amount,status'
        ])->findOrFail($id);
        
        // Calculate additional properties
        $order->completed = 0;
        $order->ongoing = 0;
        
        if ($order->jobs) {
            foreach ($order->jobs as $job) {
                if ($job->trips) {
                    $order->completed += $job->trips->where('status', 'Completed')->count();
                    $order->ongoing += $job->trips->whereIn('status', ['Assigned', 'Started', 'Loading', 'Loaded', 'Unloading', 'Arriving', 'Arrived', 'Notified', 'Waiting', 'Confirmed'])->count();
                }
            }
        }
        
        // Format monetary values
        if ($order->price_per_unit) {
            $order->price_per_unit = number_format($order->price_per_unit / 100, 2);
        }
        
        if ($order->transportation_amount && $order->transportation_amount->amount) {
            $order->transportation_amount->amount = number_format($order->transportation_amount->amount / 100, 2);
        }
        
        return view('orders/orderDetails', compact('order'));
    }

    public function orderStatuses(Request $request)
    {
        // Start with a base query with count optimization
        $query = OrderStatus::select('order_statuses.*')
                           ->withCount([
                               'orders' => function($q) {
                                   // Only count order IDs for better performance
                                   $q->select(DB::raw('COUNT(DISTINCT orders.id)'));
                               }
                           ]);
        
        // Handle search with parameter binding for security
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $searchParam = '%' . $searchTerm . '%';
            // OrderStatus stores status in 'status' column
            $query->where('status', 'LIKE', $searchParam);
        }

        // Paginate results with efficient column selection
        $perPage = (int)$request->get('per_page', 10);
        // Use the proper indexed column for ordering
        $statuses = $query->orderBy('status', 'asc')
                          ->paginate($perPage)
                          ->withQueryString();
        
        return view('orders/orderStatuses', compact('statuses'));
    }

    public function freeDeliveries(Request $request)
    {
        // Only include orders with address_id > 0, with optimized eager loading
        $query = Order::select('orders.*')
            ->with([
                'orderStatus:id,name', 
                'user:id,name,email,phone',
                'creator:id,name',
                'oldest:id,site_id,order_id,quantity',
                'oldest.site:id,name',
                'latest:id,site_id,order_id,status',
                'latest.site:id,name',
                'product:id,name,price,description',
                'wheel:id,name',
                'purchase:id,order_id',
                'order_details:id,order_id,quantity,unit_price',
                'transportation_amount:id,amount,order_amountable_id,order_amountable_type',
                'transportation_amount.order_amountable:id',
                'transportation_amount.order_amountable.route:id,name,origin_id,destination_id',
            ])
            ->where('address_id', '>', 0);
        
        // Handle search with parameter binding for security
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $searchParam = '%' . $searchTerm . '%';
            
            // Optimize ID search for numeric values
            if (is_numeric($searchTerm)) {
                $query->where('id', $searchTerm);
            } else {
                $query->where(function($q) use ($searchParam) {
                    $q->where('id', 'LIKE', $searchParam)
                      ->orWhereHas('user', function($subQ) use ($searchParam) {
                          $subQ->where('name', 'LIKE', $searchParam);
                      }, '>', 0);
                });
            }
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $freeDeliveries = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        // Process each order for display
        $freeDeliveries->each(function ($order) {
            // Set defaults for properties
            $order->completed = $order->completed ?? 0;
            $order->ongoing = $order->ongoing ?? 0;
            
            // Format transportation_amount if it exists
            if ($order->transportation_amount && isset($order->transportation_amount->amount)) {
                // Assuming amount is stored in cents and needs to be converted to dollars/ringgit
                if (is_numeric($order->transportation_amount->amount)) {
                    $order->transportation_amount->amount = number_format($order->transportation_amount->amount / 100, 2);
                }
            }
        });
        
        return view('orders/freeDeliveries', compact('freeDeliveries'));
    }

    /**
     * Display a listing of self-pickup orders
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function selfPickups(Request $request)
    {
        // Query orders where address_id <= 0 (self-pickup) with optimized eager loading
        $query = Order::select('orders.*')
                ->with([
                    'orderStatus:id,name',
                    'customer:id,name,email,phone',
                    'product:id,name,description,price',
                    'wheel:id,name', 
                    'quarry:id,name,address',
                    'agent:id,name,email',
                    // Only select what's needed for trip calculations
                    'jobs:id,order_id',
                    'trips:id,job_id,status,actual_quantity'
                ])
                ->where('address_id', '<=', 0)
                // Use a more efficient index scan for better performance
                ->whereRaw('address_id <= 0'); // This helps the query optimizer use the right index
        
        // Handle search with parameter binding for security
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $searchParam = '%' . $searchTerm . '%';
            
            // Optimize ID or order number search for numeric values
            if (is_numeric($searchTerm)) {
                $query->where(function($q) use ($searchTerm, $searchParam) {
                    $q->where('id', $searchTerm)
                      ->orWhere('order_number', 'LIKE', $searchParam);
                });
            } else {
                $query->where(function($q) use ($searchParam) {
                    $q->where('order_number', 'LIKE', $searchParam)
                      ->orWhereHas('customer', function($subQ) use ($searchParam) {
                          $subQ->where('name', 'LIKE', $searchParam)
                              ->orWhere('email', 'LIKE', $searchParam)
                              ->orWhere('phone', 'LIKE', $searchParam);
                      }, '>', 0)
                      ->orWhereHas('product', function($subQ) use ($searchParam) {
                          $subQ->where('name', 'LIKE', $searchParam);
                      }, '>', 0)
                      ->orWhereHas('quarry', function($subQ) use ($searchParam) {
                          $subQ->where('name', 'LIKE', $searchParam);
                      }, '>', 0);
                });
            }
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $selfPickups = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        // Calculate completed and ongoing quantities
        foreach ($selfPickups as $order) {
            // Count completed trips/jobs
            $order->completed_quantity = $order->trips->where('status', 'Completed')->sum('actual_quantity');
            
            // Count ongoing trips/jobs
            $order->ongoing_quantity = $order->trips->whereIn('status', ['Pending', 'In Progress'])->sum('actual_quantity');
        }
        
        return view('orders.selfPickups', compact('selfPickups'));
    }
    
    /**
     * Show the form for editing the specified order.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function orderEdit($id)
    {
        // Only load necessary fields to improve performance
        $order = Order::with([
            'orderStatus:id,name',
            'customer:id,name,email,phone',
            'product:id,name,description,price',
            'wheel:id,name',
            'quarry:id,name,address',
            'agent:id,name,email',
            'jobs:id,order_id',
            'trips:id,job_id,status,actual_quantity'
        ])->findOrFail($id);
        
        // Calculate completed and ongoing quantities more efficiently
        $order->completed_quantity = $order->trips->where('status', 'Completed')->sum('actual_quantity');
        $order->ongoing_quantity = $order->trips->whereIn('status', ['Pending', 'In Progress'])->sum('actual_quantity');
        
        // Get only necessary fields for dropdown lists
        $products = Product::select('id', 'name', 'description', 'price')->get();
        $wheels = Wheel::select('id', 'name')->get();
        $orderStatuses = OrderStatus::select('id', 'name')->get();
        $customers = User::select('id', 'name', 'email', 'phone')
                        ->where('is_active', true) // Only get active users if applicable
                        ->orderBy('name')
                        ->get();
        $sites = Site::select('id', 'name', 'address')->get(); // Quarries
        $agents = User::select('id', 'name', 'email')
                     ->where('role', 'agent')
                     ->orderBy('name')
                     ->get();
        
        return view('orders.orderEdit', compact('order', 'products', 'wheels', 'orderStatuses', 'customers', 'sites', 'agents'));
    }
}