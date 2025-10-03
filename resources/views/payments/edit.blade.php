@extends('layout.layout')

@section('title', 'Edit Payment')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrap">
                    <div class="page-title">
                        <h1>Edit Payment</h1>
                    </div>
                    <div class="page-button">
                        <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                            <i class="ri-arrow-left-line me-2"></i>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('payments.update', $payment) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">ID</div>
                                <div class="col-md-8">{{ $payment->id }}</div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">Status</div>
                                <div class="col-md-8">
                                    @php
                                        $status = optional($payment->latest)->status;
                                        $statusClass = 'badge bg-info';
                                        
                                        if ($status == 'Approve') {
                                            $statusClass = 'badge bg-success';
                                        } elseif ($status == 'Pending') {
                                            $statusClass = 'badge bg-warning';
                                        } elseif ($status == 'Reject') {
                                            $statusClass = 'badge bg-danger';
                                        }
                                    @endphp
                                    <span class="{{ $statusClass }}">{{ $status ?? 'N/A' }}</span>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="reference_number" class="form-label">Reference Number</label>
                                <input type="text" name="reference_number" id="reference_number" class="form-control @error('reference_number') is-invalid @enderror" value="{{ $payment->reference_number }}">
                                @error('reference_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="paid_at" class="form-label">Paid At</label>
                                <input type="datetime-local" name="paid_at" id="paid_at" class="form-control @error('paid_at') is-invalid @enderror" value="{{ $payment->paid_at->format('Y-m-d\TH:i') }}">
                                @error('paid_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea name="remark" id="remark" class="form-control @error('remark') is-invalid @enderror" rows="4">{{ $payment->remark }}</textarea>
                                @error('remark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection