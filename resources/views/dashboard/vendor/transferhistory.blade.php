<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Transfer History - GoldenWay</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png" />

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>

    <style>
        /* Premium Core Styles */
        body {
            background-color: #040907 !important;
        }

        .premium-card {
            background: radial-gradient(circle at top right, rgba(141, 105, 0, 0.12) 0%, rgba(10, 15, 12, 0.98) 70%, #050d0a 100%) !important;
            border: 1px solid rgba(212, 175, 55, 0.2) !important;
            border-radius: 16px !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6), 0 0 15px rgba(212, 175, 55, 0.05) !important;
            backdrop-filter: blur(12px);
            overflow: hidden;
            margin-bottom: 2rem !important;
        }

        .premium-card .card-header {
            background: rgba(255, 255, 255, 0.01) !important;
            border-bottom: 1px solid rgba(212, 175, 55, 0.15) !important;
            padding: 20px 24px !important;
        }

        .premium-card .card-header h5 {
            color: #ffd700 !important;
            font-size: 1.15rem !important;
            font-weight: 700 !important;
            letter-spacing: 1.5px !important;
            margin: 0 !important;
            text-transform: uppercase;
            background: linear-gradient(135deg, #FFE082 0%, #D4AF37 50%, #B8860B 100%);
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        /* Stats Grid */
        .premium-stat-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.01) 100%) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 12px !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
            transition: all 0.3s ease;
            height: 100%;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .premium-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }

        .stat-received::before {
            background: linear-gradient(180deg, #00D094, #008f66);
        }

        .stat-sent::before {
            background: linear-gradient(180deg, #ef4444, #bd2c2c);
        }

        .stat-count::before {
            background: linear-gradient(180deg, #FFE082, #D4AF37);
        }

        .stat-balance::before {
            background: linear-gradient(180deg, #60a5fa, #3b82f6);
        }

        .premium-stat-card:hover {
            transform: translateY(-3px);
            border-color: rgba(212, 175, 55, 0.3) !important;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5) !important;
        }

        .premium-stat-card .card-body {
            padding: 20px !important;
        }

        .premium-stat-card .stat-label {
            font-size: 0.68rem !important;
            font-weight: 700 !important;
            color: rgba(255, 255, 255, 0.45) !important;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .premium-stat-card .stat-label i {
            font-size: 1rem;
        }

        .premium-stat-card .card-title {
            margin: 0 !important;
            color: #ffffff !important;
            font-weight: 800 !important;
            font-size: 1.6rem !important;
            display: flex;
            align-items: baseline;
            gap: 4px;
        }

        .premium-stat-card .card-title span.currency {
            color: #D4AF37 !important;
            font-weight: 600 !important;
            font-size: 11px;
            margin-left: 2px;
        }

        /* Table Design */
        .premium-table {
            margin-bottom: 0 !important;
            background: transparent !important;
            color: #ffffff !important;
            width: 100%;
            border-collapse: collapse;
        }

        .premium-table thead {
            background: rgba(255, 255, 255, 0.02) !important;
        }

        .premium-table thead th {
            border: none !important;
            border-bottom: 2px solid rgba(212, 175, 55, 0.15) !important;
            color: #D4AF37 !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 0.7rem !important;
            letter-spacing: 1px !important;
            padding: 14px 20px !important;
        }

        .premium-table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
            transition: background 0.3s ease;
        }

        .premium-table tbody tr:hover {
            background: rgba(212, 175, 55, 0.04) !important;
        }

        .premium-table tbody td {
            border: none !important;
            padding: 12px 20px !important;
            color: rgba(255, 255, 255, 0.85) !important;
            font-size: 0.825rem !important;
            vertical-align: middle;
        }

        /* Badges */
        .premium-badge-success {
            background: rgba(0, 208, 148, 0.12) !important;
            border: 1px solid rgba(0, 208, 148, 0.25) !important;
            color: #00D094 !important;
            padding: 4px 10px !important;
            border-radius: 20px !important;
            font-weight: 700 !important;
            font-size: 11px !important;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .premium-badge-warning {
            background: rgba(249, 168, 38, 0.12) !important;
            border: 1px solid rgba(249, 168, 38, 0.25) !important;
            color: #f9a826 !important;
            padding: 4px 10px !important;
            border-radius: 20px !important;
            font-weight: 700 !important;
            font-size: 11px !important;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .premium-badge-danger {
            background: rgba(239, 68, 68, 0.12) !important;
            border: 1px solid rgba(239, 68, 68, 0.25) !important;
            color: #ef4444 !important;
            padding: 4px 10px !important;
            border-radius: 20px !important;
            font-weight: 700 !important;
            font-size: 11px !important;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* Responsive Overrides */
        @media (max-width: 768px) {
            .premium-table thead th {
                padding: 10px 12px !important;
                font-size: 0.65rem !important;
            }

            .premium-table tbody td {
                padding: 10px 12px !important;
                font-size: 0.75rem !important;
            }
        }

    </style>
</head>

<body>
    @include('dashboard.dcards.naver', ['r' => 'dashboard'])

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.dcards.menu', ['r' => 'trnsfrwithdrawhistory'])
            <!-- / Menu -->

            <div class="layout-page">
                <!-- Navbar -->
                @include('dashboard.dcards.nav')
                <!-- / Navbar -->

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-4" style="color: #fff !important;">
                            <span class="text-muted fw-light">Dashboard /</span> Transfer History
                        </h4>

                        @php
                        $total_received = (float) DB::table('customer_transfers')->where('tuserid', $v->id)->where('wStatus', '0')->sum('tAmount');
                        $total_transferred = abs((float) DB::table('customer_transfers')->where('fuserid', $v->id)->where('wStatus', '1')->sum('tAmount'));
                        $net_balance = (float) DB::table('customer_transfers')->where('csId', $v->id)->sum('tAmount');;
                        @endphp

                        <!-- Summary Stats Grid -->
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card premium-stat-card stat-received">
                                    <div class="card-body">
                                        <span class="stat-label"><i class="bx bx-down-arrow-alt" style="color: #00D094;"></i> Total Received</span>
                                        <h3 class="card-title">
                                            {{ number_format($total_received, 2) }}
                                            <span class="currency">USDT</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card premium-stat-card stat-sent">
                                    <div class="card-body">
                                        <span class="stat-label"><i class="bx bx-up-arrow-alt" style="color: #ef4444;"></i> Total Transferred</span>
                                        <h3 class="card-title">
                                            {{ number_format($total_transferred, 2) }}
                                            <span class="currency">USDT</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card premium-stat-card stat-count">
                                    <div class="card-body">
                                        <span class="stat-label"><i class="bx bx-list-check" style="color: #D4AF37;"></i> Total Transfers</span>
                                        <h3 class="card-title">
                                            {{ DB::table('customer_transfers')->where('csId',$v->id)->orWhere('fuserid',$v->id)->orWhere('tuserid',$v->id)->count() }}
                                            <span class="currency">Transactions</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card premium-stat-card stat-balance">
                                    <div class="card-body">
                                        <span class="stat-label"><i class="bx bx-wallet-alt" style="color: #60a5fa;"></i> Net Balance</span>
                                        <h3 class="card-title" style="color: {{ $net_balance >= 0 ? '#60a5fa' : '#ef4444' }} !important;">
                                            {{ $net_balance >= 0 ? '+' : '' }}{{ number_format($net_balance, 2) }}
                                            <span class="currency">USDT</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transfer History Table Card -->
                        @php $showAll = request('show_all') == '1'; @endphp
                        <div class="card premium-card">
                            <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <h5 class="mb-0">Transfer Transactions</h5>
                                @if($showAll)
                                    <a href="{{ request()->fullUrlWithoutQuery(['show_all']) }}"
                                       class="btn btn-sm px-3 py-1 fw-semibold"
                                       style="background: linear-gradient(135deg,#00D094,#008f66); color:#fff; border-radius:8px; font-size:0.78rem; letter-spacing:0.4px; box-shadow:0 2px 10px rgba(0,208,148,.35);">
                                        <i class="bx bx-transfer-alt me-1"></i>Transfers Only
                                    </a>
                                @else
                                    <a href="{{ request()->fullUrlWithQuery(['show_all' => '1']) }}"
                                       class="btn btn-sm px-3 py-1 fw-semibold"
                                       style="background: linear-gradient(135deg,#60a5fa,#3b82f6); color:#fff; border-radius:8px; font-size:0.78rem; letter-spacing:0.4px; box-shadow:0 2px 10px rgba(96,165,250,.35);">
                                        <i class="bx bx-list-ul me-1"></i>Show All
                                    </a>
                                @endif
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table premium-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date & Time</th>
                                            <th>Type</th>
                                            <th>Sender</th>
                                            <th>Recipient</th>
                                            <th>Status</th>
                                            <th>Transfer Amount</th>
                                            <th>Admin Fee</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = DB::table('customer_transfers')
                                                ->where(function($q) use ($v) {
                                                   // $q->where('csId', $v->id)
                                                      $q->orWhere('fuserid', $v->id)
                                                      ->orWhere('tuserid', $v->id);
                                                });
                                            if (!$showAll) {
                                                $query->where('tType', 'transfer');
                                            }
                                            $withdraws = $query->orderBy('id', 'desc')->get();
                                            $i = 0;
                                            ?>
                                        @if($withdraws->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center py-4" style="color: rgba(255, 255, 255, 0.4) !important;">
                                                No peer-to-peer transfers found.
                                            </td>
                                        </tr>
                                        @else
                                        @foreach($withdraws as $wthdraw)
                                        <?php
                                                $i++;
                                                $istransfer = false;
                                                $isDebit = false;
                                                $ffuser = null;
                                                $ttuser = null;
                                                if($wthdraw->tType == 'transfer'){
                                                    $istransfer = true;
                                                    $wthdrw = DB::table('customer_withdraws')->where('id',$wthdraw->wthId)->first();
                                                    $ffuser = DB::table('customers')->where('id', $wthdraw->fuserid ?? 0)->first();
                                                    $ttuser = DB::table('customers')->where('id', $wthdraw->tuserid ?? 0)->first();
                                                    if ($wthdraw->fuserid == $v->id) {
                                                        $isDebit = true;
                                                    }
                                                } else {
                                                    if ($wthdraw->wStatus != '0') {
                                                        $isDebit = true;
                                                    }
                                                }
                                                
                                                ?>
                                        <tr>
                                            <td><span class="text-muted">{{$i}}</span></td>
                                            <td>
                                                <span class="text-muted"><i class="bx bx-calendar-alt me-1"></i>{{ date('d M, Y', strtotime($wthdraw->created_at)) }}</span>
                                                <br>
                                                <span style="font-size: 11px; color: rgba(255,255,255,0.45);"><i class="bx bx-time-five me-1"></i>{{ date('h:i a', strtotime($wthdraw->created_at)) }}</span>
                                            </td>
                                            <td>
                                                <span style="font-weight: 600; color: #FFE082; display: block; margin-bottom: 4px;">
                                                    {{getPname($wthdraw->tType)}}
                                                </span>
                                                @if($isDebit)
                                                <span class="premium-badge-danger" style="padding: 2px 6px !important; font-size: 9px !important; line-height: 1;"><i class="bx bx-minus-circle"></i> Debited</span>
                                                @else
                                                <span class="premium-badge-success" style="padding: 2px 6px !important; font-size: 9px !important; line-height: 1;"><i class="bx bx-plus-circle"></i> Credited</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($ffuser)
                                                @if($ffuser->id == $v->id)
                                                <span style="color: #00D094; font-weight: 600;"><i class="bx bx-user me-1"></i>You</span>
                                                @else
                                                <a style="color: #D4AF37; font-weight: 600; text-decoration: none;" href="/dashboard/profile?prfid={{ $ffuser->id }}">
                                                    {{ $ffuser->uid }}
                                                </a>
                                                @endif
                                                @else
                                                <span style="color: rgba(255,255,255,0.45);">System</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($ttuser)
                                                @if($ttuser->id == $v->id)
                                                <span style="color: #00D094; font-weight: 600;"><i class="bx bx-user me-1"></i>You</span>
                                                @else
                                                <a style="color: #D4AF37; font-weight: 600; text-decoration: none;" href="/dashboard/profile?prfid={{ $ttuser->id }}">
                                                    {{ $ttuser->uid }}
                                                </a>
                                                @endif
                                                @else
                                                <span style="color: rgba(255,255,255,0.45);">System</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($istransfer && $wthdrw)
                                                @if ($wthdrw->status == '1')
                                                <span class="premium-badge-success"><i class="bx bx-check-circle"></i> Success</span>
                                                @elseif ($wthdrw->status == '0')
                                                <span class="premium-badge-warning"><i class="bx bx-time-five"></i> Pending</span>
                                                <br>
                                                <span style="color: #ef4444; font-size: 10px; font-weight: 600; display: block; margin-top: 3px;">
                                                    Max {{72 - Carbon::parse($wthdrw->created_at)->diffInHours(Carbon::now())}} hrs
                                                </span>
                                                @elseif ($wthdrw->status == '3')
                                                <span class="premium-badge-danger"><i class="bx bx-x-circle"></i> Expired</span>
                                                @endif
                                                @else
                                                <span class="premium-badge-success"><i class="bx bx-check-circle"></i> Completed</span>
                                                @endif
                                            </td>

                                            <!-- Net Transfer Amount -->
                                            <td style="font-weight: 600;">
                                                @if($istransfer && $wthdrw)
                                                {{ number_format($wthdrw->amount, 2) }} USDT
                                                @else
                                                {{ number_format(abs($wthdraw->tAmount), 2) }} USDT
                                                @endif
                                            </td>

                                            <!-- Admin Fee (10% paid by sender) -->
                                            <td style="color: rgba(255, 255, 255, 0.655);">
                                                @if($istransfer && $wthdrw)
                                                @if($isDebit)
                                                {{ number_format($wthdrw->fuel, 2) }} USDT
                                                @else
                                                0.00 USDT
                                                @endif
                                                @else
                                                0.00 USDT
                                                @endif
                                            </td>

                                            <!-- Total Credit (+) / Debit (-) -->
                                            @if($isDebit)
                                            @if($istransfer && $wthdrw)
                                            <td style="color: #ef4444 !important; font-weight: 700; font-size: 0.9rem;">
                                                -{{ number_format($wthdrw->amount + $wthdrw->fuel, 2) }} USDT
                                            </td>
                                            @else
                                            <td style="color: #ef4444 !important; font-weight: 700; font-size: 0.9rem;">
                                                -{{ number_format(abs($wthdraw->tAmount), 2) }} USDT
                                            </td>
                                            @endif
                                            @else
                                            @if($istransfer && $wthdrw)
                                            <td style="color: #00D094 !important; font-weight: 700; font-size: 0.9rem;">
                                                +{{ number_format($wthdrw->amount, 2) }} USDT
                                            </td>
                                            @else
                                            <td style="color: #00D094 !important; font-weight: 700; font-size: 0.9rem;">
                                                +{{ number_format(abs($wthdraw->tAmount), 2) }} USDT
                                            </td>
                                            @endif
                                            @endif
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Footer -->
                        @include('dashboard.dcards.footer')
                        <!-- / Footer -->
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
</body>
</html>
