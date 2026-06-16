<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Table configuration
$tTableName = "customer_transactions";
$btnTxt = "All";

// Fetching transactions based on filters
if (isset($_GET['typ'])) {
    $tTableName = "customer_transfers";
    $transtins = DB::table($tTableName)->where('csId', $v->id)->whereNot('tType', 'transfer')->get();
} else if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == "all") {
        $transtins = DB::table('customer_transactions')->where('csId', $v->id)->get();
    } elseif ($type == "levincome") {
        if (isset($_GET['lev'])) {
            $lvl = $_GET['lev'];
            $btnTxt = "$lvl Level";
            $transtins = DB::table('customer_transactions')->where('tType', 'levincome')->where('levl', $lvl)->where('csId', $v->id)->get();
        } else {
            $btnTxt = "Level Income";
            $transtins = DB::table('customer_transactions')->where('tType', 'levincome')->where('csId', $v->id)->get();
        }
    } else {
        $btnTxt = getPname($type);
        $transtins = DB::table('customer_transactions')->where('tType', $type)->where('csId', $v->id)->get();
    }
} elseif (isset($_GET['pnm'])) {
    $transtins = DB::table($tTableName)->where('csId', $v->id)->where('tType', $_GET['pnm'])->get();
} else {
    $transtins = DB::table('customer_transactions')->where('csId', $v->id)->get();
}

// Global income sums for user (overall totals, ignoring active table filters)
$all_transactions_for_sums = DB::table('customer_transactions')->where('csId', $v->id)->get();
$total_ref_income = (float) $all_transactions_for_sums->where('tType', 'refincome')->where('wStatus', '0')->sum('tAmount');
$total_lev_income = (float) $all_transactions_for_sums->where('tType', 'levincome')->where('wStatus', '0')->sum('tAmount');
$total_stake_income = (float) $all_transactions_for_sums->whereIn('tType', ['pincome', 'stake_income'])->where('wStatus', '0')->sum('tAmount');
$total_sub_income = (float) $all_transactions_for_sums->where('tType', 'sub_income')->where('wStatus', '0')->sum('tAmount');

$grand_total_income = $total_ref_income + $total_lev_income + $total_stake_income + $total_sub_income;

// Percentage calculations for dynamic chart
$pct_ref = $grand_total_income > 0 ? ($total_ref_income / $grand_total_income) * 100 : 0;
$pct_lev = $grand_total_income > 0 ? ($total_lev_income / $grand_total_income) * 100 : 0;
$pct_stake = $grand_total_income > 0 ? ($total_stake_income / $grand_total_income) * 100 : 0;
$pct_sub = $grand_total_income > 0 ? ($total_sub_income / $grand_total_income) * 100 : 0;
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Transactions & Income Analytics</title>

    <meta name="description" content="View your customer transactions history and income analytics dashboard." />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>

    <style>
        .income-stream-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .income-stream-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6) !important;
        }

        .dropdown-item:hover {
            background: rgba(249, 168, 38, 0.1) !important;
            color: #ffd700 !important;
        }

        /* Custom styled analytics card */
        .analytics-card {
            background: linear-gradient(135deg, rgba(20, 22, 28, 0.95) 0%, rgba(10, 11, 15, 0.98) 100%) !important;
            border: 1px solid rgba(249, 168, 38, 0.18) !important;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            padding: 24px;
            min-height: 230px;
        }

        .wallet-overview-card {
            background: linear-gradient(135deg, rgba(20, 22, 28, 0.95) 0%, rgba(10, 11, 15, 0.98) 100%) !important;
            border: 1px solid rgba(249, 168, 38, 0.18) !important;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            padding: 24px;
            min-height: 230px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* --- PREMIUM LEDGER TABLE DESIGN SYSTEM --- */
        .premium-ledger-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            /* Floating rows spacing */
            margin-top: -10px;
        }

        .premium-ledger-table th {
            color: rgba(255, 255, 255, 0.7) !important;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 14px 20px !important;
            border: none !important;
            background: transparent !important;
        }

        .premium-ledger-table tbody tr.txn-row {
            background: rgba(255, 255, 255, 0.015) !important;
            border: 1px solid rgba(255, 255, 255, 0.03) !important;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
        }

        .premium-ledger-table tbody tr.txn-row:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.045) !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5), inset 0 0 0 1px rgba(249, 168, 38, 0.15);
        }

        .premium-ledger-table td {
            padding: 16px 20px !important;
            border: none !important;
            vertical-align: middle;
            color: rgba(255, 255, 255, 0.85);
        }

        .premium-ledger-table td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: relative;
        }

        .premium-ledger-table td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Row Side Color indicators on hover based on type */
        .premium-ledger-table tbody tr.txn-row td:first-child::before {
            content: '';
            position: absolute;
            left: 0;
            top: 10%;
            height: 80%;
            width: 4px;
            border-radius: 4px;
            background: transparent;
            transition: all 0.3s ease;
        }

        .premium-ledger-table tbody tr.row-refincome td:first-child::before {
            background: rgba(249, 168, 38, 0.2);
        }

        .premium-ledger-table tbody tr.row-refincome:hover td:first-child::before {
            background: #f9a826;
            box-shadow: 0 0 10px #f9a826;
        }

        .premium-ledger-table tbody tr.row-levincome td:first-child::before {
            background: rgba(59, 130, 246, 0.2);
        }

        .premium-ledger-table tbody tr.row-levincome:hover td:first-child::before {
            background: #3b82f6;
            box-shadow: 0 0 10px #3b82f6;
        }

        .premium-ledger-table tbody tr.row-pincome td:first-child::before,
        .premium-ledger-table tbody tr.row-stake_income td:first-child::before {
            background: rgba(168, 85, 247, 0.2);
        }

        .premium-ledger-table tbody tr.row-pincome:hover td:first-child::before,
        .premium-ledger-table tbody tr.row-stake_income:hover td:first-child::before {
            background: #a855f7;
            box-shadow: 0 0 10px #a855f7;
        }

        .premium-ledger-table tbody tr.row-sub_income td:first-child::before {
            background: rgba(0, 208, 148, 0.2);
        }

        .premium-ledger-table tbody tr.row-sub_income:hover td:first-child::before {
            background: #00D094;
            box-shadow: 0 0 10px #00D094;
        }

        .premium-ledger-table tbody tr.row-allincome td:first-child::before {
            background: rgba(239, 68, 68, 0.2);
        }

        .premium-ledger-table tbody tr.row-allincome:hover td:first-child::before {
            background: #ef4444;
            box-shadow: 0 0 10px #ef4444;
        }

        /* Source / Details custom buttons */
        .txn-link {
            transition: all 0.25s ease;
        }

        .txn-link:hover {
            border-color: rgba(249, 168, 38, 0.4) !important;
            background: rgba(249, 168, 38, 0.08) !important;
            color: #ffd700 !important;
            transform: scale(1.02);
        }

        /* Custom styling for summary rows */
        .premium-ledger-table tr.summary-row {
            background: transparent !important;
            transform: none !important;
            box-shadow: none !important;
        }

        .premium-ledger-table tr.summary-row td {
            padding: 10px 20px !important;
            background: transparent !important;
        }

        .premium-ledger-table tr.summary-row:first-of-type td {
            border-top: 1px solid rgba(249, 168, 38, 0.12) !important;
            padding-top: 20px !important;
        }

    </style>
</head>

<body style="background-color: #050b08;">

    @include('dashboard.dcards.naver')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.dcards.menu', ['r' => ($_GET['pnm'] ?? ''). ($_GET['typ'] ?? '') . 'transactions'])
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
                        <h4 class="fw-bold py-3 mb-4" style="color: #fff !important;">
                            <span class="text-muted fw-light">Dashboard /</span>
                            Income Analytics & Transactions
                        </h4>

                        <!-- Analytics Summary Cards -->
                        <div class="row mb-4">
                            <!-- Grand Total Analytics Card -->
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <div class="card analytics-card">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <span class="text-uppercase tracking-wider" style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.6); letter-spacing: 1.5px;">Income Distribution & Analytics</span>
                                            <h2 class="mt-1" style="font-weight: 800; color: #fff; margin-bottom: 0; font-size: 28px;">
                                                {{ number_format($grand_total_income, 2) }}
                                                <span style="font-size: 16px; font-weight: 600; color: #f9a826;">USDT</span>
                                            </h2>
                                            <span style="font-size: 11px; color: rgba(255,255,255,0.45);">Combined total of all four income streams</span>
                                        </div>
                                        <div class="analytics-badge" style="background: rgba(249, 168, 38, 0.1); border: 1px solid rgba(249, 168, 38, 0.25); border-radius: 30px; padding: 6px 14px; font-size: 11px; color: #f9a826; font-weight: 600; display: inline-flex; align-items: center; gap: 6px;">
                                            <i class="bx bx-analyse" style="font-size: 14px;"></i> Live Data
                                        </div>
                                    </div>

                                    <!-- Custom Stacked Progress Bar Visual -->
                                    <div style="margin-top: 25px; margin-bottom: 20px;">
                                        <div style="display: flex; height: 16px; width: 100%; background-color: #222; border-radius: 10px; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
                                            @if($grand_total_income > 0)
                                            <div style="width: {{ $pct_ref }}%; background: linear-gradient(90deg, #ffd700, #f9a826); transition: width 0.5s;" title="Referral: {{ number_format($pct_ref, 1) }}%"></div>
                                            <div style="width: {{ $pct_lev }}%; background: linear-gradient(90deg, #3b82f6, #1d4ed8); transition: width 0.5s;" title="Level: {{ number_format($pct_lev, 1) }}%"></div>
                                            <div style="width: {{ $pct_stake }}%; background: linear-gradient(90deg, #a855f7, #7c3aed); transition: width 0.5s;" title="Stake: {{ number_format($pct_stake, 1) }}%"></div>
                                            <div style="width: {{ $pct_sub }}%; background: linear-gradient(90deg, #00D094, #059669); transition: width 0.5s;" title="Subscription: {{ number_format($pct_sub, 1) }}%"></div>
                                            @else
                                            <div style="width: 100%; background: #444;" title="No Income Recorded"></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Legend / Stream Details Grid -->
                                    <div class="row text-white text-center text-sm-start" style="gap: 10px 0;">
                                        <div class="col-6 col-sm-3">
                                            <div class="d-flex align-items-center justify-content-center justify-content-sm-start gap-2">
                                                <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #f9a826;"></span>
                                                <span style="font-size: 11px; color: rgba(255,255,255,0.7); font-weight: 500;">Referral</span>
                                            </div>
                                            <h5 class="mt-1 mb-0" style="font-size: 14px; font-weight: 700; color: #fff;">
                                                {{ number_format($pct_ref, 1) }}%
                                            </h5>
                                        </div>
                                        <div class="col-6 col-sm-3">
                                            <div class="d-flex align-items-center justify-content-center justify-content-sm-start gap-2">
                                                <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #3b82f6;"></span>
                                                <span style="font-size: 11px; color: rgba(255,255,255,0.7); font-weight: 500;">Level</span>
                                            </div>
                                            <h5 class="mt-1 mb-0" style="font-size: 14px; font-weight: 700; color: #fff;">
                                                {{ number_format($pct_lev, 1) }}%
                                            </h5>
                                        </div>
                                        <div class="col-6 col-sm-3">
                                            <div class="d-flex align-items-center justify-content-center justify-content-sm-start gap-2">
                                                <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #a855f7;"></span>
                                                <span style="font-size: 11px; color: rgba(255,255,255,0.7); font-weight: 500;">Stake</span>
                                            </div>
                                            <h5 class="mt-1 mb-0" style="font-size: 14px; font-weight: 700; color: #fff;">
                                                {{ number_format($pct_stake, 1) }}%
                                            </h5>
                                        </div>
                                        <div class="col-6 col-sm-3">
                                            <div class="d-flex align-items-center justify-content-center justify-content-sm-start gap-2">
                                                <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #00D094;"></span>
                                                <span style="font-size: 11px; color: rgba(255,255,255,0.7); font-weight: 500;">Subscription</span>
                                            </div>
                                            <h5 class="mt-1 mb-0" style="font-size: 14px; font-weight: 700; color: #fff;">
                                                {{ number_format($pct_sub, 1) }}%
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Wallet Overview Card -->
                            <div class="col-12 col-xl-4">
                                <div class="card wallet-overview-card">
                                    <div>
                                        <span class="text-uppercase tracking-wider" style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.6); letter-spacing: 1.5px;">Wallet Overview</span>
                                        <div class="mt-3">
                                            <div class="d-flex justify-content-between mb-2" style="font-size: 13px;">
                                                <span style="color: rgba(255,255,255,0.7);">Filtered Credits:</span>
                                                <span class="text-success fw-bold">+{{ number_format($transtins->where('wStatus', '0')->sum('tAmount'), 2) }} USDT</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2" style="font-size: 13px;">
                                                <span style="color: rgba(255,255,255,0.7);">Filtered Debits:</span>
                                                <span class="text-danger fw-bold">-{{ number_format($transtins->where('wStatus', '1')->sum('tAmount'), 2) }} USDT</span>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2 border-top" style="border-top-color: rgba(255, 255, 255, 0.12) !important; font-size: 14px;">
                                                <span style="color: #fff; font-weight: 600;">Net Balance:</span>
                                                <span style="color: #ffd700; font-weight: 800;">{{ number_format($transtins->where('wStatus', '0')->sum('tAmount') - $transtins->where('wStatus', '1')->sum('tAmount'), 2) }} USDT</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <a href="/dashboard/withdraw/all" class="btn w-100 text-center" style="padding: 8px 12px; font-size: 12px; background: linear-gradient(135deg, #a78200, #8d6900) !important; border: none; color: #fff; border-radius: 8px; font-weight: 600; display: block;">Withdraw Income</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Income Stream Cards Grid -->
                        <div class="row mb-4">
                            <!-- Referral Income Card -->
                            <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                                <div class="card income-stream-card" style="background: linear-gradient(135deg, rgba(25, 20, 10, 0.95) 0%, rgba(10, 10, 5, 0.98) 100%) !important; border-left: 4px solid #f9a826 !important; border-top: 1px solid rgba(249, 168, 38, 0.15); border-right: 1px solid rgba(249, 168, 38, 0.15); border-bottom: 1px solid rgba(249, 168, 38, 0.15); border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.4); padding: 18px; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span style="font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.5px;">Referral Income</span>
                                            <h3 class="mt-2 mb-1" style="font-weight: 800; color: #fff; font-size: 20px;">
                                                {{ number_format($total_ref_income, 2) }}
                                                <span style="font-size: 11px; font-weight: 500; color: #f9a826;">USDT</span>
                                            </h3>
                                        </div>
                                        <div style="background: rgba(249,168,38,0.1); border-radius: 50%; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(249, 168, 38, 0.2);">
                                            <img src="/tst/goldenlogo.png" alt="icon" style="height: 22px; width: 22px; object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="/dashboard/refincome" class="btn btn-sm w-100 text-center" style="padding: 6px 12px; font-size: 11px; background: rgba(249, 168, 38, 0.15) !important; border: 1px solid rgba(249, 168, 38, 0.3) !important; color: #f9a826 !important; border-radius: 8px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 4px; transition: all 0.3s ease; text-decoration: none;">
                                            <i class="bx bx-history"></i> History
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Level Income Card -->
                            <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                                <div class="card income-stream-card" style="background: linear-gradient(135deg, rgba(10, 20, 30, 0.95) 0%, rgba(5, 10, 15, 0.98) 100%) !important; border-left: 4px solid #3b82f6 !important; border-top: 1px solid rgba(59, 130, 246, 0.15); border-right: 1px solid rgba(59, 130, 246, 0.15); border-bottom: 1px solid rgba(59, 130, 246, 0.15); border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.4); padding: 18px; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span style="font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.5px;">Level Income</span>
                                            <h3 class="mt-2 mb-1" style="font-weight: 800; color: #fff; font-size: 20px;">
                                                {{ number_format($total_lev_income, 2) }}
                                                <span style="font-size: 11px; font-weight: 500; color: #3b82f6;">USDT</span>
                                            </h3>
                                        </div>
                                        <div style="background: rgba(59,130,246,0.1); border-radius: 50%; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(59, 130, 246, 0.2);">
                                            <img src="/tst/goldenlogo.png" alt="icon" style="height: 22px; width: 22px; object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="/dashboard/levincome/1" class="btn btn-sm w-100 text-center" style="padding: 6px 12px; font-size: 11px; background: rgba(59, 130, 246, 0.15) !important; border: 1px solid rgba(59, 130, 246, 0.3) !important; color: #3b82f6 !important; border-radius: 8px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 4px; transition: all 0.3s ease; text-decoration: none;">
                                            <i class="bx bx-history"></i> History
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Stake Income Card -->
                            <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-sm-0">
                                <div class="card income-stream-card" style="background: linear-gradient(135deg, rgba(20, 10, 30, 0.95) 0%, rgba(10, 5, 15, 0.98) 100%) !important; border-left: 4px solid #a855f7 !important; border-top: 1px solid rgba(168, 85, 247, 0.15); border-right: 1px solid rgba(168, 85, 247, 0.15); border-bottom: 1px solid rgba(168, 85, 247, 0.15); border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.4); padding: 18px; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span style="font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.5px;">Stake Income</span>
                                            <h3 class="mt-2 mb-1" style="font-weight: 800; color: #fff; font-size: 20px;">
                                                {{ number_format($total_stake_income, 2) }}
                                                <span style="font-size: 11px; font-weight: 500; color: #a855f7;">USDT</span>
                                            </h3>
                                        </div>
                                        <div style="background: rgba(168,85,247,0.1); border-radius: 50%; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(168, 85, 247, 0.2);">
                                            <img src="/tst/goldenlogo.png" alt="icon" style="height: 22px; width: 22px; object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="/dashboard/status/deposit" class="btn btn-sm w-100 text-center" style="padding: 6px 12px; font-size: 11px; background: rgba(168, 85, 247, 0.15) !important; border: 1px solid rgba(168, 85, 247, 0.3) !important; color: #a855f7 !important; border-radius: 8px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 4px; transition: all 0.3s ease; text-decoration: none;">
                                            <i class="bx bx-history"></i> History
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Subscription Income Card -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="card income-stream-card" style="background: linear-gradient(135deg, rgba(10, 25, 20, 0.95) 0%, rgba(5, 10, 10, 0.98) 100%) !important; border-left: 4px solid #00D094 !important; border-top: 1px solid rgba(0, 208, 148, 0.15); border-right: 1px solid rgba(0, 208, 148, 0.15); border-bottom: 1px solid rgba(0, 208, 148, 0.15); border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.4); padding: 18px; display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <span style="font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.5px;">Subscription Income</span>
                                            <h3 class="mt-2 mb-1" style="font-weight: 800; color: #fff; font-size: 20px;">
                                                {{ number_format($total_sub_income, 2) }}
                                                <span style="font-size: 11px; font-weight: 500; color: #00D094;">USDT</span>
                                            </h3>
                                        </div>
                                        <div style="background: rgba(0,208,148,0.1); border-radius: 50%; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(0, 208, 148, 0.2);">
                                            <img src="/tst/goldenlogo.png" alt="icon" style="height: 22px; width: 22px; object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="/dashboard/status/transactions?type=sub_income" class="btn btn-sm w-100 text-center" style="padding: 6px 12px; font-size: 11px; background: rgba(0, 208, 148, 0.15) !important; border: 1px solid rgba(0, 208, 148, 0.3) !important; color: #00D094 !important; border-radius: 8px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 4px; transition: all 0.3s ease; text-decoration: none;">
                                            <i class="bx bx-history"></i> History
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transactions Table -->
                        <div class="card premium-card" style="background: linear-gradient(135deg, rgba(20, 22, 28, 0.95) 0%, rgba(10, 11, 15, 0.98) 100%) !important; border: 1px solid rgba(249, 168, 38, 0.18) !important; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); overflow: hidden;">
                            <div style="padding: 1.5rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(249, 168, 38, 0.12);" class="card-header bg-transparent d-flex flex-column flex-md-row gap-3">
                                <h5 class="mb-0 text-white" style="font-weight: 700; font-size: 16px; display: inline-flex; align-items: center; gap: 8px;">
                                    <i class="bx bx-list-ul" style="color: #f9a826; font-size: 20px;"></i>
                                    @if(isset($_GET['pnm']))
                                    {{ getPname($_GET['pnm']) }}
                                    @endif
                                    @if(isset($_GET['typ']))
                                    Transfer Credit
                                    @else
                                    Transaction
                                    @endif
                                    History
                                </h5>

                                <div class="d-flex align-items-center gap-2">
                                    @if(!isset($_GET['typ']))
                                    <span style="font-size: 11px; color: rgba(255,255,255,0.6);">Filter:</span>
                                    <button style="background-color: #0c2820 !important; border: 1px solid rgba(249, 168, 38, 0.25) !important; color: #fff !important; padding: 6px 16px !important; font-size: 13px !important; border-radius: 8px !important;" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $btnTxt }}
                                    </button>
                                    @endif

                                    <ul class="dropdown-menu dropdown-menu-end" style="background-color: #0c2820 !important; border: 1px solid rgba(249, 168, 38, 0.25) !important; box-shadow: 0 10px 40px rgba(0,0,0,0.6) !important; border-radius: 10px !important;">
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=all">All</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=refincome">Referral Income</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=pincome">Profit Income</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=stake_income">Stake Income</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=sub_income">Subscription Income</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=levincome">All Level Income</a></li>
                                        <li>
                                            <hr class="dropdown-divider" style="border-top: 1px solid rgba(249, 168, 38, 0.12) !important;" />
                                        </li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=levincome&lev=1">First Level</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=levincome&lev=2">Second Level</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=levincome&lev=3">Third Level</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=levincome&lev=4">Fourth Level</a></li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=levincome&lev=5">Fifth Level</a></li>
                                        <li>
                                            <hr class="dropdown-divider" style="border-top: 1px solid rgba(249, 168, 38, 0.12) !important;" />
                                        </li>
                                        <li><a class="dropdown-item text-white" href="/dashboard/status/transactions?type=allincome">Withdrawals</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="table-responsive text-nowrap" style="padding: 10px 20px 20px 20px; min-height: 500px;">
                                <table class="premium-ledger-table" style="margin-bottom: 0;">
                                    <thead>
                                        <tr style="color: rgba(255,255,255,0.7) !important;">
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Source / Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transtins as $trasaction)
                                        <tr class="txn-row row-{{ $trasaction->tType }}">
                                            <td style="font-size: 11px; color: rgba(255,255,255,0.85);">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bx bx-calendar-alt" style="color: rgba(255,255,255,0.4); font-size: 14px;"></i>
                                                    {{ date('d M Y, h:i A', strtotime($trasaction->created_at)) }}
                                                </div>
                                            </td>
                                            <td>
                                                @php
                                                $badgeColor = '#6c757d';
                                                $tName = getPname($trasaction->tType);
                                                if ($trasaction->tType == 'refincome') $badgeColor = '#f9a826';
                                                elseif ($trasaction->tType == 'levincome') $badgeColor = '#3b82f6';
                                                elseif ($trasaction->tType == 'pincome') $badgeColor = '#a855f7';
                                                elseif ($trasaction->tType == 'stake_income') $badgeColor = '#a855f7';
                                                elseif ($trasaction->tType == 'sub_income') $badgeColor = '#00D094';
                                                elseif ($trasaction->tType == 'allincome') $badgeColor = '#ef4444';
                                                @endphp
                                                <span class="badge" style="background: rgba(255, 255, 255, 0.05); border: 1px solid {{ $badgeColor }}; color: {{ $badgeColor }}; font-size: 11px; padding: 4px 8px; border-radius: 6px;">
                                                    @if(isset($trasaction->levl))
                                                    L{{ $trasaction->levl }}
                                                    @endif
                                                    {{ $tName }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($trasaction->wStatus == '1')
                                                <span style="color: #ef4444 !important; font-weight: 700; font-size: 13px; text-shadow: 0 0 10px rgba(239, 68, 68, 0.15);">
                                                    -{{ number_format($trasaction->tAmount, $trasaction->tType == 'mine_amount' ? 10 : 3) }} USDT
                                                </span>
                                                @else
                                                <span style="color: #00D094 !important; font-weight: 700; font-size: 13px; text-shadow: 0 0 10px rgba(0, 208, 148, 0.15);">
                                                    +{{ number_format($trasaction->tAmount, $trasaction->tType == 'mine_amount' ? 10 : 3) }} USDT
                                                </span>
                                                @endif
                                            </td>
                                            <td style="font-size: 12px !important;">
                                                @if($trasaction->planId != null)
                                                <a href="/dashboard/status/deposit?plnid={{$trasaction->planId}}" class="txn-link text-white" style="text-decoration: none; display: inline-flex; align-items: center; gap: 6px; border-radius: 6px; padding: 4px 8px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                                                    @php
                                                    $plndtls = DB::table('customer_plans')->where('id',$trasaction->planId)->first();
                                                    $plnusr = $plndtls ? DB::table('customers')->where('id',$plndtls->csId)->first() : null;
                                                    @endphp
                                                    <i class="bx bx-right-top-arrow-circle" style="color: #f9a826; font-size: 14px;"></i>
                                                    <span>Stake:</span>
                                                    <span style="color: #ffd700; font-weight: 600;">{{ $plndtls ? $plndtls->pamount : 0 }} U</span>
                                                    @if($plnusr)
                                                    <span style="color: rgba(255,255,255,0.5);">({{ $plnusr->uid }})</span>
                                                    @endif
                                                </a>
                                                @endif
                                                @if($trasaction->wthId != null)
                                                @php
                                                $wthDrawData = DB::table('customer_withdraws')->where('id',$trasaction->wthId)->first();
                                                @endphp
                                                @if($wthDrawData)
                                                <a href="/dashboard/status/withdraw?wthid={{$trasaction->wthId}}" class="txn-link text-white" style="text-decoration: none; display: inline-flex; align-items: center; gap: 6px; border-radius: 6px; padding: 4px 8px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                                                    <i class="bx bx-left-down-arrow-circle" style="color: #ef4444; font-size: 14px;"></i>
                                                    <span>Withdraw: {{ getPname($wthDrawData->pname) }}</span>
                                                </a>
                                                @endif
                                                @endif
                                                @if($tTableName == 'customer_transfers')
                                                @if($trasaction->crId != null)
                                                <a href="/dashboard/status/credit?plnid={{$trasaction->crId}}" class="txn-link" style="color: #ffd700; text-decoration: none; font-weight: 600;">
                                                    Add Fund
                                                </a>
                                                @endif
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                        @if(!isset($_GET['typ']) && count($transtins) > 0)
                                        <tr class="summary-row">
                                            <td colspan="2" style="text-align: right; font-weight: 700; color: rgba(255,255,255,0.6); font-size: 12px;">Filtered Total Credits:</td>
                                            <td style="color: #00D094; font-weight: 800; font-size: 13px; text-shadow: 0 0 8px rgba(0, 208, 148, 0.1);">+{{ number_format($transtins->where('wStatus','0')->sum('tAmount'), 3) }} USDT</td>
                                            <td></td>
                                        </tr>
                                        <tr class="summary-row">
                                            <td colspan="2" style="text-align: right; font-weight: 700; color: rgba(255,255,255,0.6); font-size: 12px;">Filtered Total Debits:</td>
                                            <td style="color: #ef4444; font-weight: 800; font-size: 13px; text-shadow: 0 0 8px rgba(239, 68, 68, 0.1);">-{{ number_format($transtins->where('wStatus','1')->sum('tAmount'), 3) }} USDT</td>
                                            <td></td>
                                        </tr>
                                        <tr class="summary-row">
                                            <td colspan="2" style="text-align: right; font-weight: 800; color: #fff; font-size: 13px; letter-spacing: 0.5px;">Filtered Net Balance:</td>
                                            <td style="color: #ffd700; font-weight: 800; font-size: 14px; text-shadow: 0 0 10px rgba(255, 215, 0, 0.15);">{{ number_format($transtins->where('wStatus','0')->sum('tAmount') - $transtins->where('wStatus','1')->sum('tAmount'), 3) }} USDT</td>
                                            <td></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr class="my-5" style="border-top-color: rgba(255,255,255,0.08) !important;" />

                        <!-- Footer -->
                        @include('dashboard.dcards.footer')
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
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

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
