@extends('layout.layout')

@php
    $title='Dashboard';
    $subTitle = 'AI';
    $script= '<script src="' . asset('assets/js/dashboard-charts.js') . '"></script><script src="' . asset('assets/js/homeOneChart.js') . '"></script>';
@endphp

@section('content')

            <div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
                <div class="col">
                    <div class="card shadow-none border bg-gradient-start-1 h-100">
                        <div class="card-body p-20">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div>
                                    <p class="fw-medium text-primary-light mb-1">Total Users</p>
                                    <h6 class="mb-0">{{ number_format($totalUsers) }}</h6>
                                </div>
                                <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                                </div>
                            </div>
                            <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center gap-1 text-success-main">
                                    <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +{{ number_format($newUsers) }}
                                </span>
                                Last 30 days users
                            </p>
                        </div>
                    </div><!-- card end -->
                </div>
                <div class="col">
                    <div class="card shadow-none border bg-gradient-start-2 h-100">
                        <div class="card-body p-20">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div>
                                    <p class="fw-medium text-primary-light mb-1">Total Orders</p>
                                    <h6 class="mb-0">{{ number_format($totalOrders) }}</h6>
                                </div>
                                <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="carbon:order-details" class="text-white text-2xl mb-0"></iconify-icon>
                                </div>
                            </div>
                            <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center gap-1 text-success-main">
                                    <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +{{ number_format($recentOrders) }}
                                </span>
                                Last 30 days orders
                            </p>
                        </div>
                    </div><!-- card end -->
                </div>
                <div class="col">
                    <div class="card shadow-none border bg-gradient-start-3 h-100">
                        <div class="card-body p-20">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div>
                                    <p class="fw-medium text-primary-light mb-1">Total Jobs</p>
                                    <h6 class="mb-0">{{ number_format($totalJobs) }}</h6>
                                </div>
                                <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="mdi:construction" class="text-white text-2xl mb-0"></iconify-icon>
                                </div>
                            </div>
                            <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center gap-1 text-success-main">
                                    <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +{{ number_format($completedJobs) }}
                                </span>
                                Completed jobs
                            </p>
                        </div>
                    </div><!-- card end -->
                </div>
                <div class="col">
                    <div class="card shadow-none border bg-gradient-start-4 h-100">
                        <div class="card-body p-20">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div>
                                    <p class="fw-medium text-primary-light mb-1">Total Revenue</p>
                                    <h6 class="mb-0">RM{{ number_format($orderRevenue, 2) }}</h6>
                                </div>
                                <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                                </div>
                            </div>
                            <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center gap-1 text-success-main">
                                    <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +RM{{ number_format($monthlyOrderData->sum('revenue'), 2) }}
                                </span>
                                Current month
                            </p>
                        </div>
                    </div><!-- card end -->
                </div>
                <div class="col">
                    <div class="card shadow-none border bg-gradient-start-5 h-100">
                        <div class="card-body p-20">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div>
                                    <p class="fw-medium text-primary-light mb-1">Total Trips</p>
                                    <h6 class="mb-0">{{ number_format($totalTrips) }}</h6>
                                </div>
                                <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="mdi:truck-delivery" class="text-white text-2xl mb-0"></iconify-icon>
                                </div>
                            </div>
                            <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center gap-1 text-success-main">
                                    <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> {{ number_format($completedTrips) }}
                                </span>
                                Completed trips
                            </p>
                        </div>
                    </div><!-- card end -->
                </div>
            </div>

            <div class="row gy-4 mt-1">
                <div class="col-xxl-6 col-xl-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <h6 class="text-lg mb-0">Order Revenue</h6>
                                <select class="form-select bg-base form-select-sm w-auto">
                                    <option>Yearly</option>
                                    <option>Monthly</option>
                                    <option>Weekly</option>
                                    <option>Today</option>
                                </select>
                            </div>
                            <div class="d-flex flex-wrap align-items-center gap-2 mt-8">
                                <h6 class="mb-0">RM{{ number_format($orderRevenue, 2) }}</h6>
                                <span class="text-sm fw-semibold rounded-pill bg-success-focus text-success-main border br-success px-8 py-4 line-height-1 d-flex align-items-center gap-1">
                                    {{ number_format(($monthlyOrderData->last()['revenue'] / max($monthlyOrderData->first()['revenue'], 1) - 1) * 100, 1) }}% <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                                </span>
                                <span class="text-xs fw-medium">+ RM{{ number_format($orderRevenue / max(date('j'), 1), 2) }} Per Day</span>
                            </div>
                            <div id="chart" class="pt-28 apexcharts-tooltip-style-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-6">
                    <div class="card h-100 radius-8 border">
                        <div class="card-body p-24">
                            <h6 class="mb-12 fw-semibold text-lg mb-16">Job Status</h6>
                            <div class="d-flex align-items-center gap-2 mb-20">
                                <h6 class="fw-semibold mb-0">{{ number_format($totalJobs) }}</h6>
                                <p class="text-sm mb-0">
                                    <span class="bg-success-focus border br-success px-8 py-2 rounded-pill fw-semibold text-success-main text-sm d-inline-flex align-items-center gap-1">
                                        {{ number_format(($completedJobs / max($totalJobs, 1)) * 100, 0) }}%
                                        <iconify-icon icon="iconamoon:arrow-up-2-fill" class="icon"></iconify-icon>
                                    </span>
                                    Completion Rate
                                </p>
                            </div>

                            <div id="barChart" class="barChart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-6">
                    <div class="card h-100 radius-8 border-0 overflow-hidden">
                        <div class="card-body p-24">
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                                <h6 class="mb-2 fw-bold text-lg">Trip Overview</h6>
                                <div class="">
                                    <select class="form-select form-select-sm w-auto bg-base border text-secondary-light">
                                        <option>Today</option>
                                        <option>Weekly</option>
                                        <option>Monthly</option>
                                        <option>Yearly</option>
                                    </select>
                                </div>
                            </div>


                            <div id="tripOverviewDonutChart" class="apexcharts-tooltip-z-none"></div>

                            <ul class="d-flex flex-wrap align-items-center justify-content-between mt-3 gap-3">
                                <li class="d-flex align-items-center gap-2">
                                    <span class="w-12-px h-12-px radius-2 bg-primary-600"></span>
                                    <span class="text-secondary-light text-sm fw-normal">Completed:
                                        <span class="text-primary-light fw-semibold">{{ number_format($completedTrips) }}</span>
                                    </span>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <span class="w-12-px h-12-px radius-2 bg-yellow"></span>
                                    <span class="text-secondary-light text-sm fw-normal">Cancelled:
                                        <span class="text-primary-light fw-semibold">{{ number_format($cancelledTrips) }}</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-12">
                    <div class="card h-100">
                        <div class="card-body p-24">

                            <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                                <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link d-flex align-items-center active" id="pills-to-do-list-tab" data-bs-toggle="pill" data-bs-target="#pills-to-do-list" type="button" role="tab" aria-controls="pills-to-do-list" aria-selected="true">
                                            Latest Registered
                                            <span class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">{{ $totalUsers }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link d-flex align-items-center" id="pills-recent-leads-tab" data-bs-toggle="pill" data-bs-target="#pills-recent-leads" type="button" role="tab" aria-controls="pills-recent-leads" aria-selected="false" tabindex="-1">
                                            Latest Subscribe
                                            <span class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">{{ $newUsers }}</span>
                                        </button>
                                    </li>
                                </ul>
                                <a  href="javascript:void(0)" class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                                    View All
                                    <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                                </a>
                            </div>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-to-do-list" role="tabpanel" aria-labelledby="pills-to-do-list-tab" tabindex="0">
                                    <div class="table-responsive scroll-sm">
                                        <table class="table bordered-table sm-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Users </th>
                                                    <th scope="col">Registered On</th>
                                                    <th scope="col">Plan</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($latestUsers as $index => $user)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('assets/images/users/user' . (($index % 5) + 1) . '.png') }}" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                            <div class="flex-grow-1">
                                                                <h6 class="text-md mb-0 fw-medium">{{ $user->name ?? 'N/A' }}</h6>
                                                                <span class="text-sm text-secondary-light fw-medium">{{ $user->email ?? 'N/A' }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</td>
                                                    <td>{{ isset($user->super_admin) && $user->super_admin ? 'Admin' : 'Free' }}</td>
                                                    <td class="text-center">
                                                        <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No users found</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-recent-leads" role="tabpanel" aria-labelledby="pills-recent-leads-tab" tabindex="0">
                                    <div class="table-responsive scroll-sm">
                                        <table class="table bordered-table sm-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Users </th>
                                                    <th scope="col">Registered On</th>
                                                    <th scope="col">Plan</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($recentSubscribers as $index => $subscriber)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('assets/images/users/user' . (($index % 5) + 1) . '.png') }}" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                            <div class="flex-grow-1">
                                                                <h6 class="text-md mb-0 fw-medium">{{ $subscriber->name ?? 'N/A' }}</h6>
                                                                <span class="text-sm text-secondary-light fw-medium">{{ $subscriber->email ?? 'N/A' }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $subscriber->created_at ? $subscriber->created_at->format('d M Y') : 'N/A' }}</td>
                                                    <td>{{ isset($subscriber->super_admin) && $subscriber->super_admin ? 'Admin' : 'Free' }}</td>
                                                    <td class="text-center">
                                                        <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No recent subscribers found</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                                <h6 class="mb-2 fw-bold text-lg mb-0">Top Performer</h6>
                                <a  href="javascript:void(0)" class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                                    View All
                                    <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                                </a>
                            </div>

                            <div class="mt-32">
                                @forelse($topPerformers as $index => $performer)
                                    <div class="d-flex align-items-center justify-content-between gap-3 {{ $loop->last ? '' : 'mb-24' }}">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/users/user' . (($index % 5) + 1) . '.png') }}" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-medium">{{ $performer->name }}</h6>
                                                <span class="text-sm text-secondary-light fw-medium">ID: {{ $performer->id }}</span>
                                            </div>
                                        </div>
                                        <span class="text-primary-light text-md fw-medium">{{ $performer->orders_count }} orders</span>
                                    </div>
                                @empty
                                    <div class="text-center py-4">
                                        <p class="text-muted">No performers found</p>
                                    </div>
                                @endforelse

                            </div>

                        </div>
                    </div>
                </div>
                                <div class="col-xxl-6 col-xl-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                                <h6 class="mb-2 fw-bold text-lg mb-0">Top Order Locations</h6>
                                <select class="form-select form-select-sm w-auto bg-base border text-secondary-light">
                                    <option>Today</option>
                                    <option>Weekly</option>
                                    <option>Monthly</option>
                                    <option>Yearly</option>
                                </select>
                            </div>

                            <div class="row gy-4">
                                <div class="col-lg-6">
                                    <div id="world-map" class="h-100 border radius-8"></div>
                                    
                                    <!-- Map will be initialized by dashboard-charts.js -->
                                </div>

                                <div class="col-lg-6">
                                    <div class="h-100 border p-16 pe-0 radius-8">
                                        <div class="max-h-266-px overflow-y-auto scroll-sm pe-16">
                                            @php
                                                $maxCount = $ordersByLocation->max('count');
                                            @endphp
                                            
                                            @foreach($ordersByLocation as $index => $location)
                                                <div class="d-flex align-items-center justify-content-between gap-3 mb-12 pb-2">
                                                    <div class="d-flex align-items-center w-100">
                                                        <div class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 bg-primary-600 d-flex align-items-center justify-content-center text-white font-weight-bold">
                                                            {{ $index + 1 }}
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="text-sm mb-0">{{ $location->city }}</h6>
                                                            <span class="text-xs text-secondary-light fw-medium">{{ number_format($location->count) }} Orders</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 w-100">
                                                        <div class="w-100 max-w-66 ms-auto">
                                                            <div class="progress progress-sm rounded-pill" role="progressbar" aria-valuenow="{{ $maxCount > 0 ? ($location->count / $maxCount) * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <span class="text-secondary-light font-xs fw-semibold">{{ number_format(($location->count / $maxCount) * 100, 0) }}%</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                                <h6 class="mb-2 fw-bold text-lg mb-0">Monthly Trips & Products</h6>
                                <select class="form-select form-select-sm w-auto bg-base border text-secondary-light">
                                    <option>Monthly</option>
                                    <option>Yearly</option>
                                </select>
                            </div>

                            <ul class="d-flex flex-wrap align-items-center mt-3 gap-3">
                                <li class="d-flex align-items-center gap-2">
                                    <span class="w-12-px h-12-px rounded-circle bg-primary-600"></span>
                                    <span class="text-secondary-light text-sm fw-semibold">Trips:
                                        <span class="text-primary-light fw-bold">{{ number_format($totalTrips) }}</span>
                                    </span>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <span class="w-12-px h-12-px rounded-circle bg-yellow"></span>
                                    <span class="text-secondary-light text-sm fw-semibold">Products:
                                        <span class="text-primary-light fw-bold">{{ number_format($totalProducts) }}</span>
                                    </span>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <span class="w-12-px h-12-px rounded-circle bg-success-main"></span>
                                    <span class="text-secondary-light text-sm fw-semibold">Active Products:
                                        <span class="text-primary-light fw-bold">{{ number_format($activeProducts) }}</span>
                                    </span>
                                </li>
                            </ul>

                            <div class="mt-40">
                                <div id="tripProductChart" class="margin-16-minus"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection