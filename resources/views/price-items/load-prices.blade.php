@extends('layout.layout')
@php
$title='Load Prices';
$subTitle = 'Price Item Management';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <h4 class="mb-0">Load Prices (ID: {{ $price->id }})</h4>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('prices') }}" class="btn btn-sm btn-outline-primary">Back to Price List</a>
        </div>
    </div>

    <div class="card-body p-24">
        <div class="row mb-3">
            <div class="col-md-6">
                <form class="navbar-search" method="GET">
                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search zones..." value="{{ request('search') }}">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                    <input type="hidden" name="price_id" value="{{ $price->id }}">
                    <button type="submit" class="d-none"></button>
                </form>
            </div>
        </div>

        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Zone</th>
                        <th scope="col">State</th>
                        <th scope="col">Postcodes</th>
                        @foreach($wheels as $wheel)
                        @foreach($products as $product)
                        <th scope="col">{{ $product->name }}({{ $wheel }})</th>
                        @endforeach
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($zonesData as $zone)
                    <tr>
                        <td>{{ $zone['id'] }}</td>
                        <td>{{ $zone['name'] }}</td>
                        <td>{{ $zone['state'] }}</td>
                        <td>{{ $zone['postcodes'] }}</td>

                        @foreach($wheels as $wheel)
                        @foreach($products as $product)
                        <td>
                            <input
                                type="number"
                                class="form-control form-control-sm load-price-input"
                                data-price-id="{{ $price->id }}"
                                data-zone-id="{{ $zone['id'] }}"
                                data-product-id="{{ $product->id }}"
                                data-wheel-id="{{ $wheel }}"
                                value="{{ ($zone['wheels'][$wheel]['products'][$product->id]['amount'] ?? 0) / 100 }}"
                                step="0.01"
                                min="0">
                        </td>
                        @endforeach
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
            <span>
                Showing {{ $zones->firstItem() ?? 0 }} to {{ $zones->lastItem() ?? 0 }} of {{ $zones->total() ?? 0 }} entries
            </span>

            {{-- Custom Pagination --}}
            @if ($zones->hasPages())
            <nav aria-label="Zone pagination">
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($zones->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                            <iconify-icon icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                        </span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="{{ $zones->previousPageUrl() }}{{ request()->getQueryString() ? '&'.request()->getQueryString() : '' }}">
                            <iconify-icon icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements with Ellipsis --}}
                    @php
                    $total = $zones->lastPage();
                    $current = $zones->currentPage();
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
                            @elseif ($page == $zones->currentPage())
                            <li class="page-item active">
                                <span class="page-link text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600">{{ $page }}</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $zones->url($page) }}{{ request()->getQueryString() ? '&'.request()->getQueryString() : '' }}">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($zones->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $zones->nextPageUrl() }}{{ request()->getQueryString() ? '&'.request()->getQueryString() : '' }}">
                                    <iconify-icon icon="material-symbols:arrow-forward-ios-rounded"></iconify-icon>
                                </a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                    <iconify-icon icon="material-symbols:arrow-forward-ios-rounded"></iconify-icon>
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

@push('scripts')
<script>
    $(document).ready(function() {
        function saveLoadPrice(input) {
            const priceId = $(input).data('price-id');
            const zoneId = $(input).data('zone-id');
            const productId = $(input).data('product-id');
            const wheelId = $(input).data('wheel-id');
            const amount = $(input).val();

            $.ajax({
                url: '{{ route("prices.load.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    price_id: priceId,
                    zone_id: zoneId,
                    product_id: productId,
                    wheel_id: wheelId,
                    amount: amount
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success('Price updated successfully');
                    } else {
                        toastr.error('Failed to update price');
                    }
                },
                error: function() {
                    toastr.error('Failed to update price');
                }
            });
        }

        $('.load-price-input').on('input', function() {
            saveLoadPrice(this);
        });

        $('.load-price-input').on('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                saveLoadPrice(this);
            }
        });
    });
</script>
@endpush