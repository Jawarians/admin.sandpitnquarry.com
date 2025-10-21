@extends('layout.layout')
@php
$title = 'Business Prices';
$subTitle = 'Business Prices List';
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
            </form>
            <form class="navbar-search" method="GET">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            </form>
        </div>
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Site</th>
                        <th>Agent</th>
                        <th>Type</th>
                        <th>Unit</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($businessPrices as $price)
                    <tr>
                        <td>{{ $price->id }}</td>
                        <td>{{ $price->user->name ?? '' }}</td>
                        <td>{{ $price->address->latest->city ?? '' }}</td>
                        <td>{{ $price->creator->name ?? '' }}</td>
                        <td>{{ $price->latest->type ?? '' }}</td>
                        <td>{{ $price->latest->unit ?? '' }}</td>
                        <td>{{ $price->latest->status ?? '' }}</td>
                        <td>{{ $price->created_at ? $price->created_at->format('d M Y') : '' }}</td>
                        <td>
                            <a href="{{ route('business-prices.edit-status', $price->id) }}" class="btn btn-sm btn-primary">Update Status</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No business prices found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
            <span>
                Showing {{ $businessPrices->firstItem() ?? 0 }} to {{ $businessPrices->lastItem() ?? 0 }} of {{ $businessPrices->total() }} entries
            </span>
            @if ($businessPrices->hasPages())
            <nav aria-label="Business Prices pagination">
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($businessPrices->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="{{ $businessPrices->previousPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </a>
                    </li>
                    @endif
                    {{-- Pagination Elements with Ellipsis --}}
                    @php
                    $total = $businessPrices->lastPage();
                    $current = $businessPrices->currentPage();
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
                    @foreach ($displayPages as $page)
                        @if ($page === '...')
                        <li class="page-item disabled">
                            <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">...</span>
                        </li>
                        @elseif ($page == $businessPrices->currentPage())
                        <li class="page-item active">
                            <span class="page-link text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600">{{ $page }}</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                href="{{ $businessPrices->url($page) }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}">{{ $page }}</a>
                        </li>
                        @endif
                    @endforeach
                    {{-- Next Page Link --}}
                    @if ($businessPrices->hasMorePages())
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="{{ $businessPrices->nextPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}">
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
    </div>
</div>
@endsection
