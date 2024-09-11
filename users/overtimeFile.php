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
    <h1 class="header">Overtime Application</h1>
    <form id="overtimeForm">
    
      <div class="masterlist"> 

        <div class="personal-info">
          <div class="formgroup">
            <label for="">Date *</label>
            <input type="text" id="startDate" name="startDate" placeholder="YYYY-MM-DD" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Company *</label>
            <input type="text" name="company" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Start Time *</label>
            <input type="text" name="startTime" placeholder="24:00" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">End Time *</label>
            <input type="text" name="endTime" placeholder="24:00" autocomplete="OFF">
          </div>
        </div>

        <div class="personal-info">
          <div class="formgroup">
            <label for="">Total Hours *</label>
            <input type="text" name="hours" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Reason *</label>
            <textarea name="reason" rows="5" cols="30"></textarea>
          </div>
          <div class="formgroup">
            <button class="default-btn" id="submitOvertime">Submit</button>
          </div>
        </div>
      </div>

    </form>
  </div>

  <?php include_once 'include/footer.php' ?>
  <script src="assets/js/application/overtime.js"></script>

</body>
</html>