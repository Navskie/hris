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
          <th>Action</th>
          <th>Employee</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Birthday</th>
          <th>Civil Status</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Date Hired</th>
          <th>Position</th>
          <th>Contact Person</th>
          <th>Contact Number</th>
          <th>Blood Type</th>
          <th>Allergy</th>
          <th>SSS</th>
          <th>PHILHEALTH</th>
          <th>PAGIBIG</th>
          <th>TIN</th>
        </tr>
      </thead>
      <tbody id="masterlist_data">
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>

<?php include_once 'include/footer.php' ?>

<script src="assets/js/masterlist/view.js"></script>
</body>
</html>
