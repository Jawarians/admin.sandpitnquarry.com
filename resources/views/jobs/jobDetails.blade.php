@extends('layout.layout')
@php
    $title = 'Job Details';
    $subTitle = 'Job #' . str_pad($job->id, 4, '0', STR_PAD_LEFT);
@endphp

@section('content')
<div class="row gy-4">
    <!-- Job Information Card -->
    <div class="col-lg-8">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('jobsList') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="ep:back" class="icon text-xl line-height-1"></iconify-icon>
                        Back to Jobs
                    </a>
                    <h5 class="card-title mb-0">Job Details</h5>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <!-- Showing job status based on trips -->
                    @if(isset($job->assigned) && $job->assigned > 0)
                        <span class="bg-warning-focus text-warning-600 border border-warning-main px-24 py-4 radius-4 fw-medium text-sm">Assigned</span>
                    @elseif(isset($job->ongoing) && $job->ongoing > 0)
                        <span class="bg-info-focus text-info-600 border border-info-main px-24 py-4 radius-4 fw-medium text-sm">In Progress</span>
                    @elseif(isset($job->completed) && $job->completed > 0)
                        <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Completed</span>
                    @elseif(isset($job->cancelled) && $job->cancelled > 0)
                        <span class="bg-danger-focus text-danger-600 border border-danger-main px-24 py-4 radius-4 fw-medium text-sm">Cancelled</span>
                    @else
                        <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">Pending</span>
                    @endif
                </div>
            </div>
            <div class="card-body p-24">
                <div class="row gy-4">
                    <!-- Basic Job Information -->
                    <div class="col-12">
                        <div class="bg-neutral-50 p-20 radius-8">
                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Job ID:</span>
                                        <span class="text-md text-secondary-light">#{{ str_pad($job->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Job Number:</span>
                                        <span class="text-md text-secondary-light">{{ $job->job_number ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Job Date:</span>
                                        <span class="text-md text-secondary-light">{{ $job->created_at ? $job->created_at->format('d M Y, h:i A') : 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Total Amount:</span>
                                        <span class="text-md fw-bold text-success-600">${{ number_format($job->total_amount ?? 0, 2) }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Job Type:</span>
                                        <span class="text-md text-secondary-light">{{ $job->job_type ?? 'Standard' }}</span>
                                    </div>
                                </div>
                                @if($job->scheduled_date)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Scheduled Date:</span>
                                        <span class="text-md text-secondary-light">{{ \Carbon\Carbon::parse($job->scheduled_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                                @endif
                                @if($job->estimated_duration)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Duration:</span>
                                        <span class="text-md text-secondary-light">{{ $job->estimated_duration }} hours</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Job Description -->
                    @if($job->description)
                    <div class="col-12">
                        <h6 class="text-xl mb-16">Job Description</h6>
                        <div class="bg-info-50 border border-info-200 p-16 radius-8">
                            <p class="text-secondary-light mb-0">{{ $job->description }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Job Location -->
                    @if($job->job_location || $job->pickup_location || $job->delivery_location)
                    <div class="col-12">
                        <h6 class="text-xl mb-16">Location Details</h6>
                        <div class="row gy-3">
                            @if($job->job_location)
                            <div class="col-md-12">
                                <div class="d-flex align-items-start gap-2">
                                    <iconify-icon icon="mdi:map-marker" class="text-primary-600 mt-4"></iconify-icon>
                                    <div>
                                        <span class="text-sm fw-medium text-secondary-light d-block">Job Location</span>
                                        <span class="text-sm text-secondary-light">{{ $job->job_location }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($job->pickup_location)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-2">
                                    <iconify-icon icon="mdi:map-marker-up" class="text-success-600 mt-4"></iconify-icon>
                                    <div>
                                        <span class="text-sm fw-medium text-secondary-light d-block">Pickup Location</span>
                                        <span class="text-sm text-secondary-light">{{ $job->pickup_location }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($job->delivery_location)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-2">
                                    <iconify-icon icon="mdi:map-marker-down" class="text-info-600 mt-4"></iconify-icon>
                                    <div>
                                        <span class="text-sm fw-medium text-secondary-light d-block">Delivery Location</span>
                                        <span class="text-sm text-secondary-light">{{ $job->delivery_location }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Job Items/Tasks -->
                    @if($job->jobDetails && $job->jobDetails->count() > 0)
                    <div class="col-12">
                        <h6 class="text-xl mb-16">Job Tasks</h6>
                        <div class="table-responsive">
                            <table class="table bordered-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Task</th>
                                        <th>Quantity</th>
                                        <th>Unit Rate</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($job->jobDetails as $detail)
                                    <tr>
                                        <td>{{ $detail->task_name ?? $detail->description ?? 'N/A' }}</td>
                                        <td>{{ $detail->quantity ?? 1 }}</td>
                                        <td>${{ number_format($detail->unit_rate ?? 0, 2) }}</td>
                                        <td>${{ number_format(($detail->quantity ?? 1) * ($detail->unit_rate ?? 0), 2) }}</td>
                                        <td>
                                            @if($detail->is_completed ?? false)
                                                <span class="bg-success-focus text-success-600 border border-success-main px-12 py-4 radius-4 fw-medium text-sm">Completed</span>
                                            @else
                                                <span class="bg-warning-focus text-warning-600 border border-warning-main px-12 py-4 radius-4 fw-medium text-sm">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Customer & Driver Information -->
    <div class="col-lg-4">
        <div class="row gy-4">
            <!-- Customer Information -->
            @if($job->customer)
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Customer Information</h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="d-flex align-items-center gap-3 mb-16">
                            <div class="w-44-px h-44-px bg-primary-50 rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                <iconify-icon icon="flowbite:user-solid" class="text-primary-600 text-xl"></iconify-icon>
                            </div>
                            <div>
                                <h6 class="text-md mb-0">{{ $job->customer->name }}</h6>
                                <span class="text-sm text-secondary-light">Customer</span>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            @if($job->customer->email)
                            <li class="list-group-item px-0 py-8 border-0">
                                <div class="d-flex align-items-center gap-2">
                                    <iconify-icon icon="mdi:email" class="text-primary-600"></iconify-icon>
                                    <span class="text-secondary-light text-sm">{{ $job->customer->email }}</span>
                                </div>
                            </li>
                            @endif
                            @if($job->customer->phone)
                            <li class="list-group-item px-0 py-8 border-0">
                                <div class="d-flex align-items-center gap-2">
                                    <iconify-icon icon="mdi:phone" class="text-primary-600"></iconify-icon>
                                    <span class="text-secondary-light text-sm">{{ $job->customer->phone }}</span>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- Driver Information -->
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Driver Assignment</h6>
                    </div>
                    <div class="card-body p-24">
                        @if($job->driver)
                            <div class="d-flex align-items-center gap-3 mb-16">
                                <div class="w-44-px h-44-px bg-success-50 rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                    <iconify-icon icon="mdi:account-hard-hat" class="text-success-600 text-xl"></iconify-icon>
                                </div>
                                <div>
                                    <h6 class="text-md mb-0">{{ $job->driver->name }}</h6>
                                    <span class="text-sm text-secondary-light">Assigned Driver</span>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @if($job->driver->phone)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:phone" class="text-success-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">{{ $job->driver->phone }}</span>
                                    </div>
                                </li>
                                @endif
                                @if($job->driver->email)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:email" class="text-success-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">{{ $job->driver->email }}</span>
                                    </div>
                                </li>
                                @endif
                                @if($job->driver->license_number)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:card-account-details" class="text-success-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">License: {{ $job->driver->license_number }}</span>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        @else
                            <div class="text-center py-4">
                                <iconify-icon icon="mdi:account-question" class="text-warning-600 text-4xl mb-3"></iconify-icon>
                                <h6 class="text-warning-600 mb-2">No Driver Assigned</h6>
                                <p class="text-secondary-light text-sm mb-0">This job needs to be assigned to a driver.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Job Summary -->
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Job Summary</h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Subtotal:</span>
                            <span class="fw-medium">${{ number_format($job->subtotal ?? $job->total_amount ?? 0, 2) }}</span>
                        </div>
                        @if($job->tax_amount)
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Tax:</span>
                            <span class="fw-medium">${{ number_format($job->tax_amount, 2) }}</span>
                        </div>
                        @endif
                        @if($job->additional_charges)
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Additional Charges:</span>
                            <span class="fw-medium">${{ number_format($job->additional_charges, 2) }}</span>
                        </div>
                        @endif
                        <hr class="my-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-lg fw-bold">Total:</span>
                            <span class="text-lg fw-bold text-success-600">${{ number_format($job->total_amount ?? 0, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection