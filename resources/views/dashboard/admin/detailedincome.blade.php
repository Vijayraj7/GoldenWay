<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Carbon\Carbon;

// Date filters
$fromDate = $_GET['from_date'] ?? '';
$toDate = $_GET['to_date'] ?? '';

$fromDateTime = $fromDate ? $fromDate . ' 00:00:00' : '';
$toDateTime = $toDate ? $toDate . ' 23:59:59' : '';

// Customer filter
$selectedCustId = $_GET['customer_id'] ?? '';

// Income Type filter
$selectedType = $_GET['income_type'] ?? '';

// Retrieve all customers for the dropdown list
$allCustomers = DB::table('customers')
    ->select('id', 'name', 'email', 'uid')
    ->orderBy('name', 'asc')
    ->get();

// Calculate STATS (filtered totals but before pagination)
$statsQuery = DB::table('customer_transactions')
    ->whereIn('tType', ['pincome', 'stake_income', 'sub_income', 'refincome', 'levincome'])
    ->where('wStatus', '0');

if ($fromDate != '') {
    $statsQuery->where('created_at', '>=', $fromDateTime);
}
if ($toDate != '') {
    $statsQuery->where('created_at', '<=', $toDateTime);
}
if ($selectedCustId != '') {
    $statsQuery->where('csId', $selectedCustId);
}

// Clone for type totals
$allFilteredTxns = $statsQuery->get();

$totalStake = $allFilteredTxns->whereIn('tType', ['pincome', 'stake_income'])->sum('tAmount');
$totalSub = $allFilteredTxns->where('tType', 'sub_income')->sum('tAmount');
$totalRef = $allFilteredTxns->where('tType', 'refincome')->sum('tAmount');
$totalLevel = $allFilteredTxns->where('tType', 'levincome')->sum('tAmount');
$grandTotal = $totalStake + $totalSub + $totalRef + $totalLevel;

// Build query for current page
$listQuery = DB::table('customer_transactions')
    ->join('customers as receiver', 'customer_transactions.csId', '=', 'receiver.id')
    ->leftJoin('customers as source', 'customer_transactions.fcsId', '=', 'source.id')
    ->select(
        'customer_transactions.*',
        'receiver.name as receiver_name',
        'receiver.email as receiver_email',
        'receiver.uid as receiver_uid',
        'source.name as source_name',
        'source.email as source_email',
        'source.uid as source_uid'
    )
    ->where('customer_transactions.wStatus', '0');

// Apply type filtering
if ($selectedType != '') {
    if ($selectedType == 'stake') {
        $listQuery->whereIn('customer_transactions.tType', ['pincome', 'stake_income']);
    } elseif ($selectedType == 'sub') {
        $listQuery->where('customer_transactions.tType', 'sub_income');
    } elseif ($selectedType == 'referral') {
        $listQuery->where('customer_transactions.tType', 'refincome');
    } elseif ($selectedType == 'level') {
        $listQuery->where('customer_transactions.tType', 'levincome');
    }
} else {
    $listQuery->whereIn('customer_transactions.tType', ['pincome', 'stake_income', 'sub_income', 'refincome', 'levincome']);
}

if ($fromDate != '') {
    $listQuery->where('customer_transactions.created_at', '>=', $fromDateTime);
}
if ($toDate != '') {
    $listQuery->where('customer_transactions.created_at', '<=', $toDateTime);
}
if ($selectedCustId != '') {
    $listQuery->where('customer_transactions.csId', $selectedCustId);
}

// Pagination setup
$page = (int)($_GET['page'] ?? 1);
if ($page < 1) $page = 1;
$perPage = 50;
$offset = ($page - 1) * $perPage;

$totalRecords = $listQuery->count();
$transactions = $listQuery->orderBy('customer_transactions.created_at', 'desc')
    ->offset($offset)
    ->limit($perPage)
    ->get();

$totalPages = ceil($totalRecords / $perPage);

// Build query parameter string for preserving filter state in pagination
$queryParams = request()->only(['from_date', 'to_date', 'customer_id', 'income_type']);
$queryString = count($queryParams) > 0 ? '&' . http_build_query($queryParams) : '';
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Detailed Incomes | GoldenWay Admin</title>
    <meta name="description" content="Admin panel – detailed customer income statements." />
    <link class="icon" type="image/x-icon" href="/tst/goldenlogo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        :root {
            --bg-deep: #05060b;
            --bg-card: #0c0e1a;
            --bg-card2: #101322;
            --border: rgba(255, 255, 255, 0.08);
            --gold: #ffd700;
            --gold2: #ff9f43;
            --green: #00ff87;
            --blue: #38bdf8;
            --purple: #d783ff;
            --red: #ff6b6b;
            --text-main: #ffffff;
            --text-sub: #cbd5e1;
            --text-muted: #94a3b8;
        }

        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body,
        .layout-page,
        .content-wrapper {
            background: var(--bg-deep) !important;
        }

        .container-xxl {
            max-width: 100% !important;
            padding: 24px 28px !important;
        }

        /* ── Hero header ── */
        .hero-header {
            background: linear-gradient(135deg, #0e1120 0%, #111830 50%, #0d1028 100%);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 32px 36px;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }

        .hero-header::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(245, 197, 24, 0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-title {
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: -1px;
            line-height: 1;
            background: linear-gradient(135deg, #ffffff 0%, #f5c518 50%, #ff8c00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            color: var(--text-sub);
            font-size: 0.83rem;
            margin-top: 6px;
            font-weight: 500;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(245, 197, 24, 0.1);
            border: 1px solid rgba(245, 197, 24, 0.2);
            color: var(--gold);
            border-radius: 30px;
            padding: 6px 16px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        /* ── Stat grid ── */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        @media(max-width:1200px) {
            .stat-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media(max-width:800px) {
            .stat-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media(max-width:500px) {
            .stat-grid {
                grid-template-columns: 1fr;
            }
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 20px;
            position: relative;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            cursor: default;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.6);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: 0 0 20px 20px;
        }

        .stat-card.s-gold::after {
            background: linear-gradient(90deg, var(--gold), var(--gold2));
        }
        .stat-card.s-green::after {
            background: linear-gradient(90deg, var(--green), #0fbe6a);
        }
        .stat-card.s-blue::after {
            background: linear-gradient(90deg, var(--blue), #2176d9);
        }
        .stat-card.s-purple::after {
            background: linear-gradient(90deg, var(--purple), #8b50f5);
        }
        .stat-card.s-cyan::after {
            background: linear-gradient(90deg, #00d2d3, #00a8ff);
        }

        .stat-icon-wrap {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 12px;
        }

        .s-gold .stat-icon-wrap {
            background: rgba(245, 197, 24, 0.12);
            color: var(--gold);
            box-shadow: 0 0 24px rgba(245, 197, 24, 0.15);
        }
        .s-green .stat-icon-wrap {
            background: rgba(34, 209, 122, 0.12);
            color: var(--green);
            box-shadow: 0 0 24px rgba(34, 209, 122, 0.12);
        }
        .s-blue .stat-icon-wrap {
            background: rgba(79, 163, 247, 0.12);
            color: var(--blue);
            box-shadow: 0 0 24px rgba(79, 163, 247, 0.12);
        }
        .s-purple .stat-icon-wrap {
            background: rgba(185, 122, 255, 0.12);
            color: var(--purple);
            box-shadow: 0 0 24px rgba(185, 122, 255, 0.12);
        }
        .s-cyan .stat-icon-wrap {
            background: rgba(0, 210, 211, 0.12);
            color: #00d2d3;
            box-shadow: 0 0 24px rgba(0, 210, 211, 0.12);
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            color: var(--text-main);
            font-size: 1.25rem;
            font-weight: 800;
            margin-top: 4px;
            display: flex;
            align-items: baseline;
            gap: 4px;
        }

        .stat-unit {
            font-size: 0.65rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        .filter-panel {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .table-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .table-header {
            padding: 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .table-header-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .table-header-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--gold), var(--gold2));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: #08090f;
            box-shadow: 0 6px 20px rgba(245, 197, 24, 0.3);
            flex-shrink: 0;
        }

        .table-header h5 {
            color: var(--text-main);
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 0;
        }

        .table-header p {
            color: var(--text-muted);
            font-size: 0.7rem;
            margin-top: 2px;
            margin-bottom: 0;
        }

        .count-pill {
            background: rgba(245, 197, 24, 0.1);
            border: 1px solid rgba(245, 197, 24, 0.2);
            color: var(--gold);
            border-radius: 30px;
            padding: 4px 12px;
            font-size: 0.7rem;
            font-weight: 800;
        }

        /* ── Table ── */
        .data-table-scroll {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .data-table thead tr {
            background: rgba(255, 255, 255, 0.025);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .data-table thead th {
            color: var(--text-sub);
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            padding: 14px 16px;
            white-space: nowrap;
        }

        .data-table tbody tr {
            transition: background 0.18s ease;
            border-bottom: 1px solid rgba(255,255,255,0.02);
        }

        .data-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.04) !important;
        }

        .data-table td {
            padding: 14px 16px;
            font-size: 0.8rem;
            color: var(--text-sub);
            white-space: nowrap;
            vertical-align: middle;
        }

        .cell-num {
            color: var(--text-muted);
            font-size: 0.7rem;
            font-weight: 700;
            text-align: center;
        }

        .cell-date {
            font-size: 0.75rem;
            color: #ffffff;
            font-weight: 500;
        }

        .member-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mem-initial {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255,255,255,0.08), rgba(255,255,255,0.03));
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gold);
            font-weight: 700;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mem-link {
            color: #ffffff;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.8rem;
            transition: color 0.2s;
        }

        .mem-link:hover {
            color: var(--gold);
        }

        .uid-tag {
            font-family: monospace;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            color: var(--text-muted);
            border-radius: 6px;
            padding: 2px 6px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .btn-search {
            background: linear-gradient(135deg, var(--gold), var(--gold2));
            border: none;
            color: #05060b;
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 12px;
            font-size: 13px;
            transition: all 0.2s ease;
        }

        .btn-search:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(245, 197, 24, 0.2);
        }

        .btn-clear {
            background: rgba(255, 255, 255, 0.05);
            border: 1.5px solid rgba(255, 255, 255, 0.08);
            color: var(--text-sub);
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 12px;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-clear:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        /* ── Custom Pagination styling ── */
        .custom-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 20px 24px;
            border-top: 1px solid var(--border);
        }

        .pagination-btn {
            background: rgba(255, 255, 255, 0.03);
            border: 1.5px solid rgba(255, 255, 255, 0.07);
            color: var(--text-sub);
            padding: 8px 14px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.78rem;
            font-weight: 600;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .pagination-btn:hover:not(.disabled) {
            background: rgba(245, 197, 24, 0.1);
            border-color: rgba(245, 197, 24, 0.3);
            color: var(--gold);
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, var(--gold), var(--gold2));
            border-color: transparent;
            color: #08090f;
            cursor: default;
        }

        .pagination-btn.disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
</head>
<body>
    @include('dashboard.dcards.naver')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('dashboard.admin.dcards.menu', ['r' => 'detailedincome'])

            <div class="layout-page">
                @include('dashboard.dcards.nav')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Hero Header -->
                        <div class="hero-header">
                            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                                <div>
                                    <h1 class="hero-title">Detailed Income Statement</h1>
                                    <p class="hero-sub">Audit detailed customer statements of stake, subscription, referral and level incomes</p>
                                </div>
                                <span class="hero-badge">
                                    <i class="bx bx-receipt"></i> Detailed Auditing
                                </span>
                            </div>
                        </div>

                        <!-- Stat Grid -->
                        <div class="stat-grid">
                            <div class="stat-card s-green">
                                <div class="stat-icon-wrap"><i class="bx bx-trending-up"></i></div>
                                <div class="stat-label">Stake Income</div>
                                <div class="stat-value">{{ number_format($totalStake, 2) }} <span class="stat-unit">USDT</span></div>
                            </div>
                            <div class="stat-card s-cyan">
                                <div class="stat-icon-wrap"><i class="bx bx-refresh"></i></div>
                                <div class="stat-label">Sub Income</div>
                                <div class="stat-value">{{ number_format($totalSub, 2) }} <span class="stat-unit">USDT</span></div>
                            </div>
                            <div class="stat-card s-gold">
                                <div class="stat-icon-wrap"><i class="bx bx-gift"></i></div>
                                <div class="stat-label">Referral Income</div>
                                <div class="stat-value">{{ number_format($totalRef, 2) }} <span class="stat-unit">USDT</span></div>
                            </div>
                            <div class="stat-card s-blue">
                                <div class="stat-icon-wrap"><i class="bx bx-network-chart"></i></div>
                                <div class="stat-label">Level Income</div>
                                <div class="stat-value">{{ number_format($totalLevel, 2) }} <span class="stat-unit">USDT</span></div>
                            </div>
                            <div class="stat-card s-purple">
                                <div class="stat-icon-wrap"><i class="bx bx-wallet"></i></div>
                                <div class="stat-label">Grand Total</div>
                                <div class="stat-value">{{ number_format($grandTotal, 2) }} <span class="stat-unit">USDT</span></div>
                            </div>
                        </div>

                        <!-- Filters Panel -->
                        <div class="filter-panel">
                            <form method="GET" action="{{ request()->url() }}" id="filterForm">
                                <div class="row g-3 align-items-end">
                                    <!-- Customer Live Filter -->
                                    <div class="col-12 col-md-3">
                                        <div class="d-flex flex-column gap-1">
                                            <span style="font-size: 11px; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Search/Filter Customer:</span>
                                            <input type="text" id="custSearchInput" class="form-control" placeholder="Type member name/uid..." style="background: rgba(0, 0, 0, 0.3) !important; border: 1.5px solid rgba(255,255,255,0.07) !important; color: #fff !important; border-radius: 12px; padding: 10px 14px; font-size: 13px; margin-bottom: 4px;">
                                            <select name="customer_id" id="customerSelect" class="form-select" style="background: rgba(0, 0, 0, 0.3) !important; border: 1.5px solid rgba(255,255,255,0.07) !important; color: #fff !important; color-scheme: dark; border-radius: 12px; padding: 10px 14px; font-size: 13px;">
                                                <option value="">-- All Customers --</option>
                                                @foreach($allCustomers as $cust)
                                                    <option value="{{ $cust->id }}" {{ $selectedCustId == $cust->id ? 'selected' : '' }}>
                                                        {{ $cust->name }} ({{ $cust->uid }} - {{ $cust->email }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Income Type -->
                                    <div class="col-12 col-md-2">
                                        <div class="d-flex flex-column gap-1">
                                            <span style="font-size: 11px; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Income Type:</span>
                                            <select name="income_type" class="form-select" style="background: rgba(0, 0, 0, 0.3) !important; border: 1.5px solid rgba(255,255,255,0.07) !important; color: #fff !important; color-scheme: dark; border-radius: 12px; padding: 10px 14px; font-size: 13px;">
                                                <option value="">-- All Incomes --</option>
                                                <option value="stake" {{ $selectedType == 'stake' ? 'selected' : '' }}>Stake Income</option>
                                                <option value="sub" {{ $selectedType == 'sub' ? 'selected' : '' }}>Sub Income</option>
                                                <option value="referral" {{ $selectedType == 'referral' ? 'selected' : '' }}>Referral Income</option>
                                                <option value="level" {{ $selectedType == 'level' ? 'selected' : '' }}>Level Income</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- From Date -->
                                    <div class="col-12 col-md-2">
                                        <div class="d-flex flex-column gap-1">
                                            <span style="font-size: 11px; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">From Date:</span>
                                            <input type="date" name="from_date" class="form-control" value="{{ $fromDate }}" style="background: rgba(0, 0, 0, 0.3) !important; border: 1.5px solid rgba(255,255,255,0.07) !important; color: #fff !important; color-scheme: dark; border-radius: 12px; padding: 10px 14px; font-size: 13px;">
                                        </div>
                                    </div>

                                    <!-- To Date -->
                                    <div class="col-12 col-md-2">
                                        <div class="d-flex flex-column gap-1">
                                            <span style="font-size: 11px; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">To Date:</span>
                                            <input type="date" name="to_date" class="form-control" value="{{ $toDate }}" style="background: rgba(0, 0, 0, 0.3) !important; border: 1.5px solid rgba(255,255,255,0.07) !important; color: #fff !important; color-scheme: dark; border-radius: 12px; padding: 10px 14px; font-size: 13px;">
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="col-12 col-md-3 d-flex gap-2 justify-content-end">
                                        <button type="submit" class="btn-search w-50">
                                            Apply
                                        </button>
                                        @if($fromDate != '' || $toDate != '' || $selectedCustId != '' || $selectedType != '' || $page > 1)
                                            <a href="{{ request()->url() }}" class="btn-clear w-50 justify-content-center">
                                                <i class="bx bx-reset"></i> Reset
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Data Card -->
                        <div class="table-card">
                            <div class="table-header">
                                <div class="table-header-left">
                                    <div class="table-header-icon"><i class="bx bx-table"></i></div>
                                    <div>
                                        <h5>Income Ledger Statements</h5>
                                        <p>Comprehensive transaction entries matching current filter settings</p>
                                    </div>
                                </div>
                                <span class="count-pill">{{ $totalRecords }} records found</span>
                            </div>

                            <div class="data-table-scroll">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px; text-align:center;">#</th>
                                            <th>Date & Time</th>
                                            <th>Member (Receiver)</th>
                                            <th>Income Type</th>
                                            <th>Source / Details</th>
                                            <th style="text-align: right;">Amount (USDT)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($transactions) == 0)
                                            <tr>
                                                <td colspan="6" class="text-center py-5 text-muted">
                                                    <i class="bx bx-folder-open d-block mb-2" style="font-size: 2.5rem;"></i>
                                                    No transactions matching these parameters were found.
                                                </td>
                                            </tr>
                                        @else
                                            @php
                                            $rowNum = $offset + 1;
                                            @endphp
                                            @foreach($transactions as $txn)
                                                @php
                                                $badgeColor = '#6c757d';
                                                $tName = getPname($txn->tType);
                                                if ($txn->tType == 'refincome') {
                                                    $badgeColor = '#ff9f43'; // Orange
                                                    $tName = 'Referral Income';
                                                } elseif ($txn->tType == 'levincome') {
                                                    $badgeColor = '#38bdf8'; // Blue
                                                    $tName = 'Level ' . ($txn->levl ?? '') . ' Income';
                                                } elseif ($txn->tType == 'sub_income') {
                                                    $badgeColor = '#00d2d3'; // Cyan
                                                    $tName = 'Subscription Income';
                                                } elseif ($txn->tType == 'pincome' || $txn->tType == 'stake_income') {
                                                    $badgeColor = '#00ff87'; // Green
                                                    $tName = 'Stake Income';
                                                }
                                                @endphp
                                                <tr>
                                                    <td class="cell-num">{{ $rowNum++ }}</td>
                                                    <td class="cell-date">
                                                        {{ date('d M Y, h:i A', strtotime($txn->created_at)) }}
                                                    </td>
                                                    <td>
                                                        <div class="member-wrap">
                                                            <div class="mem-initial">
                                                                {{ strtoupper(substr($txn->receiver_name, 0, 2)) }}
                                                            </div>
                                                            <div>
                                                                <a href="/admin/user/{{ $txn->csId }}" class="mem-link">
                                                                    {{ $txn->receiver_name }}
                                                                </a>
                                                                <div class="mt-1">
                                                                    <span class="uid-tag">{{ $txn->receiver_uid }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge" style="background: rgba(255, 255, 255, 0.03); border: 1px solid {{ $badgeColor }}; color: {{ $badgeColor }}; font-size: 11px; padding: 4px 10px; border-radius: 8px;">
                                                            {{ $tName }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($txn->tType == 'levincome' || $txn->tType == 'refincome')
                                                            @if($txn->source_uid)
                                                                <span class="text-muted">Generated by:</span>
                                                                <a href="/admin/user/{{ $txn->fcsId }}" class="mem-link" style="color: var(--gold);">
                                                                    {{ $txn->source_name }} ({{ $txn->source_uid }})
                                                                </a>
                                                            @else
                                                                <span class="text-muted">-</span>
                                                            @endif
                                                            @if($txn->planId)
                                                                @php
                                                                $plndtls = DB::table('customer_plans')->where('id', $txn->planId)->first();
                                                                @endphp
                                                                @if($plndtls)
                                                                    <div class="text-muted" style="font-size: 11px; margin-top: 4px;">
                                                                        Stake: {{ number_format($plndtls->pamount, 2) }} USDT
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @elseif($txn->tType == 'pincome' || $txn->tType == 'stake_income')
                                                            @if($txn->planId)
                                                                @php
                                                                $plndtls = DB::table('customer_plans')->where('id', $txn->planId)->first();
                                                                @endphp
                                                                @if($plndtls)
                                                                    <span class="text-muted">Plan Stake:</span>
                                                                    <span style="font-weight: 600; color: #ffffff;">{{ number_format($plndtls->pamount, 2) }} USDT</span>
                                                                @endif
                                                            @else
                                                                <span class="text-muted">Daily Profit Share</span>
                                                            @endif
                                                        @elseif($txn->tType == 'sub_income')
                                                            <span class="text-muted">Binary Subscription Matching</span>
                                                        @else
                                                            <span class="text-muted">Income Credit</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: right; font-weight: 700; color: #00D094; font-size: 13px; text-shadow: 0 0 10px rgba(0, 208, 148, 0.12);">
                                                        +{{ number_format($txn->tAmount, 3) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <!-- Custom Pagination controls -->
                            @if($totalPages > 1)
                                <div class="custom-pagination">
                                    <!-- First Page & Prev Page -->
                                    <a class="pagination-btn {{ $page == 1 ? 'disabled' : '' }}" href="?page=1{{ $queryString }}">
                                        <i class="bx bx-chevrons-left"></i> First
                                    </a>
                                    <a class="pagination-btn {{ $page == 1 ? 'disabled' : '' }}" href="?page={{ $page - 1 }}{{ $queryString }}">
                                        <i class="bx bx-chevron-left"></i> Prev
                                    </a>

                                    <!-- Dynamic Numbers around Current Page -->
                                    @php
                                    $startPage = max(1, $page - 2);
                                    $endPage = min($totalPages, $page + 2);
                                    @endphp

                                    @for($p = $startPage; $p <= $endPage; $p++)
                                        <a class="pagination-btn {{ $page == $p ? 'active' : '' }}" href="?page={{ $p }}{{ $queryString }}">
                                            {{ $p }}
                                        </a>
                                    @endfor

                                    <!-- Next Page & Last Page -->
                                    <a class="pagination-btn {{ $page == $totalPages ? 'disabled' : '' }}" href="?page={{ $page + 1 }}{{ $queryString }}">
                                        Next <i class="bx bx-chevron-right"></i>
                                    </a>
                                    <a class="pagination-btn {{ $page == $totalPages ? 'disabled' : '' }}" href="?page={{ $totalPages }}{{ $queryString }}">
                                        Last <i class="bx bx-chevrons-right"></i>
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>

                    <!-- Footer -->
                    @include('dashboard.dcards.footer')

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/js/main.js"></script>

    <!-- Client-side Searchable Customer Select Filter -->
    <script>
        $(document).ready(function() {
            $('#custSearchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#customerSelect option').each(function() {
                    var text = $(this).text().toLowerCase();
                    // Keep the first empty option always visible
                    if ($(this).val() === "") {
                        $(this).show();
                        return;
                    }
                    if (text.indexOf(value) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
</body>
</html>
