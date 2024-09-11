<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../cores/database.php' ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Form | Leave</title>

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
    <h1 class="header">Leave Application</h1>
    <form id="leaveForm">
    
      <div class="masterlist"> 

        <div class="personal-info">
          <div class="formgroup">
            <label for="">Company *</label>
            <input type="text" name="company" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Start Date *</label>
            <input type="text" name="startDate" id="startDate" placeholder="YYYY-MM-DD" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">End Date *</label>
            <input type="text" name="endDate" id="endDate" placeholder="YYYY-MM-DD" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Hours / Days *</label>
            <input type="text" name="days" autocomplete="OFF">
          </div>
        </div>

        <div class="personal-info">
          <div class="formgroup">
            <label for="">Type of Leave *</label>
            <input type="text" name="types" autocomplete="OFF">
            <div class="dropdown-list">
              <ul class="select types">
                <li>Sick</li>
                <li>Vacation</li>
                <li>Half Day</li>
                <li>Undertime</li>
                <li>Emergency</li>
                <li>Others</li>
              </ul>
            </div>
          </div>
          <div class="formgroup">
            <label for="">Leave Status *</label>
            <input type="text" name="leaveStatus" autocomplete="OFF">
            <div class="dropdown-list">
              <ul class="select leaveStatus">
                <li>With Pay</li>
                <li>Without Pay</li>
              </ul>
            </div>
          </div>
          <div class="formgroup">
            <label for="">Reason *</label>
            <textarea name="reason" rows="5" cols="30"></textarea>
          </div>
          <div class="formgroup">
            <button class="default-btn" id="submitLeave">Submit</button>
          </div>
        </div>
      </div>

    </form>
  </div>

  <?php include_once 'include/footer.php' ?>
  <script src="assets/js/application/leave.js"></script>
  <script>
    $(document).ready(function() {
      function setupDropdown(inputSelector, listSelector) {
        const $input = $(inputSelector);
        const $select = $(listSelector);

        $select.hide();

        $input.on('focus', function() {
            $select.show();
        });

        $(document).on('click', function(event) {
            if (!$(event.target).closest('.formgroup').find($select).length && !$(event.target).is($input)) {
                $select.hide();
            }
        });

        $select.on('click', 'li', function() {
            $input.val($(this).text()); 
            $select.hide();
        });
      }

      setupDropdown('input[name="types"]', '.types');
      setupDropdown('input[name="leaveStatus"]', '.leaveStatus');
    });
  </script>
</body>
</html>