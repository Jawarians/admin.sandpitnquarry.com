@extends('layout.layout')
@php
$title='Zones List';
$subTitle = 'Zone Management';
$script ='<script>
    $(".remove-item-btn").on("click", function() {
        $(this).closest("tr").addClass("d-none")
    });
</script>';
@endphp

@section('content')
<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
            <form method="GET" id="per-page-form">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="per_page" onchange="document.getElementById('per-page-form').submit()">
                    <option value="5" {{ request('per_page') === '5' ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page') === '10' || request('per_page') === null || request('per_page') === '' ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page') === '25' ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') === '50' ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page') === '100' ? 'selected' : '' }}>100</option>
                </select>
                @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
            </form>
            <form class="navbar-search" method="GET" id="search-form">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search zones..." value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon" onclick="document.getElementById('search-form').submit()"></iconify-icon>
                @if(request('per_page'))
                <input type="hidden" name="per_page" value="{{ request('per_page') }}">
                @endif
                <button type="submit" class="d-none"></button>
            </form>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="#" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="mdi:map" class="icon text-xl line-height-1"></iconify-icon>
                View Map
            </a>
        </div>
    </div>

    <div class="card-body p-24">
        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0 table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border input-form-dark" type="checkbox" name="checkbox" id="selectAll">
                                </div>
                                ID
                            </div>
                        </th>
                        <th scope="col">Name</th>
                        <th scope="col">State</th>
                        <th scope="col">Postcode</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($zones as $index => $zone)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $zone->id }}">
                                </div>
                                {{ $zone->id }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-medium text-secondary-light">{{ $zone->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $zone->state ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if(isset($zonePostcodes[$zone->id]) && count($zonePostcodes[$zone->id]) > 0)
                                <span class="badge bg-light text-dark me-1">{{ implode(', ', $zonePostcodes[$zone->id]) }}</span>
                                @endif
                                <a href="#" class="btn btn-xs btn-outline-success" title="Add Postcode" data-bs-toggle="modal" data-bs-target="#addPostcodeModal" data-zone-id="{{ $zone->id }}" data-zone-name="{{ $zone->name }}">
                                    <iconify-icon icon="mdi:plus-circle-outline" class="text-success"></iconify-icon>
                                    Add postcode
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No zones available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
            <span>
                Showing {{ $zones->firstItem() }} to {{ $zones->lastItem() }} of {{ $zones->total() }} entries
            </span>

            @if ($zones->hasPages())
            <nav aria-label="Zone pagination">
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($zones->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="{{ $zones->previousPageUrl() }}{{ request('per_page') ? '&per_page='.request('per_page') : '' }}{{ request('search') ? '&search='.urlencode(request('search')) : '' }}">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements with Ellipsis --}}
                    @php
                    $total = $zones->lastPage();
                    $current = $zones->currentPage();
                    $delta = 2;
                    $pages = [];
                    for ($i = 1; $i <= $total; $i++) {
                        if ($i==1 || $i==$total || ($i>= $current - $delta && $i <= $current + $delta)) {
                            $pages[]=$i;
                            }
                            }
                            $displayPages=[];
                            $prev=0;
                            foreach ($pages as $page) {
                            if ($prev && $page - $prev> 1) {
                            $displayPages[] = '...';
                            }
                            $displayPages[] = $page;
                            $prev = $page;
                            }
                            @endphp

                            {{-- Pagination Elements with Ellipsis --}}
                            @foreach ($displayPages as $page)
                            @if ($page === '...')
                            <li class="page-item disabled">
                                <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">...</span>
                            </li>
                            @elseif ($page == $zones->currentPage())
                            <li class="page-item active">
                                <span class="page-link text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600">{{ $page }}</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $zones->url($page) }}{{ request('per_page') ? '&per_page='.request('per_page') : '' }}{{ request('search') ? '&search='.urlencode(request('search')) : '' }}">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($zones->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $zones->nextPageUrl() }}{{ request('per_page') ? '&per_page='.request('per_page') : '' }}{{ request('search') ? '&search='.urlencode(request('search')) : '' }}">
                                    <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                                </a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                    <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                                </span>
                            </li>
                            @endif
                </ul>
            </nav>
            @endif
        </div>
    </div>
</div>



<!-- Add Postcode Modal -->
<div class="modal fade" id="addPostcodeModal" tabindex="-1" aria-labelledby="addPostcodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPostcodeModalLabel">Add Postcode for <span id="zoneNameDisplay"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="postcodeForm">
                <div class="modal-body">
                    <input type="hidden" name="zone_id" id="zoneId">
                    <div class="mb-3">
                        <label for="postcodes" class="form-label">Postcodes</label>
                        <input type="text" class="form-control" id="postcodes" name="postcodes" placeholder="Enter postcodes (comma separated)">
                        <small class="form-text text-muted">Separate multiple postcodes with commas (e.g., 43600, 43650)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Postcodes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script')
<script>
    $(document).ready(function() {
        // Handle checkboxes
        $("#selectAll").click(function() {
            $('input[name="checkbox"]').prop('checked', $(this).prop('checked'));
        });

        // Set zone information when modal is shown
        $('#addPostcodeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var zoneId = button.data('zone-id');
            var zoneName = button.data('zone-name');

            var modal = $(this);
            modal.find('#zoneNameDisplay').text(zoneName);
            modal.find('#zoneId').val(zoneId);

            // Clear any existing value
            modal.find('#postcodes').val('');

            // Load the current postcodes from the displayed badge
            var currentRow = button.closest('tr');
            var postcodeCell = currentRow.find('td:eq(3)'); // 4th column (0-indexed)
            var badgeText = postcodeCell.find('.badge').text().trim();

            if (badgeText) {
                modal.find('#postcodes').val(badgeText);
            }
        });

        // Form submission
        $('#postcodeForm').on('submit', function(e) {
            e.preventDefault();

            // Get form data
            var zoneId = $('#zoneId').val();
            var postcodes = $('#postcodes').val();

            // Submit via AJAX
            $.ajax({
                url: '{{ route("zones.postcodes.update") }}',
                type: 'POST',
                data: {
                    zone_id: zoneId,
                    postcodes: postcodes,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Show success notification
                        toastr.success('Postcodes updated successfully');

                        // Update the badge in the table
                        var row = $('tr').find('input[name="checkbox"][value="' + zoneId + '"]').closest('tr');
                        var postcodeCell = row.find('td:eq(3)');

                        if (postcodes) {
                            // If there's a badge already, update it, otherwise create one
                            if (postcodeCell.find('.badge').length) {
                                postcodeCell.find('.badge').text(postcodes);
                            } else {
                                postcodeCell.find('.d-flex').prepend('<span class="badge bg-light text-dark me-1">' + postcodes + '</span>');
                            }
                        } else {
                            // Remove the badge if postcodes is empty
                            postcodeCell.find('.badge').remove();
                        }

                        // Close the modal
                        $('#addPostcodeModal').modal('hide');
                    } else {
                        toastr.error('An error occurred while updating postcodes');
                    }
                },
                error: function() {
                    toastr.error('An error occurred while updating postcodes');
                }
            });
        });
    });
</script>
@endsection

@endsection