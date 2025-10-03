@extends('layout.layout')
@php
    $title='View Customer Bank Account';
    $subTitle = 'Customer Bank Account Details';
@endphp

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card radius-12 p-0">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap">
                <h4 class="mb-0 text-lg fw-semibold">Customer Bank Account Details</h4>
                <div class="d-flex gap-2">
                    <a href="{{ route('customer-accounts.edit', $customerAccount) }}" class="btn btn-sm btn-success px-12 py-8 radius-8">
                        <iconify-icon icon="lucide:edit" class="me-1"></iconify-icon>
                        Edit
                    </a>
                    <a href="{{ route('customer-accounts.index') }}" class="btn btn-sm btn-secondary px-12 py-8 radius-8">
                        <iconify-icon icon="mdi:arrow-left" class="me-1"></iconify-icon>
                        Back
                    </a>
                </div>
            </div>
            <div class="card-body p-24">
                <div class="table-responsive">
                    <table class="table bordered-table sm-table mb-0">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">ID</th>
                                <td>
                                    <span class="copy-text" data-clipboard-text="{{ $customerAccount->id }}">
                                        {{ $customerAccount->id }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Account Holder Name</th>
                                <td>{{ $customerAccount->name }}</td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td>{{ $customerAccount->number }}</td>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td>{{ $customerAccount->bank }}</td>
                            </tr>
                            <tr>
                                <th>Customer</th>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if(optional($customerAccount->customer)->profile_photo_path)
                                            <img src="{{ asset('storage/' . $customerAccount->customer->profile_photo_path) }}" alt="{{ $customerAccount->customer->name }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        @else
                                            <img src="{{ asset('assets/images/user.png') }}" alt="{{ optional($customerAccount->customer)->name ?? 'N/A' }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        @endif
                                        <div class="flex-grow-1">
                                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ optional($customerAccount->customer)->name ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Bank Statement</th>
                                <td>
                                    @if($customerAccount->document)
                                        <a href="{{ route('customer-accounts.document', $customerAccount) }}" target="_blank" class="btn btn-sm btn-primary px-12 py-8 radius-8">
                                            <iconify-icon icon="mdi:file-document-outline" class="me-1"></iconify-icon>
                                            View Document
                                        </a>
                                    @else
                                        <span class="text-muted">No document available</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @php
                                        $status = $customerAccount->status;
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
                                    <span class="{{ $statusClass }} {{ $textClass }} border {{ $borderClass }} px-24 py-4 radius-4 fw-medium text-sm">{{ $status }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Created By</th>
                                <td>{{ optional($customerAccount->creator)->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $customerAccount->created_at ? (is_string($customerAccount->created_at) ? $customerAccount->created_at : $customerAccount->created_at->format('d M Y, h:i A')) : 'N/A' }}</td>
                            </tr>
                            @if($customerAccount->approver)
                                <tr>
                                    <th>Approved By</th>
                                    <td>{{ $customerAccount->approver->name }}</td>
                                </tr>
                            @endif
                            @if($customerAccount->approved_at)
                                <tr>
                                    <th>Approved At</th>
                                    <td>{{ is_string($customerAccount->approved_at) ? $customerAccount->approved_at : $customerAccount->approved_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>Last Updated</th>
                                <td>{{ $customerAccount->updated_at ? (is_string($customerAccount->updated_at) ? $customerAccount->updated_at : $customerAccount->updated_at->format('d M Y, h:i A')) : 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <form action="{{ route('customer-accounts.destroy', $customerAccount) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer account?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger px-12 py-8 radius-8">
                            <iconify-icon icon="fluent:delete-24-regular" class="me-1"></iconify-icon>
                            Delete Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.copy-text').forEach(function(element) {
            element.addEventListener('click', function() {
                var text = this.getAttribute('data-clipboard-text');
                navigator.clipboard.writeText(text);
                
                // Show notification
                var notification = document.createElement('div');
                notification.className = 'notification-toast';
                notification.textContent = 'Customer Account ID copied';
                document.body.appendChild(notification);
                
                setTimeout(function() {
                    notification.style.opacity = '0';
                    setTimeout(function() {
                        document.body.removeChild(notification);
                    }, 300);
                }, 1500);
            });
        });
    });
</script>

<style>
    .notification-toast {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 4px;
        z-index: 9999;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: opacity 0.3s;
    }
</style>

@endsection