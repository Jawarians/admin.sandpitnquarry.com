@extends('layout.layout')
@php
    $title='Edit Customer Bank Account';
    $subTitle = 'Update Customer Bank Account';
@endphp

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card radius-12 p-0">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap">
                <h4 class="mb-0 text-lg fw-semibold">Edit Customer Bank Account</h4>
                <div>
                    <a href="{{ route('customer-accounts.index') }}" class="btn btn-sm btn-secondary px-12 py-8 radius-8">
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
                
                <form action="{{ route('customer-accounts.update', $customerAccount) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Customer</label>
                            <div class="d-flex align-items-center">
                                @if(optional($customerAccount->customer)->profile_photo_path)
                                    <img src="{{ asset('storage/' . $customerAccount->customer->profile_photo_path) }}" alt="{{ $customerAccount->customer->name }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                @else
                                    <img src="{{ asset('assets/images/user.png') }}" alt="{{ optional($customerAccount->customer)->name ?? 'N/A' }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                @endif
                                <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ optional($customerAccount->customer)->name ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Account Holder Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $customerAccount->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bank" class="form-label">Bank Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('bank') is-invalid @enderror" id="bank" name="bank" value="{{ old('bank', $customerAccount->bank) }}" required>
                            @error('bank')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="number" class="form-label">Account Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number', $customerAccount->number) }}" required>
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="Pending" {{ old('status', $customerAccount->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Approved" {{ old('status', $customerAccount->status) == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Reject" {{ old('status', $customerAccount->status) == 'Reject' ? 'selected' : '' }}>Reject</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="document" class="form-label">Bank Statement Document</label>
                            <input type="file" class="form-control @error('document') is-invalid @enderror" id="document" name="document">
                            <div class="form-text">
                                @if($customerAccount->document)
                                    Current document: <a href="{{ route('customer-accounts.document', $customerAccount) }}" target="_blank">{{ $customerAccount->document->name }}</a>
                                @else
                                    No document currently uploaded.
                                @endif
                            </div>
                            @error('document')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('customer-accounts.show', $customerAccount) }}" class="btn btn-light me-2 px-16 py-12 radius-8">Cancel</a>
                        <button type="submit" class="btn btn-primary px-16 py-12 radius-8">Update Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection