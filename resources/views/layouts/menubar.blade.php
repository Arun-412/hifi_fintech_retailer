<?php 
if(!function_exists('dynamicActiveLink')){
    function dynamicActiveLink($path){
        $path_config = array(
            'home'		=> array('dashboard'),
            'money_transfer'	=> array('money_transfer'),
            'payout' => array('payout/login'),
            'aeps' => array('aeps'),
            'bill_payments_bbps' => array('bill_payments/bbps'),
            'bill_payments_cms' => array('bill_payments/cms'),
            'payment_link' => array('payment_link'),
            'report' => array('report'),
            'wallet_topup' => array('wallet_topup'),
            'kyc' => array('kyc'),
            'profile' => array('profile'),
            'support' => array('support'),
            'settings' => array('settings')
            // 'wallet'		=> array('user/wallet','user/pay','user/fundAccount','user/invoice/create'),
            // 'transactions'	=> array('user/transactions'),
            // 'settings' 		=> array('user/settings'),
            // 'pop' 		=> array('user/pop'),
            // 'paymentGateway' => array('user/paymentGateway')
        );
        foreach($path_config as $key=> $val)
        {
            if(in_array($path, $val)){
                return $key;
            }
        }
    }
}
$current_path = dynamicActiveLink(Request::path());
?>
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
                        <a class="nav-link {{$current_path == 'home' ? 'active' : ''}}" aria-current="page" href="{{route('dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$current_path == 'money_transfer' ? 'active' : ''}}" href="{{route('money_transfer_login')}}">Money Transfer</a>
                    </li>
                    <li class="nav-item hoverd">
                        <a class="nav-link {{$current_path == 'payout' ? 'active' : ''}}">
                            <span class="lan-7">Payout</span></a>
                        <ul class="submenu">
                            <li><a href="{{route('payout_login')}}">EKO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$current_path == 'aeps' ? 'active' : ''}}" href="{{route('aeps_login')}}">AEPS</a>
                    </li>
                    <li class="nav-item hoverd">
                        <a class="nav-link {{$current_path == 'bill_payments_bbps' ? 'active' : ($current_path == 'bill_payments_cms' ? 'active' : '')}}">
                            <span class="lan-7">Bill Payments</span></a>
                        <ul class="submenu">
                            <li><a href="{{route('bill_payments_bbps')}}">BBPS Bill</a>
                            <ul class="second-submenu">
                                <li><a>test</a></li>
                                 <li><a>test</a></li>
                                 <li><a>test</a></li>
                            </ul>
                        </li>
                            <li><a href="{{route('bill_payments_cms')}}">CMS Bill</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$current_path == 'payment_link' ? 'active' : ''}}" href="{{route('payment_link_login')}}">Payment Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$current_path == 'report' ? 'active' : ''}}" href="{{route('report')}}">Report</a>
                    </li>
                </ul>
                <div class="d-flex profile">
                    <div class="wallet-amout">
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
                                <a class="dropdown-item {{$current_path == 'wallet_topup' ? 'active' : ''}}" href="{{route('wallet_topup_dashboard')}}">Wallet Topup</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{$current_path == 'kyc' ? 'active' : ''}}" href="{{route('kyc')}}">KYC</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{$current_path == 'profile' ? 'active' : ''}}" href="{{route('profile')}}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{$current_path == 'support' ? 'active' : ''}}" href="{{route('support')}}">Support</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{$current_path == 'settings' ? 'active' : ''}}" href="{{route('settings')}}">Settings</a>
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