@extends('layout.layout')
@php
$title = 'Permissions';
$subTitle = 'Permissions Matrix';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <h5 class="mb-0 fw-bold">Permissions</h5>
    </div>
    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Permission</th>
                        @foreach($roles as $role)
                            <th>{{ $role->role }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->model }}</td>
                            <td>{{ $permission->permission }}</td>
                            @foreach($roles as $role)
                                <td class="text-center">
                                    <input type="checkbox"
                                        class="form-check-input radius-4 border border-neutral-400 permission-checkbox"
                                        {{ DB::table('role_permissions')->where('permission', $permission->permission)->where('role', $role->role)->exists() ? 'checked' : '' }}
                                        data-permission="{{ $permission->permission }}"
                                        data-role="{{ $role->role }}"
                                    >
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.permission-checkbox').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const permission = this.getAttribute('data-permission');
            const role = this.getAttribute('data-role');
            const checked = this.checked;
            fetch("{{ route('permissions.assign') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                },
                body: JSON.stringify({ permission, role, assign: checked })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert(data.message || 'Failed to update permission.');
                    this.checked = !checked;
                }
            })
            .catch(() => {
                alert('Failed to update permission.');
                this.checked = !checked;
            });
        });
    });
});
</script>
@endpush
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
