<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

use Carbon\Carbon;

?>
<!DOCTYPE html>
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

        <title>History</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
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
            /* Premium Card Redesign */
            .premium-card {
                background: linear-gradient(135deg, rgba(7, 31, 23, 0.95), rgba(12, 40, 32, 0.95)) !important;
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(249, 168, 38, 0.25) !important;
                border-radius: 20px !important;
                box-shadow: 0 15px 45px rgba(0, 0, 0, 0.55) !important;
                overflow: hidden;
                margin-bottom: 2rem !important;
            }

            .premium-card .card-header {
                background: rgba(255, 255, 255, 0.02) !important;
                border-bottom: 1px solid rgba(249, 168, 38, 0.15) !important;
                padding: 24px 30px !important;
            }

            .premium-card .card-header h5 {
                color: #ffd700 !important;
                font-size: 22px !important;
                font-weight: 700 !important;
                letter-spacing: 2px !important;
                margin: 0 !important;
                text-transform: uppercase;
                background: linear-gradient(90deg, #ffd700, #f9a826);
                -webkit-background-clip: text !important;
                -webkit-text-fill-color: transparent !important;
            }

            /* Premium Stats Grid */
            .premium-stat-card {
                background: linear-gradient(135deg, rgba(7, 31, 23, 0.8), rgba(12, 40, 32, 0.8)) !important;
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(249, 168, 38, 0.2) !important;
                border-radius: 16px !important;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4) !important;
                transition: all 0.3s ease;
                height: 100%;
                margin-bottom: 1.5rem;
            }

            .premium-stat-card:hover {
                transform: translateY(-4px);
                border-color: rgba(249, 168, 38, 0.4) !important;
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5) !important;
            }

            .premium-stat-card .card-body {
                padding: 24px !important;
            }

            .premium-stat-card .balanc {
                font-size: 12px !important;
                font-weight: 600 !important;
                color: rgba(255, 255, 255, 0.6) !important;
                letter-spacing: 1px;
                text-transform: uppercase;
                margin-bottom: 8px;
                display: block;
            }

            .premium-stat-card .card-title {
                margin: 0 !important;
                color: #ffffff !important;
                font-weight: 700 !important;
                font-size: 24px !important;
                text-shadow: none !important;
            }

            .premium-stat-card .card-title strong {
                color: #f9a826 !important;
                font-weight: 600 !important;
                font-size: 16px;
                margin-left: 4px;
            }

            /* Premium Table Styling */
            .premium-table {
                margin-bottom: 0 !important;
                background: transparent !important;
                color: #ffffff !important;
                width: 100%;
                border-collapse: collapse;
            }

            .premium-table thead {
                background: rgba(255, 255, 255, 0.03) !important;
            }

            .premium-table thead th {
                border: none !important;
                border-bottom: 2px solid rgba(249, 168, 38, 0.25) !important;
                color: #ffd700 !important;
                font-weight: 700 !important;
                text-transform: uppercase;
                font-size: 12px !important;
                letter-spacing: 1px !important;
                padding: 18px 24px !important;
            }

            .premium-table tbody tr {
                border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
                transition: background 0.3s ease;
            }

            .premium-table tbody tr:hover {
                background: rgba(249, 168, 38, 0.05) !important;
            }

            .premium-table tbody td {
                border: none !important;
                padding: 16px 24px !important;
                color: rgba(255, 255, 255, 0.9) !important;
                font-size: 14px !important;
                vertical-align: middle;
            }

            /* Status Badges */
            .premium-badge-success {
                background: rgba(0, 208, 148, 0.15) !important;
                border: 1px solid rgba(0, 208, 148, 0.3) !important;
                color: #00D094 !important;
                padding: 6px 12px !important;
                border-radius: 30px !important;
                font-weight: 700 !important;
                font-size: 12px !important;
                letter-spacing: 0.5px;
                display: inline-flex;
                align-items: center;
                gap: 4px;
            }

            .premium-badge-warning {
                background: rgba(249, 168, 38, 0.15) !important;
                border: 1px solid rgba(249, 168, 38, 0.3) !important;
                color: #f9a826 !important;
                padding: 6px 12px !important;
                border-radius: 30px !important;
                font-weight: 700 !important;
                font-size: 12px !important;
                letter-spacing: 0.5px;
                display: inline-flex;
                align-items: center;
                gap: 4px;
            }

            .premium-badge-danger {
                background: rgba(239, 68, 68, 0.15) !important;
                border: 1px solid rgba(239, 68, 68, 0.3) !important;
                color: #ef4444 !important;
                padding: 6px 12px !important;
                border-radius: 30px !important;
                font-weight: 700 !important;
                font-size: 12px !important;
                letter-spacing: 0.5px;
                display: inline-flex;
                align-items: center;
                gap: 4px;
            }

            /* Header Override */
            .container-xxl h4.fw-bold {
                color: #ffffff !important;
                font-weight: 700 !important;
                letter-spacing: 0.5px;
            }

            .container-xxl h4.fw-bold .text-muted {
                color: rgba(255, 255, 255, 0.55) !important;
            }

            /* Responsive Styles for Small Devices */
            @media (max-width: 768px) {
                .premium-card .card-header {
                    padding: 18px 20px !important;
                }
                .premium-card .card-header h5 {
                    font-size: 18px !important;
                }
                .premium-table thead th {
                    padding: 12px 14px !important;
                    font-size: 11px !important;
                }
                .premium-table tbody td {
                    padding: 12px 14px !important;
                    font-size: 13px !important;
                }
                .premium-stat-card .card-body {
                    padding: 18px !important;
                }
                .premium-stat-card .card-title {
                    font-size: 20px !important;
                }
            }

            @media (max-width: 576px) {
                .premium-card .card-header {
                    padding: 15px 15px !important;
                }
                .premium-card .card-header h5 {
                    font-size: 16px !important;
                }
                .premium-table thead th {
                    padding: 10px 12px !important;
                    font-size: 10px !important;
                    letter-spacing: 0.5px !important;
                }
                .premium-table tbody td {
                    padding: 10px 12px !important;
                    font-size: 12px !important;
                }
                .premium-badge-success, .premium-badge-warning, .premium-badge-danger {
                    padding: 4px 8px !important;
                    font-size: 10px !important;
                }
            }
        </style>
    </head>

    <body>
        @include('dashboard.dcards.naver', ['r' => 'dashboard'])
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.dcards.menu', ['r' => ($_GET['typ'] ?? '') . 'withdrawhistory'])
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
                            <h4 class="fw-bold py-3 mb-4">
                                <span class="text-muted fw-light">Dashboard /</span> History
                            </h4>

                            @if(isset($_GET['typ']))
                            <!-- Transfer History Layout -->
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card premium-stat-card">
                                        <div class="card-body">
                                            <span class="balanc">Received</span>
                                            <h3 class="card-title">
                                                {{ number_format(DB::table('customer_withdraws')->where('pname','transfer')->where('tuserid', $v->id)->where('status', '1')->get()->sum('amount'), 2) }}
                                                <strong>USDT</strong>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="card premium-stat-card">
                                        <div class="card-body">
                                            <span class="balanc">Transferred</span>
                                            <h3 class="card-title">
                                                {{ number_format(DB::table('customer_withdraws')->where('pname','transfer')->where('fuserid', $v->id)->where('status', '1')->get()->sum('amount'), 2) }}
                                                <strong>USDT</strong>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card premium-card">
                                <div class="card-header">
                                    <h5 class="mb-0">Transfer History</h5>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table premium-table">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Date And Time</th>
                                                <th>Type</th>
                                                <th>Transfer from</th>
                                                <th>Transfer to</th>
                                                <th>Status</th>
                                                <th>Transfer Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php
                                            $withdraws = DB::table('customer_transfers')
                                                ->where('csId',$v->id)
                                                ->orWhere('fuserid',$v->id)
                                                ->orWhere('tuserid',$v->id)
                                                ->get();
                                            $i = 0;
                                            ?>
                                            @if($withdraws->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center py-4" style="color: rgba(255, 255, 255, 0.5) !important;">
                                                    No transfers found.
                                                </td>
                                            </tr>
                                            @else
                                                @foreach($withdraws as $wthdraw)
                                                <?php
                                                $i++;
                                                $usr = DB::table('customers')->where('id',$wthdraw->csId)->first();
                                                $istransfer = false;
                                                if($wthdraw->tType == 'transfer'){
                                                    $istransfer = true;
                                                    $wthdrw = DB::table('customer_withdraws')->where('id',$wthdraw->wthId)->first();
                                                    $ffuser = DB::table('customers')->where('id', $wthdrw->fuserid)->first();
                                                    $ttuser = DB::table('customers')->where('id', $wthdrw->tuserid)->first();
                                                }
                                                ?>
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{ date('d, M, Y h:i a', strtotime($wthdraw->created_at)) }}</td>
                                                    <td style="{{ $istransfer ? 'color: #ffd700;' : '' }}">
                                                        {{getPname($wthdraw->tType)}}
                                                    </td>
                                                    <td>
                                                        @if($istransfer)
                                                            @if($ffuser->id == $v->id)
                                                                <span style="color: #00D094; font-weight: 600;">You</span>
                                                            @else
                                                                <a style="color: #ffd700; font-weight: 600; text-decoration: none;" href="/dashboard/profile?prfid={{ $ffuser->id }}">
                                                                    {{ $ffuser->uid }}
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($istransfer)
                                                            @if($ttuser->id == $v->id)
                                                                <span style="color: #00D094; font-weight: 600;">You</span>
                                                            @else
                                                                <a style="color: #ffd700; font-weight: 600; text-decoration: none;" href="/dashboard/profile?prfid={{ $ttuser->id }}">
                                                                    {{ $ttuser->uid }}
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($istransfer)
                                                            @if ($wthdrw->status == '1')
                                                                <span class="premium-badge-success"><i class="bx bx-check-shield"></i> Success</span>
                                                            @elseif ($wthdrw->status == '0')
                                                                <span class="premium-badge-warning"><i class="bx bx-time-five"></i> Pending</span>
                                                                <br>
                                                                <span style="color: #ef4444; font-size: 11px; font-weight: 600; display: block; margin-top: 4px;">
                                                                    Max {{72 - Carbon::parse($wthdrw->created_at)->diffInHours(Carbon::now())}} hrs
                                                                </span>
                                                            @elseif ($wthdrw->status == '3')
                                                                <span class="premium-badge-danger"><i class="bx bx-x-circle"></i> Expired</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    @if($istransfer)
                                                        @if($ffuser->id == $v->id)
                                                            <td style="color: #ef4444 !important; font-weight: 600;">-{{ number_format($wthdrw->amount + $wthdrw->fuel, 2) }} USDT</td>
                                                        @else
                                                            <td style="color: #00D094 !important; font-weight: 600;">+{{ number_format($wthdrw->amount + $wthdrw->fuel, 2) }} USDT</td>
                                                        @endif
                                                    @else
                                                        @if($wthdraw->wStatus == '0')
                                                            <td style="color: #00D094 !important; font-weight: 600;">+{{ number_format($wthdraw->tAmount, 2) }} USDT</td>
                                                        @else
                                                            <td style="color: #ef4444 !important; font-weight: 600;">-{{ number_format($wthdraw->tAmount, 2) }} USDT</td>
                                                        @endif
                                                    @endif
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @else
                            <!-- Withdraw History Layout -->
                            <div class="card premium-card">
                                <div class="card-header">
                                    <h5 class="mb-0">Withdraw History</h5>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table premium-table">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Date And Time</th>
                                                <th>Report</th>
                                                <th>Status</th>
                                                <th>Type</th>
                                                <th>Withdrawal Amount</th>
                                                <th>Admin Fee</th>
                                                <th>Received Amount</th>
                                                <th>Wallet Address</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php
                                            if(isset($_GET['wthid'])){
                                                $withdraws = DB::table('customer_withdraws')->where('id', $_GET['wthid'])->get();
                                            }else{
                                                $withdraws = DB::table('customer_withdraws')->where('csId', $v->id)->whereIn('pname', ['allincome', 'pollincome'])->get();
                                            }
                                            $i = 0;
                                            ?>
                                            @if($withdraws->isEmpty())
                                            <tr>
                                                <td colspan="9" class="text-center py-4" style="color: rgba(255, 255, 255, 0.5) !important;">
                                                    No withdrawals found.
                                                </td>
                                            </tr>
                                            @else
                                                @foreach($withdraws as $wthdraw)
                                                <?php
                                                $usr = DB::table('customers')->where('id',$wthdraw->csId)->first();
                                                $cmpmain = false;
                                                if($wthdraw->pname == 'compound' || $wthdraw->pname == 'reinvest_compound'){
                                                    if($wthdraw->cmpId == null){
                                                        $cmpmain = true;
                                                        $i++;
                                                    }else{
                                                        $cmpmain = false;
                                                    }
                                                }else{
                                                    $cmpmain = true;
                                                    $i++;
                                                }
                                                ?>

                                                @if($cmpmain)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{ date('d, M, Y h:i a', strtotime($wthdraw->created_at)) }}</td>
                                                    <td style="color: #ffd700; font-weight: 600;">Approved</td>
                                                    <td>
                                                        @if ($wthdraw->status == '1')
                                                            <span class="premium-badge-success"><i class="bx bx-check-shield"></i> Success</span>
                                                        @elseif ($wthdraw->status == '0')
                                                            <span class="premium-badge-warning"><i class="bx bx-time-five"></i> Pending</span>
                                                            <br>
                                                            <span style="color: #ef4444; font-size: 11px; font-weight: 600; display: block; margin-top: 4px;">
                                                                Max {{72 - Carbon::parse($wthdraw->created_at)->diffInHours(Carbon::now())}} hrs
                                                            </span>
                                                        @elseif ($wthdraw->status == '3')
                                                            <span class="premium-badge-danger"><i class="bx bx-x-circle"></i> Expired</span>
                                                        @endif
                                                    </td>
                                                    <td>BEP20</td>
                                                    <td style="font-weight: 600;">{{ number_format($wthdraw->amount + $wthdraw->fuel, 2) }} USDT</td>
                                                    <td style="color: rgba(255, 255, 255, 0.7);">{{ number_format($wthdraw->fuel, 2) }} USDT</td>
                                                    <td style="color: #00D094; font-weight: 700;">{{ number_format($wthdraw->amount, 2) }} USDT</td>
                                                    <td>
                                                        @if(!empty($wthdraw->wallet))
                                                        <span title="{{ $wthdraw->wallet }}" style="font-family: monospace; cursor: help; color: rgba(255, 255, 255, 0.85);">
                                                            {{ substr($wthdraw->wallet, 0, 6) }}...{{ substr($wthdraw->wallet, -4) }}
                                                        </span>
                                                        @else
                                                        <span style="color: rgba(255, 255, 255, 0.4);">N/A</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif

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

        <!-- Vendors JS -->
        <script src="/assets/vendor/libs/masonry/masonry.js"></script>

        <!-- Main JS -->
        <script src="/assets/js/main.js"></script>

        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
