<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobStatus;
use App\Models\JobDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class JobController extends Controller
{
    public function jobs(Request $request)
    {
        // Build query with necessary relationships for the table
        // Load relationships without specifying columns to ensure database compatibility
        $query = Job::with([
            'customer',
            'jobDetails',
            'latest',
            'order.product',
            'order.wheel',
            'order.oldest.site',
            'order.latest.site',
            'order.address.latest',
            'creator',
            'trips',
            'trips.latest.assignment.driver.user'
        ]);
        
        // Add the JobEvent scope to get trip statistics like assigned, completed, ongoing counts
        $query->jobEvent();
        
        // Handle search with parameter binding to prevent SQL injection (case-insensitive)
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $searchTermLower = strtolower(addcslashes($searchTerm, '%_'));
            $query->where(function($q) use ($searchTermLower) {
                $pattern = "%{$searchTermLower}%";
                $q->whereRaw('CAST(id AS CHAR) LIKE ?', [$pattern])
                  ->orWhereRaw('CAST(order_id AS CHAR) LIKE ?', [$pattern])
                  ->orWhereHas('customer', function($subQ) use ($pattern) {
                      $subQ->whereRaw('LOWER(name) LIKE ?', [$pattern]);
                  })
                  ->orWhereHas('order.product', function($subQ) use ($pattern) {
                      $subQ->whereRaw('LOWER(name) LIKE ?', [$pattern]);
                  })
                  ->orWhereHas('order.oldest.site', function($subQ) use ($pattern) {
                      $subQ->whereRaw('LOWER(name) LIKE ?', [$pattern]);
                  });
            });
        }
        
        // Handle date filters with proper parameter binding
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        
        // Add index hint for better performance if available in your Laravel version
        // $query->fromRaw('jobs USE INDEX (created_at_index)');
        
        // Sort by created date to show newest jobs first
        $query->orderBy('created_at', 'desc');
        
        // Paginate results with efficient count
        $perPage = (int) $request->get('per_page', 10);
        $jobs = $query->paginate($perPage);
        
        // Cache job statuses since they don't change often
        $jobStatuses = cache()->remember('job_statuses', now()->addHour(), function() {
            return JobStatus::all();
        });
        
        return view('jobs/jobsList', compact('jobs', 'jobStatuses'));
    }

    public function jobDetails($id)
    {
        // Use eager loading but without specifying columns to avoid schema compatibility issues
        $job = Job::with([
                'driver',
                'customer',
                'jobDetails'
            ])
            ->jobEvent()  // Add jobEvent scope to get trip-related attributes
            ->findOrFail((int) $id); // Cast to integer for security and performance
        
        return view('jobs/jobDetails', compact('job'));
    }

    public function jobStatuses(Request $request)
    {
        // Cache schema check to avoid repeated database queries
        $hasStatusColumn = cache()->remember('jobs_has_status_column', now()->addDay(), function() {
            try {
                return Schema::hasColumn('jobs', 'status');
            } catch (\Exception $e) {
                return false;
            }
        });

        // Start a simple query - don't specify columns to avoid issues with different DB schemas
        // This will automatically select all columns that exist in the table
        $query = JobStatus::query(); 
        
        // Only attach withCount if the column exists
        if ($hasStatusColumn) {
            $query->withCount('jobs');
        }

        // Handle search with secure parameter binding (case-insensitive)
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $pattern = '%' . strtolower(addcslashes($searchTerm, '%_')) . '%';
            $query->whereRaw('LOWER(status) LIKE ?', [$pattern]);
        }

        // Consider caching the results if they don't change often
        $cacheKey = 'job_statuses_' . md5($request->fullUrl());
        
        // Paginate with efficient count
        $perPage = (int) $request->get('per_page', 10);
        
        // For small tables like job_statuses, consider retrieving all and paginating in memory
        if (config('app.debug') === false && $request->missing('search')) {
            // In production with no search, use cached results
            $statuses = cache()->remember($cacheKey, now()->addHour(), function() use ($query, $perPage, $request) {
                return $query->orderBy('status', 'asc')->paginate($perPage);
            });
        } else {
            $statuses = $query->orderBy('status', 'asc')->paginate($perPage);
        }

        return view('jobs/jobStatuses', compact('statuses'));
    }
}