@extends('layout.layout')
@php
$title='Coins List';
$subTitle = 'Coins List';
$script ='<script>
    $(document).ready(function() {
        // Copy to clipboard functionality
        $(".copy-text").click(function() {
            var text = $(this).data("clipboard-text");
            navigator.clipboard.writeText(text).then(function() {
                // Show a toast or notification
                toastr.success("Copied to clipboard: " + text);
            });
        });
    });
</script>';
@endphp

@section('content')
@php
    // Define which coin types are considered inside (inflow) and outside (outflow)
    $insideTypes = ['reload', 'tonne_refund', 'refund', 'bonus', 'order'];
    $outsideTypes = ['waiting_charges', 'withdrawal', 'purchase'];

    $totalInside = 0;
    $totalOutside = 0;
    $totalIn = 0; // alias for totalInside
    $totalOut = 0; // alias for totalOutside

    foreach ($coins as $c) {
        $amt = ($c->amount ?? 0) / 100;
        if (in_array($c->coinable_type, $insideTypes)) {
            $totalInside += $amt;
            $totalIn += $amt;
        } elseif (in_array($c->coinable_type, $outsideTypes)) {
            $totalOutside += $amt;
            $totalOut += $amt;
        }
    }

    // Prepare lightweight payload for client-side aggregation
    $chartRecords = [];
    foreach ($coins as $c) {
        $chartRecords[] = [
            'date' => $c->created_at->format('Y-m-d H:i:s'),
            'type' => $c->coinable_type,
            'amount' => ($c->amount ?? 0) / 100
        ];
    }
@endphp
<div class="card h-100 p-0 radius-12">
    {{-- Chart area will sit inside card-body above the table to match table width --}}
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
    <div class="d-flex align-items-center flex-wrap gap-3">
            <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
            <form method="GET">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="per_page" onchange="this.form.submit()">
                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                </select>
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="type" value="{{ request('type') }}">
            </form>
            <form class="navbar-search" method="GET">
                <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search" value="{{ request('search') }}">
                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                <input type="hidden" name="type" value="{{ request('type') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            </form>
            <form method="GET">
                <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="type" onchange="this.form.submit()">
                    <option value="Type" {{ request('type') == 'Type' ? 'selected' : '' }}>All Types</option>
                    @foreach($coinTypes as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
            </form>
        </div>
        <a href="{{ route('coins.create') }}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
            <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
            Add New Coin
        </a>
    </div>
    <div class="card-body p-24">
        {{-- Large chart block placed above the table, matching table width --}}
        <div class="mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3 gap-3">
                <div class="d-flex align-items-center gap-3">
                    <label class="text-sm fw-medium">Group by</label>
                    <select id="coinsGroupBy" class="form-select form-select-sm w-auto">
                        <option value="day">Day</option>
                        <option value="week">Week</option>
                        <option value="month" selected>Month</option>
                    </select>
                    <label class="text-sm fw-medium ms-12">Stacked</label>
                    <input type="checkbox" id="coinsStacked" />
                    <label class="text-sm fw-medium ms-12">Show by Type</label>
                    <input type="checkbox" id="coinsShowTypes" />
                    <button id="exportCsv" class="btn btn-sm btn-outline-secondary ms-12">Export CSV</button>
                </div>
            </div>

            <div class="w-100 card p-3">
                @php
                    $allTypes = array_values(array_unique(array_map(function($r){ return $r['type']; }, $chartRecords)));
                @endphp
                <canvas id="coinsAuditBarChart" style="width:100%;height:320px;display:block;" data-records="{{ base64_encode(json_encode($chartRecords)) }}" data-types="{{ base64_encode(json_encode($allTypes)) }}"></canvas>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="table-responsive scroll-sm">
            <table class="table bordered-table sm-table mb-0">
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
                        <th scope="col">Customer</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coins as $coin)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox" value="{{ $coin->id }}">
                                </div>
                                <span class="copy-text" data-clipboard-text="{{ $coin->id }}">
                                    {{ $coin->id }}
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if(optional($coin->user)->profile_photo_path)
                                <img src="{{ asset('storage/' . $coin->user->profile_photo_path) }}" alt="{{ $coin->user->name }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                @else
                                <img src="{{ asset('assets/images/user.png') }}" alt="{{ optional($coin->user)->name ?? 'N/A' }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                @endif
                                <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ optional($coin->user)->name ?? 'N/A' }}</span>
                                    <div class="text-sm text-secondary-light">{{ optional($coin->user)->email ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ $coin->amount/100 }}</span>
                        </td>
                        <td>
                            <span class="text-md mb-0 fw-normal text-secondary-light">{{ ucfirst($coin->coinable_type) }}</span>
                        </td>
                        <td>
                            <span class="copy-text" data-clipboard-text="{{ $coin->created_at }}">
                                {{ $coin->created_at->format('Y-m-d H:i:s') }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No coins found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
            <span>
                Showing {{ $coins->firstItem() ?? 0 }} to {{ $coins->lastItem() ?? 0 }} of {{ $coins->total() }} entries
            </span>
            @if ($coins->hasPages())
            <nav aria-label="Coins pagination">
                <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($coins->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-neutral-400 fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                            href="{{ $coins->previousPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&type={{ urlencode(request('type')) }}">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </a>
                    </li>
                    @endif

                    {{-- Pagination Elements with Ellipsis --}}
                    @php
                    $total = $coins->lastPage();
                    $current = $coins->currentPage();
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
                            @elseif ($page == $coins->currentPage())
                            <li class="page-item active">
                                <span class="page-link bg-primary-600 text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">{{ $page }}</span>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $coins->url($page) }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&type={{ urlencode(request('type')) }}">{{ $page }}</a>
                            </li>
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($coins->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $coins->nextPageUrl() }}&per_page={{ request('per_page', 10) }}&search={{ urlencode(request('search')) }}&type={{ urlencode(request('type')) }}">
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Read raw records prepared server-side from canvas data-records attribute (base64 encoded)
    const rawDataAttr = document.getElementById('coinsAuditBarChart').dataset.records || '';
    let rawRecords = [];
    try {
        if (rawDataAttr) {
            const decoded = atob(rawDataAttr);
            rawRecords = JSON.parse(decoded || '[]');
        }
    } catch (err) {
        console.error('Failed to parse chart data', err);
        rawRecords = [];
    }

    const groupSelect = document.getElementById('coinsGroupBy');
    const stackedToggle = document.getElementById('coinsStacked');
    const showTypesToggle = document.getElementById('coinsShowTypes');
    const exportBtn = document.getElementById('exportCsv');
        const canvas = document.getElementById('coinsAuditBarChart');

        function groupKey(dateObj, mode) {
            const y = dateObj.getFullYear();
            const m = dateObj.getMonth() + 1;
            const d = dateObj.getDate();
            if (mode === 'month') return `${y}-${String(m).padStart(2,'0')}`;
            if (mode === 'week') {
                // Week label as YYYY-WW
                const onejan = new Date(dateObj.getFullYear(),0,1);
                const week = Math.ceil((((dateObj - onejan) / 86400000) + onejan.getDay()+1)/7);
                return `${y}-W${String(week).padStart(2,'0')}`;
            }
            // day
            return `${y}-${String(m).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
        }

        function aggregate(records, mode) {
            const map = new Map();
            records.forEach(r => {
                const dt = new Date(r.date);
                const key = groupKey(dt, mode);
                if (!map.has(key)) map.set(key, {inside: 0, outside: 0});
                const amt = parseFloat(r.amount) || 0;
                const type = r.type;
                // same inside/outside mapping as server
                const insideTypes = ['reload', 'tonne_refund', 'refund', 'bonus', 'order'];
                const outsideTypes = ['waiting_charges', 'withdrawal', 'purchase'];
                if (insideTypes.indexOf(type) !== -1) map.get(key).inside += amt;
                else if (outsideTypes.indexOf(type) !== -1) map.get(key).outside += amt;
            });
            // sort keys
            const keys = Array.from(map.keys()).sort();
            const labels = keys;
            const inside = keys.map(k => map.get(k).inside);
            const outside = keys.map(k => map.get(k).outside);
            return {labels, inside, outside};
        }

        // aggregate per-type when requested
        function aggregateByType(records, mode, types) {
            const map = new Map();
            records.forEach(r => {
                const dt = new Date(r.date);
                const key = groupKey(dt, mode);
                if (!map.has(key)) map.set(key, {});
                const amt = parseFloat(r.amount) || 0;
                const t = r.type;
                const row = map.get(key);
                row[t] = (row[t] || 0) + amt;
            });
            const keys = Array.from(map.keys()).sort();
            const labels = keys;
            const datasets = types.map(function(type) {
                return keys.map(k => map.get(k)[type] || 0);
            });
            return {labels, datasets};
        }

    // initialize chart
    const ctx = canvas.getContext('2d');
    let barChart = null;

        function drawChart(mode, stacked) {
            const data = aggregate(rawRecords, mode);
            // Determine effective theme by checking page background luminance first,
            // fallback to prefers-color-scheme if background is not informative.
            function parseRgb(rgbString) {
                // supports rgb(r,g,b) and rgba(r,g,b,a)
                const m = rgbString.match(/rgba?\((\d+),\s*(\d+),\s*(\d+)/i);
                if (!m) return null;
                return [parseInt(m[1], 10), parseInt(m[2], 10), parseInt(m[3], 10)];
            }

            function luminance(r, g, b) {
                // sRGB luminance
                const a = [r, g, b].map(function(v) {
                    v /= 255;
                    return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
                });
                return 0.2126 * a[0] + 0.7152 * a[1] + 0.0722 * a[2];
            }

            let isDark = false;
            try {
                const bodyBg = getComputedStyle(document.body).backgroundColor || '';
                const rgb = parseRgb(bodyBg);
                if (rgb) {
                    const L = luminance(rgb[0], rgb[1], rgb[2]);
                    // threshold chosen so that L < 0.5 is considered dark background
                    isDark = L < 0.5;
                } else if (window.matchMedia) {
                    isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                }
            } catch (e) {
                if (window.matchMedia) isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            }

            // read types list for per-type view
            const typesListRaw = canvas.dataset.types || '';
            let typesList = [];
            try { typesList = typesListRaw ? JSON.parse(atob(typesListRaw)) : []; } catch(e) { typesList = []; }

            const cfg = {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: (showTypesToggle && showTypesToggle.checked && typesList.length) ? (function() {
                        // color palette
                        const palette = ['#10b981','#ef4444','#06b6d4','#f59e0b','#7c3aed','#0ea5e9','#f97316','#84cc16'];
                        const res = [];
                        const typed = aggregateByType(rawRecords, mode, typesList);
                        for (let i = 0; i < typesList.length; i++) {
                            res.push({ label: typesList[i], data: typed.datasets[i], backgroundColor: palette[i % palette.length] });
                        }
                        return res;
                    })() : [
                        { label: 'Inside', data: data.inside, backgroundColor: '#10b981' },
                        { label: 'Outside', data: data.outside, backgroundColor: '#ef4444' }
                    ]
                },
                options: {
                    responsive: true,
                    interaction: { mode: 'index', intersect: false },
                    stacked: stacked,
                    scales: {
                        x: { stacked: stacked, title: { display: true, text: 'Period',} },
                        y: { stacked: stacked, title: { display: true, text: 'Amount', } }
                    },
                    plugins: {
                        legend: { position: 'top',},
                    }
                }
            };

            if (barChart) barChart.destroy();
            barChart = new Chart(ctx, cfg);
            // ensure canvas height corresponds to style height
            barChart.resize();
        }

        // initial draw
        drawChart(groupSelect.value, stackedToggle.checked);

        // controls
        groupSelect.addEventListener('change', function() {
            drawChart(this.value, stackedToggle.checked);
        });
        stackedToggle.addEventListener('change', function() {
            drawChart(groupSelect.value, this.checked);
        });
        showTypesToggle.addEventListener('change', function() {
            drawChart(groupSelect.value, stackedToggle.checked);
        });

        // redraw when window resizes to keep chart full-width
        let resizeTimeout = null;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                drawChart(groupSelect.value, stackedToggle.checked);
            }, 150);
        });

        // listen for color scheme changes and redraw to update text/grid colors
        if (window.matchMedia) {
            const mq = window.matchMedia('(prefers-color-scheme: dark)');
            mq.addEventListener && mq.addEventListener('change', function() {
                drawChart(groupSelect.value, stackedToggle.checked);
            });
        }

        // CSV export for auditors
        exportBtn.addEventListener('click', function() {
            if (showTypesToggle && showTypesToggle.checked) {
                const typesListRaw = canvas.dataset.types || '';
                let typesList = [];
                try { typesList = typesListRaw ? JSON.parse(atob(typesListRaw)) : []; } catch(e) { typesList = []; }
                const typed = aggregateByType(rawRecords, groupSelect.value, typesList);
                // header
                let csv = 'Period,' + typesList.join(',') + '\n';
                for (let i = 0; i < typed.labels.length; i++) {
                    const row = [typed.labels[i]];
                    for (let j = 0; j < typesList.length; j++) row.push(typed.datasets[j][i] || 0);
                    csv += row.join(',') + '\n';
                }
                const blob = new Blob([csv], { type: 'text/csv' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `coins_audit_types_${groupSelect.value}.csv`;
                document.body.appendChild(a);
                a.click();
                a.remove();
                URL.revokeObjectURL(url);
            } else {
                const data = aggregate(rawRecords, groupSelect.value);
                let csv = 'Period,Inside,Outside\n';
                for (let i = 0; i < data.labels.length; i++) {
                    csv += `${data.labels[i]},${data.inside[i] || 0},${data.outside[i] || 0}\n`;
                }
                const blob = new Blob([csv], { type: 'text/csv' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `coins_audit_${groupSelect.value}.csv`;
                document.body.appendChild(a);
                a.click();
                a.remove();
                URL.revokeObjectURL(url);
            }
        });
    });
</script>
@endpush