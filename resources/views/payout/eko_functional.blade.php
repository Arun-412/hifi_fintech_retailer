@extends('layouts.master')
@section('content')
<form action="">
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
<hr>
<table id="payout_account_list" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            <th>Verification Status</th>
                <th>Name</th>
                <th>Bank Name</th>
                <th>Account Number</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><i class="bi bi-person-fill-check"></i>verified</td>
                <td>Hifi Money</td>
                <td>HDFC Bank</td>
                <td>2003020001020</td>
              
                <td><button type="button"><i class="bi bi-trash3-fill"></i>Delete</button><button type="button"><i class="bi bi-cash-stack"></i>Pay</button></td>
            </tr>
        </tbody>
    </table>
@endsection