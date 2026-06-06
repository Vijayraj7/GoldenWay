<style>
       .layout-page{ 
    background-color: #00150f !important;
}
.bg-menu-theme .menu-link, .bg-menu-theme .menu-horizontal-prev, .bg-menu-theme .menu-horizontal-next {
    color: #fff;
    /* color: lemonchiffon; */
}
.bg-menu-theme .menu-inner-shadow {
    background: none !important;
}

.bg-menu-theme .menu-inner>.menu-item.active>.menu-link {
    background-color: #00d0951f !important;
    background-color: #00d0951f !important;
    color: white !important;
}
.bg-menu-theme .menu-inner>.menu-item.active:before {
    background: #f9a826ff !important;
}
@media (max-width:800px) {
    .menu-avatar{
        height: 60px !important;
        width: 60px !important;
    }
}
</style>
<aside style="background-color: black !important;" id="layout-menu" class="layout-menu menu-vertical menu menu-index nv-mnn bg-menu-theme">
    <div style="display: flex; height: 0px; flex-direction: column; justify-content: center; align-items: center;" class="app-brand demo">
        <!-- <a href="/" class="app-brand-link">
            <img
                style="padding: 10px;"
                src="/tst/grnyellow.png"
                alt
                srcset
                height="90px"
            >
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a> -->
        <!-- <div style="height: 80px; width: 80px;" class="avatar avatar-online menu-avatar">
            <img
                style="height: 100%; width: 100%;"
                src="{{ $v->img ?? '/assets/img/avatars/1.png' }}"
                alt
                class="rounded-circle"
            >
        </div>
        <div style="margin-top: 8px !important;">
            <a href="#">{{date('d, M, Y', strtotime($v->created_at))}}</a>
            <div style="font-size: 15px; color:#fff;" id="nm">{{$v->name}}</div>
        </div>
        <div style="margin-top: 8px !important;">
            <a href="#">{{date('d, M, Y', strtotime($v->created_at))}}</a>
            <div style="font-size: 11px;" id="time"></div>
        </div> --></div>
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
                <div data-i18n="Basic">Buy Product</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'depositstatus') active @endif">
            <a href="/dashboard/status/deposit" class="menu-link">
                <i class="menu-icon tf-icons bx bx-credit-card"></i>
                <div data-i18n="Basic">Deposit Status</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'marketsummary') active @endif">
            <a href="/dashboard/market/summary" class="menu-link">
                <i class="menu-icon tf-icons bx bx-stats"></i>
                <div data-i18n="Basic">Market Summary</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'democalculator') active @endif">
            <a href="/dashboard/demo/calculator" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calculator"></i>
                <div data-i18n="Basic">Demo Calculator</div>
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
        <li class="menu-item @if($r == 'ref_tree') active @endif">
            <a href="/dashboard/reftree/{{$v->id}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-street-view"></i>
                <div data-i18n="Basic">Referral Diagram</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'transactions') active @endif">
            <a href="/dashboard/status/transactions" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                <div data-i18n="Basic">Credit History</div>
            </a>
        </li>
        <!-- <li class="menu-item @if($r == 'allincometransactions') active @endif">
            <a href="/dashboard/status/transactions/?pnm=allincome" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                <div data-i18n="Basic">Withdraw Transactions</div>
            </a>
        </li> -->
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
        <!-- <li class="menu-item">
            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li> -->
    </ul>
</aside>
