@extends('layout.layout')
@php
    $title='Add New Quarry';
    $subTitle = 'Quarry Management';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <h4 class="mb-0 text-xl fw-medium">Add New Quarry</h4>
        <a href="{{ route('sites.index') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-8 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="mdi:arrow-left" class="icon text-xl line-height-1"></iconify-icon>
            Back to List
        </a>
    </div>
    <div class="card-body p-24">
                    <form action="{{ route('sites.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <label for="name" class="text-md text-secondary-light mb-8 fw-medium d-inline-block">Name</label>
                                    <input type="text" name="name" id="name" class="form-control radius-8 py-10 px-16 border-neutral-200 bg-base focus-green @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <label for="phone" class="text-md text-secondary-light mb-8 fw-medium d-inline-block">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control radius-8 py-10 px-16 border-neutral-200 bg-base focus-green @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-20">
                                    <label for="address" class="text-md text-secondary-light mb-8 fw-medium d-inline-block">Address</label>
                                    <textarea name="address" id="address" class="form-control radius-8 py-10 px-16 border-neutral-200 bg-base focus-green @error('address') is-invalid @enderror" rows="3" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-20">
                                    <label for="postcode" class="text-md text-secondary-light mb-8 fw-medium d-inline-block">Postcode</label>
                                    <input type="text" name="postcode" id="postcode" class="form-control radius-8 py-10 px-16 border-neutral-200 bg-base focus-green @error('postcode') is-invalid @enderror" value="{{ old('postcode') }}" required>
                                    @error('postcode')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-20">
                                    <label for="state_id" class="text-md text-secondary-light mb-8 fw-medium d-inline-block">State</label>
                                    <select name="state_id" id="state_id" class="form-select radius-8 py-10 px-16 border-neutral-200 bg-base focus-green @error('state_id') is-invalid @enderror" required>
                                        <option value="">Select State</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-20">
                                    <label for="city_id" class="text-md text-secondary-light mb-8 fw-medium d-inline-block">City</label>
                                    <select name="city_id" id="city_id" class="form-select radius-8 py-10 px-16 border-neutral-200 bg-base focus-green @error('city_id') is-invalid @enderror" required>
                                        <option value="">Select City</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <label for="latitude" class="text-md text-secondary-light mb-8 fw-medium d-inline-block">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control radius-8 py-10 px-16 border-neutral-200 bg-base focus-green @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}">
                                    @error('latitude')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <label for="longitude" class="text-md text-secondary-light mb-8 fw-medium d-inline-block">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control radius-8 py-10 px-16 border-neutral-200 bg-base focus-green @error('longitude') is-invalid @enderror" value="{{ old('longitude') }}">
                                    @error('longitude')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-24">
                            <button type="submit" class="btn btn-primary text-sm px-16 py-12 radius-8">
                                <iconify-icon icon="mdi:content-save" class="icon text-xl me-2"></iconify-icon>
                                Save Quarry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // You can add client-side validation or map integration here
    // For example, Google Maps integration for selecting coordinates
</script>
@endpush