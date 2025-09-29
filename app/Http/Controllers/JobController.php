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
        $query = Job::with(['jobStatus', 'driver', 'customer', 'jobDetails']);
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('id', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('job_number', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('driver', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  })
                  ->orWhereHas('customer', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        // Handle status filter
        if ($request->has('status') && $request->status !== 'All Status') {
            $query->whereHas('jobStatus', function($q) use ($request) {
                // JobStatus stores the status string in 'status'
                $q->where('status', $request->status);
            });
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $jobs = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        // Get all job statuses for filter dropdown
        $jobStatuses = JobStatus::all();
        
        return view('jobs/jobsList', compact('jobs', 'jobStatuses'));
    }

    public function jobDetails($id)
    {
        $job = Job::with(['jobStatus', 'driver', 'customer', 'jobDetails'])
                 ->findOrFail($id);
        
        return view('jobs/jobDetails', compact('job'));
    }

    public function jobStatuses(Request $request)
    {
        // Start a simple query. Only attach withCount('jobs') if the jobs table
        // actually has a 'status' column; otherwise the subquery will reference a
        // non-existent column and cause SQL errors on PostgreSQL.
        $query = JobStatus::query();
        try {
            if (Schema::hasColumn('jobs', 'status')) {
                $query->withCount('jobs');
            }
        } catch (\Exception $e) {
            // ignore schema check failures
        }

        // Handle search (search against the status string)
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('status', 'LIKE', "%{$searchTerm}%");
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $statuses = $query->orderBy('status', 'asc')->paginate($perPage);

        return view('jobs/jobStatuses', compact('statuses'));
    }
}