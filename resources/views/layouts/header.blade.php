<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HIFI FINTECH</title>
    <link rel="icon" href="{{asset('assets/images/fav-icon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-grid.rtl.css')}}">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="style" href="{{asset('assets/css/style.scss')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-utilities.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
</head>
<body>
    <div class="loader-section">
        <div class="payment-loader">
            <div class="pad">
                <div class="chip"></div>
                <div class="line line1"></div>
                <div class="line line2"></div>
            </div>
        </div>
    </div>
    <section>
        <div style="position: absolute; top: 70px; right: 10px;">  
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" id="t_pending">      
                <div class="toast-header"> 
                    <i class="bi bi-patch-question-fill fa-lg" style="padding:0px 5px 0px 0px"></i>
                    <strong class="mr-auto">Pending</strong>
                </div>
                <div class="toast-body" id="t_pending_body">
                </div>
            </div>
        </div>
        <div style="position: absolute; top: 70px; right: 10px;">  
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" id="t_success">      
                <div class="toast-header"> 
                    <i class="bi bi-patch-check-fill fa-lg" style="padding:0px 5px 0px 0px"></i>
                    <strong class="mr-auto">Success</strong>
                </div>
                <div class="toast-body" id="t_success_body" style="color:white;">
                </div>
            </div>
        </div>
        <div style="position: absolute; top: 70px; right: 10px;">  
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" id="t_failed">      
                <div class="toast-header"> 
                    <i class="bi bi-patch-exclamation-fill fa-lg" style="padding:0px 5px 0px 0px"></i>
                    <strong class="mr-auto">Failed</strong>
                </div>
                <div class="toast-body" id="t_failed_body" style="color:white;">
                </div>
            </div>
        </div>
    </section>
  