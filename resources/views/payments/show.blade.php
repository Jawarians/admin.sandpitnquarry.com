@extends('layout.layout')
@php
    $title = 'Payment Details';
    $subTitle = 'Payment Details';
@endphp

@section('content')
<div class="row g-24">
    <div class="col-12">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap gap-3">
                <h5 class="mb-0">Payment Information</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('payments.edit', $payment) }}" class="btn btn-success btn-sm radius-8">
                        <iconify-icon icon="lucide:edit" class="me-1"></iconify-icon>
                        Edit
                    </a>
                    <a href="{{ route('payments.index') }}" class="btn btn-secondary btn-sm radius-8">
                        <iconify-icon icon="material-symbols:arrow-back" class="me-1"></iconify-icon>
                        Back to List
                    </a>
                </div>
            </div>
            <div class="card-body p-24">
                <div class="row g-24">
                    <!-- Payment Profile Section -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card bg-neutral-100 radius-12 mb-4">
                            <div class="card-body p-24 text-center">
                                <div class="mb-16">
                                    <h5 class="text-secondary-light fw-medium mb-1">Payment ID</h5>
                                    <span class="text-md fw-medium text-secondary-light copy-text" data-clipboard-text="{{ $payment->id }}">
                                        {{ $payment->id }}
                                    </span>
                                </div>
                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Reference Number:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $payment->reference_number }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Paid At:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $payment->paid_at->format('Y-m-d H:i:s') }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Status:</span>
                                        @php
                                            $status = optional($payment->latest)->status;
                                            $statusClass = '';
                                            $textClass = '';
                                            $borderClass = '';
                                            if ($status == 'Approve') {
                                                $statusClass = 'bg-success-focus';
                                                $textClass = 'text-success-600';
                                                $borderClass = 'border-success-main';
                                            } elseif ($status == 'Pending') {
                                                $statusClass = 'bg-warning-focus';
                                                $textClass = 'text-warning-600';
                                                $borderClass = 'border-warning-main';
                                            } elseif ($status == 'Reject') {
                                                $statusClass = 'bg-danger-focus';
                                                $textClass = 'text-danger-600';
                                                $borderClass = 'border-danger-main';
                                            } else {
                                                $statusClass = 'bg-info-focus';
                                                $textClass = 'text-info-600';
                                                $borderClass = 'border-info-main';
                                            }
                                        @endphp
                                        <span class="{{ $statusClass }} {{ $textClass }} border {{ $borderClass }} px-24 py-4 radius-4 fw-medium text-sm">{{ $status ?? 'N/A' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Created At:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $payment->created_at->format('Y-m-d H:i:s') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Additional Information -->
                    <div class="col-lg-8 col-md-6">
                        <div class="card bg-neutral-100 radius-12 mb-4">
                            <div class="card-header bg-neutral-100 border-bottom-0 pt-24 px-24 pb-0">
                                <h6 class="mb-0 fw-semibold">Additional Information</h6>
                            </div>
                            <div class="card-body p-24">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column">
                                            <span class="text-sm text-neutral-600">Created By</span>
                                            <span class="text-md fw-medium text-secondary-light">{{ optional($payment->creator)->name ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column">
                                            <span class="text-sm text-neutral-600">Remark</span>
                                            <span class="text-md fw-medium text-secondary-light">{{ $payment->remark }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Payment History -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card bg-neutral-100 radius-12">
                            <div class="card-header bg-neutral-100 border-bottom-0 pt-24 px-24 pb-0">
                                <h6 class="mb-0 fw-semibold">Payment History</h6>
                            </div>
                            <div class="card-body p-24">
                                <div class="table-responsive">
                                    <table class="table bordered-table sm-table">
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
                                                            $detailStatusClass = '';
                                                            $detailTextClass = '';
                                                            $detailBorderClass = '';
                                                            if ($detailStatus == 'Approve') {
                                                                $detailStatusClass = 'bg-success-focus';
                                                                $detailTextClass = 'text-success-600';
                                                                $detailBorderClass = 'border-success-main';
                                                            } elseif ($detailStatus == 'Pending') {
                                                                $detailStatusClass = 'bg-warning-focus';
                                                                $detailTextClass = 'text-warning-600';
                                                                $detailBorderClass = 'border-warning-main';
                                                            } elseif ($detailStatus == 'Reject') {
                                                                $detailStatusClass = 'bg-danger-focus';
                                                                $detailTextClass = 'text-danger-600';
                                                                $detailBorderClass = 'border-danger-main';
                                                            } else {
                                                                $detailStatusClass = 'bg-info-focus';
                                                                $detailTextClass = 'text-info-600';
                                                                $detailBorderClass = 'border-info-main';
                                                            }
                                                        @endphp
                                                        <span class="{{ $detailStatusClass }} {{ $detailTextClass }} border {{ $detailBorderClass }} px-24 py-4 radius-4 fw-medium text-sm">{{ $detailStatus }}</span>
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
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Copy to clipboard functionality
        const copyElements = document.querySelectorAll('.copy-text');
        copyElements.forEach(function(element) {
            element.addEventListener('click', function() {
                const text = this.getAttribute('data-clipboard-text');
                navigator.clipboard.writeText(text);
                // Show toast notification
                const toast = document.createElement('div');
                toast.className = 'position-fixed top-0 end-0 p-3';
                toast.style.zIndex = 1070;
                let toastMessage = 'Copied to clipboard!';
                toastMessage = 'Payment ID copied!';
                toast.innerHTML = `
                    <div class="toast show bg-dark text-white" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body d-flex align-items-center">
                            <iconify-icon icon="material-symbols:check-circle" class="text-success me-2" width="20"></iconify-icon>
                            <div>${toastMessage}</div>
                        </div>
                    </div>
                `;
                document.body.appendChild(toast);
                // Remove after 2 seconds
                setTimeout(() => {
                    toast.remove();
                }, 2000);
            });
        });
    });
</script>
@endpush
@endsection