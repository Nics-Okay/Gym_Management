<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Boss Lapuz Gym</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/indexMenuStyle.css') }}">
</head>
<body>
    <div class="index-main">
        <!-- session error -->
        @if(session('error'))
        <div style="color: red; position:absolute;">
            {{ session('error') }}
        </div>
        @endif
        <!-- session error end -->

        <!-- index specific menu -->
        <div class="menu">
            <div class="index-menu-close">
                <ion-icon name="close-outline" id="closeMenu"></ion-icon>
            </div>
            <div class="get-started">
                <a href="{{ route('login') }}">GET STARTED</a>
            </div>
            <div class="menu-nav">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">RATES</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="#">ABOUT</a></li>
                </ul>
            </div>
        </div>
        <!-- index specific menu end -->

        <!-- index top/header -->
        <div class="index-top">
            <div class="index-menu">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="index-top-left">
                <img src="{{ asset('tempPics/indexLogo.png') }}" alt="Boss Lapuz">
                <h1>BOSS LAPUZ FITNESS GYM</h1>
            </div>
            <div class="index-top-middle">
                <div class="index-top-nav">
                    <a href="#">Home</a>
                </div>
                <div class="index-top-nav">
                    <a href="#">Rates</a>
                </div>
                <div class="index-top-nav">
                    <a href="#">Contact</a>
                </div>
                <div class="index-top-nav">
                    <a href="#">About</a> 
                </div>
            </div>
            <div class="index-top-right">
                <div class="index-top-guest" id="sign-up">
                    <a href="{{ route('register') }}">Sign up</a>
                </div>
                <div class="index-top-guest" id="log-in">
                    <a href="{{ route('login') }}">Log in</a>
                </div>
            </div>
        </div>
        <div class="index-body">
            <div class="index-body-left">
                <div class="index-body-content">
                    <h5 id="web-h5">UNLEASH YOUR STRENGTH, TRANSFORM YOUR LIFE!</h5>
                    <h5 id="mobile-h5">
                        <p id="unleash">UNLEASH</p>
                        <p id="your-strength">YOUR STRENGTH,</p>
                        <p id="transform">TRANSFORM</p>
                        <p id="your-life">YOUR LIFE!</p>
                    </h5>
                    <p id="message">Boss Lapuz Fitness Gym is here to help you reach your fitness goals.</p>
                    <p id="message">Start your journey with a healthier you today.</p>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('filter') }}">PROCEED</a>
                            @else
                                <a href="{{ route('login') }}">JOIN US</a>
                        @endauth
                    @endif
                </div>
            </div>
            <div class="index-body-right">
                <img src="{{ asset('tempPics/anim-gym.png') }}" alt="img">
            </div>
        </div>
        <div class="footer">
            <div class="footer-info"></div>
            <div class="footer-info-2"></div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>