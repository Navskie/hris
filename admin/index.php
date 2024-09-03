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

  <div class="navbar">
    <div class="link">
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Masterlist</a></li>
        <li><a href="#">Payroll</a></li>
        <li class="dropdown">
          <a href="#">Application Form</a>
          <ul class="dropdown-menu">
            <li><a href="#">Shift</a></li>
            <li><a href="#">Leave</a></li>
            <li><a href="#">OB</a></li>
            <li><a href="#">Overtime</a></li>
          </ul>
        </li>
        <li><a href="#">Leave Credits</a></li>
        <li><a href="#">Allowance</a></li>
        <li class="dropdown">
          <a href="#">Contribution</a>
          <ul class="dropdown-menu">
            <li><a href="#">SSS</a></li>
            <li><a href="#">PHIL</a></li>
            <li><a href="#">PAGIBIG</a></li>
          </ul>
        </li>
        <li><a href="#">13th Month</a></li>
      </ul>
    </div>

    <div class="name">
      <ul>
        <li class="dropdown">
          <a href="#">Administrator</a>
          <ul class="dropdown-menu">
            <li><a href="#">Setting</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <div class="content">
    asd
  </div>

  <?php include_once 'include/footer.php' ?>
</body>
</html>