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

    $('#retailers_list').DataTable({
        
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
        buttons: [
           
            // 'pageLength',
          
            {
                extend: 'copy',
                title: 'HIFI FINTECH Retailer Details',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'csv',
                title: 'HIFI FINTECH Retailer Details',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                },
                autoFilter: true,
                sheetName: 'HIFI FINTECH Retailer Details'
            },
            {
                extend: 'excel',
                title: 'HIFI FINTECH Retailer Details',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                },
                autoFilter: true,
                sheetName: 'HIFI FINTECH Retailer Details'
            },
            {
                extend: 'pdf',
                title: 'HIFI FINTECH Retailer Details',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                },
                orientation: 'portrait',
                pageSize: 'A4'
            },
            {
                extend: 'print',
                title: 'HIFI FINTECH Retailer Details',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                },
                orientation: 'portrait',
                pageSize: 'A4'
            },
        ]
    });

});
