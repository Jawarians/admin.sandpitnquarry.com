@extends('layout.layout')
@php
    $title = 'Job Statuses';
    $subTitle = 'Job Status Management';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('jobsList') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ep:back" class="icon text-xl line-height-1"></iconify-icon>
                Back to Jobs
            </a>
            <h5 class="card-title mb-0">Job Statuses</h5>
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
                            <div class="w-40-px h-40-px bg-info-50 rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="mdi:briefcase-check" class="text-info-600 text-xl"></iconify-icon>
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
                                <iconify-icon icon="mdi:briefcase" class="text-secondary-light"></iconify-icon>
                                <span class="text-sm text-secondary-light">
                                    @php
                                        $virtualName = $status->name;
                                        $count = $statusCounts[$virtualName] ?? 0;
                                    @endphp
                                    {{ $count }} jobs
                                </span>
                            </div>
                            @if($status->created_at)
                            <span class="text-xs text-secondary-light">
                                Created {{ $status->created_at->format('M d, Y') }}
                            </span>
                            @endif
                        </div>
                        
                        <!-- Status Progress Indicator -->
                        @php
                            $virtualName = $status->name;
                        @endphp
                        @if($status->is_completed ?? false)
                        <div class="mt-12">
                            <div class="d-flex align-items-center gap-2">
                                <iconify-icon icon="mdi:check-circle" class="text-success-600"></iconify-icon>
                                <span class="text-xs text-success-600">Final Status</span>
                            </div>
                        </div>
                        @elseif($virtualName === 'Assigned')
                        <div class="mt-12">
                            <div class="d-flex align-items-center gap-2">
                                <iconify-icon icon="mdi:account-arrow-right" class="text-primary-600"></iconify-icon>
                                <span class="text-xs text-primary-600">Assigned</span>
                            </div>
                        </div>
                        @elseif($status->is_in_progress ?? false)
                        <div class="mt-12">
                            <div class="d-flex align-items-center gap-2">
                                <iconify-icon icon="mdi:clock" class="text-warning-600"></iconify-icon>
                                <span class="text-xs text-warning-600">In Progress</span>
                            </div>
                        </div>
                        @else
                        <div class="mt-12">
                            <div class="d-flex align-items-center gap-2">
                                <iconify-icon icon="mdi:play-circle" class="text-info-600"></iconify-icon>
                                <span class="text-xs text-info-600">Initial Status</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="d-flex flex-column align-items-center justify-content-center py-5">
                    <iconify-icon icon="mdi:briefcase-outline" class="icon text-6xl text-neutral-400 mb-3"></iconify-icon>
                    <h5 class="text-neutral-500 mb-2">No Job Statuses Found</h5>
                    <p class="text-neutral-400 mb-0">There are no job statuses configured in the system yet.</p>
                </div>
            </div>
            @endforelse
        </div>
        
    @if($statuses->count() > 0)
        <div class="mt-24 pt-20 border-top">
            <div class="row gy-3">
                <div class="col-md-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="w-16-px h-16-px bg-success-600 rounded-circle"></div>
                        <span class="text-sm text-secondary-light">
                            Accepted: {{ $statusCounts['Accepted'] ?? 0 }}
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="w-16-px h-16-px bg-primary-600 rounded-circle"></div>
                        <span class="text-sm text-secondary-light">
                            Assigned: {{ $statusCounts['Assigned'] ?? 0 }}
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="w-16-px h-16-px bg-warning-600 rounded-circle"></div>
                        <span class="text-sm text-secondary-light">
                            Ongoing: {{ $statusCounts['Ongoing'] ?? 0 }}
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="w-16-px h-16-px bg-info-600 rounded-circle"></div>
                        <span class="text-sm text-secondary-light">
                            Completed: {{ $statusCounts['Completed'] ?? 0 }}
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Status Flow Visualization -->
            <div class="mt-20">
                <h6 class="text-lg mb-16">Status Flow</h6>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    @foreach($statuses->sortBy('sort_order') as $index => $status)
                        <div class="d-flex align-items-center gap-2">
                            @if($status->is_completed ?? false)
                                <div class="w-32-px h-32-px bg-success-600 rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="mdi:check" class="text-white text-sm"></iconify-icon>
                                </div>
                            @elseif($status->is_in_progress ?? false)
                                <div class="w-32-px h-32-px bg-warning-600 rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="mdi:clock" class="text-white text-sm"></iconify-icon>
                                </div>
                            @else
                                <div class="w-32-px h-32-px bg-info-600 rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="mdi:play" class="text-white text-sm"></iconify-icon>
                                </div>
                            @endif
                            <span class="text-sm fw-medium">{{ $status->name }}</span>
                        </div>
                        @if(!$loop->last)
                            <iconify-icon icon="mdi:arrow-right" class="text-secondary-light"></iconify-icon>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection