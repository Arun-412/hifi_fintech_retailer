@extends('layouts.master')
@section('content')
<section style="margin-top: 110px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-xs-12 offset-2">
                <div class="payout-box kyc-info">
                    <h2>KYC</h2>
                    <hr>
                        @if(Auth::user()->kyc_status == 'HFN')
                            <div class="row">
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">PAN Number</label>
                                <input type="text" name="pan" placeholder="PAN Number" id="">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">Date</label>
                                <input type="date" name="pan" id="">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="formGroupExampleInput" class="form-label">D.No,street</label>
                            <input type="text" name="pan" placeholder="D.No,street" id="">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">City</label>
                                <input type="text" name="pan" placeholder="City" id="">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput" class="form-label">District</label>
                                <input type="text" name="pan" placeholder="District" id="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="formGroupExampleInput" class="form-label">State</label>
                                <input type="text" name="pan" placeholder="State" id="">
                            </div>
                            <div class="col-md-3">
                                <label for="formGroupExampleInput" class="form-label">Pincode</label>
                                <input type="text" name="pan" placeholder="Pincode" id="">
                            </div>
                            <div class="col-md-5">
                                <label for="formGroupExampleInput" class="form-label">Landmark</label>
                                <input type="text" name="pan" placeholder="Landmark" id="">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <input class="btn" type="button" value="Verify Details" id="">
                        </div>
                    <hr>
                    @endif
                    @if(Auth::user()->kyc_status == 'HF0')
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Adhar Number</label>
                            <input type="text" name="aadhar" placeholder="Adhar Number" id="">
                        </div>
                        <div class="col-md-3">
                            <input data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn" type="button" value="Verify Aadhar">
                        </div>
                    </div>
                    <hr>
                    @endif
                    <!-- <div class="row align-items-end otp">
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Enter OTP</label>
                            <input type="text" name="otp" placeholder="OTP" id="">
                        </div>
                        <div class="col-md-3">
                            <input class="btn" type="button" value="Verify OTP">
                        </div>
                    </div>
                    <p style="color:red;width:100%;">You need to enter OTP which is sent to your aadhar registered
                        mobile number</p>
                </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade payout-model otp-modal" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter OTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="otp_form" action="{{route('Signin')}}" method="post"> @csrf
                        <div class="otp-inputs" id='inputs'>
                            @if(session('otp'))
                            <input type="hidden" name="mobile_number" value="{{session('otp')}}">
                            @else <input type="hidden" name="mobile_number" value="{{session('user')}}">
                            @endif
                            <input id='input1' autofocus required type='password' maxLength="1" />
                            <input id='input2' required type='password' maxLength="1" />
                            <input id='input3' required type='password' maxLength="1" />
                            <input id='input4' required type='password' maxLength="1" />
                            <input id='input5' required type='password' maxLength="1" />
                            <input id='input6' required type='password' maxLength="1" />
                        </div>
                        <input type="hidden" id="mobile_otp" name="mobile_otp">
                        <p style="color:red;width:100%;margin-bottom: 0;">You need to enter OTP which is sent to your aadhar registered
                            mobile number</p>
                        <button class="btn login-btn" id="otp_submit" type="submit">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<script>
//  $("#otp_submit").click( function () {
$("#otp_form").submit(function() {
    let i1 = $("#input1").val();
    let i2 = $("#input2").val();
    let i3 = $("#input3").val();
    let i4 = $("#input4").val();
    let i5 = $("#input5").val();
    let i6 = $("#input6").val();
    let otp = i1.toString() + i2.toString() + i3.toString() + i4.toString() + i5.toString() + i6.toString();
    console.log(otp);
    $("#mobile_otp").val(otp);
});

const inputs = ["input1", "input2", "input3", "input4", "input5", "input6"];

inputs.map((id) => {
    const input = document.getElementById(id);
    addListener(input);
});

function addListener(input) {
    input.addEventListener("keyup", () => {
        const code = parseInt(input.value);
        if (code >= 0 && code <= 9) {
            const n = input.nextElementSibling;
            if (n) n.focus();
        } else {
            input.value = "";
        }

        const key = event.key; // const {key} = event; ES6+
        if (key === "Backspace" || key === "Delete") {
            const prev = input.previousElementSibling;
            if (prev) prev.focus();
        }
    });
}
</script>
@endsection