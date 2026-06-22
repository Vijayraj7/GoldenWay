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
    <title>All Customers | GoldenWay Admin</title>
    <meta name="description" content="Admin panel – manage all GoldenWay customers." />
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
            --bg-deep: #080a12;
            --bg-card: #0e1120;
            --bg-card2: #111525;
            --border: rgba(255, 255, 255, 0.06);
            --gold: #f5c518;
            --gold2: #ff8c00;
            --green: #22d17a;
            --blue: #4fa3f7;
            --purple: #b97aff;
            --red: #ff5f5f;
            --text-main: #e8edf8;
            --text-sub: #8892ae;
            --text-muted: #5a6480;
        }

        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* ── Layout overrides ── */
        body,
        .layout-page,
        .content-wrapper {
            background: var(--bg-deep) !important;
        }

        .container-xxl {
            max-width: 100% !important;
            padding: 24px 28px !important;
        }

        /* ── Wallet card theme override ── */
        .wallet-card,
        .premium-card,
        .wallet-container .card,
        .wallet-container .premium-card {
            background: #0e1120 !important;
            border: 1px solid rgba(255, 255, 255, 0.07) !important;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5) !important;
        }

        .wallet-container {
            max-width: 640px !important;
        }

        .wallet-container .card-body {
            background: transparent !important;
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

        .hero-header::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: 40px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(79, 163, 247, 0.06) 0%, transparent 70%);
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

        .hero-badge i {
            font-size: 1rem;
        }

        /* ── Stat grid ── */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        @media(max-width:900px) {
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
            padding: 24px;
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

        .stat-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 16px;
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

        .stat-label {
            color: var(--text-sub);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 1.9rem;
            font-weight: 800;
            line-height: 1;
            color: var(--text-main);
            letter-spacing: -0.5px;
        }

        .stat-unit {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--text-sub);
            margin-left: 4px;
            vertical-align: middle;
        }

        .stat-hint {
            color: var(--text-muted);
            font-size: 0.7rem;
            margin-top: 6px;
        }

        /* ── Search ── */
        .search-wrap {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 18px 22px;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .search-field {
            flex: 1;
            position: relative;
        }

        .search-field i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-sub);
            font-size: 1.1rem;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.035);
            border: 1.5px solid rgba(255, 255, 255, 0.07);
            border-radius: 12px;
            color: var(--text-main);
            padding: 12px 16px 12px 46px;
            font-size: 0.88rem;
            font-weight: 500;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .search-input:focus {
            border-color: rgba(245, 197, 24, 0.4);
            box-shadow: 0 0 0 4px rgba(245, 197, 24, 0.08);
        }

        .search-input::placeholder {
            color: var(--text-muted);
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

        /* ── Table card ── */
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

        /* ── Table ── */
        .data-table-scroll {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1200px;
        }

        .data-table thead {
            position: sticky;
            top: 0;
            z-index: 2;
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
            text-align: left;
        }

        .data-table tbody tr {
            border: none !important;
            transition: background 0.18s ease;
        }

        .data-table tbody tr:hover {
            background: rgba(245, 197, 24, 0.025);
        }

        .data-table td {
            padding: 14px 16px;
            font-size: 0.8rem;
            color: #8892ae;
            white-space: nowrap;
            vertical-align: middle;
            border: none !important;
        }

        /* Cells */
        .cell-num {
            color: #5a6480;
            font-size: 0.7rem;
            font-weight: 700;
            text-align: center;
            min-width: 36px;
        }

        .cell-date {
            line-height: 1.55;
        }

        .cell-date .d1 {
            color: #c2cce8;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .cell-date .d2 {
            color: #8892ae;
            font-size: 0.68rem;
        }

        .member-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mem-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(245, 197, 24, 0.35);
            flex-shrink: 0;
        }

        .mem-initial {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a2040, #242e50);
            border: 2px solid rgba(255, 255, 255, 0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--gold);
            flex-shrink: 0;
        }

        .mem-link {
            color: #c2cce8;
            font-weight: 600;
            font-size: 0.83rem;
            text-decoration: none;
            transition: color 0.2s;
        }

        .mem-link:hover {
            color: var(--gold);
        }

        .ref-cell {
            color: #8892ae;
            font-size: 0.76rem;
        }

        .ref-cell .ref-name {
            color: #aab4cc;
            font-weight: 500;
        }

        .rank-tag {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 30px;
            font-size: 0.65rem;
            font-weight: 800;
            letter-spacing: 0.3px;
            white-space: nowrap;
        }

        .uid-tag {
            font-family: 'Courier New', monospace;
            font-size: 0.7rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 7px;
            padding: 3px 8px;
            color: #8892ae;
        }

        /* Status pills */
        .pill-active {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(34, 209, 122, 0.1);
            border: 1px solid rgba(34, 209, 122, 0.22);
            color: var(--green);
            border-radius: 30px;
            padding: 3px 10px;
            font-size: 0.67rem;
            font-weight: 700;
        }

        .pill-active::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--green);
            animation: pulse-green 2s infinite;
        }

        @keyframes pulse-green {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(34, 209, 122, 0.5);
            }

            50% {
                box-shadow: 0 0 0 4px rgba(34, 209, 122, 0);
            }
        }

        .pill-inactive {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(255, 95, 95, 0.08);
            border: 1px solid rgba(255, 95, 95, 0.18);
            color: var(--red);
            border-radius: 30px;
            padding: 3px 10px;
            font-size: 0.67rem;
            font-weight: 700;
        }

        .pill-inactive::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--red);
        }

        .days-tag {
            background: rgba(79, 163, 247, 0.1);
            border: 1px solid rgba(79, 163, 247, 0.2);
            color: var(--blue);
            border-radius: 30px;
            padding: 2px 8px;
            font-size: 0.65rem;
            font-weight: 700;
        }

        /* Amount color classes */
        .c-gold {
            color: var(--gold);
            font-weight: 700;
        }

        .c-green {
            color: var(--green);
            font-weight: 700;
        }

        .c-blue {
            color: var(--blue);
            font-weight: 600;
        }

        .c-purple {
            color: var(--purple);
            font-weight: 600;
            font-size: 0.68rem;
        }

        .c-orange {
            color: var(--gold2);
            font-weight: 600;
        }

        .c-red {
            color: var(--red);
            font-weight: 600;
        }

        .c-muted {
            color: var(--text-muted);
        }

        /* Phone */
        .phone-v {
            color: var(--green);
            font-size: 0.75rem;
        }

        .phone-u {
            color: var(--blue);
            font-size: 0.75rem;
        }

        /* Total row */
        .total-row td {
            background: rgba(245, 197, 24, 0.04) !important;
            border-top: 2px solid rgba(245, 197, 24, 0.12) !important;
        }

        .total-lbl {
            color: var(--gold) !important;
            font-weight: 800 !important;
            font-size: 0.78rem !important;
        }

        /* Table footer bar */
        .table-footer {
            padding: 14px 28px;
            border-top: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.015);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
        }

        .table-footer span {
            color: var(--text-muted);
            font-size: 0.72rem;
        }

        .table-footer .footer-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .live-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green);
            animation: pulse-green 2s infinite;
        }

    </style>
</head>
<body>
    @include('dashboard.dcards.naver')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('dashboard.admin.dcards.menu', ['r' => 'allcustomers'])

            <div class="layout-page">
                @include('dashboard.dcards.nav')

                <div class="content-wrapper">
                    @include('dashboard.dcards.wallet', ['snd' => false, 'adminwlt' => true])

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <?php
                        if (isset($_GET['cid'])) {
                            $customers = DB::table('customers')->where('id', $_GET['cid'])->get();
                        } elseif (isset($_GET['srch'])) {
                            $srch = $_GET['srch'];
                            $customers = DB::table('customers')->where('name', 'like', "%$srch%")->get();
                        } else {
                            $customers = DB::table('customers')->get();
                        }

                        $filteredCustomers = $customers->filter(fn($c) => $c->email !== 'forvcom000@gmail.com');
                        $totalCount   = $filteredCustomers->count();
                        $activeCount  = 0;
                        foreach ($filteredCustomers as $c) {
                            if (DB::table('customer_plans')->where('csId',$c->id)->where('pstatus','1')->count() > 0) $activeCount++;
                        }
                        $totalStaked  = DB::table('customer_plans')->where('pstatus','1')->sum('pamount');
                        $totalMined   = DB::table('customer_transactions')->where('tType','mine_amount')->sum('tAmount');
                        ?>

                        <!-- Hero Header -->
                        <div class="hero-header">
                            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                                <div>
                                    <h1 class="hero-title">All Customers</h1>
                                    <p class="hero-sub">Complete member directory with real-time financial insights</p>
                                </div>
                                <span class="hero-badge">
                                    <i class="bx bx-user-check"></i>
                                    {{ $totalCount }} Members Registered
                                </span>
                            </div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="stat-grid">
                            <div class="stat-card s-gold">
                                <div class="stat-icon-wrap"><i class="bx bx-group"></i></div>
                                <div class="stat-label">Total Members</div>
                                <div class="stat-value">{{ $totalCount }}</div>
                                <div class="stat-hint">All registered users</div>
                            </div>
                            <div class="stat-card s-green">
                                <div class="stat-icon-wrap"><i class="bx bx-shield-check"></i></div>
                                <div class="stat-label">Active Stakers</div>
                                <div class="stat-value">{{ $activeCount }}</div>
                                <div class="stat-hint">{{ $totalCount > 0 ? round($activeCount/$totalCount*100) : 0 }}% activation rate</div>
                            </div>
                            <div class="stat-card s-blue">
                                <div class="stat-icon-wrap"><i class="bx bx-coin-stack"></i></div>
                                <div class="stat-label">Total Staked</div>
                                <div class="stat-value">{{ number_format($totalStaked, 0) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">Active stake plans</div>
                            </div>
                            <div class="stat-card s-purple">
                                <div class="stat-icon-wrap"><i class="bx bx-trending-up"></i></div>
                                <div class="stat-label">Total Mined</div>
                                <div class="stat-value">{{ number_format($totalMined, 4) }}</div>
                                <div class="stat-hint">Lifetime mining rewards</div>
                            </div>
                        </div>

                        <!-- Search -->
                        <form action="/admin" method="GET">
                            <div class="search-wrap">
                                <div class="search-field">
                                    <i class="bx bx-search"></i>
                                    <input type="search" name="srch" class="search-input" placeholder="Search by name, email, phone or ID..." value="{{ $_GET['srch'] ?? '' }}" />
                                </div>
                                <button type="submit" class="btn-search">
                                    <i class="bx bx-search-alt"></i> Search
                                </button>
                                @if(isset($_GET['srch']) || isset($_GET['cid']))
                                <a href="/admin" class="btn-clear">
                                    <i class="bx bx-x-circle"></i> Clear
                                </a>
                                @endif
                            </div>
                        </form>

                        <!-- Customers Table -->
                        <div class="table-card">
                            <div class="table-header">
                                <div class="table-header-left">
                                    <div class="table-header-icon"><i class="bx bx-table"></i></div>
                                    <div>
                                        <h5>Customer Directory</h5>
                                        <p>Realtime member data with staking & income breakdown</p>
                                    </div>
                                </div>
                                <span class="count-pill">{{ $totalCount }} records</span>
                            </div>

                            <div class="data-table-scroll">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">#</th>
                                            <th>Joined</th>
                                            <th>Member</th>
                                            <th>Referred By</th>
                                            <th>Rank</th>
                                            <th>User ID</th>
                                            <th>Status</th>
                                            <th>Sub (USDT)</th>
                                            <th>Staked (USDT)</th>
                                            <th>Phone</th>
                                            <th>Profit</th>
                                            <th>Balance</th>
                                            <th>Total Income</th>
                                            {{-- <th>Mined</th>
                                            <th>Ref Mined</th>
                                            <th>Ref Reward</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customers as $cstomer)
                                        @if($cstomer->email != 'forvcom000@gmail.com')
                                        @php
                                        $i++;
                                        $plans = DB::table('customer_plans')->where('csId', $cstomer->id)->where('pstatus','1')->get();
                                        $isActive = count($plans) > 0;
                                        $initials = strtoupper(substr($cstomer->name ?? 'U', 0, 1));
                                        $rf = DB::table('customers')->where('id', $cstomer->referral)->first();
                                        $ttpamnt = DB::table('customer_plans')->where('csId',$cstomer->id)->where('pstatus','1')->sum('pamount');
                                        $daysSince = Carbon::parse($cstomer->created_at)->diffInDays(now());
                                        $hasActivePlan = $ttpamnt > 0;
                                        $mined = $hasActivePlan
                                        ? DB::table('customer_transactions')->where('csId',$cstomer->id)->where('tType','mine_amount')->sum('tAmount')
                                        : DB::table('customer_locked_transactions')->where('csId',$cstomer->id)->where('tType','mine_amount')->sum('tAmount');
                                        $refMined = DB::table('customers')->where('referral',$cstomer->id)->whereNotNull('vphone')->where('created_at','>','2024-09-06')->count() * 0.5;
                                        $refReward = DB::table('customer_locked_transactions')->where('csId',$cstomer->id)->where('tType','ref_reward')->sum('tAmount');
                                        $rankName = levName($cstomer->id);
                                        $rankColor = levColor($cstomer->id);
                                        $profit = DB::table('customer_transactions')->where('csId',$cstomer->id)->where('tType','pincome')->sum('tAmount');
                                        $balance = DB::table('customer_transactions')->where('csId',$cstomer->id)->where('wStatus','0')->sum('tAmount');
                                        $totalInc = DB::table('customer_transactions')->where('csId',$cstomer->id)->sum('tAmount');
                                        @endphp
                                        <tr>
                                            <td class="cell-num">{{ $i }}</td>

                                            <td class="cell-date">
                                                <div class="d1">{{ date('d M Y', strtotime($cstomer->created_at)) }}</div>
                                                <div class="d2">{{ date('h:i A', strtotime($cstomer->created_at)) }}</div>
                                            </td>

                                            <td>
                                                <div class="member-wrap">
                                                    @if($cstomer->img)
                                                    <img src="{{ $cstomer->img }}" class="mem-avatar" alt="avatar">
                                                    @else
                                                    <div class="mem-initial">{{ $initials }}</div>
                                                    @endif
                                                    <a href="/admin/user/{{ $cstomer->id }}" class="mem-link">{{ $cstomer->name }}</a>
                                                </div>
                                            </td>

                                            <td class="ref-cell">
                                                @if($rf)
                                                <span class="ref-name">{{ $rf->name }}</span>
                                                @else
                                                <span class="c-muted">—</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($rankName)
                                                <span class="rank-tag" style="background:{{ $rankColor }}18;color:{{ $rankColor }};border:1px solid {{ $rankColor }}30;">
                                                    {{ $rankName }}
                                                </span>
                                                @else
                                                <span class="c-muted">—</span>
                                                @endif
                                            </td>

                                            <td><span class="uid-tag">{{ $cstomer->uid }}</span></td>

                                            <td>
                                                @if($isActive)
                                                <span class="pill-active">Active</span>
                                                @else
                                                <span class="pill-inactive">
                                                    @if($daysSince > 0)<span class="days-tag">{{ $daysSince }}d</span>@else Inactive @endif
                                                </span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($ttpamnt > 0)
                                                <span class="c-gold">{{ number_format(DB::table('customer_subs')->where('csId',$cstomer->id)->where('wStatus','0')->sum('sub_amount'), 2) }}</span>
                                                @else
                                                <span class="c-muted">0.00</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($ttpamnt > 0)
                                                <span class="c-gold">{{ number_format($ttpamnt, 2) }}</span>
                                                @else
                                                <span class="c-muted">0.00</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($cstomer->vphone)
                                                <span class="phone-v"><i class="bx bx-check-circle"></i> {{ $cstomer->vphone }}</span>
                                                @else
                                                <span class="phone-u">{{ $cstomer->phone ?? '—' }}</span>
                                                @endif
                                            </td>

                                            <td><span class="c-orange">{{ number_format($profit, 2) }}</span></td>
                                            <td><span class="c-blue">{{ number_format($balance, 2) }}</span></td>
                                            <td><span class="c-green">{{ number_format($totalInc, 2) }}</span></td>
                                            {{-- <td><span class="c-purple">{{ number_format($mined, 8) }}</span></td>
                                            <td><span class="c-blue">{{ number_format($refMined, 2) }}</span></td>
                                            <td><span class="c-gold">{{ number_format($refReward, 2) }}</span></td> --}}
                                        </tr>
                                        @endif
                                        @endforeach

                                        <!-- Totals row -->
                                        <tr class="total-row">
                                            <td colspan="3"></td>
                                            <td colspan="2" class="total-lbl"><i class="bx bx-sigma" style="margin-right:5px;"></i>Platform Total</td>
                                            <td class="c-gold" style="font-weight:800;">
                                                {{ number_format(DB::table('customer_plans')->where('pstatus','1')->sum('pamount'), 2) }} USDT
                                            </td>
                                            <td colspan="6"></td>
                                            <td class="c-purple" style="font-size:0.7rem;">
                                                {{ number_format(DB::table('customer_transactions')->where('tType','mine_amount')->sum('tAmount'), 8) }}
                                            </td>
                                            <td colspan="2"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-footer">
                                <span>{{ $i }} of {{ $totalCount }} members shown</span>
                                <div class="footer-right">
                                    <div class="live-dot"></div>
                                    <span>Live data &nbsp;·&nbsp; {{ date('d M Y, h:i A') }}</span>
                                </div>
                            </div>
                        </div>

                        <div style="height:60px;"></div>
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
    <script src="/assets/vendor/libs/masonry/masonry.js"></script>
    <script src="/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
