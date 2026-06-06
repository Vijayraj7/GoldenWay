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
        @include('dashboard.dcards.naver')
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.admin.dcards.menu', ['r' =>
                'creditaddrequests'])
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                Product Request</h4>

                            <!-- Basic Layout & Basic with Icons -->
                            <div class="row">
                                <!-- Basic with Icons -->
                                <div class="col-xxl">
                                    <div class="card mb-4" style="margin-bottom: 170px !important;">
                                        <div
                                            class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">Purchase
                                                Details</h5>
                                        </div>
                                        <div class="card-body">

                                            @error("image")
                                            <div class="form-text"
                                                style="color: red;">{{$message}}</div>
                                            @enderror

                                            <style>
                                                /* .hnot{
                                                    width: 100%;
                                                } */
                                                @media (max-width:576px) {
                                                .hnot{
                                                    width: auto !important;
                                                }
                                                .col-4 {
                                                    flex: 0 0 auto;
                                                    width: 33.33333333% !important;
                                                }
                                                .col-8 {
                                                    flex: 0 0 auto;
                                                    width: 66.66666667% !important;
                                                }
                                                }
                                            </style>

                                            <form action="/creditbuy"
                                                method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <input
                                                    type="hidden"
                                                    name="id"
                                                    value="{{$prdct->id}}">

                                                <!-- <div class="row mb-3">
                                                    <label
                                                        class="col-4 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Product</label>
                                                    <div class="col-8 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">HIGH
                                                            RISK</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-4 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Amount</label>
                                                    <div class="col-8 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">$500</p>
                                                    </div>
                                                </div> -->

                                                @php
                                                $usr =
                                                DB::table('customers')->where('id',
                                                $prdct->csId)->first();
                                                @endphp

                                                <div class="row mb-3" style="margin-top: 20px; margin-bottom: 0px;">
                                                    <label
                                                        class="col-4 col-form-label"
                                                        for="basic-icon-default-email">User</label>
                                                    <div class="col-8">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-email">
                                                            <a href="/admin/user/{{$usr->id}}">{{$usr->name}}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 0px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-4 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Amount</label>
                                                    <div class="col-8 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname"><strong>
                                                                USDT
                                                                {{number_format($prdct->pamount,2)}}</strong></p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 0px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-4 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Date</label>
                                                    <div class="col-sm-8 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">
                                                        <strong>{{ date('d, M, Y h:i a', strtotime($prdct->created_at)) }}</strong></p>
                                                    </div>
                                                </div>
                                                @if($prdct->txid != null)
                                                <div style="margin-top: 0px;"
                                                    class="row mb-2">
                                                    <label
                                                        class="col-4 col-form-label hnot"
                                                        for="basic-icon-default-fullname">TxID</label>
                                                    <div class="col-8 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">
                                                                <a style="font-size: 12px; color: red;" href="https://bscscan.com/tx/{{$prdct->txid}}">
                                                                     {{$prdct->txid}}
                                                                </a>
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif
                                                <div style="margin-top: 0px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-4 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Type</label>
                                                    <div class="col-8 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">
                                                            <strong>
                                                                
                                                                @php
                                                            $isnew = false;
                                                            if($prdct->pname == 'reinvest' || $prdct->pname == 'reinvest_compound')
                                                            {
                                                                $pcnt1 = DB::table('customer_plans')->where('csId',$prdct->csId)->where('pstatus','1')->where('pname','normal')->count();
                                                                $pcnt2 = DB::table('customer_plans')->where('csId',$prdct->csId)->where('pstatus','1')->where('pname','compound')->count();
                                                                $pcnt = $pcnt1 + $pcnt2;
                                                                if($pcnt > 0){
                                                                    $isnew = false;
                                                                } else {
                                                                    $isnew = true;
                                                                }
                                                            }
                                                                @endphp

                                                                {{getPname($prdct->pname)}}

                                                                @if($isnew == true)
                                                                (activation from transfer credit)
                                                                @endif

                                                            </strong></p>
                                                    </div>
                                                </div>

                                                @if($prdct->img)
                                                <div style="margin-top: 30px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-4 col-form-label hnot"
                                                        for="basic-icon-default-fullname">User
                                                        Payment</label>
                                                    <div class="col-8 hnot">
                                                        <a
                                                            href="{{$prdct->img}}">
                                                            <img
                                                                src="{{$prdct->img}}"
                                                                class="form-control"
                                                                style="border: none !important; width: 70px; "
                                                                id="basic-icon-default-fullname" /></a>
                                                    </div>
                                                </div>
                                                @endif

                                                <!-- <div class="row mb-3">
                                                    <label
                                                        class="col-4 col-form-label"
                                                        for="basic-icon-default-screenshot">Payment
                                                        Screenshot</label>
                                                    <div class="col-8">
                                                        <input type="file"
                                                            name="image"
                                                            id="basic-icon-default-screenshot"
                                                            class="form-control"
                                                            accept="image/*">
                                                    </div>

                                                </div> -->
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-4 col-form-label"
                                                        for="basic-icon-default-email">Email</label>
                                                    <div class="col-8">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-email">{{$usr->email}}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-4 form-label"
                                                        for="basic-icon-default-phone">Phone
                                                        No</label>
                                                    <div class="col-8">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-phone">{{$usr->phone}}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-4 form-label"
                                                        for="basic-icon-default-phone">Message</label>
                                                    <div class="col-8">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-phone">{{$prdct->msg}}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-4 form-label"
                                                        for="basic-icon-default-phone"></label>
                                                    <div class="col-8">
                                                      
                                                <div
                                                style="display: flex; justify-content: space-between;">
                                                <div class="col-8">
                                                    @if($prdct->pstatus == '0')
                                                    <button
                                                        onclick="return confirmDelete()"
                                                        type="submit"
                                                        name="val"
                                                        value="3"
                                                        class="btn btn-danger">Reject</button>
                                                    @endif
                                                </div>
                                                <div class="col-4">
                                                    @if($prdct->pstatus == '0')
                                                    <button
                                                        onclick="return confirmSubmit()"
                                                        type="submit"
                                                        name="val"
                                                        value="1"
                                                        class="btn btn-primary">Credit</button>

                                                    @else
                                                    <h3 class="badge bg-label-success me-1" style="color: green; font-size: 11;">SUCCESS</h3>
                                                    <a href=""></a>
                                                    @endif
                                                </div>
                                            </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row justify-content-end" 
                                                    style="margin-bottom: 50px;">
                                                    
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <script>
                                        function confirmDelete() {
                                            if (confirm("REJECT , you want to reject ? ")) {
                                              return true; 
                                            } else {
                                               return false;
                                            }
                                        }
                                        function confirmSubmit() {
                                            if (confirm("Are you sure you want to credit")) {
                                              return true; 
                                            } else {
                                               return false;
                                            }
                                        }
                                        </script>
                                    <!-- / Content -->

                                    <!-- Footer -->
                                    @include('dashboard.dcards.footer')
                                    <!-- / Footer -->

                                    <div
                                        class="content-backdrop fade"></div>
                                </div>
                                <!-- Content wrapper -->
                            </div>
                            <!-- / Layout page -->
                        </div>

                        <!-- Overlay -->
                        <div
                            class="layout-overlay layout-menu-toggle"></div>
                    </div>

                </div>
            </div>
        </div>
                    <!-- / Layout wrapper -->

                    <!-- Core JS -->
                    <!-- build:js assets/vendor/js/core.js -->
                    <script
                        src="/assets/vendor/libs/jquery/jquery.js"></script>
                    <script
                        src="/assets/vendor/libs/popper/popper.js"></script>
                    <script
                        src="/assets/vendor/js/bootstrap.js"></script>
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