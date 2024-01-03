$(document).ready(function(){
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.loader-section').fadeOut('slow');
    $('.account_holder_name').hide();
    $('.bank_ifsc').hide();
    $('#show_password').hide();
    $('#c_show_password').hide();
    $('#hide_password').click(function(){
         $('#password').attr('type', 'text');
         $('#show_password').show();
         $('#hide_password').hide();
    });
    $('#show_password').click(function(){
        $('#password').attr('type', 'password');
        $('#show_password').hide();
        $('#hide_password').show();
    });
    $('#c_hide_password').click(function(){
        $('#c_password').attr('type', 'text');
        $('#c_show_password').show();
        $('#c_hide_password').hide();
   });
   $('#c_show_password').click(function(){
       $('#c_password').attr('type', 'password');
       $('#c_show_password').hide();
       $('#c_hide_password').show();
   });

    $('#report_data').DataTable({
        
        // searchPanes: {
        //     layout: 'columns-6',
        //     initCollapsed: true,
             
        // },
        // columnDefs: [{
        //     searchPanes: {
        //         show: true,
                
        //     viewCount: false,
        //     orderable: false,
        //     },
        //     targets: [5]
        // }], need end for filter
        // dom:"lBfrtip", cmd dom no need
        // dom: 'PBfrtip',
        // dom:'Plfrtip',
        // dom: 'Bfrtip',
        // dom: 'PBlfrtip',
        dom:'Blfrtip',
        
        colReorder: true,
        fixedHeader: {
            header: true
        }, 
        initComplete: function() {
            $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
            $('.buttons-copy').html('<i class="bi bi-clipboard-check-fill"></i> Copy  ')
            $('.buttons-csv').html('<i class="bi bi-filetype-csv"></i> CSV ')
            $('.buttons-excel').html('<i class="bi bi-file-earmark-spreadsheet-fill"></i> Excel')
            $('.buttons-pdf').html('<i class="bi bi-file-earmark-pdf-fill"></i> PDF ')
            $('.buttons-print').html('<i class="bi bi-printer-fill"></i> Print')
           },
        buttons: [
           
            // 'pageLength',
          
            {
                extend: 'copy',
                title: 'HIFI FINTECH Transaction Report',
                className: 'export_btn',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                }
            },
            {
                extend: 'csv',
                title: 'HIFI FINTECH Transaction Report',
                className: 'export_btn',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                },
                autoFilter: true,
                sheetName: 'HIFI FINTECH Transaction Report'
            },
            {
                extend: 'excel',
                className: 'export_btn',
                title: 'HIFI FINTECH Transaction Report',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                },
                autoFilter: true,
                sheetName: 'HIFI FINTECH Transaction Report'
            },
            {
                extend: 'pdf',
                className: 'export_btn',
                title: 'HIFI FINTECH Transaction Report',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                },
                orientation: 'portrait',
                pageSize: 'A4'
            },
            {
                extend: 'print',
                className: 'export_btn',
                title: 'HIFI FINTECH Transaction Report',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                },
                orientation: 'portrait',
                pageSize: 'A4',
                messageBottom: null,
                customize: function (win) {
                    $(win.document.body).find('table').addClass('print_table');
                    $(win.document.body).find('th').css('border','1px solid gray');
                    $(win.document.body).find('td').css('border','1px solid gray');
                    $(win.document.body).find('h1').css('text-align','center');
                }
            },
        ]
    });

    

    $('#payout_accounts_list').DataTable({
        
        dom:'Blfrtip',
        buttons:[],
        colReorder: true,
        fixedHeader: {
            header: true
        }, 
        initComplete: function() {
            $(this.api().table().container()).find('input').parent().wrap('<form>').parent().attr('autocomplete', 'off');
        },
    });

});

$('.verify_Account_checkbox').change(function(){
    if(this.checked){
        $('.account_holder_name').hide();
        $('.bank_ifsc').hide();
        $('.add_or_verify_submit_btn').text('Verify Account');
        if($('#payout_ifsc_code').val() != ''){
            $('.bank_ifsc').hide();
        }
        else{
            $('.bank_ifsc').show();
        }
    }
    else{
        $('.account_holder_name').show();
        $('.bank_ifsc').show();
        $('.add_or_verify_submit_btn').text('Add Account');
    }
});

$('.add_or_verify_submit_btn').click(function(){
    $('.loader-section').fadeIn('slow');
    $.ajax({
        url: "add_account",
        method:"POST",
        data: { 
            'name': 'Arun',
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
           
           $('#payout_add_or_verify_Account').modal('hide');
           $('#verified_account_name').modal('show');
           $('.loader-section').fadeOut('slow');
        },
        error: function (xhr, status, error) {
            
            console.log(error);
            $('.loader-section').fadeOut('slow');
        }
    });
});

$("#add_account").click(function(){
    $('.loader-section').fadeIn('slow');
    $.ajax({
        url: "bank_list",
        method:"GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $.each(data, function(key, value) {   
                $('#payout_bank_list')
                    .append($("<option></option>")
                               .attr("value", value['ifsc_code'])
                               .attr("data-set", value['bank_code'])
                               .text(value['bank_name'])); 
                
           });
           let payout_ifsc_code = "";
           $("#payout_bank_list").change(function () {
            payout_ifsc_code = $('#payout_bank_list').find("option:selected").val(); 
            $('#payout_ifsc_code').val(payout_ifsc_code != "" ?payout_ifsc_code : ""); 
            if($('#payout_ifsc_code').val() != ''){
                $('.bank_ifsc').hide();
            }
            else{
                $('.bank_ifsc').show();
            }
            });
           $('#payout_add_or_verify_Account').modal('show');
           $('.loader-section').fadeOut('slow');
        },
        error: function (xhr, status, error) {
            console.log(error);
            $('.loader-section').fadeOut('slow');
        }
    });
});

$('#payout_add_or_verify_account_model_close').click(function () {
    $('#payout_bank_list').val('');
    $('#payout_ifsc_code').val('');
    $('#payout_account_number').val('');
    $('#payout_account_holder_name').val('');
});