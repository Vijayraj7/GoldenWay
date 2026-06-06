<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="/css/shop.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"> -->


    <!-- All -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>
    <!-- EndAll -->

</head>

<body>
    <div class="container">
        @include('shop.shopcards.scards')

        <div id="content" class="my-5">

            <div id="filterbar" class="collapse show">
                <div class="box border-bottom">
                    <div class="form-group text-center">
                        <div class="btn-group" data-toggle="buttons"> <label class="btn btn-success form-check-label">
                                <input class="form-check-input" type="radio"> Reset </label> <label
                                class="btn btn-success form-check-label active"> <input class="form-check-input"
                                    type="radio" checked> Apply </label> </div>
                    </div>
                    <div> <label class="tick">New <input type="checkbox" checked="checked"> <span class="check"></span>
                        </label> </div>
                    <div> <label class="tick">Sale <input type="checkbox"> <span class="check"></span> </label> </div>
                </div>
                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Outerwear <button
                            class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box"
                            aria-expanded="true" aria-controls="inner-box" id="out" onclick="outerFilter()"> <span
                                class="fas fa-plus"></span>
                        </button> </div>
                    <div id="inner-box" class="collapse show mt-2 mr-1">
                        <div class="my-1"> <label class="tick">Windbreaker <input type="checkbox" checked="checked">
                                <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">Jumpsuit <input type="checkbox"> <span
                                    class="check"></span>
                            </label> </div>
                        <div class="my-1"> <label class="tick">Jacket <input type="checkbox"> <span
                                    class="check"></span>
                            </label> </div>
                        <div class="my-1"> <label class="tick">Coat <input type="checkbox"> <span class="check"></span>
                            </label> </div>
                        <div class="my-1"> <label class="tick">Raincoat <input type="checkbox"> <span
                                    class="check"></span>
                            </label> </div>
                        <div class="my-1"> <label class="tick">Handbag <input type="checkbox" checked> <span
                                    class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">Warm vest <input type="checkbox"> <span
                                    class="check"></span>
                            </label> </div>
                        <div class="my-1"> <label class="tick">Wallets <input type="checkbox" checked> <span
                                    class="check"></span> </label> </div>
                    </div>
                </div>
                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">season <button class="btn ml-auto"
                            type="button" data-toggle="collapse" data-target="#inner-box2" aria-expanded="false"
                            aria-controls="inner-box2"><span class="fas fa-plus"></span></button> </div>
                    <div id="inner-box2" class="collapse mt-2 mr-1">
                        <div class="my-1"> <label class="tick">Spring <input type="checkbox" checked="checked"> <span
                                    class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">Summer <input type="checkbox"> <span
                                    class="check"></span>
                            </label> </div>
                        <div class="my-1"> <label class="tick">Autumn <input type="checkbox" checked> <span
                                    class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">Winter <input type="checkbox"> <span
                                    class="check"></span>
                            </label> </div>
                        <div class="my-1"> <label class="tick">Rainy <input type="checkbox"> <span class="check"></span>
                            </label> </div>
                    </div>
                </div>
                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">price <button class="btn ml-auto"
                            type="button" data-toggle="collapse" data-target="#price" aria-expanded="false"
                            aria-controls="price"><span class="fas fa-plus"></span></button> </div>
                    <div class="collapse" id="price">
                        <div class="middle">
                            <div class="multi-range-slider"> <input type="range" id="input-left" min="0" max="100"
                                    value="10"> <input type="range" id="input-right" min="0" max="100" value="50">
                                <div class="slider">
                                    <div class="track"></div>
                                    <div class="range"></div>
                                    <div class="thumb left"></div>
                                    <div class="thumb right"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div> <span id="amount-left" class="font-weight-bold"></span> uah </div>
                            <div> <span id="amount-right" class="font-weight-bold"></span> uah </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-label text-uppercase d-flex align-items-center">size <button class="btn ml-auto"
                            type="button" data-toggle="collapse" data-target="#size" aria-expanded="false"
                            aria-controls="size"><span class="fas fa-plus"></span></button> </div>
                    <div id="size" class="collapse">
                        <div class="btn-group d-flex align-items-center flex-wrap" data-toggle="buttons"> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox">
                                80 </label> <label class="btn btn-success form-check-label"> <input
                                    class="form-check-input" type="checkbox" checked> 92 </label> <label
                                class="btn btn-success form-check-label">
                                <input class="form-check-input" type="checkbox" checked> 102 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 104 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 106 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 108 </label> </div>
                    </div>
                </div>
            </div>
            <!-- <div id="products"> -->

            <div class="container-xxl flex-grow-1 container-p-y">

                @include('cards.pcard',['t'=>'c'])

            </div>
            <!-- </div> -->

        </div>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> -->

    <!-- All Js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- All Js -->

    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        var filterBtn = document.getElementById('filter-btn');
        // filterAngle.classList.add("");
        var btnTxt = document.getElementById('btn-txt');
        var filterAngle = document.getElementById('filter-angle');

        // $('#filterbar').collapse(false);
        var count = 1, count2 = 0;
        function showfil() {
            // $('#filterbar').collapse(true);
            // count++;
            if (count == 0) {
                count = 1;
                filterAngle.classList.add("fa-angle-right");
                btnTxt.innerText = "show filters";
                filterBtn.style.backgroundColor = "#36a31b";
            }
            else {
                count = 0;
                filterAngle.classList.remove("fa-angle-right");
                btnTxt.innerText = "hide filters";
                filterBtn.style.backgroundColor = "#ff935d";
            }

        }

        // For Applying Filters
        // $('#inner-box').collapse(false);
        // $('#inner-box2').collapse(false);

        // For changing NavBar-Toggler-Icon
        // var icon = document.getElementById('icon');

        // function chnageIcon() {
        //     count2++;
        //     if (count2 % 2 != 0) {
        //         icon.innerText = "";
        //         icon.innerHTML = '<span class="far fa-times-circle" style="width:100%"></span>';
        //         icon.style.paddingTop = "5px";
        //         icon.style.paddingBottom = "5px";
        //         icon.style.fontSize = "1.8rem";


        //     }
        //     else {
        //         icon.innerText = "";
        //         icon.innerHTML = '<span class="navbar-toggler-icon"></span>';
        //         icon.style.paddingTop = "5px";
        //         icon.style.paddingBottom = "5px";
        //         icon.style.fontSize = "1.2rem";
        //     }
        // }


        // // For Range Sliders
        // var inputLeft = document.getElementById("input-left");
        // var inputRight = document.getElementById("input-right");

        // var thumbLeft = document.querySelector(".slider > .thumb.left");
        // var thumbRight = document.querySelector(".slider > .thumb.right");
        // var range = document.querySelector(".slider > .range");

        // var amountLeft = document.getElementById('amount-left')
        // var amountRight = document.getElementById('amount-right')

        // function setLeftValue() {
        //     var _this = inputLeft,
        //         min = parseInt(_this.min),
        //         max = parseInt(_this.max);

        //     _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

        //     var percent = ((_this.value - min) / (max - min)) * 100;

        //     thumbLeft.style.left = percent + "%";
        //     range.style.left = percent + "%";
        //     amountLeft.innerText = parseInt(percent * 100);
        // }
        // setLeftValue();

        // function setRightValue() {
        //     var _this = inputRight,
        //         min = parseInt(_this.min),
        //         max = parseInt(_this.max);

        //     _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

        //     var percent = ((_this.value - min) / (max - min)) * 100;

        //     amountRight.innerText = parseInt(percent * 100);
        //     thumbRight.style.right = (100 - percent) + "%";
        //     range.style.right = (100 - percent) + "%";
        // }
        // setRightValue();

        // inputLeft.addEventListener("input", setLeftValue);
        // inputRight.addEventListener("input", setRightValue);

        // inputLeft.addEventListener("mouseover", function () {
        //     thumbLeft.classList.add("hover");
        // });
        // inputLeft.addEventListener("mouseout", function () {
        //     thumbLeft.classList.remove("hover");
        // });
        // inputLeft.addEventListener("mousedown", function () {
        //     thumbLeft.classList.add("active");
        // });
        // inputLeft.addEventListener("mouseup", function () {
        //     thumbLeft.classList.remove("active");
        // });

        // inputRight.addEventListener("mouseover", function () {
        //     thumbRight.classList.add("hover");
        // });
        // inputRight.addEventListener("mouseout", function () {
        //     thumbRight.classList.remove("hover");
        // });
        // inputRight.addEventListener("mousedown", function () {
        //     thumbRight.classList.add("active");
        // });
        // inputRight.addEventListener("mouseup", function () {
        //     thumbRight.classList.remove("active");
        // });
    // });
    </script>

</body>

</html>