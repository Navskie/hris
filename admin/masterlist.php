<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../cores/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masterlist</title>
  <!-- DataTables CSS and JS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <?php include_once 'include/header.php' ?>
  <link rel="stylesheet" href="assets/css/masterlist.css">
</head>
<body>
  
  <div class="notification">
    <div class="title"></div>
    <div class="message"></div>
  </div>

  <?php include_once 'include/navbar.php' ?>

  <div class="content">
    <h1 class="masterTitle">Employee Masterlist</h1>
    <table id="example" class="display nowrap" style="width: 100%;">
      <thead>
        <tr>
          <th>ID Number</th>
          <th>Fullname</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Date Hired</th>
          <th>Position</th>
        </tr>
      </thead>
      <tbody id="masterlist_data">
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>

<?php include_once 'include/footer.php' ?>

<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "ajax": {
        "url": "controller/master/view", // Adjust the path if needed
        "dataSrc": ""
      },
      "columns": [
        { "data": "idNumber" },
        { "data": "fullName" },
        { "data": "mobileNumber" },
        { "data": "emailAddress" },
        { "data": "dateHired" },
        { "data": "position" }
      ],
      "responsive": true,
    });
  });
</script>
</body>
</html>
