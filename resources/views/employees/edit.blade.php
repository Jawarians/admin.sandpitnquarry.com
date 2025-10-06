@extends('layout.layout')
@php
    $title = 'Edit Employee';
    $subTitle = 'Edit Employee';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <h5 class="card-title mb-0">Edit Employee</h5>
        <div>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="mdi:arrow-left" class="icon text-xl line-height-1"></iconify-icon>
                Back to List
            </a>
        </div>
    </div>
    <div class="card-body p-24">
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-12">
                    <h6 class="border-bottom pb-2 mb-3">Personal Information</h6>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $employee->department) }}">
                    @error('department')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $employee->designation) }}">
                    @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="profile_photo" class="form-label">Profile Photo</label>
                    <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" id="profile_photo" name="profile_photo">
                    @error('profile_photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    @if($employee->profile_photo_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $employee->profile_photo_path) }}" alt="Current photo" class="w-50-px h-50-px rounded-circle">
                            <small class="text-muted ms-2">Current photo</small>
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="active" name="active" value="1" {{ $employee->email_verified_at ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">
                            Active employee
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12">
                    <h6 class="border-bottom pb-2 mb-3">Role Assignments</h6>
                    <p class="text-muted small mb-4">Assign roles to this employee for different companies</p>
                </div>
                
                @php
                    $csRoles = $employee->roles->where('pivot.company_id', 1)->pluck('role')->toArray();
                    $ppRoles = $employee->roles->where('pivot.company_id', 2)->pluck('role')->toArray();
                    $opRoles = $employee->roles->where('pivot.company_id', 3)->pluck('role')->toArray();
                @endphp
                
                <!-- CS Roles (Company ID: 1) -->
                <div class="col-md-12 mb-4">
                    <div class="card p-3">
                        <h6 class="mb-3">CS (Company ID: 1)</h6>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[1][]" value="admin" id="cs_admin" {{ in_array('admin', $csRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cs_admin">Admin</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[1][]" value="manager" id="cs_manager" {{ in_array('manager', $csRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cs_manager">Manager</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[1][]" value="staff" id="cs_staff" {{ in_array('staff', $csRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cs_staff">Staff</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- PP Roles (Company ID: 2) -->
                <div class="col-md-12 mb-4">
                    <div class="card p-3">
                        <h6 class="mb-3">PP (Company ID: 2)</h6>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[2][]" value="admin" id="pp_admin" {{ in_array('admin', $ppRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pp_admin">Admin</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[2][]" value="manager" id="pp_manager" {{ in_array('manager', $ppRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pp_manager">Manager</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[2][]" value="staff" id="pp_staff" {{ in_array('staff', $ppRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pp_staff">Staff</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- OP Roles (Company ID: 3) -->
                <div class="col-md-12 mb-4">
                    <div class="card p-3">
                        <h6 class="mb-3">OP (Company ID: 3)</h6>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[3][]" value="admin" id="op_admin" {{ in_array('admin', $opRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="op_admin">Admin</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[3][]" value="manager" id="op_manager" {{ in_array('manager', $opRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="op_manager">Manager</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[3][]" value="staff" id="op_staff" {{ in_array('staff', $opRoles) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="op_staff">Staff</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('employees.index') }}" class="btn btn-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </div>
        </form>
    </div>
</div>
@endsection