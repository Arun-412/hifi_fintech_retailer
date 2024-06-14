@extends('layouts.master')
@section('content')
<section style="margin-top: 94px;margin-bottom: 40px;padding: 0px 30px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="payout-box">
                    <h4 style="float:left;">Report</h4>
                    <form class="report-form" action="{{route('search_report')}}" method="POST">
                        @csrf
                        <input type="date" name="from date" id="" value="<?= date('Y-m-d') ?>" placeholder="From Date">
                        <input type="date" name="to date" id="" value="<?= date('Y-m-d') ?>" placeholder="To Date">
                        <select name="report_type" class="form-select" aria-label="Default select example">
                            <!-- <option selected>Select Service</option> -->
                            <!-- <option value="ASR">Account Statement</option> -->
                            <option value="PTR">Payout Report</option>
                        </select>
                        <button class="btn" type="submit" value="search_report">Search Report</button>
                    </form>
                    <table id="report_data" class="table display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Date | Time</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">₹Amount</th>
                                <th scope="col">₹Charge</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data)
                            @foreach($data as $value)
                            <tr>
                                <td>{{$value->date_time}}</td>
                                <td>{{$value->sandt_id}}</td>
                                <td>{{substr($value->sandt_user,0,10)}}</td>
                                <td>{{substr($value->sand_name,0,10)}}</td>
                                <td>{{substr($value->bank_name,0,10)}}</td>
                                <td>{{$value->sand_account}}</td>
                                <td>{{$value->sand_amount}}</td>
                                <td>{{$value->sandt_tcharge-$value->sand_amount < 0 ? 0 : number_format((float)$value->sandt_tcharge-$value->sand_amount, 2, '.', '')}}</td>
                                <td style="color: #198754;">{{$value->sand_status}}</td>
                                <td>
                                    <!-- <button class="print-btn" type="button"><a href="{{route('print_transaction')}}"></a></button> -->
                                    <div style="display:flex;">
                                    <form action="{{route('transaction_status')}}" method="post">@csrf
                                    <input type="hidden" name="transaction_id" value="{{$value->sandt_Hid}}" />
                                    <button class="print-btn" id="t_reload" type="submit"><i
                                            class="bi bi-arrow-clockwise"></i></button>
                                    </form>
                                            <form action="{{route('print_transaction')}}" method="post">@csrf
                                            <input type="hidden" name="transaction_id_print" value="{{$value->sandt_Hid}}" />
                                            <button type="submit"><i class="bi bi-printer-fill"></i></button>
                                        </form></div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection