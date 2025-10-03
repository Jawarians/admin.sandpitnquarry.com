@extends('layout.layout')
@php
    $title='Create Driver';
    $subTitle = 'Create Driver';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap gap-3">
        <h5 class="mb-0">Create New Driver</h5>
        <a href="{{ route('drivers.index') }}" class="btn btn-secondary btn-sm radius-8">
            <iconify-icon icon="material-symbols:arrow-back" class="me-1"></iconify-icon>
            Back to List
        </a>
    </div>
    <div class="card-body p-24">
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!-- User Information -->
                <div class="col-12">
                    <h6 class="text-secondary-light fw-semibold mb-3">Driver Information</h6>
                    <div class="card bg-neutral-100 radius-12 mb-4">
                        <div class="card-body p-24">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-medium">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-medium">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label fw-medium">Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                        <button type="button" class="btn btn-outline-secondary toggle-password" id="togglePassword">
                                            <iconify-icon icon="mdi:eye" class="password-icon"></iconify-icon>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="profile_photo" class="form-label fw-medium">Profile Photo</label>
                                    <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" id="profile_photo" name="profile_photo" accept="image/*">
                                    @error('profile_photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-secondary-light">Recommended size: 300x300 pixels (Max: 2MB)</small>
                                </div>

                                <div class="col-md-6">
                                    <label for="status" class="form-label fw-medium">Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        <option value="Suspended" {{ old('status') == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transporter Information -->
                <div class="col-12">
                    <h6 class="text-secondary-light fw-semibold mb-3">Transporter Information</h6>
                    <div class="card bg-neutral-100 radius-12 mb-4">
                        <div class="card-body p-24">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="transporter_id" class="form-label fw-medium">Select Transporter <span class="text-danger">*</span></label>
                                    <select class="form-select @error('transporter_id') is-invalid @enderror" id="transporter_id" name="transporter_id" required>
                                        <option value="">Select Transporter</option>
                                        @foreach($transporters as $transporter)
                                            <option value="{{ $transporter->id }}" {{ old('transporter_id') == $transporter->id ? 'selected' : '' }}>
                                                {{ $transporter->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('transporter_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Truck Information -->
                <div class="col-12">
                    <h6 class="text-secondary-light fw-semibold mb-3">Truck Assignment</h6>
                    <div class="card bg-neutral-100 radius-12 mb-4">
                        <div class="card-body p-24">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="truck_id" class="form-label fw-medium">Select Truck</label>
                                    <select class="form-select @error('truck_id') is-invalid @enderror" id="truck_id" name="truck_id">
                                        <option value="">Select Truck</option>
                                        @foreach($trucks as $truck)
                                            <option value="{{ $truck->id }}" {{ old('truck_id') == $truck->id ? 'selected' : '' }}>
                                                {{ $truck->registration_plate_number }} - {{ $truck->make }} {{ $truck->model }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('truck_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-secondary-light">Optional. You can assign a truck later.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div class="col-12">
                    <h6 class="text-secondary-light fw-semibold mb-3">Additional Information</h6>
                    <div class="card bg-neutral-100 radius-12 mb-4">
                        <div class="card-body p-24">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="notes" class="form-label fw-medium">Notes</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="4">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-32">
                            Create Driver
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const passwordIcon = document.querySelector('.password-icon');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            if (type === 'text') {
                passwordIcon.setAttribute('icon', 'mdi:eye-off');
            } else {
                passwordIcon.setAttribute('icon', 'mdi:eye');
            }
        });

        // Transporter dependent trucks
        const transporterSelect = document.getElementById('transporter_id');
        const truckSelect = document.getElementById('truck_id');
        const originalTrucks = [...truckSelect.options].map(option => ({
            value: option.value,
            text: option.text,
            transporterId: option.dataset.transporterId
        }));
        
        transporterSelect.addEventListener('change', function() {
            const selectedTransporterId = this.value;
            
            // Clear current options except the first one
            while (truckSelect.options.length > 1) {
                truckSelect.remove(1);
            }
            
            // If no transporter is selected, just return
            if (!selectedTransporterId) return;
            
            // Add trucks that belong to the selected transporter
            fetch(`/api/transporters/${selectedTransporterId}/trucks`)
                .then(response => response.json())
                .then(trucks => {
                    if (trucks.length === 0) {
                        const option = document.createElement('option');
                        option.text = 'No trucks available for this transporter';
                        option.disabled = true;
                        truckSelect.add(option);
                    } else {
                        trucks.forEach(truck => {
                            const option = document.createElement('option');
                            option.value = truck.id;
                            option.text = `${truck.registration_plate_number} - ${truck.make} ${truck.model}`;
                            truckSelect.add(option);
                        });
                    }
                })
                .catch(error => console.error('Error fetching trucks:', error));
        });
    });
</script>
@endpush
@endsection