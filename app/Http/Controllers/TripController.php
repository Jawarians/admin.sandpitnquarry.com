<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\TripStatus;
use App\Models\TripDetail;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function trips(Request $request)
    {
        $query = Trip::with(['tripStatus', 'driver', 'truck', 'tripDetails']);
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('id', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('trip_number', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('driver', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  })
                  ->orWhereHas('truck', function($subQ) use ($searchTerm) {
                      $subQ->where('plate_number', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        // Handle status filter
        if ($request->has('status') && $request->status !== 'All Status') {
            $query->whereHas('tripStatus', function($q) use ($request) {
                // TripStatus stores the status value in 'status'
                $q->where('status', $request->status);
            });
        }
        
        // Handle created_at date range filter
        if ($request->has('created_start_date') && !empty($request->created_start_date)) {
            $query->whereDate('created_at', '>=', $request->created_start_date);
        }
        
        if ($request->has('created_end_date') && !empty($request->created_end_date)) {
            $query->whereDate('created_at', '<=', $request->created_end_date);
        }
        
        // Handle updated_at date range filter
        if ($request->has('updated_start_date') && !empty($request->updated_start_date)) {
            $query->whereDate('updated_at', '>=', $request->updated_start_date);
        }
        
        if ($request->has('updated_end_date') && !empty($request->updated_end_date)) {
            $query->whereDate('updated_at', '<=', $request->updated_end_date);
        }

        // Paginate results
        // If per_page is explicitly set to null or empty string, use default value
        $perPage = $request->input('per_page');
        if ($perPage === null || $perPage === '') {
            $perPage = 10;
        }
        // Cast to integer to ensure proper pagination
        $perPage = (int) $perPage;
        $trips = $query->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();
        
        // Get all trip statuses for filter dropdown
        $tripStatuses = TripStatus::all();
        
        return view('trips/tripsList', compact('trips', 'tripStatuses'));
    }

    public function tripDetails($id)
    {
        $trip = Trip::with(['tripStatus', 'driver', 'truck', 'tripDetails', 'tripLocation'])
                   ->findOrFail($id);
        
        return view('trips/tripDetails', compact('trip'));
    }

    public function tripStatuses(Request $request)
    {
        $query = TripStatus::withCount('trips');
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            // TripStatus uses 'status' column
            $query->where('status', 'LIKE', "%{$searchTerm}%");
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
    // Order by the status column (there is no `name` column)
    $statuses = $query->orderBy('status', 'asc')->paginate($perPage);
        
        return view('trips/tripStatuses', compact('statuses'));
    }
}