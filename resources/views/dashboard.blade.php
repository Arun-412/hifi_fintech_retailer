@extends('layouts.master')
@section('content')
<section style="margin-top: 110px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row">
            <div style="padding-left:15px;" class="col-sm-12 col-md-12 col-xs-12">
                <div class="payout-box welcome-box">
                    <h4 style="margin-bottom: 0px;padding-left: 15px;">Welcome to HIFI FINTECH <span style="color:green;">{{Auth::user()->shop_name}} </span> </h4>
                    @if(Auth::user()->kyc_status != 'HFY')
                    <a href="{{route('kyc')}}"><button class="btn">Complete KYC</button></a>
                    @endif
                </div>
            </div>
        </div>
</section>
<section style="margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row payout-box">
            <h4 style="margin-bottom: 21px;margin-top: 5px;padding-left: 15px;">Statistics</h4>
            <div class="col-sm-12 col-md-4 col-xs-12 mb-5">
                <div class="service-box">
                    <div class="service-title">
                        <h5>Wallet Topup</h5>
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="amount currency text-center">
                        <div>
                            <p>Today</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>This Month</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>Last Month</p>
                            <p>₹0</p>
                        </div>
                    </div>
                    <div class="status-title">
                        <h5>Status </h5>
                        <p>{{date('d/m/Y')}}</p>
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div class="amount amt-status">
                        <div class="icon-box green">
                            <img src="{{asset('assets/images/success.png')}}">
                            <div>
                                <p>Success</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box yellow">
                            <img src="{{asset('assets/images/pending.png')}}">
                            <div>
                                <p>Pending</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box red">
                            <img src="{{asset('assets/images/failure.png')}}">
                            <div>
                                <p>Failed</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-xs-12 mb-5">
                <div class="service-box">
                    <div class="service-title">
                        <h5>Money Transfer</h5>
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="amount currency text-center">
                        <div>
                            <p>Today</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>This Month</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>Last Month</p>
                            <p>₹0</p>
                        </div>
                    </div>
                    <div class="status-title">
                        <h5>Status </h5>
                        <p>{{date('d/m/Y')}}</p>
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div class="amount amt-status">
                        <div class="icon-box green">
                            <img src="{{asset('assets/images/success.png')}}">
                            <div>
                                <p>Success</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box yellow">
                            <img src="{{asset('assets/images/pending.png')}}">
                            <div>
                                <p>Pending</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box red">
                            <img src="{{asset('assets/images/failure.png')}}">
                            <div>
                                <p>Failed</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-xs-12 mb-5">
                <div class="service-box">
                    <div class="service-title">
                        <h5>Payout</h5>
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="amount currency text-center">
                        <div>
                            <p>Today</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>This Month</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>Last Month</p>
                            <p>₹0</p>
                        </div>
                    </div>
                    <div class="status-title">
                        <h5>Status </h5>
                        <p>{{date('d/m/Y')}}</p>
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div class="amount amt-status">
                        <div class="icon-box green">
                            <img src="{{asset('assets/images/success.png')}}">
                            <div>
                                <p>Success</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box yellow">
                            <img src="{{asset('assets/images/pending.png')}}">
                            <div>
                                <p>Pending</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box red">
                            <img src="{{asset('assets/images/failure.png')}}">
                            <div>
                                <p>Failed</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-xs-12">
                <div class="service-box">
                    <div class="service-title">
                        <h5>AEPS</h5>
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="amount currency text-center">
                        <div>
                            <p>Today</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>This Month</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>Last Month</p>
                            <p>₹0</p>
                        </div>
                    </div>
                    <div class="status-title">
                        <h5>Status </h5>
                        <p>{{date('d/m/Y')}}</p>
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div class="amount amt-status">
                        <div class="icon-box green">
                            <img src="{{asset('assets/images/success.png')}}">
                            <div>
                                <p>Success</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box yellow">
                            <img src="{{asset('assets/images/pending.png')}}">
                            <div>
                                <p>Pending</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box red">
                            <img src="{{asset('assets/images/failure.png')}}">
                            <div>
                                <p>Failed</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-xs-12">
                <div class="service-box">
                    <div class="service-title">
                        <h5>Bill Payments</h5>
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="amount currency text-center">
                        <div>
                            <p>Today</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>This Month</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>Last Month</p>
                            <p>₹0</p>
                        </div>
                    </div>
                    <div class="status-title">
                        <h5>Status </h5>
                        <p>{{date('d/m/Y')}}</p>
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div class="amount amt-status">
                        <div class="icon-box green">
                            <img src="{{asset('assets/images/success.png')}}">
                            <div>
                                <p>Success</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box yellow">
                            <img src="{{asset('assets/images/pending.png')}}">
                            <div>
                                <p>Pending</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box red">
                            <img src="{{asset('assets/images/failure.png')}}">
                            <div>
                                <p>Failed</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-sm-12 col-md-4 col-xs-12">
                <div class="service-box">
                    <div class="service-title">
                        <h5>Payment Links</h5>
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="amount currency text-center">
                        <div>
                            <p>Today</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>This Month</p>
                            <p>₹0</p>
                        </div>
                        <div>
                            <p>Last Month</p>
                            <p>₹0</p>
                        </div>
                    </div>
                    <div class="status-title">
                        <h5>Status </h5>
                        <p>{{date('d/m/Y')}}</p>
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div class="amount amt-status">
                        <div class="icon-box green">
                            <img src="{{asset('assets/images/success.png')}}">
                            <div>
                                <p>Success</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box yellow">
                            <img src="{{asset('assets/images/pending.png')}}">
                            <div>
                                <p>Pending</p>
                                <p>0</p>
                            </div>
                        </div>
                        <div class="icon-box red">
                            <img src="{{asset('assets/images/failure.png')}}">
                            <div>
                                <p>Failed</p>
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-sm-12 col-md-7 col-xs-12">
                <div class="payout-box">
                    <div class="shop-details">
                        <h4>Welcome to HIFI FINTECH </h4>
                        <button class="btn">Logout</button>
                    </div>
                    <div class="table-responsive">
                        <table id="payout_account_list" class="table display nowrap align-middle"
                            style="width: max-content;">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Door Code</th>
                                    <th scope="col">Shop Name</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">KYC Status</th>
                                    <th scope="col">HFN</th>
                                    <th scope="col">HFOO</th>
                                    <th scope="col">HFS</th>
                                    <th scope="col">HFY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="verify-icon bi bi-person-fill-check"></i>verified</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                </tr>
                                <tr>
                                    <td><i class="verify-icon bi bi-person-fill-check"></i>verified</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                </tr>
                                <tr>
                                    <td><i class="verify-icon bi bi-person-fill-check"></i>verified</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                </tr>
                                <tr>
                                    <td><i class="verify-icon bi bi-person-fill-check"></i>verified</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                </tr>
                                <tr>
                                    <td><i class="verify-icon bi bi-person-fill-check"></i>verified</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                </tr>
                                <tr>
                                    <td><i class="verify-icon bi bi-person-fill-check"></i>verified</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                    <td>Hifi Money</td>
                                    <td>HDFC Bank</td>
                                    <td>2003020001020</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
    </div>
    </div>
</section>
@endsection