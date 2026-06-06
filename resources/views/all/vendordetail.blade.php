<!DOCTYPE html>
<html lang="en-US">


<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <link media="all"
        href="https://recompare.wpsoul.net/wp-content/cache/autoptimize/css/autoptimize_8f9df805d1e558f3cac19ec350ea730c.css"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <title> Netfish </title>
    <link rel="stylesheet" href="css/index.css">
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>

</head>
<!-- /wp-content/uploads/2022/06/bg.webp -->

<body
    class="home page-template-default page page-id-907 wp-custom-logo wp-embed-responsive theme-rehub-theme gspbody gspb-bodyfront woocommerce-no-js">

    <!-- Outer Start -->
    <div class="rh-outer-wrap">
        <!-- HEADER -->
        @include('homecards.nav')
        <!-- CONTENT -->
        <div class="rh-container full_post_area">
            <div class="rh-content-wrap clearfix ">
                <!-- Main Side -->
                <div class="main-side page clearfix visual_page_builder full_width" id="content">
                    <div class="rh-fullbrowser">
                        <article class="post mb0" id="page-907">


                            @include('cards.vendorcard')


                            <div class="card card-body bcontentx">
                                <div style="height: 5px;"></div>
                                <h2>Details</h2>
                                <hr />
                                @include('dashboard.dcards.pvcard')
                            </div>


                            <div class="bcontentx">
                                <div style="height: 30px;"></div>
                                <h2>Products</h2>
                                <hr />
                                @include('cards.pcard', ['t' => 'c','col' => 12, 'md' => 12, 'spc' => 'm'])
                            </div>


                            <div style="height: 230px;"></div>


                        </article>
                    </div>
                </div>
                <!-- /Main Side -->
            </div>
        </div>
        <!-- /CONTENT -->
        <!-- FOOTER -->


        @include('dashboard.dcards.footer')

        <div class="footer-bottom dark_style">
            <style scoped>
                .footer-bottom.dark_style {
                    background-color: #000000;
                }

                .footer-bottom.dark_style .footer_widget {
                    color: #f5f5f5
                }

                .footer-bottom.dark_style .footer_widget .title,
                .footer-bottom.dark_style .footer_widget h2,
                .footer-bottom.dark_style .footer_widget a,
                .footer-bottom .footer_widget.dark_style ul li a {
                    color: #f1f1f1;
                }

                .footer-bottom.dark_style .footer_widget .widget_categories ul li:before,
                .footer-bottom.dark_style .footer_widget .widget_archive ul li:before,
                .footer-bottom.dark_style .footer_widget .widget_nav_menu ul li:before {
                    color: #fff;
                }
            </style>
            <div class="rh-container clearfix">
                <div class="rh-flex-eq-height col_wrap_three mb0">
                    <div class="footer_widget mobileblockdisplay pt25 col_item mb0">
                        <div id="text-2" class="widget widget_text">
                            <div class="title">About Us</div>
                            <div class="textwidget">
                                <p>Using this platform has been a game-changer for our business. We've seen a
                                    significant reduction in procurement costs, and the transparency in sourcing has
                                    allowed us to make informed decisions. Plus, the standardized quality control
                                    ensures that the seafood we import meets our high standards consistently. It's a
                                    must-have tool for any seafood importer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer_widget mobileblockdisplay disablemobilepadding pt25 col_item mb0">
                        <div id="text-3" class="widget widget_text">
                            <div class="textwidget">
                                <div class="wpsm-one-half wpsm-column-first">
                                    <div class="title">For customers</div>
                                    <div class="widget_recent_entries">
                                        <ul>
                                            <li><a href="/register/customer">Register as customer</a></li>
                                        </ul>
                                    </div>
                                    <p>
                                </div>
                                <div class="wpsm-one-half wpsm-column-last">
                                    <div class="title">For vendors</div>
                                    <div class="widget_recent_entries">
                                        <ul>
                                            <li><a href="/register/vendor">Register as vendor</a></li>
                                        </ul>
                                    </div>
                                    <p>
                                </div>

                                <div class="clearfix"></div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="footer_widget mobileblockdisplay disablemobilepadding pt25 col_item mb0">
                        <div id="text-3" class="widget widget_text">
                            <div class="textwidget">
                                <div class="wpsm-one-half wpsm-column-first">
                                    <div class="title">Other Links</div>
                                    <div class="widget_recent_entries">
                                        <ul>
                                            <li><a href="/register/customer">Register as customer</a></li>
                                        </ul>
                                    </div>
                                    <p>
                                </div>
                                <div class="clearfix"></div>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- FOOTER -->
    </div><!-- Outer End -->
    <span class="rehub_scroll" id="topcontrol" data-scrollto="#top_ankor"><i class="rhicon rhi-chevron-up"></i></span>

    <!-- <a class="buy-rhtheme" href="https://1.envato.market/n1LqK7" target="_blank">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="20px" height="20px" viewBox="0 0 415.441 415.441" fill="#81b441" xml:space="preserve">
            <path
                d="M324.63,22.533C135.173,226.428,80.309,371.638,80.309,371.638c41.149,47.743,111.28,43.72,111.28,43.72 			c73.921,2.31,119.192-43.522,119.192-43.522c91.861-92.516,80.549-355.302,80.549-355.302 			C372.769-23.891,324.63,22.533,324.63,22.533z">
            </path>
            <path
                d="M32.369,181.983c0,0-28.983,57.964,18.859,155.495L178.367,58.01C176.916,58.538,63.691,98.037,32.369,181.983z">
            </path>
        </svg>
        <span> Buy <strong>This Template</strong></span>
    </a> -->

    <div id="logo_mobile_wrapper"><a href="" class="logo_image_mobile"><img src="imgs/dx.png" alt="Recompare demo"
                width="160" height="50" /></a></div>



    <div id="rhmobpnlcustom" class="rhhidden">
        <div id="rhmobtoppnl" style="background-color: #ff4136;" class="pr15 pl15 pb15 pt15">
            <div class="text-center"><a href=""><img id="mobpanelimg" src="imgs/dx.png" alt="Logo" width="150"
                        height="45" /></a></div>
        </div>
    </div>

    <div id="rhslidingMenu">
        <div id="slide-menu-mobile"></div>
    </div>
    <div id="rhSplashSearch">
        <div class="search-header-contents">
            <div id="close-src-splash"
                class="rh-close-btn rh-hovered-scale position-relative text-center cursorpointer rh-circular-hover abdposright rtlposleft mt15 mr20 ml30"
                style="z-index:999"><span><i class="rhicon rhi-times whitebg roundborder50p rh-shadow4"
                        aria-hidden="true"></i></span></div>
            <form role="search" method="get" class="search-form" action="/">
                <input type="text" name="s" placeholder="Search" data-posttype="product">
                <input type="hidden" name="post_type" value="product" /> <button type="submit"
                    class="btnsearch hideonmobile" aria-label="Search"><i class="rhicon rhi-search"></i></button>
            </form>

        </div>
    </div>






    <script type='text/javascript' id='rehubcompare-js-extra'>
        /* <![CDATA[ */
        var comparechart = { "item_error_add": "Please, add items to this compare group or choose not empty group", "item_error_comp": "Please, add more items to compare", "comparenonce": "7aa5830f8a" };
/* ]]> */
    </script>


    <script type='text/javascript' id='wc-add-to-cart-js-extra'>
        /* <![CDATA[ */
        var wc_add_to_cart_params = { "ajax_url": "\/wp-admin\/admin-ajax.php", "wc_ajax_url": "\/?wc-ajax=%%endpoint%%", "i18n_view_cart": "View cart", "cart_url": "https:\/\/recompare.wpsoul.net\/cart\/", "is_cart": "", "cart_redirect_after_add": "no", "i18n_added_to_cart": "Has been added to cart." };
/* ]]> */
    </script>


    <script type='text/javascript' id='woocommerce-js-extra'>
        /* <![CDATA[ */
        var woocommerce_params = { "ajax_url": "\/wp-admin\/admin-ajax.php", "wc_ajax_url": "\/?wc-ajax=%%endpoint%%" };
/* ]]> */
    </script>

    <script type='text/javascript' id='wc-cart-fragments-js-extra'>
        /* <![CDATA[ */
        var wc_cart_fragments_params = { "ajax_url": "\/wp-admin\/admin-ajax.php", "wc_ajax_url": "\/?wc-ajax=%%endpoint%%", "cart_hash_key": "wc_cart_hash_7614fabf80b9db05f41a0f8ffd5be3c4", "fragment_name": "wc_fragments_7614fabf80b9db05f41a0f8ffd5be3c4", "request_timeout": "5000" };
/* ]]> */
    </script>






    <script type='text/javascript' id='rehub-js-extra'>
        /* <![CDATA[ */
        var rhscriptvars = { "back": "back", "ajax_url": "\/wp-admin\/admin-ajax.php", "fin": "That's all", "noresults": "No results found", "your_rating": "Your Rating:", "addedcart": "Added to Cart", "nonce": "c166c4e06b", "hotnonce": "5bbdbf4e27", "wishnonce": "85c969b8dd", "searchnonce": "e16871df76", "filternonce": "7870ac84c7", "rating_tabs_id": "278fd2ef2d", "max_temp": "10", "min_temp": "-10", "helpnotnonce": "65cb8ce62d" };
/* ]]> */
    </script>


    <!-- <script>
        // Automatically scroll the container
        var container = document.querySelector('.atoscrollcontainer');
        container.scrollLeft = container.scrollWidth;
    </script> -->








    <div id="rh-woo-cart-panel" class="from-right rh-sslide-panel">
        <div id="rh-woo-cart-panel-wrap" class="rh-sslide-panel-wrap">
            <div id="rh-woo-cart-panel-heading" class="rh-sslide-panel-heading">
                <h5 class="pt15 pb15 pr15 pl20 upper-text-trans mt0 mb0 font130">Shopping cart<i
                        class="blackcolor closecomparepanel rh-sslide-close-btn cursorpointer floatright font130 rhi-times-circle rhicon"
                        aria-hidden="true"></i></h5>
            </div>
            <div id="rh-woo-cart-panel-tabs" class="rh-sslide-panel-tabs abdfullwidth mt30 pb30 pt30 width-100p">
                <div class="rh-sslide-panel-inner font120 mt10 woocommerce widget_shopping_cart"
                    id="rh-woo-cart-panel-content">
                </div>
            </div>
        </div>
    </div>
    <script defer src="/wp-content/cache/autoptimize/js/autoptimize_19f01d92512e9725c2823ed606e34658.js"></script>

    <link rel="stylesheet" href="/css/homenav.css">
    <script src="/js/homenav.js"></script>
    <style>
        /* Style the container with a rounded border, grey background and some padding and margin */
        .containerrv card {
            /* border: 2px solid #ccc; */
            background-color: #eee;
            border-radius: 5px;
            padding: 16px;
            margin: 16px 0;
        }

        .atoscrollcontainer {
            animation: scroll 5s linear infinite;
        }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Clear floats after containers */
        .containerrv card::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Float images inside the container to the left. Add a right margin, and style the image as a circle */
        .containerrv card img {
            float: left;
            margin-right: 20px;
            border-radius: 50%;
        }

        /* Increase the font-size of a span element */
        .containerrv card span {
            font-size: 20px;
            margin-right: 15px;
        }

        /* Add media queries for responsiveness. This will center both the text and the image inside the container */
        @media (max-width: 500px) {
            .containerrv card {
                text-align: center;
            }

            .containerrv card img {
                margin: auto;
                float: none;
                display: block;
            }
        }
    </style>
    <style>
        .scroll-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            /* border: 1px solid #ccc; */
        }

        .scroll-content {
            display: inline-block;
            white-space: nowrap;
            animation: scroll 13s linear infinite;
        }

        .scroll-item {
            display: inline-block;
            width: 150px;
            /* Set the width of each item */
            height: 150px;
            /* Set the height of each item */
            background-color: #f1f1f1;
            margin-right: 10px;
            /* Add some space between items */
        }

        @keyframes scroll {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>


    <style>
        .bcontentx {
            margin: 20px 75px 20px 75px;
        }

        .nvcon {
            width: 700px;
            margin-top: 20px;
        }

        @media(max-width:500px) {
            .bcontentx {
                margin: 20px 10px 20px 10px;
            }

            .nvcon {
                width: 400px;
            }
        }

        @media(max-width:800px) {
            .bcontentx {
                margin: 20px 40px 20px 40px;
            }

            .nvcon {
                width: 400px;
            }
        }

        @media(max-width:600px) {
            .bcontentx {
                margin: 20px 20px 20px 20px;
            }

            .nvcon {
                width: 400px;
            }
        }
    </style>

</body>

</html>
<!-- Dynamic page generated in 1.298 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2023-09-04 17:24:11 -->

<!-- super cache -->