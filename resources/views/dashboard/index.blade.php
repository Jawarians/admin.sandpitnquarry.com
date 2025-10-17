@extends('layout.layout')

@php
$title = "Dashboard";
$subTitle = "Analyst";
@endphp
<style>
    .dashboard-card-link {
        transition: transform 0.2s ease-in-out;
    }

    .dashboard-card-link:hover {
        transform: translateY(-3px);
    }

    .dashboard-title-link:hover {
        color: #4b6fff !important;
    }

    .dashboard-title-link:hover iconify-icon {
        transform: translateX(3px);
        transition: transform 0.2s ease;
    }
</style>
@php
$dashboardPayload = [
    'monthlyOrderData' => $monthlyOrderData,
    'dailyOrderData' => $dailyOrderData,
    'jobsByTypeData' => $jobsByTypeData ?? [],
    'completedTrips' => (int) $completedTrips,
    'cancelledTrips' => (int) $cancelledTrips,
    'totalTrips' => (int) $totalTrips,
    'ordersByLocation' => $ordersByLocation,
    'dailySalesData' => $dailySalesData ?? []
];
@endphp

<script type="application/json" id="dashboard-data">
@json($dashboardPayload)
</script>

<script>
    // Parse server-provided JSON data safely into JS.
    const dashboardData = JSON.parse(document.getElementById('dashboard-data').textContent || '{}');
</script>


<!-- Load chart scripts -->
<script src="{{ asset('assets/js/dashboard-charts.js') }}"></script>
<script src="{{ asset('assets/js/chart-emergency-fix.js') }}"></script>
<script src="{{ asset('assets/js/homeOneChart.js') }}"></script>

<script>
    (function waitForInit() {
        function tryInit() {
            if (typeof initDashboardCharts === "function") {
                initDashboardCharts();
                return;
            }
            var retries = 0;
            var maxRetries = 200; // longer wait (~10s)
            var iv = setInterval(function() {
                if (typeof initDashboardCharts === "function") {
                    clearInterval(iv);
                    initDashboardCharts();
                } else if (++retries >= maxRetries) {
                    clearInterval(iv);
                }
            }, 50);
        }

        if (document.readyState === "complete" || document.readyState === "interactive") {
            tryInit();
        } else {
            window.addEventListener("DOMContentLoaded", tryInit);
        }
    })();
</script>

@section('content')

<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <a href="{{ route('usersList') }}" class="card-body p-20 text-decoration-none dashboard-card-link">
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
            </a>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <a href="{{ route('ordersList') }}" class="card-body p-20 text-decoration-none dashboard-card-link">
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
            </a>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <a href="{{ route('jobsList') }}" class="card-body p-20 text-decoration-none dashboard-card-link">
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
            </a>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-4 h-100">
            <a href="{{ route('invoiceList') }}" class="card-body p-20 text-decoration-none dashboard-card-link">
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
                    @php
                    // Safely calculate the sum of revenue for the current month
                    $currentMonth = date("n");
                    $currentMonthData = $monthlyOrderData->firstWhere("month", date("M"));
                    $currentMonthRevenue = $currentMonthData ? ($currentMonthData["revenue"] ?? 0) : 0;
                    $revenueClass = $currentMonthRevenue >= 0 ? "text-success-main" : "text-danger-main";
                    $arrowIcon = $currentMonthRevenue >= 0 ? "bxs:up-arrow" : "bxs:down-arrow";
                    $prefix = $currentMonthRevenue >= 0 ? "+" : "";
                    @endphp
                    <span class="d-inline-flex align-items-center gap-1 {{ $revenueClass }}">
                        <iconify-icon icon="{{ $arrowIcon }}" class="text-xs"></iconify-icon> {{ $prefix }}RM{{ number_format(abs($currentMonthRevenue), 2) }}
                    </span>
                    Current month
                </p>
            </a>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-5 h-100">
            <a href="{{ route('tripsList') }}" class="card-body p-20 text-decoration-none dashboard-card-link">
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
            </a>
        </div><!-- card end -->
    </div>
</div>

<div class="row gy-4 mt-1">
    <div class="col-xxl-6 col-xl-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h6 class="text-lg mb-0">
                        <a href="{{ route('invoiceList') }}" class="text-decoration-none d-flex align-items-center gap-1 dashboard-title-link">
                            Order Revenue
                            <iconify-icon icon="heroicons:arrow-right-20-solid" class="text-primary"></iconify-icon>
                        </a>
                    </h6>
                    <select class="form-select bg-base form-select-sm w-auto">
                        <option>Yearly</option>
                        <option>Monthly</option>
                        <option>Weekly</option>
                        <option>Today</option>
                    </select>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 mt-8">
                    <h6 class="mb-0">RM{{ number_format($orderRevenue, 2) }}</h6>
                    @php
                    // Safely calculate revenue growth percentage
                    $firstRevenue = $monthlyOrderData->first() ? ($monthlyOrderData->first()["revenue"] ?? 0) : 0;
                    $lastRevenue = $monthlyOrderData->last() ? ($monthlyOrderData->last()["revenue"] ?? 0) : 0;

                    if ($firstRevenue > 0) {
                    $growthPercentage = ($lastRevenue / $firstRevenue - 1) * 100;
                    } else if ($lastRevenue > 0) {
                    $growthPercentage = 100; // If first is 0 but last is positive, show 100%
                    } else {
                    $growthPercentage = 0; // Both are 0
                    }

                    $badgeClass = $growthPercentage >= 0 ? "bg-success-focus text-success-main br-success" : "bg-danger-focus text-danger-main br-danger";
                    $arrowIcon = $growthPercentage >= 0 ? "bxs:up-arrow" : "bxs:down-arrow";
                    @endphp
                    <span class="text-sm fw-semibold rounded-pill {{ $badgeClass }} border px-8 py-4 line-height-1 d-flex align-items-center gap-1">
                        {{ number_format(abs($growthPercentage), 1) }}% <iconify-icon icon="{{ $arrowIcon }}" class="text-xs"></iconify-icon>
                    </span>
                    <span class="text-xs fw-medium">+ RM{{ number_format($orderRevenue / max(date('j'), 1), 2) }} Per Day</span>
                </div>

                <!-- Order Revenue Chart -->
                <div id="orderRevenueChart" class="pt-28"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-xl-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h6 class="text-lg mb-0">
                        <a href="{{ route('ordersList') }}" class="text-decoration-none d-flex align-items-center gap-1 dashboard-title-link">
                            Order Tracking
                            <iconify-icon icon="heroicons:arrow-right-20-solid" class="text-primary"></iconify-icon>
                        </a>
                    </h6>
                    <select class="form-select bg-base form-select-sm w-auto" id="orderTrackingPeriod">
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                    </select>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 mt-8">
                    <h6 class="mb-0" id="orderTrackingTotal">{{ number_format($recentOrders) }} Orders</h6>
                    <span class="text-sm fw-semibold rounded-pill bg-success-focus text-success-main border br-success px-8 py-4 line-height-1 d-flex align-items-center gap-1">
                        <span id="orderTrackingPercentage">
                            {{ $dailyOrderData->count() > 0 ? number_format((($dailyOrderData->last()['count'] / max($dailyOrderData->first()['count'], 1)) - 1) * 100, 1) : '0' }}%
                        </span>
                        <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                    </span>
                    <span class="text-xs fw-medium">Last 30 days</span>
                </div>
                <div id="orderTrackingChart" class="pt-28 apexcharts-tooltip-style-1"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6">
        <div class="card h-100 radius-8 border">
            <div class="card-body p-24">
                <h6 class="mb-12 fw-semibold text-lg mb-16">
                    <a href="{{ route('jobsList') }}" class="text-decoration-none d-flex align-items-center gap-1 dashboard-title-link">
                        Job Status
                        <iconify-icon icon="heroicons:arrow-right-20-solid" class="text-primary"></iconify-icon>
                    </a>
                </h6>
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
               <div id="barChart" class="barChart" style="min-height:250px; width:100%; height:250px; padding:0; margin:0; display:block;"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-xl-12">
        <div class="card h-100 radius-8 border">
            <div class="card-body p-24">
                <h6 class="mb-12 fw-semibold text-lg mb-16">
                    <a href="{{ route('prices') }}" class="text-decoration-none d-flex align-items-center gap-1 dashboard-title-link">
                        Total Sales
                        <iconify-icon icon="heroicons:arrow-right-20-solid" class="text-primary"></iconify-icon>
                    </a>
                </h6>
                <div class="d-flex align-items-center gap-2 mb-20">
                    @php
                    // Calculate total daily sales if available - Fixed for collection
                    $totalDailySales = 0;
                    $salesCount = 0;

                    if (isset($dailySalesData) && $dailySalesData->isNotEmpty()) {
                    $totalDailySales = $dailySalesData->sum('amount');
                    $salesCount = $dailySalesData->count();
                    }

                    // Calculate average daily sales
                    $avgDailySales = $salesCount > 0 ? $totalDailySales / $salesCount : 0;
                    @endphp
                    <h6 class="fw-semibold mb-0">RM{{ number_format($totalDailySales, 2) }}</h6>
                    <p class="text-sm mb-0">
                        <span class="bg-info-focus border br-info px-8 py-2 rounded-pill fw-semibold text-info-main text-sm d-inline-flex align-items-center gap-1">
                            RM{{ number_format($avgDailySales, 2) }}
                            <iconify-icon icon="material-symbols:trending-up" class="icon"></iconify-icon>
                        </span>
                        Avg. Daily
                    </p>
                </div>

                <div id="dailySalesChart" class="dailySalesChart" style="min-height: 200px; width: 100%; height: 200px;"></div>
                <div class="text-center mt-2">
                    <small class="text">Last 7 days</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6">
        <div class="card h-100 radius-8 border-0 overflow-hidden">
            <div class="card-body p-24">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="mb-2 fw-bold text-lg">
                        <a href="{{ route('tripsList') }}" class="text-decoration-none d-flex align-items-center gap-1 dashboard-title-link">
                            Trip Overview
                            <iconify-icon icon="heroicons:arrow-right-20-solid" class="text-primary"></iconify-icon>
                        </a>
                    </h6>
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
                    <a href="javascript:void(0)" class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
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
                    <h6 class="mb-2 fw-bold text-lg mb-0">
                        <a href="{{ route('usersList') }}" class="text-decoration-none dashboard-title-link">Top Performer</a>
                    </h6>
                    <a href="{{ route('usersList') }}" class="text-primary-600 hover-text-primary d-flex align-items-center gap-1 dashboard-title-link">
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
                    <h6 class="mb-2 fw-bold text-lg mb-0">
                        <a href="{{ route('ordersList') }}" class="text-decoration-none dashboard-title-link">Top Order Locations</a>
                    </h6>
                    <select class="form-select form-select-sm w-auto bg-base border text-secondary-light">
                        <option>Today</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>Yearly</option>
                    </select>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="h-100 border p-8 pe-0 radius-8">
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


</div>

@endsection