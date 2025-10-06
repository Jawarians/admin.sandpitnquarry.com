@extends('layout.layout')
@php
    $title='Edit Transporter';
    $subTitle = 'Edit Transporter';
@endphp

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-12">
                <div class="card-body p-24">
                    <div class="card-title d-flex flex-wrap align-items-center gap-3 mb-24">
                        <h4 class="mb-0 fw-semibold">{{ $title }}</h4>
                    </div>
                    <form action="{{ route('updateTransporter', $transporter->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-24">
                            <div class="col-lg-6">
                                <div class="mb-24">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $transporter->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-24">
                                    <label for="registration_number" class="form-label">Registration Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('registration_number') is-invalid @enderror" name="registration_number" id="registration_number" value="{{ old('registration_number', $transporter->registration_number) }}" required>
                                    @error('registration_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="mb-24">
                                    <label for="type" class="form-label">Company Type <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" name="type" id="type" required>
                                        <option value="" disabled>Select company type</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type }}" {{ old('type', $transporter->type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="mb-24">
                                    <label for="user_id" class="form-label">Owner <span class="text-danger">*</span></label>
                                    <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user_id" required>
                                        <option value="" disabled>Select owner</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id', $transporter->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-end gap-3">
                                <a href="{{ route('transportersList') }}" class="btn btn-outline-secondary px-24 py-12 radius-8 text-capitalize">Cancel</a>
                                <button type="submit" class="btn btn-primary px-24 py-12 radius-8 text-capitalize">Update Transporter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection