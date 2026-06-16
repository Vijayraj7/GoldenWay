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
    <title>Admin – Auto Pool History</title>
    <meta name="description" content="Admin view of all customers' auto pool purchases and income" />
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
        .stat-card-1 { background: linear-gradient(135deg,#c62828,#e53935); color:#fff; border-radius:12px; padding:18px 22px; box-shadow:0 4px 18px rgba(198,40,40,.35); }
        .stat-card-2 { background: linear-gradient(135deg,#1565c0,#1976d2); color:#fff; border-radius:12px; padding:18px 22px; box-shadow:0 4px 18px rgba(21,101,192,.35); }
        .stat-card-3 { background: linear-gradient(135deg,#2e7d32,#388e3c); color:#fff; border-radius:12px; padding:18px 22px; box-shadow:0 4px 18px rgba(46,125,50,.35); }
        .stat-card-4 { background: linear-gradient(135deg,#6a1b9a,#8e24aa); color:#fff; border-radius:12px; padding:18px 22px; box-shadow:0 4px 18px rgba(106,27,154,.35); }
        .stat-card-label { font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:1px; opacity:0.85; }
        .stat-card-value { font-size:1.5rem; font-weight:800; margin-top:4px; }
        .stat-card-unit  { font-size:12px; font-weight:500; opacity:0.8; }

        /* ── Misc ── */
        .text-gold-premium { color: #8d6900 !important; font-weight: bold; }
        .text-green-premium { color: #2e7d32 !important; font-weight: bold; }
        .uid-link { color: #5a4100; font-weight: 700; text-decoration: none; }
        .uid-link:hover { color: #8d6900; }
        .search-bar { max-width: 340px; }
        h4 { color: #fff !important; }
        h4 .text-muted { color: rgba(255,255,255,0.6) !important; }
    </style>
</head>
<body>
    @include('dashboard.dcards.naver')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('dashboard.admin.dcards.menu', ['r' => 'adminautopoolhistory'])
            <div class="layout-page">
                @include('dashboard.dcards.nav')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-2">
                            <span class="text-muted fw-light">Admin /</span> Auto Pool History
                        </h4>

                        <?php
                            // ── Filter by UID search ─────────────────────────────────────
                            $searchUid   = $_GET['uid']  ?? null;
                            $searchFrom  = $_GET['from'] ?? null;
                            $searchTo    = $_GET['to']   ?? null;
                            $filterCsId  = null;
                            $filterCustomer = null;

                            if ($searchUid) {
                                $filterCustomer = DB::table('customers')->where('uid', strtoupper(trim($searchUid)))->first();
                                $filterCsId = $filterCustomer ? $filterCustomer->id : -1; // -1 = no match
                            }

                            // ── Summary stats ────────────────────────────────────────────
                            $totalPollAmount = DB::table('customer_autopolls')->sum('poll_amount');
                            $totalPollCount  = DB::table('customer_autopolls')->count();
                            $totalIncome     = DB::table('customer_poll_transactions')->where('tType','pollincome')->sum('tamount');
                            $totalCustomers  = DB::table('customer_autopolls')->distinct('csId')->count('csId');

                            // ── Purchases query ──────────────────────────────────────────
                            $pollQuery = DB::table('customer_autopolls')
                                ->leftJoin('customers', 'customer_autopolls.csId', '=', 'customers.id')
                                ->select('customer_autopolls.*', 'customers.name as cname', 'customers.uid as cuid', 'customers.id as cid');

                            if ($filterCsId !== null) { $pollQuery->where('customer_autopolls.csId', $filterCsId); }
                            if ($searchFrom) { $pollQuery->where('customer_autopolls.created_at', '>=', $searchFrom . ' 00:00:00'); }
                            if ($searchTo)   { $pollQuery->where('customer_autopolls.created_at', '<=', $searchTo   . ' 23:59:59'); }
                            $polls = $pollQuery->orderBy('customer_autopolls.id', 'desc')->get();

                            // ── Income query ─────────────────────────────────────────────
                            $incQuery = DB::table('customer_poll_transactions as pt')
                                ->leftJoin('customers as c',  'pt.csId',  '=', 'c.id')
                                ->leftJoin('customers as fc', 'pt.fcsId', '=', 'fc.id')
                                ->select('pt.*', 'c.name as cname', 'c.uid as cuid', 'fc.name as fcname', 'fc.uid as fcuid');

                            if ($filterCsId !== null) { $incQuery->where('pt.csId', $filterCsId); }
                            if ($searchFrom) { $incQuery->where('pt.created_at', '>=', $searchFrom . ' 00:00:00'); }
                            if ($searchTo)   { $incQuery->where('pt.created_at', '<=', $searchTo   . ' 23:59:59'); }
                            $incomes = $incQuery->orderBy('pt.id', 'desc')->get();
                        ?>

                        {{-- Summary Cards --}}
                        <div class="row mb-4">
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-card-1">
                                    <div class="stat-card-label">Total Poll Amount</div>
                                    <div class="stat-card-value">{{ number_format($totalPollAmount, 2) }} <span class="stat-card-unit">USDT</span></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-card-2">
                                    <div class="stat-card-label">Total Income Distributed</div>
                                    <div class="stat-card-value">{{ number_format($totalIncome, 2) }} <span class="stat-card-unit">USDT</span></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-card-3">
                                    <div class="stat-card-label">Total Purchases</div>
                                    <div class="stat-card-value">{{ $totalPollCount }}</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-card-4">
                                    <div class="stat-card-label">Unique Participants</div>
                                    <div class="stat-card-value">{{ $totalCustomers }}</div>
                                </div>
                            </div>
                        </div>

                        {{-- Search / Filter bar --}}
                        <div class="card mb-4">
                            <div class="card-body py-3">
                                <form method="GET" class="d-flex flex-wrap align-items-end gap-3">
                                    <div>
                                        <label class="form-label mb-1" style="font-size:12px; font-weight:700;">Filter by UID</label>
                                        <input type="text" name="uid" value="{{ $searchUid }}" class="form-control search-bar" placeholder="e.g. GW874374" />
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
                                    <a href="/admin/autopool/history" class="btn btn-outline-secondary">Reset</a>
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

                        {{-- Auto Poll Purchases Table --}}
                        <div class="card mb-5">
                            <h5 class="card-header card-header-premium">
                                <i class="bx bx-cart me-2"></i>Auto Poll Purchases
                                <span class="badge ms-2" style="background:#f9a826; color:#0f2e22;">{{ $polls->count() }} records</span>
                            </h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-premium">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date &amp; Time</th>
                                            <th>Customer</th>
                                            <th>UID</th>
                                            <th>Poll ID</th>
                                            <th>Amount</th>
                                            <th>TXID</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($polls as $key => $poll)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($poll->created_at)->setTimezone('Asia/Dubai')->format('d M, Y h:i a') }} <span style="font-size:9px;color:#999;">GST</span></td>
                                            <td>
                                                <a class="uid-link" href="/admin/user/{{ $poll->cid }}">{{ $poll->cname ?? 'N/A' }}</a>
                                            </td>
                                            <td>
                                                <a class="uid-link" href="/admin/autopool/history?uid={{ $poll->cuid }}">{{ $poll->cuid ?? '—' }}</a>
                                            </td>
                                            <td><span class="text-muted">#{{ $poll->id }}</span></td>
                                            <td class="text-gold-premium">{{ number_format($poll->poll_amount, 2) }} USDT</td>
                                            <td>
                                                @if($poll->txid)
                                                <span class="text-muted" style="font-size:11px;">{{ Str::limit($poll->txid, 20) }}</span>
                                                @else
                                                <span class="badge bg-label-secondary">Admin</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($poll->status == 'completed')
                                                <span class="badge bg-label-success">Completed</span>
                                                @else
                                                <span class="badge bg-label-warning">{{ ucfirst($poll->status) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-4 text-muted">No Auto Poll purchases found.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Income / Profit-sharing Table --}}
                        <div class="card">
                            <h5 class="card-header card-header-premium">
                                <i class="bx bx-trending-up me-2"></i>Auto Poll Profit-Sharing Income
                                <span class="badge ms-2" style="background:#2e7d32; color:#fff;">{{ $incomes->count() }} records</span>
                            </h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-premium">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date &amp; Time</th>
                                            <th>Recipient</th>
                                            <th>Recipient UID</th>
                                            <th>Trigger Source</th>
                                            <th>Poll ID</th>
                                            <th>Eligible Count</th>
                                            <th>Payout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($incomes as $key => $income)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ \Carbon\Carbon::parse($income->created_at)->setTimezone('Asia/Dubai')->format('d M, Y h:i a') }} <span style="font-size:9px;color:#999;">GST</span></td>
                                            <td><a class="uid-link" href="/admin/user/{{ $income->csId }}">{{ $income->cname ?? 'N/A' }}</a></td>
                                            <td>
                                                <a class="uid-link" href="/admin/autopool/history?uid={{ $income->cuid }}">{{ $income->cuid ?? '—' }}</a>
                                            </td>
                                            <td>
                                                @if($income->fcname)
                                                <span>{{ $income->fcname }}</span>
                                                <span class="text-muted" style="font-size:11px;">({{ $income->fcuid }})</span>
                                                @else
                                                <span class="text-muted">System</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($income->poll_id)
                                                <span class="text-muted">#{{ $income->poll_id }}</span>
                                                @else
                                                <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($income->eligible_count) && $income->eligible_count > 0)
                                                {{ $income->eligible_count }}
                                                @else
                                                <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td class="text-green-premium">+{{ number_format($income->tamount, 2) }} USDT</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-4 text-muted">No income records found.</td>
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
