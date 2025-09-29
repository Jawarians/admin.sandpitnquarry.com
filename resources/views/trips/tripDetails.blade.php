@extends('layout.layout')
@php
    $title = 'Trip Details';
    $subTitle = 'Trip #' . str_pad($trip->id, 4, '0', STR_PAD_LEFT);
@endphp

@section('content')
<div class="row gy-4">
    <!-- Trip Information Card -->
    <div class="col-lg-8">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('tripsList') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="ep:back" class="icon text-xl line-height-1"></iconify-icon>
                        Back to Trips
                    </a>
                    <h5 class="card-title mb-0">Trip Details</h5>
                </div>
                <div class="d-flex align-items-center gap-2">
                    @if($trip->tripStatus)
                        <span class="bg-warning-focus text-warning-600 border border-warning-main px-24 py-4 radius-4 fw-medium text-sm">{{ $trip->tripStatus->name }}</span>
                    @else
                        <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">Unknown Status</span>
                    @endif
                </div>
            </div>
            <div class="card-body p-24">
                <div class="row gy-4">
                    <!-- Basic Trip Information -->
                    <div class="col-12">
                        <div class="bg-neutral-50 p-20 radius-8">
                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Trip ID:</span>
                                        <span class="text-md text-secondary-light">#{{ str_pad($trip->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Trip Number:</span>
                                        <span class="text-md text-secondary-light">{{ $trip->trip_number ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Trip Date:</span>
                                        <span class="text-md text-secondary-light">{{ $trip->created_at ? $trip->created_at->format('d M Y, h:i A') : 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Distance:</span>
                                        <span class="text-md text-secondary-light">{{ $trip->distance_km ? number_format($trip->distance_km, 1) . ' km' : 'N/A' }}</span>
                                    </div>
                                </div>
                                @if($trip->start_time)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Start Time:</span>
                                        <span class="text-md text-secondary-light">{{ \Carbon\Carbon::parse($trip->start_time)->format('h:i A') }}</span>
                                    </div>
                                </div>
                                @endif
                                @if($trip->end_time)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">End Time:</span>
                                        <span class="text-md text-secondary-light">{{ \Carbon\Carbon::parse($trip->end_time)->format('h:i A') }}</span>
                                    </div>
                                </div>
                                @endif
                                @if($trip->estimated_duration)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Duration:</span>
                                        <span class="text-md text-secondary-light">{{ $trip->estimated_duration }} hours</span>
                                    </div>
                                </div>
                                @endif
                                @if($trip->fuel_consumed)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Fuel Used:</span>
                                        <span class="text-md text-secondary-light">{{ number_format($trip->fuel_consumed, 2) }} L</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Route Information -->
                    @if($trip->origin || $trip->destination)
                    <div class="col-12">
                        <h6 class="text-xl mb-16">Route Information</h6>
                        <div class="row gy-3">
                            @if($trip->origin)
                            <div class="col-md-6">
                                <div class="card border-success border-2 radius-12 p-16">
                                    <div class="d-flex align-items-start gap-3">
                                        <iconify-icon icon="mdi:map-marker-up" class="text-success-600 text-2xl mt-2"></iconify-icon>
                                        <div>
                                            <h6 class="text-success-600 mb-8">Origin</h6>
                                            <p class="text-secondary-light mb-0 text-sm">{{ $trip->origin }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($trip->destination)
                            <div class="col-md-6">
                                <div class="card border-info border-2 radius-12 p-16">
                                    <div class="d-flex align-items-start gap-3">
                                        <iconify-icon icon="mdi:map-marker-down" class="text-info-600 text-2xl mt-2"></iconify-icon>
                                        <div>
                                            <h6 class="text-info-600 mb-8">Destination</h6>
                                            <p class="text-secondary-light mb-0 text-sm">{{ $trip->destination }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @if($trip->waypoints)
                        <div class="mt-16">
                            <h6 class="text-lg mb-12">Waypoints</h6>
                            <div class="bg-warning-50 border border-warning-200 p-16 radius-8">
                                <p class="text-secondary-light mb-0 text-sm">{{ $trip->waypoints }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- Trip Notes -->
                    @if($trip->notes)
                    <div class="col-12">
                        <h6 class="text-xl mb-16">Trip Notes</h6>
                        <div class="bg-info-50 border border-info-200 p-16 radius-8">
                            <p class="text-secondary-light mb-0">{{ $trip->notes }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Trip Items/Cargo -->
                    @if($trip->tripDetails && $trip->tripDetails->count() > 0)
                    <div class="col-12">
                        <h6 class="text-xl mb-16">Cargo Details</h6>
                        <div class="table-responsive">
                            <table class="table bordered-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Weight (kg)</th>
                                        <th>Status</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trip->tripDetails as $detail)
                                    <tr>
                                        <td>{{ $detail->item_name ?? $detail->description ?? 'N/A' }}</td>
                                        <td>{{ $detail->quantity ?? 1 }}</td>
                                        <td>{{ $detail->weight_kg ? number_format($detail->weight_kg, 2) : 'N/A' }}</td>
                                        <td>
                                            @if($detail->is_delivered ?? false)
                                                <span class="bg-success-focus text-success-600 border border-success-main px-12 py-4 radius-4 fw-medium text-sm">Delivered</span>
                                            @elseif($detail->is_loaded ?? false)
                                                <span class="bg-info-focus text-info-600 border border-info-main px-12 py-4 radius-4 fw-medium text-sm">Loaded</span>
                                            @else
                                                <span class="bg-warning-focus text-warning-600 border border-warning-main px-12 py-4 radius-4 fw-medium text-sm">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $detail->notes ?? 'N/A' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Driver & Truck Information -->
    <div class="col-lg-4">
        <div class="row gy-4">
            <!-- Driver Information -->
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Driver Assignment</h6>
                    </div>
                    <div class="card-body p-24">
                        @if($trip->driver)
                            <div class="d-flex align-items-center gap-3 mb-16">
                                <div class="w-44-px h-44-px bg-success-50 rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                    <iconify-icon icon="mdi:account-hard-hat" class="text-success-600 text-xl"></iconify-icon>
                                </div>
                                <div>
                                    <h6 class="text-md mb-0">{{ $trip->driver->name }}</h6>
                                    <span class="text-sm text-secondary-light">Assigned Driver</span>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @if($trip->driver->phone)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:phone" class="text-success-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">{{ $trip->driver->phone }}</span>
                                    </div>
                                </li>
                                @endif
                                @if($trip->driver->email)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:email" class="text-success-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">{{ $trip->driver->email }}</span>
                                    </div>
                                </li>
                                @endif
                                @if($trip->driver->license_number)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:card-account-details" class="text-success-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">License: {{ $trip->driver->license_number }}</span>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        @else
                            <div class="text-center py-4">
                                <iconify-icon icon="mdi:account-question" class="text-warning-600 text-4xl mb-3"></iconify-icon>
                                <h6 class="text-warning-600 mb-2">No Driver Assigned</h6>
                                <p class="text-secondary-light text-sm mb-0">This trip needs to be assigned to a driver.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Truck Information -->
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Truck Assignment</h6>
                    </div>
                    <div class="card-body p-24">
                        @if($trip->truck)
                            <div class="d-flex align-items-center gap-3 mb-16">
                                <div class="w-44-px h-44-px bg-primary-50 rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                    <iconify-icon icon="mdi:truck" class="text-primary-600 text-xl"></iconify-icon>
                                </div>
                                <div>
                                    <h6 class="text-md mb-0">{{ $trip->truck->plate_number ?? $trip->truck->name ?? 'N/A' }}</h6>
                                    <span class="text-sm text-secondary-light">{{ $trip->truck->model ?? 'Unknown Model' }}</span>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @if($trip->truck->capacity_kg)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:weight" class="text-primary-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">Capacity: {{ number_format($trip->truck->capacity_kg) }} kg</span>
                                    </div>
                                </li>
                                @endif
                                @if($trip->truck->fuel_type)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:gas-station" class="text-primary-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">Fuel: {{ $trip->truck->fuel_type }}</span>
                                    </div>
                                </li>
                                @endif
                                @if($trip->truck->year)
                                <li class="list-group-item px-0 py-8 border-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <iconify-icon icon="mdi:calendar" class="text-primary-600"></iconify-icon>
                                        <span class="text-secondary-light text-sm">Year: {{ $trip->truck->year }}</span>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        @else
                            <div class="text-center py-4">
                                <iconify-icon icon="mdi:truck-outline" class="text-warning-600 text-4xl mb-3"></iconify-icon>
                                <h6 class="text-warning-600 mb-2">No Truck Assigned</h6>
                                <p class="text-secondary-light text-sm mb-0">This trip needs to be assigned to a truck.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Trip Summary -->
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Trip Summary</h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Total Distance:</span>
                            <span class="fw-medium">{{ $trip->distance_km ? number_format($trip->distance_km, 1) . ' km' : 'N/A' }}</span>
                        </div>
                        @if($trip->fuel_consumed)
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Fuel Consumed:</span>
                            <span class="fw-medium">{{ number_format($trip->fuel_consumed, 2) }} L</span>
                        </div>
                        @endif
                        @if($trip->fuel_cost)
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Fuel Cost:</span>
                            <span class="fw-medium">${{ number_format($trip->fuel_cost, 2) }}</span>
                        </div>
                        @endif
                        @if($trip->total_cost)
                        <hr class="my-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-lg fw-bold">Total Cost:</span>
                            <span class="text-lg fw-bold text-warning-600">${{ number_format($trip->total_cost, 2) }}</span>
                        </div>
                        @endif
                        
                        <!-- Trip Status Timeline -->
                        <div class="mt-20 pt-16 border-top">
                            <h6 class="text-sm fw-bold text-secondary-light mb-12">STATUS TIMELINE</h6>
                            <div class="d-flex flex-column gap-2">
                                @if($trip->start_time)
                                <div class="d-flex align-items-center gap-2">
                                    <div class="w-8-px h-8-px bg-success-600 rounded-circle"></div>
                                    <span class="text-xs text-secondary-light">Started: {{ \Carbon\Carbon::parse($trip->start_time)->format('h:i A') }}</span>
                                </div>
                                @endif
                                @if($trip->end_time)
                                <div class="d-flex align-items-center gap-2">
                                    <div class="w-8-px h-8-px bg-info-600 rounded-circle"></div>
                                    <span class="text-xs text-secondary-light">Completed: {{ \Carbon\Carbon::parse($trip->end_time)->format('h:i A') }}</span>
                                </div>
                                @else
                                <div class="d-flex align-items-center gap-2">
                                    <div class="w-8-px h-8-px bg-warning-600 rounded-circle"></div>
                                    <span class="text-xs text-secondary-light">In Progress</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection