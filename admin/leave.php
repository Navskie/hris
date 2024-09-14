<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../cores/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Form | Leave</title>
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
    <h1 class="masterTitle">Leave List</h1>
    <table id="example" class="display nowrap" style="width: 100%;">
      <thead>
        <tr>
          <th>#</th>
          <td>Action</td>
          <th>Company</th>
          <th>Date Applied</th>
          <th>Employee</th><!-- name and id -->
          <th>Inclusive Date</th>
          <th>Days</th><!-- From to date -->
          <th>Type of Leave</th>
          <th>Leave Status</th>
          <th>Reason</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="masterlist_data">
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>

  <!-- Modal HTML -->
  <?php include 'assets/modal/formModal.php' ?>

  <?php include_once 'include/footer.php' ?>

  <script src="assets/js/form/leave.js"></script>
  </body>
</html>
