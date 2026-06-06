<?php
use Carbon\Carbon;

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

        <title>Products</title>

        <meta name="description" content />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon"
            href="/assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

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

    </head>

    <body>
<style>
    .dropdown-menu {
    background-color: #fff !important;
}
.dropdown-menu a{
    color: #000 !important;
}
.dropdown-item:hover, .dropdown-item:focus {
    background-color: rgb(10 109 23 / 70%) !important;
}
</style>
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
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                Level Income</h4>

                            <?php
$thistotalincome = 0;
$levpercentage = 0;
if ($lev == '1') {
    $levpercentage = 10;
} elseif ($lev == '2') {
    $levpercentage = 5;
} elseif ($lev == '3') {
    $levpercentage = 5;
}elseif ($lev == '4') {
    $levpercentage = 5;
}elseif ($lev == '5') {
    $levpercentage = 5;
}

for ($i = 0; $i < count($levusers); $i++) {
    $levuser = isset($levusers[$i]) ? $levusers[$i] :
        null;
    $userincm = 0;
    $userprft = 0;
    $totalamnt = 0;
    if ($levuser) {
        $plans = DB::table('customer_plans')
            ->where('csId', $levuser->id)
            ->get();
        $levusers[$i]->plansStr = "";
        $levusers[$i]->daysStr = "";
        $levusers[$i]->dayIncomsStr = "";
        foreach ($plans as $plan) {
            if ($plan->pstatus == '1') {
                $createdDate = Carbon::parse($plan->created_at);
                $daysDifference =
                    $createdDate->diffInDays(date('Y-m-d H:i:s'));
                $deposit = (float) $plan->pamount;
                $totalamnt += $deposit;
                $admin_profit = (float) $adminconfig->profit;
                $total_balance = (float) $deposit + ($deposit *
                    $admin_profit) / 100;
                $tmpprofit = ($deposit * 0.5) / 100;
                $tm2profit = ($tmpprofit * $levpercentage) / 100;
                $tempusrincome = $daysDifference * $tm2profit;
                $userprft += $daysDifference * $tmpprofit;
                $userincm += $tempusrincome;
                $levusers[$i]->plansStr .= "USDT$deposit <br>";
                $levusers[$i]->daysStr .= "$daysDifference days <br>";
                $levusers[$i]->dayIncomsStr .= "$tm2profit <br>";
                // name = $levuser->name <br>
                //             thistotalincome = $daysDifference x $tm2profit;<br>
                //             userprft = $daysDifference x $tmpprofit;<br>
                //             userincm = $thistotalincome;<br>.<br>";
            }
        }
    }
    $thistotalincome += $userincm;
    $levusers[$i]->totalamnt = $totalamnt;
    $levusers[$i]->userincm = $userincm;
    $levusers[$i]->userprft = $userprft;
}
                            ?>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">{{ $levname }} Level
                                    Income :
                                    ${{ $thistotalincome }}

                                    <div class="btn-group"
                                        style="margin-left: 15px !important;">
                                        <button
                                            style="    padding: 0.2375rem 0.9rem !important;
                                        font-size: 15px !important;"
                                            type="button"
                                            class="btn btn-secondary dropdown-toggle"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            {{ $levname }} Level
                                        </button>
                                        <ul class="dropdown-menu" style="background-color: #fff !important;">
                                            @if ($lev != '1')
                                            <li><a class="dropdown-item"
                                                    href="/dashboard/levincome/1">First
                                                    Level</a></li>
                                            @endif
                                            @if ($lev != '2')
                                            <li><a class="dropdown-item"
                                                    href="/dashboard/levincome/2">Second
                                                    Level</a></li>
                                            @endif
                                            @if ($lev != '3')
                                            <li><a class="dropdown-item"
                                                    href="/dashboard/levincome/3">Third
                                                    Level</a></li>
                                            @endif
                                            @if ($lev != '4')
                                            <li><a class="dropdown-item"
                                                    href="/dashboard/levincome/4">Fourth
                                                    Level</a></li>
                                            @endif
                                            @if ($lev != '5')
                                            <li><a class="dropdown-item"
                                                    href="/dashboard/levincome/5">Fifth
                                                    Level</a></li>
                                            @endif
                                            <!-- <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="javascript:void(0);">Separated
                                                    link</a></li> -->
                                        </ul>
                                    </div></h5>

                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                                <!-- <th>Users</th> -->
                                                <th>Days</th>
                                                <th>Per Day Income</th>
                                                <th>Income({{$levpercentage}}%)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @for (
    $i = 0;
    $i < count($levusers);
    $i++
)
                                            @php
    $levuser = $levusers[$i];
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{$i + 1}}
                                            </td>
                                                <th>
                                                    <a href="/dashboard/profile?prfid={{$levuser->id}}">
                                                    {{ $levuser->name }}
                                                    </a>
                                                    </th>
                                                @if (false)
                                                <td>
                                                    <ul
                                                        class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            class="avatar avatar-xs pull-up"
                                                            title="Lilian Fuller">
                                                            <img
                                                                src="../assets/img/avatars/5.png"
                                                                alt="Avatar"
                                                                class="rounded-circle" />
                                                        </li>
                                                        <li
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            class="avatar avatar-xs pull-up"
                                                            title="Sophia Wilkerson">
                                                            <img
                                                                src="../assets/img/avatars/6.png"
                                                                alt="Avatar"
                                                                class="rounded-circle" />
                                                        </li>
                                                        <li
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            class="avatar avatar-xs pull-up"
                                                            title="Christina Parker">
                                                            <img
                                                                src="../assets/img/avatars/7.png"
                                                                alt="Avatar"
                                                                class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                @endif
                                                <td>
                                                    @if (
        (DB::table('customer_plans')->where(
            'csId',
            $levuser->id
        )->first()->pstatus
            ??
            '0') ==
        '1'
    )
                                                    <span
                                                        class="badge bg-label-primary me-1">Active</span>
                                                    @endif
                                                    @if (
        (DB::table('customer_plans')->where(
            'csId',
            $levuser->id
        )->first()->pstatus
            ??
            '0') ==
        '0'
    )
                                                    <span
                                                        class="badge bg-label-warning me-1">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <?php    echo $levuser->plansStr ?>
                                            </td>
                                                <td><?php    echo $levusers[$i]->daysStr;
                                                    ?></td>
                                                    <td><?php    echo $levusers[$i]->dayIncomsStr;
                                                        ?></td>
                                                <td>USDT{{ $levusers[$i]->userincm
                                                    }}</td>
                                            </tr>
                                            @endfor

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Basic Bootstrap Table -->

                            <hr class="my-5" />

                            <!-- Footer -->
                            @include('dashboard.dcards.footer')
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- / Layout wrapper -->

                        <!-- Core JS -->
                        <!-- build:js assets/vendor/js/core.js -->
                        <script
                            src="/assets/vendor/libs/jquery/jquery.js"></script>
                        <script
                            src="/assets/vendor/libs/popper/popper.js"></script>
                        <script src="/assets/vendor/js/bootstrap.js"></script>
                        <script
                            src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                        <script src="/assets/vendor/js/menu.js"></script>
                        <!-- endbuild -->

                        <!-- Vendors JS -->
                        <script
                            src="/assets/vendor/libs/masonry/masonry.js"></script>

                        <!-- Main JS -->
                        <script src="/assets/js/main.js"></script>

                        <!-- Page JS -->

                        <!-- Place this tag in your head or just before your close body tag. -->
                        <script async defer
                            src="https://buttons.github.io/buttons.js"></script>
                    </body>
                </html>
