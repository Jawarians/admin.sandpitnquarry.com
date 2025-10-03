@extends('layout.layout')

@section('title', 'Payment Details')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrap">
                    <div class="page-title">
                        <h1>Payment Details</h1>
                    </div>
                    <div class="page-button">
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary me-2">
                            <i class="ri-arrow-left-line me-2"></i>
                            Back to List
                        </a>
                        <a href="{{ route('payments.edit', $payment) }}" class="btn btn-primary">
                            <i class="ri-pencil-line me-2"></i>
                            Edit Payment
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Payment Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">ID</div>
                            <div class="col-md-8">
                                <span class="copy-text" data-clipboard-text="{{ $payment->id }}">
                                    {{ $payment->id }}
                                    <i class="ri-file-copy-line text-primary cursor-pointer ms-2"></i>
                                </span>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Reference Number</div>
                            <div class="col-md-8">{{ $payment->reference_number }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Paid At</div>
                            <div class="col-md-8">{{ $payment->paid_at->format('Y-m-d H:i:s') }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Status</div>
                            <div class="col-md-8">
                                @php
                                    $status = optional($payment->latest)->status;
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
                            <div class="col-md-8">{{ $payment->created_at->format('Y-m-d H:i:s') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Additional Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Created By</div>
                            <div class="col-md-8">{{ optional($payment->creator)->name ?? 'N/A' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Remark</div>
                            <div class="col-md-8">{{ $payment->remark }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Payment History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($payment->payment_details ?? [] as $detail)
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
                                            <td>{{ optional($detail->creator)->name ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No history available</td>
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
                tooltip.textContent = 'Payment ID copied!';
                tooltip.style.position = 'absolute';
                tooltip.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
                tooltip.style.color = 'white';
                tooltip.style.padding = '5px 10px';
                tooltip.style.borderRadius = '4px';
                tooltip.style.fontSize = '12px';
                tooltip.style.zIndex = '999';
                
                // Position tooltip near the element
                const rect = this.getBoundingClientRect();
                tooltip.style.top = rect.top - 30 + 'px';
                tooltip.style.left = rect.left + (rect.width / 2) - 60 + 'px';
                
                document.body.appendChild(tooltip);
                
                // Remove after 2 seconds
                setTimeout(() => {
                    tooltip.remove();
                }, 2000);
            });
        });
    });
</script>
@endpush
@endsection