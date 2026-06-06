<style>
    .bg-menu-theme .menu-link, .bg-menu-theme .menu-horizontal-prev, .bg-menu-theme .menu-horizontal-next {
        color: lemonchiffon;
    }
    .bg-menu-theme .menu-inner-shadow {
        background: none !important;
    }
    @media (max-width:800px) {
        
    }
</style>
<aside style="background-color: black !important;" id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo" style="justify-content: center; padding-left: 0px !important;">
        <a href="/" class="app-brand-link">
            <center>
                <img
                    src="/tst/grnyellow.png"
                    alt
                    srcset
                    height="50px"
                >
            </center>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1" style="margin-top: 30px;">
        <!-- Dashboard -->
        <li class="menu-item @if($r == 'allcustomers') active @endif">
            <a href="/admin" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">All Customers</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'referraltree') active @endif">
            <a href="/admin/referral/tree?refid=1111" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Referral Tree</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Product</span>
        </li>
        <li class="menu-item @if($r == 'productpendingrequests') active @endif">
            <a href="/admin/product/requests?typ=pending" class="menu-link">
                <i class="menu-icon tf-icons bx bx-pause-circle"></i>
                <div data-i18n="Basic">Pending Requests</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'productrequests') active @endif">
            <a href="/admin/product/requests" class="menu-link">
                <i class="menu-icon tf-icons bx bx-send"></i>
                <div data-i18n="Basic">Product History</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Lott</span>
        </li>
        <li class="menu-item @if($r == 'lotthistory') active @endif">
            <a href="/admin/lott/history" class="menu-link">
                <i class="menu-icon tf-icons bx bx-send"></i>
                <div data-i18n="Basic">Lott History</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'lottboxhistory') active @endif">
            <a href="/admin/lott/box" class="menu-link">
                <i class="menu-icon tf-icons bx bx-send"></i>
                <div data-i18n="Basic">Lott Box</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Withdraw</span>
        </li>
        <li class="menu-item @if($r == 'transferequests') active @endif">
            <a href="/admin/withdraw/requests?typ=trnsfr" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                <div data-i18n="Basic">Transfer Requests</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'withdrawrequests') active @endif">
            <a href="/admin/withdraw/requests" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <box-icon name="money-withdraw"></box-icon>
                <div data-i18n="Basic">Withdraw Requests</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Add Fund</span>
        </li>
        <li class="menu-item @if($r == 'creditaddpendingrequests') active @endif">
            <a href="/admin/creditadd/requests?typ=pending" class="menu-link">
                <i class="menu-icon tf-icons bx bx-pause"></i>
                <div data-i18n="Basic">Add-Fund Pending Requests</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'creditaddrequests') active @endif">
            <a href="/admin/creditadd/requests" class="menu-link">
                <i class="menu-icon tf-icons bx bx-plus"></i>
                <box-icon name="money-withdraw"></box-icon>
                <div data-i18n="Basic">Add-Fund History</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Transactions</span>
        </li>
        <li class="menu-item @if($r == 'transactions') active @endif">
            <a href="/admin/transactions/all" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                <div data-i18n="Basic">Transaction History</div>
            </a>
        </li>
        <li class="menu-item @if($r == 'credittransactions') active @endif">
            <a href="/admin/transactions/all?typ=trnsfr" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                <div data-i18n="Basic">Transfer Credit History</div>
            </a>
        </li>
        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Support</span>
        </li>
        <li class="menu-item @if($r == 'supportstatus') active @endif">
            <a href="/admin/customer/support/status" class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Basic">Customer Chats</div>
            </a>
        </li>
    </ul>
</aside>
