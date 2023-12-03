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
                    <h4 style="margin-bottom: 20px;">EKO Payout Table</h4>
                    <table id="payout_account_list" class="table display nowrap" style="width:100%">
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
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Accounts</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="margin-top:25px;">
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1" class="form-label">Amount</label>
                                            <input type="text" name="Amount" value="Amount" autofocus required
                                                minlength="10" placeholder="Amount" class="form-control"
                                                id="exampleFormControlInput1" autocomplete="off">
                                        </div>
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1" class="form-label">Account
                                                Number</label>
                                            <input type="text" name="mobile_number" value="Account Number" autofocus
                                                required minlength="10" placeholder="Account Number"
                                                class="form-control" id="exampleFormControlInput1" autocomplete="off">
                                        </div>
                                        <div class="mb-3 form-inputs">
                                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                                            <input type="text" name="Name" value="Name" autofocus required
                                                minlength="10" placeholder="Name" class="form-control"
                                                id="exampleFormControlInput1" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div style="margin-bottom:15px" class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Verify Account(Charges
                                            5+GST)</label>
                                    </div>
                                    <button type="button" style="width:100%;" class="btn btn-secondary">Verify
                                        Account</button>
                                    <div style="width: 100%;">
                                        <h5 class="text-center">text</h5>
                                    </div>
                                    <div style="display:flex;margin: auto;">
                                        <button type="button" class="btn btn-secondary">Add Account</button>
                                        <button type="button" class="btn btn-secondary">Cancel</button>
                                    </div>
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