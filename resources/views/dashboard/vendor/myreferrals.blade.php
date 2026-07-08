<?php
use Carbon\Carbon;

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$myintid = (int)$v->id;

// Fetch level users
$level1 = getlevusers('1', $v);
$level2 = collect([]);
$level3 = collect([]);
$level4 = collect([]);
$level5 = collect([]);

$level1Ids = $level1->pluck('id')->toArray();
$level2Ids = [];
$level3Ids = [];
$level4Ids = [];
$level5Ids = [];

$allIds = $level1Ids;

// Preload Staking
$userStakes = empty($allIds) ? [] : DB::table('customer_plans')
    ->whereIn('csId', $allIds)
    ->where('pstatus', '1')
    ->groupBy('csId')
    ->select('csId', DB::raw('SUM(pamount) as total_stake'))
    ->pluck('total_stake', 'csId')
    ->toArray();

// Preload Subscriptions
$userSubs = empty($allIds) ? [] : DB::table('customer_subs')
    ->whereIn('csId', $allIds)
    ->where('status', 'completed')
    ->groupBy('csId')
    ->select('csId', DB::raw('SUM(sub_amount) as total_sub'))
    ->pluck('total_sub', 'csId')
    ->toArray();

// Preload AutoPolls
$userPolls = empty($allIds) ? [] : DB::table('customer_autopolls')
    ->whereIn('csId', $allIds)
    ->where('status', 'completed')
    ->groupBy('csId')
    ->select('csId', DB::raw('SUM(poll_amount) as total_poll'))
    ->pluck('total_poll', 'csId')
    ->toArray();

// Preload Sponsors
$sponsorIds = [];
foreach ([$level1, $level2, $level3, $level4, $level5] as $lvl) {
    foreach ($lvl as $u) {
        if ($u->referral) {
            $sponsorIds[] = $u->referral;
        }
    }
}
$sponsors = empty($sponsorIds) ? collect() : DB::table('customers')
    ->whereIn('id', array_unique($sponsorIds))
    ->select('id', 'name', 'uid')
    ->get()
    ->keyBy('id');

// Calculations for top cards
$l1Count = count($level1);
$totalTeamCount = count($allIds);

$l1StakeVol = empty($level1Ids) ? 0 : DB::table('customer_plans')->whereIn('csId', $level1Ids)->where('pstatus', '1')->sum('pamount');
$l1SubVol = empty($level1Ids) ? 0 : DB::table('customer_subs')->whereIn('csId', $level1Ids)->where('status', 'completed')->sum('sub_amount');
$totalDirectVol = $l1StakeVol + $l1SubVol;

$totalStakeVol = empty($allIds) ? 0 : DB::table('customer_plans')->whereIn('csId', $allIds)->where('pstatus', '1')->sum('pamount');
$totalSubVol = empty($allIds) ? 0 : DB::table('customer_subs')->whereIn('csId', $allIds)->where('status', 'completed')->sum('sub_amount');
$totalTeamVol = $totalStakeVol + $totalSubVol;

// Active stakers and subscribers
$activeUserIds = empty($allIds) ? [] : DB::table('customer_subs')
    ->whereIn('csId', $allIds)
    ->where('status', 'completed')
    ->where('sub_amount', '>', 0)
    ->pluck('csId')
    ->toArray();
$activeUserMap = array_flip($activeUserIds);

$l1ActiveCount = 0;
foreach ($level1 as $u) {
    if (isset($activeUserMap[$u->id])) {
        $l1ActiveCount++;
    }
}
$totalActiveCount = 0;
foreach ($allIds as $id) {
    if (isset($activeUserMap[$id])) {
        $totalActiveCount++;
    }
}

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>My Downline Referrals</title>
    <meta name="description" content="View and manage your referral network downline" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
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
        /* Base page styling to override standard background */
        body, .layout-page, .content-wrapper {
            background: #05060b !important;
        }

        /* Gold gradient styling */
        .text-gold {
            color: #ffd700 !important;
            background: linear-gradient(90deg, #ffd700, #f9a826);
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }

        .border-gold {
            border-color: rgba(249, 168, 38, 0.25) !important;
        }

        /* Premium cards with glassmorphism */
        .premium-card {
            background: linear-gradient(135deg, rgba(7, 31, 23, 0.95), rgba(12, 40, 32, 0.95)) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(249, 168, 38, 0.25) !important;
            border-radius: 20px !important;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.55) !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(249, 168, 38, 0.15) !important;
        }

        .metric-icon-box {
            background: rgba(249, 168, 38, 0.1) !important;
            border: 1px solid rgba(249, 168, 38, 0.2) !important;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .metric-icon-box i {
            font-size: 24px;
            color: #ffd700;
        }

        /* Controls Section styling */
        .controls-card {
            background: rgba(12, 40, 32, 0.6) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(249, 168, 38, 0.15) !important;
            border-radius: 15px !important;
            padding: 20px !important;
            margin-bottom: 25px !important;
        }

        /* Search input styling */
        .search-input-group {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(249, 168, 38, 0.2);
            border-radius: 30px;
            padding: 2px 15px;
            transition: all 0.3s ease;
        }

        .search-input-group:focus-within {
            border-color: #ffd700;
            box-shadow: 0 0 10px rgba(249, 168, 38, 0.25);
        }

        .search-input-group input {
            background: transparent !important;
            border: none !important;
            color: #ffffff !important;
            box-shadow: none !important;
            padding-left: 10px;
        }

        .search-input-group input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .search-input-group i {
            color: rgba(249, 168, 38, 0.6);
            font-size: 20px;
        }

        /* Filter select styling */
        .filter-select {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(249, 168, 38, 0.2) !important;
            color: #ffffff !important;
            border-radius: 30px !important;
            padding: 8px 20px !important;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            border-color: #ffd700 !important;
            box-shadow: 0 0 10px rgba(249, 168, 38, 0.25) !important;
        }

        .filter-select option {
            background: #0c2820 !important;
            color: #ffffff !important;
        }

        /* Custom pill tabs design */
        .custom-nav-pills {
            gap: 8px;
        }

        .custom-nav-pills .nav-link {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            color: rgba(255, 255, 255, 0.7) !important;
            border-radius: 30px !important;
            padding: 8px 20px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }

        .custom-nav-pills .nav-link:hover {
            background: rgba(249, 168, 38, 0.1) !important;
            border-color: rgba(249, 168, 38, 0.3) !important;
            color: #ffd700 !important;
        }

        .custom-nav-pills .nav-link.active {
            background: linear-gradient(135deg, #ffd700, #f9a826) !important;
            color: #071f17 !important;
            border-color: transparent !important;
            box-shadow: 0 4px 15px rgba(249, 168, 38, 0.3) !important;
        }

        .tab-badge {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 20px;
            margin-left: 6px;
            font-weight: 700;
        }

        .custom-nav-pills .nav-link.active .tab-badge {
            background: rgba(7, 31, 23, 0.25);
            color: #071f17;
        }

        /* Premium table design */
        .premium-table {
            margin-bottom: 0 !important;
            background: transparent !important;
            color: #ffffff !important;
            width: 100%;
            border-collapse: collapse;
        }

        .premium-table thead {
            background: rgba(255, 255, 255, 0.02) !important;
        }

        .premium-table thead th {
            border: none !important;
            border-bottom: 2px solid rgba(249, 168, 38, 0.25) !important;
            color: #ffd700 !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 11px !important;
            letter-spacing: 1.5px !important;
            padding: 18px 20px !important;
        }

        .premium-table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
            transition: background 0.25s ease;
        }

        .premium-table tbody tr:hover {
            background: rgba(249, 168, 38, 0.05) !important;
        }

        .premium-table tbody td {
            border: none !important;
            padding: 16px 20px !important;
            color: rgba(255, 255, 255, 0.95) !important;
            font-size: 13.5px !important;
            vertical-align: middle;
        }

        /* User Profile Badge */
        .user-profile-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(249, 168, 38, 0.15);
            border: 1px solid rgba(249, 168, 38, 0.3);
            color: #ffd700;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            flex-shrink: 0;
            transition: transform 0.2s ease;
        }

        .premium-table tbody tr:hover .user-avatar {
            transform: scale(1.1);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: #ffffff;
            transition: color 0.2s ease;
        }

        .premium-table tbody tr:hover .user-name {
            color: #ffd700;
        }

        .user-uid-box {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.55);
        }

        .copy-btn {
            background: transparent;
            border: none;
            color: rgba(249, 168, 38, 0.7);
            cursor: pointer;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s ease;
        }

        .copy-btn:hover {
            color: #ffd700;
        }

        /* Status Pills */
        .pill-status {
            padding: 5px 12px !important;
            border-radius: 30px !important;
            font-weight: 700 !important;
            font-size: 11px !important;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .pill-active {
            background: rgba(0, 208, 148, 0.12) !important;
            border: 1px solid rgba(0, 208, 148, 0.35) !important;
            color: #00D094 !important;
        }

        .pill-inactive {
            background: rgba(255, 107, 107, 0.12) !important;
            border: 1px solid rgba(255, 107, 107, 0.35) !important;
            color: #ff6b6b !important;
        }

        /* Level Pills */
        .badge-level {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            display: inline-block;
        }

        .badge-l1 { background: rgba(56, 189, 248, 0.12); border: 1px solid rgba(56, 189, 248, 0.35); color: #38bdf8; }
        .badge-l2 { background: rgba(215, 131, 255, 0.12); border: 1px solid rgba(215, 131, 255, 0.35); color: #d783ff; }
        .badge-l3 { background: rgba(249, 168, 38, 0.12); border: 1px solid rgba(249, 168, 38, 0.35); color: #f9a826; }
        .badge-l4 { background: rgba(16, 185, 129, 0.12); border: 1px solid rgba(16, 185, 129, 0.35); color: #10b981; }
        .badge-l5 { background: rgba(139, 92, 246, 0.12); border: 1px solid rgba(139, 92, 246, 0.35); color: #8b5cf6; }

        /* Copied tooltip display */
        .toast-copied {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: rgba(12, 40, 32, 0.95);
            border: 1px solid #ffd700;
            color: #ffd700;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: none;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* View Tree button */
        .action-link {
            color: #ffd700;
            font-weight: 600;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .action-link:hover {
            color: #f9a826;
            transform: translateX(3px);
        }
    </style>
</head>

<body>
    @include('dashboard.dcards.naver', ['r' => 'dashboard'])
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.dcards.menu', ['r' => 'my_referrals'])
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
                            <a href="/dashboard"><span class="text-muted fw-light">Dashboard /</span></a> Referrals Explorer
                        </h4>

                        <!-- Top Metric Cards -->
                        <div class="row mb-4 g-3">
                            <!-- Direct Referrals -->
                            <div class="col-md-6 col-12 mb-4">
                                <div class="card premium-card h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="card-title text-muted text-uppercase mb-0" style="font-size: 11px; letter-spacing: 0.5px; font-weight:700;">Direct Referrals (L1)</span>
                                            <div class="metric-icon-box">
                                                <i class="bx bx-user"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="mb-1 text-white" style="font-size: 26px; font-weight:700;">{{ $l1Count }}</h3>
                                            <p class="mb-0 text-success" style="font-size: 12px; font-weight: 600;">
                                                Active Subscribers: {{ $l1ActiveCount }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Direct Volume -->
                            <div class="col-md-6 col-12 mb-4">
                                <div class="card premium-card h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="card-title text-muted text-uppercase mb-0" style="font-size: 11px; letter-spacing: 0.5px; font-weight:700;">Direct Volume</span>
                                            <div class="metric-icon-box" style="background: rgba(0, 208, 148, 0.1) !important; border-color: rgba(0, 208, 148, 0.2) !important;">
                                                <i class="bx bx-trending-up" style="color: #00D094;"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="mb-1 text-white" style="font-size: 26px; font-weight:700;">
                                                {{ number_format($totalDirectVol, 2) }}
                                            </h3>
                                            <p class="mb-0 text-muted" style="font-size: 11px;">
                                                Stake: {{ number_format($l1StakeVol, 2) }} | Sub: {{ number_format($l1SubVol, 2) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Search, Filter & Tabs Card -->
                        <div class="controls-card mb-4">
                            <div class="row g-3 align-items-center justify-content-between">
                                <!-- Search bar -->
                                <div class="col-lg-4 col-md-5">
                                    <div class="search-input-group d-flex align-items-center">
                                        <i class="bx bx-search"></i>
                                        <input type="text" id="referralSearch" class="form-control" placeholder="Search name or UID..." />
                                    </div>
                                </div>

                                <!-- Filters -->
                                <div class="col-lg-4 col-md-6 d-flex gap-2 justify-content-md-end">
                                    <select id="statusFilter" class="form-select filter-select">
                                        <option value="all">All Statuses</option>
                                        <option value="active">Active Members</option>
                                        <option value="inactive">Inactive Members</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Level Tabs -->
                            <div class="mt-4 border-top pt-3 border-gold" style="display: none !important;">
                                <ul class="nav nav-pills custom-nav-pills" id="levelTabs" role="tablist">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-level="all">
                                            All Levels <span class="tab-badge" style="background: rgba(0,0,0,0.3)">{{ $totalTeamCount }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-level="1">
                                            Level 1 <span class="tab-badge badge-l1" style="color: #38bdf8; background: rgba(56, 189, 248, 0.15)">{{ $l1Count }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-level="2">
                                            Level 2 <span class="tab-badge badge-l2" style="color: #d783ff; background: rgba(215, 131, 255, 0.15)">{{ count($level2) }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-level="3">
                                            Level 3 <span class="tab-badge badge-l3" style="color: #f9a826; background: rgba(249, 168, 38, 0.15)">{{ count($level3) }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-level="4">
                                            Level 4 <span class="tab-badge badge-l4" style="color: #10b981; background: rgba(16, 185, 129, 0.15)">{{ count($level4) }}</span>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-level="5">
                                            Level 5 <span class="tab-badge badge-l5" style="color: #8b5cf6; background: rgba(139, 92, 246, 0.15)">{{ count($level5) }}</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Data Table Card -->
                        <div class="card premium-card">
                            <div class="table-responsive text-nowrap">
                                <table class="table premium-table" id="referralsTable">
                                    <thead>
                                        <tr>
                                            <th>Joined Date</th>
                                            <th>Member Info</th>
                                            <th>Level</th>
                                            <th>Sponsor (UID)</th>
                                            <th class="text-end">Staked (USDT)</th>
                                            <th class="text-end">Sub (USDT)</th>
                                            <th class="text-end">AutoPoll (USDT)</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $combinedList = [];
                                        foreach ([
                                            ['list' => $level1, 'lvl' => 1, 'badge' => 'badge-l1'],
                                            ['list' => $level2, 'lvl' => 2, 'badge' => 'badge-l2'],
                                            ['list' => $level3, 'lvl' => 3, 'badge' => 'badge-l3'],
                                            ['list' => $level4, 'lvl' => 4, 'badge' => 'badge-l4'],
                                            ['list' => $level5, 'lvl' => 5, 'badge' => 'badge-l5']
                                        ] as $group) {
                                            foreach ($group['list'] as $u) {
                                                $combinedList[] = [
                                                    'user' => $u,
                                                    'level' => $group['lvl'],
                                                    'badge' => $group['badge']
                                                ];
                                            }
                                        }

                                        // Sort all by created_at desc
                                        usort($combinedList, function($a, $b) {
                                            return strcmp($b['user']->created_at, $a['user']->created_at);
                                        });
                                        @endphp

                                        @if(empty($combinedList))
                                        <tr class="empty-row">
                                            <td colspan="9" class="text-center py-5 text-muted">
                                                No downline referral customers found. Share your referral link to build your team!
                                            </td>
                                        </tr>
                                        @else
                                            @foreach($combinedList as $item)
                                            @php
                                            $u = $item['user'];
                                            $joined = Carbon::parse($u->created_at);
                                            $daysSince = $joined->diffInDays(now());
                                            
                                            $isActive = isset($activeUserMap[$u->id]);
                                            $stakeAmount = $userStakes[$u->id] ?? 0.00;
                                            $subAmount = $userSubs[$u->id] ?? 0.00;
                                            $pollAmount = $userPolls[$u->id] ?? 0.00;
                                            $initials = strtoupper(substr($u->name ?? 'U', 0, 1));
                                            
                                            $sponsor = $u->referral ? ($sponsors[$u->referral] ?? null) : null;
                                            @endphp
                                            <tr data-level="{{ $item['level'] }}" data-status="{{ $isActive ? 'active' : 'inactive' }}" class="referral-row">
                                                <td>
                                                    <div style="font-weight: 500;">{{ $joined->format('d M Y') }}</div>
                                                    <div style="font-size: 11px; color: rgba(255,255,255,0.4)">{{ $joined->format('h:i A') }}</div>
                                                </td>
                                                <td>
                                                    <div class="user-profile-cell">
                                                        @if(!empty($u->img))
                                                            <img src="{{ $u->img }}" alt="avatar" style="width:38px; height:38px; border-radius:50%; object-fit:cover; border:1px solid rgba(249,168,38,0.3)">
                                                        @else
                                                            <div class="user-avatar">{{ $initials }}</div>
                                                        @endif
                                                        <div class="user-info">
                                                            <span class="user-name">{{ $u->name }}</span>
                                                            <div class="user-uid-box">
                                                                <span>UID: {{ $u->uid }}</span>
                                                                <button class="copy-btn" onclick="copyToClipboard('{{ $u->uid }}')" title="Copy UID">
                                                                    <i class="bx bx-copy"></i>
                                                                </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge-level {{ $item['badge'] }}">Level {{ $item['level'] }}</span>
                                                </td>
                                                <td>
                                                    @if($sponsor)
                                                        <div style="font-weight: 600;">{{ $sponsor->name }}</div>
                                                        <div style="font-size: 11px; color: rgba(255,255,255,0.5)">UID: {{ $sponsor->uid }}</div>
                                                    @else
                                                        <span style="color: rgba(255,255,255,0.35)">Direct System</span>
                                                    @endif
                                                </td>
                                                <td class="text-end fw-bold {{ $stakeAmount > 0 ? 'text-gold' : '' }}" style="{{ $stakeAmount > 0 ? '' : 'color: #ff6b6b !important;' }}">
                                                    {{ number_format($stakeAmount, 2) }}
                                                </td>
                                                <td class="text-end fw-bold {{ $subAmount > 0 ? 'text-white' : '' }}" style="{{ $subAmount > 0 ? '' : 'color: #ff6b6b !important;' }}">
                                                    {{ number_format($subAmount, 2) }}
                                                </td>
                                                <td class="text-end fw-bold" style="color: {{ $pollAmount > 0 ? '#38bdf8' : '#ff6b6b' }} !important;">
                                                    {{ number_format($pollAmount, 2) }}
                                                </td>
                                                <td class="text-center">
                                                    @if($isActive)
                                                        <span class="pill-status pill-active"><i class="bx bx-check-circle"></i> Active</span>
                                                    @else
                                                        <span class="pill-status pill-inactive">
                                                            <i class="bx bx-x-circle"></i> {{ $daysSince > 0 ? $daysSince.'d ago' : 'Inactive' }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="/dashboard/reftree/{{ $u->id }}" class="action-link" title="Explore tree placement">
                                                        <span>View Tree</span> <i class="bx bx-right-arrow-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        <tr id="noResultsRow" style="display: none;">
                                            <td colspan="9" class="text-center py-5 text-muted">
                                                No referral members match your search filters.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout container -->
        </div>
    </div>

    <!-- Copied Tooltip Toast -->
    <div id="copyToast" class="toast-copied">UID Copied to Clipboard!</div>

    <script>
        // Copy to clipboard helper
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                var toast = document.getElementById('copyToast');
                toast.style.display = 'block';
                setTimeout(function() {
                    toast.style.display = 'none';
                }, 2000);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('referralSearch');
            const statusFilter = document.getElementById('statusFilter');
            const levelButtons = document.querySelectorAll('#levelTabs button');
            const rows = document.querySelectorAll('.referral-row');
            const noResultsRow = document.getElementById('noResultsRow');

            let activeLevel = 'all';
            let activeStatus = 'all';
            let searchQuery = '';

            // Filter logic
            function filterRows() {
                let matchCount = 0;

                rows.forEach(row => {
                    const rowLevel = row.getAttribute('data-level');
                    const rowStatus = row.getAttribute('data-status');
                    const textContent = row.textContent.toLowerCase();

                    const matchesLevel = (activeLevel === 'all' || rowLevel === activeLevel);
                    const matchesStatus = (activeStatus === 'all' || rowStatus === activeStatus);
                    const matchesSearch = (searchQuery === '' || textContent.includes(searchQuery));

                    if (matchesLevel && matchesStatus && matchesSearch) {
                        row.style.display = '';
                        matchCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                if (matchCount === 0 && rows.length > 0) {
                    noResultsRow.style.display = '';
                } else {
                    noResultsRow.style.display = 'none';
                }
            }

            // Bind Search input
            searchInput.addEventListener('input', function(e) {
                searchQuery = e.target.value.toLowerCase().trim();
                filterRows();
            });

            // Bind Status filter dropdown
            statusFilter.addEventListener('change', function(e) {
                activeStatus = e.target.value;
                filterRows();
            });

            // Bind Level Tabs
            levelButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    levelButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    activeLevel = this.getAttribute('data-level');
                    filterRows();
                });
            });
        });
    </script>
</body>
</html>
