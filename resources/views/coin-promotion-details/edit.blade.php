@extends('layout.layout')
@php
    $title='Edit Promotion Detail';
    $subTitle = 'Edit promotion detail';
@endphp

@section('content')
    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <h5 class="mb-0 text-lg fw-medium">Edit Promotion Detail #{{ $coinPromotionDetail->id }}</h5>
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

            <form action="{{ route('coin-promotion-details.update', $coinPromotionDetail->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row mb-20">
                    <div class="col-md-6">
                        <label for="price" class="form-label text-secondary-light mb-10">Price (in cents) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $coinPromotionDetail->price) }}" required>
                        <small class="text-muted">Enter the price in cents (e.g., 1000 for $10.00)</small>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="coins" class="form-label text-secondary-light mb-10">Coins <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('coins') is-invalid @enderror" id="coins" name="coins" value="{{ old('coins', $coinPromotionDetail->coins) }}" required>
                        @error('coins')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-20">
                    <div class="col-md-6">
                        <label for="free_coins" class="form-label text-secondary-light mb-10">Free Coins <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('free_coins') is-invalid @enderror" id="free_coins" name="free_coins" value="{{ old('free_coins', $coinPromotionDetail->free_coins) }}" required>
                        @error('free_coins')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="discount" class="form-label text-secondary-light mb-10">Discount (%) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount', $coinPromotionDetail->discount) }}" min="0" max="100" required>
                        @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-20">
                    <div class="col-md-12">
                        <label for="promotion_images" class="form-label text-secondary-light mb-10">Promotion Images</label>
                        <input type="text" class="form-control @error('promotion_images') is-invalid @enderror" id="promotion_images" name="promotion_images" value="{{ old('promotion_images', $coinPromotionDetail->promotion_images) }}">
                        <small class="form-text text-secondary">Enter image URLs separated by commas</small>
                        @error('promotion_images')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="d-flex justify-content-end gap-3 mt-30">
                    <a href="{{ route('coin-promotions.edit', $coinPromotionDetail->coin_promotion_id) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Detail</button>
                </div>
            </form>
        </div>
    </div>
@endsection