<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobStatus;
use App\Models\JobDetail;
use Illuminate\Http\Request;

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
                $q->where('name', $request->status);
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
        $query = JobStatus::withCount('jobs');
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $statuses = $query->orderBy('name', 'asc')->paginate($perPage);
        
        return view('jobs/jobStatuses', compact('statuses'));
    }
}