$(document).ready(function() {
  var selectedRow;

  var table = $('#example').DataTable({
    "ajax": {
      "url": "controller/form/leaveData",
      "dataSrc": ""
    },
    "columns": [
      {
        "data": null,
        "defaultContent": "<button class='action-btn'>View</button>"
      },
      {
        "data": null,
        "defaultContent": "<button class='action-btn manage-btn'>Manage</button>"
      },
      { "data": "company" },
      { "data": "dateApplied" },
      { "data": "employee" },
      { "data": "date" },
      { "data": "days" },
      { "data": "typeofLeave" },
      { "data": "leaveStatus" },
      { "data": "reason" },
      { "data": "status" },
      
    ],
    "responsive": true,
  });

  var $modal = $('#statusModal');
  var $close = $('.close');

  $('#example').on('click', '.manage-btn', function() {
    var $button = $(this);
    var row = table.row($button.closest('tr')).node();

    var rowIndex = table.row(row).index();
    var rowData = table.row(row).data();

    if (rowData) {
      selectedRow = rowData;
      $modal.show();
    }
  });

  $close.on('click', function() {
    $modal.hide();
  });

  $(window).on('click', function(event) {
    if ($(event.target).is($modal)) {
      $modal.hide();
    }
  });

  $('#confirmApprove').on('click', function() {
    if (selectedRow) {
      updateStatus(selectedRow.id, 'Approved');
      $modal.hide();
    }
  });

  $('#confirmReject').on('click', function() {
    if (selectedRow) {
      updateStatus(selectedRow.id, 'Rejected');
      $modal.hide();
    } else {
    }
  });

  function updateStatus(id, status) {
    $.ajax({
      url: 'controller/form/leaveUpdate.php',
      method: 'POST',
      data: {
        id: id,
        status: status
      },
      success: function(response) {
        if (response.success) {
          table.ajax.reload();
        } else {
          alert('Error updating status: ' + response.message);
        }
      },
      error: function(xhr, status, error) {
        alert('Error updating status');
      }
    });
  }
});