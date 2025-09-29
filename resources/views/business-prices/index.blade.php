@extends('layout.layout')
@php
    $title='Prices List';
    $subTitle = 'Business Price Management';
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
            <form method="GET" id="per-page-form">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="per_page" onchange="document.getElementById('per-page-form').submit()">
                    <option value="5" {{ request('per_page') === '5' ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page') === '10' || request('per_page') === null || request('per_page') === '' ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page') === '25' ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') === '50' ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page') === '100' ? 'selected' : '' }}>100</option>
                </select>
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                @if(request('unit'))
                    <input type="hidden" name="unit" value="{{ request('unit') }}">
                @endif
            </form>
            <form class="navbar-search" method="GET" id="search-form">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search prices..." value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon" onclick="document.getElementById('search-form').submit()"></iconify-icon>
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                @if(request('per_page'))
                    <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                @endif
                @if(request('unit'))
                    <input type="hidden" name="unit" value="{{ request('unit') }}">
                @endif
                <button type="submit" class="d-none"></button>
            </form>
            <form method="GET" id="status-form">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="status" onchange="document.getElementById('status-form').submit()">
                    <option value="All Status" {{ request('status') === 'All Status' || !request('status') ? 'selected' : '' }}>All Status</option>
                    @foreach($priceStatuses as $status)
                        <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('per_page'))
                    <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                @endif
                @if(request('unit'))
                    <input type="hidden" name="unit" value="{{ request('unit') }}">
                @endif
            </form>
        </div>
        <div class="d-flex align-items-center gap-2">
            <form method="GET" id="unit-form" class="mb-0">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="unit" onchange="document.getElementById('unit-form').submit()">
                    <option value="Tonne" {{ request('unit') === 'Tonne' || !request('unit') ? 'selected' : '' }}>Tonne</option>
                    <option value="Load" {{ request('unit') === 'Load' ? 'selected' : '' }}>Load</option>
                </select>
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                @if(request('per_page'))
                    <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                @endif
            </form>
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
                                ID
                            </div>
                        </th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Fine sand</th>
                        <th scope="col">Coarse sand</th>
                        <th scope="col">Unwashed sand</th>
                        <th scope="col">Aggregate3/4</th>
                        <th scope="col">Crusher run</th>
                        <th scope="col">Chipping</th>
                        <th scope="col">Quarry waste</th>
                        <th scope="col">6x9 block</th>
                        <th scope="col">Quarry dust</th>
                        <th scope="col">Earth soil</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Define the material columns in the order we want to display them
                        $materialColumns = [
                            'Fine sand', 'Coarse sand', 'Unwashed sand', 'Aggregate3/4',
                            'Crusher run', 'Chipping', 'Quarry waste', '6x9 block',
                            'Quarry dust', 'Earth soil'
                        ];
                    @endphp
                    
                    @forelse($prices as $index => $price)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-10">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $price['id'] ?? $price->id ?? '' }}">
                                    </div>
                                    {{ $price['id'] ?? $price->id ?? '' }}
                                </div>
                            </td>
                            <td>{{ $price['name'] ?? $price->name ?? $price->reference_number ?? '' }}</td>
                            <td>{{ $price['phone'] ?? $price->phone ?? '60101234567' }}</td>
                            
                            @php
                                $priceMap = [];
                                
                                // Check if we're using the structured data from transformed collection (Tonne unit)
                                if (isset($price['prices'])) {
                                    $priceMap = $price['prices'];
                                } 
                                // For Load unit or if prices aren't in the expected format
                                else if (isset($price->business_price_items)) {
                                    foreach ($price->business_price_items as $item) {
                                        if ($item->product && isset($item->product->name)) {
                                            $productName = $item->product->name;
                                            
                                            if (isset($item->business_price_item_details) && count($item->business_price_item_details) > 0) {
                                                foreach ($item->business_price_item_details as $detail) {
                                                    if (isset($detail->price)) {
                                                        $priceMap[$productName] = $detail->price;
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            @endphp
                            
                            @foreach($materialColumns as $material)
                                <td>
                                    @if(isset($priceMap[$material]) && $priceMap[$material] > 0)
                                        {{ $priceMap[$material] }}
                                    @else
                                        0
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">No prices available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
            <span>
                @if(method_exists($prices, 'firstItem') && method_exists($prices, 'lastItem') && method_exists($prices, 'total') && $prices->total() > 0)
                    Showing {{ $prices->firstItem() }} to {{ $prices->lastItem() }} of {{ $prices->total() }} entries
                @else
                    Showing 0 to 0 of 0 entries
                @endif
            </span>
                
                @if (method_exists($prices, 'hasPages') && $prices->hasPages())
                    <nav aria-label="Price pagination">
                        <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                            {{-- Previous Page Link --}}
                            @if ($prices->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                        <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                    </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" href="{{ $prices->previousPageUrl() }}">
                                        <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                    </a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($prices->getUrlRange(1, $prices->lastPage()) as $page => $url)
                                @if ($page == $prices->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($prices->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" href="{{ $prices->nextPageUrl() }}">
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