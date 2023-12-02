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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade payout-model" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accounts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div style="margin-top:25px;">
                    <select style="margin-bottom:15px" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <div class="mb-3 form-inputs">
                        <label for="exampleFormControlInput1" class="form-label">IFSC Code</label>
                        <input type="text" name="mobile_number" value="IFSC Code" autofocus required minlength="10"
                            placeholder="IFSC Code" class="form-control" id="exampleFormControlInput1"
                            autocomplete="off">
                    </div>
                    <div class="mb-3 form-inputs">
                        <label for="exampleFormControlInput1" class="form-label">Account Number</label>
                        <input type="text" name="mobile_number" value="Account Number" autofocus required minlength="10"
                            placeholder="Account Number" class="form-control" id="exampleFormControlInput1"
                            autocomplete="off">
                    </div>
                    <div class="mb-3 form-inputs">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="Name" value="Name" autofocus required minlength="10"
                            placeholder="Name" class="form-control" id="exampleFormControlInput1"
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <div style="margin-bottom:15px" class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Verify Account(Charges 5+GST)</label>
                    </div>
                <button type="button" class="btn btn-secondary">Verify Account</button>
                <div style="width: 100%;"><h5 class="text-center">text</h5></div>
                <div style="display:flex">
                <button type="button" class="btn btn-secondary">Add Account</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
            </div>
            </div>
        </div>
    </div>
</div>
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
<button type="button">Pay</button>
@endsection