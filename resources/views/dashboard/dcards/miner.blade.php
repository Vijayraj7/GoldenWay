<?php
use Carbon\Carbon;
?>
@if (false)
    <?php
    $locked_or_withdraw_table = 'customer_transactions';
    $cs_plan_amount = DB::table('customer_plans')
        ->where('csId', $v->id)
        ->where('pstatus', '1')
        ->get()
        ->sum('pamount');
    if ($cs_plan_amount < 1) {
        $locked_or_withdraw_table = 'customer_locked_transactions';
    }
    $balance_hour_tap = 1000;
    $tap_hour = 0;
    $minute_diff = 0;
    $mine_row = DB::table($locked_or_withdraw_table)
        ->where('csId', $v->id)
        ->where('tType', 'mine_amount')
        ->first();
    if ($mine_row) {
        $tap_hour = $mine_row->mine_hour_tap;
        $minute_diff = Carbon::parse($mine_row->mine_last_hour)->diffInMinutes(Carbon::now());
        if ($minute_diff >= 60) {
            $tap_hour = 0;
            DB::table($locked_or_withdraw_table)->updateOrInsert(
                [
                    'csId' => $v->id,
                    'tType' => 'mine_amount',
                ],
                [
                    'mine_hour_tap' => 0,
                    'mine_last_hour' => Carbon::now(),
                ],
            );
            $minute_diff = 0;
        }
    }
    $balance_hour_tap -= $tap_hour;
    
    ?>
    <div class="min_container" style="margin-top: 45px;">
        <div class="min_coin_container">
            <!-- <img class="mine_coin" src="https://cdn-icons-png.freepik.com/512/5971/5971363.png" alt> -->
            <div class="mine_coin">
                <div class="mine_inner">
                    <img id="mine_img"
                        src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png"
                        alt="">
                </div>
            </div>
        </div>
        <div class="mine_max_tap">{{ $balance_hour_tap }}/1000</div>
        <p>{{ 60 - $minute_diff }} minute left to refresh</p>
        <div class="mine_total_amount">USDT MINED
            {{ number_format(DB::table($locked_or_withdraw_table)->where('csId', $v->id)->where('tType', 'mine_amount')->sum('tAmount'),15) }}
        </div>
    </div>
    <style>
        .mine_coin {
            height: 350px;
            cursor: pointer;
            padding: 10%;
            background-color: rgb(2, 47, 2);
            box-shadow: 0px 0px 20px 5px rgba(4, 84, 4, 0.928);
            /* border-radius: 85px 85px 85px 10px; */
            border-radius: 100%;
            /* transition: transform 0.3s ease; */
        }

        .mine_inner {
            width: 100%;
            height: 100%;
            padding: 16%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* animation: borderAnimation 6s infinite ease-in; */
            box-shadow: 0px 0px 20px 5px rgb(23, 144, 105);
            /* border-radius: 85px 10px 85px 85px; */
            border-radius: 100%;
            background-color: rgb(7, 79, 7);
        }

        #mine_img {
            user-select: none;
            width: 100%;
            opacity: 1;
            /* Initial opacity */
            transform: scale(1);
            /* Initial scale */
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
            /* height: 100%; */
        }

        #mine_img.scale_down {
            opacity: 1;
            transform: scale(1);
            /* Scale down for a fading effect */
        }

        .min_container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 0px;
            margin-bottom: 40px;
        }

        .min_coin_container {
            width: 350px;
            height: 350px;
            position: relative;
        }

        .mine_coin.bounce {
            animation: bounce 0.5s ease;
        }

        .mine_max_tap {
            margin-top: 15px;
            font-size: 16px;
            color: white;
            font-weight: 400;
            text-transform: uppercase;
        }

        .mine_total_amount {
            margin-top: 10px;
            font-size: 20px;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
        }

        /* .mine_coin.coin_clicked + .mined_amount {
    opacity: 1;
    transform: translate(-50%, -150%) scale(2);
    animation: explode 0.5s ease forwards, fadeOut 0.5s ease forwards 0.3s;
} */

        .mined_amount {
            position: absolute;
            font-size: 16px;
            color: white;
            font-weight: 700;
            pointer-events: none;
            opacity: 0;
            animation: explode 0.6s ease forwards, fadeOut 0.6s ease forwards 0.1s;
        }

        /* @keyframes borderAnimation {
            0% , 100% {
                border-radius: 100% 100% 100% 80%;
            }
            25% {
                border-radius: 100% 100% 80% 100%;
            }
            50% {
                border-radius: 100% 80% 100% 100%;
            }
            75% {
                border-radius: 80% 100% 100% 100%;
            }
        } */

        @keyframes borderAnimation {
            0% {
                box-shadow: 10px 0px 10px #26a17bff;
            }

            25% {
                box-shadow: 0px 10px 10px #26a17bff;
            }

            50% {
                box-shadow: -10px 0px 10px #26a17bff;
            }

            75% {
                box-shadow: 0px -10px 10px #26a17bff;
            }

            100% {
                box-shadow: 10px 0px 10px #26a17bff;
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: scale(1);
            }

            25% {
                transform: scale(0.92);
            }

            50% {
                transform: scale(0.95);
            }

            75% {
                transform: scale(1);
            }
        }

        @keyframes explode {
            0% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }

            100% {
                transform: translate(-50%, -450%) scale(1.22);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
            }
        }
    </style>
    @php
        $cs_plamount = DB::table('customer_plans')
            ->where('csId', $v->id)
            ->get()
            ->sum('pamount');
        $tap_per_amount = $cs_plamount < 100 ? 100 : $cs_plamount;
    @endphp
    <script>
        let totalAmount = Number(
            "{{ number_format(DB::table($locked_or_withdraw_table)->where('csId', $v->id)->where('tType', 'mine_amount')->sum('tAmount'),15) }}"
        );
        let max_tap = 1000;
        let tap_count = 0;
        let send_count = 0;
        var balance_tap = Number('{{ $balance_hour_tap }}');

        let timer = null;
        let start_send = false;
        let postDelay = 800; // 10 seconds

        document.querySelector('.mine_coin').addEventListener('pointerdown', function(event) {
            const coin = this;
            const coinContainer = document.querySelector('.min_coin_container');
            const totalAmountDisplay = document.querySelector('.mine_total_amount');
            const mine_max_tap = document.querySelector('.mine_max_tap');
            const mine_img = document.getElementById('mine_img');

            tap_count++;
            balance_tap--;
            if (balance_tap >= 0) {
                send_count++;
                mine_max_tap.textContent = balance_tap.toString() + '/1000';
                if (tap_count % 2 == 0) {
                    mine_img.src =
                        'https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png';
                    mine_img.classList.toggle('scale_down');
                } else {
                    mine_img.src = '/tst/gmstether.png';
                    mine_img.classList.toggle('scale_down');
                }


                setTimeout(() => {
                    mine_img.classList.toggle('scale_down'); // Add transition class after image change
                }, 300); // Schedule transition for smooth animation




                // Vibrate the device on touch (if supported)
                if (navigator.vibrate) {
                    navigator.vibrate(50); // Vibrate for 100 milliseconds
                }

                // If the coin is already animating, reset the animation by removing and re-adding the class
                coin.classList.remove('bounce');
                void coin.offsetWidth; // Trigger reflow to reset the animation
                coin.classList.add('bounce');

                // Generate a random number between 0 and 1, rounded to 2 decimal places
                // const randomAmount = parseFloat(Math.random().toFixed(8) * 0.00001);
                var amount_per_tap = Number(
                    "{{ number_format(($tap_per_amount * 5) / 100 / 720000, 15) }}"
                );
                // var amount_per_tap = amount_in_percen / 720000;
                totalAmount += amount_per_tap; // Add the random amount to the total

                // Update the total amount display
                totalAmountDisplay.textContent = `USDT MINED ${totalAmount.toFixed(15)}`;

                // Create a new div for the mined amount
                const minedAmount = document.createElement('div');
                minedAmount.className = 'mined_amount';
                minedAmount.textContent = amount_per_tap.toFixed(15).toString(); // Random amount for effect

                // Position the mined amount near the click position
                const rect = coinContainer.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;

                minedAmount.style.left = `${x}px`;
                minedAmount.style.top = `${y}px`;

                // Append the mined amount to the container
                coinContainer.appendChild(minedAmount);

                // Trigger the animation to move the mined amount upwards and fade out
                requestAnimationFrame(() => {
                    minedAmount.style.opacity = '1';
                    minedAmount.style.transform = 'translateY(-200px)';
                });

                // Remove the mined amount after the animation completes
                setTimeout(() => {
                    minedAmount.remove();
                    if (start_send == false) {
                        if (send_count == 50) {
                            start_send = true;
                            sendTapData(send_count);
                        }
                        // Reset the inactivity timer on each tap
                        resetTimer();
                    }
                }, 800); // Duration should match the longest animation time
            }
        });

        function sendTapData(tm) {
            // Construct your tap data
            const tapData = {
                sendecount: tm,
                csId: '{{ $v->id }}',
                _token: '{{ csrf_token() }}'
            };

            // Send POST request
            fetch('/singletap', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(tapData)
                })
                .then(response => {
                    start_send = false;
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    start_send = false;
                    console.log('Data successfully sent:', data);
                    // Reset tap batch count after sending
                    send_count -= tm;
                })
                .catch(error => {
                    start_send = false;
                    console.error('Error sending tap data:', error);
                });
        }

        function resetTimer() {
            // Clear the existing timer
            if (timer) {
                clearTimeout(timer);
            }
            // Set a new timer to send data after 10 seconds of inactivity
            timer = setTimeout(() => {
                if (send_count > 0) {
                    sendTapData(send_count);
                }
            }, postDelay);
        }
    </script>
@elseif(false)
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <!-- test -->
    <div class="min_container" style="margin-top: 45px;">
        <div class="min_coin_container">
            <!-- <img class="mine_coin" src="https://cdn-icons-png.freepik.com/512/5971/5971363.png" alt> -->
            <div class="mine_coin">
                <div class="mine_inner">
                    <!-- <img id="mine_img"
                    src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png"
                    alt=""> -->
                    <div id="mine_img">

                    </div>
                    <div class="countdown_container">
                        <div class="countdown">
                            <!-- <div style="display: none;">
                                <span id="months">00</span>
                                <div class="label">Months</div>
                            </div>
                            <div>
                                <span id="days">00</span>
                                <div class="label">Days</div>
                            </div>
                            <div>
                                <span id="hours">00</span>
                                <div class="label">Hours</div>
                            </div> -->
                            <div>
                                <span id="minutes">00</span>
                                <div class="label">Minutes</div>
                            </div>
                            <div>
                                <span id="seconds">00</span>
                                <div class="label">Seconds</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 10px;"></div>
        <div class="mine_max_tap">Mining Begins: 17-09-2024 10 AM</div>
        <div class="mine_total_amount">STAY TUNED</div>
    </div>
    <style>
        .countdown_container {
            position: absolute;
            height: 80px;
            display: flex;
            border-radius: 15px;
            justify-content: center;
            align-items: center;
            background-color: black;
            width: 100%;
        }

        .countdown {
            text-align: center;
        }

        .countdown div {
            display: inline-block;
            margin: 0 5px;
        }

        .countdown div span {
            display: block;
            color: rgb(26, 196, 26);
            font-size: 1rem;
        }

        .label {
            font-size: 0.8rem;
            color: white;
        }

        @media (max-width: 48rem) {
            .countdown div span {
                font-size: 1rem;
            }

            .label {
                font-size: 0.875rem;
            }
        }

        @media (max-width: 30rem) {
            .countdown div {
                margin: 0 0.25rem;
            }

            .countdown div span {
                font-size: 1rem;
            }

            .label {
                font-size: 0.75rem;
            }
        }
    </style>
    <script>
        const targetDate = new Date(2024, 8, 17, 10, 0, 0);
        const now = new Date('{{ Carbon::now()->toIso8601String() }}');

        function updateCountdown() {
            now.setSeconds(now.getSeconds() + 1);
            const timeDifference = targetDate - now;
            // console.log(timeDifference);

            if (timeDifference <= 0) {
                document.getElementById("months").innerText = "00";
                document.getElementById("days").innerText = "00";
                document.getElementById("hours").innerText = "00";
                document.getElementById("minutes").innerText = "00";
                document.getElementById("seconds").innerText = "00";
                return;
            }

            const months = Math.floor(timeDifference / (1000 * 60 * 60 * 24 * 30));
            const days = Math.floor(
                (timeDifference % (1000 * 60 * 60 * 24 * 30)) / (1000 * 60 * 60 * 24)
            );
            const hours = Math.floor(
                (timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            document.getElementById("months").innerText = String(months).padStart(2, "0");
            document.getElementById("days").innerText = String(days).padStart(2, "0");
            document.getElementById("hours").innerText = String(hours).padStart(2, "0");
            document.getElementById("minutes").innerText = String(minutes).padStart(
                2,
                "0"
            );
            document.getElementById("seconds").innerText = String(seconds).padStart(
                2,
                "0"
            );
        }

        setInterval(updateCountdown, 1000);
    </script>
    <style>
        .mine_coin {
            height: 350px;
            cursor: pointer;
            padding: 10%;
            background-color: rgb(2, 47, 2);
            box-shadow: 0px 0px 20px 5px rgba(4, 84, 4, 0.928);
            /* border-radius: 85px 85px 85px 10px; */
            border-radius: 100%;
            /* transition: transform 0.3s ease; */
        }

        .mine_inner {
            width: 100%;
            height: 100%;
            padding: 16%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* animation: borderAnimation 6s infinite ease-in; */
            box-shadow: 0px 0px 20px 5px rgb(23, 144, 105);
            /* border-radius: 85px 10px 85px 85px; */
            border-radius: 100%;
            background-color: rgb(7, 79, 7);
        }

        #mine_img {
            user-select: none;
            width: 100%;
            height: 100%;
            opacity: 1;
            border-radius: 100%;
            /* Initial opacity */
            transform: scale(1);
            /* Initial scale */
            background-color: #26a17bff;
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
            /* height: 100%; */
        }

        #mine_img.scale_down {
            opacity: 1;
            transform: scale(1);
            /* Scale down for a fading effect */
        }

        .min_container {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 0px;
            margin-bottom: 40px;
        }

        .min_coin_container {
            width: 350px;
            height: 350px;
            position: relative;
        }

        .mine_coin.bounce {
            animation: bounce 0.5s ease;
        }

        .mine_max_tap {
            margin-top: 15px;
            font-size: 16px;
            color: white;
            font-weight: 400;
            text-transform: uppercase;
        }

        .mine_total_amount {
            margin-top: 10px;
            font-size: 20px;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
        }

        /* .mine_coin.coin_clicked + .mined_amount {
    opacity: 1;
    transform: translate(-50%, -150%) scale(2);
    animation: explode 0.5s ease forwards, fadeOut 0.5s ease forwards 0.3s;
} */

        .mined_amount {
            position: absolute;
            font-size: 16px;
            color: white;
            font-weight: 700;
            pointer-events: none;
            opacity: 0;
            animation: explode 0.6s ease forwards, fadeOut 0.6s ease forwards 0.1s;
        }

        /* @keyframes borderAnimation {
            0% , 100% {
                border-radius: 100% 100% 100% 80%;
            }
            25% {
                border-radius: 100% 100% 80% 100%;
            }
            50% {
                border-radius: 100% 80% 100% 100%;
            }
            75% {
                border-radius: 80% 100% 100% 100%;
            }
        } */

        @keyframes borderAnimation {
            0% {
                box-shadow: 10px 0px 10px #26a17bff;
            }

            25% {
                box-shadow: 0px 10px 10px #26a17bff;
            }

            50% {
                box-shadow: -10px 0px 10px #26a17bff;
            }

            75% {
                box-shadow: 0px -10px 10px #26a17bff;
            }

            100% {
                box-shadow: 10px 0px 10px #26a17bff;
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: scale(1);
            }

            25% {
                transform: scale(0.92);
            }

            50% {
                transform: scale(0.95);
            }

            75% {
                transform: scale(1);
            }
        }

        @keyframes explode {
            0% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }

            100% {
                transform: translate(-50%, -450%) scale(1.22);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
            }
        }
    </style>
@endif
