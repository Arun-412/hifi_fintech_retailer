@extends('layouts.master')
@section('content')
<section style="margin-top: 140px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container">
        <div style="max-width:900px;padding:0px" class="row payout-box pay-login mx-auto">
            <div style="padding-left: 0px;" class="col-sm-12 col-md-7 col-xs-12">
                <img style="width: 100%;border-radius: 12px 20% 20% 12px;height: 410px;object-fit: contain;"
                    src="{{asset('assets/images/money_transfer.jpg')}}" />
            </div>
            <div style="" class="col-sm-12 col-md-5 col-xs-12 my-auto">
                <div style="padding: 30px;">
                    @if(session('success'))
                    <center>
                        <div class="alert alert-success"> {{ session('success') }}</div>
                    </center>
                    @endif
                    @if(session('failed'))
                    <center>
                        <div class="alert alert-danger"> {{ session('failed') }}</div>
                    </center>
                    @endif


                    <?php $l = json_decode(Auth::user()->service_status);  if(isset($l) && isset($l->payout) && $l->payout == "HFY") { ?>
                    <h4 style="margin-bottom: 20px;">Payout Transfer</h4>
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
                        <button style="margin-bottom: 15px;" class="btn" id="payout_mobile_number_login"
                            type="button">Submit</button>
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
    <!-- OTP Modal -->
    <div class="modal fade" id="payout_otp_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div style="max-width: 350px;" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Customer Verification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div style="padding: 30px 40px;" class="modal-body">
                    <div class="mb-3">
                        <center><span id="otp_message_value"></span></center> <br>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                        autofocus title="OTP is required for login"
                                required minlength="3" maxlength="6"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"    
                        placeholder="Enter your OTP" />
                        <div style="margin: 10px 0px;float: right;">
                        <span id="counter"></span>
                        <button type="button" class="btn btn-secondary" id="resend_otp" style="display:none;">Resend OTP</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection