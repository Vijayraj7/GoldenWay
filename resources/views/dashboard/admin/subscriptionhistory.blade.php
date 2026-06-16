<?php
use Carbon\Carbon;
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Admin – Subscription History</title>
    <meta name="description" content="Admin view of all customers' subscription (stake) history" />
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>
    <style>
        /* ── Page background ── */
        body { background-color: #8d6900 !important; }
        .content-wrapper, .layout-page { background-color: #8d6900 !important; }
        .container-xxl { background-color: transparent !important; }

        /* ── Card header ── */
        .card-header-premium {
            background: linear-gradient(135deg, #5a4100 0%, #8d6900 100%) !important;
            border-bottom: 3px solid #ffe066 !important;
            color: #fff !important;
        }

        /* ── Main cards ── */
        .card {
            background: rgba(255,255,255,0.96) !important;
            border: none !important;
            box-shadow: 0 4px 24px rgba(0,0,0,0.22) !important;
        }

        /* ── Tables ── */
        .table-premium th {
            background-color: rgba(141,105,0,0.10) !important;
            font-weight: 700 !important;
            color: #5a4100 !important;
            border: 1px solid rgba(141,105,0,0.18) !important;
        }
        .table-premium td { border: 1px solid rgba(141,105,0,0.10) !important; }

        /* ── Stat cards – each a distinct color ── */
        .stat-card-1 { background: linear-gradient(135deg,#b71c1c,#e53935); color:#fff; border-radius:12px; padding:18px 22px; box-shadow:0 4px 18px rgba(183,28,28,.35); }
        .stat-card-2 { background: linear-gradient(135deg,#1b5e20,#2e7d32); color:#fff; border-radius:12px; padding:18px 22px; box-shadow:0 4px 18px rgba(27,94,32,.35); }
        .stat-card-3 { background: linear-gradient(135deg,#e65100,#f57c00); color:#fff; border-radius:12px; padding:18px 22px; box-shadow:0 4px 18px rgba(230,81,0,.35); }
        .stat-card-4 { background: linear-gradient(135deg,#4a148c,#7b1fa2); color:#fff; border-radius:12px; padding:18px 22px; box-shadow:0 4px 18px rgba(74,20,140,.35); }
        .stat-card-label { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:1px; opacity:0.85; }
        .stat-card-value { font-size:1.5rem; font-weight:800; margin-top:4px; }
        .stat-card-unit  { font-size:12px; font-weight:500; opacity:0.8; }

        /* ── Misc ── */
        .text-gold-premium { color: #8d6900 !important; font-weight: bold; }
        .text-green-premium { color: #2e7d32 !important; font-weight: bold; }
        .uid-link { color: #5a4100; font-weight: 700; text-decoration: none; }
        .uid-link:hover { color: #8d6900; }
        h4 { color: #fff !important; }
        h4 .text-muted { color: rgba(255,255,255,0.6) !important; }
    </style>
</head>
<body>
    @include('dashboard.dcards.naver')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('dashboard.admin.dcards.menu', ['r' => 'adminsubscriptionhistory'])
            <div class="layout-page">
                @include('dashboard.dcards.nav')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-2">
                            <span class="text-muted fw-light">Admin /</span> Subscription History
                        </h4>

                        <?php
                            // ── Filter inputs ────────────────────────────────────────────
                            $searchUid  = $_GET['uid']    ?? null;
                            $searchFrom = $_GET['from']   ?? null;
                            $searchTo   = $_GET['to']     ?? null;
                            $statusFilter = $_GET['status'] ?? null;   // 0=pending, 1=active, 3=rejected

                            $filterCsId = null;
                            $filterCustomer = null;
                            if ($searchUid) {
                                $filterCustomer = DB::table('customers')->where('uid', strtoupper(trim($searchUid)))->first();
                                $filterCsId = $filterCustomer ? $filterCustomer->id : -1;
                            }

                            // ── Summary stats (global, ignoring filters for overview) ───
                            $totalSubAmount  = DB::table('customer_plans')->whereNull('cmpId')->sum('pamount');
                            $activeSubAmount = DB::table('customer_plans')->whereNull('cmpId')->where('pstatus','1')->sum('pamount');
                            $pendingCount    = DB::table('customer_plans')->whereNull('cmpId')->where('pstatus','0')->count();
                            $totalCount      = DB::table('customer_plans')->whereNull('cmpId')->whereNot('pstatus','3')->count();
                            $uniqueSubbers   = DB::table('customer_plans')->whereNull('cmpId')->whereNot('pstatus','3')->distinct('csId')->count('csId');

                            // ── Data query ───────────────────────────────────────────────
                            $query = DB::table('customer_plans as p')
                                ->leftJoin('customers as c', 'p.csId', '=', 'c.id')
                                ->select('p.*', 'c.name as cname', 'c.uid as cuid', 'c.phone as cphone', 'c.img as cimg')
                                ->whereNull('p.cmpId');   // top-level subscriptions only

                            if ($filterCsId !== null) { $query->where('p.csId', $filterCsId); }
                            if ($searchFrom)  { $query->where('p.created_at', '>=', $searchFrom . ' 00:00:00'); }
                            if ($searchTo)    { $query->where('p.created_at', '<=', $searchTo   . ' 23:59:59'); }
                            if ($statusFilter !== null && $statusFilter !== '') {
                                $query->where('p.pstatus', $statusFilter);
                            } else {
                                $query->whereNot('p.pstatus', '3'); // hide rejected by default
                            }

                            $plans = $query->orderBy('p.id', 'desc')->get();
                            $i = 0;
                        ?>

                        {{-- Summary Cards --}}
                        <div class="row mb-4">
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-card-1">
                                    <div class="stat-card-label">Total Subscriptions</div>
                                    <div class="stat-card-value">{{ number_format($totalSubAmount, 2) }} <span class="stat-card-unit">USDT</span></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-card-2">
                                    <div class="stat-card-label">Active Subscriptions</div>
                                    <div class="stat-card-value">{{ number_format($activeSubAmount, 2) }} <span class="stat-card-unit">USDT</span></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-card-3">
                                    <div class="stat-card-label">Pending Approval</div>
                                    <div class="stat-card-value">{{ $pendingCount }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-card-4">
                                    <div class="stat-card-label">Unique Subscribers</div>
                                    <div class="stat-card-value">{{ $uniqueSubbers }}</div>
                                </div>
                            </div>
                        </div>

                        {{-- Filter bar --}}
                        <div class="card mb-4">
                            <div class="card-body py-3">
                                <form method="GET" class="d-flex flex-wrap align-items-end gap-3">
                                    <div>
                                        <label class="form-label mb-1" style="font-size:12px; font-weight:700;">Filter by UID</label>
                                        <input type="text" name="uid" value="{{ $searchUid }}" class="form-control" style="min-width:200px;" placeholder="e.g. GW874374" />
                                    </div>
                                    <div>
                                        <label class="form-label mb-1" style="font-size:12px; font-weight:700;">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="">All (excl. Rejected)</option>
                                            <option value="0" {{ $statusFilter === '0' ? 'selected' : '' }}>Pending</option>
                                            <option value="1" {{ $statusFilter === '1' ? 'selected' : '' }}>Active</option>
                                            <option value="3" {{ $statusFilter === '3' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label mb-1" style="font-size:12px; font-weight:700;">From Date</label>
                                        <input type="date" name="from" value="{{ $searchFrom }}" class="form-control" />
                                    </div>
                                    <div>
                                        <label class="form-label mb-1" style="font-size:12px; font-weight:700;">To Date</label>
                                        <input type="date" name="to" value="{{ $searchTo }}" class="form-control" />
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="bx bx-search me-1"></i>Search</button>
                                    <a href="/admin/subscription/history" class="btn btn-outline-secondary">Reset</a>
                                </form>
                                @if($filterCustomer)
                                <div class="mt-2">
                                    <span class="badge bg-label-success" style="font-size:13px;">
                                        Showing: {{ $filterCustomer->name }} ({{ $filterCustomer->uid }})
                                    </span>
                                </div>
                                @elseif($searchUid && !$filterCustomer)
                                <div class="mt-2">
                                    <span class="badge bg-label-danger">No customer found for UID: {{ $searchUid }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        {{-- Subscriptions Table --}}
                        <div class="card">
                            <h5 class="card-header card-header-premium">
                                <i class="bx bx-layer me-2"></i>Subscription Records
                                <span class="badge ms-2" style="background:#f9a826; color:#0f2e22;">{{ $plans->count() }} records</span>
                                <span class="badge ms-1" style="background:#1e4d3a; color:#f9a826;">Total: {{ number_format($plans->sum('pamount'), 2) }} USDT</span>
                            </h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-premium">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date &amp; Time</th>
                                            <th>Customer</th>
                                            <th>UID</th>
                                            <th>Package</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($plans as $plan)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ \Carbon\Carbon::parse($plan->created_at)->setTimezone('Asia/Dubai')->format('d M, Y h:i a') }} <span style="font-size:9px;color:#999;">GST</span></td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    @if($plan->cimg)
                                                    <img src="{{ $plan->cimg }}" alt="avatar" style="width:28px;height:28px;border-radius:50%;object-fit:cover;" />
                                                    @endif
                                                    <a class="uid-link" href="/admin/user/{{ $plan->csId }}">{{ $plan->cname ?? 'N/A' }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="uid-link" href="/admin/subscription/history?uid={{ $plan->cuid }}">{{ $plan->cuid ?? '—' }}</a>
                                            </td>
                                            <td>{{ getPname($plan->pname) }}</td>
                                            <td class="text-gold-premium">{{ number_format($plan->pamount, 2) }} USDT</td>
                                            <td>
                                                @if($plan->pstatus == '0')
                                                <span class="badge bg-label-warning">Pending</span>
                                                @elseif($plan->pstatus == '1')
                                                <span class="badge bg-label-success">Active</span>
                                                @elseif($plan->pstatus == '3')
                                                <span class="badge bg-label-danger">Rejected</span>
                                                @else
                                                <span class="badge bg-label-secondary">{{ $plan->pstatus }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/admin/product/requests/{{ $plan->id }}" class="btn btn-sm btn-outline-primary py-0 px-2" style="font-size:12px;">
                                                    <i class="bx bx-show me-1"></i>View
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-4 text-muted">No subscription records found.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="my-5" />
                        @include('dashboard.dcards.footer')
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
