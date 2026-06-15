<?php
use Carbon\Carbon;

// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Level Income</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/grnyellow.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

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

        /* Premium Dropdown Styling */
        .premium-dropdown .btn-secondary {
            background: linear-gradient(135deg, #ffd700, #f9a826) !important;
            border: none !important;
            color: #071f17 !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 30px !important;
            padding: 8px 20px !important;
            font-size: 14px !important;
            box-shadow: 0 4px 15px rgba(249, 168, 38, 0.2) !important;
            transition: all 0.3s ease !important;
            display: inline-flex;
            align-items: center;
        }

        .premium-dropdown .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(249, 168, 38, 0.3) !important;
        }

        .premium-dropdown .dropdown-menu {
            background: rgba(7, 31, 23, 0.95) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(249, 168, 38, 0.25) !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5) !important;
            padding: 10px 0 !important;
        }

        .premium-dropdown .dropdown-item {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 600 !important;
            padding: 10px 20px !important;
            transition: all 0.2s ease;
        }

        .premium-dropdown .dropdown-item:hover {
            background: rgba(249, 168, 38, 0.15) !important;
            color: #ffd700 !important;
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
</head>

<body>
    @include('dashboard.dcards.naver', ['r' => 'dashboard'])
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.dcards.menu', ['r' => 'lev_income'])
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
                            <span class="text-muted fw-light">Dashboard /</span> Level Income
                        </h4>

                        <?php
                            // Query level income transactions from customer_transactions table directly
                            $transactions = DB::table('customer_transactions')
                                ->where('csId', $v->id)
                                ->where('tType', 'levincome')
                                ->where('levl', (string)$lev)
                                ->orderBy('created_at', 'desc')
                                ->get();

                            $thistotalincome = $transactions->sum('tAmount');
                            ?>

                        <!-- Premium Level Income Table Card -->
                        <div class="card mb-4 premium-card">
                            <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div class="d-flex align-items-center gap-3">
                                    <h5 class="mb-0">{{ $levname }} Level Income</h5>

                                    <!-- Premium Dropdown Selector -->
                                    <div class="btn-group premium-dropdown">
                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $levname }} Level
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if ($lev != '1')
                                            <li><a class="dropdown-item" href="/dashboard/levincome/1">First Level</a></li>
                                            @endif
                                            @if ($lev != '2')
                                            <li><a class="dropdown-item" href="/dashboard/levincome/2">Second Level</a></li>
                                            @endif
                                            @if ($lev != '3')
                                            <li><a class="dropdown-item" href="/dashboard/levincome/3">Third Level</a></li>
                                            @endif
                                            @if ($lev != '4')
                                            <li><a class="dropdown-item" href="/dashboard/levincome/4">Fourth Level</a></li>
                                            @endif
                                            @if ($lev != '5')
                                            <li><a class="dropdown-item" href="/dashboard/levincome/5">Fifth Level</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <h5 class="mb-0" style="background: none !important; -webkit-text-fill-color: #ffd700 !important; font-size: 18px !important; letter-spacing: 0px !important; text-transform: none !important;">
                                    Total: {{ number_format((float)$thistotalincome, 4) }} USDT
                                </h5>
                            </div>

                            <div class="table-responsive text-nowrap">
                                <table class="table premium-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>From User (UID)</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Income</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @if($transactions->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center py-4" style="color: rgba(255, 255, 255, 0.5) !important;">
                                                No level income transactions found for this level.
                                            </td>
                                        </tr>
                                        @else
                                        @foreach($transactions as $index => $transaction)
                                        @php
                                        $fromUser = DB::table('customers')->where('id', $transaction->fcsId)->first();
                                        $fromUid = $fromUser ? $fromUser->uid : 'N/A';
                                        @endphp
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ date('d, M, Y H:i', strtotime($transaction->created_at)) }}</td>
                                            <td>
                                                @if($fromUser)
                                                <a href="/dashboard/profile?prfid={{ $transaction->fcsId }}" style="color: #ffd700; font-weight: 600; text-decoration: none;">
                                                    {{ $fromUid }}
                                                </a>
                                                @else
                                                <span style="color: rgba(255, 255, 255, 0.6);">{{ $fromUid }}</span>
                                                @endif
                                            </td>
                                            <td>L{{ $transaction->levl }}</td>
                                            <td>
                                                @if (($transaction->tStatus ?? '0') == '1')
                                                <span class="premium-badge-success"><i class="bx bx-check-shield"></i> Completed</span>
                                                @else
                                                <span class="premium-badge-warning"><i class="bx bx-time-five"></i> Pending</span>
                                                @endif
                                            </td>
                                            <td style="font-weight: 600; color: #00D094;">
                                                +{{ number_format($transaction->tAmount, 4) }} USDT
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
