<div class="menu" id="menu">
    <div class="close-menu">
        <ion-icon name="close-outline" id="close-menu"></ion-icon>
    </div> 
    <a href="{{route('main')}}" class="logoHolder"> 
        <img src="{{ asset('tempPics/blapuz.jpg') }}" alt="Boss Lapuz Gym">
    </a>
    <div class="all-menu">
        <div class="qr-container">
            <a href="{{route('main')}}" id="dash-title">
                <h1 id="page-title">Dashboard</h1>
            </a>
            <a href="{{route('admin.scanner')}}" id="qr-scanner">
                <i class="fa-solid fa-expand"></i>
            </a>
        </div>
        <h5 class="menu-heading" id="section-account">ACCOUNT</h5>
        <ul>
            <li><a href="{{route('admin.profile')}}">Profile Settings</a></li>
        </ul>
        <h5 class="menu-heading" id="section-name">MEMBER MANAGEMENT</h5>
        <ul>
            <li><a href="{{route('page.list')}}">Member List</a></li>
            <li><a href="#">Member Monitoring</a></li>
            <li><a href="#">Guest Monitoring</a></li>
        </ul>
        <h5 class="menu-heading" id="section-name">GYM MANAGEMENT</h5>
        <ul>
            <li><a href="{{route('admin.rates')}}">Membership Rates</a></li>
            <li><a href="#">Promotions</a></li>
            <li><a href="{{route('admin.payments')}}">Payments</a></li>
            <li><a href="{{route('admin.history')}}">Transactions History</a></li>
            <li><a href="#">Reports & Records</a></li>
            <li><a href="#">Reviews & Feedback</a></li>
            <li><a href="#">Lost Items Record</a></li>
        </ul>

        <div class="logoutButton">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <div class="logout">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </div>
                    <p>LOG OUT</p>
                </a>
            </form>
        </div>
    </div>
</div>