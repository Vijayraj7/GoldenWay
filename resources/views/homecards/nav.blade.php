<?php
if (session_status() == PHP_SESSION_NONE) {
// Start the session if it hasn't been started yet
session_start();
}

// Now you can use session variables or perform other operations related to
sessions
?>
<nav class="nav-container">
    <div class="nav-button">
        <center>
            <button class="nav-button"></button>
        </center>
    </div>
    <div class="nav-logo">
        <center>
            <a href="#" class="logo_image"><img src="/imgs/dxlogo.png"
                    alt="Recompare demo" height
                    width="100px" /></a>
            <a href="#" class="logo_image"><img src="/imgs/dxname.png"
                    alt="Recompare demo" height
                    width="120px" /></a>
        </center>
    </div>
    <ul class="menu-container">
        <!-- <li class="menu-item" style="color: grey !important;">
        <a class="menu-link" href="#">Home</a>
    </li> -->
        <li class="menu-item"><a style="color: grey !important;"
                class="menu-link" href="/">Home</a></li>
        <li class="menu-item"><a style="color: grey !important;"
                class="menu-link" href="/shop">Shop</a></li>
        <li class="menu-item"><a style="color: grey !important;"
                class="menu-link" href="/vendors">Directory</a></li>

        <li class="menu-item">
            <a style="color: grey !important;" class="menu-link"
                href="/register">Register</a>
        </li>

        <!-- <li class="menu-item">
            <a style="color: grey !important;" class="menu-link" href="/register/vendor">Vendor Register</a>
        </li> -->

        <li class="menu-item">
            <a style="color: grey !important;" class="menu-link"
                href="/contact">Contact</a>
        </li>

        @isset($_SESSION["mail"])
        <li class="menu-item"><a style="color: grey !important;"
                class="menu-link" href="/dashboard">Dashboard</a></li>
        @else
        <li class="menu-item"><a style="color: grey !important;"
                class="menu-link" href="/login">Login</a></li>
        @endisset
    </ul>
</nav>

<style>
    .cookie-bottom-sheet {
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 1;
        width: 100%;
        background: #fff;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: none;
    }

    .cookie-bottom-sheet p {
        margin: 0;
        line-height: 1.5;
        color: #333;
    }

    .accept-button {
        background: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
<!-- Cookie Bottom Sheet -->
<div class="cookie-bottom-sheet" id="cookieBottomSheet">
    <p>We use cookies to enhance your experience on our site. By continuing to
        browse, you agree to our use of
        cookies.</p>
    <div style="height: 20px;"></div>
    <button class="accept-button" onclick="acceptCookies()">Accept
        Cookies</button>
</div>

<script>
    // JavaScript to handle cookie consent
    function acceptCookies() {
        document.getElementById('cookieBottomSheet').style.display = 'none';
        // Set a cookie or use any other method to remember user's preference
        document.cookie = "cookieConsent=accepted; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/";
    }

    // Check if the user has already accepted cookies
    function checkCookieConsent() {
        return document.cookie.indexOf("cookieConsent=accepted") !== -1;
    }

    // Show the cookie bottom sheet only if not already accepted
    document.addEventListener('DOMContentLoaded', function () {
        if (!checkCookieConsent()) {
            document.getElementById('cookieBottomSheet').style.display = 'block';
        }
    });
</script>

<link rel="stylesheet" href="/css/homenav.css">
<script src="/js/homenav.js"></script>

<!-- Google tag (gtag.js) -->
<script async
    src="https://www.googletagmanager.com/gtag/js?id=UA-89142607-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-89142607-1');
</script>