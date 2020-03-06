<div class="preloader-wrapper">
    <div class="preloader-new">
        <div class="circle circle_1"></div>
        <div class="circle circle_2"></div>
        <div class="circle circle_3"></div>
        <div class="circle circle_4"></div>
        <div class="circle circle_5"></div>
        <div class="circle circle_6"></div>
        <div class="circle circle_7"></div>
        <div class="circle circle_8"></div>
        <div class="circle circle_9"></div>
        <div class="company-name">
            <img src="/public/img/top_logo_preloader.webp" alt="">
        </div>
    </div>
</div>
<script>console.log('preloader')</script>
<style>
    .company-name{
        position: absolute;
        top: 57vh;
        left: 45vw;
    }
    .preloader-wrapper{
        position: absolute;
        z-index: 2000;
        width: 100%;
        height: 100vh;
        background: #fff;
    }
    .preloader-new {
        z-index: 2000;
        top: -85px;
        position: absolute;
        width: 100%;
        height: 100vh;
        overflow: hidden;
    }

    .circle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        border-style: solid;
        border-width: 5px;
        border-color: transparent;
        border-top-color: red;
        border-right-color: red;
        animation-name: rotate-ccw;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    .circle_1 {
        width: 90px;
        height: 90px;
        animation-duration: 5s;
    }

    .circle_2 {
        width: 80px;
        height: 80px;
        animation-duration: 2.5s;
    }

    .circle_3 {
        width: 70px;
        height: 70px;
        animation-duration: 1.6666666667s;
    }

    .circle_4 {
        width: 60px;
        height: 60px;
        animation-duration: 1.25s;
    }

    .circle_5 {
        width: 50px;
        height: 50px;
        animation-duration: 1s;
    }

    .circle_6 {
        width: 40px;
        height: 40px;
        animation-duration: 0.8333333333s;
    }

    .circle_7 {
        width: 30px;
        height: 30px;
        animation-duration: 0.7142857143s;
    }

    .circle_8 {
        width: 20px;
        height: 20px;
        animation-duration: 0.625s;
    }

    .circle_9 {
        width: 10px;
        height: 10px;
        animation-duration: 0.5555555556s;
    }
    @keyframes rotate-ccw {
        0% {
            transform: translate(-50%, -50%) rotate(0);
        }
        100% {
            transform: translate(-50%, -50%) rotate(-360deg);
        }
    }
</style>