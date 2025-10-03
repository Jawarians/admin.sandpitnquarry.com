@extends('layout.layout')
@php
    $title='Create Coin Promotion';
    $subTitle = 'Create a new coin promotion';
@endphp

@section('content')
    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24">
            <h5 class="mb-0 text-lg fw-medium">Create Coin Promotion</h5>
        </div>
        <div class="card-body p-24">
            @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('coin-promotions.store') }}" method="POST">
                @csrf
                
                <div class="row mb-20">
                    <div class="col-md-6">
                        <label for="start_at" class="form-label text-secondary-light mb-10">Start Date <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control @error('start_at') is-invalid @enderror" id="start_at" name="start_at" value="{{ old('start_at') }}">
                        @error('start_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="d-flex justify-content-end gap-3 mt-30">
                    <a href="{{ route('coin-promotions.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Promotion</button>
                </div>
            </form>
        </div>
    </div>
@endsection