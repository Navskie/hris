$(document).ready(function() {
  var table = $('#example').DataTable({
    "ajax": {
      "url": "controller/form/shiftData",
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
      { "data": "shiftWith" },
      { "data": "date" },
      { "data": "originalTime" },
      { "data": "newTime" },
      { "data": "reason" },
      { "data": "status" },
      
    ],
    "responsive": true,
    "createdRow": function(row, data, dataIndex) {
      if (data && data.id) {
        $(row).find('.manage-btn').attr('data-id', data.id);
      } else {
        console.error('Data or ID is missing for row:', data);
      }
    }
  });

  // Handle click on "Manage" button
  $('#example').on('click', '.manage-btn', function() {
    var button = $(this);
    selectedRowId = button.attr('data-id'); // Retrieve data-id from the button

    if (selectedRowId) {
      $('#statusModal').show(); // Show the modal
    } else {
      console.error('ID is undefined or missing.');
    }
  });

  // Handle modal close button click
  $('.close').on('click', function() {
    $('#statusModal').hide(); // Hide the modal
  });

  // Handle window click to close modal if outside of modal content
  $(window).on('click', function(event) {
    if ($(event.target).is('#statusModal')) {
      $('#statusModal').hide(); // Hide the modal
    }
  });

  // Handle confirm button click in the modal
  $('#confirmCancel').on('click', function() {
    if (selectedRowId) {
      updateStatus(selectedRowId, 'Canceled');
      $('#statusModal').hide(); // Hide the modal after updating
    } else {
      console.error('No row ID selected.');
    }
  });

  // Function to update status
  function updateStatus(id, status) {
    console.log('Sending AJAX request with id:', id, 'status:', status);

    $.ajax({
      url: 'controller/form/shiftUpdate',
      method: 'POST',
      data: {
        id: id,
        status: status
      },
      success: function(response) {
        console.log('Update response:', response);
        if (response.success) {
          table.ajax.reload(null, false); // Reload the table without resetting pagination
        } else {
          alert('Error updating status: ' + response.message);
          console.error('Error message:', response.message);
        }
      },
      error: function(xhr, status, error) {
        alert('Error updating status');
        console.error('AJAX Error:', status, error);
      }
    });
  }
});