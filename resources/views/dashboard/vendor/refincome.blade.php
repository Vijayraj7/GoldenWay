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
            href="/tst/goldenlogo.png" />

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
                            <div class="card mb-4 premium-card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Referral Income</h5>
                                    <h5 class="mb-0" style="background: none !important; -webkit-text-fill-color: #ffd700 !important; font-size: 18px !important; letter-spacing: 0px !important;">Total: {{ number_format((float)$totalrefincome, 2) }} USDT</h5>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table premium-table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>UID</th>
                                                <th>Amount Staked</th>
                                                <th>Status</th>
                                                <th>Income (5%)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @for($i = 0; $i < count($cusrefferals); $i++)
                                            @php
                                            $cusrefferal = $cusrefferals[$i] ?? null;
                                            $income = 0;
                                            $plan = null;

                                            if ($cusrefferal) {
                                                $plan = DB::table("customer_plans")->where('csId', $cusrefferal->id)->first();
                                                if ($plan) {
                                                    $pamount = (float) ($plan->pamount ?? 0);
                                                    $income = (float) ($pamount * 5 / 100);
                                                }
                                            }
                                            @endphp

                                            @if($plan)
                                            <tr>
                                                <td>
                                                    {{ date('d, M, Y', strtotime($plan->created_at)) }}
                                                </td>
                                                <td>
                                                    <a href="/dashboard/profile?prfid={{$cusrefferal->id}}" style="color: #ffd700; font-weight: 600; text-decoration: none;">
                                                        {{ $cusrefferal->uid }}
                                                    </a>
                                                </td>
                                                <td style="font-weight: 600;">
                                                    {{ number_format($plan->pamount, 2) }} USDT
                                                </td>
                                                <td>
                                                    @if (($plan->pstatus ?? '0') == '1')
                                                        <span class="premium-badge-success"><i class="bx bx-check-shield"></i> Active</span>
                                                    @else
                                                        <span class="premium-badge-warning"><i class="bx bx-time-five"></i> Pending</span>
                                                    @endif
                                                </td>
                                                <td style="font-weight: 600; color: #00D094;">
                                                    {{ number_format($income, 2) }} USDT
                                                </td>
                                            </tr>
                                            @endif
                                            @endfor

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
