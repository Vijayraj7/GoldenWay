<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<!-- Content -->
<div class="container-xxl flex-grow-1">
    <h5 class="pb-1 mb-4" style="color: #fff !important">GWI Bot Trade</h5>
    <div class="row">
        <style>
            .lotbox .card {
                border-left: 1px solid #f9a826ff;
                /* border: 0.1px solid #f9a826ff; */
                background-color: #0c2820 !important;
            }

            .lfcontainer {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .lfcontainer h4 {
                color: #fff;
                font-size: 12px;
            }

            .lfcontainer p {
                color: #fff;
                font-size: 12px;
            }

            .deposit-btn {
                /* background-color: #f9a826ff !important; */
                /* border-color: #f9a826ff !important; */
                background-image: linear-gradient(to right, #f9a826ff, #00D094);
                border-color: transparent !important;
                color: #fff;
                width: 100%;
            }

            .deposit-btn:hover {
                background-color: #f9a826ff !important;
                border-color: transparent !important;
            }

            .lot_title {
                background-image: linear-gradient(to right, #f9a826ff, #00D094);
                border-color: transparent !important;
                color: #fff !important;
                display: flex;
                padding: 10px;
                justify-content: center;
                align-items: center;
                width: 100%;
            }

        </style>
        <style>
            .lot_grid_container {
                display: grid;
                margin: 10px;
                grid-template-columns: repeat(10, 1fr);
                gap: 10px;
                width: 100%;
            }

            .lot_box_container {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .lot_box {
                width: 20px;
                height: 20px;
            }

            .lot_box img {
                width: 100%;
                height: 100%;
            }

            .lot_img {
                width: 300px;
                /* Adjust the size of the image */
                box-shadow: 10px 10px 15px rgba(0, 142, 36, 0.3);
                /* X, Y, Blur, Color */
                /* border-radius: 10px; */
            }

            /* Shaking animation */
            @keyframes shake {
                0% {
                    transform: translate(1px, 1px) rotate(0deg);
                }

                10% {
                    transform: translate(-1px, -2px) rotate(-1deg);
                }

                20% {
                    transform: translate(-3px, 0px) rotate(1deg);
                }

                30% {
                    transform: translate(3px, 2px) rotate(0deg);
                }

                40% {
                    transform: translate(1px, -1px) rotate(1deg);
                }

                50% {
                    transform: translate(-1px, 2px) rotate(-1deg);
                }

                60% {
                    transform: translate(-3px, 1px) rotate(0deg);
                }

                70% {
                    transform: translate(3px, 1px) rotate(-1deg);
                }

                80% {
                    transform: translate(-1px, -1px) rotate(1deg);
                }

                90% {
                    transform: translate(1px, 2px) rotate(0deg);
                }

                100% {
                    transform: translate(1px, -2px) rotate(-1deg);
                }
            }

            /* Apply the shaking animation */
            .shake {
                animation: shake 0.5s;
                /* duration */
                animation-iteration-count: infinite;
                /* repeat indefinitely */
            }

        </style>
        <script>
            function applyShakeToRandomInGroup() {
                const images = document.querySelectorAll('.lot_img');
                const groupSize = 100;

                // Clear shake class from all images
                images.forEach(img => img.classList.remove('shake'));

                // Apply shake to one random element from every group of 100 elements
                for (let i = 0; i < images.length; i += groupSize) {
                    const group = Array.from(images).slice(i, i + groupSize); // Get the group of 100 images
                    const validGroup = group.filter(img => !img.classList.contains('lot_not')); // Filter out 'lot_not' class

                    if (validGroup.length > 0) {
                        const randomIndex = Math.floor(Math.random() * validGroup.length);
                        const randomImage = validGroup[randomIndex];
                        randomImage.classList.add('shake'); // Apply shake to one random image in the group
                    }
                }

                // Repeat the process after a random interval
                const randomDelay = Math.random() * 3000 + 2000; // Random delay between 2 to 5 seconds
                setTimeout(applyShakeToRandomInGroup, randomDelay);
            }

            // Start applying shake effect
            applyShakeToRandomInGroup();

        </script>
        <script>
            var taped_boxes = [];

            function on_add_box(el_lot, lotcin, boxcin) {
                var ar_str = lotcin + '-' + boxcin;
                var lott_id = 'Lott-' + lotcin + '-' + boxcin;
                var lot_el = el_lot;
                if (taped_boxes.includes(ar_str)) {
                    var ar_index = taped_boxes.indexOf(ar_str);
                    taped_boxes.splice(ar_index, 1); // Remove the element
                    lot_el.style.backgroundColor = 'transparent';
                    // var ar_img = lot_el.querySelector('img');
                    lot_el.src = 'https://pngimg.com/d/gift_PNG100325.png'; // Set the new src
                } else {
                    taped_boxes.push(ar_str);
                    lot_el.style.backgroundColor = 'white';
                    // var ar_img = lot_el.querySelector('img');
                    lot_el.src =
                        'https://static.vecteezy.com/system/resources/previews/017/177/781/non_2x/green-tick-check-mark-on-transparent-background-free-png.png'; // Set the new src
                }
                syncButtonChange();
            }

            function syncButtonChange() {
                var purchs_btn = document.getElementById('lot_purchase_btn');
                if (taped_boxes.length > 0) {
                    purchs_btn.style.display = 'block';
                } else {
                    purchs_btn.style.display = 'none';
                }
            }

        </script>
        @for ($li = 0; $li < 2; $li++) <div class="col-md-6 col-lg-6 mb-3 lotbox">
            <div class="card h-100">
                <!-- <img class="card-img-top"
                src="/bcks/silver.png"
                alt="Card image cap" /> -->
                <div class="card-body">
                    <div class="lfcontainer">
                        <h4>Contract</h4>
                        <p>50 weeks after slot filled</p>
                    </div>
                    <div class="lfcontainer">
                        <h4>Purchase Amount</h4>
                        <p>10 USDT</p>
                    </div>
                    <div class="lfcontainer">
                        <h4>Weekly winners after slot filled</h4>
                        <p>2</p>
                    </div>
                    {{-- <p class="card-text">
                  Some quick example text to build on the card title and
                  make up the bulk of the card's content.
                </p> --}}
                    <h5 class="lot_title">Bot {{ $li + 1 }}</h5>
                    {{-- --}}
                    @if(false)
                    <div class="lfcontainer">
                        <h4 style="display: flex; align-items: center;">
                            <img src="https://pngimg.com/d/gift_PNG100325.png" style="height: 20px; width: 20px; margin-right:15px;">
                            UnPurchased Box
                        </h4>
                        <p></p>
                    </div>

                    <div class="lfcontainer">
                        <h4 style="display: flex; align-items: center;">
                            <img src="https://static.vecteezy.com/system/resources/previews/008/852/068/original/realistic-3d-white-gift-box-with-green-glossy-ribbon-bow-isolated-on-transparent-background-3d-render-isometric-modern-holiday-surprise-box-realistic-icon-for-present-birthday-or-wedding-banners-png.png" style="height: 20px; width: 20px; margin-right:15px;">
                            Purchased Box
                        </h4>
                        <p></p>
                    </div>
                    <div class="lfcontainer">
                        <h4 style="display: flex; align-items: center;">
                            <div style="padding: 3px; height: 20px; width: 20px; margin-right:15px; border-radius: 100%; border: 1px solid #fff;;">
                                <img style="width: 100%; height:100%;" src="https://static.vecteezy.com/system/resources/previews/008/852/068/original/realistic-3d-white-gift-box-with-green-glossy-ribbon-bow-isolated-on-transparent-background-3d-render-isometric-modern-holiday-surprise-box-realistic-icon-for-present-birthday-or-wedding-banners-png.png" alt="">
                            </div>
                            your Purchased Box
                        </h4>
                        <p></p>
                    </div>

                    <div class="lfcontainer">
                        <h4 style="display: flex; align-items: center;">
                            <img src="/bcks/goldbox1.png" style="height: 20px; width: 20px; margin-right:15px;">
                            Winner Box
                        </h4>
                        <p></p>
                    </div>
                    @endif
                    <!-- <a href="#"
                  data-bs-toggle="modal"
                  data-bs-target="#modalCenter"
                  onclick="onModalSilver()"
                  class="btn btn-outline-primary deposit-btn">Lot {{ $li + 1 }}</a> -->
                    <a class="btn btn-danger" href="#" data-bs-toggle="modal" onclick="onModalSilver()" data-bs-target="#modalCenter" id="lot_purchase_btn" style="display: block; width: 100%; margin-top: 10px;" href="#">Purchase</a>

                    @if ($li == 1)
                    <div style="display: flex; margin-top:80px; margin-bottom:80px; align-items:center; justify-content:center;">
                        Bot {{$li+1}}</div>
                </div>
            </div>
            @break
            @endif
    </div>
    @if(false)
    <div style="width: 100%; display: flex; justify-content: center;">

        <!-- <lottie-player src="https://lottie.host/f525ca07-39db-4167-b81e-b42457d56bb3/SS8DXM4bRC.json" background="##FFFFFF" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player> -->
        <div class="lot_grid_container">
            @for ($i = 0; $i < 100; $i++) @php $lottwithbox=DB::table('customer_lots') ->where('lotc', strval($li + 1))
                ->where('boxc', strval($i + 1))
                ->first();
                $is_winned = DB::table('customer_transactions')
                ->where('tType', 'lott_win')
                ->where('lotc', strval($li + 1))
                ->where('boxc', strval($i + 1))
                ->first();
                $showuser = false;
                if (isset($adm_card)) {
                if (isAdmin()) {
                if ($lottwithbox != null) {
                $showuser = true;
                }
                }
                }
                if ($is_winned != null) {
                $showuser = true;
                }
                @endphp
                <a @if ($showuser) @php $win_user=DB::table('customers')->where('id',$lottwithbox->csId)->first();
                    @endphp
                    href="#"
                    data-bs-toggle="modal"
                    onclick="onlottUserClick('{{ $win_user->name }}','{{ isset($adm_card) ? (isAdmin() ? $win_user->id : 'null') : 'null' }}','{{ $lottwithbox->pamount }} USDT','Lott-{{ $lottwithbox->lotc }}-{{ $lottwithbox->boxc }}','{{ $lottwithbox->msg }}')"
                    data-bs-target="#lottUserModal" @endif>
                    <div class="lot_box_container">
                        <div class="lot_box">
                            @if ($lottwithbox == null)
                            <img class="lot_img" @if (!isset($adm_card)) onclick="on_add_box(this,'{{ $li + 1 }}','{{ $i + 1 }}')" @endif id="Lott-{{ $li + 1 }}-{{ $i + 1 }}" src="https://pngimg.com/d/gift_PNG100325.png" alt="">
                            @else
                            @php
                            if ($is_winned != null) {
                            $l_img = '/bcks/goldbox1.png';
                            } else {
                            $l_img =
                            'https://static.vecteezy.com/system/resources/previews/008/852/068/original/realistic-3d-white-gift-box-with-green-glossy-ribbon-bow-isolated-on-transparent-background-3d-render-isometric-modern-holiday-surprise-box-realistic-icon-for-present-birthday-or-wedding-banners-png.png';
                            }
                            @endphp
                            @if ($lottwithbox->csId == $v->id)
                            <div style="padding: 3px; width: 100%; height: 100%; border-radius: 100%; border: 1px solid #fff;;">
                                <img class="lot_img lot_not" src="{{ $l_img }}" alt="">
                            </div>
                            @else
                            <img class="lot_img lot_not" src="{{ $l_img }}" alt="">
                            @endif
                            @endif
                        </div>
                    </div>
                </a>
                @endfor
        </div>
    </div>
    @endif
</div>
</div>
@endfor
<script>
    function onModalSilver() {
        var sil_amnt = document.getElementById('sil_amnt');
        var diam_amnt = document.getElementById('diam_amnt');
        var diam_container = document.getElementById('diam_container');
        var diam_amnt_container = document.getElementById('diam_amnt_container');
        var selmodal = document.getElementById('modalselct_trade');
        var pamountinp = document.getElementById('pamount_input');
        var slots_text = document.getElementById('slots_text');
        var pamount_text = document.getElementById('pamount_text');
        // var lotc = document.getElementById('lotc_input');
        // var boxc = document.getElementById('boxc_input');
        var seilver_title_text = document.getElementById('seilver_title_text');
        var modal_header = document.getElementById('modal_header');
        modal_header.style.backgroundColor = '#cc272a';
        var lotimg = "<img src='https://pngimg.com/d/gift_PNG100325.png' style='height:20px; width:20px;'>";
        seilver_title_text.innerHTML = "Lott Purchase";
        // seilver_title_text.style.color = clr == "#e2e2e2" ? "#000": "#fff";
        // '','','','#''','','',''
        selmodal.innerText = 'Bott';
        selmodal.value = 'lott';
        // var encodedTapedArray = JSON.stringify(taped_boxes);
        // alert(encodedTapedArray);
        // lotc.value = encodedTapedArray;
        // boxc.value = 'all';
        // var pamntotal = (taped_boxes.length * 10).toString();
        // pamountinp.value = pamntotal;
        // pamount_text.innerText = pamntotal + ' USDT';
        // // var slot_str = '';
        // taped_boxes.forEach(str => {
        //     var splitStr = str.split("-");
        //     slot_str += 'Lot-' + splitStr[0] + '-' + splitStr[1] + ', ';
        // });
        // slots_text.innerText = slot_str;



        diam_amnt_container.style.display = "block";
        diam_container.style.display = "none";
        diam_amnt.value = null;
        diam_amnt.value = null;
    }

    function onslotcount(ei) {
        var slotc = Number(ei.value);
        var pamountinp = document.getElementById('pamount_input');
        var pamount_text = document.getElementById('pamount_text');
        pamount_text.innerText = (slotc * 10).toString() + ' USDT';
        pamountinp.value = (slotc * 10).toString();
    }

</script>

@error('image')
<script>
    var pnm = "{{ old('pname') }}";
    $(document).ready(function() {
        if ("{{ old('coin_type') }}" == '') {
            $('#modalCenter').modal('show');
            if (pnm == 'lott') {
                var oldlotc = "{{ old('lotc') }}";
                var oldboxc = "{{ old('boxc') }}";
                onModalSilver();
            }
        }
    });

</script>
@enderror
<!-- <div class="modal fade show" style="display: block; z-index:2000 !important;" id="modalCenter" tabindex="-1" aria-modal="true"> -->

<style>
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 25rem;
        }

        .waletext {
            font-size: 13px !important;
        }
    }

    .form-label {
        margin-top: 8px;
    }

    .formrow {
        flex-direction: column;
    }

    .silform {
        padding: 20px;
    }

    @media (min-width: 576px) {
        .formrow .col-sm-2 {
            flex: 0 0 auto;
            width: auto !important;
        }

        .formrow .col-sm-10 {
            flex: 0 0 auto;
            width: auto !important;
        }
    }

    @media (max-width:700px) {
        .waletext {
            font-size: 10px !important;
        }
    }

    @media (max-width: 576px) {
        .modal-dialog {
            margin: 1.75rem auto !important;
        }
    }

    @media (max-width: 767.98px) {
        .modal .modal-dialog:not(.modal-fullscreen) {
            padding: 0 0rem !important;
            padding-left: 0rem !important;
        }
    }

    .dropdown-menu {
        background-color: var(--secondary-color);
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
        background-color: rgb(10 109 23 / 70%);
    }

    /* .dropdown-menu:hover{
background-color: var(--brand-color);
} */
    .dropdown-menu a {
        color: #fff !important;
    }

</style>
@if (true)
<div class="modal fade" style="z-index: 2000 !important;" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div style="margin-bottom: 40px !important;" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin-top:50px;">

            <div style="height: 70px; display:flex; align-items:center; padding-left:25px; background-color: #f9a826ff; border-radius:7px 7px 0px 0px;" id="modal_header" class="modal-header">
                <h5 class="modal-title" style="color: #fff; text-transform: uppercase;" style="text-transform:uppercase;" id="seilver_title_text">Silver Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            $total_transfer_amount = DB::table('customer_transfers')
                ->where('csId', $v->id)
                ->where('tStatus', '1')
                ->get()
                ->sum('tAmount');
            $total_transaction_amount = DB::table('customer_transactions')
                ->where('csId', $v->id)
                ->where('tStatus', '1')
                ->get()
                ->sum('tAmount');
            ?>
            <form action="/sendproduct" method="POST" id="slform" class="silform" enctype="multipart/form-data">
                @csrf



                <input type="hidden" name="pname" value="lott">
                <!--   <input type="hidden"
name="pamount"
value="500"> -->

                <input type="hidden" name="ptype" value="1">
                <input type="hidden" name="tuserid" value="0">
                <input type="hidden" name="pstatus" value="0">

                <input type="hidden" name="csId" value="{{ $v->id }}">

                <input type="hidden" id="pamount_input" name="pamount" value="10">

                <!-- <input type="hidden" id="lotc_input" name="lotc" value="10">
                <input type="hidden" id="boxc_input" name="boxc" value="10"> -->


                @php
                $totBalance =
                DB::table('customer_transfers')
                ->where('csId', $v->id)
                ->get()
                ->sum('tAmount') +
                DB::table('customer_transactions')
                ->where('csId', $v->id)
                ->get()
                ->sum('tAmount');
                @endphp

                @error('image')
                <div class="form-text" style="color: red;">{{ $message }}</div>
                @enderror


                <div style="margin-top: 30px;" class="row mb-3">
                    <label class="col-sm-2 col-form-label hnot" for="basic-icon-default-fullname">Available
                        Amount</label>
                    <div class="col-sm-10 hnot">
                        <p class="form-control" style="border: none !important;" id="basic-icon-default-fullname"><strong>
                                {{ $totBalance }} USDT
                            </strong></p>
                    </div>

                </div>

                <div style="margin-top: 10px;" class="row mb-3">
                    <label class="col-sm-2 col-form-label hnot" for="basic-icon-default-fullname">Total
                        Amount</label>
                    <div class="col-sm-10 hnot">
                        <p class="form-control" style="border: none !important;" id="basic-icon-default-fullname"><strong id="pamount_text">
                                0 USDT</strong></p>
                    </div>

                </div>

                <div style="margin-top: 10px; display: none;" class="row mb-3">
                    <label class="col-sm-2 col-form-label hnot" for="basic-icon-default-fullname">Slots</label>
                    <div class="col-sm-10 hnot">
                        <p class="form-control" style="border: none !important;" id="basic-icon-default-fullname"><strong id="slots_text">
                                10 USDT</strong></p>
                    </div>

                </div>
                <script>
                    document.getElementById('copyWallet').addEventListener('click', function() {
                        var url = "{{ $adminconfig->wallet }}";

                        navigator.clipboard.writeText(url)
                            .then(function() {
                                // Inform the user that the URL has been copied
                                alert('Copied to clipboard: ' + url);
                            })
                            .catch(function(error) {
                                // Handle errors
                                console.error('Could not copy URL: ', error);
                                alert('Could not copy URL. Please try again.');
                            });
                    });

                </script>
                <div class="formrow row mb-3">
                    <label style="margin-top: 7px;" class="col-sm-2 form-label" for="basic-icon-default-message">Type</label>
                    <div class="col-sm-10">

                        <select class="form-select" name="pname" id="slctplans">

                            <option selected id="modalselct_trade" value="lott">Lott</option>


                        </select>
                    </div>
                </div>





                <div id="diam_amnt_container" class="formrow row mb-3">
                    <label style="margin-top: 7px;" class="col-sm-2 form-label" for="basic-icon-default-message">Total Slots</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-dollar"></i></span>
                            <input type="text" name="slotcount" oninput="onslotcount(this)" value="{{old('slotcount')}}" id="slot_amnt" required aria-required="true" class="form-control phone-mask" placeholder="Total slots you want" aria-label="Total slots you want" aria-describedby="sil_amnt" />
                        </div>
                    </div>
                </div>

                <div class="formrow mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-message">Transaction
                        password</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <img src="https://cdn-icons-png.freepik.com/512/10204/10204254.png" style="height: 14px;">
                            </span>
                            <input type="text" name="tpassword" value="{{ old('tpassword') }}" id="basic-icon-default-message2" class="form-control phone-mask" placeholder="Transaction password" aria-label="Transaction password" aria-describedby="basic-icon-default-message2" />
                        </div>
                    </div>
                </div>


                <div class="formrow row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-message">Remark</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <!-- <i class="bx bx-comment"></i> -->
                                <img src="https://cdn-icons-png.flaticon.com/512/2593/2593491.png" style="height: 14px;">
                            </span>
                            <input type="text" name="msg" value="{{ old('msg') ?? 'Thanks' }}" id="basic-icon-default-message2" class="form-control phone-mask" placeholder="Remark" aria-label="Remark" aria-describedby="basic-icon-default-message2" />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="" style="display: flex; justify-content: end;">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary">Cancel</button>
                        <button style="margin-left: 10px;" type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endif


<script>
    function onlottUserClick(uname, lid, pramount, slotthis, lremark) {
        var lu_user_name = document.getElementById('lu_user_name');
        var lu_link = document.getElementById('lu_link');
        var lu_pamount_text = document.getElementById('lu_pamount_text');
        var lu_slot_text = document.getElementById('lu_slot_text');
        var lu_remark = document.getElementById('lu_remark');
        lu_user_name.innerText = uname;
        if (lid == 'null') {
            lu_link.href = 'javascript:void(0)';
        } else {
            lu_link.href = '/admin/user/' + lid;
        }
        lu_pamount_text.innerText = pramount;
        lu_slot_text.innerText = slotthis;
        lu_remark.innerText = lremark;
    }

</script>
<div class="modal fade" style="z-index: 2000 !important;" id="lottUserModal" tabindex="-1" aria-hidden="true">
    <div style="margin-bottom: 40px !important;" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="margin-top:50px;">
            <div style="height: 70px; display:flex; align-items:center; padding-left:25px; background-color: #f9a826ff; border-radius:7px 7px 0px 0px;" id="modal_header" class="modal-header">
                <h5 class="modal-title" style="color: #fff; text-transform: uppercase;" style="text-transform:uppercase;" id="seilver_title_text">User Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <?php
        $total_transfer_amount = DB::table('customer_transfers')
            ->where('csId', $v->id)
            ->where('tStatus', '1')
            ->get()
            ->sum('tAmount');
        $total_transaction_amount = DB::table('customer_transactions')
            ->where('csId', $v->id)
            ->where('tStatus', '1')
            ->get()
            ->sum('tAmount');
        ?>
            <form action="/sendproduct" method="POST" id="slform" class="silform" enctype="multipart/form-data">
                @csrf
                <div style="margin-top: 30px;" class="row mb-3">
                    <label class="col-sm-2 col-form-label hnot" for="basic-icon-default-fullname">User Name</label>
                    <div class="col-sm-10 hnot">
                        <p class="form-control" style="border: none !important;" id="basic-icon-default-fullname">
                            <a id="lu_link" href=""><strong id="lu_user_name"> Saneesh </strong></a>
                        </p>
                    </div>
                </div>

                <div style="margin-top: 10px;" class="row mb-3">
                    <label class="col-sm-2 col-form-label hnot" for="basic-icon-default-fullname">Purchased
                        Amount</label>
                    <div class="col-sm-10 hnot">
                        <p class="form-control" style="border: none !important;" id="basic-icon-default-fullname">
                            <strong id="lu_pamount_text">10 USDT</strong>
                        </p>
                    </div>
                </div>

                <div style="margin-top: 10px;" class="row mb-3">
                    <label class="col-sm-2 col-form-label hnot" for="basic-icon-default-fullname">Slot</label>
                    <div class="col-sm-10 hnot">
                        <p class="form-control" style="border: none !important;" id="basic-icon-default-fullname">
                            <strong id="lu_slot_text">Lott-1-23</strong>
                        </p>
                    </div>
                </div>

                <div class="formrow row mb-3">
                    <label style="margin-top: 7px;" class="col-sm-2 form-label" for="basic-icon-default-message">Type</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="pname" id="slctplans">
                            <option selected id="modalselct_trade" value="lott">Lott</option>
                        </select>
                    </div>
                </div>

                <div class="formrow row mb-3">
                    <label class="col-sm-2 form-label" for="basic-icon-default-message">Remark</label>
                    <div class="col-sm-10">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-message2" class="input-group-text">
                                <!-- <i class="bx bx-comment"></i> -->
                                <img src="https://cdn-icons-png.flaticon.com/512/2593/2593491.png" style="height: 14px;">
                            </span>
                            <input type="text" name="msg" value="{{ old('msg') ?? 'Thanks' }}" id="lu_remark" class="form-control phone-mask" placeholder="Remark" aria-label="Remark" aria-describedby="lu_remark" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
