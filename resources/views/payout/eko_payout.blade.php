@extends('layouts.master')
@section('content')
<form action="" method="post">
    @csrf
    <h4>verify account</h4>
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
<input type="radio"  name="current_account" id="current_account"><span>Current Account</span>
<h4>Payment mode</h4>
<input type="radio" checked name="imps" id="imps"><span>IMPS</span>
<input type="radio"  name="neft" id="neft"><span>NEFT</span>
<input type="radio"  name="rtgs" id="rtgs"><span>RTGS</span>
<button type="button">Pay</button>
@endsection