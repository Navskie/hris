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
    // Calculate the date 7 days ago
    $sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));

    // Fetch logs from the last 7 days
    $query = "SELECT * FROM users_log WHERE idNumber = '$myidNumber' AND created_at >= '$sevenDaysAgo' ORDER BY created_at DESC";
    $result = mysqli_query($db, $query);

    // Check if the query executed successfully
    if (mysqli_num_rows($result) > 0) {
      foreach ($result as $data) {
  ?>
    <div class="activity-body">
      <span class="text">
        <h1><?php echo htmlspecialchars($data['page']); ?></h1>
        <p><?php echo htmlspecialchars($data['remarks']); ?></p>
      </span>
      <span class="date"><?php echo htmlspecialchars($data['created_at']); ?></span>
    </div>
  <?php 
      }
    } else {
      echo "<div class='activity-body'><p>No logs found for the last 7 days.</p></div>";
    }
  ?>
  </div>

  <?php include_once 'include/footer.php' ?>
  <script src="assets/js/application/ob.js"></script>

</body>
</html>
