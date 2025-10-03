@extends('layout.layout')
@php
    $title='Reload Details';
    $subTitle = 'Reload Details';
@endphp

@section('content')

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <h5 class="text-lg mb-0 fw-semibold text-secondary-light">Reload Details</h5>
                    <a href="{{ route('reloads.index') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="mdi:arrow-left" class="icon text-xl line-height-1"></iconify-icon>
                        Back to List
                    </a>
                </div>
                <div class="card-body p-24">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">ID</h6>
                                <p>{{ $reload->id }}</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Billplz ID</h6>
                                <p>{{ $reload->billplz_id }}</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Customer Name</h6>
                                <p>{{ $reload->name }}</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Email</h6>
                                <p>{{ $reload->email }}</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Phone</h6>
                                <p>{{ $reload->phone ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Amount</h6>
                                <p>RM {{ number_format($reload->amount / 100, 2) }}</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Paid Amount</h6>
                                <p>RM {{ number_format($reload->paid_amount / 100, 2) }}</p>
                            </div>
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Coins</h6>
                                <p>{{ number_format($reload->coins) }} <small>(+{{ number_format($reload->free_coins) }} free)</small></p>
                            </div>
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Status</h6>
                                <p>
                                    @if($reload->paid)
                                        <span class="badge bg-success-main py-4 px-10 text-sm fw-medium text-white">Paid</span>
                                    @else
                                        <span class="badge bg-danger-main py-4 px-10 text-sm fw-medium text-white">Unpaid</span>
                                    @endif
                                </p>
                            </div>
                            <div class="mb-4">
                                <h6 class="text-md fw-medium text-secondary-light">Paid At</h6>
                                <p>{{ $reload->paid_at ? date('d M Y H:i:s', strtotime($reload->paid_at)) : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5 class="text-lg mb-3 fw-semibold text-secondary-light">Additional Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h6 class="text-md fw-medium text-secondary-light">Collection ID</h6>
                                    <p>{{ $reload->collection_id }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="text-md fw-medium text-secondary-light">State</h6>
                                    <p>{{ $reload->state }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="text-md fw-medium text-secondary-light">Due At</h6>
                                    <p>{{ date('d M Y H:i:s', strtotime($reload->due_at)) }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h6 class="text-md fw-medium text-secondary-light">Slip ID</h6>
                                    <p>{{ $reload->slip_id ?? 'N/A' }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="text-md fw-medium text-secondary-light">Slip Status</h6>
                                    <p>{{ $reload->slip_status ?? 'N/A' }}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="text-md fw-medium text-secondary-light">Created At</h6>
                                    <p>{{ date('d M Y H:i:s', strtotime($reload->created_at)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($reload->url)
                    <div class="mt-4">
                        <h5 class="text-lg mb-3 fw-semibold text-secondary-light">Payment URL</h5>
                        <div class="bg-neutral-100 p-3 radius-8">
                            <a href="{{ $reload->url }}" target="_blank" class="text-primary-600">{{ $reload->url }}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

@endsection