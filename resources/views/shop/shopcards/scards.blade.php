<nav style="max-width: 100% !important; width: 100% !important;"
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <form action="/shop" class="tform" method="post">
                    @csrf
                    <input id="tsch" name="srch" type="text" value="{{old('srch')}}"
                        class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                </form>
            </div>
        </div>
        <script>
            const node = document.getElementById("tsch");
            node.addEventListener("keyup", function (event) {
                if (event.key === "Enter") {
                    osubmit();
                }
            });
        </script>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <!-- <li class="nav-item lh-1 me-3">
                <header class="">
                    <div class="form">
                        <form action="/shop" class="tform" method="post">
                            @csrf
                            <span class="mr-md-auto">32 Items found </span>
                            <select name="tr" class="mr-2 form-control">
                                <option value="l">Latest items</option>
                                <option value="t">Trending</option>
                                <option value="lh">Low to High</option>
                                <option value="hl">High to Low</option>
                            </select>
                        </form>
                    </div>
                </header>
            </li> -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAQZJREFUaEPt2dEOwiAMBdC7f9Zn9Vn/WYO6ZFmUlpasbXJ5lUIPdIPMBcXbUjx/EBC9gzN24LlDSGNeANxmwaXJNPOMAlr/M4CHZnCpTxSg5TUFEQmYgogGuBEZAC5EFoAZkQlgQmQDDCMyAoYQWQFqRGaACpEB4MrBFfy9p1juQtsrjisHVzABnxVwLaIrmDvAHXDWH0uIJcQSetcAT2Lp00nvdx5kLCHni0RTQlcA7Xumtkljjj703XmlydbgO4CTUiCNGQJouWsRaQFaRGqABpEeICFKAHqIMoB/iFKAX4hygD2iJGCLKAtYEe3Pu14LO4mVN4lju0nbfWw2htkIMCza1JAXSkZbMYNhycIAAAAASUVORK5CYII=" />
                    </div>
                </a>
            </li>
            <!--/ User -->
        </ul>
    </div>


</nav>