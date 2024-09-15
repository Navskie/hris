<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../cores/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>

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
    <h1 class="header">Change Password</h1>
    <form id="passwordForm">
    
      <div class="masterlist"> 

        <div class="personal-info">
          <div class="formgroup">
            <label for="">Old Password *</label>
            <input type="password" name="oldPassword" autocomplete="OFF">
          </div>
        </div>

        <div class="personal-info">
          <div class="formgroup">
            <label for="">New Password</label>
            <input type="password" name="newPassword" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Retype New Password</label>
            <input type="password" name="ReNewPassword" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <button class="default-btn" id="submitPassword">Submit</button>
          </div>
        </div>
      </div>

    </form>
  </div>

  <?php include_once 'include/footer.php' ?>
  <script src="assets/js/setting/passwordChange.js"></script>
</body>
</html>