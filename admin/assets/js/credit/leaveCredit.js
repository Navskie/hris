$(document).ready(function() {
  var selectedRow;

  var table = $('#example').DataTable({
    "ajax": {
      "url": "controller/credit/leaveCreditData",
      "dataSrc": ""
    },
    "columns": [
      {
        "data": null,
        "defaultContent": "<button class='action-btn manage-btn'>Manage</button>"
      },
      { "data": "idNumber" },
      { "data": "fullName" },
      { "data": "position" },
      { "data": "credit" },
    ],
    "responsive": true,
  });

});