@extends('layout.layout')
@php
    $title='Update Withdrawal';
    $subTitle = 'Withdrawal #' . $withdrawal->id;
@endphp

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <h5 class="mb-0">Withdrawal Details</h5>
                <div class="d-flex">
                    <form method="POST" action="{{ route('withdrawals.update', $withdrawal->id) }}" class="me-2">
                        @csrf
                        <input type="hidden" name="action" value="approve">
                        <button type="submit" class="btn btn-success-main text-white" 
                                onclick="return confirm('Are you sure you want to approve this withdrawal?')">
                            Approve
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('withdrawals.update', $withdrawal->id) }}" class="me-2">
                        @csrf
                        <input type="hidden" name="action" value="verify">
                        <button type="submit" class="btn btn-primary-main text-white"
                                onclick="return confirm('Are you sure you want to verify this withdrawal?')">
                            Verify
                        </button>
                    </form>
                    
                    <form method="POST" action="{{ route('withdrawals.update', $withdrawal->id) }}">
                        @csrf
                        <input type="hidden" name="action" value="reject">
                        <button type="submit" class="btn btn-danger-main text-white"
                                onclick="return confirm('Are you sure you want to reject this withdrawal?')">
                            Reject
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="card-body p-24">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card h-100 p-0 radius-12">
                            <div class="card-header bg-base">
                                <h6 class="mb-0">Withdrawal Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th class="border-0 ps-0" width="40%">ID</th>
                                        <td class="border-0">{{ $withdrawal->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">Customer</th>
                                        <td class="border-0">{{ $withdrawal->user->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">Amount</th>
                                        <td class="border-0">RM {{ number_format($withdrawal->amounts, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">SQ Tokens</th>
                                        <td class="border-0">{{ $withdrawal->coins }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">Current Status</th>
                                        <td class="border-0">
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
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">Created At</th>
                                        <td class="border-0">{{ $withdrawal->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100 p-0 radius-12">
                            <div class="card-header bg-base">
                                <h6 class="mb-0">Bank Account Details</h6>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th class="border-0 ps-0" width="40%">Account Holder</th>
                                        <td class="border-0">{{ $withdrawal->bank->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">Account Number</th>
                                        <td class="border-0">{{ $withdrawal->bank->number ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">Bank</th>
                                        <td class="border-0">{{ $withdrawal->bank->bank ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">Bank Status</th>
                                        <td class="border-0">
                                            @if($withdrawal->bank)
                                                <span class="badge {{ $withdrawal->bank->status == 'Approved' ? 'bg-success-main' : 
                                                     ($withdrawal->bank->status == 'Pending' ? 'bg-warning-main' : 'bg-danger-main') }} py-4 px-10 text-sm fw-medium text-white">
                                                    {{ $withdrawal->bank->status }}
                                                </span>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="border-0 ps-0">Bank Statement</th>
                                        <td class="border-0">
                                            @if($withdrawal->bank && isset($withdrawal->bank->document))
                                                <a href="{{ route('withdrawals.bank-statement', $withdrawal->id) }}" 
                                                   class="btn btn-sm btn-info-main text-white" target="_blank">
                                                   <i class="ri-bank-line me-1"></i> View Statement
                                                </a>
                                            @else
                                                <span class="text-muted">No statement available</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card h-100 p-0 radius-12 mt-4">
                    <div class="card-header bg-base">
                        <h6 class="mb-0">Status History</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-base text-secondary-light text-uppercase text-13">
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($withdrawal->withdrawal_details as $detail)
                                    <tr>
                                        <td>{{ $detail->id }}</td>
                                        <td>
                                            <span class="badge {{ $detail->status == 'Approved' ? 'bg-success-main' : 
                                                 ($detail->status == 'Pending' ? 'bg-warning-main' : 
                                                 ($detail->status == 'Verified' ? 'bg-info-main' : 'bg-danger-main')) }} py-4 px-10 text-sm fw-medium text-white">
                                                {{ $detail->status }}
                                            </span>
                                        </td>
                                        <td>{{ $detail->creator->name ?? 'N/A' }}</td>
                                        <td>{{ $detail->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">No history found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-start mt-4">
                    <a href="{{ route('withdrawals.index') }}" class="btn btn-secondary-light text-white">
                        <i class="ri-arrow-left-line me-1"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection