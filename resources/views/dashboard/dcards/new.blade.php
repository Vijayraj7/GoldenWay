<style>
    #refModal .modal-content {
        position: relative;
        width: 100%;
        max-width: 600px;
        margin: auto;
    }

    #refModal .modal-content img {
        width: 100%;
        height: auto;
        display: none;
        transition: opacity 1s;
    }

    #refModal .modal-content img.active {
        display: block;
        opacity: 1;
    }
</style>
<div
    class="modal fade"
    id="refModal"
    style="z-index: 2000 !important;"
    tabindex="-1"
    aria-hidden="true"
>
    <div style="width: 100%; height: 100%;  display: flex !important; align-items: center !important;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 5%; background-color: black;">
                <img
                    style="border-radius: 10px;"
                    class="active"
                    src="/bcks/lapsell1.png"
                    alt="Image 1"
                >
                <!-- <img style="border-radius: 10px;" src="/bcks/lapsell1.jpeg" alt="Image 2"> -->
                <div style="height: 15px;"></div>
                <button
                    type="button"
                    onclick="nextrefImage()"
                    id="refnextButton"
                    class="btn btn-warning"
                >Next</button>
                <button
                    type="button"
                    id="refdoneButton"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    class="btn btn-primary"
                >Got It</button>
                <a href="tel://+917736046077" style="margin-top: 10px; background-color:#d037dd; border-color: #d037dd;" class="btn btn-success">Buy Laptop</a>
            </div>
        </div>
    </div>
</div>
<script>
            // window.history.replaceState({}, document.title, '/');
</script>
@if (isTest() || true)
    @if (!Session::hasOldInput())
<script>
            $(document).ready(function() {
                $('#refModal').modal('show');
            });
</script>
@endif
@endif
<script>
    let rfcurrentIndexrf = 0;
    const nextButton = document.getElementById('refnextButton');
    const doneButton = document.getElementById('refdoneButton');
    const rfimages = document.querySelectorAll('#refModal .modal-content img');

    function showImage(index) {
        rfimages.forEach((img, i) => {
            img.classList.toggle('active', i === index);
        });
        if (index === rfimages.length - 1) {
            nextButton.style.display = 'none';
            doneButton.style.display = 'inline-block';
        } else {
            nextButton.style.display = 'inline-block';
            doneButton.style.display = 'none';
        }
    }

    function nextrefImage() {
        rfcurrentIndexrf = (rfcurrentIndexrf < rfimages.length - 1) ? rfcurrentIndexrf + 1 : 0;
        showImage(rfcurrentIndexrf);
    }


    // Initially show the first image and hide the done button
    showImage(rfcurrentIndexrf);
</script>
<!-- 2 -->
<!-- <div class="scrolling-container">
    <div class="scrolling-content">
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="USDT Logo" class="icon">
        <span class="text">Coming Soon: Tap and Mine USDT!</span>
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="Mining Icon" class="icon">
        <span class="text">Coming Soon: Exciting new feature to earn USDT easily!</span>
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="USDT Logo" class="icon">
        <span class="text">Coming Soon: Get ready to mine USDT with just a tap!</span>
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="Mining Icon" class="icon">
        <span class="text">Coming Soon: Claim USDT by refer friends!</span>
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="Mining Icon" class="icon">
    </div>
</div> -->
<style>
.scrolling-container {
    position: fixed;
    bottom: 0;
    z-index: 6000;
    width: 100%;
    background-color: red;
    padding: 10px 0;
    overflow: hidden;
    animation: glow 1.5s ease-in-out infinite alternate;
}

.scrolling-content {
    display: flex;
    white-space: nowrap;
    animation: scroll 20s linear infinite;
    align-items: center;
}

.scrolling-content .icon {
    width: 40px;
    height: 40px;
    margin: 0 10px;
}

.scrolling-content .text {
    color: #fff;
    font-size: 18px;
    margin-right: 20px;
}

/* Scroll animation */
@keyframes scroll {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-100%);
    }
}

/* Glow animation */
@keyframes glow {
    0% {
        box-shadow: 0 0 5px rgba(8, 106, 16, 0.5);
    }
    100% {
        box-shadow: 0 0 20px rgba(0, 255, 127, 1);
    }
}
</style>
