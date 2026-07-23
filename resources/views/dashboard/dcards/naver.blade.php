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
            display: block;
            font-size: 13px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 160px;
        }

        .welcome-title .username {
            font-size: 14px;
        }

        .time-badge {
            padding: 4px 10px;
        }

        .nav-center {
            margin: 0 8px;
        }
    }

    /* Scroll white fade override to #8d6900 with low opacity */
    .layout-navbar-fixed .layout-page:before {
        background: rgba(141, 105, 0, 0.15) !important;
    }

    .bg-menu-theme .menu-inner-shadow {
        background: linear-gradient(rgba(141, 105, 0, 0.31) 41%, rgba(141, 105, 0, 0.11) 95%, rgba(141, 105, 0, 0.05)) !important;
    }

    .profile-trigger {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        text-decoration: none !important;
        padding: 0 !important;
    }

    .profile-nav-text {
        font-size: 10px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 3px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: color 0.3s ease;
    }

    .profile-trigger:hover .profile-nav-text {
        color: #f9a826;
    }

    .profile-modal-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 16px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        color: #fff !important;
        text-decoration: none !important;
        transition: all 0.3s ease;
    }

    .profile-modal-item:hover {
        background: rgba(249, 168, 38, 0.08);
        border-color: rgba(249, 168, 38, 0.3);
        transform: translateY(-1px);
    }

    .logout-modal-btn:hover {
        background: rgba(239, 68, 68, 0.3) !important;
        color: #fff !important;
    }

    #modalCopyIdBtn:hover {
        background: rgba(255, 255, 255, 0.1) !important;
        border-color: rgba(249, 168, 38, 0.3) !important;
        color: #fff !important;
    }

    @if(isSubDomain()) .test-banner {
        background: linear-gradient(90deg, #d1fae5, #a7f3d0) !important;
        color: #065f46 !important;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 0.5px;
        width: 100%;
        position: sticky;
        top: 0;
        z-index: 1201;
        box-shadow: 0 2px 10px rgba(4, 120, 87, 0.1);
        border-bottom: 1px solid rgba(4, 120, 87, 0.15);
    }

    #nvcbr {
        top: 50px !important;
    }

    @else #nvcbr {
        top: 0 !important;
    }

    @endif

</style>


@if(isSubDomain())
<div class="test-banner">
    <i class="bx bx-info-circle" style="font-size: 18px; margin-right: 8px;"></i>
    <span>you are using test website</span>
</div>
@endif

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
                <img src="/tst/goldenlogo.png" alt="GoldenWay Logo" class="nav-logo">
            </a>
        </div>

        <!-- Center Section: Welcome message -->
        <div class="nav-center d-flex">
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
                <a class="nav-link profile-trigger" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#profileModal">
                    <div class="avatar avatar-online avatar-onliner">
                        <img src="{{ $v->img ? $v->img . '?t=' . time() : '/tst/goldenlogo.png' }}" alt="avatar" class="avatar-image">
                    </div>
                    <span class="profile-nav-text">Profile</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true" style="z-index: 2040;">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
        <div class="modal-content" style="background: rgba(12, 40, 32, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(249, 168, 38, 0.25); border-radius: 20px; color: #fff; box-shadow: 0 20px 50px rgba(0,0,0,0.6);">
            <div class="modal-header" style="border-bottom: 1px solid rgba(255, 255, 255, 0.08); padding: 20px 24px;">
                <h5 class="modal-title" style="color: #fff; font-weight: 700; font-size: 1.15rem; display: flex; align-items: center; gap: 8px;">
                    <i class="bx bx-user-circle" style="color: #f9a826; font-size: 1.4rem;"></i> Account Profile
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="box-shadow: none;"></button>
            </div>
            <div class="modal-body" style="padding: 24px;">
                <!-- User Info Header -->
                <div class="text-center mb-4">
                    <div style="position: relative; display: inline-block;">
                        <img src="{{ $v->img ? $v->img . '?t=' . time() : '/tst/goldenlogo.png' }}" alt="avatar" style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid rgba(249, 168, 38, 0.3); object-fit: cover; box-shadow: 0 8px 24px rgba(0,0,0,0.4);">
                        <span style="position: absolute; bottom: 3px; right: 3px; width: 14px; height: 14px; background: #00d094; border: 2px solid #0c2820; border-radius: 50%;"></span>
                    </div>
                    <h4 style="color: #fff; font-weight: 600; font-size: 1.2rem; margin-top: 15px; margin-bottom: 4px;">{{ $v->name }}</h4>
                    
                    <button id="modalCopyIdBtn" class="btn" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 30px; color: rgba(255, 255, 255, 0.7); font-size: 0.8rem; padding: 4px 14px; cursor: pointer; transition: all 0.3s;" onclick="copyUserIdModal('{{ $v->uid }}')">
                        ID: #{{ $v->uid }} <i class="bx bx-copy ms-1" style="color: #f9a826;"></i>
                    </button>
                </div>

                <!-- Navigation List -->
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <a href="/dashboard/profile" class="profile-modal-item">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <i class="bx bx-user" style="font-size: 1.15rem;"></i>
                            <span>View Profile</span>
                        </div>
                        <i class="bx bx-chevron-right" style="opacity: 0.5;"></i>
                    </a>
                    
                    <a href="/dashboard/profile/edit" class="profile-modal-item">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <i class="bx bx-edit" style="font-size: 1.15rem;"></i>
                            <span>Edit Profile</span>
                        </div>
                        <i class="bx bx-chevron-right" style="opacity: 0.5;"></i>
                    </a>

                    @if(DB::table('customer_plans')->where('csId',$v->id)->where('pstatus','1')->sum('pamount')>0)
                    <div style="margin-top: 10px; padding: 12px 16px; background: rgba(249, 168, 38, 0.04); border: 1px solid rgba(249, 168, 38, 0.15); border-radius: 12px;">
                        <span style="font-size: 0.75rem; text-transform: uppercase; color: rgba(249, 168, 38, 0.8); font-weight: 600; display: block; margin-bottom: 8px; letter-spacing: 0.5px;">Referral Links</span>
                        <div style="display: flex; gap: 8px;">
                            <button class="btn btn-sm" style="flex: 1; background: rgba(249, 168, 38, 0.12); border: 1px solid rgba(249, 168, 38, 0.25); color: #f9a826; border-radius: 8px; font-weight: 600; font-size: 0.75rem; padding: 6px;" onclick="copyReferralLinkModal('left', '{{ $v->id }}', '{{ $v->name }}')">
                                <i class="bx bx-left-arrow-alt me-1"></i> Left Side
                            </button>
                            <button class="btn btn-sm" style="flex: 1; background: rgba(249, 168, 38, 0.12); border: 1px solid rgba(249, 168, 38, 0.25); color: #f9a826; border-radius: 8px; font-weight: 600; font-size: 0.75rem; padding: 6px;" onclick="copyReferralLinkModal('right', '{{ $v->id }}', '{{ $v->name }}')">
                                Right Side <i class="bx bx-right-arrow-alt ms-1"></i>
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.08); padding: 16px 24px; display: flex; justify-content: space-between; align-items: center;">
                <button type="button" class="btn" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 8px; color: #fff; font-size: 0.85rem; font-weight: 600; padding: 8px 16px; cursor: pointer; transition: all 0.3s;" data-bs-dismiss="modal">Close</button>
                <a href="/logout" class="btn logout-modal-btn" style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); border-radius: 8px; color: #ef4444; font-size: 0.85rem; font-weight: 600; padding: 8px 16px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: all 0.3s;">
                    <i class="bx bx-power-off"></i> Log Out
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // Copy User ID to Clipboard listener
    function copyUserIdModal(uid) {
        navigator.clipboard.writeText(uid)
            .then(function() {
                alert('User ID copied to clipboard: #' + uid);
            })
            .catch(function(error) {
                console.error('Could not copy User ID: ', error);
            });
    }

    // Share Referral Link with Direction handler
    function copyReferralLinkModal(direction, userId, userName) {
        var url = "https://" + window.location.host + "/register?ref=" + userId + "&dir=" + direction + "&name=" + userName;

        navigator.clipboard.writeText(url)
            .then(function() {
                alert('Referral link copied to clipboard!');
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
