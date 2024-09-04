<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../cores/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masterlist | Add</title>

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
    <form action="">
      <div class="masterlist">
        <div class="personal-info">
          <h1 class="title">Employee Information</h1>
          <div class="formgroup">
            <label for="">ID Number</label>
            <input type="text" class="disabled" name="id" autocomplete="OFF" disabled value="111900001">
          </div>
          <div class="formgroup">
            <label for="">Fullname</label>
            <input type="text" name="fullname" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Mobile Number</label>
            <input type="text" name="mobile" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Email Address</label>
            <input type="text" name="email" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Civil Status</label>
            <input type="text" name="civilstatus" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Address</label>
            <input type="text" name="civilstatus" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Gender</label>
            <input type="text" name="civilstatus" autocomplete="OFF">
          </div>
        </div>
        <div class="personal-info">
          <h1 class="title">Company Information</h1>
          <div class="formgroup">
            <label for="">Date Hired</label>
            <input type="date" name="datehired" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Position</label>
            <input type="text" name="position" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">SSS</label>
            <input type="text" name="position" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Philhealth</label>
            <input type="text" name="position" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Pagibig</label>
            <input type="text" name="position" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <button class="default-btn">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <?php include_once 'include/footer.php' ?>
</body>
</html>