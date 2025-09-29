<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Wheel;
use App\Models\Product;
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
        // Select orders that either have no transportation fee recorded
        // or have a transportation OrderAmount with amount = 0.
        $query = Order::with(['orderStatus', 'customer', 'order_amounts'])
            ->where(function($q) {
                $q->whereDoesntHave('order_amounts', function($q2) {
                    $q2->where('order_amountable_type', 'transportation');
                })
                ->orWhereHas('order_amounts', function($q2) {
                    $q2->where('order_amountable_type', 'transportation')
                       ->where('amount', 0);
                });
            });
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('order_number', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('customer', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $freeDeliveries = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        return view('orders/freeDeliveries', compact('freeDeliveries'));
    }

    public function selfPickups(Request $request)
    {
        $query = Order::with(['orderStatus', 'customer'])
                     ->where(function($q) {
                         // Some installations store delivery type in delivery_type or use is_pickup flag.
                         // Only add where('is_pickup') if the column exists to avoid SQL errors.
                         try {
                             if (Schema::hasColumn('orders', 'is_pickup')) {
                                 $q->where('is_pickup', true);
                             }

                             // If a delivery_type column exists and contains 'self_pickup', include it.
                             if (Schema::hasColumn('orders', 'delivery_type')) {
                                 $q->orWhere('delivery_type', 'self_pickup');
                             }
                         } catch (\Exception $e) {
                             // ignore schema check failures in some environments
                         }
                     });
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('order_number', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('customer', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $selfPickups = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        return view('orders/selfPickups', compact('selfPickups'));
    }
}