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

  <?php
    $sql = "SELECT COUNT(id) as sum FROM masterlist";
    $sql_query = mysqli_query($db, $sql);
    $sql_fetch = mysqli_fetch_array($sql_query);

    $idNumber = 111900000 + $sql_fetch['sum'];
  ?>

  <div class="content">
    <form id="masterlistForm">
      <div class="masterlist">
        <div class="personal-info">
          <h1 class="title">Employee Information</h1>
          <div class="formgroup">
            <label for="">ID Number</label>
            <input type="text" class="disabled" name="idNumber" autocomplete="OFF" value="<?php echo $idNumber ?>" readonly>
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
            <span id="error-message"></span>
          </div>
          <div class="formgroup">
            <label for="">Civil Status</label>
            <input type="text" name="civilstatus" autocomplete="OFF">
            <div class="dropdown-list">
              <ul class="select civilstatus">
                <li>Single</li>
                <li>Married</li>
              </ul>
            </div>
          </div>
          <div class="formgroup">
            <label for="">Address</label>
            <input type="text" name="address" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Gender</label>
            <input type="text" name="gender" autocomplete="OFF">
            <div class="dropdown-list">
              <ul class="select gender">
                <li>Male</li>
                <li>Female</li>
                <li>Rather not say</li>
              </ul>
            </div>
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
            <div class="dropdown-list">
              <ul class="select position">
                <li>General Manager</li>
                <li>MIS Supervisor</li>
                <li>Seniro Multimedia Artist</li>
                <li>Online Sales Consultant</li>
                <li>Accounting</li>
                <li>Accounting Supervisor</li>
                <li>Advertising Team Lead</li>
                <li>CS Representative</li>
                <li>Logistic</li>
                <li>Admin Staff</li>
              </ul>
            </div>
          </div>
          <div class="formgroup">
            <label for="">SSS</label>
            <input type="text" name="sss" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Philhealth</label>
            <input type="text" name="phil" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">Pagibig</label>
            <input type="text" name="pagibig" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <label for="">TIN</label>
            <input type="text" name="tin" autocomplete="OFF">
          </div>
          <div class="formgroup">
            <button class="default-btn" id="addMaster">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <?php include_once 'include/footer.php' ?>
  <script src="assets/js/masterlist/add.js"></script>

  <script>
    $(document).ready(function() {
      // allowed numbers
      $('input[name="mobile"]').on('input', function() {
          const input = $(this);
          input.val(input.val().replace(/\D/g, ''));
      });

      // validate email
      $('input[name="email"]').on('input', function() {
        const email = $(this).val();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const $errorMessage = $('#error-message');

        if (emailPattern.test(email)) {
            $errorMessage.hide();
        } else {
            $errorMessage.text('Invalid email address.').show();
        }
      });

      // dropdown list
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
      setupDropdown('input[name="civilstatus"]', '.civilstatus');
      setupDropdown('input[name="gender"]', '.gender');
      setupDropdown('input[name="position"]', '.position');

      function formatSSSInput(event) {
          let input = $(event.target);
          let value = input.val().replace(/\D/g, '');
          if (value.length > 10) value = value.slice(0, 10);
          let formattedValue = value.replace(/(\d{2})(\d{7})(\d{0,1})/, '$1-$2-$3');
          input.val(formattedValue);
      }

      function formatPhilHealthInput(event) {
          let input = $(event.target);
          let value = input.val().replace(/\D/g, '');
          if (value.length > 12) value = value.slice(0, 12);
          let formattedValue = value.replace(/(\d{2})(\d{9})(\d{0,1})/, '$1-$2-$3'); 
          input.val(formattedValue);
      }

      function formatPagibigInput(event) {
          let input = $(event.target);
          let value = input.val().replace(/\D/g, '');
          if (value.length > 12) value = value.slice(0, 12);
          let formattedValue = value.replace(/(\d{4})(\d{4})(\d{0,4})/, '$1-$2-$3');
          input.val(formattedValue);
      }

      function formatTINInput(event) {
          let input = $(event.target);
          let value = input.val().replace(/\D/g, '');
          if (value.length > 9) value = value.slice(0, 9);
          let formattedValue = value.replace(/(\d{3})(\d{3})(\d{0,3})/, '$1-$2-$3');
          input.val(formattedValue);
      }
      $('input[name="sss"]').on('input', formatSSSInput);
      $('input[name="phil"]').on('input', formatPhilHealthInput);
      $('input[name="pagibig"]').on('input', formatPagibigInput);
      $('input[name="tin"]').on('input', formatTINInput);

    });
  </script>
</body>
</html>