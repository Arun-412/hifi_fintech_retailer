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
                        <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('coming_soon')}}" data-toggle="tooltip" data-placement="top" title="Transaction amount if more than ₹5000, that amount splitting as ₹5000 each. eg: ₹10000 = ₹5000+₹5000">Money Transfer</a>
                    </li>
                    <li class="nav-item hoverd">
                        <a class="nav-link" data-toggle="tooltip" data-placement="left" title="Transaction amount send as one payment without splitting. Eg: ₹200000 = ₹200000">
                            <span class="lan-7">Payout</span></a>
                        <ul class="submenu">
                            <li><a href="{{route('payout_login')}}">EKO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('coming_soon')}}" data-toggle="tooltip" data-placement="top" title="Aadhar based Transactions">AEPS</a>
                    </li>
                    <li class="nav-item hoverd">
                        <a class="nav-link">
                            <span class="lan-7">Bill Payments</span></a>
                        <ul class="submenu">
                            <li><a href="{{route('coming_soon')}}" data-toggle="tooltip" data-placement="top" title="EB Bill, Mobile Postpaid Bill, Water Tax etc">BBPS Bill</a></li>
                            <li><a href="{{route('coming_soon')}}" data-toggle="tooltip" data-placement="top" title="Loan Payments">CMS Bill</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('coming_soon')}}" data-toggle="tooltip" data-placement="top" title="Create Payment Link for your products, collect your payment digitally">Payment Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('report')}}">Report</a>
                    </li>
                </ul>
                <div class="d-flex profile">
                    <div class="wallet-amout" data-toggle="tooltip" data-placement="top" title="Wallet Balance">
                        <div class="wallet">
                            <img src="{{asset('assets/images/wallet-filled-money-tool.png')}}">
                        </div>
                        <div>
                            <p>Wallet Balance</p>
                            <p>₹0.00</p>
                            <!-- <p>₹{{Auth::user()->awards}}</p> -->
                        </div>
                    </div>
                    <img class="notify-icon me-2" src="{{asset('assets/images/notification.png')}}" data-toggle="tooltip" data-placement="top" title="Notifications">
                    <div class="dropdown">
                        <img class="profile-icon me-2 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false" src="{{asset('assets/images/avatar.png')}}">
                        <ul class="dropdown-menu">
                            <li>
                                <p class="username">{{Auth::user()->shop_name}}<i class="bi bi-dot"></i></p>
                            </li>
                            <hr>
                            <li>
                                <a class="dropdown-item" href="{{route('coming_soon')}}">Wallet Topup</a>
                            </li>
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