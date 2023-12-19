<section class="header">
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="dashboard-logo" src="{{asset('assets/images/logo.PNG')}}"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item hoverd">
                        <a class="nav-link">
                            <span class="lan-7">Payout</span></a>
                        <ul class="submenu">
                            <li><a href="{{route('payout_login')}}">EKO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('report')}}">Report</a>
                    </li>
                </ul>
                <div class="d-flex profile">
                    <div class="wallet-amout">
                        <div class="wallet">
                            <img src="{{asset('assets/images/wallet-filled-money-tool.png')}}">
                        </div>
                        <div>
                            <p>Wallet Balance</p>
                            <p>₹{{Auth::user()->awards}}</p>
                        </div>
                    </div>
                    <img class="notify-icon me-2" src="{{asset('assets/images/notification.png')}}">
                    <div class="dropdown">
                        <img class="profile-icon me-2 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false" src="{{asset('assets/images/avatar.png')}}">
                        <ul class="dropdown-menu">
                            <li>
                                <p class="username">{{Auth::user()->shop_name}}<i class="bi bi-dot"></i></p>
                            </li>
                            <hr>
                            <li>
                                <a class="dropdown-item" href="{{route('kyc')}}">KYC</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('support')}}">Support</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('settings')}}">Settings</a>
                            </li>
                            <hr>
                            <li class="logout">
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="bi bi-box-arrow-right"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</section>