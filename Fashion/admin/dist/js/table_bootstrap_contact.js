//
// Updates "Select all" control in a data table
//
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}
// Xử lý nút chưa Xem liên hệ
$("#dataTables_contact").on("click","a.btn-github",function(e){
    var rpl = $(this);
    var id = $(this).attr("data-id");
    $.ajax({
        type: "POST",
        url: "process_show_contact.php",
        data: {id: id},
        success: function(response){
          // alert(response);
            if (response==="success"){
                rpl.replaceWith("<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Chưa xem' data-id='"+id+"'><i class='fa fa-check-square-o'></i></a>");
                $(".view_contact_new").load("view_count_contact.php",{limit: 25},function(responsive, textStatus, req){
                  if (textStatus=="error"){
                    var msg = "Sorry but there was an error: ";
                    $(".view_contact_new").html(msg + req.status + " " + req.statusText)
                  }
                });
            } else {
                bootbox.alert("Error data: Không thực thi được. Liên hệ với admin");
            }
        },
        error: function(){
            bootbox.alert("Error: Không thực thi được. Liên hệ với admin");
        }
    });   
});
// Xử lý nút Đã Xem liên hệ
$("#dataTables_contact").on("click","a.btn-bitbucket",function(e){
    var rpl = $(this);
    var id = $(this).attr("data-id");
    $.ajax({
        type: "POST",
        url: "process_hide_contact.php",
        data: {id: id},
        success: function(response){
            if (response==="success"){
                rpl.replaceWith("<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='đã xem' data-id='"+id+"'><i class='fa fa-check-square'></i></a>");
                $(".view_contact_new").load("view_count_contact.php",{limit: 25},function(responsive, textStatus, req){
                  if (textStatus=="error"){
                    var msg = "Sorry but there was an error: ";
                    $(".view_contact_new").html(msg + req.status + " " + req.statusText)
                  }
                });
            } else {
                bootbox.alert("Error data: Không thực thi được. Liên hệ với admin");
            }
        },
        error: function(){
            bootbox.alert("Error: Không thực thi được. Liên hệ với admin");
        }
    });   
});
// Xử lý nút Xem chi tiết liên hệ
$("#model_contact_detail").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load("load_contact_detail.php?id="+link.attr("data-id")); 
});

$(document).ready(function (){
   // Array holding selected row IDs
   var rows_selected = [];
   var table = $('#dataTables_contact').DataTable({
      'ajax': 'load_contact.php',
      'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'width':'1%',
         'className': 'text-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox">';
         }
      }],
      'order': [3, 'desc'],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
   });
   $(".append_button").prepend('<label class="m-t-2"><a class="btn btn-social-icon btn-github m-r-1" id="submit_unchecked_selected" title="Ẩn bài viết đã chọn"><i class="fa fa-check-square"></i></a> <a class="btn btn-social-icon btn-bitbucket m-r-1"  id="submit_checked_selected" title="Cho phép Xem các bài viết đã chọn"><i class="fa fa-check-square-o"></i></a> <a class="btn btn-social-icon btn-pinterest m-r-1" id="submit_delete_selected" title="Xóa các bài viết đã chọn"><i class="fa fa-trash-o"></i></a></label>');
   
   // Handle click on checkbox
   $('#dataTables_contact tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on table cells with checkboxes
   $('#dataTables_contact').on('click', 'tbody td:not(:last-child), thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#dataTables_contact tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#dataTables_contact tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });

   // Đánh dấu ẩn các liên hệ đã chọn
   $("#submit_unchecked_selected").click(function(e){
        var sl = table.rows(".selected",{page:'current'}).count();
        if (sl===0){
            bootbox.alert("Chọn ít nhất một liên hệ");
        } else {
          bootbox.confirm({ 
            message: "Bạn chắc chắn là muốn đánh dấu đã xem các liên hệ đã chọn này?", 
            buttons: {
                confirm: {
                    label: 'Đồng ý',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Không',
                    className: 'btn-success'
                }
            },
            callback: function(result){
                if (result){
                  $(".loader").fadeIn("slow");
                  var list_id = [];
                  table.rows(".selected",{page:'current'}).every(function(rowIdx, tableLoop, rowLoop){
                      var r = this.data();
                      var id = r[0];
                      var cell = table.cell(this,0);
                      list_id.push(cell.data());
                  });
                  $.ajax({
                      type: "POST",
                      url: "process_hide_contact_selected.php",
                      data: {id: list_id},
                      success: function(response){
                        $(".loader").fadeOut("slow");
                        if (response==="success"){
                            table.rows(".selected",{page:'current'}).every(function(rowIdx, tableLoop, rowLoop){
                                var a = this.data();
                                var id = a[0];
                                var cell = table.cell(this,4);
                                cell.data("<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='đã xem' data-id='"+id+"'><i class='fa fa-check-square'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết liên hệ' data-toggle='modal' data-target='#model_contact_detail' data-id='"+id+"'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa liên hệ' data-id='"+id+"'><i class='fa fa-trash-o'></i></a>");
                                this.invalidate().draw(false);
                            })
                            $(".view_contact_new").load("view_count_contact.php",{limit: 25},function(responsive, textStatus, req){
                              if (textStatus=="error"){
                                var msg = "Sorry but there was an error: ";
                                $(".view_contact_new").html(msg + req.status + " " + req.statusText)
                              }
                            });
                        } else {
                            bootbox.alert("Error data: Không thực thi được. Liên hệ với admin");
                        }
                      },
                      error: function(){
                          $(".loader").fadeOut("slow");
                          bootbox.alert("Error: Không thực thi được. Liên hệ với admin");
                      }
                  });
              }
            }
          });
        }
   });

   // Đánh dấu hiện các liên hệ đã chọn
   $("#submit_checked_selected").click(function(e){
        var sl = table.rows(".selected",{page:'current'}).count();
        if (sl===0){
            bootbox.alert("Chọn ít nhất một liên hệ");
        } else {
          bootbox.confirm({ 
            message: "Bạn chắc chắn là muốn đánh dấu chưa xem các liên hệ này?", 
            buttons: {
                confirm: {
                    label: 'Đồng ý',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Không',
                    className: 'btn-success'
                }
            },
            callback: function(result){
                if (result){
                  $(".loader").fadeIn("slow");
                  var list_id = [];
                  table.rows(".selected",{page:'current'}).every(function(rowIdx, tableLoop, rowLoop){
                      var r = this.data();
                      var id = r[0];
                      var cell = table.cell(this,0);
                      list_id.push(cell.data());
                  });
                  $.ajax({
                      type: "POST",
                      url: "process_show_contact_selected.php",
                      data: {id: list_id},
                      success: function(response){
                          $(".loader").fadeOut("slow");
                          if (response==="success"){
                              table.rows(".selected", {page:'current'}).every(function(rowIdx, tableLoop, rowLoop){
                                  var a = this.data();
                                  var id = a[0];
                                  var cell = table.cell(this,4);
                                  cell.data("<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Chưa xem' data-id='"+id+"'><i class='fa fa-check-square-o'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết liên hệ' data-toggle='modal' data-target='#model_contact_detail' data-id='"+id+"'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa liên hệ' data-id='"+id+"'><i class='fa fa-trash-o'></i></a>");
                                  this.invalidate().draw(false);
                              });
                              $(".view_contact_new").load("view_count_contact.php",{limit: 25},function(responsive, textStatus, req){
                                if (textStatus=="error"){
                                  var msg = "Sorry but there was an error: ";
                                  $(".view_contact_new").html(msg + req.status + " " + req.statusText)
                                }
                              });
                          } else {
                              bootbox.alert("Error data: Không thực thi được. Liên hệ với admin");
                          }
                      },
                      error: function(){
                          $(".loader").fadeOut("slow");
                          bootbox.alert("Error: Không thực thi được. Liên hệ với admin");
                      }
                  });
                }
              }
            });
        }
   });

   // Hủy các liên hệ đã chọn
   $("#submit_delete_selected").click(function(e){
        var sl = table.rows(".selected",{page:'current'}).count();
        if (sl===0){
            bootbox.alert("Chọn ít nhất một liên hệ");
        } else {
            var list_id = [];
            table.rows(".selected",{page:'current'}).every(function(rowIdx, tableLoop, rowLoop){
                var r = this.data();
                var id = r[0];
                var cell = table.cell(this,0);
                list_id.push(cell.data());
            });
            bootbox.confirm({ 
                message: "Bạn chắc chắn là xóa tất cả các liên hệ đã chọn trong trang này?",
                buttons: {
                    confirm: {
                        label: 'Đồng ý',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Không',
                        className: 'btn-success'
                    }
                }, 
                callback: function(result){
                    if (result){
                        $(".loader").fadeIn("slow");
                        $.ajax({
                            type: "POST",
                            url: "process_delete_contact_selected.php",
                            data: {id: list_id},
                            success: function(response){
                                $(".loader").fadeOut("slow");
                                // alert(response);
                                if (response==="success"){
                                    table
                                        .rows('.selected',{page:'current'})
                                        .remove()
                                        .draw(false);
                                    $(".view_contact_new").load("view_count_contact.php",{limit: 25},function(responsive, textStatus, req){
                                      if (textStatus=="error"){
                                        var msg = "Sorry but there was an error: ";
                                        $(".view_contact_new").html(msg + req.status + " " + req.statusText)
                                      }
                                    });
                                } else {
                                    bootbox.alert("Error data: Không thực thi được. Liên hệ với admin");
                                }
                            },
                            error: function(){
                                $(".loader").fadeOut("slow");
                                bootbox.alert("Error: Không thực thi được. Liên hệ với admin");
                            }
                        });
                    }
                }
            });
        }
   });

   // Xử lý xuất hóa đơn cho các đơn hàng đã chọn
   $("#submit_orders_selected").click(function(e){
        if (rows_selected.length===0){
            alert("Chưa chọn đơn hàng")
        } else {
            var str = "";
            $.each(rows_selected, function(index, rowId){
                str += rowId + ',';
            });
            alert(str);
        }
   });
   // Hủy liên hệ ở 1 dòng 
   $('#dataTables_contact tbody').on('click', 'a.btn-pinterest', function () {
        // alert("hsjdhsjd");
        var id = $(this).attr("data-id");
        var tr = table.row($(this).parents('tr'));
        bootbox.confirm({ 
            message: "Bạn chắc chắn là muốn xóa liên hệ này?", 
            buttons: {
                confirm: {
                    label: 'Đồng ý',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Không',
                    className: 'btn-success'
                }
            },
            callback: function(result){
                if (result){
                    $(".loader").fadeIn("slow");
                    $.ajax({
                        type: "POST",
                        url: "cancel_contact_data.php",
                        data: {id: id},
                        success: function(response){
                            // alert(response);
                            $(".loader").fadeOut("slow");
                            if (response==="success"){
                                table
                                    .row(tr)
                                    .remove()
                                    .draw(false);
                               $(".view_contact_new").load("view_count_contact.php",{limit: 25},function(responsive, textStatus, req){
                                  if (textStatus=="error"){
                                    var msg = "Sorry but there was an error: ";
                                    $(".view_contact_new").html(msg + req.status + " " + req.statusText)
                                  }
                                });
                            } else {
                                bootbox.alert("Error data: Không thực thi được. Liên hệ với admin");
                            }
                        },
                        error: function(){
                            $(".loader").fadeOut("slow");
                            bootbox.alert("Error: Không thực thi được. Liên hệ với admin");
                        }
                    });
                }
            }
        });        
    });
});