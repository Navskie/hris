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

  <script>
    $(document).ready(function() {
      var today = new Date();
      var minDate = today.toISOString().split('T')[0];

      $('#startDate').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: minDate,
        onSelect: function(selectedDate) {
          $('#endDate').datepicker('option', 'minDate', selectedDate);
        }
      });
      
      $('#endDate').datepicker({
        dateFormat: 'yy-mm-dd'
      });

      function formatTime(value) {
        // Remove non-digit characters
        var cleaned = value.replace(/\D/g, '');

        // Check if we have enough digits for hours and minutes
        if (cleaned.length < 4) {
          return cleaned; // Return the cleaned value as is if not enough digits
        }

        // Extract hours and minutes
        var hours = cleaned.slice(0, -2);
        var minutes = cleaned.slice(-2);

        // Format the time
        var formatted = hours.padStart(2, '0') + ':' + minutes.padStart(2, '0');

        // Add AM/PM
        var amPm = 'AM';
        if (parseInt(hours, 10) >= 12) {
          amPm = 'PM';
          if (parseInt(hours, 10) > 12) {
            hours -= 12;
          }
        }
        if (hours === '0') hours = '12'; // Handle midnight

        return formatted + ' ' + amPm;
      }

      $('input[name="originalTime"], input[name="newTime"]').on('input', function() {
        var formattedTime = formatTime($(this).val());
        $(this).val(formattedTime);
      });
    });
  </script>

</body>
</html>