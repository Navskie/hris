<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once 'cores/database.php' ?>
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

  <?php include_once 'include/footer.php' ?>
</body>
</html>