@extends('layout.layout')
@php
$title='Reloads';
$subTitle = 'Reloads List';
$script ='<script>
    document.querySelectorAll(".copy-id").forEach(el => {
        el.addEventListener("click", function() {
            const idText = this.getAttribute("data-id");
            navigator.clipboard.writeText(idText).then(() => {
                const originalText = this.innerHTML;
                this.innerHTML = "Order ID copied";

                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 1500);
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
                <input type="hidden" name="status" value="{{ request('status') }}">
            </form>
            <form class="navbar-search" method="GET">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                <input type="hidden" name="status" value="{{ request('status') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            </form>
            <form method="GET">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="status" onchange="this.form.submit()">
                    <option value="Status" {{ request('status') == 'Status' ? 'selected' : '' }}>Status</option>
                    <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Unpaid" {{ request('status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                </select>
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
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
                                S.L
                            </div>
                        </th>
                        <th scope="col">ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Coins</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reloads as $index => $reload)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $reload->id }}">
                                </div>
                                {{ str_pad($reloads->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </td>
                        <td>
                            <span class="copy-id cursor-pointer" data-id="{{ $reload->id }}" title="Click to copy">
                                {{ $reload->id }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/user.png') }}" alt="{{ $reload->name }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ $reload->name ?? 'N/A' }}</span>
                                    <br>
                                    <small>{{ $reload->email }}</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="text-md mb-0 fw-normal text-secondary-light">RM {{ number_format($reload->amount / 100, 2) }}</span></td>
                        <td><span class="text-md mb-0 fw-normal text-secondary-light">RM {{ number_format($reload->paid_amount / 100, 2) }}</span></td>
                        <td>{{ number_format($reload->coins) }} <small>+{{ number_format($reload->free_coins) }} free</small></td>
                        <td>{{ $reload->created_at ? $reload->created_at->format('d M Y') : 'N/A' }}</td>
                        <td class="text-center">
                            @if($reload->paid)
                            <span class="badge bg-success-main py-4 px-10 text-sm fw-medium text-white">Paid</span>
                            @else
                            <span class="badge bg-danger-main py-4 px-10 text-sm fw-medium text-white">Unpaid</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="dropdown action-dropdown">
                                <button class="btn btn-sm p-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <iconify-icon icon="mdi:dots-vertical" class="text-2xl text-neutral-400"></iconify-icon>
                                </button>
                                <ul class="dropdown-menu p-0 radius-6">
                                    <li><a class="dropdown-item py-8 px-16 text-sm text-secondary-light" href="{{ route('reloads.show', $reload->id) }}">View</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No reloads found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer border-top p-24 bg-base">
        <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap">
            <div class="text-sm mb-0 text-secondary-light">
                Showing {{ $reloads->firstItem() ?? 0 }} to {{ $reloads->lastItem() ?? 0 }} of {{ $reloads->total() }} entries
            </div>
            <div>
                <nav aria-label="Reloads pagination">
                    <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center mb-0">
                        {{-- Previous Page Link --}}
                        @if ($reloads->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                            </span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                href="{{ $reloads->previousPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&status={{ urlencode(request('status')) }}">
                                <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                            </a>
                        </li>
                        @endif

                        {{-- Pagination Elements with Ellipsis --}}
                        @php
                        $total = $reloads->lastPage();
                        $current = $reloads->currentPage();
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
                                @elseif ($page == $reloads->currentPage())
                                <li class="page-item active">
                                    <span class="page-link bg-primary-600 text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">{{ $page }}</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                        href="{{ $reloads->url($page) }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&status={{ urlencode(request('status')) }}">{{ $page }}</a>
                                </li>
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($reloads->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                        href="{{ $reloads->nextPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&status={{ urlencode(request('status')) }}">
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
            </div>
        </div>
    </div>
</div>

@endsection