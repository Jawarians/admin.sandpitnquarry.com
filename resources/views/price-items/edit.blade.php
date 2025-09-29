@extends('layout.layout')
@php
    $title='Edit Price Item';
    $subTitle = 'Price Item Management';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <h4 class="mb-0">Edit Price Item #{{ $priceItem->id }}</h4>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('price.items.index') }}" class="btn btn-sm btn-outline-primary">Back to Price Items</a>
        </div>
    </div>

    <div class="card-body p-24">
        <form action="{{ route('price.items.update', $priceItem->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price_id" class="form-label">Price</label>
                        <select class="form-select @error('price_id') is-invalid @enderror" id="price_id" name="price_id" required>
                            <option value="">Select Price</option>
                            @foreach($prices as $price)
                                <option value="{{ $price->id }}" {{ old('price_id', $priceItem->price_id) == $price->id ? 'selected' : '' }}>
                                    Price #{{ $price->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('price_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id', $priceItem->product_id) == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $priceItem->amount / 100) }}" step="0.01" min="0" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price_itemable_type" class="form-label">Type</label>
                        <select class="form-select @error('price_itemable_type') is-invalid @enderror" id="price_itemable_type" name="price_itemable_type" required>
                            <option value="site" {{ old('price_itemable_type', $priceItem->price_itemable_type) == 'site' ? 'selected' : '' }}>Site</option>
                            <option value="zone" {{ old('price_itemable_type', $priceItem->price_itemable_type) == 'zone' ? 'selected' : '' }}>Zone</option>
                        </select>
                        @error('price_itemable_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="price_itemable_id" class="form-label">Item ID</label>
                        <input type="number" class="form-control @error('price_itemable_id') is-invalid @enderror" id="price_itemable_id" name="price_itemable_id" value="{{ old('price_itemable_id', $priceItem->price_itemable_id) }}" required>
                        @error('price_itemable_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="wheel_id" class="form-label">Wheel Size</label>
                        <input type="number" class="form-control @error('wheel_id') is-invalid @enderror" id="wheel_id" name="wheel_id" value="{{ old('wheel_id', $priceItem->wheel_id) }}" required>
                        @error('wheel_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Price Item</button>
                <a href="{{ route('price.items.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection