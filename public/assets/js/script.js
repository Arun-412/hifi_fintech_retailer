$(document).ready(function(){
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
                pageSize: 'A4'
            },
        ]
    });

});
