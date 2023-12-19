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
            <th>Date | Time</th>
            <td>12-12-2023 | 9:17:36 AM</td>
        </tr>
        <tr>
            <th>Mobile Number</th>
            <td>6383224535</td>
        </tr>
        <tr>
            <th>Shop Name | Contact Number</th>
            <td>HIFI Mobiles, Karumathampatti | 6383224535</td>
        </tr>
        <tr>
            <th>Bank Name | IFSC CODE</th>
            <td>Canara Bank | CNRB0003437</td>
        </tr>
        <tr>
            <th>Account Number | Payment Mode</th>
            <td>3437101002021 | IMPS</td>
        </tr>
        <tr>
            <th>Transaction ID</th>
            <td>8818288189289</td>
        </tr>
        <tr>
            <th>Account Holder Name</th>
            <td>
                <h6>Hifi fintech</h6>
            </td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>
                <h6>5000</h6>
            </td>
        </tr>
        <tr>
            <th>Transaction Status</th>
            <td>
                <h6 style="color: #198754;">SUCCESS</h6>
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