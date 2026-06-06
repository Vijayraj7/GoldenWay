<style>
    .navbar {
    background-color: #1e1e1e;
    color: #fff;
    display: flex;
    justify-content: space-around;
    align-items: center;
    /* padding: 15px 20px; */
    /* padding-left: 40px;
    padding-right: 40px; */
    max-height: 100px;
    position: -webkit-sticky; /* For Safari */
    position: sticky;
    top: 0;
    
    z-index: 1200; /* Ensures the navbar stays on top of other content */
  }
</style>
<nav style="border-radius: 0px !important; background-color: #6b6b6b !important; width: 100% !important; border: 0.1px solid #3c4b44; margin: 0px !important; box-shadow: none !important;" class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center" style="width: 100% !important;">
            <div class="nav-item d-flex align-items-center" style="width: 100% !important;">
                <div style="width: 100% !important;">
                    <h6 style="margin-bottom: 0.5rem !important; color: #afafaf; font-size: 12px; text-transform: uppercase;">
                        <span style="color: white; margin-left: 8px;">Hi {{$v->name}}, we're beyond ecstatic to have you join us.</span>
                    </h6> 
                    <!-- <div class="progress" style="width: 80% !important;">
                        <div
                            class="progress-bar progress-bar-striped bg-success"
                            role="progressbar"
                            style="width: 1%"
                            aria-valuenow="40"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        ></div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- /Search -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <!-- <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
            </li> -->
            <style>
                @media (max-width:800px) {
                    .usrname{
                        display: hidden !important;
                        color: transparent !important;
                    }
                }
            </style>
            <div>
                <span style="color: #fff;text-transform: uppercase;font-size:13px;" class="usrname d-block">{{ $v->name }}</span>
                <span style="color: #adadad;text-transform: uppercase;font-size:11px;" class="usrname d-block">{{ date('d, M, Y', strtotime($v->created_at)) }}</span>
            </div>
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img
                            style="height: 40px !important; width: 40px !important;"
                            src="{{ $v->img ?? '/assets/img/avatars/1.png' }}"
                            alt
                            class="w-px-40 h-auto rounded-circle"
                        >
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li id="copyidButton">
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img
                                            style="height: 40px !important; width: 40px !important;"
                                            src="{{ $v->img ?? '/assets/img/avatars/1.png' }}"
                                            alt
                                            class="w-px-40 h-auto rounded-circle"
                                        >
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span style="color: black !important;text-transform: uppercase;font-size:13px;" class="d-block">{{ $v->name }}</span>
                                    <small style="color: #3d3c3c !important;" class="text-muted">
                                        Copy user id :
                                        #{{ $v->id }}
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <script>
                        document.getElementById('copyidButton').addEventListener('click', function() {
                            var url = "{{ $v->id }}";

                            navigator.clipboard.writeText(url)
                                .then(function() {
                                    // Inform the user that the URL has been copied
                                    alert('User Id copied to clipboard: #' + url);
                                })
                                .catch(function(error) {
                                    // Handle errors
                                    console.error('Could not copy URL: ', error);
                                    alert('Could not copy URL. Please try again.');
                                });
                        });
                    </script>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/dashboard/profile">
                            <i class="bx bx-user me-2" style="color: black !important;"></i>
                            <span style="color: black !important;" class="align-middle">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/dashboard/profile/edit">
                            <i class="bx bx-edit me-2" style="color: black !important;"></i>
                            <span style="color: black !important;" class="align-middle">Edit Profile</span>
                        </a>
                    </li>
                    <li id="copyButton">
                        <?php
// URL encode the parameter values
$text = urlencode("https://globalmarketstars.com/register?ref=" . $v->id . "&name=" . $v->name);

// Construct the WhatsApp message link
$whatsappLink = "whatsapp://send?text=" . $text;
?>
                        <a class="dropdown-item" href="{{$whatsappLink}}">
                            <i style="color: black !important;" class="bx bx-copy me-2"></i>
                            <span style="color: black !important;" class="align-middle">Share Referral Url</span>
                            <h6 style="font-size: 9px;">
                                https://globalmarketstars.com/register?ref={{ $v->id }}&name={{ $v->name }}
                            </h6>
                        </a>
                    </li>
                    <script>
                        document.getElementById('copyButton').addEventListener('click', function() {
                            var url = "https://globalmarketstars.com/register?ref={{ $v->id }}&name={{ $v->name }}";

                            navigator.clipboard.writeText(url)
                                .then(function() {
                                    // Inform the user that the URL has been copied
                                    alert('URL copied to clipboard: ' + url);
                                })
                                .catch(function(error) {
                                    // Handle errors
                                    console.error('Could not copy URL: ', error);
                                    alert('Could not copy URL. Please try again.');
                                });
                        });
                    </script>
                    <!-- <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a class="dropdown-item" href="#">
                            <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                <span class="flex-grow-1 align-middle">Billing</span>
                                <span
                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                            </span>
                        </a>
                    </li> -->
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/logout">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

