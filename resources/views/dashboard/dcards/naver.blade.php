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
    /* Sticky Premium Glassmorphic Header */
    #nvcbr {
        background: linear-gradient(135deg, rgba(7, 31, 23, 0.96), rgba(12, 40, 32, 0.96)) !important;
        backdrop-filter: blur(12px) !important;
        -webkit-backdrop-filter: blur(12px) !important;
        border-bottom: 1px solid rgba(249, 168, 38, 0.16) !important;
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.4) !important;
        position: sticky;
        top: 0;
        z-index: 1200;
        width: 100%;
        padding: 12px 24px !important;
        transition: all 0.3s ease;
    }

    .nav-container {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        max-width: 1440px;
        margin: 0 auto;
    }

    .nav-left {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .nav-logo {
        height: 48px;
        width: auto;
        object-fit: contain;
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .nav-logo:hover {
        transform: scale(1.05);
    }

    .nav-center {
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
        margin: 0 24px;
    }

    .welcome-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .welcome-title {
        color: #ffffff !important;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .welcome-title .username {
        font-weight: 700;
        font-size: 18px;
        background: linear-gradient(90deg, #ffd700, #f9a826);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 2px 10px rgba(249, 168, 38, 0.2);
    }

    .welcome-subtitle {
        color: rgba(255, 255, 255, 0.55) !important;
        font-size: 11px;
        font-weight: 400;
        margin-top: 2px;
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .time-badge {
        background: rgba(249, 168, 38, 0.08);
        border: 1px solid rgba(249, 168, 38, 0.18);
        border-radius: 30px;
        padding: 6px 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .time-badge:hover {
        background: rgba(249, 168, 38, 0.12);
        border-color: rgba(249, 168, 38, 0.35);
    }

    .time-icon {
        color: #f9a826;
        font-size: 14px;
    }

    .time-text {
        font-size: 11px;
        color: #fff;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .avatar-onliner {
        height: 42px;
        width: 42px;
        border: 2px solid rgba(249, 168, 38, 0.25);
        border-radius: 50%;
        padding: 2px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: rgba(7, 31, 23, 0.4);
    }

    .avatar-onliner:hover {
        border-color: #ffd700;
        box-shadow: 0 0 12px rgba(249, 168, 38, 0.4);
        transform: scale(1.05);
    }

    .avatar-image {
        height: 100%;
        width: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    /* Premium Dropdown Styles */
    .dropdown-menu-end {
        background: linear-gradient(135deg, #071f17, #0c2820) !important;
        border: 1px solid rgba(249, 168, 38, 0.2) !important;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6) !important;
        border-radius: 14px !important;
        padding: 8px 0 !important;
        min-width: 220px !important;
    }

    .dropdown-user-header {
        padding: 4px 0;
    }

    .dropdown-username {
        color: #ffffff !important;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
    }

    .dropdown-uid {
        color: rgba(255, 255, 255, 0.5) !important;
        font-size: 10px;
        margin-top: 2px;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .dropdown-item {
        color: rgba(255, 255, 255, 0.8) !important;
        padding: 8px 16px !important;
        transition: all 0.2s ease;
        border-radius: 8px;
        margin: 2px 8px;
        width: calc(100% - 16px);
        display: flex;
        align-items: center;
        font-size: 13px;
    }

    .dropdown-item i {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.6) !important;
        transition: color 0.2s ease;
    }

    .dropdown-item:hover {
        background: rgba(249, 168, 38, 0.12) !important;
        color: #ffd700 !important;
        transform: translateX(4px);
    }

    .dropdown-item:hover i {
        color: #ffd700 !important;
    }

    .dropdown-divider {
        border-top: 1px solid rgba(249, 168, 38, 0.12) !important;
        margin: 8px 0 !important;
    }

    .logout-item:hover {
        background: rgba(239, 68, 68, 0.12) !important;
        color: #ef4444 !important;
    }

    .logout-item:hover i {
        color: #ef4444 !important;
    }

    /* Mobile Responsive Styling */
    @media (max-width: 991px) {
        .welcome-subtitle {
            display: none;
        }
    }

    @media (max-width: 768px) {
        #nvcbr {
            padding: 10px 16px !important;
        }

        .nav-logo {
            height: 40px;
        }

        .avatar-onliner {
            height: 38px;
            width: 38px;
        }

        .welcome-title {
            font-size: 13px;
        }

        .welcome-title .username {
            font-size: 14px;
        }

        .time-badge {
            padding: 4px 10px;
        }
    }

    /* Scroll white fade override to #8d6900 with low opacity */
    .layout-navbar-fixed .layout-page:before {
        background: rgba(141, 105, 0, 0.15) !important;
    }

    .bg-menu-theme .menu-inner-shadow {
        background: linear-gradient(rgba(141, 105, 0, 0.31) 41%, rgba(141, 105, 0, 0.11) 95%, rgba(141, 105, 0, 0.05)) !important;
    }

</style>


<nav id="nvcbr" class="navbar">
    <div class="nav-container">
        <!-- Left Section: Mobile Menu Toggle & Brand Logo -->
        <div class="nav-left">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm" style="color: #ffd700;"></i>
                </a>
            </div>
            <a href="/" class="app-brand-link">
                <img src="/tst/grnyellow.png" alt="GoldenWay Logo" class="nav-logo">
            </a>
        </div>

        <!-- Center Section: Welcome message (Desktop and tablet) -->
        <div class="nav-center d-none d-md-flex">
            <div class="welcome-box">
                <span class="welcome-title">Hi <span class="username">{{ $v->name }}</span>,</span>
                <span class="welcome-subtitle">We're excited to have you as part of our community</span>
            </div>
        </div>

        <!-- Right Section: Time & Dropdown Menu -->
        <div class="nav-right">
            <!-- Time display badge -->
            <div class="time-badge d-none d-sm-flex" id="time-badge">
                <i class="bx bx-time-five time-icon"></i>
                <span id="time" class="time-text">{{ date('Y-m-d H:i:s') }}</span>
            </div>

            <!-- Profile dropdown -->
            <div class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online avatar-onliner">
                        <img src="/assets/img/avatars/1.png" alt="avatar" class="avatar-image">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li id="copyidButton" class="dropdown-user-header">
                        <a class="dropdown-item" href="javascript:void(0);">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img style="height: 100%; width: 100%;" src="/assets/img/avatars/1.png" alt="user avatar" class="rounded-circle">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="dropdown-username d-block">{{ $v->name }}</span>
                                    <small class="dropdown-uid">
                                        Copy ID: #{{ $v->uid }}
                                        <i class="bx bx-copy ms-1" style="color: #ffd700; font-size: 12px;"></i>
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/dashboard/profile">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/dashboard/profile/edit">
                            <i class="bx bx-edit me-2"></i>
                            <span class="align-middle">Edit Profile</span>
                        </a>
                    </li>
                    @if(DB::table('customer_plans')->where('csId',$v->id)->where('pstatus','1')->sum('pamount')>0)
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#referralDirectionModalNavbar">
                            <i class="bx bx-share-alt me-2"></i>
                            <span class="align-middle">Share Referral Url</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item logout-item" href="/logout">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Referral Direction Modal Navbar -->
<div class="modal fade" id="referralDirectionModalNavbar" tabindex="-1" aria-hidden="true" style="z-index:2050;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="padding: 1.5rem; background-color: #111; color: #fff; border-radius: 15px; border: 1px solid rgba(249, 168, 38, 0.2);">
            <div class="modal-header" style="border-bottom:none;">
                <h5 class="modal-title" style="color: #fff; font-weight: 600;">Select Referral Direction</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color: rgba(255, 255, 255, 0.8);">Choose which side to send your referral link:</p>
            </div>
            <div class="modal-footer" style="border-top:none;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 8px;">Close</button>
                <button type="button" class="btn btn-primary" style="background-color: #8d6900; border-color: #8d6900; border-radius: 8px;" onclick="shareReferralWithDirectionNavbar('left', '{{ $v->id }}', '{{ $v->name }}')">Left Team</button>
                <button type="button" class="btn btn-success" style="background-color: #8d6900; border-color: #8d6900; border-radius: 8px;" onclick="shareReferralWithDirectionNavbar('right', '{{ $v->id }}', '{{ $v->name }}')">Right Team</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Copy User ID to Clipboard listener
    document.getElementById('copyidButton').addEventListener('click', function(e) {
        e.preventDefault();
        var uid = "{{ $v->uid }}";
        navigator.clipboard.writeText(uid)
            .then(function() {
                alert('User ID copied to clipboard: #' + uid);
            })
            .catch(function(error) {
                console.error('Could not copy User ID: ', error);
            });
    });

    // Share Referral Link with Direction handler
    function shareReferralWithDirectionNavbar(direction, userId, userName) {
        var url = "https://" + window.location.host + "/register?ref=" + userId + "&dir=" + direction + "&name=" + userName;

        navigator.clipboard.writeText(url)
            .then(function() {
                alert('Referral link copied to clipboard!');
                var modalEl = document.getElementById('referralDirectionModalNavbar');
                var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.hide();
            })
            .catch(function(error) {
                console.error('Could not copy URL: ', error);
                alert('Could not copy URL. Please try again.');
            });
    }

    // Display Real-time UAE Time
    function displayUAEDateTime() {
        const currentDate = new Date();
        const options = {
            day: '2-digit'
            , month: '2-digit'
            , year: 'numeric'
            , hour: '2-digit'
            , minute: '2-digit'
            , second: '2-digit'
            , hour12: true
            , timeZone: 'Asia/Dubai'
        };
        const uaeDateTimeString = currentDate.toLocaleString('en-US', options);

        const [date, time] = uaeDateTimeString.split(', ');
        const [month, day, year] = date.split('/');
        const formattedDate = `${day}/${month}/${year}`;

        const datetimeElement = document.getElementById('time');
        if (datetimeElement) {
            datetimeElement.textContent = `${formattedDate}, ${time} | UAE`;
        }
    }

    // Update time every second
    setInterval(displayUAEDateTime, 1000);
    displayUAEDateTime();

</script>
