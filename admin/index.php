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

  <div class="content">
    
    <div class="navigation">
      <div class="card">
        <div class="icon">
          <i class="fa-solid fa-users"></i>
        </div>
        <div class="details">
          <h1>Masterlist</h1>
          <span class="number">56</span>
        </div>
      </div>
      <div class="card">
        <div class="icon">
          <i class="fa-solid fa-file-pen"></i>
        </div>
        <div class="details">
          <h1>Application</h1>
          <span class="number">56</span>
        </div>
      </div>
      <div class="card">
        <div class="icon">
          <i class="fa-solid fa-user-minus"></i>
        </div>
        <div class="details">
          <h1>Resign</h1>
          <span class="number">14</span>
        </div>
      </div>
    </div>

    

  </div>

  <?php include_once 'include/footer.php' ?>
</body>
</html>