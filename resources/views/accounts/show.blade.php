@extends('layout.layout')

@php
$title = 'Account Details';
$subTitle = 'Account Details';
@endphp

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrap">
                    <div class="page-button">
                        <a href="{{ route('accounts.index') }}" class="btn btn-secondary me-2">
                            <i class="ri-arrow-left-line me-2"></i>
                            Back to List
                        </a>
                        <a href="{{ route('accounts.edit', $account) }}" class="btn btn-primary">
                            <i class="ri-pencil-line me-2"></i>
                            Edit Account
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Account Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">ID</div>
                            <div class="col-md-8">
                                <span class="copy-text" data-clipboard-text="{{ $account->id }}">
                                    {{ $account->id }}
                                    <i class="ri-file-copy-line text-primary cursor-pointer ms-2"></i>
                                </span>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Code</div>
                            <div class="col-md-8">{{ optional($account->latest)->code ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Customer</div>
                            <div class="col-md-8">{{ optional($account->user)->name ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Status</div>
                            <div class="col-md-8">
                                @php
                                    $status = optional($account->latest)->status;
                                    $statusClass = 'badge bg-info';
                                    
                                    if ($status == 'Approve') {
                                        $statusClass = 'badge bg-success';
                                    } elseif ($status == 'Pending') {
                                        $statusClass = 'badge bg-warning';
                                    } elseif ($status == 'Reject') {
                                        $statusClass = 'badge bg-danger';
                                    }
                                @endphp
                                <span class="{{ $statusClass }}">{{ $status ?? 'N/A' }}</span>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Created At</div>
                            <div class="col-md-8">{{ $account->created_at->format('Y-m-d H:i:s') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Credit Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Term</div>
                            <div class="col-md-8">
                                @if(optional(optional($account->latest)->latest)->term > 0)
                                    {{ $account->latest->latest->term }} days
                                @else
                                    Cash
                                @endif
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Credit Limit</div>
                            <div class="col-md-8">
                                @if(optional(optional($account->latest)->latest)->limit > 0)
                                    RM {{ number_format($account->latest->latest->limit, 2) }}
                                @else
                                    Cash
                                @endif
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Remarks</div>
                            <div class="col-md-8">{{ optional($account->latest)->remark ?? 'N/A' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Account History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Term</th>
                                        <th scope="col">Limit</th>
                                        <th scope="col">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($account->account_details ?? [] as $detail)
                                        <tr>
                                            <td>{{ $detail->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td>
                                                @php
                                                    $detailStatus = $detail->status;
                                                    $detailStatusClass = 'badge bg-info';
                                                    if ($detailStatus == 'Approve') {
                                                        $detailStatusClass = 'badge bg-success';
                                                    } elseif ($detailStatus == 'Pending') {
                                                        $detailStatusClass = 'badge bg-warning';
                                                    } elseif ($detailStatus == 'Reject') {
                                                        $detailStatusClass = 'badge bg-danger';
                                                    }
                                                @endphp
                                                <span class="{{ $detailStatusClass }}">{{ $detailStatus }}</span>
                                            </td>
                                            <td>
                                                @if(optional($detail->latest)->term > 0)
                                                    <span class="badge bg-primary">{{ $detail->latest->term }} days</span>
                                                @else
                                                    <span class="badge bg-secondary">Cash</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(optional($detail->latest)->limit > 0)
                                                    <span class="badge bg-primary">RM {{ number_format($detail->latest->limit, 2) }}</span>
                                                @else
                                                    <span class="badge bg-secondary">Cash</span>
                                                @endif
                                            </td>
                                            <td>{{ $detail->remark ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No history available</td>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const copyElements = document.querySelectorAll('.copy-text');
        
        copyElements.forEach(function(element) {
            element.addEventListener('click', function() {
                const text = this.getAttribute('data-clipboard-text');
                navigator.clipboard.writeText(text);
                
                // Create temporary element
                const tooltip = document.createElement('div');
                tooltip.textContent = 'Account ID copied!';
                tooltip.style.position = 'absolute';
                tooltip.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
                tooltip.style.color = 'white';
                tooltip.style.padding = '5px 10px';
                tooltip.style.borderRadius = '4px';
                tooltip.style.fontSize = '12px';
                tooltip.style.zIndex = '999';
                
                // Position near the clicked element
                const rect = this.getBoundingClientRect();
                tooltip.style.top = `${rect.top - 30}px`;
                tooltip.style.left = `${rect.left}px`;
                
                document.body.appendChild(tooltip);
                
                // Remove after 1.5 seconds
                setTimeout(() => {
                    document.body.removeChild(tooltip);
                }, 1500);
            });
        });
    });
</script>
@endpush
@endsection