<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

// Your PHP code here

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
            href="/tst/grnyellow.png" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

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

    </head>

    <body>
        @include('dashboard.dcards.naver', ['r' => 'dashboard'])
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.dcards.menu', ['r' => 'depositstatus'])
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
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                Deposit Status</h4>

                            <!-- Basic Bootstrap Table -->
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
                                    background: rgba(255, 76, 76, 0.15) !important;
                                    border: 1px solid rgba(255, 76, 76, 0.3) !important;
                                    color: #ff4c4c !important;
                                    padding: 6px 12px !important;
                                    border-radius: 30px !important;
                                    font-weight: 700 !important;
                                    font-size: 12px !important;
                                    letter-spacing: 0.5px;
                                    display: inline-flex;
                                    align-items: center;
                                    gap: 4px;
                                }

                                /* Progress bar inside table */
                                .premium-progress-container {
                                    width: 160px;
                                }

                                .premium-progress-text {
                                    font-size: 10px;
                                    color: rgba(255, 255, 255, 0.5);
                                    display: block;
                                    margin-top: 4px;
                                }

                                .premium-progress-bar-bg {
                                    width: 100%;
                                    height: 8px;
                                    background: rgba(0, 0, 0, 0.4);
                                    border-radius: 10px;
                                    overflow: hidden;
                                    border: 1px solid rgba(255, 255, 255, 0.05);
                                }

                                .premium-progress-bar-fill {
                                    height: 100%;
                                    background: linear-gradient(90deg, #00D094, #ffd700, #f9a826);
                                    border-radius: 10px;
                                    transition: width 0.4s ease;
                                }

                                /* Action Links */
                                .premium-action-link {
                                    background: linear-gradient(135deg, #ffd700, #a78200) !important;
                                    color: #071f17 !important;
                                    font-weight: 700 !important;
                                    font-size: 12px !important;
                                    padding: 6px 16px !important;
                                    border-radius: 6px !important;
                                    display: inline-flex;
                                    align-items: center;
                                    gap: 4px;
                                    text-transform: uppercase;
                                    letter-spacing: 0.5px;
                                    box-shadow: 0 4px 10px rgba(249, 168, 38, 0.25);
                                    transition: all 0.3s ease;
                                    text-decoration: none;
                                }

                                .premium-action-link:hover {
                                    background: linear-gradient(135deg, #ffffff, #ffd700) !important;
                                    transform: translateY(-2px);
                                    box-shadow: 0 6px 15px rgba(255, 215, 0, 0.35);
                                    color: #071f17 !important;
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
                            </style>
                            @php
                                 if(isset($_GET['plnid'])){
                                     $first_plan = DB::table('customer_plans')->where('id', $_GET['plnid'])->first();
                                     $target_csId = $first_plan ? $first_plan->csId : $v->id;
                                 }else{
                                     $target_csId = $v->id;
                                 }

                                 $total_staked = (float) DB::table('customer_plans')->where('csId', $target_csId)->where('pstatus', '1')->sum('pamount');
                                 $overall_limit_cap = 2 * $total_staked;
                                 $total_earned = (float) DB::table('customer_transactions')->where('csId', $target_csId)->where('wStatus', '0')->sum('tAmount');
                                 $total_earned = max(0.0, $total_earned);
                                 $overall_progress_percent = $overall_limit_cap > 0 ? min(100, ($total_earned / $overall_limit_cap) * 100) : 0;

                                $get_gradient_color = function($percentage) {
                                    $stops = [
                                        ['p' => 0.0, 'r' => 0, 'g' => 208, 'b' => 148],
                                        ['p' => 33.33, 'r' => 255, 'g' => 215, 'b' => 0],
                                        ['p' => 66.67, 'r' => 249, 'g' => 168, 'b' => 38],
                                        ['p' => 100.0, 'r' => 185, 'g' => 28, 'b' => 28]
                                    ];
                                    if ($percentage <= 0) return '#00D094';
                                    if ($percentage >= 100) return '#b91c1c';
                                    for ($i = 0; $i < count($stops) - 1; $i++) {
                                        $curr = $stops[$i];
                                        $next = $stops[$i+1];
                                        if ($percentage >= $curr['p'] && $percentage <= $next['p']) {
                                            $diff = $next['p'] - $curr['p'];
                                            $factor = ($percentage - $curr['p']) / $diff;
                                            $r = round($curr['r'] + ($next['r'] - $curr['r']) * $factor);
                                            $g = round($curr['g'] + ($next['g'] - $curr['g']) * $factor);
                                            $b = round($curr['b'] + ($next['b'] - $curr['b']) * $factor);
                                            return sprintf("#%02x%02x%02x", $r, $g, $b);
                                        }
                                    }
                                    return '#b91c1c';
                                };
                            @endphp
                            <div class="card mb-4 premium-card">
                                <div class="card-header d-flex align-items-center justify-content-between pb-2">
                                    <h5 class="mb-0">Deposit status</h5>
                                </div>

                                @if($total_staked > 0)
                                <div class="px-4 pb-3" style="border-bottom: 1px solid rgba(212, 175, 55, 0.12);">
                                    <div style="display: flex; flex-direction: column; gap: 8px; max-width: 500px; margin-top: 10px;">
                                        <div style="display: flex; align-items: center; gap: 12px; width: 100%;">
                                            <span style="font-size: 12px; color: rgba(255,255,255,0.75); font-weight: 600; white-space: nowrap;">Overall 2X Limit Progress</span>
                                            <div style="flex: 1; height: 10px; background-color: #222; border-radius: 10px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.05);">
                                                <div style="width: {{ $overall_progress_percent }}%; height: 100%; background: linear-gradient(90deg, #00D094, #ffd700, #f9a826, #b91c1c) no-repeat; background-size: {{ $overall_progress_percent > 0 ? (100 / $overall_progress_percent) * 100 : 100 }}% 100%; border-radius: 10px; transition: width 0.5s ease-in-out;"></div>
                                            </div>
                                            @php
                                                $overall_progress_color = $get_gradient_color($overall_progress_percent);
                                            @endphp
                                            <span style="font-size: 12px; font-weight: 700; color: {{ $overall_progress_color }}; white-space: nowrap; min-width: 60px; text-align: right;">
                                                @if($overall_progress_percent >= 100)
                                                    Completed
                                                @else
                                                    {{ number_format($overall_progress_percent, 1) }}%
                                                @endif
                                            </span>
                                        </div>
                                        <div style="display: flex; justify-content: space-between; align-items: center; font-size: 10px; color: rgba(255,255,255,0.55); margin-top: 2px;">
                                            <span>Total Staked: {{ number_format($total_staked, 2) }} USDT</span>
                                            <span>Earned: {{ number_format($total_earned, 2) }} / Limit: {{ number_format($overall_limit_cap, 2) }} USDT</span>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="table-responsive text-nowrap">
                                    <table class="table premium-table">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Start Date And Time</th>
                                                @if(isset($_GET['plnid']))
                                                <th>Name</th>
                                                @endif
                                                {{-- <th>Package</th> --}}
                                                <th>Amount Staked</th>
                                                <th>Total Earned</th>
                                                <th>Status</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php
                                            if(isset($_GET['plnid'])){
                                                $plans = DB::table('customer_plans')->where('id', $_GET['plnid'])->get();
                                            }else{
                                                $plans = DB::table('customer_plans')->where('csId', $v->id)->whereNot('pstatus','3')->get();
                                            }
                                            $i = 0;
                                            ?>
                                            @foreach(
                                            $plans as $plan)
                                            <?php
                                            $usr =
                                            DB::table('customers')->where('id',$plan->csId)->first();
                                            $cmpmain = false;
                                            if($plan->pname == 'compound' || $plan->pname == 'reinvest_compound'){
                                                if($plan->cmpId == null){
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
                                            <?php
                                            $earned = DB::table('customer_transactions')
                                                ->where('planId', $plan->id)
                                                ->where('tType', 'pincome')
                                                ->sum('tAmount');
                                            $earned = max(0.0, (float) $earned);
                                            $limit_cap = 2 * (float) $plan->pamount;
                                            $progress_percent = $limit_cap > 0 ? min(100, ($earned / $limit_cap) * 100) : 0;
                                            ?>
                                            <tr>
                                                <td>
                                                    {{$i}}
                                                </td>
                                                <td>
                                                    {{ date('d, M, Y h:i a', strtotime($plan->created_at)) }}
                                                </td>
                                                @if(isset($_GET['plnid']))
                                                <td>
                                                    <a href="/dashboard/profile?prfid={{$usr->id}}" style="color: #ffd700; font-weight: 600; text-decoration: none;">
                                                    {{ $usr->uid }}
                                                    </a>
                                                </td>
                                                @endif
                                                {{-- <td>
                                                    {{ getPname($plan->pname) }}
                                                </td> --}}
                                                <td style="font-weight: 600;">
                                                    {{ number_format($plan->pamount, 2) }} USDT
                                                </td>
                                                <td style="font-weight: 600; color: #00D094;">
                                                    {{ number_format($earned, 2) }} USDT
                                                </td>
                                                <td>
                                                    @if ($plan->pstatus == '1')
                                                        @if ($progress_percent >= 100)
                                                            <span class="premium-badge-danger"><i class="bx bx-check-shield"></i> Completed</span>
                                                        @else
                                                            <span class="premium-badge-success"><i class="bx bx-refresh"></i> Active</span>
                                                        @endif
                                                    @elseif ($plan->pstatus == '0')
                                                        <span class="premium-badge-warning"><i class="bx bx-time-five"></i> Pending</span>
                                                    @elseif ($plan->pstatus == '3')
                                                        <span class="premium-badge-danger"><i class="bx bx-error-circle"></i> Expired</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    @if($plan->pname == 'compound' || $plan->pname == 'reinvest_compound')
                                                        @if(!isset($plan->cmpId))
                                                            <a href="/dashboard/status/compound/{{$plan->id}}" class="premium-action-link">
                                                                <i class="bx bx-show-alt"></i> View
                                                            </a>
                                                        @endif
                                                    @else 
                                                        <a href="/dashboard/status/depositview/{{$plan->id}}" class="premium-action-link">
                                                            <i class="bx bx-show-alt"></i> View
                                                        </a>
                                                    @endif
                                                </td> --}}
                                            </tr>
                                            @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Basic Bootstrap Table -->

                            {{-- <hr class="my-5" /> --}}

                            <!-- Footer -->
                            @include('dashboard.dcards.footer')
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
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
