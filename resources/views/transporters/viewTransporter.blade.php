@extends('layout.layout')
@php
    $title='Transporter Details';
    $subTitle = 'Transporter Details';
@endphp

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-12">
                <div class="card-body p-24">
                    <div class="card-title d-flex flex-wrap align-items-center gap-3 mb-24">
                        <h4 class="mb-0 fw-semibold">{{ $title }}</h4>
                        <div class="ms-auto">
                            <a href="{{ route('transportersList') }}" class="btn btn-outline-secondary px-16 py-8 radius-8 text-capitalize">
                                <iconify-icon icon="mdi:arrow-left" class="me-8"></iconify-icon> Back to List
                            </a>
                            <a href="{{ route('editTransporter', $transporter->id) }}" class="btn btn-primary px-16 py-8 radius-8 text-capitalize">
                                <iconify-icon icon="mdi:pencil-outline" class="me-8"></iconify-icon> Edit
                            </a>
                        </div>
                    </div>
                    
                    <div class="row g-24">
                        <div class="col-md-6">
                            <div class="mb-24">
                                <h6 class="fw-medium text-secondary-light mb-2">Transporter ID</h6>
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 text-md">{{ $transporter->id }}</p>
                                    <button class="btn btn-sm ms-2" onclick="copyToClipboard('{{ $transporter->id }}')">
                                        <iconify-icon icon="mdi:content-copy" class="text-xl"></iconify-icon>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-24">
                                <h6 class="fw-medium text-secondary-light mb-2">Registration Number</h6>
                                <p class="mb-0 text-md">{{ $transporter->registration_number }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-24">
                                <h6 class="fw-medium text-secondary-light mb-2">Name</h6>
                                <p class="mb-0 text-md">{{ $transporter->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-24">
                                <h6 class="fw-medium text-secondary-light mb-2">Company Type</h6>
                                <p class="mb-0 text-md">{{ $transporter->type }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-24">
                                <h6 class="fw-medium text-secondary-light mb-2">Owner</h6>
                                <p class="mb-0 text-md">{{ $transporter->owner->name ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-24">
                                <h6 class="fw-medium text-secondary-light mb-2">Owner Email</h6>
                                <p class="mb-0 text-md">{{ $transporter->owner->email ?? 'N/A' }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-24">
                                <h6 class="fw-medium text-secondary-light mb-2">Created At</h6>
                                <p class="mb-0 text-md">{{ $transporter->created_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-24">
                                <h6 class="fw-medium text-secondary-light mb-2">Updated At</h6>
                                <p class="mb-0 text-md">{{ $transporter->updated_at->format('d M Y, h:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information Sections -->
                    <div class="mt-32">
                        <h5 class="fw-medium mb-24">Related Information</h5>
                        
                        <!-- Drivers Section -->
                        <div class="card radius-12 mb-24">
                            <div class="card-header bg-base py-16 px-24">
                                <h6 class="mb-0">Drivers</h6>
                            </div>
                            <div class="card-body p-24">
                                @if($transporter->drivers && $transporter->drivers->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table bordered-table sm-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transporter->drivers as $driver)
                                                    <tr>
                                                        <td>{{ $driver->id }}</td>
                                                        <td>{{ $driver->user->name ?? 'N/A' }}</td>
                                                        <td>{{ $driver->user->phone ?? 'N/A' }}</td>
                                                        <td>
                                                            @if($driver->active)
                                                                <span class="badge bg-success-light text-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger-light text-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="mb-0">No drivers found for this transporter.</p>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Trucks Section -->
                        <div class="card radius-12 mb-24">
                            <div class="card-header bg-base py-16 px-24">
                                <h6 class="mb-0">Trucks</h6>
                            </div>
                            <div class="card-body p-24">
                                @if($transporter->trucks && $transporter->trucks->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table bordered-table sm-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Registration Number</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transporter->trucks as $truck)
                                                    <tr>
                                                        <td>{{ $truck->id }}</td>
                                                        <td>{{ $truck->registration_number }}</td>
                                                        <td>{{ $truck->type ?? 'N/A' }}</td>
                                                        <td>
                                                            @if($truck->active)
                                                                <span class="badge bg-success-light text-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger-light text-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="mb-0">No trucks found for this transporter.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text);
    alert('Transporter ID copied');
}
</script>
@endsection