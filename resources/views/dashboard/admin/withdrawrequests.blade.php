<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

use Carbon\Carbon;

$i = 0;
// Your PHP code here

$typname = "Withdraw Requests";
$menuname = "withdrawrequests";
if(isset($_GET['typ'])) {
    $typname = "Transfer Requests";
    $menuname = "transferequests";
}
?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="/assets/"
    data-template="vertical-menu-template-free">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Products</title>

        <meta name="description" content />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon"
            href="/tst/goldenlogo.png" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="/assets/vendor/css/core.css"
            class="template-customizer-core-css" />
        <link rel="stylesheet" href="/assets/vendor/css/theme-default.css"
            class="template-customizer-theme-css" />
        <link rel="stylesheet" href="/assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet"
            href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="/assets/vendor/js/helpers.js"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="/assets/js/config.js"></script>

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
                line-height: 1.2;
                background: linear-gradient(135deg, #ffffff 0%, #f5c518 50%, #ff8c00 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin: 0;
            }

            .hero-sub {
                color: var(--text-sub);
                font-size: 0.85rem;
                margin-top: 8px;
                font-weight: 500;
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

            /* ── Filter / Date Selectors ── */
            .filter-wrap {
                background: var(--bg-card);
                border: 1px solid var(--border);
                border-radius: 18px;
                padding: 18px 22px;
                margin-bottom: 22px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                flex-wrap: wrap;
            }

            .filter-inputs {
                display: flex;
                align-items: center;
                gap: 10px;
                flex-wrap: wrap;
            }

            .filter-control {
                background: rgba(255, 255, 255, 0.035);
                border: 1.5px solid rgba(255, 255, 255, 0.07);
                border-radius: 12px;
                color: var(--text-main);
                padding: 10px 16px;
                font-size: 0.88rem;
                font-weight: 500;
                outline: none;
                transition: border-color 0.3s, box-shadow 0.3s;
            }

            .filter-control:focus {
                border-color: rgba(245, 197, 24, 0.4);
                box-shadow: 0 0 0 4px rgba(245, 197, 24, 0.08);
            }

            /* ── Table card ── */
            .table-card {
                background: var(--bg-card);
                border: 1px solid var(--border);
                border-radius: 22px;
                overflow: hidden;
                box-shadow: 0 24px 80px rgba(0, 0, 0, 0.55);
                margin-bottom: 24px;
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
                margin: 0;
            }

            .table-header p {
                color: var(--text-sub);
                font-size: 0.72rem;
                margin-top: 2px;
                margin-bottom: 0;
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
                text-align: left;
            }

            .data-table tbody tr {
                border-bottom: 1px solid rgba(255, 255, 255, 0.04);
                transition: background 0.18s ease;
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

            /* User avatar / list */
            .users-list {
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .user-avatar-img {
                width: 28px;
                height: 28px;
                border-radius: 50%;
                border: 2px solid var(--border);
                object-fit: cover;
            }

            .user-name-link {
                color: var(--blue);
                font-weight: 600;
                text-decoration: none;
                transition: color 0.2s;
            }

            .user-name-link:hover {
                color: #7dd3fc;
                text-decoration: underline;
            }

            /* Status Badges */
            .status-badge {
                display: inline-flex;
                align-items: center;
                gap: 4px;
                padding: 4px 10px;
                border-radius: 6px;
                font-size: 0.72rem;
                font-weight: 700;
                letter-spacing: 0.3px;
            }

            .status-success {
                background: rgba(0, 255, 135, 0.1);
                border: 1px solid rgba(0, 255, 135, 0.2);
                color: var(--green);
            }

            .status-danger {
                background: rgba(255, 107, 107, 0.1);
                border: 1px solid rgba(255, 107, 107, 0.2);
                color: var(--red);
            }

            .status-warning {
                background: rgba(255, 159, 67, 0.1);
                border: 1px solid rgba(255, 159, 67, 0.2);
                color: var(--gold2);
            }

            .remaining-hrs {
                color: var(--purple);
                font-size: 0.7rem;
                font-weight: 600;
                margin-top: 3px;
                display: block;
            }

            /* Action buttons */
            .btn-action-approval {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: linear-gradient(135deg, var(--gold) 0%, var(--gold2) 100%);
                color: #08090f;
                border: none;
                border-radius: 8px;
                padding: 8px 14px;
                font-size: 0.78rem;
                font-weight: 800;
                cursor: pointer;
                text-decoration: none;
                transition: all 0.25s;
                box-shadow: 0 4px 15px rgba(245, 197, 24, 0.2);
            }

            .btn-action-approval:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(245, 197, 24, 0.35);
                color: #08090f;
            }

            .btn-action-processed {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                color: var(--text-muted);
                border-radius: 8px;
                padding: 8px 14px;
                font-size: 0.78rem;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.2s;
            }

            .btn-action-processed:hover {
                background: rgba(255, 255, 255, 0.08);
                color: var(--text-main);
            }
        </style>

    </head>

    <body>
        @include('dashboard.dcards.naver')
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.admin.dcards.menu', ['r' =>
                $menuname])
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('dashboard.dcards.nav')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <?php
                            if(isset($_GET['wthid'])){
                                $wths = DB::table('customer_withdraws')->where('id', $_GET['wthid'])->get();
                            } elseif(isset($_GET['typ'])){
                                $wths = DB::table('customer_withdraws')->where('pname', 'transfer')->get();
                            }  elseif (isset($_GET['day'])) {
                                if(isset($_GET['dayto']) && (strlen($_GET['dayto']) > 2) ){
                                    $fromDate = $_GET['day'] ?? null;
                                    $toDate = $_GET['dayto'] ?? null;
                                    $wths = DB::table('customer_withdraws')->whereBetween('created_at', [$fromDate, $toDate])->get();
                                }else{
                                    $wths = DB::table('customer_withdraws')->where('created_at', 'like', $_GET['day'] . '%')->get();
                                }
                            } else{
                                $wths = DB::table('customer_withdraws')->whereIn('pname', ['allincome', 'pollincome'])->get();
                            }
                            $totalRequests = count($wths);
                            $totalSum = $wths->sum('amount') + $wths->sum('fuel');
                            $totalAmount = $wths->sum('amount');
                            $totalFuel = $wths->sum('fuel');
                            $i = $totalRequests;
                            ?>

                            <!-- Hero Header -->
                            <div class="hero-header">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div>
                                        <h1 class="hero-title">{{$typname}}</h1>
                                        <div class="hero-sub">Manage and approve withdraw/transfer requests in real time</div>
                                    </div>
                                    @if(str_ends_with($_SERVER['REQUEST_URI'],'/admin/withdraw/requests') || isset($_GET['day']))
                                    <div class="hero-actions">
                                        @if(isset($_GET['day']))
                                        <a href="/admin/withdraw/requests" class="btn btn-primary btn-sm rounded-pill px-3">
                                            Show All
                                        </a>
                                        @else
                                        <a href="/admin/withdraw/requests?day={{date('Y-m-d')}}" class="btn btn-primary btn-sm rounded-pill px-3">
                                            Today's Report
                                        </a>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Stat Grid -->
                            <div class="stat-grid">
                                <div class="stat-card s-gold">
                                    <div class="stat-icon-wrap"><i class="bx bx-dollar-circle"></i></div>
                                    <div class="stat-label">Total Amount + Fuel</div>
                                    <div class="stat-value">{{number_format($totalSum, 2)}}<span class="stat-unit">USDT</span></div>
                                    <div class="stat-hint">Gross requested amount</div>
                                </div>
                                <div class="stat-card s-green">
                                    <div class="stat-icon-wrap"><i class="bx bx-check-double"></i></div>
                                    <div class="stat-label">Net Amount</div>
                                    <div class="stat-value">{{number_format($totalAmount, 2)}}<span class="stat-unit">USDT</span></div>
                                    <div class="stat-hint">Net payout amount</div>
                                </div>
                                <div class="stat-card s-blue">
                                    <div class="stat-icon-wrap"><i class="bx bx-gas-pump"></i></div>
                                    <div class="stat-label">Total Fuel Fee</div>
                                    <div class="stat-value">{{number_format($totalFuel, 2)}}<span class="stat-unit">USDT</span></div>
                                    <div class="stat-hint">Platform fuel / gas fees</div>
                                </div>
                                <div class="stat-card s-purple">
                                    <div class="stat-icon-wrap"><i class="bx bx-list-ol"></i></div>
                                    <div class="stat-label">Total Requests</div>
                                    <div class="stat-value">{{$totalRequests}}<span class="stat-unit">txns</span></div>
                                    <div class="stat-hint">Filtered transaction count</div>
                                </div>
                            </div>

                            <!-- Date Filter Wrap -->
                            @if(str_ends_with($_SERVER['REQUEST_URI'],'/admin/withdraw/requests') || isset($_GET['day']))
                            <div class="filter-wrap">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-white fw-semibold"><i class="bx bx-filter-alt me-1"></i>Filter by Date:</span>
                                    @if(isset($_GET['day']))
                                    <span class="badge status-warning">{{date('d M, Y', strtotime($_GET['day']))}}</span>
                                    @endif
                                    @if(isset($_GET['dayto']) && strlen($_GET['dayto']) > 2)
                                    <span class="badge status-success">TO</span>
                                    <span class="badge status-warning">{{date('d M, Y', strtotime($_GET['dayto']))}}</span>
                                    @endif
                                </div>
                                <div class="filter-inputs">
                                    <span class="text-muted small">From:</span>
                                    <input class="filter-control" type="date" value="{{$_GET['day'] ?? date('Y-m-d')}}" id="html5-from-date-input" />
                                    <span class="text-muted small">To:</span>
                                    <input class="filter-control" type="date" value="{{$_GET['dayto'] ?? null}}" id="html5-to-date-input" />
                                </div>
                            </div>

                            <script>
                                var fromDateInput = document.getElementById('html5-from-date-input');
                                var toDateInput = document.getElementById('html5-to-date-input');

                                fromDateInput.addEventListener('change', function() {
                                    var fromDate = this.value;
                                    updateURL(fromDate, toDateInput.value);
                                });

                                toDateInput.addEventListener('change', function() {
                                    var toDate = this.value;
                                    updateURL(fromDateInput.value, toDate);
                                });

                                function updateURL(fromDate, toDate) {
                                    var url = '/admin/withdraw/requests?day=' + fromDate + '&dayto=' + toDate;
                                    window.location.href = url;
                                }
                            </script>
                            @endif

                            <!-- Table Card -->
                            <div class="table-card">
                                <div class="table-header">
                                    <div class="table-header-left">
                                        <div class="table-header-icon"><i class="bx bx-transfer-alt"></i></div>
                                        <div>
                                            <h5>Request Details</h5>
                                            <p>Withdraw and transfer requests waiting for actions</p>
                                        </div>
                                    </div>
                                    <span class="count-pill">{{ $totalRequests }} records found</span>
                                </div>

                                <div class="data-table-scroll">
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 60px; text-align: center;">No</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Total Amount (Gross)</th>
                                                <th>Net Payout (Net)</th>
                                                <th>Fee (Fuel)</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wths->reverse() as $wth)
                                            @php
                                            $i--;
                                            $usr = DB::table('customers')->where('id',$wth->csId)->first();
                                            @endphp
                                            <tr>
                                                <td style="text-align: center;" class="cell-num">{{$i}}</td>
                                                <td class="cell-date">
                                                    <div class="d1">{{ date('d M Y', strtotime($wth->created_at)) }}</div>
                                                    <div class="d2">{{ date('h:i A', strtotime($wth->created_at)) }}</div>
                                                </td>
                                                <td>
                                                    <div class="users-list">
                                                        @if($usr && $usr->img != null)
                                                        <img src="{{$usr->img}}" alt="Avatar" class="user-avatar-img" />
                                                        @endif
                                                        @if($usr)
                                                        <a href="/admin/user/{{$usr->id}}" class="user-name-link">
                                                            {{ $usr->name }}
                                                        </a>
                                                        @else
                                                        <span class="text-muted">Unknown User</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-label-secondary">{{ getPname($wth->pname ?? 'normal') }}</span>
                                                </td>
                                                <td class="fw-semibold text-white">
                                                    USDT {{ number_format((float)$wth->amount + (float)$wth->fuel, 2) }}
                                                </td>
                                                <td class="text-white">
                                                    USDT {{ number_format((float)$wth->amount, 2) }}
                                                </td>
                                                <td class="text-muted">
                                                    USDT {{ number_format((float)$wth->fuel, 2) }}
                                                </td>
                                                <td>
                                                    @if ($wth->status == '1')
                                                    <span class="status-badge status-success"><i class="bx bx-check-circle"></i> Success</span>
                                                    @elseif ($wth->status == '3')
                                                    <span class="status-badge status-danger"><i class="bx bx-x-circle"></i> Rejected</span>
                                                    @else
                                                    <span class="status-badge status-warning"><i class="bx bx-time-five"></i> Pending</span>
                                                    @php
                                                        $hoursPassed = Carbon::parse($wth->created_at)->diffInHours(Carbon::now());
                                                        $hoursRemaining = 72 - $hoursPassed;
                                                    @endphp
                                                    <span class="remaining-hrs">
                                                        Remaining {{ $hoursRemaining > 0 ? $hoursRemaining : 0 }} hrs
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($wth->status == '0')
                                                    <a href="/admin/withdraw/requests/{{$wth->id}}" class="btn-action-approval">
                                                        <i class="bx bxs-send"></i> Approval
                                                    </a>
                                                    @else
                                                    <a href="/admin/withdraw/requests/{{$wth->id}}" class="btn-action-processed">
                                                        <i class="bx bx-show-alt"></i> Details
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Footer -->
                        @include('dashboard.dcards.footer')
                        <!-- / Footer -->
                        <!-- / Layout wrapper -->

                        <!-- Core JS -->
                        <!-- build:js assets/vendor/js/core.js -->
                        <script
                            src="/assets/vendor/libs/jquery/jquery.js"></script>
                        <script
                            src="/assets/vendor/libs/popper/popper.js"></script>
                        <script src="/assets/vendor/js/bootstrap.js"></script>
                        <script
                            src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                        <script src="/assets/vendor/js/menu.js"></script>
                        <!-- endbuild -->

                        <!-- Vendors JS -->
                        <script
                            src="/assets/vendor/libs/masonry/masonry.js"></script>

                        <!-- Main JS -->
                        <script src="/assets/js/main.js"></script>

                        <!-- Page JS -->

                        <!-- Place this tag in your head or just before your close body tag. -->
                        <script async defer
                            src="https://buttons.github.io/buttons.js"></script>
                    </body>
                </html>
