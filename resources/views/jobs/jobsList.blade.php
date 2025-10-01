@extends('layout.layout')
@php
    $title='Jobs List';
    $subTitle = 'Jobs Management';
    $script ='<script>
                $(document).ready(function() {
                    // Individual checkbox handling
                    $("input[name=\'checkbox\']").on("click", function() {
                        var jobId = $(this).val();
                        var isChecked = $(this).prop("checked");
                        console.log("Job ID " + jobId + " " + (isChecked ? "selected" : "deselected") + " for bulk actions");
                    });
                    
                    // Select/Deselect all checkboxes
                    $("#selectAll").on("click", function() {
                        var isChecked = $(this).prop("checked");
                        $("input[name=\'checkbox\']").prop("checked", isChecked);
                    });
                    
                    // Date filter handling
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, "0");
                    var mm = String(today.getMonth() + 1).padStart(2, "0");
                    var yyyy = today.getFullYear();
                    
                    // Set default end date to today if not specified
                    if ($("input[name=\'end_date\']").val() === "") {
                        var todayFormatted = yyyy + "-" + mm + "-" + dd;
                        $("input[name=\'end_date\']").val(todayFormatted);
                    }
                    
                    // Clear date filters
                    $("#clearDateFilter").on("click", function() {
                        $("input[name=\'start_date\']").val("");
                        $("input[name=\'end_date\']").val("");
                        $(this).closest("form").submit();
                    });
                    
                    // Handle bulk actions
                    $("#applyBulkAction").on("click", function() {
                        var selectedAction = $("#bulkActionSelect").val();
                        if (!selectedAction) {
                            alert("Please select an action to perform.");
                            return;
                        }
                        
                        var selectedIds = [];
                        $("input[name=\'checkbox\']:checked").each(function() {
                            selectedIds.push($(this).val());
                        });
                        
                        if (selectedIds.length === 0) {
                            alert("Please select at least one item to perform this action.");
                            return;
                        }
                        
                        // Process based on selected action
                        switch(selectedAction) {
                            case "export":
                                // Add export functionality
                                alert("Export functionality will be implemented for IDs: " + selectedIds.join(", "));
                                break;
                            case "print":
                                // Add print functionality
                                alert("Print functionality will be implemented for IDs: " + selectedIds.join(", "));
                                break;
                            case "assign":
                                // Add assign functionality
                                alert("Assign functionality will be implemented for IDs: " + selectedIds.join(", "));
                                break;
                            case "complete":
                                // Add complete functionality
                                alert("Complete functionality will be implemented for IDs: " + selectedIds.join(", "));
                                break;
                        }
                    });
                });
            </script>';
@endphp

@section('content')

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
                        <form method="GET">
                            <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="per_page" onchange="this.form.submit()">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            </select>
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                            <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                        </form>
                        <form class="navbar-search" method="GET">
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search jobs..." value="{{ request('search') }}">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                            <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                            <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                        </form>
                        
                        <!-- Date filter -->
                        <form class="d-flex align-items-center gap-2" method="GET">
                            <div class="input-group">
                                <span class="input-group-text bg-base h-40-px">From</span>
                                <input type="date" class="form-control bg-base h-40-px" name="start_date" value="{{ request('start_date') }}">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-base h-40-px">To</span>
                                <input type="date" class="form-control bg-base h-40-px" name="end_date" value="{{ request('end_date') }}">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary h-40-px">Filter</button>
                            <button type="button" id="clearDateFilter" class="btn btn-sm btn-outline-secondary h-40-px">Clear</button>
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                        </form>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('jobStatuses') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                            <iconify-icon icon="mdi:format-list-bulleted" class="icon text-xl line-height-1"></iconify-icon>
                            Job Statuses
                        </a>
                    </div>
                </div>
                <div class="card-body p-24">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="d-flex align-items-center gap-10">
                                            <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" id="selectAll">
                                            <label for="selectAll">ID</label>
                                        </div>
                                    </th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Quarry</th>
                                    <th scope="col">Site</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Assigned</th>
                                    <th scope="col">Completed</th>
                                    <th scope="col">Ongoing</th>
                                    <th scope="col">Agent</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobs as $index => $job)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-10">
                                            <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $job->id }}" id="checkbox-{{ $job->id }}">
                                            <label for="checkbox-{{ $job->id }}">{{ $job->id }}</label>
                                        </div>
                                    </td>
                                    <td>{{ $job->order_id }}</td>
                                    <td>{{ $job->customer->name ?? ($job->order->customer->name ?? 'N/A') }}</td>
                                    <td>
                                        @if($job->order && $job->order->oldest && $job->order->oldest->site)
                                            {{ $job->order->oldest->site->name }}
                                        @elseif($job->order && $job->order->latest && $job->order->latest->site)
                                            {{ $job->order->latest->site->name }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if($job->order && $job->order->oldest && $job->order->oldest->site)
                                            {{ $job->order->oldest->site->city }}
                                        @elseif($job->order && $job->order->latest && $job->order->latest->site)
                                            {{ $job->order->latest->site->city }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $job->order && $job->order->product ? $job->order->product->name : 'N/A' }}</td>
                                    <td>{{ $job->order ? $job->order->unit : 'N/A' }}</td>
                                    <td>{{ $job->job_quantity_sum ?? $job->latest->quantity ?? 0 }}</td>
                                    <td>{{ $job->assigned_trips_count ?? $job->assigned ?? 0 }}</td>
                                    <td>{{ $job->completed_trips_count ?? $job->completed ?? 0 }}</td>
                                    <td>{{ $job->ongoing_trips_count ?? $job->ongoing ?? 0 }}</td>
                                    <td>{{ $job->creator ? $job->creator->name : 'N/A' }}</td>
                                    <td>
                                        @php
                                            $statusClass = 'bg-info-focus text-info-600 border border-info-main';
                                            
                                            // Get completed trips count - check different possible property names
                                            $completedCount = $job->completed_trips_count ?? $job->completed ?? 0;
                                            $ongoingCount = $job->ongoing_trips_count ?? $job->ongoing ?? 0;
                                            $assignedCount = $job->assigned_trips_count ?? $job->assigned ?? 0;
                                            $tripsCount = $job->trips_count ?? (isset($job->trips) ? count($job->trips) : 0);
                                            
                                            if($completedCount > 0 && $completedCount == $tripsCount && $tripsCount > 0) {
                                                $status = 'Completed';
                                                $statusClass = 'bg-success-focus text-success-600 border border-success-main';
                                            } elseif($ongoingCount > 0) {
                                                $status = 'Ongoing';
                                                $statusClass = 'bg-warning-focus text-warning-600 border border-warning-main';
                                            } elseif($assignedCount > 0) {
                                                $status = 'Assigned';
                                                $statusClass = 'bg-primary-focus text-primary-600 border border-primary-main';
                                            } else {
                                                $status = 'Accepted';
                                            }
                                        @endphp
                                        <span class="{{ $statusClass }} px-24 py-4 radius-4 fw-medium text-sm">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td>{{ $job->created_at->format('M d, Y H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('jobDetails', $job->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="15" class="text-center py-4">
                                        <div class="d-flex flex-column align-items-center justify-content-center py-5">
                                            <iconify-icon icon="mdi:briefcase-outline" class="icon text-6xl text-neutral-400 mb-3"></iconify-icon>
                                            <h5 class="text-neutral-500 mb-2">No Jobs Found</h5>
                                            <p class="text-neutral-400 mb-0">
                                                @if(request('search') || request('start_date') || request('end_date'))
                                                    No jobs match your search criteria.
                                                @else
                                                    There are no jobs in the system yet.
                                                @endif
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Bulk Actions Section -->
                    <div class="d-flex align-items-center gap-2 mt-24 mb-16">
                        <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" id="bulkActionSelect">
                            <option value="">Bulk Actions</option>
                            <option value="export">Export Selected</option>
                            <option value="print">Print Selected</option>
                            <option value="assign">Assign to Driver</option>
                            <option value="complete">Mark as Complete</option>
                        </select>
                        <button id="applyBulkAction" class="btn btn-primary btn-sm px-12 py-6 radius-8">Apply</button>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                        <span>
                            Showing {{ $jobs->firstItem() }} to {{ $jobs->lastItem() }} of {{ $jobs->total() }} entries
                        </span>
                        
                        @if ($jobs->hasPages())
                            <nav aria-label="Jobs pagination">
                                {{ $jobs->links() }}
                            </nav>
                        @endif
                    </div>
                </div>
            </div>

@endsection