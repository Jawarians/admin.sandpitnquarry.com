@extends('layout.layout')
@php
    $title='Truck Details';
    $subTitle = 'Truck Information';
@endphp

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <h5 class="card-title mb-0">Truck Details</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('trucks.edit', $truck) }}" class="btn btn-success text-sm btn-sm px-12 py-12 radius-8">
                        <iconify-icon icon="lucide:edit" class="me-1"></iconify-icon>
                        Edit
                    </a>
                    <a href="{{ route('trucks.index') }}" class="btn btn-secondary text-sm btn-sm px-12 py-12 radius-8">
                        <iconify-icon icon="mdi:arrow-left" class="me-1"></iconify-icon>
                        Back
                    </a>
                </div>
            </div>
            <div class="card-body p-24">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">ID</span>
                            <span class="text-lg fw-semibold text-secondary">{{ $truck->id }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Registration Plate Number</span>
                            <span class="text-lg fw-semibold text-secondary">{{ $truck->registration_plate_number }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Transporter</span>
                            <span class="text-lg fw-semibold text-secondary">{{ optional($truck->transporter)->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Current Driver</span>
                            <span class="text-lg fw-semibold text-secondary">{{ optional(optional(optional($truck->current)->driver)->user)->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Status</span>
                            @php
                                $status = optional($truck->latest)->status;
                                $statusClass = '';
                                $textClass = '';
                                $borderClass = '';
                                
                                if ($status == 'Active') {
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
                                } elseif ($status == 'Deleted') {
                                    $statusClass = 'bg-danger-focus';
                                    $textClass = 'text-danger-600';
                                    $borderClass = 'border-danger-main';
                                } else {
                                    $statusClass = 'bg-info-focus';
                                    $textClass = 'text-info-600';
                                    $borderClass = 'border-info-main';
                                }
                            @endphp
                            <span class="{{ $statusClass }} {{ $textClass }} border {{ $borderClass }} px-24 py-4 radius-4 fw-medium text-sm d-inline-block">{{ $status ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Created At</span>
                            <span class="text-lg fw-semibold text-secondary">{{ $truck->created_at ? $truck->created_at->format('d M Y H:i:s') : 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Package</span>
                            <span class="text-lg fw-semibold text-secondary">{{ optional($truck->package)->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="d-flex flex-column">
                            <span class="text-md text-neutral-500 mb-2">Remark</span>
                            <span class="text-lg fw-semibold text-secondary">{{ optional($truck->latest)->remark ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <h5 class="card-title mb-3">Truck Status History</h5>
                <div class="table-responsive">
                    <table class="table bordered-table sm-table mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($truck->truck_details()->orderBy('id', 'desc')->get() as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td>
                                        @php
                                            $statusClass = '';
                                            $textClass = '';
                                            $borderClass = '';
                                            
                                            if ($detail->status == 'Active') {
                                                $statusClass = 'bg-success-focus';
                                                $textClass = 'text-success-600';
                                                $borderClass = 'border-success-main';
                                            } elseif ($detail->status == 'Pending') {
                                                $statusClass = 'bg-warning-focus';
                                                $textClass = 'text-warning-600';
                                                $borderClass = 'border-warning-main';
                                            } elseif ($detail->status == 'Reject') {
                                                $statusClass = 'bg-danger-focus';
                                                $textClass = 'text-danger-600';
                                                $borderClass = 'border-danger-main';
                                            } elseif ($detail->status == 'Deleted') {
                                                $statusClass = 'bg-danger-focus';
                                                $textClass = 'text-danger-600';
                                                $borderClass = 'border-danger-main';
                                            } else {
                                                $statusClass = 'bg-info-focus';
                                                $textClass = 'text-info-600';
                                                $borderClass = 'border-info-main';
                                            }
                                        @endphp
                                        <span class="{{ $statusClass }} {{ $textClass }} border {{ $borderClass }} px-24 py-4 radius-4 fw-medium text-sm">{{ $detail->status }}</span>
                                    </td>
                                    <td>{{ $detail->remark ?? 'N/A' }}</td>
                                    <td>{{ $detail->created_at->format('d M Y H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No history found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($truck->current)
                    <hr class="my-4">
                    <h5 class="card-title mb-3">Current Assignment</h5>
                    <div class="table-responsive">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Driver</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $truck->current->id }}</td>
                                    <td>{{ optional(optional($truck->current->driver)->user)->name ?? 'N/A' }}</td>
                                    <td>{{ $truck->current->start_date ? $truck->current->start_date->format('d M Y') : 'N/A' }}</td>
                                    <td>{{ $truck->current->end_date ? $truck->current->end_date->format('d M Y') : 'Ongoing' }}</td>
                                    <td>
                                        <a href="{{ route('assignments.show', $truck->current) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection