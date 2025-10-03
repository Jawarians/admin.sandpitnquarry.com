@extends('layout.layout')
@php
    $title='Create Coin';
    $subTitle = 'Create New Coin';
@endphp

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <div class="d-flex align-items-center flex-wrap gap-3">
                    <h2 class="card-title fw-medium mb-0">{{ $title }}</h2>
                </div>
                <a href="{{ route('coins.index') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                    <iconify-icon icon="ic:baseline-arrow-back" class="icon text-xl line-height-1"></iconify-icon>
                    Back to Coins
                </a>
            </div>
            <div class="card-body p-24">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('coins.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <label for="user_id" class="form-label">Customer <span class="text-danger">*</span></label>
                            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                <option value="">Select Customer</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-lg-6">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" 
                                       value="{{ old('amount') }}" placeholder="Enter amount in cents (100 = 1.00)">
                                <span class="input-group-text">Coins</span>
                            </div>
                            <small class="text-muted">Enter the amount in cents (e.g. 500 = 5.00)</small>
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-lg-6">
                            <label for="coinable_type" class="form-label">Purpose <span class="text-danger">*</span></label>
                            <select name="coinable_type" id="coinable_type" class="form-control @error('coinable_type') is-invalid @enderror">
                                <option value="">Select Purpose</option>
                                <option value="reload" {{ old('coinable_type') == 'reload' ? 'selected' : '' }}>Reload</option>
                                <option value="purchase" {{ old('coinable_type') == 'purchase' ? 'selected' : '' }}>Purchase</option>
                                <option value="refund" {{ old('coinable_type') == 'refund' ? 'selected' : '' }}>Refund</option>
                                <option value="promotion" {{ old('coinable_type') == 'promotion' ? 'selected' : '' }}>Promotion</option>
                                <option value="bonus" {{ old('coinable_type') == 'bonus' ? 'selected' : '' }}>Bonus</option>
                            </select>
                            @error('coinable_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary px-4">Create Coin</button>
                        <a href="{{ route('coins.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection