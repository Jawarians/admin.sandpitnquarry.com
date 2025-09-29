@extends('layout.layout')
@php
    $title = 'Order Details';
    $subTitle = 'Order #' . str_pad($order->id, 4, '0', STR_PAD_LEFT);
@endphp

@section('content')
<div class="row gy-4">
    <!-- Order Information Card -->
    <div class="col-lg-8">
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('ordersList') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="ep:back" class="icon text-xl line-height-1"></iconify-icon>
                        Back to Orders
                    </a>
                    <h5 class="card-title mb-0">Order Details</h5>
                </div>
                <div class="d-flex align-items-center gap-2">
                    @if($order->orderStatus)
                        <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">{{ $order->orderStatus->name }}</span>
                    @else
                        <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">Unknown Status</span>
                    @endif
                </div>
            </div>
            <div class="card-body p-24">
                <div class="row gy-4">
                    <!-- Basic Order Information -->
                    <div class="col-12">
                        <div class="bg-neutral-50 p-20 radius-8">
                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Order ID:</span>
                                        <span class="text-md text-secondary-light">#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Order Number:</span>
                                        <span class="text-md text-secondary-light">{{ $order->order_number ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Order Date:</span>
                                        <span class="text-md text-secondary-light">{{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Total Amount:</span>
                                        <span class="text-md fw-bold text-success-600">${{ number_format($order->total_amount ?? 0, 2) }}</span>
                                    </div>
                                </div>
                                @if($order->delivery_date)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Delivery Date:</span>
                                        <span class="text-md text-secondary-light">{{ \Carbon\Carbon::parse($order->delivery_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                                @endif
                                @if($order->delivery_time)
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="w-100-px text-md fw-medium text-primary-light">Delivery Time:</span>
                                        <span class="text-md text-secondary-light">{{ $order->delivery_time }}</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Order Notes -->
                    @if($order->notes)
                    <div class="col-12">
                        <h6 class="text-xl mb-16">Order Notes</h6>
                        <div class="bg-warning-50 border border-warning-200 p-16 radius-8">
                            <p class="text-secondary-light mb-0">{{ $order->notes }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Order Items -->
                    @if($order->orderDetails && $order->orderDetails->count() > 0)
                    <div class="col-12">
                        <h6 class="text-xl mb-16">Order Items</h6>
                        <div class="table-responsive">
                            <table class="table bordered-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderDetails as $detail)
                                    <tr>
                                        <td>{{ $detail->item_name ?? 'N/A' }}</td>
                                        <td>{{ $detail->quantity ?? 0 }}</td>
                                        <td>${{ number_format($detail->unit_price ?? 0, 2) }}</td>
                                        <td>${{ number_format(($detail->quantity ?? 0) * ($detail->unit_price ?? 0), 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Customer & Delivery Information -->
    <div class="col-lg-4">
        <div class="row gy-4">
            <!-- Customer Information -->
            @if($order->customer)
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Customer Information</h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="d-flex align-items-center gap-3 mb-16">
                            <div class="w-44-px h-44-px bg-primary-50 rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                <iconify-icon icon="flowbite:user-solid" class="text-primary-600 text-xl"></iconify-icon>
                            </div>
                            <div>
                                <h6 class="text-md mb-0">{{ $order->customer->name }}</h6>
                                <span class="text-sm text-secondary-light">Customer</span>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            @if($order->customer->email)
                            <li class="list-group-item px-0 py-8 border-0">
                                <div class="d-flex align-items-center gap-2">
                                    <iconify-icon icon="mdi:email" class="text-primary-600"></iconify-icon>
                                    <span class="text-secondary-light text-sm">{{ $order->customer->email }}</span>
                                </div>
                            </li>
                            @endif
                            @if($order->customer->phone)
                            <li class="list-group-item px-0 py-8 border-0">
                                <div class="d-flex align-items-center gap-2">
                                    <iconify-icon icon="mdi:phone" class="text-primary-600"></iconify-icon>
                                    <span class="text-secondary-light text-sm">{{ $order->customer->phone }}</span>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- Delivery Information -->
            @if($order->delivery_address || $order->delivery_notes)
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Delivery Information</h6>
                    </div>
                    <div class="card-body p-24">
                        @if($order->delivery_address)
                        <div class="mb-16">
                            <div class="d-flex align-items-start gap-2 mb-8">
                                <iconify-icon icon="mdi:map-marker" class="text-primary-600 mt-4"></iconify-icon>
                                <div>
                                    <span class="text-sm fw-medium text-secondary-light d-block">Delivery Address</span>
                                    <span class="text-sm text-secondary-light">{{ $order->delivery_address }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($order->delivery_notes)
                        <div class="mb-16">
                            <div class="d-flex align-items-start gap-2">
                                <iconify-icon icon="mdi:note-text" class="text-primary-600 mt-4"></iconify-icon>
                                <div>
                                    <span class="text-sm fw-medium text-secondary-light d-block">Delivery Notes</span>
                                    <span class="text-sm text-secondary-light">{{ $order->delivery_notes }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <!-- Order Summary -->
            <div class="col-12">
                <div class="card h-100 p-0 radius-12">
                    <div class="card-header border-bottom bg-base py-16 px-24">
                        <h6 class="text-lg mb-0">Order Summary</h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Subtotal:</span>
                            <span class="fw-medium">${{ number_format($order->subtotal ?? $order->total_amount ?? 0, 2) }}</span>
                        </div>
                        @if($order->tax_amount)
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Tax:</span>
                            <span class="fw-medium">${{ number_format($order->tax_amount, 2) }}</span>
                        </div>
                        @endif
                        @php
                            $transportationAmount = $order->order_amounts->where('order_amountable_type', 'transportation')->sum('amount') ?? null;
                        @endphp
                        @if($transportationAmount)
                        <div class="d-flex justify-content-between align-items-center mb-12">
                            <span class="text-secondary-light">Delivery Fee:</span>
                            <span class="fw-medium">${{ number_format($transportationAmount, 2) }}</span>
                        </div>
                        @endif
                        <hr class="my-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-lg fw-bold">Total:</span>
                            <span class="text-lg fw-bold text-success-600">${{ number_format($order->total_amount ?? 0, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection