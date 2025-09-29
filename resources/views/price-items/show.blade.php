@extends('layout.layout')
@php
    $title='Price Item Details';
    $subTitle = 'Price Item Management';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <h4 class="mb-0">Price Item #{{ $priceItem->id }}</h4>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('price.items.index') }}" class="btn btn-sm btn-outline-primary">Back to Price Items</a>
            <a href="{{ route('price.items.edit', $priceItem->id) }}" class="btn btn-sm btn-primary">
                <iconify-icon icon="mdi:pencil"></iconify-icon> Edit
            </a>
        </div>
    </div>

    <div class="card-body p-24">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Price Item Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">ID</th>
                                <td>{{ $priceItem->id }}</td>
                            </tr>
                            <tr>
                                <th>Price ID</th>
                                <td>{{ $priceItem->price_id }}</td>
                            </tr>
                            <tr>
                                <th>Product</th>
                                <td>{{ $priceItem->product->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td>{{ $priceItem->amount / 100 }}</td>
                            </tr>
                            <tr>
                                <th>Wheel Size</th>
                                <td>{{ $priceItem->wheel_id }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Related Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">Type</th>
                                <td>{{ $priceItem->price_itemable_type }}</td>
                            </tr>
                            <tr>
                                <th>Item ID</th>
                                <td>{{ $priceItem->price_itemable_id }}</td>
                            </tr>
                            <tr>
                                <th>Creator ID</th>
                                <td>{{ $priceItem->creator_id }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $priceItem->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $priceItem->updated_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection