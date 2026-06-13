<?php
// Enable error reporting
error_reporting(E_ALL);
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Auto Poll History</title>
        <meta name="description" content="" />
        <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="/assets/css/demo.css" />
        <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <script src="/assets/vendor/js/helpers.js"></script>
        <script src="/assets/js/config.js"></script>
        <style>
            .card-header-premium {
                background: linear-gradient(135deg, #0f2e22 0%, #1e4d3a 100%) !important;
                border-bottom: 2px solid #f9a826 !important;
                color: #fff !important;
            }
            .table-premium th {
                background-color: rgba(15, 46, 34, 0.05) !important;
                font-weight: 700 !important;
                color: #0f2e22 !important;
                border: 1px solid rgba(0, 0, 0, 0.08) !important;
            }
            .table-premium td {
                border: 1px solid rgba(0, 0, 0, 0.08) !important;
            }
            .text-green-premium {
                color: #2e7d32 !important;
                font-weight: bold;
            }
            .text-gold-premium {
                color: #f9a826 !important;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        @include('dashboard.dcards.naver', ['r' => 'dashboard'])
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.dcards.menu', ['r' => 'autopollhistory'])
                <!-- / Menu -->

                <div class="layout-page">
                    <!-- Navbar -->
                    @include('dashboard.dcards.nav')
                    <!-- / Navbar -->

                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4">
                                <span class="text-muted fw-light">Dashboard /</span> Auto Poll History
                            </h4>

                            <!-- Purchases History Card -->
                            <div class="card mb-5">
                                <h5 class="card-header card-header-premium d-flex align-items-center justify-content-between">
                                    <span><i class="bx bx-cart me-2"></i>Auto Poll Purchases</span>
                                </h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-premium">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Date & Time</th>
                                                <th>Poll ID</th>
                                                <th>Purchased Amount</th>
                                                <th>TXID</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($autopolls as $key => $poll)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ date('d, M, Y h:i a', strtotime($poll->created_at)) }}</td>
                                                    <td>#{{ $poll->id }}</td>
                                                    <td class="text-gold-premium">{{ number_format($poll->poll_amount, 2) }} USDT</td>
                                                    <td>
                                                        @if($poll->txid)
                                                            <span class="text-muted" style="font-size: 11px;">{{ $poll->txid }}</span>
                                                        @else
                                                            <span class="text-muted">N/A (Admin)</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($poll->status == 'completed')
                                                            <span class="badge bg-label-success">Completed</span>
                                                        @else
                                                            <span class="badge bg-label-warning">{{ ucfirst($poll->status) }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">No Auto Poll purchases found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Payouts / Income History Card -->
                            <div class="card">
                                <h5 class="card-header card-header-premium d-flex align-items-center justify-content-between">
                                    <span><i class="bx bx-trending-up me-2"></i>Auto Poll Profit-Sharing Income</span>
                                </h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-premium">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Date & Time</th>
                                                <th>Income Source</th>
                                                <th>Trigger Poll ID</th>
                                                <th>Total Eligible at Time</th>
                                                <th>Payout Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($incomeTransactions as $key => $income)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ date('d, M, Y h:i a', strtotime($income->created_at)) }}</td>
                                                    <td>
                                                        @if($income->from_customer_name)
                                                            {{ $income->from_customer_name }} <span class="text-muted" style="font-size: 11px;">(ID: {{ $income->fcsId }})</span>
                                                        @else
                                                            User (ID: {{ $income->fcsId }})
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($income->poll_id)
                                                            #{{ $income->poll_id }}
                                                        @else
                                                            <span class="text-muted">N/A</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($income->eligible_count > 0)
                                                            {{ $income->eligible_count }} Customers
                                                        @else
                                                            <span class="text-muted">N/A</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-green-premium">+{{ number_format($income->tamount, 2) }} USDT</td>
                                                    <td>
                                                        <span class="badge bg-label-success">Received</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center py-4">No profit-sharing income records found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr class="my-5" />
                            @include('dashboard.dcards.footer')
                            <div class="content-backdrop fade"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <script src="/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="/assets/vendor/libs/popper/popper.js"></script>
        <script src="/assets/vendor/js/bootstrap.js"></script>
        <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/assets/vendor/js/menu.js"></script>
        <script src="/assets/js/main.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
