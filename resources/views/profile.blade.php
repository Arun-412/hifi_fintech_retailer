@extends('layouts.master')
@section('content')
<section style="margin-top: 110px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row profile-box">
            <div class="col-sm-12 col-md-6 col-xs-12">
                <div class="row payout-box">
                <h4>Profile</h4>
                    <div class="col-sm-12 col-md-6 col-xs-12">
                        <div class="profile-bar">
                            <p>Shop Name </p>
                            <p>{{Auth::user()->shop_name}}</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xs-12">
                        <div class="profile-bar">
                            <p>User Code </p>
                            <p>{{Auth::user()->door_code}}</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xs-12">
                        <div class="profile-bar">
                            <p>Mobile Number </p>
                            <p>{{Auth::user()->mobile_number}}</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xs-12">
                        <div class="profile-bar">
                            <p>Email </p>
                            <p>{{Auth::user()->email}}</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xs-12">
                        <div class="profile-bar">
                            <p>Distributer Code</p>
                            <p>{{Auth::user()->door_opened_by}}</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xs-12">
                        <div class="profile-bar">
                            <p>KYC Status : @if(Auth::user()->kyc_status ==
                                'HFY')</P>
                            <p>Completed</p>@elseif((Auth::user()->kyc_status ==
                            'HFI'))<p>Incomplete</p>@else<p>Pending</p>@endif</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="min-height: 470px;" class="col-sm-12 col-md-6 col-xs-12 payout-box">
                <h5>Charge Details</h5>
                <table class="table">
                    <tr>
                        <th>S.No</th>
                        <th>Services</th>
                        <th>Charges</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Payout</td>
                        <td>5.5+GST</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection