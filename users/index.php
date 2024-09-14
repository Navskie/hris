<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../cores/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HRIS</title>

  <?php include_once 'include/header.php' ?>
</head>
<body>
  
  <div class="notification">
    <div class="title"></div>
    <div class="message"></div>
  </div>

  <?php include_once 'include/navbar.php' ?>

  <?php

    $queries = [
        "SELECT COUNT(id) AS count FROM ob WHERE idNumber = '$myidNumber'",
        "SELECT COUNT(id) AS count FROM overtime WHERE idNumber = '$myidNumber'",
        "SELECT COUNT(id) AS count FROM shift WHERE idNumber = '$myidNumber'",
        "SELECT COUNT(id) AS count FROM leaves WHERE idNumber = '$myidNumber'"
    ];

    $totalCount = 0;
    foreach ($queries as $query) {
        $result = mysqli_query($db, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalCount += (int)$row['count'];
        }
    }
  ?>

  <div class="content">
    
    <div class="navigation">
      <div class="card">
        <div class="icon">
          <i class="fa-solid fa-file-pen"></i>
        </div>
        <div class="details">
          <h1>File</h1>
          <span class="number"><?php echo $totalCount ?></span>
        </div>
      </div>
      <div class="card">
        <div class="icon">
          <i class="fa-solid fa-file-pen"></i>
        </div>
        <div class="details">
          <h1>Leave</h1>
          <span class="number">10</span>
        </div>
      </div>
    </div>

    

  </div>

  <?php include_once 'include/footer.php' ?>
</body>
</html>