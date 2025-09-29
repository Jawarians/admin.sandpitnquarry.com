@extends('layout.layout')
@php
    $title = 'Analyst Dashboard';
    $subTitle = 'Quick metrics for Orders, Jobs, and Trips';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <h5 class="card-title mb-0">Analyst Dashboard</h5>
            <small class="text-secondary-light">Overview</small>
        </div>
    </div>
    <div class="card-body p-24">
        <div class="row gy-4">
            <div class="col-md-4">
                <div class="card border radius-12 p-20 h-100">
                    <h6 class="mb-2">Orders</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="mb-0">{{ $ordersCount }}</h3>
                            <p class="text-secondary-light mb-0">Total Orders</p>
                        </div>
                        <a href="{{ route('ordersList') }}" class="btn btn-outline-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border radius-12 p-20 h-100">
                    <h6 class="mb-2">Jobs</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="mb-0">{{ $jobsCount }}</h3>
                            <p class="text-secondary-light mb-0">Total Jobs</p>
                        </div>
                        <a href="{{ route('jobsList') }}" class="btn btn-outline-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border radius-12 p-20 h-100">
                    <h6 class="mb-2">Trips</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="mb-0">{{ $tripsCount }}</h3>
                            <p class="text-secondary-light mb-0">Total Trips</p>
                        </div>
                        <a href="{{ route('tripsList') }}" class="btn btn-outline-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-24">
            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="card border radius-12 p-20">
                        <h6 class="mb-3">Recent Orders</h6>
                        <ul class="list-unstyled">
                            @foreach($recentOrders as $order)
                                <li class="py-2 d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-medium">Order #{{ $order->id }}</div>
                                        <div class="text-secondary-light text-sm">{{ $order->created_at ? $order->created_at->format('M d, Y') : '' }}</div>
                                    </div>
                                    <a href="{{ route('orderDetails', [$order->id]) }}" class="btn btn-link">View</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border radius-12 p-20">
                        <h6 class="mb-3">Recent Jobs</h6>
                        <ul class="list-unstyled">
                            @foreach($recentJobs as $job)
                                <li class="py-2 d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-medium">Job #{{ $job->id }}</div>
                                        <div class="text-secondary-light text-sm">{{ $job->created_at ? $job->created_at->format('M d, Y') : '' }}</div>
                                    </div>
                                    <a href="{{ route('jobDetails', [$job->id]) }}" class="btn btn-link">View</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border radius-12 p-20">
                        <h6 class="mb-3">Recent Trips</h6>
                        <ul class="list-unstyled">
                            @foreach($recentTrips as $trip)
                                <li class="py-2 d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-medium">Trip #{{ $trip->id }}</div>
                                        <div class="text-secondary-light text-sm">{{ $trip->created_at ? $trip->created_at->format('M d, Y') : '' }}</div>
                                    </div>
                                    <a href="{{ route('tripDetails', [$trip->id]) }}" class="btn btn-link">View</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
