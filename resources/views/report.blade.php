@extends('layouts.master')
@section('content')
<form>
    @csrf
    <input type="date" name="from date" id="" placeholder="From Date">
    <input type="date" name="to date" id="" placeholder="To Date">
    <select name="service_type" id="">
        <option value="0" selected disabled>select service</option>
        <option value="all">All</option>
        <option value="payout">Payout</option>
    </select>
<button type="button" value="search_report">Search Report</button>
</form>
<table id="report_data" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Date - Time</th>
                <th>Transaction ID</th>
                <th>Mobile Number</th>
                <th>Name</th>
                <th>Bank Name</th>
                <th>Account Number</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01-Dec-2023 - 12:24:32 PM</td>
                <td>HFPTXaLie000012</td>
                <td>6383224535</td>
                <td>Hifi Money</td>
                <td>HDFC Bank</td>
                <td>2003020001020</td>
                <td>₹12500</td>
                <td>Success</td>
                <td><button type="button"><i class="bi bi-printer-fill"></i></button><button type="button"><i class="bi bi-arrow-clockwise"></i></button></td>
            </tr>
        </tbody>
    </table>
@endsection