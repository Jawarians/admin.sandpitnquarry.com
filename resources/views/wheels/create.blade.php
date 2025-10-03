@extends('layout.layout')
@php
    $title='Create Wheel';
    $subTitle = 'New Wheel';
@endphp

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card radius-12 p-0">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap">
                <h4 class="mb-0 text-lg fw-semibold">Create Wheel</h4>
                <div>
                    <a href="{{ route('wheels.index') }}" class="btn btn-sm btn-secondary px-12 py-8 radius-8">
                        <iconify-icon icon="mdi:arrow-left" class="me-1"></iconify-icon>
                        Back to List
                    </a>
                </div>
            </div>
            <div class="card-body p-24">
                        @if($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('wheels.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="wheel" class="form-label">Wheel Number <span class="text-danger">*</span></label>
                                    <input type="number" name="wheel" id="wheel" class="form-control @error('wheel') is-invalid @enderror" value="{{ old('wheel') }}" required min="1">
                                    @error('wheel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-secondary-light">This is the primary identifier and cannot be changed later.</small>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="capacity" class="form-label">Capacity <span class="text-danger">*</span></label>
                                    <input type="number" name="capacity" id="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', 0) }}" min="0" required>
                                    @error('capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Load Options</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input" type="checkbox" name="load" id="load" {{ old('load') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="load">Load</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Tonne Options</label>
                                    <div class="form-check form-switch mt-2">
                                        <input class="form-check-input" type="checkbox" name="tonne" id="tonne" {{ old('tonne') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tonne">Tonne</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end mt-4">
                                <button type="reset" class="btn btn-light me-2 px-16 py-12 radius-8">Reset</button>
                                <button type="submit" class="btn btn-primary px-16 py-12 radius-8">Create Wheel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

