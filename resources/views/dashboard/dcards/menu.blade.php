<style>
    .layout-page {
        background-color: #8d6900 !important;
    }

    /* Premium Sidebar Main Container */
    .nv-mnn {
        background: linear-gradient(180deg, #051610 0%, #0a251c 100%) !important;
        border-right: 1px solid rgba(249, 168, 38, 0.15) !important;
        box-shadow: 4px 0 24px rgba(0, 0, 0, 0.4) !important;
    }

    /* Scrollbar Styling for Sidebar */
    .layout-menu .menu-inner {
        scrollbar-width: thin;
        scrollbar-color: rgba(249, 168, 38, 0.2) transparent;
    }

    .layout-menu .menu-inner::-webkit-scrollbar {
        width: 4px;
    }

    .layout-menu .menu-inner::-webkit-scrollbar-thumb {
        background: rgba(249, 168, 38, 0.2);
        border-radius: 4px;
    }

    /* Top Brand / Profile Section */
    .sidebar-profile-section {
        padding: 24px 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-bottom: 1px dashed rgba(249, 168, 38, 0.15);
        background: linear-gradient(180deg, rgba(249, 168, 38, 0.03) 0%, transparent 100%);
        margin-bottom: 12px;
        position: relative;
    }

    .sidebar-avatar-wrapper {
        position: relative;
        width: 72px;
        height: 72px;
        border-radius: 50%;
        padding: 3px;
        background: linear-gradient(135deg, #f9a826, #a78200);
        box-shadow: 0 0 15px rgba(249, 168, 38, 0.25);
        transition: all 0.3s ease;
    }

    .sidebar-avatar-wrapper:hover {
        transform: scale(1.05) rotate(5deg);
        box-shadow: 0 0 20px rgba(249, 168, 38, 0.4);
    }

    .sidebar-avatar-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #061812;
    }

    .sidebar-user-name {
        font-family: 'Outfit', 'Inter', sans-serif;
        font-weight: 700;
        font-size: 15px;
        color: #fff;
        margin-top: 10px;
        text-align: center;
        background: linear-gradient(90deg, #ffffff, #f9a826);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 0.5px;
    }

    .sidebar-user-meta {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.45);
        margin-top: 4px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }

    /* Menu Item Styling */
    .bg-menu-theme .menu-item {
        margin: 4px 12px !important;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .bg-menu-theme .menu-link {
        color: rgba(255, 255, 255, 0.75) !important;
        padding: 10px 14px !important;
        border-radius: 8px !important;
        transition: all 0.3s ease !important;
        background: transparent !important;
        font-weight: 500;
    }

    /* Menu Link Hover State */
    .bg-menu-theme .menu-item:not(.active) .menu-link:hover {
        color: #fff !important;
        background: rgba(255, 255, 255, 0.03) !important;
        padding-left: 20px !important;
        box-shadow: inset 0 0 10px rgba(249, 168, 38, 0.02);
    }

    .bg-menu-theme .menu-item:not(.active) .menu-link:hover .menu-icon {
        color: #f9a826 !important;
        transform: scale(1.1) rotate(5deg);
    }

    /* Menu Link Active State */
    .bg-menu-theme .menu-inner>.menu-item.active>.menu-link {
        background: linear-gradient(90deg, rgba(249, 168, 38, 0.15) 0%, rgba(249, 168, 38, 0.02) 100%) !important;
        color: #fff !important;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .bg-menu-theme .menu-inner>.menu-item.active>.menu-link .menu-icon {
        color: #f9a826 !important;
    }

    .bg-menu-theme .menu-inner>.menu-item.active {
        position: relative;
    }

    /* Left Gold indicator border */
    .bg-menu-theme .menu-inner>.menu-item.active:before {
        content: '';
        position: absolute;
        left: 0;
        top: 15%;
        height: 70%;
        width: 3px !important;
        background: #f9a826 !important;
        border-radius: 0 4px 4px 0;
        box-shadow: 0 0 10px #f9a826;
    }

    /* Menu Icons */
    .bg-menu-theme .menu-icon {
        color: rgba(255, 255, 255, 0.5) !important;
        font-size: 1.15rem !important;
        transition: all 0.3s ease !important;
    }

    /* Custom Group Headers */
    .bg-menu-theme .menu-header {
        margin: 20px 24px 8px 24px !important;
        padding: 0 !important;
        position: relative;
    }

    .bg-menu-theme .menu-header-text {
        font-family: 'Outfit', 'Inter', sans-serif;
        font-size: 10px !important;
        font-weight: 700 !important;
        letter-spacing: 1.5px !important;
        color: #f9a826 !important;
        opacity: 0.8;
    }

    .bg-menu-theme .menu-header::after {
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        width: calc(100% - 75px);
        height: 1px;
        background: linear-gradient(90deg, rgba(249, 168, 38, 0.15), transparent);
    }

</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu menu-index nv-mnn bg-menu-theme">
    <!-- Brand / Profile Section -->
    <div class="sidebar-profile-section">
        <!-- Logo -->
        <a href="/" style="margin-bottom: 15px; display: block;">
            <img src="/tst/grnyellow.png" alt="Logo" height="36px" style="filter: drop-shadow(0 0 8px rgba(249, 168, 38, 0.2));">
        </a>
        <div class="sidebar-avatar-wrapper">
            <img src="{{ $v->img ?? '/assets/img/avatars/1.png' }}" alt="User Avatar">
        </div>
        <div class="sidebar-user-name">{{ $v->name }}</div>
        <div class="sidebar-user-meta">Member since {{ date('M Y', strtotime($v->created_at)) }}</div>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1" style="padding-bottom: 12rem !important;">
        <!-- Dashboard -->
        <li class="menu-item @if($r == 'dashboard') active @endif">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'products') active @endif">
            <a href="/dashboard/products/buy" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Stake</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'depositstatus') active @endif">
            <a href="/dashboard/status/deposit" class="menu-link">
                <i class="menu-icon tf-icons bx bx-credit-card"></i>
                <div data-i18n="Basic">Stake Status</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'ref_tree') active @endif">
            <a href="/dashboard/reftree/{{$v->id}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-street-view"></i>
                <div data-i18n="Basic">Community</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'marketsummary') active @endif">
            <a href="/dashboard/market/summary" class="menu-link">
                <i class="menu-icon tf-icons bx bx-stats"></i>
                <div data-i18n="Basic">Market Summary</div>
            </a>
        </li>

        <!-- Components -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Account</span>
        </li>
        <!-- Cards -->
        <li class="menu-item @if($r == 'profile') active @endif">
            <a href="/dashboard/profile" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div data-i18n="Basic">Profile</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'transactions') active @endif">
            <a href="/dashboard/status/transactions" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                <div data-i18n="Basic">Credit History</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'trnsfrwithdrawhistory') active @endif">
            <a href="/dashboard/status/withdraw?typ=trnsfr" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                <div data-i18n="Basic">Transfer Credit History</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'withdrawhistory') active @endif">
            <a href="/dashboard/status/withdraw" class="menu-link">
                <i class="menu-icon tf-icons bx bx-send"></i>
                <div data-i18n="Basic">Withdraw Requests</div>
            </a>
        </li>

        <!-- Components -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Income</span>
        </li>
        <!-- Cards -->
        <li class="menu-item @if($r == 'ref_income') active @endif">
            <a href="/dashboard/refincome" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Basic">Referral Income</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'lev_income') active @endif">
            <a href="/dashboard/levincome/1" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Basic">Level Income</div>
            </a>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">About</span>
        </li>
        <li class="menu-item">
            <a href="/" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">About</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/dashboard/customer/support" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
            </a>
        </li>
    </ul>
</aside>
