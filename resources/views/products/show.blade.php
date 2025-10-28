@extends('layout.layout')
@section('content')
<div class="card p-24">
    <h4>Product Details</h4>
    <div class="row mb-4">
        <div class="col-md-4">
            @if($product->product_images && $product->product_images->isNotEmpty())
                <img src="{{ $product->product_images->first()->url }}" alt="{{ $product->name }}" class="img-fluid rounded mb-3" style="max-width: 300px; max-height: 300px; object-fit: contain;">
            @else
                <div class="bg-neutral-200 d-flex align-items-center justify-content-center" style="width: 300px; height: 300px;">
                    <iconify-icon icon="mdi:image-off" class="icon text-4xl text-neutral-500"></iconify-icon>
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <table class="table table-borderless">
                <tr>
                    <th>Name:</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Nama:</th>
                    <td>{{ $product->nama }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td>{{ optional($product->product_category)->name }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>
                        @if($product->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Created At:</th>
                    <td>{{ $product->created_at ? $product->created_at->format('d M Y H:i') : 'N/A' }}</td>
                </tr>
            </table>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success me-2">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
