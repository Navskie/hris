<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'core/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HRIS</title>

  <!-- plugin -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- custom css -->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/notification.css">
</head>
<body>
  
  <div class="notification">
    <div class="title"></div>
    <div class="message"></div>
  </div>

  <div class="login">
    <span class="header">HRIS</span>
    <p class="note">Sign in to access.</p>
    <div class="group">
      <input type="text" class="input" placeholder="ID Number" id="myID" autocomplete="OFF">
    </div>
    <div class="group">
      <input type="password" class="input" placeholder="Password" id="passWord" autocomplete="OFF">
    </div>
    <div class="button">
      <button class="btnFormat" id="access">Access</button>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="assets/js/login.js"></script>
</body>
</html>