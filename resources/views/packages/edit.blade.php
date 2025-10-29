@extends('layout.layout')
@php
$title='Edit Package';
$subTitle = 'Edit Package';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24">
        <h5 class="mb-0">Edit Package</h5>
    </div>
    <div class="card-body p-24">
        <form action="{{ route('packages.update', $package) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $package->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="order_delay_minutes" class="form-label">Delay (minutes)</label>
                <input type="number" class="form-control" id="order_delay_minutes" name="order_delay_minutes" value="{{ old('order_delay_minutes', $package->order_delay_minutes) }}" min="0">
                @error('order_delay_minutes')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="payment_term" class="form-label">Payment Term</label>
                <input type="number" class="form-control" id="payment_term" name="payment_term" value="{{ old('payment_term', $package->payment_term) }}" min="0">
                @error('payment_term')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="period" class="form-label">Period</label>
                <input type="text" class="form-control" id="period" name="period" value="{{ old('period', $package->period) }}">
                @error('period')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="service_charge" class="form-label">Service Charge</label>
                <input type="number" step="0.01" class="form-control" id="service_charge" name="service_charge" value="{{ old('service_charge', $package->service_charge) }}" min="0">
                @error('service_charge')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('packages.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
