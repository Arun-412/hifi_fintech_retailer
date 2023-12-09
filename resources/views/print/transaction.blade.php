@include('layouts.header')
<style>
    #print_transaction { display: block; }
</style>
<section id="print_transaction">
<h2>Transaction Report</h2>
</section>
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