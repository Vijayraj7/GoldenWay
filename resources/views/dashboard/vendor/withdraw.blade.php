<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Withdraw | GoldenWay</title>
    <meta name="description" content="Withdraw your earnings securely via crypto." />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Lottie -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        /* ── Page background ── */
        body {
            background: #0d0f1a !important;
        }

        .layout-page {
            background: #0d0f1a !important;
        }

        .content-wrapper {
            background: #0d0f1a !important;
        }

        /* ── Page title ── */
        .wth-page-title {
            font-size: 1.6rem;
            font-weight: 800;
            background: linear-gradient(135deg, #f5c518 0%, #ff8c00 60%, #ff4d4d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
            margin-bottom: 0.3rem;
        }

        .wth-page-sub {
            color: #6c7a96;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* ── Balance banner ── */
        .balance-banner {
            background: linear-gradient(135deg, #1a1d2e 0%, #1e2235 100%);
            border: 1px solid rgba(245, 197, 24, 0.2);
            border-radius: 20px;
            padding: 28px 32px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        }

        .balance-banner::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 180px;
            height: 180px;
            background: radial-gradient(circle, rgba(245, 197, 24, 0.12) 0%, transparent 70%);
            border-radius: 50%;
        }

        .balance-banner::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: 20px;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, rgba(255, 77, 77, 0.08) 0%, transparent 70%);
            border-radius: 50%;
        }

        .balance-label {
            color: #6c7a96;
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 6px;
        }

        .balance-amount {
            font-size: 2.4rem;
            font-weight: 800;
            color: #f5c518;
            line-height: 1.1;
        }

        .balance-amount span {
            font-size: 1rem;
            font-weight: 500;
            color: #8a96b0;
            margin-left: 6px;
        }

        .balance-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(74, 222, 128, 0.12);
            border: 1px solid rgba(74, 222, 128, 0.25);
            color: #4ade80;
            border-radius: 20px;
            padding: 4px 12px;
            font-size: 0.72rem;
            font-weight: 600;
            margin-top: 8px;
        }

        /* ── Withdraw card ── */
        .wth-card {
            background: linear-gradient(145deg, #151827 0%, #1a1d2e 100%);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .wth-card-header {
            background: linear-gradient(135deg, rgba(245, 197, 24, 0.08) 0%, rgba(255, 140, 0, 0.05) 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding: 24px 32px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .wth-card-header-icon {
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, #f5c518, #ff8c00);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            box-shadow: 0 6px 20px rgba(245, 197, 24, 0.35);
        }

        .wth-card-header h5 {
            color: #e8eaf0;
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
        }

        .wth-card-header p {
            color: #5a6480;
            font-size: 0.78rem;
            margin: 2px 0 0;
        }

        .wth-card-body {
            padding: 32px;
        }

        /* ── Form field ── */
        .wth-field {
            margin-bottom: 22px;
        }

        .wth-label {
            color: #8a96b0;
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            display: block;
        }

        .wth-select,
        .wth-input {
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 12px !important;
            color: #e8eaf0 !important;
            padding: 12px 16px !important;
            font-size: 0.9rem !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
            width: 100%;
            outline: none;
        }

        .wth-select:focus,
        .wth-input:focus {
            border-color: rgba(245, 197, 24, 0.4) !important;
            background: rgba(245, 197, 24, 0.04) !important;
            box-shadow: 0 0 0 3px rgba(245, 197, 24, 0.1) !important;
            color: #e8eaf0 !important;
        }

        .wth-select option {
            background: #1a1d2e;
            color: #e8eaf0;
        }

        .wth-input-group {
            display: flex;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .wth-input-group:focus-within {
            border-color: rgba(245, 197, 24, 0.4);
            background: rgba(245, 197, 24, 0.04);
            box-shadow: 0 0 0 3px rgba(245, 197, 24, 0.1);
        }

        .wth-input-prefix {
            background: rgba(255, 255, 255, 0.04);
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            color: #f5c518;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 0 14px;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }

        .wth-input-inner {
            background: transparent !important;
            border: none !important;
            color: #e8eaf0 !important;
            font-size: 0.9rem !important;
            font-weight: 500 !important;
            padding: 12px 16px !important;
            width: 100%;
            outline: none;
            box-shadow: none !important;
        }

        .wth-input-inner::placeholder {
            color: #3d4560 !important;
        }

        .wth-input-inner:focus {
            box-shadow: none !important;
        }

        /* ── Info row (readonly fields) ── */
        .wth-info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 14px 18px;
        }

        .wth-info-key {
            color: #5a6480;
            font-size: 0.82rem;
            font-weight: 500;
        }

        .wth-info-value {
            color: #e8eaf0;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .wth-info-value.highlight {
            color: #f5c518;
        }

        .wth-info-value.green {
            color: #4ade80;
        }

        /* ── Receivable amount live display ── */
        .receivable-box {
            background: linear-gradient(135deg, rgba(74, 222, 128, 0.08), rgba(74, 222, 128, 0.04));
            border: 1px solid rgba(74, 222, 128, 0.2);
            border-radius: 12px;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .receivable-box .label {
            color: #4ade80;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .receivable-box .value {
            color: #4ade80;
            font-size: 1.1rem;
            font-weight: 800;
        }

        /* ── Note box ── */
        .wth-note {
            background: rgba(255, 165, 0, 0.06);
            border: 1px solid rgba(255, 165, 0, 0.15);
            border-radius: 12px;
            padding: 14px 18px;
            display: flex;
            gap: 10px;
            align-items: flex-start;
            margin-top: 4px;
        }

        .wth-note i {
            color: #ff8c00;
            font-size: 1rem;
            margin-top: 1px;
            flex-shrink: 0;
        }

        .wth-note p {
            color: #8a96b0;
            font-size: 0.78rem;
            line-height: 1.6;
            margin: 0;
        }

        /* ── Divider ── */
        .wth-divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            margin: 24px 0;
        }

        /* ── Submit button ── */
        .wth-submit-btn {
            background: linear-gradient(135deg, #f5c518 0%, #ff8c00 100%);
            color: #0d0f1a;
            border: none;
            border-radius: 14px;
            padding: 14px 36px;
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 24px rgba(245, 197, 24, 0.35);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }

        .wth-submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .wth-submit-btn:hover::before {
            left: 100%;
        }

        .wth-submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(245, 197, 24, 0.5);
        }

        .wth-submit-btn:active {
            transform: translateY(0);
        }

        /* ── Processing modal overlay ── */
        #proccess_tic .modal-dialog {
            max-width: 420px;
            margin: auto;
        }

        #proccess_tic .modal-content {
            background: #151827;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            color: #e8eaf0;
        }

        #proccess_tic h5 {
            color: #f5c518;
            font-weight: 700;
            margin-top: 12px;
        }

        #proccess_tic p {
            color: #6c7a96;
            font-size: 0.85rem;
        }

        /* ── Success modal ── */
        #success_tic .modal-content {
            background: #151827;
            border: 1px solid rgba(74, 222, 128, 0.2);
            border-radius: 20px;
            padding: 24px;
            text-align: center;
            color: #e8eaf0;
        }

        #success_tic h3 {
            color: #4ade80;
            font-weight: 700;
            margin: 10px 0 4px;
        }

        #success_tic h4 {
            color: #f5c518;
            font-size: 1.4rem;
            font-weight: 800;
        }

        #success_tic .btn {
            margin-top: 16px;
            background: #4ade80;
            color: #0d0f1a;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            padding: 10px 28px;
        }

        /* ── Error modal ── */
        #error_tic .modal-content {
            background: #151827;
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 20px;
            padding: 24px;
            text-align: center;
            color: #e8eaf0;
        }

        #error_tic h3 {
            color: #ef4444;
            font-weight: 700;
            margin: 10px 0 4px;
        }

        #error_tic p {
            color: #6c7a96;
            font-size: 0.85rem;
            margin-top: 8px;
        }

        #error_tic .btn {
            margin-top: 16px;
            background: #ef4444;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            padding: 10px 28px;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .balance-amount {
                font-size: 1.8rem;
            }

            .wth-card-body {
                padding: 20px;
            }

            .balance-banner {
                padding: 20px;
            }
        }

    </style>
</head>

<body>
    @include('dashboard.dcards.naver', ['r' => 'dashboard'])
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('dashboard.dcards.menu', ['r' => 'dashboard'])

            <div class="layout-page">
                @include('dashboard.dcards.nav')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Page Title -->
                        <div class="mb-4">
                            <h1 class="wth-page-title">Withdraw {{ $wwname }}</h1>
                            <p class="wth-page-sub">Securely withdraw your earnings to your crypto wallet</p>
                        </div>

                        <?php
                            $withrawable_raw = DB::table('customer_transactions')
                                ->where('csId', $v->id)
                                ->where('tStatus', '1')
                                ->get()
                                ->sum('tAmount');
                            $withrawable = number_format($withrawable_raw, 2);
                            $withrawable_numeric = number_format($withrawable_raw, 2, '.', '');
                            ?>

                        <!-- Balance Banner -->
                        <div class="balance-banner">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="balance-label"><i class="bx bx-wallet-alt" style="margin-right:5px;"></i> Available Balance</div>
                                    <div class="balance-amount">{{ $withrawable }}<span>USDT</span></div>
                                    <div class="balance-badge"><i class="bx bx-check-circle"></i> Available for withdrawal</div>
                                </div>
                                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                    <div style="color:#3d4560; font-size:0.72rem; font-weight:600; text-transform:uppercase; letter-spacing:1px; margin-bottom:4px;">Admin Fee</div>
                                    <div style="color:#ff8c00; font-size:1.5rem; font-weight:800;">10%</div>
                                    <div style="color:#3d4560; font-size:0.72rem; font-weight:500;">deducted from withdrawal</div>
                                </div>
                            </div>
                        </div>

                        <!-- Withdraw Form Card -->
                        <div class="wth-card">
                            <div class="wth-card-header">
                                <div class="wth-card-header-icon">
                                    <i class="bx bx-send" style="color:#0d0f1a;"></i>
                                </div>
                                <div>
                                    <h5>Withdrawal Request</h5>
                                    <p>Fill in the details below to process your withdrawal</p>
                                </div>
                            </div>

                            <div class="wth-card-body">
                                <form action="/withdrawp" method="POST" onsubmit="return false" id="wth_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="pname" value="{{ $wwformname }}">
                                    <input id="hid_fuel" type="hidden" name="fuel" value="{{ old('fuel') }}">
                                    <input id="hid_amount" type="hidden" name="amount" value="{{ old('amount') }}">
                                    <input type="hidden" name="type" value="1">
                                    <input type="hidden" name="tuserid" value="0">
                                    <input type="hidden" name="status" value="0">
                                    <input type="hidden" name="firstid" value="{{ $wwfirstid }}">
                                    <input type="hidden" name="lastid" value="{{ $wwlastid }}">
                                    <input type="hidden" name="csId" value="{{ $v->id }}">

                                    <div class="row">
                                        <!-- Left column -->
                                        <div class="col-md-6">

                                            <div class="wth-field">
                                                <label class="wth-label">Withdrawal Type</label>
                                                <select class="wth-select" required>
                                                    <option>By Crypto</option>
                                                </select>
                                            </div>

                                            <div class="wth-field">
                                                <label class="wth-label">Crypto Network</label>
                                                <select class="wth-select" required>
                                                    <option>BEP 20 (BSC)</option>
                                                </select>
                                            </div>

                                            <div class="wth-field">
                                                <label class="wth-label">Withdrawal Amount</label>
                                                <div class="wth-input-group" style="display: flex; overflow: hidden; align-items: stretch;">
                                                    <span class="wth-input-prefix">USDT</span>
                                                    <input type="number" min="20" step="any" max="{{ $withrawable_numeric }}" required id="input_amount_element" class="wth-input-inner" placeholder="Min 20 — Max {{ $withrawable }}" />
                                                    <button type="button" id="max_withdraw_btn" style="background: rgba(245, 197, 24, 0.15); border: none; border-left: 1px solid rgba(255, 255, 255, 0.08); color: #f5c518; font-weight: 700; font-size: 0.75rem; padding: 0 16px; cursor: pointer; transition: all 0.2s ease; white-space: nowrap;">MAX</button>
                                                </div>
                                            </div>

                                            <!-- Receivable live amount -->
                                            <div class="wth-field">
                                                <label class="wth-label">You Will Receive</label>
                                                <div class="receivable-box">
                                                    <span class="label"><i class="bx bx-coin-stack" style="margin-right:5px;"></i>Net amount (after 10% fee)</span>
                                                    <span class="value"><span id="recamnt">0.00</span> USDT</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right column -->
                                        <div class="col-md-6">

                                            <div class="wth-field">
                                                <label class="wth-label">Transaction Password</label>
                                                <div class="wth-input-group">
                                                    <span class="wth-input-prefix"><i class="bx bx-lock-alt"></i></span>
                                                    <input type="password" name="tpassword" required aria-required="true" value="{{ old('tpassword') }}" id="wth_tpassword" class="wth-input-inner" placeholder="Enter transaction password" />
                                                    <span class="cursor-pointer" style="padding: 0 14px; display: flex; align-items: center; color: #8a96b0;" onclick="togglePasswordVisibility('wth_tpassword', this)">
                                                        <i class="bx bx-hide"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="wth-field">
                                                <label class="wth-label">Remark (Optional)</label>
                                                <div class="wth-input-group">
                                                    <span class="wth-input-prefix"><i class="bx bx-comment-detail"></i></span>
                                                    <input type="text" name="msg" required aria-required="true" value="{{ old('msg') }}" id="basic-icon-default-message2" class="wth-input-inner" placeholder="Add a remark..." />
                                                </div>
                                            </div>

                                            <!-- Fee breakdown -->
                                            <div class="wth-field">
                                                <label class="wth-label">Fee Breakdown</label>
                                                <div style="display:flex; flex-direction:column; gap:8px;">
                                                    <div class="wth-info-row">
                                                        <span class="wth-info-key">Admin Fee (10%)</span>
                                                        <span class="wth-info-value" style="color:#ff4d4d;" id="fee_display">0.00 USDT</span>
                                                    </div>
                                                    <div class="wth-info-row">
                                                        <span class="wth-info-key">Min Withdrawal</span>
                                                        <span class="wth-info-value highlight">20 USDT</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="wth-divider">

                                    <!-- Note -->
                                    <div class="wth-note mb-4">
                                        <i class="bx bx-info-circle"></i>
                                        <p><strong style="color:#ff8c00;">Note:</strong> Digital wallet purchases will trigger a withdrawal hold for up to 72 hours. Withdrawal holds may also be triggered by deposits from certain wallets as well as for security reasons.</p>
                                    </div>

                                    @if ($withrawable > 0)
                                    <div class="d-flex align-items-center gap-3">
                                        <button type="submit" onclick="onsubmitwth()" class="wth-submit-btn" id="submit-wth-btn">
                                            <i class="bx bx-send"></i>
                                            Submit Withdrawal Request
                                        </button>
                                        <span style="color:#3d4560; font-size:0.78rem;">Processing takes up to 72 hours</span>
                                    </div>
                                    @else
                                    <div style="background: rgba(255,77,77,0.08); border:1px solid rgba(255,77,77,0.2); border-radius:12px; padding:16px 20px; display:flex; align-items:center; gap:12px;">
                                        <i class="bx bx-error-circle" style="color:#ff4d4d; font-size:1.4rem;"></i>
                                        <div>
                                            <div style="color:#ff4d4d; font-weight:700; font-size:0.9rem;">Insufficient Balance</div>
                                            <div style="color:#5a6480; font-size:0.78rem; margin-top:2px;">You need at least 20 USDT to make a withdrawal.</div>
                                        </div>
                                    </div>
                                    @endif

                                </form>
                            </div>
                        </div>

                        <!-- / Content -->
                        @include('dashboard.dcards.footer')
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
                <!-- / Layout page -->
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Processing Modal -->
    <div id="proccess_tic" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <lottie-player src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json" background="transparent" speed="1" style="width:160px;height:160px;margin:auto;" autoplay loop></lottie-player>
                <h5>Processing your request…</h5>
                <p>Please wait while we submit your withdrawal.<br>Do not close this window.</p>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    @error('success')
    <div id="success_tic" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" style="max-width:400px;">
            <div class="modal-content">
                <?php $issucc = true; ?>
                <lottie-player src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json" background="transparent" speed="1" style="width:160px;height:160px;margin:auto;" autoplay></lottie-player>
                <h3>Withdraw Requested!</h3>
                <h4>{{ old('amount') }} USDT</h4>
                <p style="color:#6c7a96;font-size:0.82rem;margin:8px 0 0;">Your request has been submitted successfully.</p>
                <button class="btn" type="button" data-bs-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            $('#success_tic').modal('show');
        });

    </script>
    @enderror

    <!-- Error Modal -->
    @error('image')
    <div id="error_tic" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" style="max-width:400px;">
            <div class="modal-content">
                <div style="width:80px; height:80px; background:rgba(239, 68, 68, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center; margin: 24px auto 16px; color:#ef4444; font-size:2.5rem;">
                    <i class="bx bx-error-circle"></i>
                </div>
                <h3>Request Failed</h3>
                <p>{{ $message }}</p>
                <button class="btn" type="button" data-bs-dismiss="modal">Try Again</button>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            $('#error_tic').modal('show');
        });
    </script>
    @enderror

    <script>
        // Live fee & receivable calculation
        var element_inpamnt = document.getElementById('input_amount_element');
        var element_display_recamnt = document.getElementById('recamnt');
        var element_fee_display = document.getElementById('fee_display');
        var element_outvalue_hidden_amnt = document.getElementById('hid_amount');
        var element_outvalue_hidden_fuel = document.getElementById('hid_fuel');

        element_inpamnt.addEventListener('input', function() {
            var inputamount = Number(this.value);
            var fuel_amount = inputamount * 10 / 100;
            var receivable_amount = inputamount - fuel_amount;
            element_display_recamnt.innerText = receivable_amount.toFixed(2);
            element_fee_display.innerText = fuel_amount.toFixed(2) + ' USDT';
            element_outvalue_hidden_fuel.value = fuel_amount.toString();
            element_outvalue_hidden_amnt.value = receivable_amount.toString();
        });

        // Max button click handler
        document.getElementById('max_withdraw_btn').addEventListener('click', function() {
            var maxVal = Number('{{ $withrawable_numeric }}');
            element_inpamnt.value = maxVal;
            var event = new Event('input', { bubbles: true });
            element_inpamnt.dispatchEvent(event);
        });

        // Submit handler
        function onsubmitwth() {
            var am = document.getElementById('input_amount_element').value;
            var tpas = document.getElementById('wth_tpassword').value;
            if (!am) {
                alert('Please enter an amount');
                return;
            }
            var amo = Number(am);
            var max = Number('{{ $withrawable_numeric }}');
            if (amo < 20) {
                alert('Minimum withdrawal is 20 USDT');
                return;
            }
            if (amo > max) {
                alert('Insufficient balance');
                return;
            }
            if (!tpas || tpas.length < 1) {
                alert('Transaction password is required');
                return;
            }
            $('#proccess_tic').modal('show');
            (async () => {
                await new Promise(resolve => setTimeout(resolve, 4000));
                document.getElementById('wth_form').submit();
            })();
        }

    </script>

    <!-- Core JS -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/vendor/libs/masonry/masonry.js"></script>
    <script src="/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
