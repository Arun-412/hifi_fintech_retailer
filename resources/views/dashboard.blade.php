@extends('layouts.master')
@section('content')
<!-- <form action="{{route('logout')}}" method="post">
    @csrf
    <h2>Welcome to HIFI FINTECH </h2>

<p>{{Auth::user()}}</p>

<button type="submit" value="Logout">Logout </button>
</form> -->
<section style="margin-top: 110px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row">
            <div style="padding-left:15px;" class="col-sm-12 col-md-12 col-xs-12">
                <h4 style="margin-bottom: 21px;margin-top: 5px;padding-left: 15px;">Our Services </h4>
                <div class="services">
                    <div class="service-box">
                        <div class="service-title">
                            <h5>Money Transfer</h5>
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <p>17/12/2023</p>
                    </div>
                    <div class="service-box">
                        <div class="service-title">
                            <h5>Payout</h5>
                            <i class="bi bi-credit-card-2-back"></i>
                        </div>
                        <p>17/12/2023</p>
                    </div>
                    <div class="service-box">
                        <div class="service-title">
                            <h5>AEPS</h5>
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <p>17/12/2023</p>
                    </div>
                    <div class="service-box">
                        <div class="service-title">
                            <h5>Recharge</h5>
                            <i class="bi bi-phone"></i>
                        </div>
                        <p>17/12/2023</p>
                    </div>
                    <div class="service-box">
                    <div class="service-title">
                        <h5>Bill payments</h5>
                        <i class="bi bi-receipt"></i>
                    </div>
                    <p>17/12/2023</p>
                </div>
                <div class="service-box">
                    <div class="service-title">
                        <h5>Bill payments</h5>
                        <i class="bi bi-receipt"></i>
                    </div>
                    <p>17/12/2023</p>
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
    <div class="payment-loader">
    <div class="pad">
     <div class="chip"></div>
    <div class="line line1"></div>
    <div class="line line2"></div>
  </div>
  <!-- <div class="loader-text">
    Please wait while payment is loading
  </div> -->
</section>
@endsection