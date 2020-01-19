// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "ajax":{
      "url":"inc/getData.php?type=dataTable",
      "dataSrc" : ""
    },
    "columns" : [
      {"data":"STUDENT_NUMBER"},
      {"data":"ACADEMIC_YEAR"},
      {"data":"DEPARTMENT"},
      {"data":"EMAIL"},
      {"data":"SEX"},
      {"data":"ACTION"}
    ],
    "columnDefs" : [
      {"orderable": false, "targets": 5 }
    ]
  });

  $('#dataTable').on('click','#btn-edit',function () {
    var edit_id = $(this).attr('data-id-edit');
    alert("edit " + edit_id);
    //work with model
  });

  $('#dataTable').on('click','#btn-delete',function () {
    var delete_id = $(this).attr('data-id-delete');
    alert("delete " + delete_id);
    //work with model
  });

});
