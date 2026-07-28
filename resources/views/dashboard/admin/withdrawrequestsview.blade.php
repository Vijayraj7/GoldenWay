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

        <title>Withdrawal Request Detail | GoldenWay Admin</title>

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
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

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

        <style>
            :root {
                --bg-deep: #05060b;
                --bg-card: #0c0e1a;
                --bg-card2: #101322;
                --border: rgba(255, 255, 255, 0.08);
                --gold: #ffd700;
                --gold2: #ff9f43;
                --green: #00ff87;
                --blue: #38bdf8;
                --purple: #d783ff;
                --red: #ff6b6b;
                --text-main: #ffffff;
                --text-sub: #cbd5e1;
                --text-muted: #94a3b8;
            }

            * {
                font-family: 'Inter', sans-serif;
                box-sizing: border-box;
            }

            body,
            .layout-page,
            .content-wrapper {
                background: var(--bg-deep) !important;
            }

            .premium-card {
                background: var(--bg-card) !important;
                border: 1px solid var(--border) !important;
                border-radius: 20px !important;
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4) !important;
            }
            .premium-card-header {
                border-bottom: 1px solid var(--border) !important;
                padding: 24px 32px !important;
                background: rgba(255, 255, 255, 0.01) !important;
            }
            .premium-card-body {
                padding: 32px !important;
            }
            .detail-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 16px 20px;
                background: var(--bg-card2);
                border: 1px solid var(--border);
                border-radius: 12px;
                margin-bottom: 14px;
                transition: border-color 0.2s ease;
            }
            .detail-item:hover {
                border-color: rgba(255, 215, 0, 0.2);
            }
            .detail-label {
                color: var(--text-muted);
                font-size: 0.8rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .detail-value {
                color: var(--text-main);
                font-size: 0.95rem;
                font-weight: 700;
            }
            .detail-value a {
                color: var(--gold);
                text-decoration: none;
                transition: color 0.2s ease;
            }
            .detail-value a:hover {
                color: var(--gold2);
            }
            .copy-btn {
                background: transparent;
                border: none;
                color: var(--gold);
                cursor: pointer;
                font-size: 1.1rem;
                padding: 0 6px;
                transition: transform 0.2s ease;
            }
            .copy-btn:hover {
                transform: scale(1.15);
            }
            .tx-breakdown-card {
                background: linear-gradient(135deg, rgba(255, 215, 0, 0.05) 0%, rgba(255, 159, 67, 0.02) 100%) !important;
                border: 1px solid rgba(255, 215, 0, 0.15) !important;
            }
            .tx-gross-row {
                border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
                padding-bottom: 12px;
                margin-bottom: 12px;
            }
            .action-input {
                background: var(--bg-card2) !important;
                border: 1px solid var(--border) !important;
                color: var(--text-main) !important;
                border-radius: 12px !important;
                padding: 14px 18px !important;
                font-size: 0.9rem !important;
                outline: none;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }
            .action-input:focus {
                border-color: rgba(255, 215, 0, 0.4) !important;
                box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.1) !important;
            }
            .btn-reject {
                background: linear-gradient(135deg, #ff6b6b 0%, #ee5253 100%) !important;
                border: none !important;
                color: #fff !important;
                font-weight: 700 !important;
                padding: 12px 28px !important;
                border-radius: 12px !important;
                box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3) !important;
                transition: all 0.3s ease !important;
            }
            .btn-reject:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(255, 107, 107, 0.5) !important;
            }
            .btn-credit {
                background: linear-gradient(135deg, #00ff87 0%, #60efff 100%) !important;
                border: none !important;
                color: #05060b !important;
                font-weight: 800 !important;
                padding: 12px 28px !important;
                border-radius: 12px !important;
                box-shadow: 0 4px 15px rgba(0, 255, 135, 0.3) !important;
                transition: all 0.3s ease !important;
            }
            .btn-credit:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(0, 255, 135, 0.5) !important;
            }
        </style>

    </head>

    <body>
        @include('dashboard.dcards.naver')
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.admin.dcards.menu', [
                'r' =>
                'withdrawrequests'
                ])
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
                                    class="text-muted fw-light">Dashboard /</span> Withdraw Details</h4>

                            <!-- Premium Withdrawal Details -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card premium-card mb-4" style="margin-bottom: 120px !important;">
                                        <div class="card-header premium-card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0 text-white" style="font-weight: 700;"><i class="bx bx-detail me-2" style="color: var(--gold);"></i>Withdrawal Request #{{ $withdraw->id }}</h5>
                                            <div>
                                                @if($withdraw->status == '0')
                                                    <span class="badge bg-label-warning px-3 py-2" style="font-size: 0.8rem; font-weight: 700; background-color: rgba(255, 159, 67, 0.15) !important; color: #ff9f43 !important;">PENDING</span>
                                                @elseif($withdraw->status == '1')
                                                    <span class="badge bg-label-success px-3 py-2" style="font-size: 0.8rem; font-weight: 700; background-color: rgba(40, 199, 111, 0.15) !important; color: #28c76f !important;">SUCCESS</span>
                                                @elseif($withdraw->status == '3')
                                                    <span class="badge bg-label-danger px-3 py-2" style="font-size: 0.8rem; font-weight: 700; background-color: rgba(234, 84, 85, 0.15) !important; color: #ea5455 !important;">REJECTED</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body premium-card-body">
                                            
                                            @error("image")
                                            <div class="alert alert-danger mb-4" style="background-color: rgba(234, 84, 85, 0.1); border-color: rgba(234, 84, 85, 0.2); color: #ea5455;" role="alert">
                                                * {{$message}}
                                            </div>
                                            @enderror

                                            <form action="/withdrawp" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$withdraw->id}}">

                                                <div class="row g-4">
                                                    <!-- Left Column: User Profile & Destination -->
                                                    <div class="col-md-6">
                                                        <h6 class="text-white mb-3" style="font-weight: 600; letter-spacing: 0.5px;"><i class="bx bx-user me-2" style="color: var(--blue);"></i>User Information</h6>
                                                        
                                                        <div class="detail-item">
                                                            <span class="detail-label">Username</span>
                                                            <span class="detail-value">
                                                                <a href="/admin/user/{{$usr->id}}"><i class="bx bx-link-external me-1"></i>{{$usr->name}}</a>
                                                            </span>
                                                        </div>

                                                        <div class="detail-item">
                                                            <span class="detail-label">Email Address</span>
                                                            <span class="detail-value">{{$usr->email}}</span>
                                                        </div>

                                                        <div class="detail-item">
                                                            <span class="detail-label">Phone Number</span>
                                                            <span class="detail-value">{{$usr->phone}}</span>
                                                        </div>

                                                        @if($withdraw->pname == 'transfer')
                                                            @php
                                                            $tusr = DB::table('customers')->where('id', $withdraw->tuserid)->first();
                                                            @endphp
                                                            <div class="detail-item" style="border-left: 3px solid var(--purple);">
                                                                <span class="detail-label">Transfer To User</span>
                                                                <span class="detail-value">
                                                                    <a href="/admin/user/{{$tusr->id}}"><i class="bx bx-link-external me-1"></i>{{$tusr->name}}</a>
                                                                </span>
                                                            </div>
                                                        @endif

                                                        @if($withdraw->pname == 'allincome' || $withdraw->pname == 'pollincome')
                                                            <div class="detail-item" style="cursor: pointer;" id="copyWalletBtn">
                                                                <span class="detail-label">BEP-20 Wallet Address</span>
                                                                <span class="detail-value" style="font-family: monospace; font-size: 0.85rem; color: var(--gold); display: flex; align-items: center; gap: 6px;">
                                                                    {{$withdraw->wallet ?? decStr($usr->gms_wallet)}}
                                                                    <button type="button" class="copy-btn"><i class="bx bx-copy"></i></button>
                                                                </span>
                                                            </div>
                                                            <script>
                                                                document.getElementById('copyWalletBtn').addEventListener('click', function() {
                                                                    var wallet = "{{$withdraw->wallet ?? decStr($usr->gms_wallet)}}";
                                                                    navigator.clipboard.writeText(wallet)
                                                                        .then(function() {
                                                                            alert('Wallet address copied to clipboard!');
                                                                        })
                                                                        .catch(function(err) {
                                                                            console.error('Could not copy wallet address: ', err);
                                                                        });
                                                                });
                                                            </script>
                                                        @endif

                                                        @if($withdraw->msg)
                                                            <div class="detail-item mt-3" style="background: rgba(255,255,255,0.02); display: block;">
                                                                <span class="detail-label d-block mb-1">User Remark</span>
                                                                <span class="detail-value" style="color: var(--text-sub); font-weight: 500;">"{{ $withdraw->msg }}"</span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- Right Column: Financial breakdown & Actions -->
                                                    <div class="col-md-6">
                                                        <h6 class="text-white mb-3" style="font-weight: 600; letter-spacing: 0.5px;"><i class="bx bx-coin-stack me-2" style="color: var(--gold);"></i>Financial Details</h6>

                                                        <div class="card premium-card tx-breakdown-card mb-4">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex justify-content-between align-items-center tx-gross-row">
                                                                    <span class="text-white" style="font-weight: 600; font-size: 0.9rem;">Requested Total (Gross)</span>
                                                                    <span style="color: var(--gold); font-size: 1.3rem; font-weight: 800;">{{ number_format((float)$withdraw->amount + (float)$withdraw->fuel, 2) }} USDT</span>
                                                                </div>
                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                    <span class="text-muted" style="font-size: 0.85rem;">Amount without fee (Net)</span>
                                                                    <span class="text-white" style="font-weight: 700; font-size: 1rem;">{{ number_format((float)$withdraw->amount, 2) }} USDT</span>
                                                                </div>
                                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                                    <span class="text-muted" style="font-size: 0.85rem;">Admin Fee (Fuel)</span>
                                                                    <span style="color: var(--red); font-weight: 700; font-size: 1rem;">{{ number_format((float)$withdraw->fuel, 2) }} USDT</span>
                                                                </div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <span class="text-muted" style="font-size: 0.85rem;">Requested Date</span>
                                                                    <span class="text-white" style="font-weight: 600; font-size: 0.85rem;">{{ date('d M, Y h:i A', strtotime($withdraw->created_at)) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if($withdraw->img)
                                                            <div class="detail-item mb-4">
                                                                <span class="detail-label">Admin Payment Screenshot</span>
                                                                <span class="detail-value">
                                                                    <a href="{{$withdraw->img}}" target="_blank">
                                                                        <img src="{{$withdraw->img}}" style="border-radius: 8px; border: 1px solid var(--border); width: 60px; height: 60px; object-fit: cover;" />
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        @endif

                                                        <!-- Process Form Section -->
                                                        @if($withdraw->pname == 'allincome' || $withdraw->pname == 'pollincome')
                                                            @if($withdraw->atxid == null)
                                                                @if($withdraw->status == '0')
                                                                    <div class="mb-4">
                                                                        <label class="form-label text-white" style="font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">Transaction Hash / TxID</label>
                                                                        <input type="text" name="atxid" value="{{old('atxid')}}" class="form-control action-input w-100" placeholder="Enter blockchain TXID hash" />
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="detail-item mb-4" style="border-left: 3px solid var(--green);">
                                                                    <span class="detail-label">TXID</span>
                                                                    <span class="detail-value">
                                                                        <a style="font-size: 0.8rem; font-family: monospace;" href="https://bscscan.com/tx/{{$withdraw->atxid}}" target="_blank">
                                                                            {{ substr($withdraw->atxid, 0, 16) }}...{{ substr($withdraw->atxid, -16) }} <i class="bx bx-link-external ms-1"></i>
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        @endif

                                                        <!-- Actions -->
                                                        @if($withdraw->status == '0')
                                                            <div class="d-flex gap-3 justify-content-end mt-4">
                                                                <button onclick="return confirmDelete()" type="submit" name="val" value="3" class="btn btn-reject px-4 py-2"><i class="bx bx-x me-1"></i> Reject Request</button>
                                                                <button onclick="return confirmSubmit()" type="submit" name="val" value="1" class="btn btn-credit px-4 py-2"><i class="bx bx-check me-1"></i> Credit / Approve</button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function confirmDelete() {
                                    return confirm("Are you sure you want to reject this request?");
                                }
                                function confirmSubmit() {
                                    return confirm("Are you sure you want to approve and credit this request?");
                                }
                            </script>
                            <!-- / Content -->

                            <!-- Footer -->
                            @include('dashboard.dcards.footer')
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    <!-- / Layout page -->
                </div>

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>
            </div>
            <!-- / Layout wrapper -->

            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="/assets/vendor/libs/jquery/jquery.js"></script>
            <script src="/assets/vendor/libs/popper/popper.js"></script>
            <script src="/assets/vendor/js/bootstrap.js"></script>
            <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="/assets/vendor/js/menu.js"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="/assets/vendor/libs/masonry/masonry.js"></script>

            <!-- Main JS -->
            <script src="/assets/js/main.js"></script>

            <!-- Place this tag in your head or just before your close body tag. -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
        </body>
    </html>
