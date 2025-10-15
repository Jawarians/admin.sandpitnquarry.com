@extends('layout.layout')
@php
$title='Coins List';
$subTitle = 'Coins List';
$script ='<script>
    $(document).ready(function() {
        // Copy to clipboard functionality
        $(".copy-text").click(function() {
            var text = $(this).data("clipboard-text");
            navigator.clipboard.writeText(text).then(function() {
                // Show a toast or notification
                toastr.success("Copied to clipboard: " + text);
            });
        });
    });
</script>';
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
                <input type="hidden" name="type" value="{{ request('type') }}">
                <input type="hidden" name="direction" value="{{ request('direction') }}">
                <input type="hidden" name="date_from" value="{{ request('date_from') }}">
                <input type="hidden" name="date_to" value="{{ request('date_to') }}">
            </form>
            <form class="navbar-search" method="GET">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                <input type="hidden" name="type" value="{{ request('type') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                <input type="hidden" name="direction" value="{{ request('direction') }}">
                <input type="hidden" name="date_from" value="{{ request('date_from') }}">
                <input type="hidden" name="date_to" value="{{ request('date_to') }}">
            </form>
            <form method="GET">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="type" onchange="this.form.submit()">
                    <option value="Type" {{ request('type') == 'Type' ? 'selected' : '' }}>All Types</option>
                    @foreach($coinTypes as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                <input type="hidden" name="direction" value="{{ request('direction') }}">
                <input type="hidden" name="date_from" value="{{ request('date_from') }}">
                <input type="hidden" name="date_to" value="{{ request('date_to') }}">
            </form>
        </div>
        <a href="{{ route('coins.create') }}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New Coin
        </a>
    </div>
  <div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-2 align-items-end">
            <div class="col-auto">
                <label class="form-label">Type</label>
                <select name="type" class="form-select">
                    <option>Type</option>
                    @foreach($coinTypes as $ct)
                        <option value="{{ $ct }}" {{ request('type') == $ct ? 'selected' : '' }}>{{ $ct }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-auto">
                <label class="form-label">Direction</label>
                <select name="direction" class="form-select">
                    <option value="all" {{ ($direction ?? 'all') == 'all' ? 'selected' : '' }}>All</option>
                    <option value="in" {{ ($direction ?? '') == 'in' ? 'selected' : '' }}>In (Reload, Order, Tonne_refund, Bonus, Refund)</option>
                    <option value="out" {{ ($direction ?? '') == 'out' ? 'selected' : '' }}>Out (Waiting_charges, Withdrawal, Purchase)</option>
                </select>
            </div>

            <div class="col-auto">
                <label class="form-label">From</label>
                <input type="date" class="form-control" name="date_from" value="{{ request('date_from') }}">
            </div>

            <div class="col-auto">
                <label class="form-label">To</label>
                <input type="date" class="form-control" name="date_to" value="{{ request('date_to') }}">
            </div>

            <div class="col-auto">
                <label class="form-label d-block">&nbsp;</label>
                <button class="btn btn-primary" type="submit">Filter</button>
                <a href="{{ route('coins.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h6 class="mb-3">Coins Audit — In / Out</h6>
        <div id="coinsAuditChart" style="height: 300px;"></div>
    </div>
</div>

<!-- ensure ApexCharts is loaded; if layout already includes it you can remove this -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.0/dist/apexcharts.min.js"></script>
<script>
    (function() {
        const series = {!! json_encode($chartSeries ?? []) !!};
        const categories = {!! json_encode($seriesDates ?? []) !!};
        if (!series || series.length === 0) return;

        const options = {
            chart: { type: 'area', height: 300, stacked: false, zoom: { enabled: false } },
            series: series,
            xaxis: { categories: categories, labels: { rotate: -45 } },
            yaxis: { title: { text: 'Amount' } },
            stroke: { curve: 'smooth' },
            colors: ['#14b8a6', '#ef4444'],
            tooltip: { shared: true, intersect: false },
            legend: { position: 'top' }
        };

        const chart = new ApexCharts(document.querySelector("#coinsAuditChart"), options);
        chart.render();
    })();
</script>
        @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
        @endif

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
                        <th scope="col">Customer</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coins as $coin)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $coin->id }}">
                                </div>
                                <span class="copy-text" data-clipboard-text="{{ $coin->id }}">
                                    {{ $coin->id }}
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if(optional($coin->user)->profile_photo_path)
                                <img src="{{ asset('storage/' . $coin->user->profile_photo_path) }}" alt="{{ $coin->user->name }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                @else
                                <img src="{{ asset('assets/images/user.png') }}" alt="{{ optional($coin->user)->name ?? 'N/A' }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                @endif
                                <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ optional($coin->user)->name ?? 'N/A' }}</span>
                                    <div class="text-sm text-secondary-light">{{ optional($coin->user)->email ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $coin->amount/100 }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ ucfirst($coin->coinable_type) }}</span>
                        </td>
                        <td>
                            <span class="copy-text" data-clipboard-text="{{ $coin->created_at }}">
                                {{ $coin->created_at->format('Y-m-d H:i:s') }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No coins found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
            <span>
                Showing {{ $coins->firstItem() ?? 0 }} to {{ $coins->lastItem() ?? 0 }} of {{ $coins->total() }} entries
            </span>
            @if ($coins->hasPages())
            <nav aria-label="Coins pagination">
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($coins->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="{{ $coins->previousPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&type={{ urlencode(request('type')) }}">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements with Ellipsis --}}
                    @php
                    $total = $coins->lastPage();
                    $current = $coins->currentPage();
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
                            @elseif ($page == $coins->currentPage())
                            <li class="page-item active">
                                <span class="page-link bg-primary-600 text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">{{ $page }}</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $coins->url($page) }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&type={{ urlencode(request('type')) }}">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($coins->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $coins->nextPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&type={{ urlencode(request('type')) }}">
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