@extends('layout.layout')
@php
    $title = 'Employee Details';
    $subTitle = 'Employee Details';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <h5 class="card-title mb-0">Employee Details</h5>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="mdi:arrow-left" class="icon text-xl line-height-1"></iconify-icon>
            Back to List
        </a>
    </div>
    <div class="card-body p-24">
        <div class="row">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <div class="d-flex flex-column align-items-center">
                    @if($employee->profile_photo_path)
                        <img src="{{ asset('storage/' . $employee->profile_photo_path) }}" alt="{{ $employee->name }}" class="w-150-px h-150-px rounded-circle overflow-hidden mb-3">
                    @else
                        <img src="{{ asset('assets/images/user.png') }}" alt="{{ $employee->name }}" class="w-150-px h-150-px rounded-circle overflow-hidden mb-3">
                    @endif
                    <h5 class="mb-1">{{ $employee->name }}</h5>
                    <p class="text-muted mb-2">{{ $employee->designation ?? 'Employee' }}</p>
                    <div class="d-flex gap-2 justify-content-center mt-2">
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">
                            <iconify-icon icon="lucide:edit" class="me-1"></iconify-icon> Edit
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this employee?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <iconify-icon icon="fluent:delete-24-regular" class="me-1"></iconify-icon> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="border-bottom pb-2 mb-3">Personal Information</h6>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">ID</label>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-semibold">{{ $employee->id }}</span>
                            <button class="btn btn-sm btn-link copy-btn p-0" data-clipboard-text="{{ $employee->id }}" title="Copy ID">
                                <iconify-icon icon="lucide:clipboard-copy" class="icon text-md"></iconify-icon>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Full Name</label>
                        <p class="fw-semibold mb-0">{{ $employee->name }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Email</label>
                        <p class="fw-semibold mb-0">{{ $employee->email }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Department</label>
                        <p class="fw-semibold mb-0">{{ $employee->department ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Designation</label>
                        <p class="fw-semibold mb-0">{{ $employee->designation ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Join Date</label>
                        <p class="fw-semibold mb-0">{{ $employee->created_at ? $employee->created_at->format('d M Y') : 'N/A' }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-muted">Status</label>
                        @if($employee->email_verified_at)
                            <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Active</span>
                        @else
                            <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">Inactive</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="border-bottom pb-2 mb-3">Role Assignments</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="card p-3 mb-3">
                            <h6 class="mb-3">CS (Company ID: 1)</h6>
                            @php
                                $csRoles = $employee->roles->where('pivot.company_id', 1)->pluck('role')->unique();
                            @endphp
                            @if($csRoles->count() > 0)
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($csRoles as $role)
                                        <span class="badge bg-primary">{{ $role }}</span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0">No roles assigned</p>
                            @endif
                        </div>

                        <div class="card p-3 mb-3">
                            <h6 class="mb-3">PP (Company ID: 2)</h6>
                            @php
                                $ppRoles = $employee->roles->where('pivot.company_id', 2)->pluck('role')->unique();
                            @endphp
                            @if($ppRoles->count() > 0)
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($ppRoles as $role)
                                        <span class="badge bg-secondary">{{ $role }}</span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0">No roles assigned</p>
                            @endif
                        </div>

                        <div class="card p-3">
                            <h6 class="mb-3">OP (Company ID: 3)</h6>
                            @php
                                $opRoles = $employee->roles->where('pivot.company_id', 3)->pluck('role')->unique();
                            @endphp
                            @if($opRoles->count() > 0)
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($opRoles as $role)
                                        <span class="badge bg-info">{{ $role }}</span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0">No roles assigned</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Copy button functionality
        const copyButtons = document.querySelectorAll('.copy-btn');
        copyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const text = this.getAttribute('data-clipboard-text');
                navigator.clipboard.writeText(text).then(() => {
                    // Create and show tooltip
                    const tooltip = document.createElement('div');
                    tooltip.classList.add('tooltip');
                    tooltip.innerText = 'Employee ID copied';
                    tooltip.style.position = 'absolute';
                    tooltip.style.left = (this.offsetLeft + this.offsetWidth/2) + 'px';
                    tooltip.style.top = (this.offsetTop - 10) + 'px';
                    tooltip.style.backgroundColor = '#333';
                    tooltip.style.color = '#fff';
                    tooltip.style.padding = '5px 10px';
                    tooltip.style.borderRadius = '5px';
                    tooltip.style.zIndex = '1000';
                    tooltip.style.transform = 'translateX(-50%)';
                    document.body.appendChild(tooltip);
                    
                    // Remove tooltip after 1.5 seconds
                    setTimeout(() => {
                        tooltip.remove();
                    }, 1500);
                });
            });
        });
    });
</script>
@endsection