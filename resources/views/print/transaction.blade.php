@include('layouts.header')
<style>
table,
th,
td {
    border: 1px solid black;
}
</style>
<div class="print-page">
<div class="mb-2 d-flex align-items-center justify-content-center">
<h4>HIFI FINTECH</h4><img src="http://127.0.0.1:8000/assets/images/check-mark.png" style="width: 36px;margin-left: 15px;">
    </div>
    <table>
        <img class="printbg-img" src="http://127.0.0.1:8000/assets/images/checked-1.png"/>
        <!-- <tr><img src="{{asset('assets/images/faild.png')}}"></tr>
        <tr><img src="{{asset('assets/images/pending-new.png')}}"></tr> -->
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
                <h5>Hifi fintech</h5>
            </td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>
                <h5>5000</h5>
            </td>
        </tr>
        <tr>
            <th>Transaction Status</th>
            <td>
                <h5 style="color: #198754;">SUCCESS</h5>
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
// $(document).ready(function(){
//     setTimeout(function () {
//         window.print();
//     }, 500);
//     window.onafterprint = function(){
//         window.location.replace("{{route('report')}}");
//     }
// });
</script>