@extends('layout.layout')
@php
$title = 'Self Pickups';
$subTitle = 'Self Pickup Orders Management';
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
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search self pickups..." value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            </form>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="bg-info-50 text-info-600 px-16 py-8 radius-8">
                <iconify-icon icon="mdi:store" class="icon me-1"></iconify-icon>
                Total Self Pickups: {{ $selfPickups->total() }}
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
                                Id
                            </div>
                        </th>
                        <th scope="col">Customer</th>
                        <th scope="col">Quarry</th>
                        <th scope="col">Product</th>
                        <th scope="col">Agent</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Price / Unit</th>
                        <th scope="col">Wheel</th>
                        <th scope="col">Start at</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Completed</th>
                        <th scope="col">Ongoing</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created at</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($selfPickups as $order)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $order->id }}">
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    {{ $order->order_number ?? str_pad($order->id, 10, '0', STR_PAD_LEFT) }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->customer->name ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->oldest->site->name ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->product->name ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->agent->name ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->unit ?? 'Tonne' }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-bold text-success-600">MYR {{ number_format($order->price_per_unit/100 ?? 0, 2) }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->wheel->name ?? $order->wheel->capacity ?? 'N/A' }}</span>
                        </td>
                        <td>
                            @if($order->start_date)
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ \Carbon\Carbon::parse($order->start_date)->format('M d, Y') }}</span>
                            @else
                            <span class="text-xs text-secondary-light">Not scheduled</span>
                            @endif
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->oldest->quantity ?? ($order->order_details->sum('quantity') ?? 'N/A') }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->completed ?? 0 }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $order->ongoing ?? 0 }}</span>
                        </td>
                        <td>
                            @if($order->orderStatus)
                            <span class="bg-info-focus text-info-600 border border-info-main px-16 py-4 radius-4 fw-medium text-sm">{{ $order->orderStatus->name }}</span>
                            @else
                            <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-16 py-4 radius-4 fw-medium text-sm">Unknown</span>
                            @endif
                        </td>
                        <td>
                            {{ $order->created_at ? $order->created_at->format('M d, Y H:i:s') : 'N/A' }}
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                <a href="{{ route('orderDetails', $order->id) }}" class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" title="View Details">
                                    <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                </a>
                                <a href="{{ route('orderEdit', $order->id) }}" class="bg-primary-focus bg-hover-primary-200 text-primary-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" title="Update Order">
                                    <iconify-icon icon="majesticons:pencil-line" class="icon text-xl"></iconify-icon>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="15" class="text-center py-4">
                            <div class="d-flex flex-column align-items-center justify-content-center py-5">
                                <iconify-icon icon="mdi:store-outline" class="icon text-6xl text-neutral-400 mb-3"></iconify-icon>
                                <h5 class="text-neutral-500 mb-2">No Self Pickups Found</h5>
                                <p class="text-neutral-400 mb-0">
                                    @if(request('search'))
                                    No self pickup orders match your search criteria.
                                    @else
                                    There are no self pickup orders in the system yet.
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
                Showing {{ $selfPickups->firstItem() }} to {{ $selfPickups->lastItem() }} of {{ $selfPickups->total() }} entries
            </span>

            @if ($selfPickups->hasPages())
            <nav aria-label="Self pickups pagination">
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($selfPickups->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="{{ $selfPickups->previousPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements with Ellipsis --}}
                    @php
                    $total = $selfPickups->lastPage();
                    $current = $selfPickups->currentPage();
                    $delta = 2;
                    $pages = [];
                    for ($i = 1; $i <= $total; $i++) {
                        if ($i==1 || $i==$total || ($i>= $current - $delta && $i <= $current + $delta)) {
                            $pages[]=$i;
                            }
                            }
                            $displayPages=[];
                            $prev=0;
                            foreach ($pages as $page) {
                            if ($prev && $page - $prev> 1) {
                            $displayPages[] = '...';
                            }
                            $displayPages[] = $page;
                            $prev = $page;
                            }
                            @endphp

                            {{-- Pagination Elements with Ellipsis --}}
                            @foreach ($displayPages as $page)
                            @if ($page === '...')
                            <li class="page-item disabled">
                                <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">...</span>
                            </li>
                            @elseif ($page == $selfPickups->currentPage())
                            <li class="page-item active">
                                <span class="page-link bg-primary-600 text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">{{ $page }}</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $selfPickups->url($page) }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($selfPickups->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $selfPickups->nextPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}">
                                    <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                                </a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                    <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                                </span>
                            </li>
                            @endif
                </ul>
            </nav>
            @endif
        </div>

        <!-- Summary Cards -->
        @if($selfPickups->count() > 0)
        <div class="row gy-4 mt-24 pt-20 border-top">
            <div class="col-md-3 col-sm-6">
                <div class="card border-info border-2 radius-12">
                    <div class="card-body p-16 text-center">
                        <iconify-icon icon="mdi:store" class="text-info-600 text-3xl mb-8"></iconify-icon>
                        <h6 class="text-lg text-info-600 mb-4">Total Self Pickups</h6>
                        <h4 class="text-2xl fw-bold text-info-600 mb-0">{{ $selfPickups->total() }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-success border-2 radius-12">
                    <div class="card-body p-16 text-center">
                        <iconify-icon icon="mdi:currency-usd" class="text-success-600 text-3xl mb-8"></iconify-icon>
                        <h6 class="text-lg text-success-600 mb-4">Total Value</h6>
                        <h4 class="text-2xl fw-bold text-success-600 mb-0">
                            ${{ number_format($selfPickups->sum('total_amount'), 2) }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-warning border-2 radius-12">
                    <div class="card-body p-16 text-center">
                        <iconify-icon icon="mdi:clock-outline" class="text-warning-600 text-3xl mb-8"></iconify-icon>
                        <h6 class="text-lg text-warning-600 mb-4">Pending Pickups</h6>
                        <h4 class="text-2xl fw-bold text-warning-600 mb-0">
                            {{ $selfPickups->filter(function($order) { 
                                return $order->isPendingPickup();
                            })->count() }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card border-primary border-2 radius-12">
                    <div class="card-body p-16 text-center">
                        <iconify-icon icon="mdi:check-circle" class="text-primary-600 text-3xl mb-8"></iconify-icon>
                        <h6 class="text-lg text-primary-600 mb-4">Completed Pickups</h6>
                        <h4 class="text-2xl fw-bold text-primary-600 mb-0">
                            {{ $selfPickups->filter(function($order) { 
                                return $order->isPickupCompleted(); 
                            })->count() }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pickup Location Information -->
        <div class="row gy-4 mt-24">
            <div class="col-12">
                <div class="card bg-info-50 border-info border-2 radius-12">
                    <div class="card-body p-20">
                        <div class="d-flex align-items-start gap-3">
                            <iconify-icon icon="mdi:map-marker" class="text-info-600 text-2xl mt-2"></iconify-icon>
                            <div>
                                <h6 class="text-lg text-info-600 mb-8">Pickup Location Information</h6>
                                <p class="text-secondary-light mb-8">
                                    All self-pickup orders can be collected from our main warehouse location during business hours.
                                </p>
                                <div class="row gy-2">
                                    <div class="col-md-6">
                                        <strong class="text-info-600">Business Hours:</strong><br>
                                        <span class="text-secondary-light">Monday - Friday: 8:00 AM - 6:00 PM</span><br>
                                        <span class="text-secondary-light">Saturday: 9:00 AM - 4:00 PM</span><br>
                                        <span class="text-secondary-light">Sunday: Closed</span>
                                    </div>
                                    <div class="col-md-6">
                                        <strong class="text-info-600">Contact Information:</strong><br>
                                        <span class="text-secondary-light">Phone: (555) 123-4567</span><br>
                                        <span class="text-secondary-light">Email: pickup@sandpit.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection