@extends('layout.layout')
@extends('layout.layout')
@php
    $title='Product Details';
    $subTitle = 'Products Management';
@endphp
@section('content')

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex gap-2">
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-8 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="mdi:arrow-left" class="icon text-xl line-height-1"></iconify-icon>
                Back to List
            </a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary text-sm btn-sm px-12 py-8 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="lucide:edit" class="icon text-xl line-height-1"></iconify-icon>
                Edit
            </a>
        </div>
    </div>
    <div class="card-body p-24">
        <div class="row">
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
                <div class="table-responsive">
                    <table class="table bordered-table sm-table mb-24">
                        <tbody>
                            <tr>
                                <td class="px-16 py-12">Name</td>
                                <td class="px-16 py-12">{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td class="px-16 py-12">Nama</td>
                                <td class="px-16 py-12">{{ $product->nama }}</td>
                            </tr>
                            <tr>
                                <td class="px-16 py-12">Description</td>
                                <td class="px-16 py-12">{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td class="px-16 py-12">Category</td>
                                <td class="px-16 py-12">{{ optional($product->product_category)->name }}</td>
                            </tr>
                            <tr>
                                <td class="px-16 py-12">Status</td>
                                <td class="px-16 py-12">
                                    @if($product->active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-16 py-12">Created At</td>
                                <td class="px-16 py-12">{{ $product->created_at ? $product->created_at->format('d M Y H:i') : 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
