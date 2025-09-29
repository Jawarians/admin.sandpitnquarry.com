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
                $q->where('name', $request->status);
            });
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $trips = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
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
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $statuses = $query->orderBy('name', 'asc')->paginate($perPage);
        
        return view('trips/tripStatuses', compact('statuses'));
    }
}