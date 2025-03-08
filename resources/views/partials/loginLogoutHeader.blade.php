<style>
    .loginLogout-top {
        position: absolute;
        display: flex;
        align-items: center;
        top: 0;
        height: 11%;
        width: 100%;
        overflow: hidden;
    }

    .loginLogout-top-left {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height: 100%;
        width: 5%;
        color: white;
        overflow: hidden;
    }

    @media (max-width: 639px) {
        .loginLogout-top-left {
            width: 15%;
        }
    }
    

    .loginLogout-top-left ion-icon {
        color: white;
        font-size: 30px;
    }

    .loginLogout-top-middle {
        display: flex;
        align-items: center;
        height: 100%;
        width: 95%;
        font-family: Verdana, Geneva, "Tahoma", sans-serif;
    }

    @media (max-width: 639px) {
        .loginLogout-top-middle {
            width: 85%;
        }
    }

    .loginLogout-top-middle img{
        height: 140%;
        aspect-ratio: 1/1;
        margin: 0 5px -7px 20px;
    }

    @media (max-width: 639px) {
        .loginLogout-top-middle img{
            height: 80%;
            aspect-ratio: 1/1;
            margin: 0 5px 0px 0px;
        }
    }

    .loginLogout-top-middle h1 {
        font-size: 23px;
        font-weight: 900;
        color: white;
        margin: 0;
        padding: 0;
    }

    #mobile-h1 {
        display: none;
    }

    @media (max-width: 639px) {
        .loginLogout-top-middle h1 {
            font-weight: 900;
            font-size: 14px;
        }

        #mobile-h1 {
            display: contents;
        }

        #web-h1 {
            display: none;
        }
    }

</style>

<div class="loginLogout-top">
    <div class="loginLogout-top-left">
        <a href="{{ route('index') }}"><ion-icon name="chevron-back-outline"></ion-icon></a>
    </div>
    <div class="loginLogout-top-middle">
        <img src="{{ asset('tempPics/indexLogo.png') }}" alt="Boss Lapuz">
        <h1 id="web-h1">BOSS LAPUZ FITNESS GYM</h1>
        <h1 id="mobile-h1">BOSS LAPUZ GYM</h1>
    </div>
</div>