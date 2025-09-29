@extends('layout.layout')
@section('content')
    <div class="card p-24">
        <h4>Create Product</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('products.store') }}">@csrf
            <div class="mb-8">
                <label class="d-block mb-4">Name</label>
                <input name="name" placeholder="Name" required class="form-control">
            </div>
            <div class="mb-8">
                <label class="d-block mb-4">Nama</label>
                <input name="nama" placeholder="Nama" class="form-control">
            </div>
            <div class="mb-8">
                <label class="d-block mb-4">Description</label>
                <textarea name="description" placeholder="Description" class="form-control"></textarea>
            </div>
            <div class="mb-8">
                <label class="me-8"><input type="checkbox" name="active" value="1"> Active</label>
            </div>
            <div class="mb-8">
                <label class="d-block mb-4">Category</label>
                <select name="product_category_id" class="form-control">
                    <option value="">-- None --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>
        </form>
    </div>
@endsection
