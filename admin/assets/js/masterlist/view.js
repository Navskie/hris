$(document).ready(function() {
  $('#example').DataTable({
    "ajax": {
      "url": "controller/master/view", // Adjust the path if needed
      "dataSrc": ""
    },
    "columns": [
      {
        "data": null,
        "defaultContent": "<button class='action-btn'>View</button>"
      },
      { "data": "employee" },
      { "data": "mobileNumber" },
      { "data": "emailAddress" },
      { "data": "bday" },
      { "data": "civilStatus" },
      { "data": "gender" },
      { "data": "address" },
      { "data": "dateHired" },
      { "data": "position" },
      { "data": "contactPerson" },
      { "data": "contactNumber" },
      { "data": "bloodType" },
      { "data": "allergies" },
      { "data": "sss" },
      { "data": "philhealth" },
      { "data": "pagibig" },
      { "data": "tin" },
    ],
    "responsive": true,
  });
});