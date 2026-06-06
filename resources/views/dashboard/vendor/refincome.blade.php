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

        @include('dashboard.dcards.naver', ['r' => 'dashboard'])
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.dcards.menu', ['r' => 'ref_income'])
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
                                Refferal Income</h4>

                            <!-- Basic Bootstrap Table -->

                            <div class="card">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">Income :
                                    {{$totalrefincome}} USDT</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <!-- <th>Users</th> -->
                                                <th>Status</th>
                                                <th>Income(10%)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @for($i = 0; $i <
                                            count($cusrefferals); $i++)
                                            @php
                                            $cusrefferal = $cusrefferals[$i] ??
                                            null;
                                            $income = 0;

                                            if ($cusrefferal) {
                                            $plan =
                                            DB::table("customer_plans")->where('csId',
                                            $cusrefferal->id)->first();
                                            if ($plan) {
                                            $pamount = (float) $plan->pamount ??
                                            0;
                                            $income = (float) ($pamount * 10 /
                                            100);
                                            }
                                            }
                                            @endphp

                                            @if($plan)

                                            <tr>
                                                <td>
                                                    {{
                                                    date('d, M, Y',
                                                    strtotime($plan->created_at))
                                                    }}
                                                </td>
                                                <th>
                                                    <a href="/dashboard/profile?prfid={{$cusrefferal->id}}">
                                                    {{ $cusrefferal->name }}
                                                    </a>
                                                </th>
                                                <td>${{
                                                    DB::table("customer_plans")->where('csId',
                                                    $cusrefferal->id)->first()->pamount
                                                    ?? '0' }}</td>
                                                @if(false)
                                                <td>
                                                    <ul
                                                        class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            class="avatar avatar-xs pull-up"
                                                            title="Lilian Fuller">
                                                            <img
                                                                src="../assets/img/avatars/5.png"
                                                                alt="Avatar"
                                                                class="rounded-circle" />
                                                        </li>
                                                        <li
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            class="avatar avatar-xs pull-up"
                                                            title="Sophia Wilkerson">
                                                            <img
                                                                src="../assets/img/avatars/6.png"
                                                                alt="Avatar"
                                                                class="rounded-circle" />
                                                        </li>
                                                        <li
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            class="avatar avatar-xs pull-up"
                                                            title="Christina Parker">
                                                            <img
                                                                src="../assets/img/avatars/7.png"
                                                                alt="Avatar"
                                                                class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                @endif
                                                <td>@if(
                                                    (
                                                    DB::table("customer_plans")->where('csId',
                                                    $cusrefferal->id)->first()->pstatus??'0')
                                                    == '1' )
                                                    <span
                                                        class="badge bg-label-primary me-1">Active</span>
                                                    @endif
                                                    @if(
                                                    (
                                                    DB::table("customer_plans")->where('csId',
                                                    $cusrefferal->id)->first()->pstatus??'0')
                                                    == '0' )
                                                    <span
                                                        class="badge bg-label-warning me-1">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    ${{$income}}
                                                </td>
                                            </tr>

                                            @endif

                                            @endfor

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