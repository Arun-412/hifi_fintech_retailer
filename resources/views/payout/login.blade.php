@extends('layouts.master')
@section('content')
<section style="margin-top: 140px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container">
        <div style="max-width:900px;padding:0px" class="row payout-box pay-login mx-auto">
            <div style="padding-left: 0px;" class="col-sm-12 col-md-7 col-xs-12">
                <img style="width: 100%;border-radius: 12px 20% 20% 12px;" src="{{asset('assets/images/money_transfer.jpg')}}" />
            </div>
            <div style="" class="col-sm-12 col-md-5 col-xs-12 my-auto">
            <div style="padding: 30px;">
                    <!-- <div class="export-buttons">
                        <button class="btn"><i class="bi bi-printer-fill"></i> Print </button>
                        <button class="btn"><i class="bi bi-file-earmark-pdf-fill"></i> PDF </button>
                        <button class="btn"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel </button>
                        <button class="btn"><i class="bi bi-filetype-csv"></i> CSV </button>
                        <button class="btn"><i class="bi bi-clipboard-check-fill"></i> Copy </button>
                    </div> -->
                    <h4 style="margin-bottom: 20px;">Payout</h4>
                    <form action="payout_user" method="post">
                        @csrf
                        <!-- Button trigger modal -->
                        <div class="mb-3 form-inputs">
                            <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
                            <input type="text" name="mobile_number" pattern=".{0}|.{10,10}"
                                value="{{ old('mobile_number') }}" autofocus title="Mobile number must be 10 digit"
                                required minlength="10" maxlength="10"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Mobile Number"
                                class="form-control @error('mobile_number') is-invalid @enderror"
                                id="exampleFormControlInput1" autocomplete="off">
                            <i class="bi bi-phone-fill"></i>
                        </div>
                        <button style="margin-bottom: 15px;" class="btn" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <h4>verify account</h4>
    <select name="bank_name" id="bank_name">
        <option value="Select Bank Name" selected disabled>Select Bank Name</option>
        <option value="HDFC">HDFC Bank</option>
    </select>
    <input type="text" name="ifsc" id="ifsc" placeholder="IFSC CODE">
    <input type="text" name="account_number" id="account_number" placeholder="Account Number">
    <button type="button">Verify Account</button>
</form>
<button type="button">Skip Account Verification</button>
<hr>

<h4>payout payment</h4>
<select name="bank_name" id="bank_name">
    <option value="Select Bank Name" selected disabled>Select Bank Name</option>
    <option value="HDFC">HDFC Bank</option>
</select>
<input type="text" name="ifsc" id="ifsc" placeholder="IFSC CODE">
<input type="text" name="name" id="name" placeholder="Name">
<input type="text" name="account_number" id="account_number" placeholder="Account Number">
<input type="text" name="amount" id="amount" placeholder="Amount">
<input type="text" name="sender_name" id="sender_name" placeholder="Sender Name">
<h4>Account Type</h4>
<input type="radio" checked name="savings_account" id="savings_account"><span>Savings Account</span>
<input type="radio" name="current_account" id="current_account"><span>Current Account</span>
<h4>Payment mode</h4>
<input type="radio" checked name="imps" id="imps"><span>IMPS</span>
<input type="radio" name="neft" id="neft"><span>NEFT</span>
<input type="radio" name="rtgs" id="rtgs"><span>RTGS</span>
<button type="button">Pay</button> -->

@endsection