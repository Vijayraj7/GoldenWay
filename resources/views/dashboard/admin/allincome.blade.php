<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Carbon\Carbon;

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

// 1. Subscription Daily Totals
$subsQuery = DB::table('customer_subs')->where('status', 'completed')->where('id', '>=', 69);
if ($fromDate != '') {
    $subsQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '>=', $fromDateTime);
}
if ($toDate != '') {
    $subsQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '<=', $toDate . ' 23:59:59');
}
$subsDaily = $subsQuery->select(DB::raw('DATE(DATE_ADD(updated_at, INTERVAL 90 MINUTE)) as date'), DB::raw('SUM(sub_amount) as total'))
    ->groupBy('date')
    ->pluck('total', 'date');

// 2. Staking/Plans Daily Totals
$plansQuery = DB::table('customer_plans')->where('id', '>=', 271);
if ($fromDate != '') {
    $plansQuery->where('updated_at', '>=', $fromDateTime);
}
if ($toDate != '') {
    $plansQuery->where('updated_at', '<=', $toDate . ' 23:59:59');
}
$plansDaily = $plansQuery->select(DB::raw('DATE(updated_at) as date'), DB::raw('SUM(pamount) as total'))
    ->groupBy('date')
    ->pluck('total', 'date');

// 3. Autopoll Daily Totals
$pollsQuery = DB::table('customer_autopolls')->where('status', 'completed')->where('id', '>=', 39);
if ($fromDate != '') {
    $pollsQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '>=', $fromDateTime);
}
if ($toDate != '') {
    $pollsQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '<=', $toDate . ' 23:59:59');
}
$pollsDaily = $pollsQuery->select(DB::raw('DATE(DATE_ADD(updated_at, INTERVAL 90 MINUTE)) as date'), DB::raw('SUM(poll_amount) as total'))
    ->groupBy('date')
    ->pluck('total', 'date');

// Merge all unique dates
$allDates = array_unique(array_merge(
    array_keys($subsDaily->toArray()),
    array_keys($plansDaily->toArray()),
    array_keys($pollsDaily->toArray())
));

// Sort the dates in descending order (newest first)
rsort($allDates);

// Calculate totals for the summary / statistics cards
$platformSub = $subsDaily->sum();
$platformStake = $plansDaily->sum();
$platformPoll = $pollsDaily->sum();
$platformTotalIncome = $platformSub + $platformStake + $platformPoll;

// ── Used transfer credits with respective ID and Date filters ──
$subTransfersQuery = DB::table('customer_transfers')
    ->where('tType', 'subscribe')
    ->where('tAmount', '<', 0)
    ->where('id', '>=', 69);
if ($fromDate != '') {
    $subTransfersQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '>=', $fromDateTime);
}
if ($toDate != '') {
    $subTransfersQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '<=', $toDate . ' 23:59:59');
}
$usedSubscribeCredit = abs($subTransfersQuery->sum('tAmount'));
$walletUsedSubscribe = $platformSub - $usedSubscribeCredit;

$stakedTransfersQuery = DB::table('customer_transfers')
    ->where('tType', 'normal')
    ->where('tAmount', '<', 0)
    ->where('id', '>=', 271);
if ($fromDate != '') {
    $stakedTransfersQuery->where('updated_at', '>=', $fromDateTime);
}
if ($toDate != '') {
    $stakedTransfersQuery->where('updated_at', '<=', $toDate . ' 23:59:59');
}
$usedStakedCredit = abs($stakedTransfersQuery->sum('tAmount'));
$walletUsedStaked = $platformStake - $usedStakedCredit;

$autopollTransfersQuery = DB::table('customer_transfers')
    ->where('tType', 'autopoll')
    ->where('tAmount', '<', 0)
    ->where('id', '>=', 39);
if ($fromDate != '') {
    $autopollTransfersQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '>=', $fromDateTime);
}
if ($toDate != '') {
    $autopollTransfersQuery->where(DB::raw('DATE_ADD(updated_at, INTERVAL 90 MINUTE)'), '<=', $toDate . ' 23:59:59');
}
$usedAutopollCredit = abs($autopollTransfersQuery->sum('tAmount'));
$walletUsedAutopoll = $platformPoll - $usedAutopollCredit;

$grandUsedCredit = $usedSubscribeCredit + $usedStakedCredit + $usedAutopollCredit;
$grandWalletUsed = $platformTotalIncome - $grandUsedCredit;

$totalCount = count($allDates);

// Build query parameter string for preserving filter state in navigation
$queryParams = request()->only(['from_date', 'to_date']);
$queryString = count($queryParams) > 0 ? '&' . http_build_query($queryParams) : '';
$i = 0;
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Customer Income Details | GoldenWay Admin</title>
    <meta name="description" content="Admin panel – detailed view of all customer income streams." />
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
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
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
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 4px;
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
            font-size: 1.7rem;
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

        /* ── Filter Bar ── */
        .filter-panel {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 20px;
            margin-bottom: 22px;
        }

        .search-field {
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

        /* ── Table Card ── */
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
            min-width: 1300px;
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

        .cell-date .d1 {
            color: #ffffff;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .cell-date .d2 {
            color: var(--text-sub);
            font-size: 0.68rem;
        }

        .member-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mem-initial {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255,255,255,0.08), rgba(255,255,255,0.03));
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gold);
            font-weight: 700;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mem-link {
            color: #ffffff;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.82rem;
            transition: color 0.2s;
        }

        .mem-link:hover {
            color: var(--gold);
        }

        .uid-tag {
            font-family: monospace;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            color: var(--text-sub);
            border-radius: 6px;
            padding: 4px 8px;
            font-size: 0.74rem;
            font-weight: 600;
        }

        /* ── Custom Badge Colors ── */
        .c-gold { color: var(--gold); font-weight: 700; }
        .c-green { color: var(--green); font-weight: 700; }
        .c-blue { color: var(--blue); font-weight: 700; }
        .c-purple { color: var(--purple); font-weight: 700; }
        .c-red { color: var(--red); font-weight: 700; }
        .c-muted { color: var(--text-muted); }

        /* Unique Column Colors */
        .c-col-ref { color: #ff9f43 !important; font-weight: 700; }       /* Warm Orange-Gold */
        .c-col-level { color: #54a0ff !important; font-weight: 700; }     /* Sky Blue */
        .c-col-stake { color: #d783ff !important; font-weight: 700; }     /* Purple */
        .c-col-autopool { color: #ff7675 !important; font-weight: 700; }  /* Sunset Rose */
        .c-col-sub { color: #00d2d3 !important; font-weight: 700; }       /* Cyan / Teal */
        .c-col-active-stake { color: #00ff87 !important; font-weight: 700; } /* Neon Green */
        .c-col-autopoll-spent { color: #ff6b6b !important; font-weight: 700; } /* Coral Red */
        .c-col-sub-spent { color: #ff4757 !important; font-weight: 700; }  /* Soft Red */
        .c-col-total-earnings { color: #ffd700 !important; font-weight: 800; text-shadow: 0 0 8px rgba(255, 215, 0, 0.15); } /* Bright Gold */
        .c-col-left-dl-inc { color: #1dd1a1 !important; font-weight: 700; }  /* Mint Teal */
        .c-col-right-dl-inc { color: #e056fd !important; font-weight: 700; } /* Amethyst Purple */

        /* ── Table Totals Strip ── */
        .table-totals-strip {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1.5px solid rgba(255, 255, 255, 0.08);
            padding: 16px 24px;
            align-items: center;
        }

        .strip-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.76rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.03);
            border: 1.5px solid rgba(255, 255, 255, 0.05);
            padding: 6px 12px;
            border-radius: 10px;
            white-space: nowrap;
        }

        .strip-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
        }

        .strip-label {
            color: var(--text-muted);
        }

        .strip-val {
            color: #ffffff;
            font-weight: 700;
        }

        .total-glow {
            border-color: rgba(255, 215, 0, 0.25);
            background: rgba(255, 215, 0, 0.05);
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.1);
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
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Hero Header -->
                        <div class="hero-header">
                            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                                <div>
                                    <h1 class="hero-title">Daily Business Volume</h1>
                                    <p class="hero-sub">Day-by-day volume tracking of subscriptions, staking plans and autopolls</p>
                                </div>
                                <span class="hero-badge">
                                    <i class="bx bx-analyse"></i> Live Business Auditing
                                </span>
                            </div>
                        </div>

                        <!-- Stat Grid -->
                        <div class="stat-grid">
                            <div class="stat-card s-blue">
                                <div class="stat-icon-wrap"><i class="bx bx-trending-up"></i></div>
                                <div class="stat-label">Total Subscriptions</div>
                                <div class="stat-value">{{ number_format($platformSub, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">
                                    Used Credit: {{ number_format($usedSubscribeCredit, 2) }} USDT<br/>
                                    Wallet Used: {{ number_format($walletUsedSubscribe, 2) }} USDT
                                </div>
                            </div>
                            <div class="stat-card s-green">
                                <div class="stat-icon-wrap"><i class="bx bx-git-pull-request"></i></div>
                                <div class="stat-label">Total Staking</div>
                                <div class="stat-value">{{ number_format($platformStake, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">
                                    Used Credit: {{ number_format($usedStakedCredit, 2) }} USDT<br/>
                                    Wallet Used: {{ number_format($walletUsedStaked, 2) }} USDT
                                </div>
                            </div>
                            <div class="stat-card s-purple">
                                <div class="stat-icon-wrap"><i class="bx bx-group"></i></div>
                                <div class="stat-label">Total AutoPoll</div>
                                <div class="stat-value">{{ number_format($platformPoll, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">
                                    Used Credit: {{ number_format($usedAutopollCredit, 2) }} USDT<br/>
                                    Wallet Used: {{ number_format($walletUsedAutopoll, 2) }} USDT
                                </div>
                            </div>
                            <div class="stat-card s-gold">
                                <div class="stat-icon-wrap"><i class="bx bx-wallet"></i></div>
                                <div class="stat-label">Total Platform Volume</div>
                                <div class="stat-value">{{ number_format($platformTotalIncome, 2) }}<span class="stat-unit">USDT</span></div>
                                <div class="stat-hint">
                                    Total Credit Used: {{ number_format($grandUsedCredit, 2) }} USDT<br/>
                                    Total Wallet Used: {{ number_format($grandWalletUsed, 2) }} USDT
                                </div>
                            </div>
                        </div>

                        <!-- Date and Search Filters Panel -->
                        <div class="filter-panel">
                            <form method="GET" action="{{ request()->url() }}" id="filterForm">
                                <div class="row g-3 align-items-center">
                                    <div class="col-12 col-md-5">
                                        <div class="d-flex align-items-center gap-2">
                                            <span style="font-size: 12px; color: var(--text-sub); min-width: 40px;">From:</span>
                                            <input type="date" name="from_date" class="form-control" value="{{ substr($fromDate, 0, 10) }}" style="background: rgba(0, 0, 0, 0.3) !important; border: 1.5px solid rgba(255,255,255,0.07) !important; color: #fff !important; color-scheme: dark; border-radius: 12px; padding: 10px 14px; font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="d-flex align-items-center gap-2">
                                            <span style="font-size: 12px; color: var(--text-sub); min-width: 30px;">To:</span>
                                            <input type="date" name="to_date" class="form-control" value="{{ $toDate }}" style="background: rgba(0, 0, 0, 0.3) !important; border: 1.5px solid rgba(255,255,255,0.07) !important; color: #fff !important; color-scheme: dark; border-radius: 12px; padding: 10px 14px; font-size: 13px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex gap-2 justify-content-end">
                                        <button type="button" onclick="setTodayFilter()" class="btn btn-sm btn-clear" style="padding: 11px 16px;">
                                            Today
                                        </button>
                                        <button type="submit" class="btn-search">
                                            Apply
                                        </button>
                                        @if($fromDate != '' || $toDate != '')
                                            <a href="{{ request()->url() }}" class="btn-clear" style="padding: 11px 16px;">
                                                <i class="bx bx-reset"></i> Reset
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Data Table -->
                        <div class="table-card">
                            <div class="table-header">
                                <div class="table-header-left">
                                    <div class="table-header-icon"><i class="bx bx-table"></i></div>
                                    <div>
                                        <h5>Income Breakdown Details</h5>
                                        <p>Comprehensive dashboard of individual member earnings and network metrics</p>
                                    </div>
                                </div>
                                <span class="count-pill">{{ $totalCount }} Records</span>
                            </div>

                            <div class="table-totals-strip">
                                <div class="strip-item"><span class="strip-dot" style="background:#00d2d3;"></span><span class="strip-label">Total Subscriptions:</span> <span class="strip-val">{{ number_format($platformSub, 2) }}</span></div>
                                <div class="strip-item"><span class="strip-dot" style="background:#00ff87;"></span><span class="strip-label">Total Staking:</span> <span class="strip-val">{{ number_format($platformStake, 2) }}</span></div>
                                <div class="strip-item"><span class="strip-dot" style="background:#ff7675;"></span><span class="strip-label">Total AutoPoll:</span> <span class="strip-val">{{ number_format($platformPoll, 2) }}</span></div>
                                <div class="strip-item total-glow"><span class="strip-dot" style="background:#ffd700;"></span><span class="strip-label" style="color:#ffd700;">Total Business Volume:</span> <span class="strip-val" style="color:#ffd700; font-weight:800;">{{ number_format($platformTotalIncome, 2) }}</span></div>
                            </div>

                            <div class="data-table-scroll">
                                <table class="data-table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center; width: 60px;">#</th>
                                            <th>Date</th>
                                            <th>Subscription Volume</th>
                                            <th>Staking Volume</th>
                                            <th>AutoPoll Volume</th>
                                            <th>Total Daily Volume</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 0;
                                        @endphp
                                        @foreach($allDates as $date)
                                            @php
                                            $i++;
                                            $subVol = (float) ($subsDaily[$date] ?? 0.0);
                                            $planVol = (float) ($plansDaily[$date] ?? 0.0);
                                            $pollVol = (float) ($pollsDaily[$date] ?? 0.0);
                                            $dailyTotal = $subVol + $planVol + $pollVol;
                                            @endphp
                                            <tr>
                                                <td class="cell-num">{{ $i }}</td>
                                                <td class="cell-date" style="font-weight: 700; color: #fff;">
                                                    {{ date('d M Y', strtotime($date)) }}
                                                </td>
                                                <td class="c-col-sub">{{ $subVol > 0 ? number_format($subVol, 2) : '—' }}</td>
                                                <td class="c-col-active-stake">{{ $planVol > 0 ? number_format($planVol, 2) : '—' }}</td>
                                                <td class="c-col-autopool">{{ $pollVol > 0 ? number_format($pollVol, 2) : '—' }}</td>
                                                <td class="c-col-total-earnings" style="font-weight: 800;">{{ number_format($dailyTotal, 2) }}</td>
                                            </tr>
                                        @endforeach
                                        
                                        @if($totalCount > 0)
                                            <!-- Summary Totals Row -->
                                            <tr style="background: rgba(255, 255, 255, 0.03); border-top: 2px solid rgba(255,255,255,0.1); font-weight: 700;">
                                                <td colspan="2" style="text-align: right; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; color: #fff;">Grand Totals:</td>
                                                <td class="c-col-sub">{{ number_format($platformSub, 2) }}</td>
                                                <td class="c-col-active-stake">{{ number_format($platformStake, 2) }}</td>
                                                <td class="c-col-autopool">{{ number_format($platformPoll, 2) }}</td>
                                                <td class="c-col-total-earnings" style="font-size:0.9rem; border-bottom: 2px double var(--gold) !important;">{{ number_format($platformTotalIncome, 2) }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Footer -->
                        @include('dashboard.dcards.footer')
                    </div>
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
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        function setTodayFilter() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const todayStr = `${year}-${month}-${day}`;
            
            document.querySelector('input[name="from_date"]').value = todayStr;
            document.querySelector('input[name="to_date"]').value = todayStr;
            document.getElementById('filterForm').submit();
        }
    </script>
</body>
</html>
