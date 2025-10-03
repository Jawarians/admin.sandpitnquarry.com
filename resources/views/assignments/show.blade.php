@extends('layout.layout')
@php
    $title='View Assignment';
    $subTitle = 'View Assignment Details';
@endphp

@section('content')
    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24 d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Assignment Details</h5>
            <div>
                <a href="{{ route('assignments.edit', $assignment) }}" class="btn btn-sm btn-primary">
                    <iconify-icon icon="lucide:edit" class="me-1"></iconify-icon> Edit
                </a>
                <a href="{{ route('assignments.index') }}" class="btn btn-sm btn-secondary ms-2">
                    <iconify-icon icon="heroicons:arrow-left" class="me-1"></iconify-icon> Back
                </a>
            </div>
        </div>
        <div class="card-body p-24">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-semibold mb-3">Assignment Information</h6>
                    <div class="mb-3">
                        <strong>ID:</strong> 
                        <span class="copy-text" data-clipboard-text="{{ $assignment->id }}">
                            {{ $assignment->id }}
                        </span>
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong> 
                        @if($assignment->cancelled_at)
                            <span class="bg-danger-focus text-danger-600 border border-danger-main px-24 py-4 radius-4 fw-medium text-sm">Cancelled</span>
                        @else
                            <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Active</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Created At:</strong> 
                        @if($assignment->created_at instanceof \Carbon\Carbon)
                            {{ $assignment->created_at->format('d M Y H:i') }}
                        @else
                            {{ $assignment->created_at }}
                        @endif
                    </div>
                    @if($assignment->cancelled_at)
                        <div class="mb-3">
                            <strong>Cancelled At:</strong> 
                            @if($assignment->cancelled_at instanceof \Carbon\Carbon)
                                {{ $assignment->cancelled_at->format('d M Y H:i') }}
                            @else
                                {{ $assignment->cancelled_at }}
                            @endif
                        </div>
                    @endif
                </div>
                
                <div class="col-md-6">
                    <h6 class="fw-semibold mb-3">Truck Information</h6>
                    <div class="mb-3">
                        <strong>Registration Plate:</strong> {{ optional($assignment->truck)->registration_plate_number ?? 'N/A' }}
                    </div>
                    <div class="mb-3">
                        <strong>Transporter:</strong> {{ optional(optional($assignment->truck)->transporter)->name ?? 'N/A' }}
                    </div>
                    
                    <h6 class="fw-semibold mb-3 mt-4">Driver Information</h6>
                    <div class="d-flex align-items-center mb-3">
                        @if(optional(optional($assignment->driver)->user)->profile_photo_path)
                            <img src="{{ asset('storage/' . $assignment->driver->user->profile_photo_path) }}" alt="{{ $assignment->driver->user->name }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" alt="{{ optional(optional($assignment->driver)->user)->name ?? 'N/A' }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                        @endif
                        <div class="flex-grow-1">
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ optional(optional($assignment->driver)->user)->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <strong>Phone:</strong> {{ optional(optional($assignment->driver)->user)->phone ?? 'N/A' }}
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <form action="{{ route('assignments.destroy', $assignment) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this assignment?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <iconify-icon icon="fluent:delete-24-regular" class="me-1"></iconify-icon> Delete Assignment
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize clipboard functionality
            const clipboard = new ClipboardJS('.copy-text');
            
            clipboard.on('success', function(e) {
                // Create a temporary tooltip
                const tooltip = document.createElement('div');
                tooltip.textContent = 'Assignment ID copied';
                tooltip.className = 'copy-tooltip';
                document.body.appendChild(tooltip);
                
                // Position near the clicked element
                const rect = e.trigger.getBoundingClientRect();
                tooltip.style.top = `${rect.bottom + window.scrollY + 5}px`;
                tooltip.style.left = `${rect.left + window.scrollX}px`;
                
                // Remove after 1.5 seconds
                setTimeout(() => {
                    tooltip.remove();
                }, 1500);
                
                e.clearSelection();
            });
        });
    </script>

    <style>
        .copy-text {
            cursor: pointer;
        }
        .copy-tooltip {
            position: absolute;
            background: #333;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            z-index: 1000;
        }
    </style>
@endsection