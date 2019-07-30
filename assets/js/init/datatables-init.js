(function ($) {
    //    "use strict";
    var lokasinow = window.location.href ;



    /*  Data Table
    -------------*/

    // $('#bootstrap-data-table').DataTable({
    //     lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
    //     buttons: [
    //          'csv', 'print'
    //     ]
    // });
    //
    $('#bootstrap-data-table thead tr').clone(true).appendTo( '#bootstrap-data-table thead' );
    $('#bootstrap-data-table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $('#bootstrap-data-table2 thead tr').clone(true).appendTo( '#bootstrap-data-table2 thead' );
    $('#bootstrap-data-table2 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $('#bootstrap-data-table3 thead tr').clone(true).appendTo( '#bootstrap-data-table3 thead' );
    $('#bootstrap-data-table3 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );




//get Update
$('#Medit ').submit(function(){
   $.ajax({
       type : $(this).attr('method'),
       url  : $(this).attr('action'),
       success: function(data){
         alert('Update Success');
         // table.fnPageChange("first",1);
       }
       ,
       // error: function(data) {
       //    alert('fail');
       //  }
   });

});
//get data update
  $('#bootstrap-data-table #btn_updateedit').on('click',function(){
    var base_url = window.location.origin;

    // var host = window.location.host;

    var pathArray = window.location.pathname.split( '/' );

    var href = $(this).attr("name");
      // var base_url = window.location +"/getData/" + href;
      // console.log(base_url);
      var urll = base_url+"/"+pathArray[1]+"/"+pathArray[2]+"/getData/"+href;
     console.log(urll);
     // alert(host);
     // alert(pathArray[1]);
     $.ajax({
         type : "GET",
         url  : urll,
         dataType : "JSON",
         success: function(data){
           $('#Modal_Edit').modal('show');
           $.each(data, function(key, value){
               document.getElementById(key).value = value;
               // alert(value);
           });
         },
         error: function(data) {
             alert('kenapa fail');
        }
     });
     // return false;

 });

    //delete record to database
      $('#bootstrap-data-table #btn_delete').on('click',function(event){
        var href = $(this).attr("href");
        // alert("Apakah");
        // alert(href);
         // var product_code = $('#product_code_delete').val();
         $.ajax({
             type : "POST",
             url  : href,
             dataType : "JSON",
             // data : $response,
             success: function(data){
               // alert(data.success);
               if(data.success == "true"){
                 // alert(data);
                    alert('Terhapus');
                    // var lokasinow = window.location.href ;
                    // alert(window.location.href);

                     // window.location='thank-you.html
                     // location.href = "http://www.example.com/ThankYou.html";
                    // window.location.reload(true);
                    document.location.reload(false);
                    // table.fnDraw();
                    // table.fnPageChange("first",1);
                    // state.loaded();
                    // table.reload();
                    // $('#bootstrap-data-table #btn_delete').DataTable().ajax.reload();
                  // table.row( $('#bootstrap-data-table #btn_delete').parents('tr')).remove().draw(false);
                  // redirect(refresh);
                  // table.ajax.reload( null, false ); // user paging is not reset on reload
                    // table
                    //     .rows($('#bootstrap-data-table #btn_delete'.parents('tr'))
                    //     .invalidate()
                    //     .draw();
               }else if (data.success == "false"){
                 // alert(data.success);

                   alert('Maaf, Data tidak bisa dihapus karena data masih digunakan');

               }

             },
             error: function(data) {
              //sad error
              // alert('hayolo');

              // $("#error-message-selector").html('').append(data.responseJSON.error_msg);
            }
         });
         // alert("GAGAL?");
         // return false;
         event.preventDefault();
         // event.isDefaultPrevented();

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

	// $('#row-select').DataTable( {
	// 		initComplete: function () {
	// 			this.api().columns().every( function () {
	// 				var column = this;
	// 				var select = $('<select class="form-control"><option value=""></option></select>')
	// 					.appendTo( $(column.footer()).empty() )
	// 					.on( 'change', function () {
	// 						var val = $.fn.dataTable.util.escapeRegex(
	// 							$(this).val()
	// 						);
  //
	// 						column
	// 							.search( val ? '^'+val+'$' : '', true, false )
	// 							.draw();
	// 					} );
  //
	// 				column.data().unique().sort().each( function ( d, j ) {
	// 					select.append( '<option value="'+d+'">'+d+'</option>' )
	// 				} );
	// 			} );
	// 		}
	// 	} );
  //
  //   $("#bootstrap-data-table tbody").click(function (event) {
  //       $(table.fnSettings().aoData).each(function () {
  //           $(this.nTr).removeClass('active');
  //       });
  //       $(event.target.parentNode).addClass('active');
  //   });


  // table.rows().every( function () {
  //     // var d = this.data();
  //     // d.counter++; // update data source for the row
  //     // alert(d);
  //
  //     this.invalidate(); // invalidate the data DataTables has cached for this row
  // } );

  // Draw once all updates are done
  // table.draw();
  // $('#bootstrap-data-table').DataTable( {
  //     initComplete: function () {
  //         this.api().columns().every( function () {
  //             var column = this;
  //             var select = $('<select><option value=""></option></select>')
  //                 .appendTo( $(column.footer()).empty() )
  //                 .on( 'change', function () {
  //                     var val = $.fn.dataTable.util.escapeRegex(
  //                         $(this).val()
  //                     );
  //
  //                     column
  //                         .search( val ? '^'+val+'$' : '', true, false )
  //                         .draw();
  //                 } );
  //
  //             column.data().unique().sort().each( function ( d, j ) {
  //                 select.append( '<option value="'+d+'">'+d+'</option>' )
  //             } );
  //         } );
  //     }
  // } );


  // $('#bootstrap-data-table').on( 'click', 'tbody tr', function (e) {
  //        if ( $(this).hasClass('selected') ) {
  //             $(this).removeClass('selected');
  //         }
  //         else {
  //             table.$('tr.selected').removeClass('selected');
  //             $(this).addClass('selected');
  //         }
  //
  // } );
  var table = $('#bootstrap-data-table').removeAttr('width').DataTable({
      "processing": true,
      select: true,
      orderCellsTop: true,
      lengthMenu: [[5, 25, 50, -1], [5, 25, 50, "All"]],
      // lenghtChange : false,
      dom: 'lfrtBip',
      // buttons : true,
      destroy: true,
      // scrollX:  true,
      // scrollY:  true,
      // scrollCollapse: true,
   //    // paging:         false,
   //      columnDefs: [
   //     { width: 1, targets: 1 }
   // ],
   columnDefs: [
      {
          targets: 1,
          className: 'noVis'
      }
  ],

      select: {
              style:    'os',
              selector: 'td:first-child'
      },

      buttons: [
                      {extend: 'copy',
                       className: 'yeah',
                    },
                    {extend: 'excel',
                       className: 'yeah',
                    },
                    {extend: 'csv',
                       className: 'yeah',
                    },
                    {extend: 'print',
                       className: 'yeah',
                    },
                      {
                       extend: 'colvis',
                       className: 'yeah',
                       columns: ':not(.noVis)',
                       text: 'Columns'
                       }
      ],
       // fixedColumns: true
  });

   var table2 = $('#bootstrap-data-table2').removeAttr('width').DataTable({
      "processing": true,
      select: true,
      orderCellsTop: true,
      lengthMenu: [[5, 25, 50, -1], [5, 25, 50, "All"]],
      // lenghtChange : false,
      dom: 'lfrtBip',
      // buttons : true,
      destroy: true,
      // scrollX:  true,
      // scrollY:  true,
      // scrollCollapse: true,
   //    // paging:         false,
   //      columnDefs: [
   //     { width: 1, targets: 1 }
   // ],
   columnDefs: [
      {
          targets: 1,
          className: 'noVis'
      }
  ],

      select: {
              style:    'os',
              selector: 'td:first-child'
      },

      buttons: [
                      {extend: 'copy',
                       className: 'yeah',
                    },
                    {extend: 'excel',
                       className: 'yeah',
                    },
                    {extend: 'csv',
                       className: 'yeah',
                    },
                    {extend: 'print',
                       className: 'yeah',
                    },
                      {
                       extend: 'colvis',
                       className: 'yeah',
                       columns: ':not(.noVis)',
                       text: 'Columns'
                       }
      ],
       // fixedColumns: true
  });

    var table3 = $('#bootstrap-data-table3').removeAttr('width').DataTable({
      "processing": true,
      select: true,
      orderCellsTop: true,
      lengthMenu: [[5, 25, 50, -1], [5, 25, 50, "All"]],
      // lenghtChange : false,
      dom: 'lfrtBip',
      // buttons : true,
      destroy: true,
      // scrollX:  true,
      // scrollY:  true,
      // scrollCollapse: true,
   //    // paging:         false,
   //      columnDefs: [
   //     { width: 1, targets: 1 }
   // ],
   columnDefs: [
      {
          targets: 1,
          className: 'noVis'
      }
  ],

      select: {
              style:    'os',
              selector: 'td:first-child'
      },

      buttons: [
                      {extend: 'copy',
                       className: 'yeah',
                    },
                    {extend: 'excel',
                       className: 'yeah',
                    },
                    {extend: 'csv',
                       className: 'yeah',
                    },
                    {extend: 'print',
                       className: 'yeah',
                    },
                      {
                       extend: 'colvis',
                       className: 'yeah',
                       columns: ':not(.noVis)',
                       text: 'Columns'
                       }
      ],
       // fixedColumns: true
  });
  // $('.dt-button').attr("class","btn btn-success")





})(jQuery);
