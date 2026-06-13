<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

$myintid = (int) $v->id;
$refintid = (int) $refid;

if ($refintid < $myintid) {
    abort(404);
}

?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Binary Referral Tree</title>

    <meta name="description" content="Binary MLM referral tree view" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

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
                            <span class="text-muted fw-light">Dashboard /</span>
                            <span style="color: #fff;">Community Tree</span>
                        </h4>

                        @php
                        $refuser = DB::table('customers')->where('id', $refid)->first();

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
                        <!-- Control Panel -->
                        <div class="tree-control-panel mb-4">
                            <div class="control-left">
                                <a href="/dashboard/reftree/{{ $myintid }}" class="btn btn-primary btn-sm btn-control">
                                    <i class="bx bx-home-alt me-1"></i> My Tree
                                </a>
                                @if ($binaryParent && $binaryParent->id >= $myintid)
                                <a href="/dashboard/reftree/{{ $binaryParent->id }}" class="btn btn-secondary btn-sm btn-control">
                                    <i class="bx bx-up-arrow-alt me-1"></i> Up One Level
                                </a>
                                @endif
                            </div>

                            <!-- Search bar with frontend validation -->
                            <div class="control-search">
                                <form onsubmit="searchMember(event)" class="search-form">
                                    <div class="input-group">
                                        <input type="number" id="searchMemberId" class="form-control form-control-sm search-input" placeholder="Search Member ID..." required min="{{ $myintid }}">
                                        <button type="submit" class="btn btn-primary btn-sm search-btn">
                                            <i class="bx bx-search"></i> Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Legend and Zoom Utility Panel -->
                        <div class="tree-utility-panel mb-4">
                            <div class="legend-container">
                                <div class="legend-item"><span class="legend-dot active-dot"></span> Active (Plan > 0)</div>
                                <div class="legend-item"><span class="legend-dot inactive-dot"></span> Inactive (Plan = 0)</div>
                                <div class="legend-item"><span class="legend-dot vacant-dot"></span> Vacant Slot</div>
                            </div>
                            <div class="zoom-controls">
                                <button class="btn btn-sm btn-zoom" onclick="zoomTree(1.1)" title="Zoom In"><i class="bx bx-zoom-in"></i></button>
                                <button class="btn btn-sm btn-zoom" onclick="zoomTree(0.9)" title="Zoom Out"><i class="bx bx-zoom-out"></i></button>
                                <button class="btn btn-sm btn-zoom" onclick="resetZoom()" title="Reset Zoom"><i class="bx bx-refresh"></i></button>
                            </div>
                        </div>

                        <!-- Tree Viewport Supporting Scroll and Interactive Scaling -->
                        <div class="tree-viewport">
                            <div class="tree-container" id="treeContainer">
                                @php
                                 if (!function_exists('renderNewUserTree')) {
                                function renderNewUserTree($user, $currentDepth = 0, $maxDepth = 2, $parentId = null, $placementSide = null, $path = '')
                                {
                                if ($user === null) {
                                // Render vacant slots up to the maximum depth display
                                if ($currentDepth <= $maxDepth && $parentId !==null && $placementSide !==null) {
                                    $isInner = ($path === 'I');
                                    $registerUrl = $isInner ? 'javascript:void(0);' : ("/register?ref=" . theUser()->id . "&dir={$placementSide}");
                                    $targetAttr = $isInner ? '' : 'target="_blank"';
                                    $cursorStyle = $isInner ? 'style="cursor: not-allowed;"' : '';
                                    echo '<div class="tree-node-wrapper">';
                                        echo ' <a href="' . $registerUrl . '" ' . $targetAttr . ' ' . $cursorStyle . ' class="tree-card-link">';
                                            echo ' <div class="tree-card vacant-card">';
                                                echo ' <div class="avatar-wrapper vacant-avatar">';
                                                    echo ' <i class="bx bx-plus"></i>';
                                                    echo ' </div>';
                                                echo ' <h6 class="member-name">Vacant Slot</h6>';
                                                echo ' <p class="member-id">' . ($isInner ? 'Locked Leg' : 'Click to Register') . '</p>';
                                                echo ' <span class="badge badge-vacant">Open Leg</span>';
                                                echo ' </div>';
                                            echo ' </a>';
                                        echo '</div>';
                                    }
                                    return;
                                    }

                                    // Fetch user active plan statistics
                                    $pltot = DB::table('customer_subs')
                                    ->where('csId', $user->id)
                                    ->sum('sub_amount');
                                    $stake_total = DB::table('customer_plans')
                                    ->where('csId', $user->id)
                                    ->sum('pamount');

                                    $isActive = $pltot > 0;
                                    $cardClass = $isActive ? 'active-card' : 'inactive-card';
                                    $statusClass = $isActive ? 'status-active' : 'status-inactive';
                                    $avatarBorder = $isActive ? 'active-avatar' : 'inactive-avatar';

                                    echo '<div class="tree-node-wrapper">';
                                        echo ' <div class="tree-card-container">';
                                            echo ' <a href="/dashboard/reftree/' . $user->id . '" class="tree-card-link">';
                                                echo ' <div class="tree-card ' . $cardClass . '">';

                                                    // Avatar picture with status halo
                                                    echo ' <div class="avatar-wrapper ' . $avatarBorder . '">';
                                                        echo ' <img src="/images/icons/profile.webp" alt="Avatar" />';
                                                        echo ' <span class="status-indicator ' . $statusClass . '"></span>';
                                                        echo ' </div>';

                                                    // Name, ID, Phone details
                                                    echo ' <h6 class="member-name" style="display:none">' . htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') . '</h6>';
                                                    echo ' <p class="member-name">ID ' . htmlspecialchars($user->uid, ENT_QUOTES, 'UTF-8') . ' <span onclick="copyUid(event, \'' . htmlspecialchars($user->uid, ENT_QUOTES, 'UTF-8') . '\'); event.stopPropagation(); event.preventDefault(); return false;" class="copy-uid-btn" style="cursor: pointer; margin-left: 5px; color: #ffd700; transition: color 0.2s;" onmouseover="this.style.color=\'#fff\'" onmouseout="this.style.color=\'#ffd700\'" title="Copy ID"><i class="bx bx-copy"></i></span></p>';

                                                    if ($currentDepth <= 1 && !empty($user->phone)) {
                                                        echo ' <p class="member-phone"><i class="bx bx-phone"></i> ' . htmlspecialchars($user->phone, ENT_QUOTES, 'UTF-8') . '</p>';
                                                        }

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

                                        // Depth limited recursion for Left/Right legs
                                        if ($currentDepth < $maxDepth) { $leftUser=$user->left ? DB::table('customers')->where('id', $user->left)->first() : null;
                                            $rightUser = $user->right ? DB::table('customers')->where('id', $user->right)->first() : null;

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
                                    renderNewUserTree($refuser, 0, 2, null, null, '');
                                    @endphp
                            </div>
                        </div>
                        @else
                        <!-- Not Found / Security warning -->
                        <div class="card bg-dark text-white border-warning p-5 text-center my-5 animate__animated animate__fadeIn" style="border-radius: 16px;">
                            <i class="bx bx-error-circle text-warning mb-3" style="font-size: 4rem;"></i>
                            <h4 class="text-white fw-bold">Member Not Found</h4>
                            <p class="text-muted">The searched member ID does not exist, or is not located within your downline.</p>
                            <div class="mt-4">
                                <a href="/dashboard/reftree/{{ $myintid }}" class="btn btn-warning">
                                    <i class="bx bx-arrow-back me-1"></i> Back to My Tree
                                </a>
                            </div>
                        </div>
                        @endif

                        <style>
                            /* Beautiful CSS Styles for the MLM Binary Referral Tree */
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

                            .zoom-controls {
                                display: flex;
                                gap: 0.5rem;
                            }

                            .btn-zoom {
                                background: rgba(255, 255, 255, 0.08);
                                border: 1px solid rgba(255, 215, 0, 0.15);
                                color: #fff;
                                width: 32px;
                                height: 32px;
                                border-radius: 6px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                transition: all 0.2s ease;
                            }

                            .btn-zoom:hover {
                                background: #ffd700;
                                color: #000;
                                transform: scale(1.05);
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
            const searchId = parseInt(input.value.trim(), 10);
            const myId = {{ $myintid }};

            if (isNaN(searchId)) {
                alert('Please enter a valid numeric ID.');
                return;
            }

            if (searchId < myId) {
                alert(`You can only search for members within your downline (ID must be ${myId} or higher).`);
                return;
            }

            window.location.href = `/dashboard/reftree/${searchId}`;
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

    </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
