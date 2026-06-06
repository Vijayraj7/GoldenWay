<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

$myintid = (int) $v->id;
$refintid = (int) $refid;

if($refintid < $myintid){
    abort(404);
}

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

        @include('dashboard.dcards.naver', ['r' => 'dashboard'])
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
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
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                Refferal Diagram</h4>

                            @php
                                $secondlvl_users = getlevusers('2', $refuser);
                                $thirdlvl_users = getlevusers('3', $refuser);
                                $fourthlvl_users = getlevusers('4', $refuser);
                                $fifthlvl_users = getlevusers('5', $refuser);
                            @endphp

                            @php
                                $refuser = DB::table('customers')->where('id', $refid)->first();
                            @endphp
                            
                            @if($refuser)
                            <div class="tree" style="overflow: auto !important;">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="mx-auto">
                                                <img src="{{$refuser->img ?? 'https://cdn2.iconfinder.com/data/icons/avatar-vol-1-5/512/7_Asian_avatar_businessman_chinese-512.png'}}" alt="Sample avatar"/>
                                            </div>
                                            <p class="font-weight-bold">{{$refuser->name}}</p>
                                        </a>
                                        <?php 
                                        $dir = 0;
                                        ?>
                                        @php
                                            function renderUserTree($user,$dir)
                                            {
                                                $dir++;
                                                $firstlvl_users = DB::table('customers')->where('referral', $user->id)->get();
                                                if ($firstlvl_users->isEmpty())
                                                    return;
                                                echo '<ul class="inn_line">';
                                                foreach ($firstlvl_users as $first_user) {
                                                    echo '<li>';
                                                    echo '';
                                                    echo '<a href="/dashboard/reftree/' . $first_user->id . '">';
                                                    echo '<div class="mx-auto">';
                                                    echo '<img src="' . ($first_user->img ?? 'https://cdn2.iconfinder.com/data/icons/avatar-vol-1-5/512/7_Asian_avatar_businessman_chinese-512.png') . '" alt="Sample avatar"/>';
                                                    echo '</div></a>';
                                                    echo '<p class="font-weight-bold ref_name">' . $first_user->name . '</p>';
                                                    echo '<p class="ref_id">ID ' . $first_user->id . '</p>';
                                                    if($dir == 1){
                                                    echo '<p class="ref_phone"><a  href="tel://' . $first_user->phone . '">' .  $first_user->phone . '</a></p>';
                                                    }
                                                    $pltot = DB::table('customer_plans')->where('csId', $first_user->id)->where('pstatus', '1')->get()->sum('pamount');
                                                    if($pltot > 0){
                                                    echo '<p class="ref_id" style="color: green !important;">Total ' . $pltot . ' USDT</p>';
                                                    }else{
                                                    echo '<p class="ref_id" style="color: red !important;">Total ' . $pltot . ' USDT</p>';
                                                    }
                                                    echo '';
                                                    renderUserTree($first_user,$dir); // Recursive call to render sub-tree
                                                    echo '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            renderUserTree($refuser,$dir);
                                        @endphp
                                    </li>
                                </ul>
                            </div>
                            @endif
                           
                            <script>
                                function phoneurl(ph){
                                    window.location.href = 'tel://'+ph;
                                }
                            </script>

      <style>


.tree li a p {
  margin-top: 0px !important;
  margin-bottom: 0px !important;
  font-size: 8px;
  font-weight: 700;
}

p{
    padding: 0 !important;
    margin: 0 !important;
}
.inn_line li .ffuser{
    padding-left: 12px !important;
    padding-right: 12px !important;
}

.ref_id{
    color: gray;
    font-size: 6px !important;
}

.ref_name{
    /* color: black; */
    font-size: 8px !important;
}

.ref_ref_id{
    color: gray;
    font-size: 4px;
}


.ref_phone{
    color: blue !important;
    font-size: 7px !important;
}

.tree img {
  width: 35px;
  height: 35px;
  border-radius: 50%;
}

.tree ul {
  position: relative;
  padding: 1em 0;
  white-space: nowrap;
  display: flex;
  text-align: center;
}

.tree ul .inn_line {
  padding: 50px 0 0;
}

.tree ul::after {
  content: '';
  display: table;
  clear: both;
}

.tree li {
  display: inline-block;
  vertical-align: top;
  text-align: center;
  list-style-type: none;
  position: relative;
  padding: 40px 0 0;
  width: 100%;
}

.tree li::before,
.tree li::after {
  content: '';
  position: absolute;
  top: 0;
  right: 50%;
  border-top: 5px solid #ccc;
  width: 50%;
  height: 45px;
  z-index: -1;
}

.tree li::after {
  right: auto;
  left: 50%;
  border-left: 5px solid #ccc;
}

.tree li:only-child::after,
.tree li:only-child::before {
  display: none;
}

.tree li:only-child {
  padding-top: 0;
}

.tree li:first-child::before,
.tree li:last-child::after {
  border: 0 none;
}

.tree li:last-child::before {
  border-right: 5px solid #ccc;
  border-radius: 0 5px 0 0;
}

.tree li:first-child::after {
  border-radius: 5px 0 0 0;
}

.tree ul ul::before {
  content: '';
  position: absolute;
  top: 10px;
  left: 50%;
  border-left: 5px solid #ccc;
  width: 0;
  height: 45px;
}

.tree li a {
  padding: 0;
  text-decoration: none;
  display: inline-block;
  border-radius: 5px;
  color: #333;
  margin: 0 10px;
  position: relative;
  top: 1px;
}




      </style>

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