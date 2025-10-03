@extends('layout.layout')
@php
    $title='Edit Truck';
    $subTitle = 'Update Truck Information';
@endphp

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <h5 class="card-title mb-0">Edit Truck</h5>
                <a href="{{ route('trucks.index') }}" class="btn btn-secondary text-sm btn-sm px-12 py-12 radius-8">
                    <iconify-icon icon="mdi:arrow-left" class="me-1"></iconify-icon>
                    Back
                </a>
            </div>
            <div class="card-body p-24">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('trucks.update', $truck) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Registration Plate Number</label>
                            <input type="text" class="form-control" name="registration_plate_number" value="{{ old('registration_plate_number', $truck->registration_plate_number) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Transporter</label>
                            <select class="form-select" name="transporter_id" required>
                                <option value="">Select Transporter</option>
                                @foreach($transporters as $transporter)
                                    <option value="{{ $transporter->id }}" {{ old('transporter_id', $truck->transporter_id) == $transporter->id ? 'selected' : '' }}>{{ $transporter->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="Active" {{ old('status', optional($truck->latest)->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Pending" {{ old('status', optional($truck->latest)->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Reject" {{ old('status', optional($truck->latest)->status) == 'Reject' ? 'selected' : '' }}>Reject</option>
                                <option value="Deleted" {{ old('status', optional($truck->latest)->status) == 'Deleted' ? 'selected' : '' }}>Deleted</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Package (Optional)</label>
                            <select class="form-select" name="package_id">
                                <option value="">No Package</option>
                                @foreach(App\Models\Package::all() as $package)
                                    <option value="{{ $package->id }}" {{ old('package_id', $truck->package_id) == $package->id ? 'selected' : '' }}>{{ $package->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Remark</label>
                            <textarea class="form-control" name="remark" rows="3">{{ old('remark', optional($truck->latest)->remark) }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Update Truck</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection