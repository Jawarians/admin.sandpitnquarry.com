<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Wheel;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Site;
use App\Models\User;
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
        
        // Get all order statuses for the filter dropdown
        $orderStatuses = OrderStatus::all();

        // Start building the query
        $query = Order::with([
            'purchase.business_price_purchase',
            'user',
            'oldest.site',
            'latest.site',
            'address.latest',
            'product',
            'creator',
            'transportation_amount',
            'wheel',
            'latest',
            'oldest',
            'orderStatus',
            'order_details',
            'jobs.trips'
        ]);

        // Apply search filter if provided
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('product', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('creator', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Apply status filter if provided
        if ($request->filled('status') && $request->input('status') !== 'All Status') {
            $status = $request->input('status');
            $query->whereHas('orderStatus', function($q) use ($status) {
                $q->where('name', $status);
            });
        }

        // Get paginated results
        $orders = $query->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();

        // Calculate additional properties needed for the view
        $orders->each(function ($order) {
            // Set defaults for properties
            $order->completed = $order->completed ?? 0;
            $order->ongoing = $order->ongoing ?? 0;
            
            // Calculate completed and ongoing counts from jobs and trips
            if ($order->jobs) {
                $order->jobs->each(function ($job) use (&$order) {
                    if ($job->trips) {
                        $completedTrips = $job->trips->where('status', 'Completed')->count();
                        $ongoingTrips = $job->trips->whereIn('status', ['Assigned', 'Started', 'Loading', 'Loaded', 'Unloading', 'Arriving', 'Arrived', 'Notified', 'Waiting', 'Confirmed'])->count();
                        
                        $order->completed += $completedTrips;
                        $order->ongoing += $ongoingTrips;
                    }
                });
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
        $order = Order::with([
            'purchase.business_price_purchase',
            'user',
            'oldest.site',
            'latest.site',
            'address.latest',
            'product',
            'creator',
            'transportation_amount',
            'wheel',
            'latest',
            'oldest',
            'orderStatus',
            'order_details',
            'jobs.trips.trip_details.assignment.driver.user',
            'jobs.trips.trip_details.assignment.truck',
            'orderPayment'
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
    $query = OrderStatus::withCount('orders');
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            // OrderStatus stores status in 'status' column
            $query->where('status', 'LIKE', "%{$searchTerm}%");
        }

    // Paginate results
        $perPage = $request->get('per_page', 10);
    // OrderStatus table uses `status` column (no `name` column)
    $statuses = $query->orderBy('status', 'asc')->paginate($perPage);
        
        return view('orders/orderStatuses', compact('statuses'));
    }

    public function freeDeliveries(Request $request)
    {
        // Also, only include orders with address_id > 0
        $query = Order::with([
            'orderStatus',
            'user',
            'creator',
            'oldest.site',
            'latest.site',
            'product',
            'wheel',
            'purchase',
            'order_details',
            'transportation_amount.order_amountable.route',
        ])->where('address_id', '>', 0);
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('id', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('user', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
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
        // Query orders where address_id <= 0 (self-pickup)
        $query = Order::with([
                    'orderStatus',
                    'customer',
                    'product',
                    'wheel', 
                    'quarry',
                    'agent',
                    'jobs',
                    'trips'
                ])
                ->where(function($q) {
                    $q->where('address_id', '<=', 0);
                });
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('order_number', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('customer', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%")
                          ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                          ->orWhere('phone', 'LIKE', "%{$searchTerm}%");
                  })
                  ->orWhereHas('product', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  })
                  ->orWhereHas('quarry', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
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
        $order = Order::with([
            'orderStatus',
            'customer',
            'product',
            'wheel',
            'quarry',
            'agent',
            'jobs',
            'trips'
        ])->findOrFail($id);
        
        // Calculate completed and ongoing quantities
        $order->completed_quantity = $order->trips->where('status', 'Completed')->sum('actual_quantity');
        $order->ongoing_quantity = $order->trips->whereIn('status', ['Pending', 'In Progress'])->sum('actual_quantity');
        
        // Get additional data needed for the edit form
        $products = Product::all();
        $wheels = Wheel::all();
        $orderStatuses = OrderStatus::all();
        $customers = Customer::all();
        $sites = Site::all(); // Quarries
        $agents = User::where('role', 'agent')->get();
        
        return view('orders.orderEdit', compact('order', 'products', 'wheels', 'orderStatuses', 'customers', 'sites', 'agents'));
    }
}