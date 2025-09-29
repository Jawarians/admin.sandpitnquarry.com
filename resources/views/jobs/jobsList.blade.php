@extends('layout.layout')
@php
    $title='Jobs List';
    $subTitle = 'Jobs Management';
    $script ='<script>
                        $(".remove-item-btn").on("click", function() {
                            $(this).closest("tr").addClass("d-none")
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
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        </form>
                        <form class="navbar-search" method="GET">
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search jobs..." value="{{ request('search') }}">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            <input type="hidden" name="status" value="{{ request('status') }}">
                            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                        </form>
                        <form method="GET">
                            <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="status" onchange="this.form.submit()">
                                <option value="All Status" {{ request('status') == 'All Status' ? 'selected' : '' }}>All Status</option>
                                @foreach($jobStatuses as $status)
                                    <option value="{{ $status->name }}" {{ request('status') == $status->name ? 'selected' : '' }}>{{ $status->name }}</option>
                                @endforeach
                            </select>
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
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input radius-4 border input-form-dark" type="checkbox" name="checkbox" id="selectAll">
                                            </div>
                                            Job ID
                                        </div>
                                    </th>
                                    <th scope="col">Job Date</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Driver</th>
                                    <th scope="col">Job Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobs as $index => $job)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-10">
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $job->id }}">
                                            </div>
                                            #{{ str_pad($job->id, 4, '0', STR_PAD_LEFT) }}
                                        </div>
                                    </td>
                                    <td>{{ $job->created_at ? $job->created_at->format('d M Y') : 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <span class="text-md mb-0 fw-normal text-secondary-light">{{ $job->customer->name ?? 'N/A' }}</span>
                                                <br>
                                                <small class="text-xs text-secondary-light">{{ $job->customer->email ?? '' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($job->driver)
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ $job->driver->name }}</span>
                                                    <br>
                                                    <small class="text-xs text-secondary-light">{{ $job->driver->phone ?? 'No phone' }}</small>
                                                </div>
                                            </div>
                                        @else
                                            <span class="bg-warning-focus text-warning-600 border border-warning-main px-12 py-4 radius-4 fw-medium text-sm">Unassigned</span>
                                        @endif
                                    </td>
                                    <td><span class="text-md mb-0 fw-normal text-secondary-light">{{ $job->job_type ?? 'Standard' }}</span></td>
                                    <td><span class="text-md mb-0 fw-bold text-success-600">${{ number_format($job->total_amount ?? 0, 2) }}</span></td>
                                    <td>
                                        @if($job->jobStatus)
                                            <span class="bg-info-focus text-info-600 border border-info-main px-24 py-4 radius-4 fw-medium text-sm">{{ $job->jobStatus->name }}</span>
                                        @else
                                            <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">Unknown</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center gap-10 justify-content-center">
                                            <a href="{{ route('jobDetails', $job->id) }}" class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" title="View Details">
                                                <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="d-flex flex-column align-items-center justify-content-center py-5">
                                            <iconify-icon icon="mdi:briefcase-outline" class="icon text-6xl text-neutral-400 mb-3"></iconify-icon>
                                            <h5 class="text-neutral-500 mb-2">No Jobs Found</h5>
                                            <p class="text-neutral-400 mb-0">
                                                @if(request('search'))
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