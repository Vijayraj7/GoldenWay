<?php
$nusercreated = strtotime($v->created_at);
$ndiffInDays = floor((time() - $nusercreated) / (60 * 60 * 24));
$nplans = DB::table('customer_plans')
    ->where('csId', $v->id)
    ->where('pstatus', '1')
    ->get();
$nisnotExpired = true;
$nisExpired = false;
if (count($nplans) == 0) {
    // if($ndiffInDays > 7){
    if (false) {
        $nisnotExpired = false;
        $nisExpired = true;
    }
}
?>
<style>
    #nvcbr {
        height: 80px;
    }

    .navpicon {
        margin-right: 5px;
    }

    @media (min-width:1200px) {
        .avatar-onliner {
            height: 45px;
            width: 45px;
        }

        .navmidcont {
            /* width: 150px; */
            margin-left: 40px;
        }
    }

    @media (max-width:1200px) {
        .navimgcontainer {
            width: auto !important;
        }

        .avatar-onliner {
            height: 50px;
            width: 50px;
        }

        .navmid {
            /* width: 30%; */
            font-size: 14px !important;
        }
    }

    @media (max-width:800px) {
        #nvcbr {
            /* display: none !important; */
        }

        .avatar-onliner {
            height: 40px;
            width: 40px;
        }

        .navmidcont {
            width: 180px;
        }

        .app-brand-link img {
            /* height: 40px; */
        }

        .navmid span {
            font-size: 14px !important;
        }

        .navmid {
            width: 30%;
            font-size: 13px !important;
        }

        .layout-menu-fixed body:not(.modal-open) .layout-content-navbar .layout-menu,
        .layout-menu-fixed-offcanvas body:not(.modal-open) .layout-content-navbar .layout-menu {
            z-index: 1680;
        }
    }

    @media (max-width:600px) {
        .navpicon {
            flex-direction: column-reverse;
        }

        .avatar-onliner {
            height: 40px;
            width: 40px;
        }

        .navmid span {
            font-size: 14px !important;
        }

        .navmid {
            width: 30%;
            font-size: 12px !important;
        }

        #time {
            /* display: none; */
            font-size: 8px !important;
        }
    }

    @media (max-width:500px) {
        #nvcbr {
            /* display: none !important; */
        }

        .avatar-onliner {
            height: 40px;
            width: 40px;
        }

        .navmidcont {
            width: 150px;
        }

        .app-brand-link img {
            height: 50px;
        }

        .navmid {
            width: 30%;
            font-size: 9px !important;
        }

        #time {
            /* display: none; */
            font-size: 7px !important;
        }
    }

    @media (max-width:400px) {
        #time {
            /* display: none; */
            font-size: 5px !important;
        }
    }
</style>
<nav id="nvcbr" class="navbar">
    <div style="display: flex;  width: 100%; justify-content: space-around; align-items: center;">

        <div style="margin-left: 15px;" class="layout-menu-toggle navbar-nav align-items-xl-center me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>
        <div style="display: flex; justify-content: center; align-items: center;" class="navimgcontainer app-brand demo">
            <a href="/" class="app-brand-link">
                <img style="padding: 10px;" src="/tst/grnyellow.png" alt srcset height="65px">
            </a>
        </div>

        <div class="navmidcont">
            <h5 class="navmid"
                style="color: white !important; width: 100%; font-size: 20px; margin-bottom: 0rem !important;">
                Hi <span style="font-size: 23px; margin-left: 5px; font-weight: 600;">{{ $v->name }}</span>
                <!-- <span style="font-size: 14px; text-transform: uppercase;"> {{ $v->name }}</span> -->
                , we're beyond ecstatic to have you join us.
            </h5>
        </div>

        <div class="navpicon" style="display: flex; align-items: center;">

            <div style="margin-top: 0px !important;">
                <!-- <a href="#">{{ date('d, M, Y', strtotime($v->created_at)) }}</a> -->
                <div style="font-size: 10px;" id="time">{{ date('Y-m-d H:i:s') }}</div>
            </div>
            <div class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online avatar-onliner">
                        <img style="height: 100%; width: 100%; border-radius: 25px;"
                            src="{{ $v->img ?? '/assets/img/avatars/1.png' }}" alt class="square-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li id="copyidButton">
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img style="height: 100%; width: 100%;"
                                            src="{{ $v->img ?? '/assets/img/avatars/1.png' }}" alt
                                            class="rounded-circle">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span style="color: black !important;text-transform: uppercase;font-size:13px;"
                                        class="d-block">{{ $v->name }}</span>
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
                    @if(DB::table('customer_plans')->where('csId',$v->id)->where('pstatus','1')->sum('pamount')>0)
                        <li id="copyButton">
                            <?php
                            // URL encode the parameter values
                            $text = urlencode('https://globalmarketstars.com/register?ref=' . $v->id . '&name=' . $v->name);
                            
                            // Construct the WhatsApp message link
                            $whatsappLink = 'whatsapp://send?text=' . $text;
                            ?>
                            <a class="dropdown-item" href="{{ $whatsappLink }}">
                                <i style="color: black !important;" class="bx bx-copy me-2"></i>
                                <span style="color: black !important;" class="align-middle">Share Referral Url</span>
                                <h6 style="font-size: 9px;">
                                    https://globalmarketstars.com/register?ref={{ $v->id }}&name={{ $v->name }}
                                </h6>
                            </a>
                        </li>
                    @endif
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
            </div>
        </div>
    </div>

    <!-- TradingView Widget BEGIN -->

    <!-- TradingView Widget END -->
    <script>
        function displayUAEDateTime() {
            // Get the current date and time in UTC
            const currentDate = new Date();

            // UAE is UTC+4
            const utcOffset = 4;

            // Calculate the UTC time with the UTC offset for UAE
            const uaeTime = new Date(currentDate.getTime());

            // Format the UAE date and time
            const options = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true,
                timeZone: 'Asia/Dubai' // Set the time zone explicitly to avoid daylight saving time changes
            };
            const uaeDateTimeString = uaeTime.toLocaleString('en-US', options);

            // Rearrange date elements
            const [date, time] = uaeDateTimeString.split(', '); // Splitting date and time
            const [month, day, year] = date.split('/'); // Splitting date components
            const formattedDate = `${day}/${month}/${year}`; // Reordering date components

            // Display the UAE date and time
            const datetimeElement = document.getElementById('time');
            datetimeElement.textContent = `${formattedDate}, ${time} | UAE`;
        }

        // Update the date and time every second
        setInterval(displayUAEDateTime, 1000);

        // Display the date and time initially when the page loads
        displayUAEDateTime();
    </script>
</nav>
<style>
    .navbar {
        background-color: #1e1e1e;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* padding: 15px 20px; */
        /* padding-left: 40px;
    padding-right: 40px; */
        max-height: 100px;
        position: -webkit-sticky;
        /* For Safari */
        position: sticky;
        top: 0;
        z-index: 1200;
        /* Ensures the navbar stays on top of other content */
    }

    .navbar .logo {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
    }

    .nav-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nav-links li {
        display: inline;
        margin-right: 20px;
    }

    .nav-links li a {
        color: #fff;
        text-decoration: none;
    }

    .content {
        padding: 20px;
    }
</style>
