<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
// removed unused imports
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class OrderController extends Controller
{
    public function orders(Request $request)
    {
        $query = Order::with(['orderStatus', 'customer', 'orderDetails']);
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('id', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('order_number', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('customer', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        // Handle status filter
        if ($request->has('status') && $request->status !== 'All Status') {
            $query->whereHas('orderStatus', function($q) use ($request) {
                // OrderStatus stores the status value in 'status'
                $q->where('status', $request->status);
            });
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $orders = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        // Get all order statuses for filter dropdown
        $orderStatuses = OrderStatus::all();
        
        return view('orders/ordersList', compact('orders', 'orderStatuses'));
    }

    public function orderDetails($id)
    {
        $order = Order::with(['orderStatus', 'customer', 'orderDetails', 'orderPayment'])
                     ->findOrFail($id);
        
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