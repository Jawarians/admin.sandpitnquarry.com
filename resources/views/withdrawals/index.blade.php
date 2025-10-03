@extends('layout.layout')
@php
    $title='Withdrawals';
    $subTitle = 'Withdrawals List';
    $script ='<script>
                document.querySelectorAll(".copy-id").forEach(el => {
                    el.addEventListener("click", function() {
                        const idText = this.getAttribute("data-id");
                        navigator.clipboard.writeText(idText).then(() => {
                            const originalText = this.innerHTML;
                            this.innerHTML = "ID copied";
                            
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
                <input type="hidden" name="withdrawal_status" value="{{ request('withdrawal_status') }}">
                <input type="hidden" name="bank_status" value="{{ request('bank_status') }}">
            </form>
            <form class="navbar-search" method="GET">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                <input type="hidden" name="withdrawal_status" value="{{ request('withdrawal_status') }}">
                <input type="hidden" name="bank_status" value="{{ request('bank_status') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            </form>
            <form method="GET">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="withdrawal_status" onchange="this.form.submit()">
                    <option value="Status" {{ request('withdrawal_status') == 'Status' ? 'selected' : '' }}>Withdrawal Status</option>
                    @foreach($withdrawalStatusOptions as $value => $label)
                        <option value="{{ $value }}" {{ request('withdrawal_status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="bank_status" value="{{ request('bank_status') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            </form>
            <form method="GET">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="bank_status" onchange="this.form.submit()">
                    <option value="Status" {{ request('bank_status') == 'Status' ? 'selected' : '' }}>Bank Status</option>
                    @foreach($bankStatusOptions as $value => $label)
                        <option value="{{ $value }}" {{ request('bank_status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="withdrawal_status" value="{{ request('withdrawal_status') }}">
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
                        <th scope="col">SQ Token</th>
                        <th scope="col">Withdrawal Status</th>
                        <th scope="col">Account Details</th>
                        <th scope="col">Bank Status</th>
                        <th scope="col">Date</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($withdrawals as $index => $withdrawal)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $withdrawal->id }}">
                                </div>
                                {{ str_pad($withdrawals->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </td>
                        <td>
                            <span class="copy-id cursor-pointer" data-id="{{ $withdrawal->id }}" title="Click to copy">
                                {{ $withdrawal->id }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/user.png') }}" alt="{{ $withdrawal->user->name ?? 'N/A' }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ $withdrawal->user->name ?? 'N/A' }}</span>
                                    <br>
                                    <small>{{ $withdrawal->user->email ?? 'N/A' }}</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="text-md mb-0 fw-normal text-secondary-light">RM {{ number_format($withdrawal->amounts, 2) }}</span></td>
                        <td>{{ $withdrawal->coins }}</td>
                        <td>
                            @if($withdrawal->latest)
                                <span class="badge {{ $withdrawal->latest->status == 'Approved' ? 'bg-success-main' : 
                                     ($withdrawal->latest->status == 'Pending' ? 'bg-warning-main' : 
                                     ($withdrawal->latest->status == 'Verified' ? 'bg-info-main' : 'bg-danger-main')) }} py-4 px-10 text-sm fw-medium text-white">
                                    {{ $withdrawal->latest->status }}
                                </span>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $withdrawal->bank->name ?? 'N/A' }}</span><br>
                            <small>{{ $withdrawal->bank->number ?? 'N/A' }} ({{ $withdrawal->bank->bank ?? 'N/A' }})</small>
                        </td>
                        <td>
                            @if($withdrawal->bank)
                                <span class="badge {{ $withdrawal->bank->status == 'Approved' ? 'bg-success-main' : 
                                     ($withdrawal->bank->status == 'Pending' ? 'bg-warning-main' : 'bg-danger-main') }} py-4 px-10 text-sm fw-medium text-white">
                                    {{ $withdrawal->bank->status }}
                                </span>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $withdrawal->created_at ? $withdrawal->created_at->format('d M Y') : 'N/A' }}</td>
                        <td class="text-center">
                            <div class="dropdown action-dropdown">
                                <button class="btn btn-sm p-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <iconify-icon icon="mdi:dots-vertical" class="text-2xl text-neutral-400"></iconify-icon>
                                </button>
                                <ul class="dropdown-menu p-0 radius-6">
                                    <li><a class="dropdown-item py-8 px-16 text-sm text-secondary-light" href="{{ route('withdrawals.edit', $withdrawal->id) }}">Edit</a></li>
                                    @if($withdrawal->bank && isset($withdrawal->bank->document))
                                        <li><a class="dropdown-item py-8 px-16 text-sm text-secondary-light" href="{{ route('withdrawals.bank-statement', $withdrawal->id) }}" target="_blank">Bank Statement</a></li>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">No withdrawals found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
    </div>
    
    <div class="card-footer border-top p-24 bg-base">
        <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap">
            <div class="text-sm mb-0 text-secondary-light">
                Showing {{ $withdrawals->firstItem() ?? 0 }} to {{ $withdrawals->lastItem() ?? 0 }} of {{ $withdrawals->total() }} entries
            </div>
            <div>
                {{ $withdrawals->appends([
                    'search' => request('search'),
                    'withdrawal_status' => request('withdrawal_status'),
                    'bank_status' => request('bank_status'),
                    'per_page' => request('per_page', 10)
                ])->links() }}
            </div>
        </div>
    </div>
</div>

@endsection