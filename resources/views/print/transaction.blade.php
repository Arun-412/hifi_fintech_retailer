@include('layouts.header')
<div class="print-page">
<div class="mb-2 align-items-center justify-content-center">
<h4>HIFI FINTECH</h4><img src="{{asset('assets/images/check-mark.png')}}" style="width: 36px;margin-left: 15px;"> <br> <h5 style="color:green;">Payment Successful</h5>

    </div>
    <img class="printbg-img" src="{{asset('assets/images/checked-1.png')}}"/>
        <!-- <tr><img src="{{asset('assets/images/faild.png')}}"></tr>
        <tr><img src="{{asset('assets/images/pending-new.png')}}"></tr> -->
        <table>
        <tr>
            <th>Shop Name | Contact Number</th>
            <td>{{substr(Auth::user()->shop_name, 0, 15)}} | {{Auth::user()->mobile_number}}</td>
        </tr>
        <tr>
            <th>Date | Time</th>
            <td>{{session('success')->date_time}}</td>
        </tr>
        <tr>
            <th>Mobile Number</th>
            <td>{{session('success')->sandt_user}}</td>
        </tr>
        <tr>
            <th>Bank Name</th>
            <td>{{substr(session('success')->bank_name, 0, 15)}}</td>
        </tr>
        <tr>
            <th>Account Number | Payment Mode</th>
            <td>{{session('success')->sand_account}} | {{session('success')->sandt_mode}}</td>
        </tr>
        <tr>
            <th>Transaction ID</th>
            <td>{{session('success')->sandt_id}}</td>
        </tr>
        <tr>
            <th>Account Holder Name</th>
            <td>
                <h6>{{session('success')->sand_name}}</h6>
            </td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>
                <h6>₹{{session('success')->sand_amount}}</h6>
            </td>
        </tr>
        <tr>
            <th>Transaction Status</th>
            <td>
                <h6 style="color: #198754;">{{session('success')->sand_status}}</h6>
            </td>
        </tr>
        <tfoot>
            <th colspan="2">
                <center>Computer Generated Receipt No Need of Signature/Seal</center>
            </th>
        </tfoot>
    </table>
</div>
@include('layouts.footer')
<script>
$(document).ready(function(){
    setTimeout(function () {
        window.print();
    }, 500);
    window.onafterprint = function(){
        window.location.replace("{{route('report')}}");
    }
});
</script>