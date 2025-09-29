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
            <a href="{{ route('business.prices') }}" class="btn btn-sm btn-outline-primary">Back to Price List</a>
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
                            <th colspan="{{ $products->count() }}" class="text-center">{{ $wheel }}t</th>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        @foreach($wheels as $wheel)
                            @foreach($products as $product)
                                <th scope="col">{{ $product->name }}</th>
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
                                        min="0"
                                    >
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
            
            {{ $zones->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.load-price-input').on('change', function() {
            const priceId = $(this).data('price-id');
            const zoneId = $(this).data('zone-id');
            const productId = $(this).data('product-id');
            const wheelId = $(this).data('wheel-id');
            const amount = $(this).val();
            
            $.ajax({
                url: '{{ route("business.prices.load.update") }}',
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
                        // Flash success message or update UI
                        toastr.success('Price updated successfully');
                    } else {
                        toastr.error('Failed to update price');
                    }
                },
                error: function() {
                    toastr.error('Failed to update price');
                }
            });
        });
    });
</script>
@endpush