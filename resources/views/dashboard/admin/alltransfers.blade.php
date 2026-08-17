<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Carbon\Carbon;
$i = 0;
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>All System & P2P Transfers History | GoldenWay Admin</title>
    <meta name="description" content="Admin panel – view all customer transfers including P2P, Staking, Subscriptions and AutoPoll credit usages." />
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png" />
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
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.5px;
            margin-bottom: 6px;
        }

        .hero-sub {
            color: var(--text-sub);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            opacity: 0.8;
        }

        .stat-card.s-gold::after { background: linear-gradient(90deg, var(--gold) 0%, var(--gold2) 100%); }
        .stat-card.s-purple::after { background: linear-gradient(90deg, var(--purple) 0%, #a855f7 100%); }
        .stat-card.s-blue::after { background: linear-gradient(90deg, var(--blue) 0%, #0284c7 100%); }

        .stat-icon-wrap {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 16px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: var(--text-sub);
        }

        .s-gold .stat-icon-wrap { color: var(--gold); }
        .s-purple .stat-icon-wrap { color: var(--purple); }
        .s-blue .stat-icon-wrap { color: var(--blue); }

        .stat-label {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .stat-value {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-main);
            margin: 8px 0 4px 0;
            letter-spacing: -0.5px;
            display: flex;
            align-items: baseline;
            gap: 4px;
        }

        .stat-unit {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .stat-hint {
            font-size: 0.72rem;
            color: var(--text-muted);
        }

        .filter-panel {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 22px;
        }

        .form-control, .form-select {
            background: rgba(0, 0, 0, 0.3) !important;
            border: 1.5px solid rgba(255, 255, 255, 0.07) !important;
            color: #fff !important;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 13px;
        }

        .form-control:focus, .form-select:focus {
            border-color: rgba(245, 197, 24, 0.4) !important;
            box-shadow: 0 0 0 3px rgba(245, 197, 24, 0.08) !important;
        }

        .btn-search {
            background: linear-gradient(135deg, #f5c518 0%, #e2b20f 100%);
            border: none;
            color: #05060b !important;
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 0.82rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(245, 197, 24, 0.2);
        }

        .btn-search:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(245, 197, 24, 0.3);
        }

        .btn-clear {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-sub);
            border-radius: 12px;
            padding: 12px 18px;
            font-size: 0.82rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-clear:hover {
            background: rgba(255, 255, 255, 0.09);
            color: var(--text-main);
        }

        .table-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.55);
        }

        .table-header {
            padding: 22px 28px;
            background: linear-gradient(135deg, rgba(245, 197, 24, 0.06) 0%, transparent 60%);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .table-header h5 {
            color: var(--text-main);
            font-size: 1.1rem;
            font-weight: 800;
            margin: 0 0 4px 0;
        }

        .table-header p {
            color: var(--text-muted);
            font-size: 0.78rem;
            margin: 0;
        }

        .count-pill {
            background: rgba(245, 197, 24, 0.08);
            border: 1px solid rgba(245, 197, 24, 0.25);
            color: var(--gold);
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .data-table-scroll {
            width: 100%;
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
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
            padding: 16px 20px;
            white-space: nowrap;
            text-align: left;
        }

        .data-table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.03) !important;
            transition: background 0.18s ease;
        }

        .data-table tbody tr:hover {
            background: rgba(255, 255, 255, 0.025) !important;
        }

        .data-table td {
            padding: 16px 20px;
            font-size: 0.82rem;
            color: var(--text-sub);
            white-space: nowrap;
            vertical-align: middle;
        }

        .cell-num {
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 700;
            text-align: center;
            width: 50px;
        }

        .member-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mem-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid var(--border);
        }

        .mem-initial {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-sub);
        }

        .mem-link {
            font-weight: 700;
            text-decoration: none;
            transition: color 0.15s;
        }

        .mem-link:hover {
            text-decoration: underline;
        }

        .mem-uid {
            font-size: 0.75rem;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            padding: 4px 8px;
            border-radius: 6px;
            color: var(--text-muted);
            cursor: pointer;
        }

        .mem-uid:hover {
            background: rgba(255, 255, 255, 0.06);
            color: var(--text-main);
        }

        .badge-type {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 5px 10px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .table-footer {
            padding: 20px 28px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .pg-btn {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border);
            color: var(--text-sub);
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
        }

        .pg-btn:hover:not(.disabled) {
            background: rgba(255, 255, 255, 0.09);
            color: var(--text-main);
        }

        .pg-btn.disabled {
            opacity: 0.4;
            pointer-events: none;
            cursor: not-allowed;
        }

        .pagination-info {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        @media (max-width: 991px) {
            .container-xxl {
                padding: 16px 16px !important;
            }
        }
    </style>
</head>
<body>
    @include('dashboard.dcards.naver')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('dashboard.admin.dcards.menu', ['r' => 'alltransfers'])

            <div class="layout-page">
                @include('dashboard.dcards.nav')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <?php
                        $fromDate = $_GET['from_date'] ?? '';
                        $toDate = $_GET['to_date'] ?? '';
                        $searchVal = $_GET['srch'] ?? '';
                        $customerFilterId = $_GET['customer_id'] ?? '';
                        $selectedType = $_GET['type'] ?? 'all';

                        $fromDateTime = $fromDate ? $fromDate . ' 00:00:00' : '';
                        $toDateTime = $toDate ? $toDate . ' 23:59:59' : '';

                        // Base query for all types of transfers
                        $query = DB::table('customer_transfers')
                            ->leftJoin('customers as sender', 'customer_transfers.fuserid', '=', 'sender.id')
                            ->leftJoin('customers as receiver', 'customer_transfers.tuserid', '=', 'receiver.id')
                            ->select(
                                'customer_transfers.*',
                                'sender.name as sender_name',
                                'sender.email as sender_email',
                                'sender.uid as sender_uid',
                                'sender.img as sender_img',
                                'receiver.name as receiver_name',
                                'receiver.email as receiver_email',
                                'receiver.uid as receiver_uid',
                                'receiver.img as receiver_img'
                            );

                        // Filter by selected transfer type
                        if ($selectedType == 'staking') {
                            $query->where('customer_transfers.tType', 'normal');
                        } elseif ($selectedType == 'subscriptions') {
                            $query->where('customer_transfers.tType', 'subscribe');
                        } elseif ($selectedType == 'autopoll') {
                            $query->where('customer_transfers.tType', 'autopoll');
                        } else {
                            // Show all system types (excluding 'transfer')
                            $query->whereIn('customer_transfers.tType', ['normal', 'subscribe', 'autopoll']);
                        }

                        // Filter by specific customer (sender)
                        if ($customerFilterId != '') {
                            $query->where('customer_transfers.fuserid', $customerFilterId);
                        }

                        // Filter by search keyword
                        if ($searchVal != '') {
                            $query->where(function($q) use ($searchVal) {
                                $q->where('sender.name', 'like', "%$searchVal%")
                                  ->orWhere('sender.uid', 'like', "%$searchVal%");
                            });
                        }

                        // Date filters
                        if ($fromDateTime != '') {
                            $query->where('customer_transfers.created_at', '>=', $fromDateTime);
                        }
                        if ($toDateTime != '') {
                            $query->where('customer_transfers.created_at', '<=', $toDateTime);
                        }

                        // Clone to calculate totals
                        $allFilteredTransfers = $query->orderBy('customer_transfers.id', 'desc')->get();
                        $totalTransactionsCount = count($allFilteredTransfers);

                        // Volume sums for each system type
                        $stakingVolumeSum = $allFilteredTransfers->filter(function($item) {
                            return $item->tType == 'normal';
                        })->sum(function($item) {
                            return (float)$item->tAmount;
                        });

                        $subsVolumeSum = $allFilteredTransfers->filter(function($item) {
                            return $item->tType == 'subscribe';
                        })->sum(function($item) {
                            return (float)$item->tAmount;
                        });

                        $autopollVolumeSum = $allFilteredTransfers->filter(function($item) {
                            return $item->tType == 'autopoll';
                        })->sum(function($item) {
                            return (float)$item->tAmount;
                        });

                        // Pagination setup
                        $page = (int)($_GET['page'] ?? 1);
                        if ($page < 1) $page = 1;
                        $perPage = 50;
                        $offset = ($page - 1) * $perPage;

                        $transfersList = $query->offset($offset)->limit($perPage)->get();
                        $totalPages = ceil($totalTransactionsCount / $perPage);
                        if ($totalPages < 1) $totalPages = 1;

                        // Retrieve active filter customer name if any
                        $filterCustomerName = '';
                        if ($customerFilterId != '') {
                            $filterCustomerName = DB::table('customers')->where('id', $customerFilterId)->value('name') ?? 'Selected Customer';
                        }
                        ?>

                        <!-- Hero Header Card -->
                        <div class="hero-header">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div>
                                    <h4 class="hero-title">Platform Transfers History</h4>
                                    <p class="hero-sub">
                                        @if($customerFilterId != '')
                                        Showing credit usage (subscriptions, staking, autopoll) for customer <strong>{{ $filterCustomerName }}</strong>
                                        @else
                                        Complete log of system staking, subscriptions, and autopoll credit transfers
                                        @endif
                                    </p>
                                </div>
                                <div class="d-flex gap-2">
                                    @if($customerFilterId != '')
                                    <a href="/admin/transfers/all" class="btn btn-sm btn-clear" style="padding: 10px 18px;">
                                        Show All Users
                                    </a>
                                    <a href="/admin/transfers/p2p?customer_id={{ $customerFilterId }}" class="btn btn-sm btn-clear" style="padding: 10px 18px; border-color: rgba(56, 189, 248, 0.4); color: #38bdf8 !important;">
                                        <i class="bx bx-group"></i> P2P Transfers Only
                                    </a>
                                    @else
                                    <a href="/admin/transfers/p2p" class="btn btn-sm btn-clear" style="padding: 10px 18px; border-color: rgba(56, 189, 248, 0.4); color: #38bdf8 !important;">
                                        <i class="bx bx-group"></i> P2P Transfers Only
                                    </a>
                                    @endif
                                    <a href="/admin/income/volume-details" class="btn btn-sm btn-clear" style="padding: 10px 18px;">
                                        <i class="bx bx-left-arrow-alt"></i> Volume Details
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="stat-grid">
                            <div class="stat-card s-gold">
                                <div class="stat-icon-wrap"><i class="bx bx-purchase-tag-alt"></i></div>
                                <div class="stat-label">Staking Volume</div>
                                <div class="stat-value">{{ number_format($stakingVolumeSum, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">Total transfer credit staked</div>
                            </div>
                            <div class="stat-card s-blue">
                                <div class="stat-icon-wrap"><i class="bx bx-layer"></i></div>
                                <div class="stat-label">Subscriptions Volume</div>
                                <div class="stat-value">{{ number_format($subsVolumeSum, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">Total transfer credit subscribed</div>
                            </div>
                            <div class="stat-card s-purple">
                                <div class="stat-icon-wrap"><i class="bx bx-trending-up"></i></div>
                                <div class="stat-label">AutoPoll Volume</div>
                                <div class="stat-value">{{ number_format($autopollVolumeSum, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">Total transfer credit auto-poll usage</div>
                            </div>
                        </div>

                        <!-- Filters Panel -->
                        <div class="filter-panel" style="padding: 12px 18px; border-radius: 14px; margin-bottom: 20px;">
                            <form method="GET" action="/admin/transfers/all" id="filterForm">
                                <input type="hidden" name="customer_id" value="{{ $customerFilterId }}">
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                    <!-- Left: Filters & Search Inputs -->
                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <!-- Type Filter -->
                                        <div class="d-flex align-items-center gap-1">
                                            <span style="font-size: 11px; color: var(--text-muted);">Type:</span>
                                            <select name="type" class="form-select form-select-sm" style="width: auto; height: 32px; font-size: 11px; padding: 4px 10px; background-color: var(--bg-card2); border-color: var(--border); color: #fff;" onchange="this.form.submit()">
                                                <option value="all" @if($selectedType == 'all') selected @endif>All System</option>
                                                <option value="staking" @if($selectedType == 'staking') selected @endif>Staking Only</option>
                                                <option value="subscriptions" @if($selectedType == 'subscriptions') selected @endif>Subscriptions Only</option>
                                                <option value="autopoll" @if($selectedType == 'autopoll') selected @endif>AutoPoll Only</option>
                                            </select>
                                        </div>

                                        <!-- Date range fields -->
                                        <div class="d-flex align-items-center gap-1">
                                            <span style="font-size: 11px; color: var(--text-muted);">From:</span>
                                            <input type="date" name="from_date" class="form-control form-control-sm" style="width: 120px; height: 32px; font-size: 11px; padding: 4px 8px; background-color: var(--bg-card2); border-color: var(--border); color: #fff;" value="{{ $fromDate }}">
                                            <span style="font-size: 11px; color: var(--text-muted);">To:</span>
                                            <input type="date" name="to_date" class="form-control form-control-sm" style="width: 120px; height: 32px; font-size: 11px; padding: 4px 8px; background-color: var(--bg-card2); border-color: var(--border); color: #fff;" value="{{ $toDate }}">
                                        </div>

                                        <!-- Date shortcuts group -->
                                        <div style="display: inline-flex; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border); border-radius: 8px; overflow: hidden; padding: 2px;">
                                            <button type="button" onclick="setTodayFilter()" class="btn-clear" style="padding: 4px 10px; font-size: 10px; height: 26px; border: none; border-radius: 6px; background: transparent;">Today</button>
                                            <button type="button" onclick="setYesterdayFilter()" class="btn-clear" style="padding: 4px 10px; font-size: 10px; height: 26px; border: none; border-radius: 6px; background: transparent;">Yesterday</button>
                                            <button type="button" onclick="setLastWeekFilter()" class="btn-clear" style="padding: 4px 10px; font-size: 10px; height: 26px; border: none; border-radius: 6px; background: transparent;">Last Week</button>
                                        </div>

                                        <!-- Search field -->
                                        <div style="position: relative;">
                                            <input type="text" name="srch" class="form-control form-control-sm" style="width: 200px; height: 32px; font-size: 11px; padding: 4px 10px; background-color: var(--bg-card2); border-color: var(--border); color: #fff;" placeholder="Search sender..." value="{{ $searchVal }}">
                                        </div>
                                    </div>

                                    <!-- Right: Action buttons -->
                                    <div class="d-flex align-items-center gap-2">
                                        <button type="submit" class="btn-search" style="padding: 6px 14px; font-size: 11px; height: 32px; border-radius: 8px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; box-shadow: none;">
                                            <i class="bx bx-filter-alt"></i> Apply
                                        </button>
                                        @if(!empty($searchVal) || !empty($fromDate) || !empty($toDate) || $customerFilterId != '' || $selectedType != 'all')
                                        <a href="/admin/transfers/all" class="btn-clear" style="padding: 6px 12px; font-size: 11px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; gap: 4px;">
                                            <i class="bx bx-x-circle"></i> Clear
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Data Table Card -->
                        <div class="table-card">
                            <div class="table-header">
                                <div class="table-header-left">
                                    <div class="table-header-icon"><i class="bx bx-table"></i></div>
                                    <div>
                                        <h5>Transfers Log List</h5>
                                        <p>Staking, Subscriptions, and AutoPoll transfer logs</p>
                                    </div>
                                </div>
                                <span class="count-pill">{{ $totalTransactionsCount }} records found</span>
                            </div>

                            <div class="data-table-scroll">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th class="cell-num">#</th>
                                            <th>Sender / Initiator</th>
                                            <th>Recipient / Destination</th>
                                            <th>Transfer Type</th>
                                            <th>Gross Amount</th>
                                            <th>Admin Fee</th>
                                            <th>Net Amount</th>
                                            <th>Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transfersList as $item)
                                        @php
                                        $i++;
                                        $senderInitials = strtoupper(substr($item->sender_name ?? 'S', 0, 1));
                                        $receiverInitials = strtoupper(substr($item->receiver_name ?? 'R', 0, 1));
                                        @endphp
                                        <tr>
                                            <td class="cell-num">{{ $offset + $i }}</td>
                                            
                                            <!-- Sender/Initiator -->
                                            <td>
                                                @if(empty($item->fuserid) || empty($item->sender_name))
                                                <div class="member-info">
                                                    <div class="mem-initial" style="background: rgba(215, 131, 255, 0.1); border-color: rgba(215, 131, 255, 0.3); color: var(--purple);">A</div>
                                                    <span style="color: var(--purple); font-weight: 700;">System / Admin</span>
                                                </div>
                                                @else
                                                <div class="member-info">
                                                    @if($item->sender_img)
                                                    <img src="{{ $item->sender_img }}" class="mem-avatar" alt="avatar">
                                                    @else
                                                    <div class="mem-initial" style="color: var(--gold2); border-color: rgba(255, 159, 67, 0.3);">{{ $senderInitials }}</div>
                                                    @endif
                                                    <div>
                                                        <a href="/admin/user/{{ $item->fuserid }}" class="mem-link" style="color: var(--gold2);">{{ $item->sender_name }}</a>
                                                        <div style="margin-top: 2px;">
                                                            <span class="mem-uid" onclick="copyToClipboard('{{ $item->sender_uid }}', this)" title="Click to copy UID" style="font-size: 0.65rem; padding: 1px 4px;">{{ $item->sender_uid }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </td>

                                            <!-- Recipient/Destination -->
                                            <td>
                                                 @if($item->tType == 'normal')
                                                 <div class="member-info">
                                                     <div class="mem-initial" style="background: rgba(215, 131, 255, 0.1); border-color: rgba(215, 131, 255, 0.3); color: var(--purple);"><i class="bx bx-purchase-tag-alt"></i></div>
                                                     <span style="color: var(--purple); font-weight: 700;">Staking Plan (System)</span>
                                                 </div>
                                                 @elseif($item->tType == 'subscribe')
                                                 <div class="member-info">
                                                     <div class="mem-initial" style="background: rgba(215, 131, 255, 0.1); border-color: rgba(215, 131, 255, 0.3); color: var(--purple);"><i class="bx bx-layer"></i></div>
                                                     <span style="color: var(--purple); font-weight: 700;">Subscription (System)</span>
                                                 </div>
                                                 @elseif($item->tType == 'autopoll')
                                                 <div class="member-info">
                                                     <div class="mem-initial" style="background: rgba(215, 131, 255, 0.1); border-color: rgba(215, 131, 255, 0.3); color: var(--purple);"><i class="bx bx-trending-up"></i></div>
                                                     <span style="color: var(--purple); font-weight: 700;">AutoPoll Slot (System)</span>
                                                 </div>
                                                 @else
                                                    <div class="member-info">
                                                        @if($item->receiver_img)
                                                        <img src="{{ $item->receiver_img }}" class="mem-avatar" alt="avatar">
                                                        @else
                                                        <div class="mem-initial" style="color: var(--blue); border-color: rgba(56, 189, 248, 0.3);">{{ $receiverInitials }}</div>
                                                        @endif
                                                        <div>
                                                            <a href="/admin/user/{{ $item->tuserid }}" class="mem-link" style="color: var(--blue);">{{ $item->receiver_name }}</a>
                                                            <div style="margin-top: 2px;">
                                                                <span class="mem-uid" onclick="copyToClipboard('{{ $item->receiver_uid }}', this)" title="Click to copy UID" style="font-size: 0.65rem; padding: 1px 4px;">{{ $item->receiver_uid }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 @endif
                                            </td>

                                            <!-- Transfer Type Badge -->
                                            <td>
                                                 @if($item->tType == 'normal')
                                                 <span class="badge-type" style="background: rgba(0, 255, 135, 0.12); color: #00ff87; border: 1px solid rgba(0, 255, 135, 0.3);">Staking Transfer</span>
                                                 @elseif($item->tType == 'subscribe')
                                                 <span class="badge-type" style="background: rgba(255, 215, 0, 0.12); color: #ffd700; border: 1px solid rgba(255, 215, 0, 0.3);">Subscription</span>
                                                 @elseif($item->tType == 'autopoll')
                                                 <span class="badge-type" style="background: rgba(215, 131, 255, 0.12); color: #d783ff; border: 1px solid rgba(215, 131, 255, 0.3);">AutoPoll</span>
                                                 @else
                                                 <span class="badge-type" style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3);">P2P Transfer</span>
                                                 @endif
                                            </td>

                                            <!-- Gross Amount -->
                                            <td>
                                                <span style="color: {{ (float)$item->tAmount == 0 ? '#ff6b6b' : '#00ff87' }} !important; font-weight: 700;">
                                                    {{ (float)$item->tAmount == 0 ? '--' : number_format($item->tAmount, 2) }}
                                                </span>
                                            </td>

                                            <!-- Admin Fee -->
                                            <td>
                                                <span style="color: {{ (float)$item->fee == 0 ? '#cbd5e1' : '#ff6b6b' }} !important; font-weight: 600;">
                                                    {{ (float)$item->fee == 0 ? '--' : number_format($item->fee, 2) }}
                                                </span>
                                            </td>

                                            <!-- Net Amount -->
                                            <td>
                                                @php $netAmount = (float)$item->tAmount - (float)$item->fee; @endphp
                                                <span style="color: {{ $netAmount == 0 ? '#ff6b6b' : '#38bdf8' }} !important; font-weight: 700;">
                                                    {{ $netAmount == 0 ? '--' : number_format($netAmount, 2) }}
                                                </span>
                                            </td>

                                            <!-- Date & Time -->
                                            <td style="font-size: 0.78rem; color: var(--text-muted);">
                                                {{ $item->created_at }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @if(count($transfersList) == 0)
                                        <tr>
                                            <td colspan="8" style="text-align: center; padding: 40px; color: var(--text-muted);">
                                                No transfers found matching current criteria.
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <!-- Table Footer / Pagination -->
                            <div class="table-footer">
                                <div class="pagination-info">
                                    Showing {{ count($transfersList) }} records (Page {{ $page }} of {{ $totalPages }})
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ $page > 1 ? '/admin/transfers/all?' . http_build_query(array_merge($_GET, ['page' => $page - 1])) : '#' }}" 
                                       class="pg-btn {{ $page <= 1 ? 'disabled' : '' }}">
                                        Previous
                                    </a>
                                    <a href="{{ $page < $totalPages ? '/admin/transfers/all?' . http_build_query(array_merge($_GET, ['page' => $page + 1])) : '#' }}" 
                                       class="pg-btn {{ $page >= $totalPages ? 'disabled' : '' }}">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts and functions -->
    <script>
        function setTodayFilter() {
            const today = new Date().toISOString().substring(0, 10);
            document.getElementsByName('from_date')[0].value = today;
            document.getElementsByName('to_date')[0].value = today;
            document.getElementById('filterForm').submit();
        }

        function setYesterdayFilter() {
            const yesterday = new Date();
            yesterday.setDate(yesterday.getDate() - 1);
            const yesterdayStr = yesterday.toISOString().substring(0, 10);
            document.getElementsByName('from_date')[0].value = yesterdayStr;
            document.getElementsByName('to_date')[0].value = yesterdayStr;
            document.getElementById('filterForm').submit();
        }

        function setLastWeekFilter() {
            const today = new Date();
            const lastWeek = new Date();
            lastWeek.setDate(today.getDate() - 7);
            document.getElementsByName('from_date')[0].value = lastWeek.toISOString().substring(0, 10);
            document.getElementsByName('to_date')[0].value = today.toISOString().substring(0, 10);
            document.getElementById('filterForm').submit();
        }

        function copyToClipboard(text, element) {
            navigator.clipboard.writeText(text).then(function() {
                const originalText = element.innerText;
                element.innerText = "COPIED!";
                element.style.color = "var(--green)";
                setTimeout(function() {
                    element.innerText = originalText;
                    element.style.color = "";
                }, 1000);
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
</body>
</html>
