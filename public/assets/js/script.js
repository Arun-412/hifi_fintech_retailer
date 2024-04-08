$(document).ready(function(){
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
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

let ifsc_status = false;

$('.verify_Account_checkbox').change(function(){
    if(this.checked){
        $('.account_holder_name').hide();
        $('.bank_ifsc').hide();
        $('.add_or_verify_submit_btn').text('Verify Account');
        if(ifsc_status == false){
            $('.bank_ifsc').hide();
        }
        else{
            $('.bank_ifsc').show();
        }
    }
    else{
        $('.account_holder_name').show();
        $('.add_or_verify_submit_btn').text('Add Account');
    }
});

let account_number_check = '';
function account_number(){
	if($('#payout_account_number').val().length > 7 ){
		$('#payout_account_number').removeClass('validation');
		$('#account_number_check').hide();
		account_number_check = true;
	}else if($('#payout_account_number').val().length == 0 ){
		$('#payout_account_number').addClass('validation');
		$('#account_number_check').show();
		$('#account_number_check').html("Account Number is required*");
		account_number_check = false;
		$('#payout_account_number').focus();
	}else{
		$('#payout_account_number').addClass('validation');
		$('#account_number_check').show();
		$('#account_number_check').html("Account Number must be atleast 8 digit");
		account_number_check = false;
		$('#payout_account_number').focus();
	}
}

$("#payout_account_number").on("keyup change", function(e) {
    if($('#payout_account_number').val().length > 7 ){
		$('#payout_account_number').removeClass('validation');
		$('#account_number_check').hide();
		account_number_check = true;
	}else if($('#payout_account_number').val().length == 0 ){
		$('#payout_account_number').addClass('validation');
		$('#account_number_check').show();
		$('#account_number_check').html("Account Number is required*");
		account_number_check = false;
		$('#payout_account_number').focus();
	}else{
		$('#payout_account_number').addClass('validation');
		$('#account_number_check').show();
		$('#account_number_check').html("Account Number must be atleast 8 digit");
		account_number_check = false;
		$('#payout_account_number').focus();
	}
});

let bank_list_check = '';
function bank_list(){
    if($('#payout_bank_list').find(":selected").text() != 'Select Bank Name'){
        $('#payout_bank_list').removeClass('validation');
		$('#payout_bank_list_check').hide();
		bank_list_check = true;
    }
    else{
        $('#payout_bank_list').addClass('validation');
		$('#payout_bank_list_check').show();
        $('#payout_bank_list_check').html("Select Bank Name*");
		bank_list_check = false;
        $('#payout_bank_list').focus();
    }
}

$("#payout_bank_list").on("keyup change", function(e) {
    if($('#payout_bank_list').find(":selected").text() != 'Select Bank Name'){
        $('#payout_bank_list').removeClass('validation');
		$('#payout_bank_list_check').hide();
		bank_list_check = true;
    }
    else{
        $('#payout_bank_list').addClass('validation');
		$('#payout_bank_list_check').show();
        $('#payout_bank_list_check').html("Select Bank Name*");
		bank_list_check = false;
        $('#payout_bank_list').focus();
    }
});

let ifsc_code_check = '';
function ifsc_code(){
	if($('#payout_ifsc_code').val().length > 10 ){
		$('#payout_ifsc_code').removeClass('validation');
		$('#payout_ifsc_code_check').hide();
		ifsc_code_check = true;
	}else if($('#payout_ifsc_code').val().length == 0){
		$('#payout_ifsc_code').addClass('validation');
		$('#payout_ifsc_code_check').show();
		$('#payout_ifsc_code_check').html("IFSC CODE is required*");
		ifsc_code_check = false;
		$('#payout_ifsc_code').focus();
        $('#payout_ifsc_code').show();
	}else{
		$('#payout_ifsc_code').addClass('validation');
		$('#payout_ifsc_code_check').show();
		$('#payout_ifsc_code_check').html("IFSC CODE Must be 11 digits");
		ifsc_code_check = false;
		$('#payout_ifsc_code').focus();
        $('#payout_ifsc_code').show();
	}
}

$("#payout_ifsc_code").on("keyup change", function(e) {
    if($('#payout_ifsc_code').val().length > 10 ){
		$('#payout_ifsc_code').removeClass('validation');
		$('#payout_ifsc_code_check').hide();
		ifsc_code_check = true;
	}else if($('#payout_ifsc_code').val().length == 0){
		$('#payout_ifsc_code').addClass('validation');
		$('#payout_ifsc_code_check').show();
		$('#payout_ifsc_code_check').html("IFSC CODE is required*");
		ifsc_code_check = false;
		$('#payout_ifsc_code').focus();
        $('#payout_ifsc_code').show();
	}else{
		$('#payout_ifsc_code').addClass('validation');
		$('#payout_ifsc_code_check').show();
		$('#payout_ifsc_code_check').html("IFSC CODE Must be 11 digits");
		ifsc_code_check = false;
		$('#payout_ifsc_code').focus();
        $('#payout_ifsc_code').show();
	}
});

$("#payout_account_number").on("keyup change", function(e) {
    if($('#payout_account_number').val().length > 7 ){
		$('#payout_account_number').removeClass('validation');
		$('#account_number_check').hide();
		account_number_check = true;
	}else if($('#payout_account_number').val().length == 0 ){
		$('#payout_account_number').addClass('validation');
		$('#account_number_check').show();
		$('#account_number_check').html("Account Number is required*");
		account_number_check = false;
		$('#payout_account_number').focus();
	}else{
		$('#payout_account_number').addClass('validation');
		$('#account_number_check').show();
		$('#account_number_check').html("Account Number must be atleast 8 digit");
		account_number_check = false;
		$('#payout_account_number').focus();
	}
});
let name_check = '';
$("#payout_account_holder_name").on("keyup change", function(e) {
    if($('#payout_account_holder_name').val().length > 3 ){
		$('#payout_account_holder_name').removeClass('validation');
		$('#name_check').hide();
		name_check = true;
	}else if($('#payout_account_holder_name').val().length > 20 ){
		$('#payout_account_holder_name').addClass('validation');
		$('#name_check').show();
		$('#name_check').html("Name accept upto 20 characters only*");
		name_check = false;
		$('#payout_account_holder_name').focus();
    }
    else if($('#payout_account_holder_name').val().length == 0 ){
		$('#payout_account_holder_name').addClass('validation');
		$('#name_check').show();
		$('#name_check').html("Name is required*");
		name_check = false;
		$('#payout_account_holder_name').focus();
	}else{
		$('#payout_account_holder_name').addClass('validation');
		$('#name_check').show();
		$('#name_check').html("Name must be atleast 3 characters");
		name_check = false;
		$('#payout_account_holder_name').focus();
	}
});

function account_name() {
    if($('#payout_account_holder_name').val().length > 3 ){
		$('#payout_account_holder_name').removeClass('validation');
		$('#name_check').hide();
		name_check = true;
	}else if($('#payout_account_holder_name').val().length > 20 ){
		$('#payout_account_holder_name').addClass('validation');
		$('#name_check').show();
		$('#name_check').html("Name accept upto 20 characters only*");
		name_check = false;
		$('#payout_account_holder_name').focus();
    }
    else if($('#payout_account_holder_name').val().length == 0 ){
		$('#payout_account_holder_name').addClass('validation');
		$('#name_check').show();
		$('#name_check').html("Name is required*");
		name_check = false;
		$('#payout_account_holder_name').focus();
	}else{
		$('#payout_account_holder_name').addClass('validation');
		$('#name_check').show();
		$('#name_check').html("Name must be atleast 3 characters");
		name_check = false;
		$('#payout_account_holder_name').focus();
	}
}

$('#add_verified_account').click(function () { 
    $.ajax({
        url: "add_verified_account",
        method:"POST",
        data: { 
            "code":$('#verify_id').val(),
            "number":$('#customer_id').val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data['status'] == true){
                $('#t_success_body').text("Account added successfully");
                $('#verified_account_name').modal('hide');
                $('#t_success').toast('show');
                $('.loader-section').fadeOut('slow');
            }else{
                $('#t_failed_body').text(data['message']);
                $('#verified_account_name').modal('hide');
                $('#t_failed').toast('show');
                $('.loader-section').fadeOut('slow');
            }
        },
        error: function (xhr, status, error) {
            var message = xhr['responseText'];
            message = JSON.parse(message);
            message= message['message'];
            $('#t_failed_body').text(message);
            $('#t_failed').toast('show');
            $('#payout_add_or_verify_Account').modal('hide');
            $('.loader-section').fadeOut('slow');
        }
    });
});

$('.add_or_verify_submit_btn').click(function(){
    if($(".verify_Account_checkbox").prop('checked') == true){
        account_number();
        bank_list();
        if($('.bank_ifsc').prop('disabled') == false){
            ifsc_code();
        }
        else{
            ifsc_code_check = true;
        }
        if ( account_number_check == true && bank_list_check == true && ifsc_code_check == true) {
            $('.loader-section').fadeIn('slow');
            $.ajax({
                url: "verify_account",
                method:"POST",
                data: { 
                    "name":$('#payout_bank_list').find(":selected").text(),
                    "code":$('#payout_bank_list').find(":selected").data('set'),
                    "number":$('#payout_account_number').val(),
                    "token":$('#customer_id').val(),
                    "id":$('#mobile_id').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data['status'] == true){
                        $('#payout_add_or_verify_Account').modal('hide');
                        $('#verified_name').text(data['name'].toUpperCase());
                        $('#verify_id').val(data['code']);
                        $('#verified_account_name').modal('show');
                        $('.loader-section').fadeOut('slow');
                    }else{
                        $('#t_failed_body').text(data['message']);
                        $('#payout_add_or_verify_Account').modal('hide');
                        $('#t_failed').toast('show');
                        $('.loader-section').fadeOut('slow');
                    }
                },
                error: function (xhr, status, error) {
                    var message = xhr['responseText'];
                    message = JSON.parse(message);
                    message= message['message'];
                    $('#t_failed_body').text(message);
                    $('#t_failed').toast('show');
                    $('#payout_add_or_verify_Account').modal('hide');
                    $('.loader-section').fadeOut('slow');
                }
            });
        }else{
            return false;
        }
    }
    else{
        account_number();
        bank_list();
        if($('.bank_ifsc').prop('disabled') == false){
            ifsc_code();
        }
        else{
            ifsc_code_check == true;
        }
        account_name();
        if ( account_number_check == true && bank_list_check == true && name_check == true && ifsc_code_check == true) {
            $.ajax({
                url: "add_account",
                method:"POST",
                data: { 
                    "bank_name":$('#payout_bank_list').find(":selected").text(),
                    "ifsc_code":$('#payout_bank_list').find(":selected").data('set'),
                    "account_number":$('#payout_account_number').val(),
                    "account_name":$('#payout_account_holder_name').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log('res'+JSON.stringify(data));
                   return;
                   $('#payout_add_or_verify_Account').modal('hide');
                   $('#verified_account_name').modal('show');
                   $('.loader-section').fadeOut('slow');
                },
                error: function (xhr, status, error) {
                    var message = xhr['responseText'];
                    message = JSON.parse(message);
                    message= message['message'];
                    $('#t_failed_body').text(message);
                    $('#t_failed').toast('show');
                    $('#payout_add_or_verify_Account').modal('hide');
                    $('.loader-section').fadeOut('slow');
                }
            });
        }else{
            return false;
        }
    }
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
            if(data['status'] == true){
                $.each(data['message'], function(key, value) {   
                    $('#payout_bank_list')
                        .append($("<option></option>")
                            .attr("value", value['ifsc_code'])
                            .attr("data-set", value['bank_code'])
                            .text(value['bank_name'])
                        ); 
                });
               $('#payout_add_or_verify_Account').modal('show');
               $('.loader-section').fadeOut('slow');
            }
            else{
                $('.loader-section').fadeOut('slow');
                $('#t_failed_body').text(data['message']);
                $('#t_failed').toast('show');
            }
        },
        error: function (xhr, status, error) {
            var message = xhr['responseText'];
            message = JSON.parse(message);
            message= message['message'];
            $('#t_failed_body').text(message);
            $('#t_failed').toast('show');
            $('.loader-section').fadeOut('slow');
        }
    });
});

$("#payout_bank_list").change(function () {
    $('.loader-section').fadeIn('slow');
    $.ajax({
        url: "get_bank",
        method:"POST",
        data: { 
            "bank_code":$('#payout_bank_list').find(":selected").data('set'),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if(data['status'] == true){
                if(data['message']['data']['isverificationavailable'] == 0) {
                    $('.verify_Account_checkbox').prop('checked', false);
                    $('.verify_Account_checkbox').prop('disabled', true);
                    $('.account_holder_name').show();
                    $('#account_verify_error').text('Account verification not available at a moment');
                    $('#account_verify_error').css('color','red');
                }
                else{
                    $('.verify_Account_checkbox').prop('checked', true);
                    $('.verify_Account_checkbox').prop('disabled', false);
                    $('.account_holder_name').hide();
                    $('#account_verify_error').text('Verify account holder name(₹4 / FREE for eligible accounts)');
                    $('#account_verify_error').css('color','#000');
                }
                if(data['message']['data']['ifsc_status'] == 2 || data['message']['data']['ifsc_status'] == 4){
                    $('.bank_ifsc').prop('disabled',false);
                    ifsc_status = true;
                    $('.bank_ifsc').show();
                }
                else{
                    $('.bank_ifsc').prop('disabled',true);
                    ifsc_status = false;
                    $('.bank_ifsc').hide();
                }
                $('.loader-section').fadeOut('slow');
            }else{
                $('#t_failed_body').text(data['message']);
                $('#payout_add_or_verify_Account').modal('hide');
                $('#t_failed').toast('show');
                $('.loader-section').fadeOut('slow');
            }
        },
        error: function (xhr, status, error) {
            var message = xhr['responseText'];
            message = JSON.parse(message);
            message= message['message'];
            $('#t_failed_body').text(message);
            $('#t_failed').toast('show');
            $('#payout_add_or_verify_Account').modal('hide');
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

let mobile_check = "";

$("#payout_mobile_number").on("keyup change", function(e) {
    if($('#payout_mobile_number').val().length > 9 ){
        $('#payout_mobile_number').removeClass('validation');
        $('#mobile_check').hide();
        mobile_check = true;
    }else if($('#payout_mobile_number').val().length == 0 ){
        $('#payout_mobile_number').addClass('validation');
        $('#mobile_check').show();
        $('#mobile_check').html("Mobile Number is required*");
        mobile_check = false;
        $('#payout_mobile_number').focus();
    }else{
        $('#payout_mobile_number').addClass('validation');
        $('#mobile_check').show();
        $('#mobile_check').html("Mobile Number must be 10 digit");
        mobile_check = false;
        $('#payout_mobile_number').focus();
    }
});

function mobile(){
	if($('#payout_mobile_number').val().length > 9 ){
		$('#payout_mobile_number').removeClass('validation');
		$('#mobile_check').hide();
		mobile_check = true;
	}else if($('#payout_mobile_number').val().length == 0 ){
		$('#payout_mobile_number').addClass('validation');
		$('#mobile_check').show();
		$('#mobile_check').html("Mobile Number is required*");
		mobile_check = false;
		$('#payout_mobile_number').focus();
	}else{
		$('#payout_mobile_number').addClass('validation');
		$('#mobile_check').show();
		$('#mobile_check').html("Mobile Number must be 10 digit");
		mobile_check = false;
		$('#payout_mobile_number').focus();
	}
}

$('#payout_mobile_number_login').click( function () {
    mobile();
	if ( mobile_check == true ) {
        return true;
    }else{
        return false;
    }
});
payout_amount_check = '';
function payout_amount(){
	if($('#payout_amount').val() >= 100 ){
		$('#payout_amount').removeClass('validation');
		$('#payout_amount_check').hide();
		payout_amount_check = true;
	}else if($('#payout_amount').val().length == 0 ){
		$('#payout_amount').addClass('validation');
		$('#payout_amount_check').show();
		$('#payout_amount_check').html("Amount is required*");
		payout_amount_check = false;
		$('#payout_amount').focus();
	}else{
		$('#payout_amount').addClass('validation');
		$('#payout_amount_check').show();
		$('#payout_amount_check').html("Minimum transaction amount is ₹100");
		payout_amount_check = false;
		$('#payout_amount').focus();
	}
}

$("#payout_amount").on("keyup change", function(e) {
    if($('#payout_amount').val() >= 100 ){
		$('#payout_amount').removeClass('validation');
		$('#payout_amount_check').hide();
		payout_amount_check = true;
	}else if($('#payout_amount').val().length == 0 ){
		$('#payout_amount').addClass('validation');
		$('#payout_amount_check').show();
		$('#payout_amount_check').html("Amount is required*");
		payout_amount_check = false;
		$('#payout_amount').focus();
	}else{
		$('#payout_amount').addClass('validation');
		$('#payout_amount_check').show();
		$('#payout_amount_check').html("Minimum transaction amount is ₹100");
		payout_amount_check = false;
		$('#payout_amount').focus();
	}
});

$('#payout_transaction_amount_pay').click(function () {
    payout_amount();
    if(payout_amount_check == true){
        let payout_amount = $('#payout_amount').val();
        let payment_mode = '';
        if($("#payout_imps_check").prop("checked")){
            payment_mode = $('#payout_imps_check:checked').val();
        }
        else{
            payment_mode = $('#payout_neft_check:checked').val();
        }
        let name = $('#selected_payment_name').text();
        $('#confirm_payment').text('₹'+payout_amount+' to '+name);
        $('#payout_transaction_model').modal('hide');
        $('#transaction_confirm_model').modal('show');
    }
    else{
        return false;
    }
});

$('#payout_pay').click(function () {
    $('#payout_transaction_model').modal('hide');
    $('.loader-section').fadeIn('slow');
    var table = new DataTable('#payout_accounts_list'); 
    $('#payout_accounts_list tbody').on('click', 'tr', function () {
        $('#payout_transaction_model').modal('hide');
        $('.loader-section').fadeIn('slow');
        var selectedRow = table.row(this).data();
        $("#selected_payment_code").text(selectedRow[1]);
        $("#selected_payment_bank").text(selectedRow[3]);
        $("#selected_payment_account").text(selectedRow[4]);
        $("#selected_payment_name").text(selectedRow[2]);
        $.ajax({
            url: "get_bank",
            method:"POST",
            data: { 
                "bank_code":selectedRow[0],
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
                if(data['status'] == true){
                    if(data['message']['data']['available_channels'] == 1) {
                        $('#payout_imps').hide();
                        $('#payout_neft_check').prop('checked',true);
                        $('#payout_imps_check').prop('checked',false);
                        $('#payout_neft').show();
                    }
                    else if(data['message']['data']['available_channels'] == 2) {
                        $('#payout_neft_check').prop('checked',false);
                        $('#payout_imps_check').prop('checked',true);
                        $('#payout_imps').show();
                        $('#payout_neft').hide();
                    }
                    else{
                        $('#payout_imps_check').prop('checked',true);
                        $('#payout_neft_check').prop('checked',false);
                        $('#payout_imps').show();
                        $('#payout_neft').show();
                    }
                    $('#payout_transaction_model').modal('show');
                    $('.loader-section').fadeOut('slow');
                }else{
                    $('#payout_transaction_model').modal('hide');
                    $('#t_failed_body').text(data['message']);
                    $('#t_failed').toast('show');
                    $('.loader-section').fadeOut('slow');
                }
            },
            error: function (xhr, status, error) {
                var message = xhr['responseText'];
                message = JSON.parse(message);
                message= message['message'];
                $('#t_failed_body').text(message);
                $('#t_failed').toast('show');
                $('#payout_transaction_model').modal('show');
                $('.loader-section').fadeOut('slow');
            }
        });
    });
});