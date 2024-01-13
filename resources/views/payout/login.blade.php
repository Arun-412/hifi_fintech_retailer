@extends('layouts.master')
@section('content')
<section style="margin-top: 140px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container">
        <div style="max-width:900px;padding:0px" class="row payout-box pay-login mx-auto">
            <div style="padding-left: 0px;" class="col-sm-12 col-md-7 col-xs-12">
                <img style="width: 100%;border-radius: 12px 20% 20% 12px;height: 410px;object-fit: contain;" src="{{asset('assets/images/money_transfer.jpg')}}" />
            </div>
            <div style="" class="col-sm-12 col-md-5 col-xs-12 my-auto">
            <div style="padding: 30px;">
            @if(session('success'))
                       <center><div class="alert alert-success"> {{ session('success') }}</div></center>
					@endif
                    @if(session('failed'))
                       <center><div class="alert alert-danger"> {{ session('failed') }}</div></center>
					@endif
                    
           
          <?php $l = json_decode(Auth::user()->service_status);  if(isset($l) && isset($l->payout) && $l->payout == "HFY") { ?>
                    <h4 style="margin-bottom: 20px;">Payout</h4>
                    <form action="{{route('transaction_user_login')}}" method="get"> @csrf 
                        <!-- Button trigger modal -->
                        <div class="mb-3 form-inputs">
                            <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                            <input type="text" name="mobile_number" pattern=".{0}|.{10,10}"
                                value="{{ old('mobile_number') }}" autofocus title="Mobile number must be 10 digit"
                                required minlength="10" maxlength="10"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Mobile Number"
                                class="form-control @error('mobile_number') is-invalid @enderror"
                                id="payout_mobile_number" autocomplete="off">
                            <i class="bi bi-phone-fill"></i>
                        </div>
                        <p id="mobile_check"></p>
                        <button style="margin-bottom: 15px;" class="btn" id="payout_mobile_number_login" type="submit">Submit</button>
                        </form>
              <?php } else { ?>
                
                <form action="{{route('activate_payout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn">Activate Payout Service</button>
                </form>
                
              <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade payout-model otp-modal" id="mobile_otp_model" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter OTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                
                    <form id="payout_otp_form">  
                        <center>
                        <p style="width:100%;padding: 5px;">To complete user registration please enter OTP which is sent to <b>****{{substr(session('success'), -2)}}</b></p>    
                        <div class="otp-inputs" id='inputs'>
                            
                        <input id='pinput1' autofocus required type='password' maxLength="1" />
                    <input id='pinput2' required type='password' maxLength="1" />
                    <input id='pinput3' required type='password' maxLength="1" />
                    <input id='pinput4' required type='password' maxLength="1" />
                    <input id='pinput5' required type='password' maxLength="1" />
                    <input id='pinput6' required type='password' maxLength="1" />
                        </div>
                        <input type="hidden" id="mobile_otp" name="mobile_otp">
                        <button class="btn login-btn" id="otp_submit" type="button">Submit</button></center>
                    </form>
                    <form id="otp_form" action="" method="post"> @csrf
                <div class="otp-inputs" id='inputs'>
                  
                    <input type="hidden" name="mobile_number" value="{{session('otp')}}">
                   
                    <input id='input1' autofocus required type='password' maxLength="1" />
                    <input id='input2' required type='password' maxLength="1" />
                    <input id='input3' required type='password' maxLength="1" />
                    <input id='input4' required type='password' maxLength="1" />
                    <input id='input5' required type='password' maxLength="1" />
                    <input id='input6' required type='password' maxLength="1" />
                </div>
                <input type="hidden" id="mobile_otp" name="mobile_otp">
                <button class="btn login-btn" id="otp_submit" type="submit">Submit</button>
            </form>
                </div>

            </div>
        </div>
    </div>
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