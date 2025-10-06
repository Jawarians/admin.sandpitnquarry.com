@extends('layout.layout')
@php
    $title='Transporters Grid';
    $subTitle = 'Transporters Grid';
@endphp

@section('content')
            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <form class="navbar-search" method="GET">
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request('search') }}">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            <input type="hidden" name="per_page" value="{{ request('per_page', 12) }}">
                        </form>
                        <form method="GET">
                            <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="per_page" onchange="this.form.submit()">
                                <option value="6" {{ request('per_page') == 6 ? 'selected' : '' }}>6</option>
                                <option value="12" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12</option>
                                <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                                <option value="48" {{ request('per_page') == 48 ? 'selected' : '' }}>48</option>
                            </select>
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('transportersList') }}" class="btn btn-outline-secondary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                            <iconify-icon icon="mdi:format-list-bulleted" class="icon text-xl line-height-1"></iconify-icon>
                            List View
                        </a>
                    </div>
                </div>
                <div class="card-body p-24">
                    <div class="row row-gap-24">
                        @forelse($transporters as $transporter)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card radius-8">
                                    <div class="card-body p-24">
                                        <div class="d-flex justify-content-between align-items-center mb-16">
                                            <div class="d-flex gap-8 align-items-center">
                                                <div class="icon-box size-40-px radius-8 d-flex align-items-center justify-content-center bg-primary-main">
                                                    <iconify-icon icon="mdi:truck-delivery" class="icon text-white text-xl"></iconify-icon>
                                                </div>
                                                <div>
                                                    <span class="d-block text-secondary-light fw-medium text-md">ID: {{ $transporter->id }}</span>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <iconify-icon icon="heroicons:ellipsis-horizontal" class="text-xl"></iconify-icon>
                                                </button>
                                                <ul class="dropdown-menu border-0 shadow-sm radius-8 py-8">
                                                    <li><a class="dropdown-item px-20 py-10 text-secondary-light" href="{{ route('viewTransporter', $transporter->id) }}"><iconify-icon icon="mdi:eye-outline" class="me-8"></iconify-icon> View</a></li>
                                                    <li><a class="dropdown-item px-20 py-10 text-secondary-light" href="{{ route('editTransporter', $transporter->id) }}"><iconify-icon icon="mdi:pencil-outline" class="me-8"></iconify-icon> Edit</a></li>
                                                    <li>
                                                        <form action="{{ route('deleteTransporter', $transporter->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item px-20 py-10 text-danger" onclick="return confirm('Are you sure you want to delete this transporter?')"><iconify-icon icon="mdi:delete-outline" class="me-8"></iconify-icon> Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h6 class="fw-medium text-secondary-light mb-2">{{ $transporter->name }}</h6>
                                        <div class="mb-12 mt-16">
                                            <span class="d-block text-sm text-secondary-light mb-4">Registration Number:</span>
                                            <h6 class="fw-medium">{{ $transporter->registration_number }}</h6>
                                        </div>
                                        <div class="mb-12">
                                            <span class="d-block text-sm text-secondary-light mb-4">Type:</span>
                                            <h6 class="fw-medium">{{ $transporter->type }}</h6>
                                        </div>
                                        <div class="mb-12">
                                            <span class="d-block text-sm text-secondary-light mb-4">Owner:</span>
                                            <h6 class="fw-medium">{{ $transporter->owner->name ?? 'N/A' }}</h6>
                                        </div>
                                        <div class="mb-12">
                                            <span class="d-block text-sm text-secondary-light mb-4">Joined:</span>
                                            <h6 class="fw-medium">{{ $transporter->created_at->format('d M Y') }}</h6>
                                        </div>
                                        <div class="mt-16">
                                            <a href="{{ route('viewTransporter', $transporter->id) }}" class="btn btn-primary btn-sm w-100">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <h5>No transporters found</h5>
                                    <a href="{{ route('addTransporter') }}" class="btn btn-primary mt-3">Add New Transporter</a>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    
                    <div class="mt-24">
                        {{ $transporters->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
@endsection