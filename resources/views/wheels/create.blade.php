@extends('layout.layout')

@section('title', 'Create Wheel')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrap">
                    <div class="page-title">
                        <h1>Create Wheel</h1>
                    </div>
                    <div class="page-button">
                        <a href="{{ route('wheels.index') }}" class="btn btn-secondary">
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
                        <form action="{{ route('wheels.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="wheel" class="form-label">Wheel Number</label>
                                <input type="number" name="wheel" id="wheel" class="form-control @error('wheel') is-invalid @enderror" value="{{ old('wheel') }}" required min="1">
                                @error('wheel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">This is the primary identifier and cannot be changed later.</small>
                            </div>
                            
                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" name="capacity" id="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', 0) }}" min="0" required>
                                @error('capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="load" id="load" {{ old('load') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="load">Load</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="tonne" id="tonne" {{ old('tonne') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tonne">Tonne</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="rgba" class="form-label">Color (RGBA)</label>
                                <input type="text" name="rgba" id="rgba" class="form-control @error('rgba') is-invalid @enderror" value="{{ old('rgba', 'rgba(0, 0, 0, 1)') }}">
                                @error('rgba')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-2">
                                    <label>Color Preview:</label>
                                    <div id="colorPreview" style="width: 50px; height: 30px; border: 1px solid #ccc; border-radius: 4px;"></div>
                                </div>
                            </div>
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Create Wheel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Update color preview when input changes
        function updateColorPreview() {
            var rgbaValue = $('#rgba').val();
            $('#colorPreview').css('background-color', rgbaValue);
        }
        
        // Initialize color preview
        updateColorPreview();
        
        // Update preview when input changes
        $('#rgba').on('input', updateColorPreview);
    });
</script>
@endpush