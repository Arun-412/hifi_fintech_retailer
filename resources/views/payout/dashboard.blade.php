@extends('layouts.master')
@section('content')
<section style="margin-top: 94px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="payout-box">
                    <!-- <form action="">
                    @csrf
                    <input type="text" name="mobile_number" id="" placeholder="Mobile Number">
                    <input type="button" value="Submit">
                </form>
                <hr>
                <p>show in model</p>
                <form action="">
                    @csrf
                    <select name="bank_name" id="">
                        <option value="0" selected disabled>Select Bank Name</option>
                        <option value="HDFC">HDFC Bank</option>
                    </select>
                    <input type="text" name="account_number" placeholder="Account Number" id="">
                    <input type="text" name="name" placeholder="Name">
                    <input type="checkbox" name="verify" id=""> <span>verify account(Charges ₹5+GST)</span>
                    <button>Add Account</button>
                </form>
                <hr>
                <p>model response if checked</p>
                <form action="">
                    @csrf
                    <h6>NAMV FINTECH</h6>
                    <input type="button" value="Add Account">
                    <input type="button" value="Cancel">
                </form>
                <hr> -->

                    <!-- Modal -->
                    <div class="modal fade payout-model" id="payout_add_or_verify_Account" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add/Verify Account</h5>
                                    <button type="button" id="payout_add_or_verify_account_model_close" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <label for="exampleFormControlInput1" class="form-label">Bank Name</label>
                                        <select style="margin-bottom:15px" class="form-select"
                                            aria-label="Default select example" id="payout_bank_list">
                                            <option selected disabled>Select Bank Name</option>
                                        </select>
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1" class="form-label bank_ifsc">IFSC
                                                Code</label>
                                            <input type="text" name="bank_ifsc" value="" autofocus required
                                                minlength="10" placeholder="IFSC Code" class="form-control bank_ifsc"
                                                id="payout_ifsc_code" autocomplete="off">
                                        </div>
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1" class="form-label">Account
                                                Number</label>
                                            <input type="text" name="mobile_number" value="" autofocus required
                                                minlength="10" placeholder="Account Number" class="form-control"
                                                id="payout_account_number" autocomplete="off">
                                        </div>
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1"
                                                class="form-label account_holder_name">Name</label>
                                            <input type="text" name="account_holder_name" autofocus required
                                                minlength="10" placeholder="Name"
                                                class="form-control account_holder_name" id="payout_account_holder_name"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div style="margin-bottom:15px" class="form-check form-check-inline">
                                        <input class="form-check-input verify_Account_checkbox" checked type="checkbox"
                                            id="inlineCheckbox1">
                                        <label class="form-check-label" for="inlineCheckbox1"><small style="font-weight:400;font-size:14px;">Verify account
                                                holder name(₹4 / FREE for eligible accounts)</small></label>
                                    </div>
                                    <button type="button" style="width:100%;"
                                        class="btn btn-secondary add_or_verify_submit_btn"><i class="bi bi-person-check"></i> Verify
                                        Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade payout-model" id="verified_account_name" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Account Verification</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div style="margin:25px 25px;padding:0px 20px;">
                                        <div style="text-align: center;">
                                            <img style="margin-bottom:20px;" src="{{asset('assets/images/verification.png')}}">
                                            <h5 class="text-center text-success">HIFI FINTECH</h5>
                                        </div>
                                            <div style="display:flex;margin: auto;padding:20px 0px;">
                                                <button type="button" class="btn btn-secondary"><i class="bi bi-person-add"></i> Add Account</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="bi bi-x"></i> Cancel</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 25px;" class="d-flex align-items-center justify-content-between">
                        <h4 style="margin-bottom: 0px;">Account List</h4>
                        <button style="width:fit-content;" type="button" class="btn btn-primary" id="add_account"><i class="bi bi-person-fill-add"></i> Add/Verify Account
                        </button>
                    </div>
                    <table id="payout_accounts_list" class="table display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Verification Status</th>
                                <th scope="col">Name</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="color:green;"><i class="verify-icon bi bi-person-fill-check"></i>Verified</td>
                                <td>Hifi Money</td>
                                <td>HDFC Bank</td>
                                <td>2003020001020</td>
                                <td><button class="btn-reject" type="button"><i
                                            class="bi bi-trash3-fill"></i>Delete</button>
                                    <button class="btn-pay" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        type="button"><i class="bi bi-cash-stack"></i>Pay</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade payout-model" id="exampleModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content transaction-modal">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transaction To</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Bank Name</p>
                                                    <p>HDFC BANK</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>IFSC Code</p>
                                                    <p>HDFC00041331</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Account Number</p>
                                                    <p>21212121212</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <div class="profile-bar">
                                                    <p>Account Holder Name</p>
                                                    <p>HIFI FINTECH</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-inputs">
                                            <div class="col-md-6 col-xs-12">
                                                <label for="exampleFormControlInput1" class="form-label">Amount</label>
                                                <input type="text" name="Amount" autofocus required minlength="3"
                                                    placeholder="Amount" class="form-control"
                                                    id="exampleFormControlInput1" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                                            </div>
                                            <div style="margin-top:10px;" class="col-md-6 col-xs-12">
                                                <div>
                                                    <label for="exampleFormControlInput1" class="form-label">Payment
                                                        Mode</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" checked id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">IMPS</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">NEFT</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button style="width: -webkit-fill-available;" type="button" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#transaction_confirm_model"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        Pay
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade payout-model" id="transaction_confirm_model" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content confirm-modal">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div style="margin-top:25px;">
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1" class="form-label text-center">Are you sure make
                                                payment of ₹10000 (Ten Thousand Ruppess) to HIFI FINTECH</label>
                                        </div>
                                        <div class="mb-3 form-inputs">
                                        <label>Enter transaction password to complete the transaction</label>
                                        <input style="width:100%;" type="password" name="Enter Password" id="" placeholder="Enter Transaction Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" style="width:100%;" class="btn btn-secondary"
                                        data-bs-toggle="modal" data-bs-target="#transaction_details_model"
                                        data-bs-dismiss="modal" aria-label="Close">Yes! Proceed</button>
                                    <button type="button" class="btn btn-secondary cancel-btn" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade payout-model" id="transaction_details_model" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content transaction-modal">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transaction Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Date - Time </p>
                                                    <p>12-12-2023 12:23:21 PM</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Transaction ID </p>
                                                    <p>2001001202</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Mobile number</p>
                                                    <p>6383224535</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Bank Name</p>
                                                    <p>HDFC Bank</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Account Number</p>
                                                    <p>1212112121212</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>IFSC Code</p>
                                                    <p>HDFC0002123</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Account Holder Name</p>
                                                    <p>Hifi FIntech</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Amount</p>
                                                    <p>₹10000</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Payment mode</p>
                                                    <p>IMPS</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Status</p>
                                                    <p style="color: #009700;">Success</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-inputs">
                                            need to show success, failed, pending status with icons/image
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <a href="{{route('print_transaction')}}"><button type="button" style="width:100%;" class="btn btn-secondary"><i class="bi bi-printer-fill"></i> Print</button></a>
                                    <button style="width: -webkit-fill-available;margin-top: 15px;" type="button"
                                        class="btn btn-secondary" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="bi bi-x"></i> Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection