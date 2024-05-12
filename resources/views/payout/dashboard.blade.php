@extends('layouts.master')
@section('content')
<section style="margin-top: 94px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="payout-box">
                    <!-- Modal -->
                    <div class="modal fade payout-model" id="payout_add_or_verify_Account" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add/Verify Account</h5>
                                    <button type="button" id="payout_add_or_verify_account_model_close"
                                        class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <label for="exampleFormControlInput1" class="form-label">Bank Name</label>
                                        <!-- Search select -->
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
                                        </script>
                                        <script
                                            src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
                                            integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk="
                                            crossorigin="anonymous"></script>
                                        <link rel="stylesheet"
                                            href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
                                            integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg="
                                            crossorigin="anonymous" />

                                        <select id="select-state" placeholder="Pick a state...">
                                            <option value="">Select a state...</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                        </select>
                                        <script>
                                        $(document).ready(function() {
                                            $('select').selectize({
                                                sortField: 'text'
                                            });
                                        });
                                        </script>
                                    <!-- End Search select -->
                                    
                                        <!-- <select style="margin-bottom:15px" class="form-select"
                                            aria-label="Default select example" id="payout_bank_list">
                                            <option selected disabled>Select Bank Name</option>
                                        </select> -->
                                        <p id="payout_bank_list_check"></p>
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1" class="form-label bank_ifsc">IFSC
                                                Code</label>
                                            <input type="text" name="bank_ifsc" value="" autofocus required
                                                minlength="11" maxlength="11" placeholder="IFSC Code"
                                                class="form-control bank_ifsc" id="payout_ifsc_code" autocomplete="off"
                                                style="text-transform:uppercase">
                                            <p id="payout_ifsc_code_check"></p>
                                        </div>
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1" class="form-label">Account
                                                Number</label>
                                            <input type="text" name="mobile_number" value="" autofocus required
                                                minlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                                placeholder="Account Number" class="form-control"
                                                id="payout_account_number" autocomplete="off">
                                            <p id="account_number_check"></p>
                                        </div>
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1"
                                                class="form-label account_holder_name">Name</label>
                                            <input type="text" name="account_holder_name" autofocus required
                                                minlength="3" maxlength="20" placeholder="Name"
                                                class="form-control account_holder_name" id="payout_account_holder_name"
                                                autocomplete="off">
                                            <p id="name_check"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div style="margin-bottom:15px" class="form-check form-check-inline">
                                        <input class="form-check-input verify_Account_checkbox" checked type="checkbox"
                                            id="inlineCheckbox1" />
                                        <label class="form-label"><small id="account_verify_error"
                                                style="font-weight:400;font-size:14px;">Verify account
                                                holder name(₹4 / FREE for eligible accounts)</small></label>
                                    </div>
                                    <button type="button" style="width:100%;"
                                        class="btn btn-secondary add_or_verify_submit_btn"><i
                                            class="bi bi-person-check"></i> Verify
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
                                            <img style="margin-bottom:20px;"
                                                src="{{asset('assets/images/verification.png')}}">
                                            <h5 class="text-center text-success" id="verified_name"></h5>
                                            <input type="hidden" id="verify_id" value="" />
                                        </div>
                                        <div style="display:flex;margin: auto;padding:20px 0px;">
                                            <button type="button" id="add_verified_account" class="btn btn-secondary"><i
                                                    class="bi bi-person-add"></i> Add Account</button>
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
                        @if(session('success'))
                        <h4 style="margin-bottom: 0px;">
                            {{isset(session('success')['mobile']) ? session('success')['mobile'] : ""}}</h4>
                        @elseif(session('failed'))
                        <h4 style="margin-bottom: 0px;">
                            {{isset(session('failed')['mobile']) ? session('failed')['mobile'] : ""}}</h4>
                        @endif
                        <button style="width:fit-content;" type="button" class="btn btn-primary" id="add_account"><i
                                class="bi bi-person-fill-add"></i> Add/Verify Account
                        </button>
                    </div>
                    @if(session('success'))
                    <input type="hidden" id="customer_id" value="{{session('success')['user']}}" />
                    <input type="hidden" id="mobile_id" value="{{session('success')['mobile']}}" />
                    @elseif(session('failed'))
                    <input type="hidden" id="customer_id" value="{{session('failed')['user']}}" />
                    <input type="hidden" id="mobile_id" value="{{session('failed')['mobile']}}" />
                    @endif
                    <table id="payout_accounts_list" class="table display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th hidden></th>
                                <th hidden></th>
                                <th scope="col">Name</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">Verification Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(session('success'))
                            @foreach(session('success')['accounts'] as $key=>$value)
                            <tr>
                                <td hidden>{{$value['ifsc_code']}}</td>
                                <td id="account_id" hidden>{{$value['account_code']}}</td>
                                <td>{{$value['account_holder_name']}}</td>
                                <td>{{$value['bank_name']}}</td>
                                <td>{{$value['account_number']}}</td>
                                @if($value['verification_status'] == "HFY")
                                <td style="color:green;"><i class="verify-icon bi bi-person-fill-check"></i>Verified
                                </td>
                                @else
                                <td><button class="btn-pay" type="button">Verify Account</button></td>
                                @endif
                                <td><button class="btn-reject" type="button" id="delete_customer_account"
                                        data-bs-toggle="modal" data-bs-target="#payout_delete_account_model"><i
                                            class="bi bi-trash3-fill"></i>Delete</button>
                                    <button class="btn-pay" data-bs-toggle="modal"
                                        data-bs-target="#payout_transaction_model" type="button" id="payout_pay"><i
                                            class="bi bi-cash-stack"></i>Pay</button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="modal fade payout-model" id="payout_delete_account_model" tabindex="-1"
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
                                            <center><label for="exampleFormControlInput1"
                                                    class="form-label text-center">Are you sure to delete the
                                                    account?</label></center>
                                        </div>
                                        <div style="text-align: center;" class="mb-3 form-inputs">
                                            <input type="hidden" id="selected_account_code_to_delete" />
                                            <p class="form-label text-center" id="selected_name_to_delete"></p>
                                            <p class="form-label text-center" id="selected_bank_to_delete"></p>
                                            <p class="form-label text-center" id="selected_account_to_delete"></p>
                                        </div>
                                    </div>
                                </div>
                                <div style="align-items: baseline;" class="modal-footer ">

                                    <button type="button" class="btn btn-secondary cancel-btn" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                    <button type="button" class="btn btn-secondary"
                                        id="selected_payout_account_delete">Yes! Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade payout-model" id="payout_transaction_model" tabindex="-1"
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
                                                    <p hidden id="selected_payment_code"></p>
                                                    <p id="selected_payment_bank"></p>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>IFSC Code</p>
                                                    <p>HDFC00041331</p>
                                                </div>
                                            </div> -->
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Account Number</p>
                                                    <p id="selected_payment_account"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Account Holder Name</p>
                                                    <p id="selected_payment_name"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 form-inputs">

                                            <div style="margin-top:10px;" class="col-md-6 col-xs-12">
                                                <div>
                                                    <label for="exampleFormControlInput1" class="form-label">Payment
                                                        Mode</label>
                                                </div>
                                                <div class="form-check form-check-inline" id="payout_imps">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" checked id="payout_imps_check"
                                                        value="imps">
                                                    <label class="form-check-label" for="inlineRadio1">IMPS</label>
                                                </div>
                                                <div class="form-check form-check-inline" id="payout_neft">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="payout_neft_check" value="neft">
                                                    <label class="form-check-label" for="inlineRadio2">NEFT</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <label for="exampleFormControlInput1" class="form-label">Amount</label>
                                                <input type="text" name="payout_amount" autofocus required minlength="2"
                                                    placeholder="Amount" class="form-control" id="payout_amount"
                                                    autocomplete="off"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                                    maxlength="6" readonly onfocus="this.removeAttribute('readonly');">
                                                <p id="payout_amount_check"></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button style="width: -webkit-fill-available;" type="button" class="btn btn-primary"
                                        id="payout_transaction_amount_pay">
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
                                        @if(Auth::user()->transaction_password != '')
                                        <div class="mb-3 form-inputs">
                                            <center><label for="exampleFormControlInput1"
                                                    class="form-label text-center">Are you sure make
                                                    payment of <span id="confirm_payment"></span></label></center>
                                        </div>
                                        <div style="text-align: center;" class="mb-3 form-inputs">
                                            <label style="margin-top:10px;">Enter transaction password to complete the
                                                transaction</label>
                                            <input minlength="4" maxlength="40"
                                                style="width:100%;max-width: 204px;font-size: 14px;margin-top: 10px;"
                                                type="password" name="Enter Password" id="transaction_password"
                                                placeholder="Enter Transaction Password">
                                            <p id="transaction_password_check"></p>
                                        </div>
                                        @else
                                        <div style="text-align: center;" class="mb-3 form-inputs">
                                            <label style="margin-top:10px;"><a href="{{route('settings')}}">Click
                                                    here</a> to set transaction password for complete the
                                                transaction</label>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div style="align-items: baseline;" class="modal-footer ">

                                    <button type="button" class="btn btn-secondary cancel-btn" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                    <button type="button" class="btn btn-secondary" id="transaction_pin_proceed">Yes!
                                        Proceed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade payout-model" id="transaction_details_model" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content transaction-modal">
                                <div class="modal-header">
                                    <h5 class="modal-title success-title successs-title" id="exampleModalLabel">
                                        Transaction Detail</h5>
                                    <div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <form action="{{route('print_transaction')}}" method="post">
                                            <input type="hidden" name="transaction_id_print"
                                                id="transaction_id_print" />
                                            <button type="submit"><i class="bi bi-printer-fill"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Date | Time </p>
                                                    <p id="transaction_time"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Transaction ID </p>
                                                    <p id="transaction_id"></p>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Bank Name</p>
                                                    <p id="transaction_bank"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Account Number</p>
                                                    <p id="transaction_account"></p>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Account Holder Name</p>
                                                    <p id="transaction_name"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Amount</p>
                                                    <p id="transaction_amount"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Payment mode</p>
                                                    <p id="transaction_mode"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="profile-bar">
                                                    <p>Status</p>
                                                    <p id="transaction_status" style="color: #009700;"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3 form-inputs">
                                            need to show success, failed, pending status with icons/image
                                        </div> -->

                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <!-- <button style="width: -webkit-fill-available;margin-top: 15px;" type="button"
                                        class="btn btn-secondary" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="bi bi-x"></i> Close</button> -->
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