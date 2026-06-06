<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

// Your PHP code here
$tTableName = "customer_transactions";
$btnTxt = "All";
// $type = "All";
if (isset($_GET['typ'])) {
    $tTableName = "customer_transfers";
    $transtins = DB::table($tTableName)->where('csId', $v->id)->whereNot('tType', 'transfer')->get();
} else if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == "all") {
        $transtins = DB::table('customer_transactions')->where('csId', $v->id)->get();
    } elseif ($type == "levincome") {
        if(isset($_GET['lev'])){
        $lvl = $_GET['lev'];
        $btnTxt = "$lvl Level";
        $transtins = DB::table('customer_transactions')->where('tType', 'levincome')->where('levl', $lvl)->where('csId', $v->id)->get();
        }else{
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
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                    @if(isset($_GET['typ']))
                                    Transfer Credit
                                    @endif
                                    @if(isset($_GET['pnm']))
                                        {{getPname($_GET['pnm'])}}
                                    @endif
                                Transactions</h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">
                                    @if(isset($_GET['pnm']))
                                        {{getPname($_GET['pnm'])}}
                                    @endif
                                    @if(isset($_GET['typ']))
                                    Transfer Credit
                                    @else
                                    Transaction
                                    @endif
                                    History

                                @if(!isset($_GET['typ']))
                                        <button
                                        style="padding: 0.2375rem 0.9rem !important;
                                        margin-left: 20px;
                                        font-size: 15px !important;"
                                        type="button"
                                        class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        {{$btnTxt}}
                                    </button>
                                @endif

                                    <ul class="dropdown-menu" style="background-color: #000 !important;">
                                        
                                        <li>
                                            <a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=all">All
                                            </a></li>
                                        
                                        <li>
                                           <a class="dropdown-item"
                                                   href="/dashboard/status/transactions?type=refincome">Referral Income
                                           </a></li>
                                        
                                        <li>
                                            <a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=pincome">Profit Income
                                            </a></li>
                                                
                                        <li>
                                            <a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=allincome">Withdrawal
                                            </a></li>
                                        
                                        <li>
                                            <a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=levincome">All Level Income
                                            </a></li>

                                        <li>
                                            <a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=levincome&lev=1">First Level
                                            </a></li>
                                        
                                        <li><a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=levincome&lev=2">Second Level
                                            </a></li>
                                        
                                        <li><a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=levincome&lev=3">Third Level
                                            </a></li>
                                        
                                        <li><a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=levincome&lev=4">Fourth Level
                                            </a></li>
                                        
                                        <li><a class="dropdown-item"
                                                href="/dashboard/status/transactions?type=levincome&lev=5">Fifth Level
                                            </a></li>
                                                
                                        <!-- <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="javascript:void(0);">Separated
                                                link</a></li> -->
                                    </ul>
                                    
                                </h5>
                                <style>
                                    table tr{
                                        font-size: 12px !important;
                                    }
                                    table tr td{
                                        padding: 0.625rem 1.25rem !important;
                                    }
                                </style>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                                <th>Source</th>
                                                <!-- <th>Users</th> -->
                                                <!-- <th>Status</th> -->
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">


                                            @foreach($transtins as $trasaction)
                                            <tr>
                                                <td style="font-size: 10px;">
                                                    {{
                                                       date(
                                                           'd, M, Y',
                                                           strtotime($trasaction->created_at)
                                                       )
                                                    }}
                                                </td>
                                                <td>
                                                    {{ $trasaction->levl ?? '' }}
                                                    {{ getPname($trasaction->tType) }}</td>
                                                <td>
                                                    @if($trasaction->wStatus == '1')
                                                    <span style="color: red !important;">
                                                        {{ number_format($trasaction->tAmount, $trasaction->tType == 'mine_amount' ? 10 : 3) }} USDT
                                                    </span>
                                                    @else
                                                    <span style="color: rgb(20, 190, 20) !important;">
                                                        +{{ number_format($trasaction->tAmount, $trasaction->tType == 'mine_amount' ? 10 : 3) }} USDT
                                                    </span>
                                                    @endif
                                                </td>

                                                <td style="font-size: 12px !important;"> 
                                                    @if($trasaction->planId != null)
                                                      <a href="/dashboard/status/deposit?plnid={{$trasaction->planId}}">
                                                          @php 
                                                          $plndtls = DB::table('customer_plans')->where('id',$trasaction->planId)->first();
                                                          $plnusr = DB::table('customers')->where('id',$plndtls->csId)->first();
                                                          @endphp
                                                          <!-- <br> -->
                                                          Plan
                                                          <!-- <br> -->
                                                          <span style="color: grey;">{{$plnusr->name}}</span>
                                                          <span style="color: black;">{{$plndtls->pamount}} USDT</span>
                                                          <span style="color: grey;">{{getPname($plndtls->pname)}}</span>
                                                      </a>
                                                    @endif 
                                                    @if($trasaction->wthId != null)
                                                        <a href="/dashboard/status/withdraw?wthid={{$trasaction->wthId}}">
                                                            {{getPname(DB::table('customer_withdraws')->where('id',$trasaction->wthId)->first()->pname)}}
                                                        </a>
                                                    @endif
                                                    @if($tTableName == 'customer_transfers')
                                                    @if($trasaction->crId != null)
                                                        <a href="/dashboard/status/credit?plnid={{$trasaction->crId}}">
                                                            Add Fund
                                                        </a>
                                                    @endif
                                                    @endif
                                                </td>

                                                <!-- <td>
                                                    @if ($trasaction->wStatus == '0')
                                                        <span
                                                            class="badge bg-label-success me-1">Credit</span>
                                                    @endif
                                                    @if ($trasaction->wStatus == '1')
                                                        <span
                                                            class="badge bg-label-danger me-1">Debit</span>
                                                    @endif
                                                </td> -->
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
                                            @endforeach
@if(!isset($_GET['typ']))
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <!-- <td></td> -->
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td style="color: green;">Credited</td>
                                                <td style="color: green;">{{ $transtins->where('wStatus','0')->sum('tAmount') }} USDT</td>
                                                <td></td>
                                                <!-- <td></td> -->
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td style="color: red;">Debited</td>
                                                <td style="color: red;">{{ $transtins->where('wStatus','1')->sum('tAmount') }} USDT</td>
                                                <td></td>
                                                <!-- <td></td> -->
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td style="color: blue;">Balance</td>
                                                <td style="color: blue;">{{ $transtins->sum('tAmount') > 0 ? $transtins->sum('tAmount') : 0 }} USDT</td>
                                                <td></td>
                                                <!-- <td></td> -->
                                            </tr>
@endif
                                        </tbody>
                                    </table>
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