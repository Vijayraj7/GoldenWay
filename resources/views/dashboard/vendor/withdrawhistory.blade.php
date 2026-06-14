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
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                History</h4>

                            <!-- Basic Bootstrap Table -->
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


@if(isset($_GET['typ']))

<style>
    .uscard{
        height: 100px;
        width: 100px;
    }
</style>
<div class="row">
<div class="col-lg-4 col-md-4 col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <span style="" class="balanc mb-1">Recieved</span>
            <h3 class="card-title mb-2" style="font-size: 21px;">
                {{ number_format(DB::table('customer_withdraws')->where('pname','transfer')->where('tuserid', $v->id)->where('status', '1')->get()->sum('amount'), 2) }}
            <strong>USDT</strong>
            </h3>
        </div>
    </div>
</div>
<!-- <div class="col-lg-4 col-md-4 col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <span style="width: 100%; display: flex; justify-content: space-between;" class="balanc mb-1">Used <a href="/dashboard/status/transactions?typ=trnsfr" style="color: blue;">view</a> </span>
            <h3 class="card-title mb-2" style="font-size: 21px;">
                {{ number_format(DB::table('customer_transfers')->where('csId', $v->id)->where('tStatus', '1')->whereNot('tType', 'transfer')->whereNot('tType', 'creditadd')->where('wStatus','1')->get()->sum('tAmount'), 2) }}
            <strong>USDT</strong>
            </h3>
        </div>
    </div>
</div> -->
<div class="col-lg-4 col-md-4 col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <span style="" class="balanc mb-1">Transfered</span>
            <h3 class="card-title mb-2" style="font-size: 21px;">
        {{ number_format(DB::table('customer_withdraws')->where('pname','transfer')->where('fuserid', $v->id)->where('status', '1')->get()->sum('amount'), 2) }}
            <strong>USDT</strong>
            </h3>
        </div>
    </div>
</div>
</div>

<div 
class="card" style="position: relative;">
 <h5
        style="padding: 1.125rem 1.25rem !important;"
        class="card-header">
        Transfer
        History</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
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
                if(isset($_GET['typ'])){
                    $withdraws = DB::table('customer_transfers')->where('csId',$v->id)->orWhere('fuserid',$v->id)->orWhere('tuserid',$v->id)->get();
                }
                $i = 0;
                ?>
                @foreach(
                $withdraws as $wthdraw)
                <?php
                $i++;
                $usr =
                DB::table('customers')->where('id',$wthdraw->csId)->first();
                $istransfer = false;
                if($wthdraw->tType == 'transfer'){
                $istransfer = true;
                $wthdrw = DB::table('customer_withdraws')->where('id',$wthdraw->wthId)->first();
                $ffuser = DB::table('customers')->where('id', $wthdrw->fuserid)->first();
                $ttuser = DB::table('customers')->where('id', $wthdrw->tuserid)->first();
                }
                ?>

                <tr>
                    <td>
                        {{$i}}
                    </td>
                        <td>
                        {{
                        date('d, M, Y h:i a',
                        strtotime($wthdraw->created_at))
                        }}
                    </td>
                    <td @if($istransfer) style="color: blue;" @endif>
                        {{getPname($wthdraw->tType)}}
                    </td>
                    <td>
                        @if($istransfer)
                        @if($ffuser->id == $v->id)
                        <a style="color: darkorchid; font-weight: 600;" href="#">
                        You
                        </a>
                        @else
                        <a style="color: #000;" href="#">
                        {{ $ffuser->name }}
                        </a>
                        @endif
                        @endif
                    </td>
                    <td>
                        @if($istransfer)
                        @if($ttuser->id == $v->id)
                        <a style="color: darkorchid; font-weight: 600;" href="#">
                        You
                        </a>
                        @else
                        <a style="color: #000;" href="#">
                        {{ $ttuser->name }}
                        </a>
                        @endif
                        @endif
                    </td>
                    <td>
                        @if($istransfer)
                        @if ($wthdrw->status == '1')
                        <span
                            class="badge bg-label-success me-1">Success</span>
                        @endif
                        @if ($wthdrw->status == '0')
                        <span
                            class="badge bg-label-warning me-1">Pending</span>
                        <br>
                       <span style="color:blue; font-size: 9px;">
                         Maximum {{72 - Carbon::parse($wthdrw->created_at)->diffInHours(Carbon::now())}} hrs
                        </span>
                        @endif
                        @if ($wthdrw->status == '3')
                        <span
                            class="badge bg-label-danger me-1">Expired</span>
                        @endif
                        @else

                        @endif
                    </td>
                    @if($istransfer)
                    @if($ffuser->id == $v->id)
                    <td style="color: red;">-{{ number_format($wthdrw->amount + $wthdrw->fuel,2) }} USDT</td>
                    @else
                    <td style="color: green;">+{{ number_format($wthdrw->amount + $wthdrw->fuel,2) }} USDT</td>
                    @endif
                    @else
                    @if($wthdraw->wStatus == '0')
                    <td style="color: green;">+{{ number_format($wthdraw->tAmount,2) }} USDT</td>
                    @else
                    <td style="color: red;">-{{ number_format($wthdraw->tAmount,2) }} USDT</td>
                    @endif
                    @endif
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

            </tbody>
        </table>
    </div>
</div>

@else

                            <div 
                            class="card" style="position: relative;">
                             <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">
                                    Withdraw
                                    History</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
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
                                            @foreach(
                                            $withdraws as $wthdraw)
                                            <?php
                                            $usr =
                                            DB::table('customers')->where('id',$wthdraw->csId)->first();
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
                                                <td>
                                                    {{$i}}
                                                </td>
                                                    <td>
                                                    {{
                                                    date('d, M, Y h:i a',
                                                    strtotime($wthdraw->created_at))
                                                    }}
                                                </td>
                                                <td style="color: blue;">Approved</td>
                                                <td>
                                                    @if ($wthdraw->status == '1')
                                                    <span
                                                        class="badge bg-label-success me-1">Success</span>
                                                    @endif
                                                    @if ($wthdraw->status == '0')
                                                    <span
                                                        class="badge bg-label-warning me-1">Pending</span>
                                                    <br>
                                                   <span style="color: red; font-size: 12px;">
                                                     Maximum {{72 - Carbon::parse($wthdraw->created_at)->diffInHours(Carbon::now())}} hrs
                                                    </span>
                                                    <!-- <a class="btn btn-secondary btn-sm" style="color: white;">Cancel</a> -->
                                                    @endif
                                                    @if ($wthdraw->status == '3')
                                                    <span
                                                        class="badge bg-label-danger me-1">Expired</span>
                                                    @endif
                                                </td>
                                                <td>BEP20</td>
                                                <td style="color: #000;">{{ number_format($wthdraw->amount + $wthdraw->fuel,2) }} USDT</td>
                                                <td>{{$wthdraw->fuel}} USDT</td>
                                                <td style="color: #000;">{{$wthdraw->amount}} USDT</td>
                                                <td>{{$wthdraw->wallet}}</td>
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
                                            @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
@endif


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
