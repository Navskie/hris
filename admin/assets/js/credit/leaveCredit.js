$(document).ready(function() {
  var selectedRow;

  var table = $('#example').DataTable({
    "ajax": {
      "url": "controller/credit/leaveCreditData",
      "dataSrc": ""
    },
    "columns": [
      // {
      //   "data": null,
      //   "defaultContent": "<button class='action-btn edit-btn'>Edit</button>"
      // },
      { "data": "idNumber" },
      { "data": "fullName" },
      { "data": "position" },
      { "data": "credit" },
    ],
    "responsive": true,
  });

  $('#example tbody').on('click', '.edit-btn', function () {
    var data = table.row($(this).parents('tr')).data();
    $('#editIdNumber').val(data.idNumber);
    $('#editCredit').val(data.credit);
    $('#editModal').show();
  });

  $('.close').on('click', function() {
    $('#editModal').hide();
  });

  $('#editForm').on('submit', function(e) {
    e.preventDefault();

    var idNumber = $('#editIdNumber').val();
    var credit = $('#editCredit').val();

    $.ajax({
      url: 'controller/credit/updateLeaveCredit.php',
      type: 'POST',
      data: {
        idNumber: idNumber,
        credit: credit
      },
      success: function(response) {
        $('#editModal').hide();
        table.ajax.reload(); // Reload the DataTable data
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });

});