@extends('layout.layout')
@php
    $title='Edit Assignment';
    $subTitle = 'Edit Assignment';
@endphp

@section('content')
    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <h5 class="card-title mb-0">Edit Assignment</h5>
        </div>
        <div class="card-body p-24">
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('assignments.update', $assignment) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="truck_id" class="form-label mb-1">Truck</label>
                            <select name="truck_id" id="truck_id" class="form-select @error('truck_id') is-invalid @enderror" required>
                                <option value="">Select a truck</option>
                                <!-- This would be filled dynamically from the controller -->
                                @if($assignment->truck)
                                    <option value="{{ $assignment->truck_id }}" selected>
                                        {{ $assignment->truck->registration_plate_number }} ({{ optional($assignment->truck->transporter)->name ?? 'N/A' }})
                                    </option>
                                @endif
                            </select>
                            @error('truck_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="driver_id" class="form-label mb-1">Driver</label>
                            <select name="driver_id" id="driver_id" class="form-select @error('driver_id') is-invalid @enderror" required>
                                <option value="">Select a driver</option>
                                <!-- This would be filled dynamically from the controller -->
                                @if($assignment->driver)
                                    <option value="{{ $assignment->driver_id }}" selected>
                                        {{ optional($assignment->driver->user)->name ?? 'N/A' }}
                                    </option>
                                @endif
                            </select>
                            @error('driver_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-group mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="cancelled" name="cancelled" {{ $assignment->cancelled_at ? 'checked' : '' }}>
                        <label class="form-check-label" for="cancelled">Mark as Cancelled</label>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Assignment</button>
                    <a href="{{ route('assignments.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection