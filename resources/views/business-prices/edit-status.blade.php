@extends('layout.layout')
@section('content')
<div class="card">
    <div class="card-header">Update Status for Business Price #{{ $businessPrice->id }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('business-prices.update-status', $businessPrice->id) }}">
            @csrf
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $businessPrice->latest->status ?? '' }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update Status</button>
            <a href="{{ route('business-prices.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
