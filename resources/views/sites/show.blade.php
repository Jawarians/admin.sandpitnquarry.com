@extends('layout.layout')
@php
    $title='Quarry Details';
    $subTitle = 'Quarry Management';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <h4 class="mb-0 text-xl fw-medium">Quarry Details</h4>
        <div class="d-flex gap-2">
            <a href="{{ route('sites.index') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-8 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="mdi:arrow-left" class="icon text-xl line-height-1"></iconify-icon>
                Back to List
            </a>
            <a href="{{ route('sites.edit', $site->id) }}" class="btn btn-primary text-sm btn-sm px-12 py-8 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="lucide:edit" class="icon text-xl line-height-1"></iconify-icon>
                Edit
            </a>
        </div>
    </div>
    <div class="card-body p-24">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table bordered-table sm-table mb-24">
                                    <tbody>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12" width="30%">ID</th>
                                            <td class="px-16 py-12">{{ $site->id }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12">Name</th>
                                            <td class="px-16 py-12">{{ $site->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12">Address</th>
                                            <td class="px-16 py-12">{{ $site->address }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12">Postcode</th>
                                            <td class="px-16 py-12">{{ $site->postcode }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12">City</th>
                                            <td class="px-16 py-12">{{ $site->city->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12">State</th>
                                            <td class="px-16 py-12">{{ $site->state->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12">Phone</th>
                                            <td class="px-16 py-12">{{ $site->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12">Created At</th>
                                            <td class="px-16 py-12">{{ $site->created_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light-300 fw-medium text-md text-secondary-light px-16 py-12">Updated At</th>
                                            <td class="px-16 py-12">{{ $site->updated_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card radius-12 border">
                                <div class="card-header bg-light-100 py-16 px-24">
                                    <h5 class="mb-0 fw-medium text-lg">Location</h5>
                                </div>
                                <div class="card-body p-24">
                                    <div class="mb-16">
                                        <span class="fw-medium text-md text-secondary-light">Latitude:</span> 
                                        <span class="ms-2">{{ $site->latitude ?: 'Not provided' }}</span>
                                    </div>
                                    <div class="mb-16">
                                        <span class="fw-medium text-md text-secondary-light">Longitude:</span>
                                        <span class="ms-2">{{ $site->longitude ?: 'Not provided' }}</span>
                                    </div>
                                    @if($site->latitude && $site->longitude)
                                    <div class="map-container bg-neutral-100 p-3 radius-8" style="height: 300px; width: 100%;">
                                        <!-- You can integrate a map here using Google Maps or another map service -->
                                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                            <iconify-icon icon="mdi:map-marker" class="icon text-6xl text-primary-600 mb-3"></iconify-icon>
                                            <p class="text-secondary mb-0 text-center">
                                                Map integration can be added here.<br>
                                                <small class="text-muted">Coordinates: {{ $site->latitude }}, {{ $site->longitude }}</small>
                                            </p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="d-flex flex-column align-items-center justify-content-center p-4 bg-warning-focus radius-8">
                                        <iconify-icon icon="mdi:map-marker-off" class="icon text-4xl text-warning-600 mb-3"></iconify-icon>
                                        <p class="text-warning-600 mb-0 text-center">No coordinates available for this quarry.</p>
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
</div>
@endsection