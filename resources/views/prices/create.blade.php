@extends('layout.layout')

@section('content')
<div class="container">
    <h3>Create Price</h3>

    <form method="POST" action="{{ route('prices.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Published at</label>
            <input name="published_at" type="datetime-local" class="form-control" value="{{ old('published_at') }}">
        </div>

        <button class="btn btn-primary">Create</button>
        <a href="{{ route('prices') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
