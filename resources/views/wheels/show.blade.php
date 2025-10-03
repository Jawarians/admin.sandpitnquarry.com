@extends('layout.layout')
@php
    $title='Wheel Details';
    $subTitle = 'Wheel Information';
@endphp

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <h5 class="card-title mb-0">Wheel #{{ $wheel->wheel }} Details</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('wheels.edit', $wheel) }}" class="btn btn-success text-sm btn-sm px-12 py-12 radius-8">
                        <iconify-icon icon="lucide:edit" class="me-1"></iconify-icon>
                        Edit
                    </a>
                    <a href="{{ route('wheels.index') }}" class="btn btn-secondary text-sm btn-sm px-12 py-12 radius-8">
                        <iconify-icon icon="mdi:arrow-left" class="me-1"></iconify-icon>
                        Back
                    </a>
                </div>
            </div>
            <div class="card-body p-24">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Wheel Number</span>
                            <span class="text-lg fw-semibold text-secondary">{{ $wheel->wheel }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Capacity</span>
                            <span class="text-lg fw-semibold text-secondary">{{ $wheel->capacity }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Load</span>
                            <div>
                                @if($wheel->load)
                                    <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm d-inline-block">Yes</span>
                                @else
                                    <span class="bg-danger-focus text-danger-600 border border-danger-main px-24 py-4 radius-4 fw-medium text-sm d-inline-block">No</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Tonne</span>
                            <div>
                                @if($wheel->tonne)
                                    <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm d-inline-block">Yes</span>
                                @else
                                    <span class="bg-danger-focus text-danger-600 border border-danger-main px-24 py-4 radius-4 fw-medium text-sm d-inline-block">No</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Created By</span>
                            <span class="text-lg fw-semibold text-secondary">{{ optional($wheel->creator)->name ?? 'Unknown' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Created At</span>
                            <span class="text-lg fw-semibold text-secondary">{{ $wheel->created_at ? $wheel->created_at->format('d M Y H:i:s') : 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Updated At</span>
                            <span class="text-lg fw-semibold text-secondary">{{ $wheel->updated_at ? $wheel->updated_at->format('d M Y H:i:s') : 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection