<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../cores/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Activities</title>

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
    <h1 class="header">Activity Logs</h1>
    <div class="activity-body">
      <span class="text">
        <h1>Official Business File</h1>
        <p>Employee Applied for Official Business</p>
      </span>
      <span class="date">2023-02-02</span>
    </div>
  </div>

  <?php include_once 'include/footer.php' ?>
  <script src="assets/js/application/ob.js"></script>

</body>
</html>