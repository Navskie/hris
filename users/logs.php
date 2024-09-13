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
  <?php 
    $row = mysqli_query($db, "SELECT * FROM users_log WHERE idNumber = '$myidNumber'");
    foreach ($row as $data) {
  ?>
    <div class="activity-body">
      <span class="text">
        <h1><?php echo $data['page'] ?></h1>
        <p><?php echo $data['remarks'] ?></p>
      </span>
      <span class="date"><?php echo $data['created_at'] ?></span>
    </div>
  <?php } ?>
  </div>

  <?php include_once 'include/footer.php' ?>
  <script src="assets/js/application/ob.js"></script>

</body>
</html>