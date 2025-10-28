@extends('layout.layout')
@php
    $title='Update Withdrawal';
    $subTitle = 'Withdrawal #' . $withdrawal->id;
@endphp

@section('content')


<div class="row g-24">
    <div class="col-12">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap gap-3">
                <h5 class="mb-0">Withdrawal Details</h5>
                <div class="d-flex gap-2">
                    <form method="POST" action="{{ route('withdrawals.update', $withdrawal->id) }}">
                        @csrf
                        <input type="hidden" name="action" value="approve">
                        <button type="submit" class="btn btn-success btn-sm radius-8 text-white" onclick="return confirm('Are you sure you want to approve this withdrawal?')">
                            <iconify-icon icon="material-symbols:check-circle" class="me-1"></iconify-icon>
                            Approve
                        </button>
                    </form>
                    <form method="POST" action="{{ route('withdrawals.update', $withdrawal->id) }}">
                        @csrf
                        <input type="hidden" name="action" value="verify">
                        <button type="submit" class="btn btn-primary btn-sm radius-8 text-white" onclick="return confirm('Are you sure you want to verify this withdrawal?')">
                            <iconify-icon icon="material-symbols:verified" class="me-1"></iconify-icon>
                            Verify
                        </button>
                    </form>
                    <form method="POST" action="{{ route('withdrawals.update', $withdrawal->id) }}">
                        @csrf
                        <input type="hidden" name="action" value="reject">
                        <button type="submit" class="btn btn-danger btn-sm radius-8 text-white" onclick="return confirm('Are you sure you want to reject this withdrawal?')">
                            <iconify-icon icon="material-symbols:cancel" class="me-1"></iconify-icon>
                            Reject
                        </button>
                    </form>
                    <a href="{{ route('withdrawals.index') }}" class="btn btn-secondary btn-sm radius-8 text-white">
                        <iconify-icon icon="material-symbols:arrow-back" class="me-1"></iconify-icon>
                        Back to List
                    </a>
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
                <div class="row g-24">
                    <!-- Withdrawal Info -->
                    <div class="col-lg-6 col-md-6">
                        <div class="card bg-neutral-100 radius-12 mb-4">
                            <div class="card-header bg-neutral-100 border-bottom-0 pt-24 px-24 pb-0">
                                <h6 class="mb-0 fw-semibold">Withdrawal Information</h6>
                            </div>
                            <div class="card-body p-24">
                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">ID:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $withdrawal->id }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Customer:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $withdrawal->user->name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Amount:</span>
                                        <span class="text-sm fw-medium text-secondary-light">RM {{ number_format($withdrawal->amounts, 2) }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">SQ Tokens:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $withdrawal->coins }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Current Status:</span>
                                        <span class="text-sm fw-medium">
                                            @if($withdrawal->latest)
                                                @php
                                                    $status = $withdrawal->latest->status;
                                                    $statusClass = '';
                                                    $textClass = '';
                                                    $borderClass = '';
                                                    if ($status == 'Approved') {
                                                        $statusClass = 'bg-success-focus';
                                                        $textClass = 'text-success-600';
                                                        $borderClass = 'border-success-main';
                                                    } elseif ($status == 'Pending') {
                                                        $statusClass = 'bg-warning-focus';
                                                        $textClass = 'text-warning-600';
                                                        $borderClass = 'border-warning-main';
                                                    } elseif ($status == 'Verified') {
                                                        $statusClass = 'bg-info-focus';
                                                        $textClass = 'text-info-600';
                                                        $borderClass = 'border-info-main';
                                                    } else {
                                                        $statusClass = 'bg-danger-focus';
                                                        $textClass = 'text-danger-600';
                                                        $borderClass = 'border-danger-main';
                                                    }
                                                @endphp
                                                <span class="{{ $statusClass }} {{ $textClass }} border {{ $borderClass }} px-24 py-4 radius-4 fw-medium text-sm">{{ $status }}</span>
                                            @else
                                                N/A
                                            @endif
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Created At:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $withdrawal->created_at->format('Y-m-d H:i:s') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bank Info -->
                    <div class="col-lg-6 col-md-6">
                        <div class="card bg-neutral-100 radius-12 mb-4">
                            <div class="card-header bg-neutral-100 border-bottom-0 pt-24 px-24 pb-0">
                                <h6 class="mb-0 fw-semibold">Bank Account Details</h6>
                            </div>
                            <div class="card-body p-24">
                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Account Holder:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $withdrawal->bank->name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Account Number:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $withdrawal->bank->number ?? 'N/A' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Bank:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $withdrawal->bank->bank ?? 'N/A' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Bank Status:</span>
                                        <span class="text-sm fw-medium">
                                            @if($withdrawal->bank)
                                                @php
                                                    $status = $withdrawal->bank->status;
                                                    $statusClass = '';
                                                    $textClass = '';
                                                    $borderClass = '';
                                                    if ($status == 'Approved') {
                                                        $statusClass = 'bg-success-focus';
                                                        $textClass = 'text-success-600';
                                                        $borderClass = 'border-success-main';
                                                    } elseif ($status == 'Pending') {
                                                        $statusClass = 'bg-warning-focus';
                                                        $textClass = 'text-warning-600';
                                                        $borderClass = 'border-warning-main';
                                                    } else {
                                                        $statusClass = 'bg-danger-focus';
                                                        $textClass = 'text-danger-600';
                                                        $borderClass = 'border-danger-main';
                                                    }
                                                @endphp
                                                <span class="{{ $statusClass }} {{ $textClass }} border {{ $borderClass }} px-24 py-4 radius-4 fw-medium text-sm">{{ $status }}</span>
                                            @else
                                                N/A
                                            @endif
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Bank Statement:</span>
                                        <span class="text-sm fw-medium">
                                            @if($withdrawal->bank && isset($withdrawal->bank->document))
                                                <a href="{{ route('withdrawals.bank-statement', $withdrawal->id) }}" class="btn btn-sm btn-info-main text-white" target="_blank">
                                                    <iconify-icon icon="ri:bank-line" class="me-1"></iconify-icon> View Statement
                                                </a>
                                            @else
                                                <span class="text-muted">No statement available</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Status History -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card bg-neutral-100 radius-12">
                            <div class="card-header bg-neutral-100 border-bottom-0 pt-24 px-24 pb-0">
                                <h6 class="mb-0 fw-semibold">Status History</h6>
                            </div>
                            <div class="card-body p-24">
                                <div class="table-responsive">
                                    <table class="table bordered-table sm-table">
                                        <thead>
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
                                                        @php
                                                            $status = $detail->status;
                                                            $statusClass = '';
                                                            $textClass = '';
                                                            $borderClass = '';
                                                            if ($status == 'Approved') {
                                                                $statusClass = 'bg-success-focus';
                                                                $textClass = 'text-success-600';
                                                                $borderClass = 'border-success-main';
                                                            } elseif ($status == 'Pending') {
                                                                $statusClass = 'bg-warning-focus';
                                                                $textClass = 'text-warning-600';
                                                                $borderClass = 'border-warning-main';
                                                            } elseif ($status == 'Verified') {
                                                                $statusClass = 'bg-info-focus';
                                                                $textClass = 'text-info-600';
                                                                $borderClass = 'border-info-main';
                                                            } else {
                                                                $statusClass = 'bg-danger-focus';
                                                                $textClass = 'text-danger-600';
                                                                $borderClass = 'border-danger-main';
                                                            }
                                                        @endphp
                                                        <span class="{{ $statusClass }} {{ $textClass }} border {{ $borderClass }} px-24 py-4 radius-4 fw-medium text-sm">{{ $status }}</span>
                                                    </td>
                                                    <td>{{ $detail->creator->name ?? 'N/A' }}</td>
                                                    <td>{{ $detail->created_at->format('Y-m-d H:i:s') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No history found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection