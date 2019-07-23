(function ($) {
    //    "use strict";


    /*  Data Table
    -------------*/

    // $('#bootstrap-data-table').DataTable({
    //     lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
    //     buttons: [
    //          'csv', 'print'
    //     ]
    // });

    var table = $('#bootstrap-data-table').DataTable({
        // "processing": true,
        // select: true,
        // lengthChange: false,
        // columnDefs: [ {
        //      orderable: false,
        //      className: 'select-checkbox',
        //      targets:   0
        //  } ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'lfrt<"clear">Bip',
        buttons : true,
        destroy: true,
        select: {
                style:    'os',
                selector: 'td:first-child'
        },
        // select: {
        //       style:    'os',
        //       selector: 'td:first-child'
        //   },
        buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'print'

           //      ,
           //      {
           //     text: 'Select alls',
           //     action: function () {
           //         table.rows$('#bootstrap-data-table').parents('tr')).select();
           //     }
           // }
        ]

    });

    $('#bootstrap-data-table').on( 'click', 'tbody td:not(:first-child)', function (e) {
    // $('#bootstrap-data-table').inline( this );
      // select: true;
          // alert( "Kok masih jalan." );
           // $('#bootstrap-data-table').parents('td').addClass("active");
           // table.row(  $('#bootstrap-data-table').parents('tr')).addClass("selected");
           // table.inline();

    } )
    ;


    //delete record to database
      $('#bootstrap-data-table #btn_delete').on('click',function(){
        var href = $(this).attr("href");
        // alert("Apakah");
         // var product_code = $('#product_code_delete').val();
         $.ajax({
             type : "POST",
             url  : href,
             dataType : "JSON",
             // data : $response,
             success: function(data){
               // alert(data.success);
               if(data.success == "true"){
                 alert('terhapus')
                  // alert($(this));
                  // table
                  //    .row($('#bootstrap-data-table').parents('tr') )
                  //    .remove()
                  //    .draw(false);
                    // $(this).parent().parent().remove();
                    // $(this).closest('tr').remove().draw();
                          // table.ajax.reload();
                  table.row(  $('#bootstrap-data-table #btn_delete').parents('tr')).remove().draw(false);
               }else{
                 alert('Maaf, Data tidak bisa dihapus karena data masih digunakan')
               }
               // alert(href);
               // table.remove().draw();
                 // $('[name="product_code_delete"]').val("");
                 // $('#Modal_Delete').modal('hide');
                 // show_product();
             },
             error: function(data) {
              //sad error
              $("#error-message-selector").html('').append(data.responseJSON.error_msg);
    }
         });
         // alert("GAGAL?");
         return false;

     });

    // table
    //    .buttons()
    //    .container()
    //    .appendTo( '.card-header' );

    // $('#bootstrap-data-table').container()
    //     .appendTo( $('.col-sm-6:eq(0)', $('#bootstrap-data-table').table().container() ) );

    // $('#bootstrap-data-table').container()
    //   .appendTo( '#bootstrap-data-table_wrapper .col-md-12:eq(0)' );

  // $('#bootstrap-data-table-export').row(':eq(0)', { page: 'current' }).select();

	$('#row-select').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );

    $("#bootstrap-data-table tbody").click(function (event) {
        $(table.fnSettings().aoData).each(function () {
            $(this.nTr).removeClass('active');
        });
        $(event.target.parentNode).addClass('active');
    });







})(jQuery);
