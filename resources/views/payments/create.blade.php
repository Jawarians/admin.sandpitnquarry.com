@extends('layout.layout')

@section('title', 'Create Payment')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrap">
                    <div class="page-title">
                        <h1>Create Payment</h1>
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
                        <form action="{{ route('payments.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="reference_number" class="form-label">Reference Number</label>
                                <input type="text" name="reference_number" id="reference_number" class="form-control @error('reference_number') is-invalid @enderror" value="{{ old('reference_number') }}" required>
                                @error('reference_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="paid_at" class="form-label">Paid At</label>
                                <input type="datetime-local" name="paid_at" id="paid_at" class="form-control @error('paid_at') is-invalid @enderror" value="{{ old('paid_at', now()->format('Y-m-d\TH:i')) }}" required>
                                @error('paid_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea name="remark" id="remark" class="form-control @error('remark') is-invalid @enderror" rows="4" required>{{ old('remark') }}</textarea>
                                @error('remark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Create Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection