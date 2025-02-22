<div class="menu">
    <a href="{{route('main')}}" class="logoHolder">
        <img src="{{ asset('tempPics/blapuz.jpg') }}" alt="Boss Lapuz Gym">
    </a>
    <div class="all-menu">
        <div class="qr-container">
            <a href="{{route('main')}}" id="dash-title">
                <h1 id="page-title">Dashboard</h1>
            </a>
            <a href="#" id="qr-scanner">
                <ion-icon name="scan"></ion-icon>
            </a>
        </div>
        <h5 class="menu-heading" id="section-account">ACCOUNT</h5>
        <ul>
            <li><a href="{{route('admin.profile')}}">Profile Settings</a></li>
        </ul>
        <h5 class="menu-heading" id="section-name">CLIENT MANAGEMENT</h5>
        <ul>
            <li><a href="{{route('admin.clients')}}">Client Information</a></li>
            <li><a href="{{route('admin.status')}}">Membership Status</a></li>
            <li><a href="{{route('admin.tracker')}}">Members Tracker</a></li>
            <li><a href="{{route('admin.guest')}}">Guest Tracker</a></li> 
        </ul>
        <h5 class="menu-heading" id="section-name">GYM MANAGEMENT</h5>
        <ul>
            <li><a href="{{route('admin.rates')}}">Rates and Promos</a></li>
            <li><a href="{{route('admin.history')}}">Transactions History</a></li>
            <li><a href="{{route('admin.pending')}}">Pending Transactions</a></li>
            <li><a href="{{route('admin.revenue')}}">Monthly Revenue</a></li>
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