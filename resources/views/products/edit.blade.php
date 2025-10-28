@extends('layout.layout')
@section('content')
    <div class="card p-24">
        <h4>Update Product</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-8">
                <label class="d-block mb-4">Name</label>
                <input name="name" placeholder="Name" required class="form-control" value="{{ old('name', $product->name) }}">
            </div>
            <div class="mb-8">
                <label class="d-block mb-4">Nama</label>
                <input name="nama" placeholder="Nama" class="form-control" value="{{ old('nama', $product->nama) }}">
            </div>
            <div class="mb-8">
                <label class="d-block mb-4">Description</label>
                <textarea name="description" placeholder="Description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="mb-8">
                <label class="me-8"><input type="checkbox" name="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}> Active</label>
            </div>
            <div class="mb-8">
                <label class="d-block mb-4">Category</label>
                <select name="product_category_id" class="form-control">
                    <option value="">-- None --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('product_category_id', $product->product_category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-8">
                <label class="d-block mb-4">Product Image</label>
                <div class="image-upload-container mb-3">
                    @php
                        $hasPreview = $product->product_images && $product->product_images->isNotEmpty();
                    @endphp
                    <div class="preview-container mb-3" id="imagePreview" @if(!$hasPreview) style="display: none;" @endif>
                        @if($product->product_images && $product->product_images->isNotEmpty())
                            <img id="preview" src="{{ $product->product_images->first()->url }}" alt="Image Preview" style="max-width: 200px; max-height: 200px; object-fit: contain;">
                        @else
                            <img id="preview" src="" alt="Image Preview" style="max-width: 200px; max-height: 200px; object-fit: contain;">
                        @endif
                        <button type="button" class="btn btn-sm btn-danger mt-2" id="removeImage">Remove Image</button>
                    </div>
                    <div class="upload-btn-wrapper">
                        <input type="file" name="product_image" id="productImageInput" class="form-control" accept="image/*">
                        <div class="form-text text-muted">Upload a product image (JPG, PNG, GIF up to 2MB)</div>
                    </div>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="featured" id="featuredImage" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="featuredImage">
                        Set as featured image
                    </label>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('productImageInput');
            const imagePreview = document.getElementById('imagePreview');
            const preview = document.getElementById('preview');
            const removeButton = document.getElementById('removeImage');

            // Handle file selection
            imageInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    // Check file size (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Image size exceeds 2MB. Please select a smaller image.');
                        this.value = '';
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Remove image button
            removeButton.addEventListener('click', function() {
                imageInput.value = '';
                preview.src = '';
                imagePreview.style.display = 'none';
            });
        });
    </script>
@endsection
