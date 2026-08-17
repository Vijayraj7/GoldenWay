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
    <title>Customer P2P Transfers History | GoldenWay Admin</title>
    <meta name="description" content="Admin panel – view all customer to customer peer-to-peer credit transfers." />
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold2) 100%);
            color: #08090f;
            border: none;
            border-radius: 12px;
            padding: 12px 26px;
            font-size: 0.88rem;
            font-weight: 800;
            cursor: pointer;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 7px;
            transition: all 0.3s;
            box-shadow: 0 4px 20px rgba(245, 197, 24, 0.28);
            letter-spacing: 0.3px;
        }

        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(245, 197, 24, 0.4);
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

        .table-header-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .table-header-icon {
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, var(--gold), var(--gold2));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #08090f;
            box-shadow: 0 6px 20px rgba(245, 197, 24, 0.3);
            flex-shrink: 0;
        }

        .table-header h5 {
            color: var(--text-main);
            font-size: 1rem;
            font-weight: 700;
        }

        .table-header p {
            color: var(--text-sub);
            font-size: 0.72rem;
            margin-top: 2px;
        }

        .count-pill {
            background: rgba(245, 197, 24, 0.1);
            border: 1px solid rgba(245, 197, 24, 0.2);
            color: var(--gold);
            border-radius: 30px;
            padding: 5px 16px;
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.3px;
        }

        .data-table-scroll {
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
            background: rgba(255, 255, 255, 0.035) !important;
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

        .member-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mem-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid rgba(245, 197, 24, 0.3);
            flex-shrink: 0;
        }

        .mem-initial {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a2040, #242e50);
            border: 1.5px solid rgba(255, 255, 255, 0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            color: #fff;
            font-weight: 700;
            flex-shrink: 0;
        }

        .mem-link {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.15s;
        }

        .mem-link:hover {
            color: var(--gold);
        }

        .mem-uid {
            font-size: 0.7rem;
            color: var(--text-muted);
            font-family: monospace;
            background: rgba(255, 255, 255, 0.04);
            padding: 2px 6px;
            border-radius: 4px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            cursor: pointer;
            transition: all 0.2s;
        }

        .mem-uid:hover {
            color: var(--gold);
            background: rgba(245, 197, 24, 0.08);
            border-color: rgba(245, 197, 24, 0.2);
        }

        .amount-val {
            font-size: 0.88rem;
            font-weight: 700;
        }

        .amount-val.positive {
            color: #00ff87;
        }

        .amount-val.negative {
            color: #ff6b6b;
        }

        .c-muted {
            color: var(--text-muted);
        }

        /* Pagination styles */
        .pagination-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 28px;
            background: rgba(0,0,0,0.15);
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination-btn {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            color: var(--text-sub);
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s;
        }

        .pagination-btn:hover:not(.disabled) {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }

        .pagination-btn.disabled {
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
            @include('dashboard.admin.dcards.menu', ['r' => 'p2ptransfers'])

            <div class="layout-page">
                @include('dashboard.dcards.nav')

                <div class="content-wrapper">
                    {{-- @include('dashboard.dcards.wallet', ['snd' => false, 'adminwlt' => true]) --}}

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <?php
                        $fromDate = $_GET['from_date'] ?? '';
                        $toDate = $_GET['to_date'] ?? '';
                        $searchVal = $_GET['srch'] ?? '';
                        $customerFilterId = $_GET['customer_id'] ?? '';

                        $fromDateTime = $fromDate ? $fromDate . ' 00:00:00' : '';
                        $toDateTime = $toDate ? $toDate . ' 23:59:59' : '';

                        // Base query for P2P transfers
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
                            )
                            ->where('customer_transfers.tType', 'transfer');

                        // Filter by specific customer (sender or receiver)
                        if ($customerFilterId != '') {
                            $query->where(function($q) use ($customerFilterId) {
                                $q->where('customer_transfers.fuserid', $customerFilterId)
                                  ->orWhere('customer_transfers.tuserid', $customerFilterId);
                            });
                        }

                        // Filter by search keyword
                        if ($searchVal != '') {
                            $query->where(function($q) use ($searchVal) {
                                $q->where('sender.name', 'like', "%$searchVal%")
                                  ->orWhere('sender.uid', 'like', "%$searchVal%")
                                  ->orWhere('receiver.name', 'like', "%$searchVal%")
                                  ->orWhere('receiver.uid', 'like', "%$searchVal%");
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
                        $totalVolumeSum = $allFilteredTransfers->sum(function($item) {
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

                        <!-- Hero Header -->
                        <div class="hero-header">
                            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                                <div>
                                    <h1 class="hero-title">Customer to Customer Transfers</h1>
                                    <p class="hero-sub">
                                        @if($customerFilterId != '')
                                        Showing credit transfer log for customer <strong>{{ $filterCustomerName }}</strong>
                                        @else
                                        Complete log of peer-to-peer credit balance transactions
                                        @endif
                                    </p>
                                </div>
                                <div class="d-flex gap-2">
                                    @if($customerFilterId != '')
                                    <a href="/admin/transfers/p2p" class="btn btn-sm btn-clear" style="padding: 10px 18px;">
                                        Show All Users
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
                            <div class="stat-card s-purple">
                                <div class="stat-icon-wrap"><i class="bx bx-transfer"></i></div>
                                <div class="stat-label">Total Transactions</div>
                                <div class="stat-value">{{ number_format($totalTransactionsCount) }}<span class="stat-unit">Transfers</span></div>
                                <div class="stat-hint">P2P operations for selection</div>
                            </div>
                            <div class="stat-card s-gold">
                                <div class="stat-icon-wrap"><i class="bx bx-purchase-tag-alt"></i></div>
                                <div class="stat-label">Total Volume Transferred</div>
                                <div class="stat-value">{{ number_format($totalVolumeSum, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">Aggregated transfer credits</div>
                            </div>
                        </div>

                        <!-- Filters Panel -->
                        <div class="filter-panel" style="padding: 12px 18px; border-radius: 14px; margin-bottom: 20px;">
                            <form method="GET" action="/admin/transfers/p2p" id="filterForm">
                                <input type="hidden" name="customer_id" value="{{ $customerFilterId }}">
                                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                    <!-- Left: Filters & Search Inputs -->
                                    <div class="d-flex flex-wrap align-items-center gap-2">
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
                                            <input type="text" name="srch" class="form-control form-control-sm" style="width: 200px; height: 32px; font-size: 11px; padding: 4px 10px; background-color: var(--bg-card2); border-color: var(--border); color: #fff;" placeholder="Search sender or recipient..." value="{{ $searchVal }}">
                                        </div>
                                    </div>

                                    <!-- Right: Action buttons -->
                                    <div class="d-flex align-items-center gap-2">
                                        <button type="submit" class="btn-search" style="padding: 6px 14px; font-size: 11px; height: 32px; border-radius: 8px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; box-shadow: none;">
                                            <i class="bx bx-filter-alt"></i> Apply
                                        </button>
                                        @if(!empty($searchVal) || !empty($fromDate) || !empty($toDate) || $customerFilterId != '')
                                        <a href="/admin/transfers/p2p" class="btn-clear" style="padding: 6px 12px; font-size: 11px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; gap: 4px;">
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
                                        <h5>Transfer Records</h5>
                                        <p>Standard P2P credit balance routing logs</p>
                                    </div>
                                </div>
                                <span class="count-pill">{{ $totalTransactionsCount }} records</span>
                            </div>

                            <div class="data-table-scroll">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th class="cell-num">#</th>
                                            <th>Date & Time</th>
                                            <th>Sender Customer</th>
                                            <th>Sender UID</th>
                                            <th>Recipient Customer</th>
                                            <th>Recipient UID</th>
                                            <th>Transferred Amount</th>
                                            <th>Fee / Charge</th>
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
                                            <td>
                                                <span class="text-muted"><i class="bx bx-calendar-alt me-1"></i>{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Dubai')->format('d M, Y') }}</span>
                                                <br>
                                                <span style="font-size: 11px; color: rgba(255,255,255,0.45);"><i class="bx bx-time-five me-1"></i>{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Dubai')->format('h:i a') }} <span style="font-size:9px;opacity:0.6;">GST</span></span>
                                            </td>
                                            <td>
                                                <div class="member-wrap">
                                                    @if($item->sender_name)
                                                        @if($item->sender_img)
                                                        <img src="{{ $item->sender_img }}" class="mem-avatar" alt="avatar" style="border-color: rgba(255, 159, 67, 0.4) !important;">
                                                        @else
                                                        <div class="mem-initial" style="background: linear-gradient(135deg, #ff9f43, #d97706); color: #05060b; font-weight: 700;">{{ $senderInitials }}</div>
                                                        @endif
                                                        <a href="/admin/user/{{ $item->fuserid }}" class="mem-link" style="color: #ff9f43 !important;">{{ $item->sender_name }}</a>
                                                    @else
                                                        <div class="mem-initial" style="background: linear-gradient(135deg, #d783ff, #a855f7); color: #05060b; font-weight: 700;">S</div>
                                                        <span style="color: #d783ff !important; font-weight: 600;">System / Admin</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($item->sender_uid)
                                                <span class="mem-uid" onclick="copyToClipboard('{{ $item->sender_uid }}', this)" title="Click to copy UID" style="color: #ff9f43 !important; border-color: rgba(255, 159, 67, 0.2) !important; background: rgba(255, 159, 67, 0.05) !important;">
                                                    {{ $item->sender_uid }}
                                                </span>
                                                @else
                                                <span class="mem-uid" onclick="copyToClipboard('SYSTEM', this)" title="System action" style="color: #d783ff !important; border-color: rgba(215, 131, 255, 0.2) !important; background: rgba(215, 131, 255, 0.05) !important;">SYSTEM</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="member-wrap">
                                                    @if($item->receiver_name)
                                                        @if($item->receiver_img)
                                                        <img src="{{ $item->receiver_img }}" class="mem-avatar" alt="avatar" style="border-color: rgba(56, 189, 248, 0.4) !important;">
                                                        @else
                                                        <div class="mem-initial" style="background: linear-gradient(135deg, #38bdf8, #0284c7); color: #05060b; font-weight: 700;">{{ $receiverInitials }}</div>
                                                        @endif
                                                        <a href="/admin/user/{{ $item->tuserid }}" class="mem-link" style="color: #38bdf8 !important;">{{ $item->receiver_name }}</a>
                                                    @else
                                                        <div class="mem-initial" style="background: linear-gradient(135deg, #d783ff, #a855f7); color: #05060b; font-weight: 700;">S</div>
                                                        <span style="color: #d783ff !important; font-weight: 600;">System / Admin</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($item->receiver_uid)
                                                <span class="mem-uid" onclick="copyToClipboard('{{ $item->receiver_uid }}', this)" title="Click to copy UID" style="color: #38bdf8 !important; border-color: rgba(56, 189, 248, 0.2) !important; background: rgba(56, 189, 248, 0.05) !important;">
                                                    {{ $item->receiver_uid }}
                                                </span>
                                                @else
                                                <span class="mem-uid" onclick="copyToClipboard('SYSTEM', this)" title="System action" style="color: #d783ff !important; border-color: rgba(215, 131, 255, 0.2) !important; background: rgba(215, 131, 255, 0.05) !important;">SYSTEM</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="amount-val positive">
                                                    {{ (float)$item->tAmount == 0 ? '--' : number_format((float)$item->tAmount, 2) . ' USDT' }}
                                                </span>
                                            </td>
                                            <td>
                                                @if(!empty($item->fee) && (float)$item->fee != 0)
                                                <span class="amount-val negative">
                                                    {{ number_format((float)$item->fee, 2) }} USDT
                                                </span>
                                                @else
                                                <span style="color: var(--text-muted);">--</span>
                                                @endif
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

                            <!-- Pagination block -->
                            @if($totalPages > 1)
                            <div class="pagination-container">
                                <span class="pagination-info">Showing Page {{ $page }} of {{ $totalPages }}</span>
                                <div class="d-flex gap-2">
                                    <a href="/admin/transfers/p2p?page={{ $page - 1 }}&from_date={{ $fromDate }}&to_date={{ $toDate }}&srch={{ $searchVal }}&customer_id={{ $customerFilterId }}" class="pagination-btn @if($page <= 1) disabled @endif">
                                        &laquo; Prev
                                    </a>
                                    <a href="/admin/transfers/p2p?page={{ $page + 1 }}&from_date={{ $fromDate }}&to_date={{ $toDate }}&srch={{ $searchVal }}&customer_id={{ $customerFilterId }}" class="pagination-btn @if($page >= $totalPages) disabled @endif">
                                        Next &raquo;
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>

                    @include('dashboard.dcards.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text, element) {
            navigator.clipboard.writeText(text).then(function() {
                var originalText = element.innerText;
                element.innerText = "Copied!";
                element.style.color = "#00ff87";
                setTimeout(function() {
                    element.innerText = originalText;
                    element.style.color = "";
                }, 1200);
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }

        function setTodayFilter() {
            const now = new Date();
            const todayStr = formatDate(now);
            document.querySelector('input[name="from_date"]').value = todayStr;
            document.querySelector('input[name="to_date"]').value = todayStr;
            document.getElementById('filterForm').submit();
        }

        function setYesterdayFilter() {
            const yesterday = new Date();
            yesterday.setDate(yesterday.getDate() - 1);
            const yesterdayStr = formatDate(yesterday);
            document.querySelector('input[name="from_date"]').value = yesterdayStr;
            document.querySelector('input[name="to_date"]').value = yesterdayStr;
            document.getElementById('filterForm').submit();
        }

        function setLastWeekFilter() {
            const now = new Date();
            const lastWeekStart = new Date();
            lastWeekStart.setDate(now.getDate() - 7);
            document.querySelector('input[name="from_date"]').value = formatDate(lastWeekStart);
            document.querySelector('input[name="to_date"]').value = formatDate(now);
            document.getElementById('filterForm').submit();
        }

        function formatDate(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
    </script>

    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
