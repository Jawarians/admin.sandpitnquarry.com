@extends('layout.layout')
@php
    $title = 'Order Statuses';
    $subTitle = 'Order Status Management';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('ordersList') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ep:back" class="icon text-xl line-height-1"></iconify-icon>
                Back to Orders
            </a>
            <h5 class="card-title mb-0">Order Statuses</h5>
        </div>
    <span class="text-sm text-secondary-light">Total: {{ $statuses->count() }} statuses</span>
    </div>
    <div class="card-body p-24">
        <div class="row gy-4">
            @forelse($statuses as $status)
            <div class="col-md-6 col-lg-4">
                <div class="card border radius-12 p-20 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-16">
                        <div class="d-flex align-items-center gap-12">
                            <div class="w-40-px h-40-px bg-primary-50 rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="mdi:tag" class="text-primary-600 text-xl"></iconify-icon>
                            </div>
                            <h6 class="text-lg mb-0">{{ $status->name }}</h6>
                        </div>
                        @if($status->is_active ?? true)
                            <span class="bg-success-focus text-success-600 border border-success-main px-12 py-4 radius-4 fw-medium text-xs">Active</span>
                        @else
                            <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-12 py-4 radius-4 fw-medium text-xs">Inactive</span>
                        @endif
                    </div>
                    
                    @if($status->description)
                    <p class="text-secondary-light mb-16 text-sm">{{ $status->description }}</p>
                    @endif
                    
                    <div class="mt-auto">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <iconify-icon icon="mdi:shopping" class="text-secondary-light"></iconify-icon>
                                <span class="text-sm text-secondary-light">
                                    {{ $status->orders->count() ?? 0 }} orders
                                </span>
                            </div>
                            @if($status->created_at)
                            <span class="text-xs text-secondary-light">
                                Created {{ $status->created_at->format('M d, Y') }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="d-flex flex-column align-items-center justify-content-center py-5">
                    <iconify-icon icon="mdi:tag-outline" class="icon text-6xl text-neutral-400 mb-3"></iconify-icon>
                    <h5 class="text-neutral-500 mb-2">No Order Statuses Found</h5>
                    <p class="text-neutral-400 mb-0">There are no order statuses configured in the system yet.</p>
                </div>
            </div>
            @endforelse
        </div>
        
    @if($statuses->count() > 0)
        <div class="mt-24 pt-20 border-top">
            <div class="row gy-3">
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="w-16-px h-16-px bg-success-600 rounded-circle"></div>
                        <span class="text-sm text-secondary-light">
                            Active Statuses: {{ $statuses->where('is_active', true)->count() ?? $statuses->count() }}
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="w-16-px h-16-px bg-neutral-400 rounded-circle"></div>
                        <span class="text-sm text-secondary-light">
                            Inactive Statuses: {{ $statuses->where('is_active', false)->count() ?? 0 }}
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="w-16-px h-16-px bg-primary-600 rounded-circle"></div>
                        <span class="text-sm text-secondary-light">
                            Total Orders: {{ $statuses->sum(function($status) { return $status->orders->count() ?? 0; }) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection