@extends('layouts.master')
@section('content')
<section style="margin-top: 110px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row payout-box kyc-info settings">
            <h4 style="margin-bottom:25px;">Settings</h4>
            <div class="col-sm-12 col-md-6 col-xs-12">
                <div class="payout-box contact">
                    <h5>Change Password</h5>
                    <input type="password" name="old_password" placeholder="Old Password" id="">
                    <input type="password" name="new_password" placeholder="New Password" id="">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="">
                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Change
                        Password</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="margin-bottom:0px;" class="modal-title" id="exampleModalLabel">Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div style="padding: 35px 30px;" class="modal-body">
                                <div>
                                    <input type="password" name="confirm_password" placeholder="Password" id="">
                                    <input class="btn" type="button" value="Proceed">
                                    <p>(You need to enter your password to process this request)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xs-12">
                <div class="payout-box contact logut-report">
                <div class="d-flex align-items-center">
                <h5>Access Report</h5>
                <input type="checkbox">
                            </div> 
                   
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Profit Report</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Commission Report</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Cashback Report</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">Charges Report</label>
                    </div>
                    <button class="btn" type="button">View Reports</button>
                </div>
            </div>
            <div class="col-sm-12 col-md-7 col-xs-12 mt-5">
                <div class="payout-box contact">
                    <h5>Change Transaction Password</h5>
                    <input type="password" name="old_password" placeholder="Old Transaction Password" id="">
                    <input type="password" name="new_password" placeholder="New Transaction Password" id="">
                    <input type="password" name="confirm_password" placeholder="Confirm Transaction Password" id="">
                    <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Change Transaction
                        Password</button>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-xs-12 mt-5">
                <div class="payout-box contact logut-report">
                    <h5>Logout Devices</h5>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-logout"> Logout all
                            devices</button>
                            </div> 
                        <span>Recommended: If you click logout all device it will logout all you sessions from all device in all over world. We will recommended this twice in a week for security reasons.</span>
                   
                </div>
            </div>
        </div>
    </div>
</section>

@endsection