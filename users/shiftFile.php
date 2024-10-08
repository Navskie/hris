<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../cores/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Form | Change Shift</title>

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
    <h1 class="header">Change Shift Application</h1>
    <form id="changeshiftForm">
    
      <div class="masterlist"> 

        <div class="personal-info">
          <div class="formgroup">
            <label for="">Change Shift With *</label>
            <input type="text" name="with" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Start Date *</label>
            <input type="text" id="startDate" name="startDate" placeholder="YYYY-MM-DD" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">End Date *</label>
            <input type="text" id="endDate" name="endDate" placeholder="YYYY-MM-DD" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Company *</label>
            <input type="text" name="company" autocomplete="OFF">
          </div>
        </div>


        <div class="personal-info">
          <div class="formgroup">
            <label for="">Original Time *</label>
            <input type="text" name="originalTime" placeholder="24:00" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">New Time *</label>
            <input type="text" name="newTime" placeholder="24:00" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Reason *</label>
            <textarea name="reason" rows="5" cols="30"></textarea>
          </div>
          <div class="formgroup">
            <button class="default-btn" id="submitChangeShift">Submit</button>
          </div>
        </div>
      </div>

    </form>
  </div>

  <?php include_once 'include/footer.php' ?>
  <script src="assets/js/application/shift.js"></script>

</body>
</html>