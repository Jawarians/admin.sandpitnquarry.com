@extends('layout.layout')
@php
    $title='Languages';
    $subTitle = 'Settings - Languages';
@endphp

@section('content')

            <div class="card h-100 p-0 radius-12">
                <div class="card-body p-24">
                    <div class="row gy-4">
                        <div class="col-xxl-6">
                            <div class="card radius-12 shadow-none border overflow-hidden">
                                <div class="card-header bg-neutral-100 border-bottom py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                                    <div class="d-flex align-items-center gap-10">
                                        <span class="w-36-px h-36-px bg-base rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/images/payment/payment-gateway1.png') }}" alt="" class="">
                                        </span>
                                        <span class="text-lg fw-semibold text-primary-light">Paypal</span>
                                    </div>
                                    <div class="form-switch switch-primary d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" role="switch" checked>
                                    </div>
                                </div>
                                <div class="card-body p-24">
                                    <div class="row gy-3">
                                        <div class="col-sm-6">
                                            <span class="form-label fw-semibold text-primary-light text-md mb-8">Environment <span class="text-danger-600">*</span></span>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="d-flex align-items-center gap-10 fw-medium text-lg">
                                                    <div class="form-check style-check d-flex align-items-center">
                                                        <input class="form-check-input radius-4 border border-neutral-500" type="checkbox" name="checkbox" id="sandbox" {{ $paypalConfig['mode'] === 'sandbox' ? 'checked' : '' }} disabled>
                                                    </div>
                                                    <label for="sandbox" class="form-label fw-medium text-lg text-primary-light mb-0">Sandbox</label>
                                                </div>
                                                <div class="d-flex align-items-center gap-10 fw-medium text-lg">
                                                    <div class="form-check style-check d-flex align-items-center">
                                                        <input class="form-check-input radius-4 border border-neutral-500" type="checkbox" name="checkbox" id="Production" {{ $paypalConfig['mode'] === 'live' ? 'checked' : '' }} disabled>
                                                    </div>
                                                    <label for="Production" class="form-label fw-medium text-lg text-primary-light mb-0">Production</label>
                                                </div>
                                            </div>
                                            <small class="text-muted">Current mode: <strong>{{ ucfirst($paypalConfig['mode']) }}</strong> - Configured via environment variables</small>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="currency" class="form-label fw-semibold text-primary-light text-md mb-8">Currency <span class="text-danger-600">*</span></label>
                                            <select class="form-control radius-8 form-select" id="currency" disabled>
                                                <option selected>{{ $paypalConfig['currency'] ?? 'USD' }}</option>
                                            </select>
                                            <small class="text-muted">Configured via environment variables</small>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="secretKey" class="form-label fw-semibold text-primary-light text-md mb-8">Client Secret <span class="text-danger-600">*</span></label>
                                            <input type="password" class="form-control radius-8" id="secretKey" placeholder="Client Secret" value="{{ $paypalConfig['mode'] === 'sandbox' ? '••••••••••••••••' : '••••••••••••••••' }}" readonly>
                                            <small class="text-muted">Configured via environment variables</small>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="publicKey" class="form-label fw-semibold text-primary-light text-md mb-8">Client ID<span class="text-danger-600">*</span></label>
                                            <input type="text" class="form-control radius-8" id="publicKey" placeholder="Client ID" value="{{ $paypalConfig['client_id'] ?? 'Not configured' }}" readonly>
                                            <small class="text-muted">Safe to display - configured via environment variables</small>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="logo" class="form-label fw-semibold text-primary-light text-md mb-8">Logo <span class="text-danger-600">*</span></label>
                                            <input type="file" class="form-control radius-8" id="logo">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="logo" class="form-label fw-semibold text-primary-light text-md mb-8"><span class="visibility-hidden">Save</span></label>
                                            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-8 radius-8 w-100 text-center">
                                                Save Change
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div class="card radius-12 shadow-none border overflow-hidden">
                                <div class="card-header bg-neutral-100 border-bottom py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                                    <div class="d-flex align-items-center gap-10">
                                        <span class="w-36-px h-36-px bg-base rounded-circle d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/images/payment/payment-gateway2.png') }}" alt="" class="">
                                        </span>
                                        <span class="text-lg fw-semibold text-primary-light">RazorPay</span>
                                    </div>
                                    <div class="form-switch switch-primary d-flex align-items-center justify-content-center">
                                        <input class="form-check-input" type="checkbox" role="switch" checked>
                                    </div>
                                </div>
                                <div class="card-body p-24">
                                    <div class="row gy-3">
                                        <div class="col-sm-6">
                                            <span class="form-label fw-semibold text-primary-light text-md mb-8">Environment <span class="text-danger-600">*</span></span>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="d-flex align-items-center gap-10 fw-medium text-lg">
                                                    <div class="form-check style-check d-flex align-items-center">
                                                        <input class="form-check-input radius-4 border border-neutral-500" type="checkbox" name="checkbox" id="sandbox2" {{ $razorpayConfig['mode'] === 'sandbox' ? 'checked' : '' }} disabled>
                                                    </div>
                                                    <label for="sandbox2" class="form-label fw-medium text-lg text-primary-light mb-0">Sandbox</label>
                                                </div>
                                                <div class="d-flex align-items-center gap-10 fw-medium text-lg">
                                                    <div class="form-check style-check d-flex align-items-center">
                                                        <input class="form-check-input radius-4 border border-neutral-500" type="checkbox" name="checkbox" id="Production2" {{ $razorpayConfig['mode'] === 'live' ? 'checked' : '' }} disabled>
                                                    </div>
                                                    <label for="Production2" class="form-label fw-medium text-lg text-primary-light mb-0">Production</label>
                                                </div>
                                            </div>
                                            <small class="text-muted">Current mode: <strong>{{ ucfirst($razorpayConfig['mode']) }}</strong> - Configured via environment variables</small>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="currencyTwo" class="form-label fw-semibold text-primary-light text-md mb-8">Currency <span class="text-danger-600">*</span></label>
                                            <select class="form-control radius-8 form-select" id="currencyTwo" disabled>
                                                <option selected>{{ $razorpayConfig['currency'] ?? 'USD' }}</option>
                                            </select>
                                            <small class="text-muted">Configured via environment variables</small>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="secretKeyTwo" class="form-label fw-semibold text-primary-light text-md mb-8">Key Secret <span class="text-danger-600">*</span></label>
                                            <input type="password" class="form-control radius-8" id="secretKeyTwo" placeholder="Key Secret" value="{{ $razorpayConfig['mode'] === 'sandbox' ? '••••••••••••••••' : '••••••••••••••••' }}" readonly>
                                            <small class="text-muted">Configured via environment variables</small>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="publicKeyTwo" class="form-label fw-semibold text-primary-light text-md mb-8">Key ID<span class="text-danger-600">*</span></label>
                                            <input type="text" class="form-control radius-8" id="publicKeyTwo" placeholder="Key ID" value="{{ $razorpayConfig['key_id'] ?? 'Not configured' }}" readonly>
                                            <small class="text-muted">Safe to display - configured via environment variables</small>
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="logoTwo" class="form-label fw-semibold text-primary-light text-md mb-8">Logo <span class="text-danger-600">*</span></label>
                                            <input type="file" class="form-control radius-8" id="logoTwo">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold text-primary-light text-md mb-8"><span class="visibility-hidden">Save</span></label>
                                            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-8 radius-8 w-100 text-center">
                                                Save Change
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
