@extends('layout.layout')

@section('title', 'Edit Account')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrap">
                    <div class="page-title">
                        <h1>Edit Account</h1>
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
                        <form action="{{ route('accounts.update', $account) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-4 fw-bold">Customer</div>
                                <div class="col-md-8">{{ optional($account->user)->name ?? 'N/A' }}</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="code" class="form-label">Account Code</label>
                                <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ optional($account->latest)->code }}">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="term" class="form-label">Term (Days)</label>
                                    <input type="number" name="term" id="term" class="form-control @error('term') is-invalid @enderror" value="{{ optional(optional($account->latest)->latest)->term ?? 0 }}" min="0">
                                    @error('term')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="limit" class="form-label">Credit Limit (RM)</label>
                                    <input type="number" name="limit" id="limit" class="form-control @error('limit') is-invalid @enderror" value="{{ optional(optional($account->latest)->latest)->limit ?? 0 }}" min="0" step="0.01">
                                    @error('limit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="Pending" {{ optional($account->latest)->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Approve" {{ optional($account->latest)->status == 'Approve' ? 'selected' : '' }}>Approve</option>
                                    <option value="Reject" {{ optional($account->latest)->status == 'Reject' ? 'selected' : '' }}>Reject</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="remark" class="form-label">Remarks</label>
                                <textarea name="remark" id="remark" class="form-control @error('remark') is-invalid @enderror" rows="3">{{ optional($account->latest)->remark }}</textarea>
                                @error('remark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update Account</button>
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