@extends('layout.layout')

@section('title', 'Create Account')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrap">
                    <div class="page-title">
                        <h1>Create Account</h1>
                    </div>
                    <div class="page-button">
                        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">
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
                        <form action="{{ route('accounts.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="user_id" class="form-label">Customer</label>
                                <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
                                    <option value="">Select Customer</option>
                                    <!-- You'll need to populate this with users -->
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="code" class="form-label">Account Code</label>
                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="term" class="form-label">Term (Days)</label>
                                    <input type="number" name="term" id="term" class="form-control @error('term') is-invalid @enderror" value="0" min="0">
                                    @error('term')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="limit" class="form-label">Credit Limit (RM)</label>
                                    <input type="number" name="limit" id="limit" class="form-control @error('limit') is-invalid @enderror" value="0" min="0" step="0.01">
                                    @error('limit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="Pending">Pending</option>
                                    <option value="Approve">Approve</option>
                                    <option value="Reject">Reject</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="remark" class="form-label">Remarks</label>
                                <textarea name="remark" id="remark" class="form-control @error('remark') is-invalid @enderror" rows="3"></textarea>
                                @error('remark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // You can add any required JavaScript for the form here
</script>
@endpush
@endsection