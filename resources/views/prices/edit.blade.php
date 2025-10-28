@extends('layout.layout')

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <h4 class="mb-0">Edit Price</h4>
    </div>
    <div class="card-body p-24">
        <form method="POST" action="{{ route('prices.update', $price->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $price->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="published_at" class="form-label">Published At</label>
                <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $price->published_at ? $price->published_at->format('Y-m-d\TH:i') : '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Price</button>
            <a href="{{ route('prices') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
