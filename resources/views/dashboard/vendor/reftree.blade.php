<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

$myintid = (int) $v->id;
$refid = $refid ?? $myintid;

// Query the database for the user by ID or UID
$refuser = DB::table('customers')
    ->where('id', $refid)
    ->orWhere('uid', $refid)
    ->first();

if (!$refuser) {
    abort(404);
}

if ($refuser->id < $myintid) {
 //   abort(404);
}

?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Binary Referral Tree</title>

    <meta name="description" content="Binary MLM referral tree view" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png" />

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
    <div class="layout-wrapper layout-content-navbar" style="background-color: #8d6900;">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.dcards.menu', ['r' => 'ref_tree'])
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page" style="background-color: transparent !important;">
                <!-- Navbar -->
                @include('dashboard.dcards.nav')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold mb-4">
                            <a href="/dashboard"><span class="text-muted fw-light">Dashboard /</span></a>
                            <span style="color: #fff;">Community Tree</span>
                        </h4>

                        @php
                        // Query binary parent for hierarchical layout up-level navigation
                        $binaryParent = null;
                        if ($refuser && $refuser->id !== $myintid) {
                        $binaryParent = DB::table('customers')
                        ->where('left', $refuser->id)
                        ->orWhere('right', $refuser->id)
                        ->first();
                        }
                        @endphp

                        @if ($refuser)
                        @php
                        // Fetch downline stats efficiently with all needed member attributes
                        $customersMap = DB::table('customers')->select('id', 'uid', 'name', 'phone', 'left', 'right', 'referral', 'created_at')->get()->keyBy('id');
                        $GLOBALS['customersMap'] = $customersMap;

                        if (!function_exists('getDownlineIds')) {
                        function getDownlineIds($startId, $customersMap = null)
                        {
                        if (!$customersMap) {
                            $customersMap = $GLOBALS['customersMap'] ?? [];
                        }
                        if (!$startId || !isset($customersMap[$startId])) {
                            if ($startId) {
                                $ids = [];
                                $queue = [$startId];
                                $visited = [$startId => true];
                                while (!empty($queue)) {
                                    $currId = array_shift($queue);
                                    $ids[] = $currId;
                                    $row = DB::table('customers')->where('id', $currId)->select('left', 'right')->first();
                                    if ($row) {
                                        if ($row->left && !isset($visited[$row->left])) {
                                            $visited[$row->left] = true;
                                            $queue[] = $row->left;
                                        }
                                        if ($row->right && !isset($visited[$row->right])) {
                                            $visited[$row->right] = true;
                                            $queue[] = $row->right;
                                        }
                                    }
                                }
                                return $ids;
                            }
                            return [];
                        }
                        $ids = [];
                        $queue = [$startId];
                        $visited = [$startId => true];
                        while (!empty($queue)) {
                        $currId = array_shift($queue);
                        $ids[] = $currId;
                        $curr = $customersMap[$currId] ?? null;
                        if ($curr) {
                        if ($curr->left && isset($customersMap[$curr->left]) && !isset($visited[$curr->left])) {
                        $visited[$curr->left] = true;
                        $queue[] = $curr->left;
                        }
                        if ($curr->right && isset($customersMap[$curr->right]) && !isset($visited[$curr->right])) {
                        $visited[$curr->right] = true;
                        $queue[] = $curr->right;
                        }
                        }
                        }
                        return $ids;
                        }
                        }

                        if (!function_exists('getAllDownlineMembers')) {
                        function getAllDownlineMembers($rootUser, $customersMap)
                        {
                        if (!$rootUser) {
                        return [];
                        }
                        $members = [];
                        $queue = [];
                        $visited = [];
                        if ($rootUser->left && isset($customersMap[$rootUser->left])) {
                            $queue[] = ['id' => $rootUser->left, 'side' => 'Left', 'level' => 1, 'parentId' => $rootUser->id];
                            $visited[$rootUser->left] = true;
                        }
                        if ($rootUser->right && isset($customersMap[$rootUser->right])) {
                            $queue[] = ['id' => $rootUser->right, 'side' => 'Right', 'level' => 1, 'parentId' => $rootUser->id];
                            $visited[$rootUser->right] = true;
                        }

                        while (!empty($queue)) {
                            $item = array_shift($queue);
                            $currId = $item['id'];
                            $curr = $customersMap[$currId] ?? null;
                            if ($curr) {
                                $members[] = [
                                    'id' => $curr->id,
                                    'uid' => $curr->uid ?? $curr->id,
                                    'name' => $curr->name ?? 'Member',
                                    'phone' => $curr->phone ?? '',
                                    'side' => $item['side'],
                                    'level' => $item['level'],
                                    'parentId' => $item['parentId'],
                                    'referral' => $curr->referral ?? null,
                                    'created_at' => $curr->created_at ?? null,
                                    'left' => $curr->left,
                                    'right' => $curr->right,
                                ];
                                if ($curr->left && isset($customersMap[$curr->left]) && !isset($visited[$curr->left])) {
                                    $visited[$curr->left] = true;
                                    $queue[] = ['id' => $curr->left, 'side' => $item['side'], 'level' => $item['level'] + 1, 'parentId' => $curr->id];
                                }
                                if ($curr->right && isset($customersMap[$curr->right]) && !isset($visited[$curr->right])) {
                                    $visited[$curr->right] = true;
                                    $queue[] = ['id' => $curr->right, 'side' => $item['side'], 'level' => $item['level'] + 1, 'parentId' => $curr->id];
                                }
                            }
                        }
                        return $members;
                        }
                        }

                        $allDownlineMembers = getAllDownlineMembers($refuser, $customersMap);
                        $maxTreeLevel = !empty($allDownlineMembers) ? max(array_column($allDownlineMembers, 'level')) : 0;
                        $leftIds = array_column(array_filter($allDownlineMembers, function($m) { return $m['side'] === 'Left'; }), 'id');
                        $rightIds = array_column(array_filter($allDownlineMembers, function($m) { return $m['side'] === 'Right'; }), 'id');
                        $leftCount = count($leftIds);
                        $rightCount = count($rightIds);

                        $allDownlineIds = array_column($allDownlineMembers, 'id');
                        $allQueriedIds = array_unique(array_merge([$refuser->id], $allDownlineIds));

                        $downlineSubs = empty($allQueriedIds) ? [] : DB::table('customer_subs')
                        ->whereIn('csId', $allQueriedIds)
                        ->groupBy('csId')
                        ->select('csId', DB::raw('SUM(sub_amount) as total'))
                        ->pluck('total', 'csId')
                        ->toArray();

                        $downlineStakes = empty($allQueriedIds) ? [] : DB::table('customer_plans')
                        ->whereIn('csId', $allQueriedIds)
                        ->where('pstatus', '1')
                        ->groupBy('csId')
                        ->select('csId', DB::raw('SUM(pamount) as total'))
                        ->pluck('total', 'csId')
                        ->toArray();

                        $GLOBALS['downlineSubs'] = $downlineSubs;
                        $GLOBALS['downlineStakes'] = $downlineStakes;

                        $leftSub = 0;
                        foreach ($leftIds as $lid) {
                        $leftSub += (float) ($downlineSubs[$lid] ?? 0);
                        }
                        $leftStake = 0;
                        foreach ($leftIds as $lid) {
                        $leftStake += (float) ($downlineStakes[$lid] ?? 0);
                        }

                        $rightSub = 0;
                        foreach ($rightIds as $rid) {
                        $rightSub += (float) ($downlineSubs[$rid] ?? 0);
                        }
                        $rightStake = 0;
                        foreach ($rightIds as $rid) {
                        $rightStake += (float) ($downlineStakes[$rid] ?? 0);
                        }

                        // Today's new subscriptions from 5 AM Indian Standard Time (IST)
                        $today5amObj = new \DateTime('today 05:00:00', new \DateTimeZone('Asia/Kolkata'));
                        $today5amObj->setTimezone(new \DateTimeZone(config('app.timezone', 'Asia/Dubai')));
                        $today5am = $today5amObj->format('Y-m-d H:i:s');
                        $leftTodaySub = $leftCount > 0 ? (float) DB::table('customer_subs')->whereIn('csId', $leftIds)->where('created_at', '>=', $today5am)->sum('sub_amount') : 0;
                        $rightTodaySub = $rightCount > 0 ? (float) DB::table('customer_subs')->whereIn('csId', $rightIds)->where('created_at', '>=', $today5am)->sum('sub_amount') : 0;
                        @endphp
                        <!-- Control Panel -->
                        <div class="tree-control-panel mb-4">
                            <div class="control-left d-flex flex-wrap align-items-center gap-2">
                                <a href="/dashboard/reftree/{{ $myintid }}" class="btn btn-primary btn-sm btn-control">
                                    <i class="bx bx-home-alt me-1"></i> My Tree
                                </a>
                                @if ($binaryParent && $binaryParent->id >= $myintid)
                                <a href="/dashboard/reftree/{{ $binaryParent->id }}" class="btn btn-secondary btn-sm btn-control">
                                    <i class="bx bx-up-arrow-alt me-1"></i> Up One Level
                                </a>
                                @endif
                                <button type="button" class="btn btn-warning btn-sm btn-control btn-view-all-tree" data-bs-toggle="modal" data-bs-target="#allTreeModal">
                                    <i class="bx bx-sitemap me-1"></i> View All Tree Under User
                                    <span class="badge bg-dark text-warning ms-1" style="font-size: 0.72rem; border-radius: 12px; font-weight: 700;">{{ number_format($leftCount + $rightCount) }}</span>
                                </button>
                            </div>

                            <!-- Search bar with frontend validation -->
                            <div class="control-search">
                                <form onsubmit="searchMember(event)" class="search-form">
                                    <div class="input-group">
                                        <input type="text" id="searchMemberId" class="form-control form-control-sm search-input" placeholder="Search Member ID or UID..." required>
                                        <button type="submit" class="btn btn-primary btn-sm search-btn">
                                            <i class="bx bx-search"></i> Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Downline Team Stats Widgets -->
                        <div class="row g-4 mb-4">
                            <!-- Left Team Stats Card -->
                            <div class="col-xl-3 col-md-6 d-flex">
                                <div class="team-stats-card left-team-card">
                                    <div class="team-stats-header">
                                        <div class="stats-icon-wrapper left-icon-bg">
                                            <img src="/tst/goldenlogo.png" style="height: 24px;">
                                        </div>
                                        <div class="stats-title-area">
                                            <h5 class="stats-heading">Left Community</h5>
                                            <span class="badge badge-left-team">{{ number_format($leftCount) }}
                                                Members</span>
                                        </div>
                                    </div>
                                    <div class="team-stats-body mt-3">
                                        <div class="stats-metric-row">
                                            <span class="metric-label">Total Sub Amount</span>
                                            <span class="metric-value">{{ number_format($leftSub, 2) }} USDT</span>
                                        </div>
                                        <div class="stats-metric-row mt-2">
                                            <span class="metric-label">Total Stake Amount</span>
                                            <span class="metric-value-accent">{{ number_format($leftStake, 2) }}
                                                USDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Left Today's New Subs Card -->
                            <div class="col-xl-3 col-md-6 d-flex">
                                <div class="team-stats-card left-team-card" style="border-top: 4px solid #f1c40f !important; background: linear-gradient(145deg, #13221a, #0c2018) !important;">
                                    <div class="team-stats-header">
                                        <div class="stats-icon-wrapper" style="background: rgba(241, 196, 15, 0.1); border: 1px solid rgba(241, 196, 15, 0.25); border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-time-five" style="font-size: 20px; color: #f1c40f;"></i>
                                        </div>
                                        <div class="stats-title-area">
                                            <h5 class="stats-heading" style="color: #f1c40f !important;">Left Today New</h5>
                                            <span class="badge" style="background: rgba(241, 196, 15, 0.15); color: #f1c40f; border: 1px solid rgba(241, 196, 15, 0.3);">Since 5 AM</span>
                                        </div>
                                    </div>
                                    <div class="team-stats-body mt-3">
                                        <div class="stats-metric-row">
                                            <span class="metric-label" style="color: rgba(255,255,255,0.7);">Today's New Subs</span>
                                            <span class="metric-value text-warning" style="font-weight: 700; font-size: 1.25rem;">{{ number_format($leftTodaySub, 2) }} USDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Team Stats Card -->
                            <div class="col-xl-3 col-md-6 d-flex">
                                <div class="team-stats-card right-team-card">
                                    <div class="team-stats-header">
                                        <div class="stats-icon-wrapper right-icon-bg">
                                            <img src="/tst/goldenlogo.png" style="height: 24px;">
                                        </div>
                                        <div class="stats-title-area">
                                            <h5 class="stats-heading">Right Community</h5>
                                            <span class="badge badge-right-team">{{ number_format($rightCount) }}
                                                Members</span>
                                        </div>
                                    </div>
                                    <div class="team-stats-body mt-3">
                                        <div class="stats-metric-row">
                                            <span class="metric-label">Total Sub Amount</span>
                                            <span class="metric-value">{{ number_format($rightSub, 2) }} USDT</span>
                                        </div>
                                        <div class="stats-metric-row mt-2">
                                            <span class="metric-label">Total Stake Amount</span>
                                            <span class="metric-value-accent">{{ number_format($rightStake, 2) }}
                                                USDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Today's New Subs Card -->
                            <div class="col-xl-3 col-md-6 d-flex">
                                <div class="team-stats-card right-team-card" style="border-top: 4px solid #f1c40f !important; background: linear-gradient(145deg, #13221a, #0c2018) !important;">
                                    <div class="team-stats-header">
                                        <div class="stats-icon-wrapper" style="background: rgba(241, 196, 15, 0.1); border: 1px solid rgba(241, 196, 15, 0.25); border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bx bx-time-five" style="font-size: 20px; color: #f1c40f;"></i>
                                        </div>
                                        <div class="stats-title-area">
                                            <h5 class="stats-heading" style="color: #f1c40f !important;">Right Today New</h5>
                                            <span class="badge" style="background: rgba(241, 196, 15, 0.15); color: #f1c40f; border: 1px solid rgba(241, 196, 15, 0.3);">Since 5 AM</span>
                                        </div>
                                    </div>
                                    <div class="team-stats-body mt-3">
                                        <div class="stats-metric-row">
                                            <span class="metric-label" style="color: rgba(255,255,255,0.7);">Today's New Subs</span>
                                            <span class="metric-value text-warning" style="font-weight: 700; font-size: 1.25rem;">{{ number_format($rightTodaySub, 2) }} USDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                        $reqDepth = request()->get('depth');
                        $fullTreeDepth = max(2, $maxTreeLevel);

                        if ($reqDepth === 'max' || $reqDepth === 'full') {
                            $treeDepth = $fullTreeDepth;
                            $isMaxSelected = true;
                        } elseif ($reqDepth !== null && is_numeric($reqDepth)) {
                            $treeDepth = max(2, (int) $reqDepth);
                            $isMaxSelected = ($treeDepth >= $fullTreeDepth && $maxTreeLevel > 2);
                        } else {
                            // Default when page opens first: only show 2 levels
                            $treeDepth = 2;
                            $isMaxSelected = false;
                        }
                        @endphp

                        <!-- Tree UI Controls Header -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <div>
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <h5 class="text-white mb-0" style="font-weight: 600; font-size: 15px; letter-spacing: 0.5px;">Referral Tree View</h5>
                                    <span class="badge badge-max-level" title="Maximum depth level in this user's downline tree">
                                        <i class="bx bx-layer me-1"></i>Max Depth: {{ $maxTreeLevel }} {{ $maxTreeLevel == 1 ? 'Level' : 'Levels' }}
                                    </span>
                                    <span class="badge badge-showing-level" title="Currently rendered tree levels">
                                        Showing: {{ $treeDepth }} {{ $treeDepth == 1 ? 'Level' : 'Levels' }}
                                    </span>
                                </div>
                                <div class="d-flex gap-2 mt-1">
                                    <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.25); text-transform: none; font-weight: 600; font-size: 11px; letter-spacing: normal; padding: 0.35rem 0.5rem;">L: {{ number_format($leftSub, 2) }} USDT</span>
                                    <span class="badge" style="background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.25); text-transform: none; font-weight: 600; font-size: 11px; letter-spacing: normal; padding: 0.35rem 0.5rem;">R: {{ number_format($rightSub, 2) }} USDT</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="tree-depth-dock">
                                    <span class="depth-title text-muted small me-1"><i class="bx bx-layer"></i> Levels:</span>
                                    <a href="{{ request()->fullUrlWithQuery(['depth' => 2]) }}" class="btn-depth {{ ($treeDepth == 2 && !$isMaxSelected) ? 'active' : '' }}">2 Levels</a>
                                    <a href="{{ request()->fullUrlWithQuery(['depth' => 3]) }}" class="btn-depth {{ ($treeDepth == 3 && !$isMaxSelected) ? 'active' : '' }}">3 Levels</a>
                                    <a href="{{ request()->fullUrlWithQuery(['depth' => 4]) }}" class="btn-depth {{ ($treeDepth == 4 && !$isMaxSelected) ? 'active' : '' }}">4 Levels</a>
                                    @if ($maxTreeLevel >= 5 && $maxTreeLevel != 5)
                                        <a href="{{ request()->fullUrlWithQuery(['depth' => 5]) }}" class="btn-depth {{ ($treeDepth == 5 && !$isMaxSelected) ? 'active' : '' }}">5 Levels</a>
                                    @endif
                                    <a href="{{ request()->fullUrlWithQuery(['depth' => 'max']) }}" class="btn-depth btn-depth-max {{ $isMaxSelected ? 'active' : '' }}" title="View all tree levels under this user">
                                        <i class="bx bx-expand-alt me-1"></i>Full Levels ({{ $maxTreeLevel > 0 ? $maxTreeLevel : 2 }} Lvls)
                                    </a>
                                </div>
                                <div class="tree-zoom-dock">
                                    <button class="btn btn-sm btn-zoom-dock" onclick="zoomTree(1.1)" title="Zoom In"><i class="bx bx-zoom-in"></i></button>
                                    <button class="btn btn-sm btn-zoom-dock" onclick="zoomTree(0.9)" title="Zoom Out"><i class="bx bx-zoom-out"></i></button>
                                    <button class="btn btn-sm btn-zoom-dock" onclick="resetZoom()" title="Reset Zoom"><i class="bx bx-refresh"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Tree Viewport Supporting Scroll and Interactive Scaling -->
                        <div class="tree-viewport">
                            <div class="tree-container" id="treeContainer">
                                @php
                                if (!function_exists('renderNewUserTree')) {
                                function renderNewUserTree($user, $currentDepth = 0, $maxDepth = 2, $parentId = null, $placementSide = null, $path = '')
                                {
                                global $customersMap, $downlineSubs, $downlineStakes;
                                $map = $customersMap ?? ($GLOBALS['customersMap'] ?? []);
                                $subsMap = $downlineSubs ?? ($GLOBALS['downlineSubs'] ?? []);
                                $stakesMap = $downlineStakes ?? ($GLOBALS['downlineStakes'] ?? []);

                                if ($user === null) {
                                // Render vacant slots up to the maximum depth
                                if ($currentDepth <= $maxDepth) {
                                    $isInner = ($path === 'I');
                                    // Only the pure-left-end and pure-right-end leaf slots are clickable
                                    $isClickable = !$isInner && ($path === 'L' || $path === 'R');
                                    $registerUrl = $isClickable ? ("/register?ref=" . theUser()->id . "&dir={$placementSide}") : 'javascript:void(0);';
                                    $targetAttr  = $isClickable ? 'target="_blank"' : '';
                                    $cursorStyle = $isClickable ? '' : 'style="cursor: not-allowed;"';
                                    $slotLabel   = $isClickable ? 'Click to Register' : 'Locked Leg';

                                    echo '<div class="tree-node-wrapper">';
                                    echo '<a href="' . $registerUrl . '" ' . $targetAttr . ' ' . $cursorStyle . ' class="tree-card-link">';
                                    echo '<div class="tree-card vacant-card">';
                                    echo '<div class="avatar-wrapper vacant-avatar">';
                                    echo ($isClickable ? '<i class="bx bx-plus"></i>' : '<i class="bx bx-lock-alt"></i>');
                                    echo '</div>';
                                    echo '<h6 class="member-name">Vacant Slot</h6>';
                                    echo '<p class="member-id">' . $slotLabel . '</p>';
                                    echo '<span class="badge badge-vacant">Open Leg</span>';
                                    echo '</div>';
                                    echo '</a>';

                                    // Recurse children for vacant slots:
                                    // For classic view, recurse up to depth 2 so standard slots show.
                                    // Beyond depth 2, do not generate empty vacant slots under vacant slots.
                                    $vacantMaxDepth = min($maxDepth, 2);
                                    if ($currentDepth < $vacantMaxDepth) {
                                        $leftPath  = ($path === '' || $path === 'L') ? 'L' : 'I';
                                        $rightPath = ($path === '' || $path === 'R') ? 'R' : 'I';
                                        echo '<div class="tree-children">';
                                        echo '<div class="tree-branch left-branch">';
                                        renderNewUserTree(null, $currentDepth + 1, $maxDepth, -1, 'left', $leftPath);
                                        echo '</div>';
                                        echo '<div class="tree-branch right-branch">';
                                        renderNewUserTree(null, $currentDepth + 1, $maxDepth, -1, 'right', $rightPath);
                                        echo '</div>';
                                        echo '</div>';
                                    }

                                    echo '</div>';
                                }
                                return;
                                }
                                // User active plan statistics with DB fallback
                                $pltot = isset($subsMap[$user->id]) ? (float) $subsMap[$user->id] : (float) DB::table('customer_subs')->where('csId', $user->id)->sum('sub_amount');
                                $stake_total = isset($stakesMap[$user->id]) ? (float) $stakesMap[$user->id] : (float) DB::table('customer_plans')->where('csId', $user->id)->where('pstatus', '1')->sum('pamount');

                                // Compute left/right downline subscription totals from preloaded map or fallback
                                $downlineLeftIds = getDownlineIds($user->left, $map);
                                $downlineRightIds = getDownlineIds($user->right, $map);
                                $downlineLeftSub = 0;
                                foreach ($downlineLeftIds as $dlId) {
                                    $downlineLeftSub += (float) ($subsMap[$dlId] ?? 0);
                                }
                                if ($downlineLeftSub == 0 && count($downlineLeftIds) > 0) {
                                    $downlineLeftSub = (float) DB::table('customer_subs')->whereIn('csId', $downlineLeftIds)->sum('sub_amount');
                                }

                                $downlineRightSub = 0;
                                foreach ($downlineRightIds as $drId) {
                                    $downlineRightSub += (float) ($subsMap[$drId] ?? 0);
                                }
                                if ($downlineRightSub == 0 && count($downlineRightIds) > 0) {
                                    $downlineRightSub = (float) DB::table('customer_subs')->whereIn('csId', $downlineRightIds)->sum('sub_amount');
                                }

                                $isActive = $pltot > 0;
                                $cardClass = $isActive ? 'active-card' : 'inactive-card';
                                $statusClass = $isActive ? 'status-active' : 'status-inactive';
                                $avatarBorder = $isActive ? 'active-avatar' : 'inactive-avatar';

                                echo '<div class="tree-node-wrapper">';
                                    echo ' <div class="tree-card-container">';
                                        echo ' <a href="/dashboard/reftree/' . $user->id . '" class="tree-card-link">';
                                            echo ' <div class="tree-card ' . $cardClass . '">';

                                                $downlineTextList = [];
                                                if ($downlineLeftSub > 0) {
                                                    $downlineTextList[] = 'L: ' . number_format($downlineLeftSub, 0) . ' USDT';
                                                }
                                                if ($downlineRightSub > 0) {
                                                    $downlineTextList[] = 'R: ' . number_format($downlineRightSub, 0) . ' USDT';
                                                }
                                                if (!empty($downlineTextList)) {
                                                    echo '<span class="badge badge-downline" style="background-color: rgba(241, 196, 15, 0.12); color: #f1c40f; border: 1px solid rgba(241, 196, 15, 0.25); text-transform: none; letter-spacing: normal; display: block; margin-bottom: 8px; font-size: 8.5px;">' . implode(' | ', $downlineTextList) . '</span>';
                                                }

                                                // Avatar picture with status halo
                                                echo ' <div class="avatar-wrapper ' . $avatarBorder . '">';
                                                    echo ' <img src="/tst/goldenlogo.png" alt="Avatar" />';
                                                    echo ' <span class="status-indicator ' . $statusClass . '"></span>';
                                                    echo ' </div>';

                                                // Name, ID, details
                                                echo ' <h6 class="member-name" style="display:none">' . htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') . '</h6>';
                                                echo ' <p class="member-name">ID ' . htmlspecialchars($user->uid, ENT_QUOTES, 'UTF-8') . ' <span onclick="copyUid(event, \'' . htmlspecialchars($user->uid, ENT_QUOTES, 'UTF-8') . '\'); event.stopPropagation(); event.preventDefault(); return false;" class="copy-uid-btn" style="cursor: pointer; margin-left: 5px; color: #ffd700; transition: color 0.2s;" onmouseover="this.style.color=\'#fff\'" onmouseout="this.style.color=\'#ffd700\'" title="Copy ID"><i class="bx bx-copy"></i></span></p>';

                                                    // Current user business volume plan total
                                                    if ($isActive) {
                                                    echo ' <span class="badge badge-active">Sub ' . number_format($pltot, 0) . ' USDT</span>';
                                                    echo '<div style="height: 10px;"></div>';
                                                    echo ' <span class="badge badge-stake">Stake ' . number_format($stake_total, 0) . ' USDT</span>';
                                                    } else {
                                                    echo ' <span class="badge badge-inactive">0 USDT</span>';
                                                    }

                                                    echo ' </div>';
                                            echo ' </a>';
                                        echo ' </div>';

                                    // Depth limited recursion for Left/Right legs with fallback
                                    if ($currentDepth < $maxDepth) {
                                        $leftUser = null;
                                        if ($user->left) {
                                            $leftUser = $map[$user->left] ?? DB::table('customers')->where('id', $user->left)->first();
                                        }
                                        $rightUser = null;
                                        if ($user->right) {
                                            $rightUser = $map[$user->right] ?? DB::table('customers')->where('id', $user->right)->first();
                                        }

                                        echo ' <div class="tree-children">';
                                            echo ' <div class="tree-branch left-branch">';
                                                renderNewUserTree($leftUser, $currentDepth + 1, $maxDepth, $user->id, 'left', ($path === '' || $path === 'L') ? 'L' : 'I');
                                                echo ' </div>';
                                            echo ' <div class="tree-branch right-branch">';
                                                renderNewUserTree($rightUser, $currentDepth + 1, $maxDepth, $user->id, 'right', ($path === '' || $path === 'R') ? 'R' : 'I');
                                                echo ' </div>';
                                            echo ' </div>';
                                        }

                                        echo '</div>';
                                }
                                }

                                // Start tree drawing
                                renderNewUserTree($refuser, 0, $treeDepth, null, null, '');
                                @endphp
                            </div>
                        </div>


                        <!-- Legend and Zoom Utility Panel -->
                        <div class="tree-utility-panel mb-4" style="margin-top: 20px;">
                            <div class="legend-container">
                                <div class="legend-item"><span class="legend-dot active-dot"></span> Active</div>
                                <div class="legend-item"><span class="legend-dot inactive-dot"></span> Inactive</div>
                                <div class="legend-item"><span class="legend-dot vacant-dot"></span> Vacant Slot</div>
                            </div>
                        </div>


                        @else
                        <!-- Not Found / Security warning -->
                        <div class="card bg-dark text-white border-warning p-5 text-center my-5 animate__animated animate__fadeIn" style="border-radius: 16px;">
                            <i class="bx bx-error-circle text-warning mb-3" style="font-size: 4rem;"></i>
                            <h4 class="text-white fw-bold">Member Not Found</h4>
                            <p class="text-muted">The searched member ID does not exist, or is not located within your
                                downline.</p>
                            <div class="mt-4">
                                <a href="/dashboard/reftree/{{ $myintid }}" class="btn btn-warning">
                                    <i class="bx bx-arrow-back me-1"></i> Back to My Tree
                                </a>
                            </div>
                        </div>
                        @endif

                        <style>
                            /* All Tree Modal & Depth Controls */
                            .btn-view-all-tree {
                                background: linear-gradient(135deg, #f5c518 0%, #e6a100 100%) !important;
                                color: #000 !important;
                                font-weight: 700 !important;
                                border: none !important;
                                box-shadow: 0 4px 15px rgba(245, 197, 24, 0.25) !important;
                            }
                            .btn-view-all-tree:hover {
                                background: linear-gradient(135deg, #ffd700 0%, #f5c518 100%) !important;
                                transform: translateY(-2px);
                                box-shadow: 0 6px 20px rgba(245, 197, 24, 0.4) !important;
                                color: #000 !important;
                            }
                            .tree-depth-dock {
                                display: flex;
                                align-items: center;
                                background: rgba(18, 18, 30, 0.8);
                                border: 1px solid rgba(255, 215, 0, 0.25);
                                border-radius: 10px;
                                padding: 4px 8px;
                                gap: 4px;
                            }
                            .btn-depth {
                                background: rgba(255, 255, 255, 0.05);
                                border: 1px solid transparent;
                                color: rgba(255, 255, 255, 0.7);
                                font-size: 0.75rem;
                                font-weight: 600;
                                padding: 4px 8px;
                                border-radius: 6px;
                                text-decoration: none;
                                transition: all 0.2s ease;
                            }
                            .btn-depth:hover {
                                color: #fff;
                                background: rgba(255, 255, 255, 0.15);
                            }
                            .btn-depth.active {
                                background: #ffd700;
                                color: #000;
                                font-weight: 700;
                            }
                            .btn-depth-max {
                                background: rgba(245, 197, 24, 0.12) !important;
                                border: 1px solid rgba(245, 197, 24, 0.35) !important;
                                color: #ffd700 !important;
                            }
                            .btn-depth-max:hover {
                                background: #ffd700 !important;
                                color: #000 !important;
                            }
                            .btn-depth-max.active {
                                background: linear-gradient(135deg, #ffd700 0%, #f5c518 100%) !important;
                                color: #000 !important;
                                font-weight: 700 !important;
                                border-color: #ffd700 !important;
                                box-shadow: 0 0 10px rgba(245, 197, 24, 0.4) !important;
                            }
                            .badge-max-level {
                                background: rgba(245, 197, 24, 0.15) !important;
                                color: #ffd700 !important;
                                border: 1px solid rgba(245, 197, 24, 0.35) !important;
                                text-transform: none !important;
                                font-weight: 700 !important;
                                font-size: 11px !important;
                                padding: 0.35rem 0.55rem !important;
                                letter-spacing: normal !important;
                            }
                            .badge-showing-level {
                                background: rgba(59, 130, 246, 0.15) !important;
                                color: #60a5fa !important;
                                border: 1px solid rgba(59, 130, 246, 0.3) !important;
                                text-transform: none !important;
                                font-weight: 600 !important;
                                font-size: 11px !important;
                                padding: 0.35rem 0.55rem !important;
                                letter-spacing: normal !important;
                            }
                            .modal-stat-card {
                                background: rgba(255, 255, 255, 0.03);
                                border: 1px solid rgba(255, 215, 0, 0.15);
                                border-radius: 12px;
                                padding: 12px 16px;
                                display: flex;
                                align-items: center;
                                gap: 12px;
                                height: 100%;
                            }
                            .stat-icon-wrap {
                                width: 42px;
                                height: 42px;
                                border-radius: 10px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 1.4rem;
                                flex-shrink: 0;
                            }
                            .stat-icon-wrap.left-icon {
                                background: rgba(16, 185, 129, 0.15);
                                color: #10b981;
                                border: 1px solid rgba(16, 185, 129, 0.3);
                            }
                            .stat-icon-wrap.right-icon {
                                background: rgba(59, 130, 246, 0.15);
                                color: #3b82f6;
                                border: 1px solid rgba(59, 130, 246, 0.3);
                            }
                            .stat-icon-wrap.total-icon {
                                background: rgba(245, 197, 24, 0.15);
                                color: #f5c518;
                                border: 1px solid rgba(245, 197, 24, 0.3);
                            }
                            .stat-label {
                                font-size: 0.72rem;
                                color: rgba(255, 255, 255, 0.6);
                                text-transform: uppercase;
                                letter-spacing: 0.5px;
                            }
                            .stat-value {
                                font-size: 1.1rem;
                                font-weight: 700;
                                color: #fff;
                            }
                            .stat-sub {
                                font-size: 0.75rem;
                                color: rgba(255, 255, 255, 0.5);
                                font-weight: normal;
                            }
                            .stat-desc {
                                font-size: 0.75rem;
                                color: rgba(255, 255, 255, 0.7);
                                margin-top: 2px;
                            }
                            .modal-search-wrap {
                                background: rgba(255, 255, 255, 0.05);
                                border: 1px solid rgba(255, 215, 0, 0.2);
                                border-radius: 8px;
                                overflow: hidden;
                            }
                            .modal-search-input {
                                background: transparent !important;
                                border: none !important;
                                color: #fff !important;
                            }
                            .modal-search-input:focus {
                                box-shadow: none !important;
                            }
                            .badge-leg-left {
                                background: rgba(16, 185, 129, 0.15) !important;
                                color: #10b981 !important;
                                border: 1px solid rgba(16, 185, 129, 0.3) !important;
                                font-weight: 600;
                                padding: 0.35rem 0.6rem;
                            }
                            .badge-leg-right {
                                background: rgba(59, 130, 246, 0.15) !important;
                                color: #60a5fa !important;
                                border: 1px solid rgba(59, 130, 246, 0.3) !important;
                                font-weight: 600;
                                padding: 0.35rem 0.6rem;
                            }
                            .badge-level {
                                background: rgba(255, 255, 255, 0.08) !important;
                                color: #e2e8f0 !important;
                                border: 1px solid rgba(255, 255, 255, 0.15) !important;
                                font-weight: 600;
                                padding: 0.35rem 0.5rem;
                            }
                            .mini-member-avatar {
                                width: 32px;
                                height: 32px;
                                border-radius: 50%;
                                border: 2px solid;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                background: rgba(0, 0, 0, 0.4);
                                flex-shrink: 0;
                            }
                            .btn-filter-leg.active {
                                background: #ffd700 !important;
                                color: #000 !important;
                                border-color: #ffd700 !important;
                                font-weight: 700;
                            }
                            .btn-filter-status.active {
                                background: #3b82f6 !important;
                                color: #fff !important;
                                border-color: #3b82f6 !important;
                                font-weight: 700;
                            }

                            /* Beautiful CSS Styles for the MLM Binary Referral Tree */
                            /* Tree Zoom Dock Above Viewport */
                            .tree-zoom-dock {
                                display: flex !important;
                                flex-direction: row !important;
                                gap: 8px !important;
                                background: rgba(18, 18, 30, 0.8) !important;
                                border: 1px solid rgba(255, 215, 0, 0.25) !important;
                                border-radius: 10px !important;
                                padding: 6px 10px !important;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3) !important;
                                backdrop-filter: blur(8px) !important;
                                -webkit-backdrop-filter: blur(8px) !important;
                            }

                            .btn-zoom-dock {
                                background: rgba(255, 255, 255, 0.08) !important;
                                border: 1px solid rgba(255, 215, 0, 0.15) !important;
                                color: #fff !important;
                                width: 32px;
                                height: 32px;
                                border-radius: 6px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                transition: all 0.2s ease;
                            }

                            .btn-zoom-dock:hover {
                                background: #ffd700 !important;
                                color: #000 !important;
                                transform: scale(1.05);
                            }

                            @media (max-width: 768px) {
                                .tree-zoom-dock {
                                    gap: 6px !important;
                                    padding: 4px 8px !important;
                                    border-radius: 8px !important;
                                }

                                .btn-zoom-dock {
                                    width: 36px !important;
                                    height: 36px !important;
                                }
                            }

                            /* Team Stats Widgets Styling */
                            .team-stats-card {
                                background: rgba(18, 18, 30, 0.75) !important;
                                backdrop-filter: blur(12px) !important;
                                -webkit-backdrop-filter: blur(12px) !important;
                                border: 1px solid rgba(255, 215, 0, 0.2) !important;
                                border-radius: 16px !important;
                                padding: 1.5rem !important;
                                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
                                transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
                                height: 100% !important;
                                width: 100% !important;
                                display: flex !important;
                                flex-direction: column !important;
                            }

                            .team-stats-card:hover {
                                transform: translateY(-3px) !important;
                                border-color: rgba(255, 215, 0, 0.4) !important;
                                box-shadow: 0 12px 40px rgba(255, 215, 0, 0.1), 0 8px 32px rgba(0, 0, 0, 0.4) !important;
                            }

                            .left-team-card {
                                border-left: 4px solid #10b981 !important;
                            }

                            .right-team-card {
                                border-left: 4px solid #10b981 !important;
                            }

                            .team-stats-header {
                                display: flex !important;
                                align-items: center !important;
                                gap: 1rem !important;
                            }

                            .stats-icon-wrapper {
                                width: 45px !important;
                                height: 45px !important;
                                border-radius: 10px !important;
                                display: flex !important;
                                align-items: center !important;
                                justify-content: center !important;
                                font-size: 1.5rem !important;
                            }

                            .left-icon-bg {
                                background: rgba(59, 130, 246, 0.15) !important;
                                color: #10b981 !important;
                                border: 1px solid rgba(59, 130, 246, 0.25) !important;
                            }

                            .right-icon-bg {
                                background: rgba(16, 185, 129, 0.15) !important;
                                color: #10b981 !important;
                                border: 1px solid rgba(16, 185, 129, 0.25) !important;
                            }

                            .stats-title-area {
                                display: flex !important;
                                flex-direction: column !important;
                            }

                            .stats-heading {
                                font-size: 1.1rem !important;
                                font-weight: 600 !important;
                                color: #fff !important;
                                margin: 0 !important;
                            }

                            .badge-left-team {
                                background: rgba(59, 130, 246, 0.2) !important;
                                color: #10b981 !important;
                                border: 1px solid rgba(59, 130, 246, 0.3) !important;
                                padding: 0.25rem 0.5rem !important;
                                font-size: 0.75rem !important;
                                border-radius: 6px !important;
                                align-self: flex-start !important;
                                margin-top: 0.25rem !important;
                            }

                            .badge-right-team {
                                background: rgba(16, 185, 129, 0.2) !important;
                                color: #34d399 !important;
                                border: 1px solid rgba(16, 185, 129, 0.3) !important;
                                padding: 0.25rem 0.5rem !important;
                                font-size: 0.75rem !important;
                                border-radius: 6px !important;
                                align-self: flex-start !important;
                                margin-top: 0.25rem !important;
                            }

                            .stats-metric-row {
                                display: flex !important;
                                justify-content: space-between !important;
                                align-items: center !important;
                                border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
                                padding-bottom: 0.5rem !important;
                            }

                            .stats-metric-row:last-child {
                                border-bottom: none !important;
                                padding-bottom: 0 !important;
                            }

                            .metric-label {
                                color: rgba(255, 255, 255, 0.6) !important;
                                font-size: 0.9rem !important;
                            }

                            .metric-value {
                                color: #fff !important;
                                font-weight: 600 !important;
                                font-size: 0.95rem !important;
                            }

                            .metric-value-accent {
                                color: #ffd700 !important;
                                font-weight: 700 !important;
                                font-size: 0.95rem !important;
                            }

                            .tree-control-panel {
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                background: rgba(18, 18, 30, 0.75);
                                backdrop-filter: blur(12px);
                                border: 1px solid rgba(255, 215, 0, 0.2);
                                padding: 1.25rem;
                                border-radius: 16px;
                                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
                                flex-wrap: wrap;
                                gap: 1rem;
                            }

                            .btn-control {
                                border-radius: 8px;
                                font-weight: 600;
                                transition: all 0.2s ease;
                                border: 1px solid transparent;
                            }

                            .btn-control:hover {
                                transform: translateY(-2px);
                            }

                            .search-form .input-group {
                                background: rgba(255, 255, 255, 0.05);
                                border-radius: 8px;
                                border: 1px solid rgba(255, 215, 0, 0.2);
                                overflow: hidden;
                            }

                            .search-input {
                                background: transparent !important;
                                border: none !important;
                                color: #fff !important;
                                padding: 0.5rem 1rem;
                            }

                            .search-input::placeholder {
                                color: rgba(255, 255, 255, 0.4);
                            }

                            .search-input:focus {
                                box-shadow: none !important;
                            }

                            .search-btn {
                                border: none !important;
                                border-radius: 0 !important;
                                background: #ffd700 !important;
                                color: #000 !important;
                                font-weight: bold;
                                transition: background-color 0.2s ease;
                            }

                            .search-btn:hover {
                                background: #e6c200 !important;
                            }

                            .tree-utility-panel {
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                background: rgba(18, 18, 30, 0.55);
                                border-radius: 12px;
                                padding: 0.75rem 1.25rem;
                                border: 1px solid rgba(255, 215, 0, 0.1);
                                flex-wrap: wrap;
                                gap: 1rem;
                            }

                            .legend-container {
                                display: flex;
                                gap: 1.5rem;
                                align-items: center;
                                flex-wrap: wrap;
                            }

                            .legend-item {
                                display: flex;
                                align-items: center;
                                font-size: 0.85rem;
                                color: rgba(255, 255, 255, 0.8);
                                font-weight: 500;
                            }

                            .legend-dot {
                                width: 10px;
                                height: 10px;
                                border-radius: 50%;
                                margin-right: 0.5rem;
                                display: inline-block;
                            }

                            .active-dot {
                                background-color: #2ecc71;
                                box-shadow: 0 0 8px #2ecc71;
                            }

                            .inactive-dot {
                                background-color: #e74c3c;
                                box-shadow: 0 0 8px #e74c3c;
                            }

                            .vacant-dot {
                                border: 1px dashed #ffd700;
                                background-color: rgba(255, 215, 0, 0.1);
                            }



                            /* Viewport layout */
                            .tree-viewport {
                                width: 100%;
                                overflow-x: auto;
                                overflow-y: hidden;
                                padding: 60px 40px;
                                background: radial-gradient(circle at center, rgba(30, 20, 5, 0.8) 0%, rgba(10, 5, 0, 0.95) 100%);
                                border-radius: 20px;
                                box-shadow: inset 0 0 60px rgba(0, 0, 0, 0.8);
                                border: 1px solid rgba(255, 215, 0, 0.15);
                                position: relative;
                                scrollbar-width: thin;
                                scrollbar-color: rgba(255, 215, 0, 0.3) rgba(0, 0, 0, 0.2);
                            }

                            .tree-viewport::-webkit-scrollbar {
                                height: 8px;
                            }

                            .tree-viewport::-webkit-scrollbar-track {
                                background: rgba(0, 0, 0, 0.2);
                                border-radius: 4px;
                            }

                            .tree-viewport::-webkit-scrollbar-thumb {
                                background: rgba(255, 215, 0, 0.3);
                                border-radius: 4px;
                            }

                            .tree-viewport::-webkit-scrollbar-thumb:hover {
                                background: rgba(255, 215, 0, 0.5);
                            }

                            .tree-container {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: flex-start;
                                min-width: max-content;
                                margin: 0 auto;
                                transform-origin: top center;
                                transition: transform 0.25s ease-out;
                            }

                            .tree-node-wrapper {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                position: relative;
                            }

                            .tree-card-container {
                                position: relative;
                                z-index: 10;
                            }

                            .tree-card-link {
                                text-decoration: none !important;
                                display: block;
                                color: inherit;
                            }

                            .tree-card {
                                background: rgba(22, 22, 35, 0.8);
                                backdrop-filter: blur(12px);
                                border-radius: 16px;
                                padding: 1.25rem 1rem;
                                width: 200px;
                                text-align: center;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
                                position: relative;
                            }

                            .tree-card:hover {
                                transform: translateY(-5px);
                            }

                            .active-card {
                                border: 1px solid rgba(46, 204, 113, 0.45);
                                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4), 0 0 15px rgba(46, 204, 113, 0.05);
                            }

                            .active-card:hover {
                                box-shadow: 0 12px 30px rgba(46, 204, 113, 0.3), 0 0 20px rgba(46, 204, 113, 0.2);
                                border-color: rgba(46, 204, 113, 0.8);
                            }

                            .inactive-card {
                                border: 1px solid rgba(231, 76, 60, 0.45);
                                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4), 0 0 15px rgba(231, 76, 60, 0.05);
                            }

                            .inactive-card:hover {
                                box-shadow: 0 12px 30px rgba(231, 76, 60, 0.3), 0 0 20px rgba(231, 76, 60, 0.2);
                                border-color: rgba(231, 76, 60, 0.8);
                            }

                            .vacant-card {
                                border: 2px dashed rgba(255, 215, 0, 0.25);
                                background: rgba(255, 215, 0, 0.02);
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                            }

                            .vacant-card:hover {
                                border-color: #ffd700;
                                background: rgba(255, 215, 0, 0.08);
                                box-shadow: 0 8px 25px rgba(255, 215, 0, 0.2);
                                transform: translateY(-5px) scale(1.03);
                            }

                            .avatar-wrapper {
                                position: relative;
                                width: 54px;
                                height: 54px;
                                border-radius: 50%;
                                margin-bottom: 0.75rem;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                background: rgba(255, 255, 255, 0.05);
                                overflow: visible;
                            }

                            .avatar-wrapper img {
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                border-radius: 50%;
                            }

                            .active-avatar {
                                border: 2px solid #2ecc71;
                                box-shadow: 0 0 10px rgba(46, 204, 113, 0.3);
                            }

                            .inactive-avatar {
                                border: 2px solid #e74c3c;
                                box-shadow: 0 0 10px rgba(231, 76, 60, 0.3);
                            }

                            .vacant-avatar {
                                border: 2px dashed rgba(255, 215, 0, 0.4);
                                background: rgba(255, 215, 0, 0.1);
                                color: #ffd700;
                                font-size: 1.5rem;
                                transition: all 0.3s ease;
                            }

                            .vacant-card:hover .vacant-avatar {
                                background: #ffd700;
                                color: #000;
                                border-style: solid;
                                box-shadow: 0 0 12px rgba(255, 215, 0, 0.5);
                            }

                            .status-indicator {
                                position: absolute;
                                bottom: 0;
                                right: 0;
                                width: 12px;
                                height: 12px;
                                border-radius: 50%;
                                border: 2px solid rgba(22, 22, 35, 1);
                            }

                            .status-active {
                                background-color: #2ecc71;
                                box-shadow: 0 0 6px #2ecc71;
                            }

                            .status-inactive {
                                background-color: #e74c3c;
                            }

                            .member-name {
                                font-size: 0.95rem;
                                font-weight: 700;
                                color: #fff;
                                margin: 0 0 0.15rem 0 !important;
                                max-width: 180px;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            }

                            .member-id {
                                font-size: 0.75rem;
                                color: rgba(255, 255, 255, 0.5);
                                margin: 0 0 0.4rem 0 !important;
                            }

                            .member-phone {
                                font-size: 0.75rem;
                                color: #ffd700;
                                margin: 0 0 0.5rem 0 !important;
                                display: flex;
                                align-items: center;
                                gap: 0.25rem;
                                text-decoration: none;
                            }

                            .member-phone i {
                                font-size: 0.85rem;
                            }

                            .badge {
                                padding: 0.35em 0.65em;
                                font-size: 0.72rem;
                                font-weight: 700;
                                border-radius: 6px;
                                text-transform: uppercase;
                                letter-spacing: 0.03em;
                            }

                            .badge-active {
                                background-color: rgba(46, 204, 113, 0.15);
                                color: #2ecc71;
                                border: 1px solid rgba(46, 204, 113, 0.3);
                            }

                            .badge-stake {
                                background-color: rgba(52, 152, 219, 0.15);
                                color: #3498db;
                                border: 1px solid rgba(52, 152, 219, 0.3);
                            }

                            .badge-inactive {
                                background-color: rgba(231, 76, 60, 0.15);
                                color: #e74c3c;
                                border: 1px solid rgba(231, 76, 60, 0.3);
                            }

                            .badge-vacant {
                                background-color: rgba(255, 215, 0, 0.1);
                                color: #ffd700;
                                border: 1px solid rgba(255, 215, 0, 0.25);
                            }

                            /* Flexible tree connectors CSS */
                            .tree-children {
                                display: flex;
                                flex-direction: row;
                                justify-content: center;
                                align-items: flex-start;
                                position: relative;
                                padding-top: 30px;
                            }

                            /* Parent branch vertical connector */
                            .tree-node-wrapper:not(:only-child)>.tree-card-container::after {
                                content: '';
                                position: absolute;
                                bottom: -30px;
                                left: 50%;
                                transform: translateX(-50%);
                                width: 2px;
                                height: 30px;
                                background: linear-gradient(to bottom, #ffd700, #b8860b);
                                z-index: 1;
                                box-shadow: 0 0 8px rgba(255, 215, 0, 0.4);
                            }

                            /* Sibling node branches styling */
                            .tree-branch {
                                position: relative;
                                padding: 0 25px;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                            }

                            /* Child vertical connector */
                            .tree-branch::before {
                                content: '';
                                position: absolute;
                                top: -30px;
                                left: 50%;
                                width: 2px;
                                height: 30px;
                                background: #b8860b;
                                z-index: 1;
                            }

                            /* Horizontal left leg sibling linker */
                            .tree-branch.left-branch::after {
                                content: '';
                                position: absolute;
                                top: -30px;
                                right: 0;
                                left: 50%;
                                height: 2px;
                                background: linear-gradient(to right, #b8860b, #ffd700);
                                z-index: 1;
                                box-shadow: 0 0 6px rgba(255, 215, 0, 0.3);
                            }

                            /* Horizontal right leg sibling linker */
                            .tree-branch.right-branch::after {
                                content: '';
                                position: absolute;
                                top: -30px;
                                left: 0;
                                right: 50%;
                                height: 2px;
                                background: linear-gradient(to right, #ffd700, #b8860b);
                                z-index: 1;
                                box-shadow: 0 0 6px rgba(255, 215, 0, 0.3);
                            }

                            /* UI Responsive Rules */
                            @media (max-width: 991px) {
                                .tree-control-panel {
                                    flex-direction: column;
                                    align-items: stretch;
                                }

                                .control-left {
                                    display: flex;
                                    gap: 0.5rem;
                                }

                                .btn-control {
                                    flex: 1;
                                    text-align: center;
                                }

                                .tree-utility-panel {
                                    flex-direction: column;
                                    align-items: stretch;
                                }

                                .legend-container {
                                    justify-content: center;
                                }

                                .zoom-controls {
                                    justify-content: center;
                                }
                            }

                            @media (max-width: 768px) {
                                .tree-viewport {
                                    padding: 40px 15px;
                                }

                                .tree-card {
                                    width: 150px;
                                    padding: 1rem 0.75rem;
                                }

                                .avatar-wrapper {
                                    width: 44px;
                                    height: 44px;
                                }

                                .member-name {
                                    font-size: 0.85rem;
                                    max-width: 130px;
                                }

                                .member-id {
                                    font-size: 0.7rem;
                                }

                                .member-phone {
                                    font-size: 0.7rem;
                                }

                                .badge {
                                    font-size: 0.65rem;
                                }

                                .tree-children {
                                    padding-top: 25px;
                                }

                                .tree-branch {
                                    padding: 0 12px;
                                }

                                .tree-branch::before,
                                .tree-branch.left-branch::after,
                                .tree-branch.right-branch::after {
                                        {
                                            {
                                            -- top: -25px;
                                            height: 25px;
                                            --
                                        }
                                    }
                                }

                                .tree-node-wrapper:not(:only-child)>.tree-card-container::after {
                                    bottom: -25px;
                                    height: 25px;
                                }
                            }

                            @media (max-width: 480px) {
                                .tree-card {
                                    width: 120px;
                                    padding: 0.75rem 0.5rem;
                                }

                                .avatar-wrapper {
                                    width: 36px;
                                    height: 36px;
                                    margin-bottom: 0.5rem;
                                }

                                .member-name {
                                    font-size: 0.75rem;
                                    max-width: 100px;
                                }

                                .member-id {
                                    font-size: 0.65rem;
                                    margin-bottom: 0.2rem !important;
                                }

                                .member-phone {
                                    display: none;
                                }

                                .badge {
                                    font-size: 0.6rem;
                                    padding: 0.2em 0.4em;
                                }
                            }

                        </style>

                        <div style="height: 100px;"></div>
                        <hr class="my-5" />

                        <!-- All Tree Under User Modal -->
                        <div class="modal fade" id="allTreeModal" tabindex="-1" aria-labelledby="allTreeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content" style="background: linear-gradient(145deg, #131322, #0c0c18); border: 1px solid rgba(255, 215, 0, 0.25); border-radius: 18px; color: #fff; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7);">
                                    <div class="modal-header border-0 pb-0" style="padding: 1.5rem 1.75rem 0.75rem;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="stats-icon-wrapper" style="background: rgba(255, 215, 0, 0.15); border: 1px solid rgba(255, 215, 0, 0.3); border-radius: 12px; width: 44px; height: 44px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bx bx-sitemap" style="color: #ffd700; font-size: 1.5rem;"></i>
                                            </div>
                                            <div>
                                                <h5 class="modal-title text-white fw-bold mb-0" id="allTreeModalLabel">
                                                    All Tree Members Under {{ $refuser->name }}
                                                </h5>
                                                <div class="text-muted small mt-1">
                                                    UID: <strong class="text-warning">{{ $refuser->uid ?? $refuser->id }}</strong> &bull; Total <strong class="text-white">{{ number_format($leftCount + $rightCount) }}</strong> members &bull; Max Depth: <strong class="text-warning">{{ $maxTreeLevel }} {{ $maxTreeLevel == 1 ? 'Level' : 'Levels' }}</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body" style="padding: 1.25rem 1.75rem;">
                                        <!-- Top Summary Stat Cards -->
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="modal-stat-card">
                                                    <div class="stat-icon-wrap left-icon"><i class="bx bx-left-arrow-circle"></i></div>
                                                    <div>
                                                        <div class="stat-label">Left Community</div>
                                                        <div class="stat-value">{{ number_format($leftCount) }} <span class="stat-sub">Members</span></div>
                                                        <div class="stat-desc">Sub: <strong class="text-success">{{ number_format($leftSub, 2) }} USDT</strong> | Stake: <strong class="text-warning">{{ number_format($leftStake, 2) }} USDT</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="modal-stat-card">
                                                    <div class="stat-icon-wrap right-icon"><i class="bx bx-right-arrow-circle"></i></div>
                                                    <div>
                                                        <div class="stat-label">Right Community</div>
                                                        <div class="stat-value">{{ number_format($rightCount) }} <span class="stat-sub">Members</span></div>
                                                        <div class="stat-desc">Sub: <strong class="text-success">{{ number_format($rightSub, 2) }} USDT</strong> | Stake: <strong class="text-warning">{{ number_format($rightStake, 2) }} USDT</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="modal-stat-card">
                                                    <div class="stat-icon-wrap total-icon"><i class="bx bx-group"></i></div>
                                                    <div>
                                                        <div class="stat-label">Total Downline Business</div>
                                                        <div class="stat-value text-warning">{{ number_format($leftSub + $rightSub + $leftStake + $rightStake, 2) }} <span class="stat-sub">USDT</span></div>
                                                        <div class="stat-desc">Total Sub: <strong class="text-white">{{ number_format($leftSub + $rightSub, 2) }} USDT</strong> | Stake: <strong class="text-white">{{ number_format($leftStake + $rightStake, 2) }} USDT</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter and Search Toolbar -->
                                        <div class="p-3 mb-3" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06); border-radius: 12px;">
                                            <div class="row g-2 align-items-center">
                                                <div class="col-lg-4 col-md-5">
                                                    <div class="input-group input-group-sm modal-search-wrap">
                                                        <span class="input-group-text bg-transparent border-0 text-warning"><i class="bx bx-search"></i></span>
                                                        <input type="text" id="allTreeSearchInput" class="form-control form-control-sm modal-search-input" placeholder="Search by UID or Name..." oninput="filterAllTreeTable()">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary text-white border-0" onclick="clearTreeSearch()" title="Clear Search"><i class="bx bx-x"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-7 d-flex justify-content-md-end flex-wrap align-items-center gap-2">
                                                    <!-- Leg Filter -->
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-warning btn-filter-leg active" data-leg="all" onclick="filterLeg('all', this)">All Legs ({{ $leftCount + $rightCount }})</button>
                                                        <button type="button" class="btn btn-outline-warning btn-filter-leg" data-leg="Left" onclick="filterLeg('Left', this)"><i class="bx bx-left-arrow-alt"></i> Left ({{ $leftCount }})</button>
                                                        <button type="button" class="btn btn-outline-warning btn-filter-leg" data-leg="Right" onclick="filterLeg('Right', this)"><i class="bx bx-right-arrow-alt"></i> Right ({{ $rightCount }})</button>
                                                    </div>
                                                    <!-- Status Filter -->
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-secondary text-white btn-filter-status active" data-status="all" onclick="filterStatus('all', this)">All</button>
                                                        <button type="button" class="btn btn-outline-secondary text-white btn-filter-status" data-status="active" onclick="filterStatus('active', this)">Active</button>
                                                        <button type="button" class="btn btn-outline-secondary text-white btn-filter-status" data-status="inactive" onclick="filterStatus('inactive', this)">Inactive</button>
                                                    </div>
                                                    <!-- Level Filter Dropdown -->
                                                    @if ($maxTreeLevel > 1)
                                                    <select id="treeLevelFilterSelect" class="form-select form-select-sm" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 215, 0, 0.25); color: #fff; width: auto; font-size: 0.78rem; border-radius: 6px; padding: 0.25rem 0.6rem;" onchange="filterLevel(this.value)">
                                                        <option value="all" style="background: #16162a; color: #fff;">All Levels (Max {{ $maxTreeLevel }})</option>
                                                        @for($lvl = 1; $lvl <= $maxTreeLevel; $lvl++)
                                                            <option value="{{ $lvl }}" style="background: #16162a; color: #fff;">Level {{ $lvl }}</option>
                                                        @endfor
                                                    </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2 small text-muted">
                                                <span>Showing <strong id="visibleTreeCount" class="text-warning">{{ count($allDownlineMembers) }}</strong> of {{ count($allDownlineMembers) }} downline members</span>
                                                <span><i class="bx bx-info-circle me-1"></i>Click "View in Tree" to center the diagram on any member</span>
                                            </div>
                                        </div>

                                        <!-- Members Table -->
                                        <div class="table-responsive" style="max-height: 520px; overflow-y: auto; border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px;">
                                            <table class="table table-dark table-hover align-middle mb-0" id="allTreeMembersTable" style="background: transparent;">
                                                <thead style="position: sticky; top: 0; z-index: 10; background: #16162a; border-bottom: 2px solid rgba(255, 215, 0, 0.2);">
                                                    <tr style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.5px; color: rgba(255, 255, 255, 0.7);">
                                                        <th style="width: 50px;" class="ps-3">#</th>
                                                        <th>Member</th>
                                                        <th>Community Leg</th>
                                                        <th>Level</th>
                                                        <th>Direct Sponsor</th>
                                                        <th>Subscription</th>
                                                        <th>Staking</th>
                                                        <th>Status</th>
                                                        <th>Joined</th>
                                                        <th class="text-end pe-3">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($allDownlineMembers as $index => $m)
                                                        @php
                                                        $mSub = (float) ($downlineSubs[$m['id']] ?? 0);
                                                        $mStake = (float) ($downlineStakes[$m['id']] ?? 0);
                                                        $isActive = $mSub > 0;
                                                        $sponsor = isset($customersMap[$m['referral']]) ? $customersMap[$m['referral']] : null;
                                                        @endphp
                                                        <tr class="alltree-row" data-side="{{ $m['side'] }}" data-status="{{ $isActive ? 'active' : 'inactive' }}" data-level="{{ $m['level'] }}" data-search="{{ strtolower($m['uid'] . ' ' . $m['name']) }}" style="border-bottom: 1px solid rgba(255, 255, 255, 0.04);">
                                                            <td class="text-muted ps-3">{{ $index + 1 }}</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <div class="mini-member-avatar {{ $isActive ? 'border-success' : 'border-danger' }}">
                                                                        <img src="/tst/goldenlogo.png" alt="" style="height: 18px;">
                                                                    </div>
                                                                    <div>
                                                                        <div class="fw-bold text-white">{{ $m['name'] }}</div>
                                                                        <div class="text-muted small">ID: <span class="text-warning">{{ $m['uid'] }}</span>
                                                                            <span onclick="copyUid(event, '{{ $m['uid'] }}')" class="copy-icon" title="Copy UID" style="cursor: pointer; color: #ffd700; margin-left: 4px;"><i class="bx bx-copy"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if ($m['side'] === 'Left')
                                                                    <span class="badge badge-leg-left"><i class="bx bx-left-arrow-alt me-1"></i>Left Leg</span>
                                                                @else
                                                                    <span class="badge badge-leg-right"><i class="bx bx-right-arrow-alt me-1"></i>Right Leg</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-level">Level {{ $m['level'] }}</span>
                                                            </td>
                                                            <td>
                                                                @if ($sponsor)
                                                                    <div class="text-white small fw-semibold">{{ $sponsor->name }}</div>
                                                                    <div class="text-muted small">UID: {{ $sponsor->uid }}</div>
                                                                @else
                                                                    <span class="text-muted small">-</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($mSub > 0)
                                                                    <span class="text-success fw-bold">{{ number_format($mSub, 2) }} USDT</span>
                                                                @else
                                                                    <span class="text-muted small">0.00 USDT</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($mStake > 0)
                                                                    <span class="text-warning fw-bold">{{ number_format($mStake, 2) }} USDT</span>
                                                                @else
                                                                    <span class="text-muted small">0.00 USDT</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($isActive)
                                                                    <span class="badge" style="background: rgba(46, 204, 113, 0.15); color: #2ecc71; border: 1px solid rgba(46, 204, 113, 0.3);"><i class="bx bx-check-circle me-1"></i>Active</span>
                                                                @else
                                                                    <span class="badge" style="background: rgba(231, 76, 60, 0.15); color: #e74c3c; border: 1px solid rgba(231, 76, 60, 0.3);"><i class="bx bx-x-circle me-1"></i>Inactive</span>
                                                                @endif
                                                            </td>
                                                            <td class="text-muted small">
                                                                {{ $m['created_at'] ? date('M d, Y', strtotime($m['created_at'])) : '-' }}
                                                            </td>
                                                            <td class="text-end pe-3">
                                                                <a href="/dashboard/reftree/{{ $m['id'] }}" class="btn btn-xs btn-outline-warning" title="Center tree on this member" style="font-size: 0.75rem; padding: 4px 10px; border-radius: 6px;">
                                                                    <i class="bx bx-git-repo-forked me-1"></i> View in Tree
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr id="noDownlineRow">
                                                            <td colspan="10" class="text-center py-5">
                                                                <div class="py-4">
                                                                    <i class="bx bx-sitemap text-warning" style="font-size: 3.5rem;"></i>
                                                                    <h6 class="text-white mt-3 fw-bold">No Downline Tree Members Found</h6>
                                                                    <p class="text-muted small mb-0">This user does not have any members placed in their left or right community tree yet.</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    <tr id="noFilterMatchRow" style="display: none;">
                                                        <td colspan="10" class="text-center py-5 text-muted">
                                                            <i class="bx bx-search-alt-2 fs-1 text-warning d-block mb-2"></i>
                                                            No members match your search or filter criteria.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="modal-footer border-0 pt-0" style="padding: 0.75rem 1.75rem 1.5rem;">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <a href="/dashboard/reftree/{{ $refuser->id }}" class="btn btn-warning btn-sm">
                                            <i class="bx bx-refresh me-1"></i> Refresh Tree
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        @include('dashboard.dcards.footer')
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- / Layout wrapper -->


                </div>
            </div>
        </div>
    </div>

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

    <!-- Page JS -->
    <script>
        // Interactive zoom state manager
        let currentZoom = 1.0;

        function zoomTree(factor) {
            const container = document.getElementById('treeContainer');
            if (!container) return;

            if (factor > 1 && currentZoom < 1.5) {
                currentZoom = Math.min(1.5, currentZoom + 0.1);
            } else if (factor < 1 && currentZoom > 0.5) {
                currentZoom = Math.max(0.5, currentZoom - 0.1);
            }
            applyZoom();
        }

        function resetZoom() {
            currentZoom = 1.0;
            applyZoom();
        }

        function applyZoom() {
            const container = document.getElementById('treeContainer');
            if (container) {
                container.style.transform = `scale(${currentZoom})`;
            }
        }

        // Frontend validation and navigation check for search requests
        function searchMember(event) {
            event.preventDefault();
            const input = document.getElementById('searchMemberId');
            const searchVal = input.value.trim();

            if (!searchVal) {
                alert('Please enter a valid Member ID or UID.');
                return;
            }

            if (/^\d+$/.test(searchVal)) {
                const searchId = parseInt(searchVal, 10);
                const myId = {{ $myintid }};
                if (searchId < myId) {
                    alert(`You can only search for members within your downline (ID must be ${myId} or higher).`);
                    return;
                }
            }

            window.location.href = `/dashboard/reftree/${searchVal}`;
        }

        // Copy User ID utility with propagation stop and HTTP clipboard fallback
        function copyUid(event, uid) {
            event.preventDefault();
            event.stopPropagation();

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(uid)
                    .then(function() {
                        alert('User ID ' + uid + ' copied to clipboard!');
                    })
                    .catch(function(error) {
                        fallbackCopyUid(uid);
                    });
            } else {
                fallbackCopyUid(uid);
            }
        }

        function fallbackCopyUid(text) {
            try {
                const textArea = document.createElement("textarea");
                textArea.value = text;
                textArea.style.position = "fixed";
                textArea.style.top = "0";
                textArea.style.left = "0";
                textArea.style.width = "2em";
                textArea.style.height = "2em";
                textArea.style.padding = "0";
                textArea.style.border = "none";
                textArea.style.outline = "none";
                textArea.style.boxShadow = "none";
                textArea.style.background = "transparent";
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                const successful = document.execCommand('copy');
                document.body.removeChild(textArea);
                if (successful) {
                    alert('User ID ' + text + ' copied to clipboard!');
                } else {
                    alert('Failed to copy User ID.');
                }
            } catch (err) {
                alert('Failed to copy User ID: ' + err);
            }
        }

        // Simple drag scroll for the tree viewport
        const slider = document.querySelector('.tree-viewport');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1.5; // Scroll speed scaling
            slider.scrollLeft = scrollLeft - walk;
        });

        // Filter functionality for All Tree Modal
        let currentLegFilter = 'all';
        let currentStatusFilter = 'all';
        let currentLevelFilter = 'all';

        function filterAllTreeTable() {
            const searchVal = (document.getElementById('allTreeSearchInput')?.value || '').toLowerCase().trim();
            const rows = document.querySelectorAll('.alltree-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const rowSearch = row.getAttribute('data-search') || '';
                const rowSide = row.getAttribute('data-side') || '';
                const rowStatus = row.getAttribute('data-status') || '';
                const rowLevel = row.getAttribute('data-level') || '';

                const matchesSearch = !searchVal || rowSearch.includes(searchVal);
                const matchesLeg = currentLegFilter === 'all' || rowSide === currentLegFilter;
                const matchesStatus = currentStatusFilter === 'all' || rowStatus === currentStatusFilter;
                const matchesLevel = currentLevelFilter === 'all' || rowLevel === currentLevelFilter;

                if (matchesSearch && matchesLeg && matchesStatus && matchesLevel) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            const countDisplay = document.getElementById('visibleTreeCount');
            if (countDisplay) {
                countDisplay.innerText = visibleCount;
            }

            const noMatchRow = document.getElementById('noFilterMatchRow');
            if (noMatchRow) {
                noMatchRow.style.display = (visibleCount === 0 && rows.length > 0) ? '' : 'none';
            }
        }

        function filterLeg(leg, btn) {
            currentLegFilter = leg;
            document.querySelectorAll('.btn-filter-leg').forEach(b => b.classList.remove('active'));
            if (btn) btn.classList.add('active');
            filterAllTreeTable();
        }

        function filterStatus(status, btn) {
            currentStatusFilter = status;
            document.querySelectorAll('.btn-filter-status').forEach(b => b.classList.remove('active'));
            if (btn) btn.classList.add('active');
            filterAllTreeTable();
        }

        function filterLevel(level) {
            currentLevelFilter = level;
            filterAllTreeTable();
        }

        function clearTreeSearch() {
            const input = document.getElementById('allTreeSearchInput');
            if (input) {
                input.value = '';
                filterAllTreeTable();
            }
        }

    </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
