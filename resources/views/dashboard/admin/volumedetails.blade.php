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
    <title>Customer Purchase Volume Breakdown | GoldenWay Admin</title>
    <meta name="description" content="Admin panel – detailed customer breakdown of volume, credit used, and wallet used." />
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

        .hero-badge {
            background: rgba(245, 197, 24, 0.1);
            border: 1px solid rgba(245, 197, 24, 0.25);
            color: var(--gold);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
        .stat-card.s-green::after { background: linear-gradient(90deg, #00ff87 0%, #60efff 100%); }
        .stat-card.s-blue::after { background: linear-gradient(90deg, #3b82f6 0%, #38bdf8 100%); }

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
        .s-green .stat-icon-wrap { color: var(--green); }
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

        .amount-val.warning {
            color: var(--gold);
        }

        .c-muted {
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
            @include('dashboard.admin.dcards.menu', ['r' => 'incomeanalytics'])

            <div class="layout-page">
                @include('dashboard.dcards.nav')

                <div class="content-wrapper">
                    {{-- @include('dashboard.dcards.wallet', ['snd' => false, 'adminwlt' => true]) --}}

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <?php
                        $fromDate = $_GET['from_date'] ?? '';
                        if ($fromDate == '' || strtotime($fromDate) < strtotime('2026-06-11 23:00:00')) {
                            $fromDate = '2026-06-11 23:00:00';
                        }
                        $toDate = $_GET['to_date'] ?? '';
                        if (isset($_GET['today']) && $_GET['today'] == '1') {
                            $fromDate = date('Y-m-d');
                            $toDate = date('Y-m-d');
                        }

                        $fromDateTime = (strlen($fromDate) > 10) ? $fromDate : $fromDate . ' 00:00:00';
                        $toDateTime = $toDate ? $toDate . ' 23:59:59' : '';

                        $selectedType = $_GET['type'] ?? 'all'; // subscriptions, staking, autopoll, all
                        $searchVal = $_GET['srch'] ?? '';

                        // 1. Get threshold dates
                        $thresholdSubDate = DB::table('customer_subs')->where('id', 69)->value('created_at');
                        $thresholdStakeDate = DB::table('customer_plans')->where('id', 271)->value('created_at');
                        $thresholdPollDate = DB::table('customer_autopolls')->where('id', 39)->value('created_at');

                        // Subscriptions queries
                        $subsQuery = DB::table('customer_subs')->where('status', 'completed')->where('id', '>=', 69);
                        if ($fromDate != '') {
                            $subsQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '>=', $fromDateTime);
                        }
                        if ($toDate != '') {
                            $subsQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '<=', $toDateTime);
                        }
                        $subsGroup = $subsQuery->select('csId', DB::raw('SUM(sub_amount) as total'))->groupBy('csId')->pluck('total', 'csId');

                        $subTransQuery = DB::table('customer_transfers')->where('tType', 'subscribe')->where('tAmount', '<', 0);
                        if ($thresholdSubDate) {
                            $subTransQuery->where('created_at', '>=', $thresholdSubDate);
                        }
                        if ($fromDate != '') {
                            $subTransQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '>=', $fromDateTime);
                        }
                        if ($toDate != '') {
                            $subTransQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '<=', $toDateTime);
                        }
                        $subsTransGroup = $subTransQuery->select('csId', DB::raw('SUM(ABS(tAmount)) as total'))->groupBy('csId')->pluck('total', 'csId');

                        // Staking queries
                        $plansQuery = DB::table('customer_plans')->where('id', '>=', 271);
                        if ($fromDate != '') {
                            $plansQuery->where('updated_at', '>=', $fromDateTime);
                        }
                        if ($toDate != '') {
                            $plansQuery->where('updated_at', '<=', $toDateTime);
                        }
                        $plansGroup = $plansQuery->select('csId', DB::raw('SUM(pamount) as total'))->groupBy('csId')->pluck('total', 'csId');

                        $stakedTransQuery = DB::table('customer_transfers')->where('tType', 'normal')->where('tAmount', '<', 0);
                        if ($thresholdStakeDate) {
                            $stakedTransQuery->where('created_at', '>=', $thresholdStakeDate);
                        }
                        if ($fromDate != '') {
                            $stakedTransQuery->where('updated_at', '>=', $fromDateTime);
                        }
                        if ($toDate != '') {
                            $stakedTransQuery->where('updated_at', '<=', $toDateTime);
                        }
                        $stakedTransGroup = $stakedTransQuery->select('csId', DB::raw('SUM(ABS(tAmount)) as total'))->groupBy('csId')->pluck('total', 'csId');

                        // AutoPoll queries
                        $pollsQuery = DB::table('customer_autopolls')->where('status', 'completed')->where('id', '>=', 39);
                        if ($fromDate != '') {
                            $pollsQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '>=', $fromDateTime);
                        }
                        if ($toDate != '') {
                            $pollsQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '<=', $toDateTime);
                        }
                        $pollsGroup = $pollsQuery->select('csId', DB::raw('SUM(poll_amount) as total'))->groupBy('csId')->pluck('total', 'csId');

                        $autopollTransQuery = DB::table('customer_transfers')->where('tType', 'autopoll')->where('tAmount', '<', 0);
                        if ($thresholdPollDate) {
                            $autopollTransQuery->where('created_at', '>=', $thresholdPollDate);
                        }
                        if ($fromDate != '') {
                            $autopollTransQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '>=', $fromDateTime);
                        }
                        if ($toDate != '') {
                            $autopollTransQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '<=', $toDateTime);
                        }
                        $autopollTransGroup = $autopollTransQuery->select('csId', DB::raw('SUM(ABS(tAmount)) as total'))->groupBy('csId')->pluck('total', 'csId');

                        // Build Customer List
                        $customersQuery = DB::table('customers')->orderBy('name', 'asc');
                        if (!empty($searchVal)) {
                            $customersQuery->where(function($q) use ($searchVal) {
                                $q->where('name', 'like', "%$searchVal%")
                                  ->orWhere('email', 'like', "%$searchVal%")
                                  ->orWhere('uid', 'like', "%$searchVal%");
                            });
                        }
                        $customers = $customersQuery->get();

                        $breakdownList = [];
                        $totalVolumeSum = 0;
                        $totalCreditSum = 0;
                        $totalWalletSum = 0;

                        foreach ($customers as $c) {
                            if ($c->email === 'forvcom000@gmail.com') continue;

                            $vol = 0;
                            $cred = 0;

                            if ($selectedType == 'subscriptions') {
                                $vol = (float)($subsGroup[$c->id] ?? 0);
                                $cred = (float)($subsTransGroup[$c->id] ?? 0);
                            } elseif ($selectedType == 'staking') {
                                $vol = (float)($plansGroup[$c->id] ?? 0);
                                $cred = (float)($stakedTransGroup[$c->id] ?? 0);
                            } elseif ($selectedType == 'autopoll') {
                                $vol = (float)($pollsGroup[$c->id] ?? 0);
                                $cred = (float)($autopollTransGroup[$c->id] ?? 0);
                            } else { // 'all'
                                $vol = (float)($subsGroup[$c->id] ?? 0) + (float)($plansGroup[$c->id] ?? 0) + (float)($pollsGroup[$c->id] ?? 0);
                                $cred = (float)($subsTransGroup[$c->id] ?? 0) + (float)($stakedTransGroup[$c->id] ?? 0) + (float)($autopollTransGroup[$c->id] ?? 0);
                            }

                            $wallet = $vol - $cred;

                            if ($vol > 0 || $cred > 0 || !empty($searchVal)) {
                                $breakdownList[] = [
                                    'id' => $c->id,
                                    'name' => $c->name,
                                    'uid' => $c->uid,
                                    'email' => $c->email,
                                    'img' => $c->img,
                                    'volume' => $vol,
                                    'credit' => $cred,
                                    'wallet' => $wallet
                                ];

                                $totalVolumeSum += $vol;
                                $totalCreditSum += $cred;
                                $totalWalletSum += $wallet;
                            }
                        }
                        $totalCount = count($breakdownList);

                        $typeNameMap = [
                            'subscriptions' => 'Subscriptions',
                            'staking' => 'Staking',
                            'autopoll' => 'AutoPoll',
                            'all' => 'Platform Total Volume'
                        ];
                        ?>

                        <!-- Hero Header -->
                        <div class="hero-header">
                            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                                <div>
                                    <h1 class="hero-title">{{ $typeNameMap[$selectedType] }} Breakdown</h1>
                                    <p class="hero-sub">Customer-wise detailed breakdown of volume, credit used, and wallet used</p>
                                </div>
                                <a href="/admin/customers/income" class="btn btn-sm btn-clear" style="padding: 10px 18px;">
                                    <i class="bx bx-left-arrow-alt"></i> Back to Analytics
                                </a>
                            </div>
                        </div>

                        <!-- Stats Grid -->
                        <div class="stat-grid">
                            <div class="stat-card s-gold">
                                <div class="stat-icon-wrap"><i class="bx bx-purchase-tag-alt"></i></div>
                                <div class="stat-label">Total Volume</div>
                                <div class="stat-value">{{ number_format($totalVolumeSum, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">Active volume for selection</div>
                            </div>
                            <div class="stat-card s-green">
                                <div class="stat-icon-wrap"><i class="bx bx-transfer-alt"></i></div>
                                <div class="stat-label">Transfer Credit Used</div>
                                <div class="stat-value">{{ number_format($totalCreditSum, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">Transferred credits applied</div>
                            </div>
                            <div class="stat-card s-blue">
                                <div class="stat-icon-wrap"><i class="bx bx-wallet"></i></div>
                                <div class="stat-label">Wallet Used</div>
                                <div class="stat-value">{{ number_format($totalWalletSum, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">Direct cash wallet amount</div>
                            </div>
                        </div>

                        <!-- Filters Panel -->
                        <div class="filter-panel">
                            <form method="GET" action="/admin/income/volume-details" id="filterForm">
                                <div class="row g-3 align-items-center">
                                    <div class="col-12 col-md-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span style="font-size: 12px; color: var(--text-sub); min-width: 40px;">Type:</span>
                                            <select name="type" class="form-select" onchange="this.form.submit()">
                                                <option value="all" @if($selectedType == 'all') selected @endif>All Combined</option>
                                                <option value="subscriptions" @if($selectedType == 'subscriptions') selected @endif>Subscriptions Only</option>
                                                <option value="staking" @if($selectedType == 'staking') selected @endif>Staking Only</option>
                                                <option value="autopoll" @if($selectedType == 'autopoll') selected @endif>AutoPoll Only</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span style="font-size: 12px; color: var(--text-sub); min-width: 40px;">From:</span>
                                            <input type="date" name="from_date" class="form-control" value="{{ substr($fromDate, 0, 10) }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span style="font-size: 12px; color: var(--text-sub); min-width: 30px;">To:</span>
                                            <input type="date" name="to_date" class="form-control" value="{{ $toDate }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <input type="text" name="srch" class="form-control" placeholder="Search customer name or UID..." value="{{ $searchVal }}">
                                    </div>
                                </div>
                                <div class="row g-3 mt-2 align-items-center justify-content-end">
                                    <div class="col-auto d-flex gap-2">
                                        <button type="submit" class="btn-search" style="padding: 10px 24px;">
                                            <i class="bx bx-filter-alt"></i> Apply Filters
                                        </button>
                                        @if(!empty($searchVal) || $fromDate != '2026-06-11 23:00:00' || !empty($toDate))
                                        <a href="/admin/income/volume-details?type={{ $selectedType }}" class="btn-clear" style="padding: 10px 18px;">
                                            <i class="bx bx-x-circle"></i> Clear Filters
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
                                        <h5>Customer Summary List</h5>
                                        <p>Volume, credit applied, and net wallet usage</p>
                                    </div>
                                </div>
                                <span class="count-pill">{{ $totalCount }} customers</span>
                            </div>

                            <div class="data-table-scroll">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th class="cell-num">#</th>
                                            <th>Customer Name</th>
                                            <th>User ID</th>
                                            <th>Email</th>
                                            <th>Total Volume (USDT)</th>
                                            <th>Transfer Credit Used (USDT)</th>
                                            <th>Wallet Used (USDT)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($breakdownList as $item)
                                        @php
                                        $i++;
                                        $initials = strtoupper(substr($item['name'] ?? 'U', 0, 1));
                                        @endphp
                                        <tr>
                                            <td class="cell-num">{{ $i }}</td>
                                            <td>
                                                <div class="member-wrap">
                                                    @if($item['img'])
                                                    <img src="{{ $item['img'] }}" class="mem-avatar" alt="avatar">
                                                    @else
                                                    <div class="mem-initial">{{ $initials }}</div>
                                                    @endif
                                                    <a href="/admin/user/{{ $item['id'] }}" class="mem-link">{{ $item['name'] }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="mem-uid" onclick="copyToClipboard('{{ $item['uid'] }}', this)" title="Click to copy UID">
                                                    {{ $item['uid'] }}
                                                </span>
                                            </td>
                                            <td class="c-muted">{{ $item['email'] }}</td>
                                            <td>
                                                <span class="amount-val" style="color: {{ $item['volume'] == 0 ? '#ff6b6b' : '#00ff87' }} !important;">
                                                    {{ number_format($item['volume'], 2) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="amount-val" style="color: {{ $item['credit'] == 0 ? '#ff6b6b' : 'var(--gold2)' }} !important;">
                                                    {{ number_format($item['credit'], 2) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="amount-val" style="color: {{ $item['wallet'] == 0 ? '#ff6b6b' : '#38bdf8' }} !important;">
                                                    {{ number_format($item['wallet'], 2) }}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @if($totalCount == 0)
                                        <tr>
                                            <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-muted);">
                                                No customers found matching current criteria.
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
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
    </script>

    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
