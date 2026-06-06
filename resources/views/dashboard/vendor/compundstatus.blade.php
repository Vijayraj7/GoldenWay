<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

// Your PHP code here

use Carbon\Carbon;

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
            href="/assets/img/favicon/favicon.ico" />

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
                                Compound Status</h4>

                                <?php

$mainplan = DB::table('customer_plans')->where('id', $cmpId)->first();
$plans = DB::table('customer_plan_compound')->where('cmpId', $cmpId)->get();
$cmptransactions = DB::table('customer_transactions')->where('planId', $mainplan->id)->where('tType', 'pincome')->get();

$cmpBalance = 0;
$cmpBalance += (float) $mainplan->pamount;
                            ?>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">USDT {{ $mainplan->pamount }}</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Monthly Profit(15%)</th>
                                                <th>Compound USDT</th>
                                                <!-- <th>Users</th> -->
                                                <th>Status</th>
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @for ($i = 0; $i < 6; $i++)
                                            @php
    $mnthcpm = number_format(($cmpBalance * 15 / 100), 2);
    $cmpBalance += $mnthcpm;
    $usr =
        DB::table('customers')->where('id', $mainplan->csId)->first();
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{
        $i + 1
                                                    }}
                                                </td>
                                                <td>
                                                    {{
                                                        Carbon::parse($mainplan->created_at)->addDays((30 * ($i+1)))->format('d, M, Y h:i a')
                                                    }}
                                                </td>
                                                <td>
                                                    Compounding(6 months)
                                                </td>
                                                <td>
                                                    USDT {{ $mnthcpm }}
                                                </td>
                                                <td>USDT {{ number_format($cmpBalance, 2) }}</td>
                                                <td>
                                                    @php
    $iscredit = isset($plans[$i]);
                                                    @endphp
                                                    @if ($iscredit)
                                                    <span
                                                        class="badge bg-label-success me-1">Credited</span>
                                                    @else
                                                    <span
                                                        class="badge bg-label-warning me-1">Pending</span>
                                                    @endif
                                                </td>
                                                <!-- <td>
                                                    <div class="dropdown">

                                                        <a
                                                            class="dropdown-item"
                                                            style="padding: 0 !important;"
                                                            href="/dashboard"><i
                                                                class="bx bxs-contact me-1"></i>
                                                            View</a>

                                                    </div>
                                                </td> -->
                                            </tr>
                                            @endfor

                                        </tbody>
                                    </table> 
                                    <table style="margin-top:50px;" class="table">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Per Month Profit</th>
                                                <th>Balance</th>
                                                <!-- <th>Users</th> -->
                                                <th>Status</th>
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                        @php
$mnthlyprofit = number_format(($cmpBalance * 15 / 100), 2);
$lasttotalprofit = $mnthlyprofit * 9;
// $cmpBalance = ;
$usr =
    DB::table('customers')->where('id', $mainplan->csId)->first();
                                            @endphp
                                            @for ($i = $i; $i < 15; $i++)
                                          
                                            <tr>
                                                <td>
                                                    {{
        $i + 1
                                                    }}
                                                </td>
                                                <td>
                                                    {{
                                                        Carbon::parse($mainplan->created_at)->addDays((30 * ($i+1)))->format('d, M, Y h:i a')
                                                    }}
                                                </td>
                                                <td>
                                                   Profit
                                                </td>
                                                <td>
                                                    USDT {{ $mnthlyprofit }}
                                                </td>
                                                <td>USDT {{ number_format($lasttotalprofit, 2) }}</td>
                                                <td>
                                                    @php
    $lasttotalprofit -= $mnthlyprofit;
    $iscredit = isset($cmptransactions[$i - 6]);
                                                    @endphp
                                                    @if ($iscredit)
                                                    <span
                                                        class="badge bg-label-success me-1">Credited</span>
                                                    @else
                                                    <span
                                                        class="badge bg-label-warning me-1">Pending</span>
                                                    @endif
                                                </td>
                                                <!-- <td>
                                                    <div class="dropdown">

                                                        <a
                                                            class="dropdown-item"
                                                            style="padding: 0 !important;"
                                                            href="/dashboard"><i
                                                                class="bx bxs-contact me-1"></i>
                                                            View</a>

                                                    </div>
                                                </td> -->
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
    <h4 style="width:100%; text-align: center; text-transform: uppercase;
     color: green; margin-top: 8px; font-size:20px;">Contract Completed</h4>
                                </div>
                            </div>
                            <!--/ Basic Bootstrap Table -->

                            <hr class="my-5" />

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
