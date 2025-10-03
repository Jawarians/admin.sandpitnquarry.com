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
            </form>
            <form class="navbar-search" method="GET">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                <input type="hidden" name="type" value="{{ request('type') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
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
            </form>
        </div>
        <a href="{{ route('coins.create') }}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New Coin
        </a>
    </div>
    <div class="card-body p-24">
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
        
        <div class="mt-4">
            {{ $coins->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection