@extends('layout.layout')
@php
$title='Price Items List';
$subTitle = 'Price Item Management';
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
                @if(request('price_id'))
                <input type="hidden" name="price_id" value="{{ request('price_id') }}">
                @endif
            </form>
            <form class="navbar-search" method="GET" id="search-form">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search prices..." value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon" onclick="document.getElementById('search-form').submit()"></iconify-icon>
                @if(request('price_id'))
                <input type="hidden" name="price_id" value="{{ request('price_id') }}">
                @endif
                @if(request('per_page'))
                <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                @endif
                <button type="submit" class="d-none"></button>
            </form>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="d-flex align-items-center">
                <a href="{{ route('price.items.create') }}" class="btn btn-sm btn-primary">
                    <iconify-icon icon="mdi:plus"></iconify-icon> New Price Item
                </a>
            </div>

            <div class="btn-group">
                <a href="{{ url()->current() }}?type=site&view=tonne{{ request('search') ? '&search='.request('search') : '' }}{{ request('per_page') ? '&per_page='.request('per_page') : '' }}"
                    class="btn btn-sm {{ request('view') == 'load' ? 'btn-secondary' : 'btn-primary' }}">View Tonne Prices</a>
                <a href="{{ url()->current() }}?type=zone&view=load{{ request('search') ? '&search='.request('search') : '' }}{{ request('per_page') ? '&per_page='.request('per_page') : '' }}"
                    class="btn btn-sm {{ request('view') == 'load' ? 'btn-primary' : 'btn-secondary' }}">View Load Prices</a>
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
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                    <label class="form-check-label" for="selectAll"></label>
                                </div>
                                ID
                            </div>
                        </th>
                        <th scope="col">Price ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>
                        <th scope="col">Item ID</th>
                        <th scope="col">Wheel Size</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($priceItems as $index => $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="checkbox{{ $item->id }}">
                                    <label class="form-check-label" for="checkbox{{ $item->id }}"></label>
                                </div>
                                {{ $item->id }}
                            </div>
                        </td>
                        <td>{{ $item->price_id }}</td>
                        <td>{{ $item->product->name ?? 'N/A' }}</td>
                        <td>{{ $item->amount / 100 }}</td>
                        <td>{{ $item->price_itemable_type }}</td>
                        <td>{{ $item->price_itemable_id }}</td>
                        <td>{{ $item->wheel_id }}</td>
                        <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('price.items.show', $item->id) }}" class="btn btn-sm btn-info">
                                    <iconify-icon icon="mdi:eye"></iconify-icon>
                                </a>
                                <a href="{{ route('price.items.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                    <iconify-icon icon="mdi:pencil"></iconify-icon>
                                </a>
                                <form action="{{ route('price.items.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger remove-item-btn" onclick="return confirm('Are you sure you want to delete this price item?')">
                                        <iconify-icon icon="mdi:delete"></iconify-icon>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No price items available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
            <span>
                @if($priceItems->total() > 0)
                Showing {{ $priceItems->firstItem() }} to {{ $priceItems->lastItem() }} of {{ $priceItems->total() }} entries
                @else
                Showing 0 to 0 of 0 entries
                @endif
            </span>

            @if ($priceItems->hasPages())
            <nav aria-label="Price pagination">
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($priceItems->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                            <iconify-icon icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                        </span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="{{ $priceItems->previousPageUrl() }}{{ request('per_page') ? '&per_page='.request('per_page') : '' }}{{ request('search') ? '&search='.urlencode(request('search')) : '' }}{{ request('type') ? '&type='.request('type') : '' }}{{ request('view') ? '&view='.request('view') : '' }}">
                            <iconify-icon icon="material-symbols:arrow-back-ios-rounded"></iconify-icon>
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements with Ellipsis --}}
                    @php
                    $total = $priceItems->lastPage();
                    $current = $priceItems->currentPage();
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
                            @elseif ($page == $priceItems->currentPage())
                            <li class="page-item active">
                                <span class="page-link text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600">{{ $page }}</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $priceItems->url($page) }}{{ request('per_page') ? '&per_page='.request('per_page') : '' }}{{ request('search') ? '&search='.urlencode(request('search')) : '' }}{{ request('type') ? '&type='.request('type') : '' }}{{ request('view') ? '&view='.request('view') : '' }}">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($priceItems->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $priceItems->nextPageUrl() }}{{ request('per_page') ? '&per_page='.request('per_page') : '' }}{{ request('search') ? '&search='.urlencode(request('search')) : '' }}{{ request('type') ? '&type='.request('type') : '' }}{{ request('view') ? '&view='.request('view') : '' }}">
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
        // Select all checkboxes
        $("#selectAll").on('click', function() {
            $('input[name="checkbox"]').prop('checked', $(this).prop('checked'));
        });

    });
</script>
@endpush