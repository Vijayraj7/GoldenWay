<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netfish</title>
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

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">

</head>

<body>

    @include('homecards.nav')

    <div class="container">

        <div style="margin-bottom: 15px;">

            <!-- <div>
                <img src="/imgs/hm/stck.jpeg" alt="" style="width: 100%;">
            </div> -->

            <div id="viepr"></div>

            @include('shop.shopcards.scards')

        </div>
        <div class="row">
            <aside class="col-sm-3">
                <div class="sxcard">
                    <form id="combinedForm" action="/shop" method="post" style="display:none;">
                        @csrf
                    </form>
                    <form class="tform">
                        <article class="sxcard-group-item">
                            <header class="sxcard-header">
                                <h6 class="title">Range input </h6>
                            </header>
                            <div class="filter-content">
                                <div class="sxcard-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Min</label>
                                            <input type="number" name="min" value="{{ old('min') }}"
                                                class="form-control" id="inputEmail4" placeholder="00,000">
                                        </div>
                                        <div class="form-group col-md-6 text-right">
                                            <label>Max</label>
                                            <input type="number" name="max" value="{{ old('max') }}"
                                                class="form-control" placeholder="00,000">
                                        </div>
                                    </div>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- card-group-item.// -->
                        <article style="margin-top:10px;" class="sxcard-group-item">
                            <header class="sxcard-header">
                                <h6 class="title">Select Fish</h6>
                            </header>
                            <div class="filter-content">
                                <div class="sxcard-body">
                                    @foreach ($ts as $t)
                                    <div class="custom-control custom-checkbox">
                                        <!-- <span class="float-right badge badge-light round">1</span> -->
                                        <input {{ in_array($t->type, old('type_list', [])) ? 'checked' : '' }}
                                        type="checkbox" name="type_list[]" value="{{ $t->type }}"
                                        class="custom-control-input" id="Check1">
                                        <label class="custom-control-label" for="Check1">{{ $t->type }}</label>
                                    </div> <!-- form-check.// -->
                                    @endforeach
                                </div> <!-- card-body.// -->
                            </div>
                        </article>
                        @if(old('type_list') != null)
                        @for ($si = 0; $si < $subc; $si++) <article style="margin-top:10px;" class="sxcard-group-item">
                            <div class="filter-content @if($si != 0) subrem @endif">
                                <div class="sxcard-body">
                                    <select name="sub_list[]" id="" class="form-select">
                                        @foreach ($ps as $p)
                                        @isset($p->subs[$si])
                                        <option value="{{ $p->subs[$si] }}">{{ $p->subs[$si] }}</option>
                                        @endisset
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            </article>
                            @endfor
                            @endif
                    </form>
                    <article style="margin-top:10px;" class="sxcard-group-item">
                        <button type="button" onclick="reset()" class="btn btn-secondary">Reset</button>
                        <button type="button" onclick="osubmit()" class="btn btn-primary">Apply</button>
                    </article>
                </div> <!-- card.// -->



            </aside>
            <main class="col-md-9">


                <!-- sect-heading -->

                <div class="row">

                    <div class="container-xxl flex-grow-1 container-p-y">

                        @include('cards.pcard', ['t' => 'c','col' => 12, 'md' => 12, 'spc' => 'm'])

                    </div>
                </div> <!-- row end.// -->


                <!-- <nav class="mt-4" aria-label="Page navigation sample">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav> -->

            </main>
        </div>
    </div>
    <script>
        function reset() {
            // Assuming you have elements with class "elementToRemove"
            var elements = document.getElementsByClassName("subrem");
            for (var i = elements.length - 1; i >= 0; i--) {
                elements[i].remove();
            }
        }
        function osubmit() {
            var combinedForm = document.getElementById('combinedForm');
            let forms = document.getElementsByClassName("tform");
            for (var i = 0; i < forms.length; i++) {
                // forms[i].submit();
                form1Data = new FormData(forms[i]);
                // Append form data to the combined form
                form1Data.forEach(function (value, key) {
                    combinedForm.appendChild(createHiddenField(key, value));
                });
            }
            combinedForm.submit();
        }

        function createHiddenField(name, value) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            return input;
        }
    </script>
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
    <style>
        .icon-control {
            margin-top: 5px;
            float: right;
            font-size: 80%;
        }



        .btn-light {
            background-color: #fff;
            border-color: #e4e4e4;
        }

        .list-menu {
            list-style: none;
            margin: 0;
            padding-left: 0;
        }

        .list-menu a {
            color: #343a40;
        }

        .sxcard-product-grid .info-wrap {
            overflow: hidden;
            padding: 18px 20px;
        }

        [class*='sxcard-product'] a.title {
            color: #212529;
            display: block;
        }

        .sxcard-product-grid:hover .btn-overlay {
            opacity: 1;
        }

        .sxcard-product-grid .btn-overlay {
            -webkit-transition: .5s;
            transition: .5s;
            opacity: 0;
            left: 0;
            bottom: 0;
            color: #fff;
            width: 100%;
            padding: 5px 0;
            text-align: center;
            position: absolute;
            background: rgba(0, 0, 0, 0.5);
        }

        .img-wrap {
            overflow: hidden;
            position: relative;
        }
    </style>
</body>

</html>