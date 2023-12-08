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
                            aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" >
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add/Verify Account</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div style="margin-top:25px;">
                                        <label for="exampleFormControlInput1" class="form-label">Bank Name</label>
                                            <select style="margin-bottom:15px" class="form-select"
                                                aria-label="Default select example">
                                                <option selected disabled>Bank Name</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <div class="mb-3 form-inputs">
                                                <label for="exampleFormControlInput1" class="form-label bank_ifsc">IFSC
                                                    Code</label>
                                                <input type="text" name="bank_ifsc" value="" autofocus
                                                    required minlength="10" placeholder="IFSC Code" class="form-control bank_ifsc"
                                                    id="exampleFormControlInput1" autocomplete="off">
                                            </div>
                                            <div class="mb-3 form-inputs">
                                                <label for="exampleFormControlInput1" class="form-label">Account
                                                    Number</label>
                                                <input type="text" name="mobile_number" value="" autofocus
                                                    required minlength="10" placeholder="Account Number"
                                                    class="form-control" id="exampleFormControlInput1"
                                                    autocomplete="off">
                                            </div>
                                            <div class="mb-3 form-inputs">
                                                <label for="exampleFormControlInput1" class="form-label account_holder_name">Name</label>
                                                <input type="text" name="account_holder_name" autofocus required
                                                    minlength="10" placeholder="Name" class="form-control account_holder_name"
                                                    id="exampleFormControlInput1" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div style="margin-bottom:15px" class="form-check form-check-inline">
                                            <input class="form-check-input verify_Account_checkbox" checked type="checkbox" id="inlineCheckbox1"
                                                >
                                            <label class="form-check-label" for="inlineCheckbox1"><small>Verify account holder name(Charges
                                                ₹5+GST)</small></label>
                                        </div>
                                        <button type="button" style="width:100%;" class="btn btn-secondary add_or_verify_submit_btn">Verify
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

                                        <div style="margin:0px 25px;padding:0px 20px;">
                                        <div style="width: 100%;">
                                            <h5 class="text-center text-success">HIFI FINTECH</h5>
                                        </div>
                                        <div style="display:flex;margin: auto;">
                                            <button type="button" class="btn btn-secondary">Add Account</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <h4 style="margin-bottom: 20px;">Account List</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#payout_add_or_verify_Account">
                            Add/Verify Account
                        </button>
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
                                <td><i class="verify-icon bi bi-person-fill-check"></i>verified</td>
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
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transaction</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <div class="mb-3 form-inputs">
                                        <label for="exampleFormControlInput1" class="form-label">Bank name: HDFC BANK</label>
                                        <label for="exampleFormControlInput1" class="form-label">Account Number: 21212121212</label>
                                        <label for="exampleFormControlInput1" class="form-label">Account Holder name: HIFI FINTECH</label>
                                            <label for="exampleFormControlInput1" class="form-label">Amount</label>
                                            <input type="text" name="Amount" autofocus required
                                                minlength="3" placeholder="Amount" class="form-control"
                                                id="exampleFormControlInput1" autocomplete="off">
                                                <label for="exampleFormControlInput1" class="form-label">Payment Mode</label>
                                                <input type="radio" name="" id="" checked ><span>IMPS</span>
                                                <input type="radio" name="" id=""  ><span>NEFT</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div style="margin-bottom:15px" class="form-check form-check-inline">
                                       
                                    </div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#transaction_confirm_model" data-bs-dismiss="modal"
                                            aria-label="Close">
                           Pay
                        </button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade payout-model" id="transaction_confirm_model" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <div class="mb-3 form-inputs">
                                        <label for="exampleFormControlInput1" class="form-label">Are you sure make payment of ₹10000(Ten Thousand Ruppess) to HIFI FINTECH</label>
                                       
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                               
                                    <button type="button" style="width:100%;" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#transaction_details_model" data-bs-dismiss="modal"
                                            aria-label="Close">Yes! Proceed</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade payout-model" id="transaction_details_model" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transaction Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <div class="mb-3 form-inputs">
                                       need to show success, failed, pending status with icons/image
                                        <p>Date - Time: 12-12-2023 12:23:21 PM</p>
                                        <p>Transaction ID: 2001001202</p>
                                        <p>Mobile number: 6383224535</p>
                                        <p>Bank Name: HDFC Bank</p>
                                        <p>Account Number: 1212112121212</p>
                                        <p>IFSC Code: HDFC0002123</p>
                                        <p>Account Holder Name: <b>Hifi FIntech</b></p>
                                        <p>Amount: ₹10000</p>
                                       <p>Payment mode: IMPS</p>
                                       <p>Status: <b>Success</b></p>

                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                               
                                    <button type="button" style="width:100%;" class="btn btn-secondary">Print</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">Close</button>
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