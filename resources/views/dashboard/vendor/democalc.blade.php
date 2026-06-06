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
        
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                
                <!-- / Menu -->

                <!-- Layout container -->
                    <!-- Navbar -->
                    
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
<div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">GMS
                                    /</span>
                                Demo Calculator</h4>

                          

                            <style>

    .card-header{
        background-color: #f9a826ff;
        color: #fff;
    }
    table thead tr th{
        border: 1px solid #000 !important;
    }
    table tr{
        border: 1px solid #000 !important;
    }
    table tr td{
        border: 1px solid #000 !important;
    }
</style>

                            <div class="card flex-crd mb-4">
                                <div
                                    class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">DEMO CALCULATOR</h5>
                                </div>
                                <div class="card-body"
                                    style="margin-top: 30px;">

                                    @error("image")
                                    <div class="form-text"
                                        style="color: red;">{{$message}}</div>
                                    @enderror

                                    <style>
            /* .hnot{
                width: 100%;
            } */
            @media (max-width:900px) {
            .hnot{
                width: auto !important;
            }
            }
        </style>

                                    <form
                                        method="GET">

                                        <div class="row mb-3">
                                            <label
                                                style="margin-top: 7px;"
                                                class="col-sm-2 form-label"
                                                for="basic-icon-default-message">Amount</label>
                                            <div class="col-sm-10">
                                                <div
                                                    class="input-group input-group-merge">
                                                    <span
                                                        id="basic-icon-default-message2"
                                                        class="input-group-text"><i
                                                            class="bx bx-dollar"></i></span>
                                                    <input
                                                        type="text"
                                                        name="amnt"
                                                        value="{{$_GET['amnt'] ?? 100}}"
                                                        id="basic-icon-default-message2"
                                                        class="form-control phone-mask"
                                                        placeholder="Min USDT 100"
                                                        aria-label="Min USDT 100"
                                                        aria-describedby="basic-icon-default-message2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label
                                                style="margin-top: 7px;"
                                                class="col-sm-2 form-label"
                                                for="basic-icon-default-message">Package</label>
                                            <div class="col-sm-10">
                                               
                    <select class="form-select" name="typ" id="inputGroupSelect02">
                        <option @if(isset($_GET['typ']) && $_GET['typ'] == 'normal') selected @endif value="normal">Silver</option>
                        <option @if(isset($_GET['typ']) && $_GET['typ'] == 'compound') selected @endif value="compound">Gold</option>
                    </select>
                                            </div>
                                        </div>
                                        <div
                                            class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit"
                                                    class="btn btn-primary">Calculate</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            @if(isset($_GET['typ']) && $_GET['typ'] == 'normal')
                            <!-- Basic Bootstrap Table -->
                            <div class="card flex-crd">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">MONTHLY CREDIT
                                    STATUS</h5>
                                <div class="table-responsive text-nowrap">
                                <?php
                            // $plan = DB::table('customer_plans')->where('id',$planId)->first();
                            $plan = new stdClass();
                            $plan->pamount = 100;
                            if (isset($_GET['amnt'])) {
                            $plan->pamount = (float) $_GET['amnt'];
                            }
                            $plan->created_at = strval(date('Y-m-d H:i:s'));
                            $plamount = (float) $plan->pamount;
                            $monthprofit = ($plamount * 15) / 100;
                            $inmonthprofit = 0;
                            $totalprofit = $monthprofit * 15;
                            ?>
                                    <table class="table custom-table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Months</th>
                                                <th>Capital Return</th>
                                                <th>Per Month Profit</th>
                                                <!-- <th>Users</th> -->
                                                <th>Status</th>
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">

                                            @for ($i = 0; $i < 15; $i++)
                                            <tr>
                                                <td>
                                                    {{ date('d, M, Y',
                                                    strtotime('+' . ($i + 1) .
                                                    ' months',
                                                    strtotime($plan->created_at)))
                                                    }}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $i + 1 }}
                                                </td>

                                                <?php

                                                $inmonthprofit += ($plamount *
                                                15) / 100;
                                                ?>
                                                <td class="currency">
                                                    <span class="currncy-text">{{ number_format(($inmonthprofit),2) }}</span>
                                                     <span>USDT</span>
                                                </td>
                                                <td class="currenc">
                                                    <span class="currncy-text">{{number_format($monthprofit,2)}}</span>
                                                     <span style="margin-left: 30px;" >USDT</span>
                                                </td>


                                                <td>
                                                    @php
                                                    $istransition = false;
                                                    @endphp
                                                    @if ($istransition)
                                                    <span
                                                        class="badge bg-label-success me-1">Credited</span>
                                                    @else
                                                    <span
                                                        class="badge bg-label-danger me-1">Debit</span>
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
                                    <h4
                                        style="width:100%; text-align: center; text-transform: uppercase;
                                     color: green; margin-top: 18px; font-size:20px;">Contract
                                        Completed</h4>
                                </div>
                            </div>
                            <!--/ Basic Bootstrap Table -->
                            @endif


                                                       @if(isset($_GET['typ']) && $_GET['typ'] == 'compound')
                                                        <!-- Basic Bootstrap Table -->
                                                        <div class="card">
                                                            <h5
                                                                style="padding: 1.125rem 1.25rem !important;"
                                                                class="card-header">MONTHLY CREDIT STATUS</h5>
                                                            <div class="table-responsive text-nowrap">

                            <?php

                            // $mainplan = DB::table('customer_plans')->where('id', $cmpId)->first();
                            $mainplan = new stdClass();
                            $mainplan->pamount = 100;
                            $mainplan->csId = 36;
                            $mainplan->created_at = strval(date('Y-m-d H:i:s'));
                            if (isset($_GET['amnt'])) {
                            $mainplan->pamount = (float) $_GET['amnt'];
                            }
                            $cmpBalance = 0;
                            $cmpBalance += (float) $mainplan->pamount;
                                                        ?>
                            
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
                                $mnthcpm = ($cmpBalance * 15 / 100);
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
                                    date(
                                        'd, M, Y',
                                        strtotime('+' . ($i + 1) . ' months', strtotime($mainplan->created_at))
                                    )
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                                Compounding(6 months)
                                                                            </td>
                                                                            <td>
                                                                                USDT {{ number_format($mnthcpm,2) }}
                                                                            </td>
                                                                            <td>USDT {{ number_format($cmpBalance, 2) }}</td>
                                                                            <td>
                                                                                @php
                                $iscredit = false;
                                                                                @endphp
                                                                                @if ($iscredit)
                                                                                <span
                                                                                    class="badge bg-label-success me-1">Credit</span>
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
                                                                            <th>Compound USDT</th>
                                                                            <!-- <th>Users</th> -->
                                                                            <th>Status</th>
                                                                            <!-- <th>Actions</th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="table-border-bottom-0">
                                                                    @php
                            $mnthlyprofit = ($cmpBalance * 15 / 100);
                            $lasttotalprofit = $mnthlyprofit;
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
                                    date(
                                        'd, M, Y',
                                        strtotime('+' . ($i + 1) . ' months', strtotime($mainplan->created_at))
                                    )
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                               Profit
                                                                            </td>
                                                                            <td>
                                                                                USDT {{ number_format($mnthlyprofit,2) }}
                                                                            </td>
                                                                            <td>USDT {{ number_format($lasttotalprofit, 2) }}</td>
                                                                            <td>
                                                                                @php
                                $lasttotalprofit += $mnthlyprofit;
                                $iscredit = false;
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
                                 color: green;  margin-top: 18px; font-size:20px;">Contract Completed</h4>
                                                            </div>
                                                        </div>
                                                        <!--/ Basic Bootstrap Table -->
                                                        @endif
                            


                            <hr class="my-5" />

                            <!-- Footer -->
                            @include('dashboard.dcards.footer')
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- / Layout wrapper -->
</div>
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