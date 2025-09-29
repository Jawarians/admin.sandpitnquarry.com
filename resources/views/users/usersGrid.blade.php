@extends('layout.layout')
@php
    $title='Users Grid';
    $subTitle = 'Users Grid';
    $script = '<script>
                        $(".delete-btn").on("click", function() {
                            $(this).closest(".user-grid-card").addClass("d-none")
                        });
                </script>';
@endphp

@section('content')

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
                        <form method="GET">
                            <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="per_page" onchange="this.form.submit()">
                                <option value="8" {{ request('per_page') == 8 ? 'selected' : '' }}>8</option>
                                <option value="12" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12</option>
                                <option value="16" {{ request('per_page') == 16 ? 'selected' : '' }}>16</option>
                                <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                                <option value="32" {{ request('per_page') == 32 ? 'selected' : '' }}>32</option>
                            </select>
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        </form>
                        <form class="navbar-search" method="GET">
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request('search') }}">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            <input type="hidden" name="per_page" value="{{ request('per_page', 12) }}">
                        </form>
                    </div>
                    <a  href="{{ route('viewProfile') }}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Add New User
                    </a>
                </div>
                <div class="card-body p-24">
                    <div class="row gy-4">
                        @forelse($users as $index => $user)
                        <div class="col-xxl-3 col-md-6 user-grid-card">
                            <div class="position-relative border radius-16 overflow-hidden">
                                @php
                                    $bgImages = [
                                        'assets/images/user-grid/user-grid-bg1.png',
                                        'assets/images/user-grid/user-grid-bg2.png',
                                        'assets/images/user-grid/user-grid-bg3.png',
                                        'assets/images/user-grid/user-grid-bg4.png',
                                        'assets/images/user-grid/user-grid-bg5.png',
                                        'assets/images/user-grid/user-grid-bg6.png',
                                        'assets/images/user-grid/user-grid-bg7.png',
                                        'assets/images/user-grid/user-grid-bg8.png',
                                        'assets/images/user-grid/user-grid-bg9.png',
                                        'assets/images/user-grid/user-grid-bg10.png',
                                        'assets/images/user-grid/user-grid-bg11.png',
                                        'assets/images/user-grid/user-grid-bg12.png',
                                    ];
                                    $bgImage = $bgImages[$index % count($bgImages)];
                                @endphp
                                <img src="{{ asset($bgImage) }}" alt="" class="w-100 object-fit-cover">

                                <div class="dropdown position-absolute top-0 end-0 me-16 mt-16">
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false" class="bg-white-gradient-light w-32-px h-32-px radius-8 border border-light-white d-flex justify-content-center align-items-center text-white">
                                        <iconify-icon icon="entypo:dots-three-vertical" class="icon "></iconify-icon>
                                    </button>
                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <li>
                                            <a class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10" href="{{ route('viewProfile', $user->id) }}">
                                                <iconify-icon icon="majesticons:eye-line" class="icon text-lg me-2"></iconify-icon>
                                                View
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10" href="{{ route('editUser', $user->id) }}">
                                                <iconify-icon icon="lucide:edit" class="icon text-lg me-2"></iconify-icon>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('deleteUser', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10 border-0 bg-transparent w-100 text-start">
                                                    <iconify-icon icon="fluent:delete-24-regular" class="icon text-lg me-2"></iconify-icon>
                                                    Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                                <div class="ps-16 pb-16 pe-16 text-center mt--50">
                                    <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('assets/images/user-grid/user-grid-img1.png') }}" alt="" class="border br-white border-width-2-px w-100-px h-100-px rounded-circle object-fit-cover">
                                    <h6 class="text-lg mb-0 mt-4">{{ $user->name }}</h6>
                                    <span class="text-secondary-light mb-16">{{ $user->email }}</span>

                                    <div class="center-border position-relative bg-danger-gradient-light radius-8 p-12 d-flex align-items-center gap-4">
                                        <div class="text-center w-50">
                                            <h6 class="text-md mb-0">{{ $user->department ?? 'N/A' }}</h6>
                                            <span class="text-secondary-light text-sm mb-0">Department</span>
                                        </div>
                                        <div class="text-center w-50">
                                            <h6 class="text-md mb-0">{{ $user->role ?? 'User' }}</h6>
                                            <span class="text-secondary-light text-sm mb-0">Role</span>
                                        </div>
                                    </div>
                                    <a  href="{{ route('viewProfile', $user->id) }}" class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                        View Profile
                                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon text-xl line-height-1"></iconify-icon>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <h5 class="text-secondary-light">No users found</h5>
                                <p class="text-secondary-light">Try adjusting your search criteria</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                        <span>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</span>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>

@endsection