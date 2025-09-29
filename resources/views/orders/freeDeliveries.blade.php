@extends('layout.layout')
@php
    $title = 'Free Deliveries';
    $subTitle = 'Free Delivery Orders Management';
@endphp

@section('content')

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <a href="{{ route('ordersList') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ep:back" class="icon text-xl line-height-1"></iconify-icon>
                Back to Orders
            </a>
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
            </form>
            <form class="navbar-search" method="GET">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search free deliveries..." value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            </form>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="bg-success-50 text-success-600 px-16 py-8 radius-8">
                <iconify-icon icon="mdi:truck-delivery" class="icon me-1"></iconify-icon>
                Total Free Deliveries: {{ $freeDeliveries->total() }}
            </div>
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
                                Order ID
                            </div>
                        </th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Order Number</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Delivery Date</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($freeDeliveries as $order)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $order->id }}">
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    #{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}
                                    <span class="bg-success-focus text-success-600 px-8 py-2 radius-4 fw-medium text-xs">FREE</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->customer->name ?? 'N/A' }}</span>
                                    <br>
                                    <small class="text-xs text-secondary-light">{{ $order->customer->email ?? '' }}</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->order_number ?? 'N/A' }}</span></td>
                        <td><span class="text-md mb-0 fw-bold text-success-600">${{ number_format($order->total_amount ?? 0, 2) }}</span></td>
                        <td>{{ optional($order->purchase)->id ?? 'N/A' }}</td>
                        <td>{{ optional($order->latest->site)->name ?? 'N/A' }}</td>
                        <td>{{ optional($order->product)->name ?? 'N/A' }}</td>
                        <td>{{ optional($order->creator)->name ?? 'N/A' }}</td>
                        <td>{{ $order->unit ?? 'N/A' }}</td>
                        <td>{{ isset($order->price_per_unit) ? '$'.number_format($order->price_per_unit,2) : (isset($order->cost_amount) ? '$'.number_format($order->cost_amount,2) : 'N/A') }}</td>
                        <td>
                            @php $transport = $order->order_amounts->firstWhere('order_amountable_type', 'transportation'); @endphp
                            {{ $transport?->amount ? '$'.number_format($transport->amount,2) : 'N/A' }}
                        </td>
                        <td>{{ $transport?->order_amountable->distance_text ?? 'N/A' }}</td>
                        <td>{{ $transport?->order_amountable->duration_text ?? 'N/A' }}</td>
                        <td>{{ optional($order->wheel)->wheel ?? 'N/A' }}</td>
                        <td>{{ $order->latest->total ?? ($order->order_details->sum('quantity') ?? 'N/A') }}</td>
                        <td>{{ $order->completed ?? 0 }}</td>
                        <td>{{ $order->ongoing ?? 0 }}</td>
                        <td>
                            @if($order->orderStatus)
                                <span class="bg-success-focus text-success-600 border border-success-main px-16 py-4 radius-4 fw-medium text-sm">{{ $order->orderStatus->name }}</span>
                            @else
                                <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-16 py-4 radius-4 fw-medium text-sm">Unknown</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                <a href="{{ route('orderDetails', $order->id) }}" class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" title="View Details">
                                    <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <div class="d-flex flex-column align-items-center justify-content-center py-5">
                                <iconify-icon icon="mdi:truck-delivery-outline" class="icon text-6xl text-neutral-400 mb-3"></iconify-icon>
                                <h5 class="text-neutral-500 mb-2">No Free Deliveries Found</h5>
                                <p class="text-neutral-400 mb-0">
                                    @if(request('search'))
                                        No free delivery orders match your search criteria.
                                    @else
                                        There are no free delivery orders in the system yet.
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
                Showing {{ $freeDeliveries->firstItem() }} to {{ $freeDeliveries->lastItem() }} of {{ $freeDeliveries->total() }} entries
            </span>
            
            @if ($freeDeliveries->hasPages())
                <nav aria-label="Free deliveries pagination">
                    {{ $freeDeliveries->links() }}
                </nav>
            @endif
        </div>

        <!-- Summary Cards -->
        @if($freeDeliveries->count() > 0)
        <div class="row gy-4 mt-24 pt-20 border-top">
            <div class="col-md-3 col-sm-6">
                <div class="card border-success border-2 radius-12">
                    <div class="card-body p-16 text-center">
                        <iconify-icon icon="mdi:truck-delivery" class="text-success-600 text-3xl mb-8"></iconify-icon>
                        <h6 class="text-lg text-success-600 mb-4">Total Free Deliveries</h6>
                        <h4 class="text-2xl fw-bold text-success-600 mb-0">{{ $freeDeliveries->total() }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-primary border-2 radius-12">
                    <div class="card-body p-16 text-center">
                        <iconify-icon icon="mdi:currency-usd" class="text-primary-600 text-3xl mb-8"></iconify-icon>
                        <h6 class="text-lg text-primary-600 mb-4">Total Value Saved</h6>
                        <h4 class="text-2xl fw-bold text-primary-600 mb-0">
                            ${{ number_format($freeDeliveries->sum(function($order) { return $order->order_amounts->where('order_amountable_type', 'transportation')->sum('amount'); }) ?: ($freeDeliveries->count() * 5), 2) }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-warning border-2 radius-12">
                    <div class="card-body p-16 text-center">
                        <iconify-icon icon="mdi:clock-outline" class="text-warning-600 text-3xl mb-8"></iconify-icon>
                        <h6 class="text-lg text-warning-600 mb-4">Pending Deliveries</h6>
                        <h4 class="text-2xl fw-bold text-warning-600 mb-0">
                            {{ $freeDeliveries->filter(function($order) { return !$order->delivery_date || $order->delivery_date > now(); })->count() }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-info border-2 radius-12">
                    <div class="card-body p-16 text-center">
                        <iconify-icon icon="mdi:check-circle" class="text-info-600 text-3xl mb-8"></iconify-icon>
                        <h6 class="text-lg text-info-600 mb-4">Completed Deliveries</h6>
                        <h4 class="text-2xl fw-bold text-info-600 mb-0">
                            {{ $freeDeliveries->filter(function($order) { return $order->delivery_date && $order->delivery_date <= now(); })->count() }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection