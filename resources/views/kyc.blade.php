@extends('layouts.master')
@section('content')
<section style="margin-top: 110px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-xs-12 offset-2">
                <div class="payout-box kyc-info">
                    <h2>KYC</h2>
                    <hr>
                    <input type="text" name="pan" placeholder="PAN Number" id="">
                    <input type="date" name="pan" id="">
                    <input type="text" name="pan" placeholder="D.No,street" id="">
                    <input type="text" name="pan" placeholder="City" id="">
                    <input type="text" name="pan" placeholder="District" id="">
                    <input type="text" name="pan" placeholder="State" id="">
                    <input type="text" name="pan" placeholder="Pincode" id="">
                    <input type="text" name="pan" placeholder="Landmark" id="">
                    <input class="btn" type="button" value="Submit" id="">
                    <hr>
                    <input type="text" name="aadhar" placeholder="Adhar Number" id="">
                    <input class="btn" type="button" value="Verify Aadhar">
                    <hr>
                    <div class="otp">
                        <input type="text" name="otp" placeholder="OTP" id="">
                        <input class="btn" type="button" value="Verify OTP">
                        <p style="color:red;width:100%;">You need to enter OTP which is sent to your aadhar registered mobile number</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection