@extends('layout.layout')
@php
    $title='Driver Details';
    $subTitle = 'Driver Details';
@endphp

@section('content')
<div class="row g-24">
    <div class="col-12">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap gap-3">
                <h5 class="mb-0">Driver Information</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('drivers.edit', $driver) }}" class="btn btn-success btn-sm radius-8">
                        <iconify-icon icon="lucide:edit" class="me-1"></iconify-icon>
                        Edit
                    </a>
                    <a href="{{ route('drivers.index') }}" class="btn btn-secondary btn-sm radius-8">
                        <iconify-icon icon="material-symbols:arrow-back" class="me-1"></iconify-icon>
                        Back to List
                    </a>
                </div>
            </div>
            <div class="card-body p-24">
                <div class="row g-24">
                    <!-- Driver Profile Section -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card bg-neutral-100 radius-12 mb-4">
                            <div class="card-body p-24 text-center">
                                <div class="mb-16">
                                    @if(optional($driver->user)->profile_photo_path)
                                        <img src="{{ asset('storage/' . $driver->user->profile_photo_path) }}" alt="{{ $driver->user->name }}" class="w-80-px h-80-px rounded-circle object-cover mb-3">
                                    @else
                                        <img src="{{ asset('assets/images/user.png') }}" alt="{{ optional($driver->user)->name ?? 'N/A' }}" class="w-80-px h-80-px rounded-circle object-cover mb-3">
                                    @endif
                                    <h5 class="text-secondary-light fw-medium mb-1">{{ optional($driver->user)->name ?? 'N/A' }}</h5>
                                    
                                    @php
                                        $status = optional($driver->latest)->status;
                                        $statusClass = '';
                                        $textClass = '';
                                        $borderClass = '';
                                        
                                        if ($status == 'Active') {
                                            $statusClass = 'bg-success-focus';
                                            $textClass = 'text-success-600';
                                            $borderClass = 'border-success-main';
                                        } elseif ($status == 'Inactive') {
                                            $statusClass = 'bg-warning-focus';
                                            $textClass = 'text-warning-600';
                                            $borderClass = 'border-warning-main';
                                        } elseif ($status == 'Suspended') {
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

                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">ID:</span>
                                        <span class="text-sm fw-medium text-secondary-light copy-text" data-clipboard-text="{{ $driver->id }}">
                                            {{ $driver->id }}
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Phone:</span>
                                        <span class="text-sm fw-medium text-secondary-light copy-text" data-clipboard-text="{{ optional($driver->user)->phone ?? 'N/A' }}">
                                            {{ optional($driver->user)->phone ?? 'N/A' }}
                                        </span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Email:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ optional($driver->user)->email ?? 'N/A' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-sm text-neutral-600">Created:</span>
                                        <span class="text-sm fw-medium text-secondary-light">{{ $driver->created_at ? $driver->created_at->format('d M Y') : 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Transporter & Truck Information -->
                    <div class="col-lg-8 col-md-6">
                        <!-- Transporter Info -->
                        <div class="card bg-neutral-100 radius-12 mb-4">
                            <div class="card-header bg-neutral-100 border-bottom-0 pt-24 px-24 pb-0">
                                <h6 class="mb-0 fw-semibold">Transporter Information</h6>
                            </div>
                            <div class="card-body p-24">
                                @if($driver->transporter)
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <span class="text-sm text-neutral-600">Transporter Name</span>
                                                <span class="text-md fw-medium text-secondary-light">{{ $driver->transporter->name }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <span class="text-sm text-neutral-600">Contact</span>
                                                <span class="text-md fw-medium text-secondary-light">
                                                    {{ optional($driver->transporter->user)->phone ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-flex flex-column">
                                                <span class="text-sm text-neutral-600">Address</span>
                                                <span class="text-md fw-medium text-secondary-light">
                                                    {{ optional($driver->transporter->address)->address ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-info mb-0">
                                        <p class="mb-0">No transporter associated with this driver.</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Current Truck Info -->
                        <div class="card bg-neutral-100 radius-12">
                            <div class="card-header bg-neutral-100 border-bottom-0 pt-24 px-24 pb-0">
                                <h6 class="mb-0 fw-semibold">Current Truck Information</h6>
                            </div>
                            <div class="card-body p-24">
                                @if(optional(optional($driver->current)->truck))
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <span class="text-sm text-neutral-600">Registration Number</span>
                                                <span class="text-md fw-medium text-secondary-light copy-text" data-clipboard-text="{{ $driver->current->truck->registration_plate_number }}">
                                                    {{ $driver->current->truck->registration_plate_number }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <span class="text-sm text-neutral-600">Truck Type</span>
                                                <span class="text-md fw-medium text-secondary-light">{{ optional($driver->current->truck->type)->name ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <span class="text-sm text-neutral-600">Make</span>
                                                <span class="text-md fw-medium text-secondary-light">{{ $driver->current->truck->make ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column">
                                                <span class="text-sm text-neutral-600">Model</span>
                                                <span class="text-md fw-medium text-secondary-light">{{ $driver->current->truck->model ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-info mb-0">
                                        <p class="mb-0">No truck currently assigned to this driver.</p>
                                    </div>
                                @endif
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
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Notes</th>
                                                <th>Updated By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($driver->statuses->sortByDesc('created_at') as $status)
                                                <tr>
                                                    <td>
                                                        @php
                                                            $statusClass = '';
                                                            $textClass = '';
                                                            $borderClass = '';
                                                            
                                                            if ($status->status == 'Active') {
                                                                $statusClass = 'bg-success-focus';
                                                                $textClass = 'text-success-600';
                                                                $borderClass = 'border-success-main';
                                                            } elseif ($status->status == 'Inactive') {
                                                                $statusClass = 'bg-warning-focus';
                                                                $textClass = 'text-warning-600';
                                                                $borderClass = 'border-warning-main';
                                                            } elseif ($status->status == 'Suspended') {
                                                                $statusClass = 'bg-danger-focus';
                                                                $textClass = 'text-danger-600';
                                                                $borderClass = 'border-danger-main';
                                                            } else {
                                                                $statusClass = 'bg-info-focus';
                                                                $textClass = 'text-info-600';
                                                                $borderClass = 'border-info-main';
                                                            }
                                                        @endphp
                                                        <span class="{{ $statusClass }} {{ $textClass }} border {{ $borderClass }} px-24 py-4 radius-4 fw-medium text-sm">{{ $status->status }}</span>
                                                    </td>
                                                    <td>{{ $status->created_at->format('d M Y, h:i A') }}</td>
                                                    <td>{{ $status->notes ?? 'No notes' }}</td>
                                                    <td>{{ optional($status->admin)->name ?? 'System' }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">No status records found</td>
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
                
                // Determine what kind of information was copied
                if (text.length === 10 && /^\d+$/.test(text)) {
                    toastMessage = 'Phone number copied!';
                } else if (text.match(/^[A-Z0-9]{3,7}$/)) {
                    toastMessage = 'Truck plate number copied!';
                } else {
                    toastMessage = 'Driver ID copied!';
                }
                
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