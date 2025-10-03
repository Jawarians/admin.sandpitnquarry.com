@extends('layout.layout')
@php
    $title='Create Account';
    $subTitle = 'New Account';
@endphp

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card radius-12 p-0">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap">
                <h4 class="mb-0 text-lg fw-semibold">Create Account</h4>
                <div>
                    <a href="{{ route('accounts.index') }}" class="btn btn-sm btn-secondary px-12 py-8 radius-8">
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
                        
                        <form action="{{ route('accounts.store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="user_id" class="form-label">Customer <span class="text-danger">*</span></label>
                                    <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                        <option value="">Select Customer</option>
                                        <!-- You'll need to populate this with users -->
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="code" class="form-label">Account Code <span class="text-danger">*</span></label>
                                    <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" required>
                                    @error('code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="term" class="form-label">Term (Days) <span class="text-danger">*</span></label>
                                    <input type="number" name="term" id="term" class="form-control @error('term') is-invalid @enderror" value="{{ old('term', 0) }}" min="0" required>
                                    @error('term')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="limit" class="form-label">Credit Limit (RM) <span class="text-danger">*</span></label>
                                    <input type="number" name="limit" id="limit" class="form-control @error('limit') is-invalid @enderror" value="{{ old('limit', 0) }}" min="0" step="0.01" required>
                                    @error('limit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Approve" {{ old('status') == 'Approve' ? 'selected' : '' }}>Approve</option>
                                        <option value="Reject" {{ old('status') == 'Reject' ? 'selected' : '' }}>Reject</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="remark" class="form-label">Remarks</label>
                                    <textarea name="remark" id="remark" class="form-control @error('remark') is-invalid @enderror" rows="3">{{ old('remark') }}</textarea>
                                    @error('remark')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end mt-4">
                                <button type="reset" class="btn btn-light me-2 px-16 py-12 radius-8">Reset</button>
                                <button type="submit" class="btn btn-primary px-16 py-12 radius-8">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection