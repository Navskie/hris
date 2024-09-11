<div class="navbar">
    <div class="link">
      <ul>
        <li><a href="index">Dashboard</a></li>
        <li class="dropdown">
          <a href="#" class="">Payroll</a>
          <ul class="dropdown-menu">
            <li><a href="#">Timekeeping</a></li>
            <li><a href="#">Payroll</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#">Application Form</a>
          <ul class="dropdown-menu">
            <li><a href="shiftForm">Shift</a></li>
            <li><a href="leaveForm">Leave</a></li>
            <li><a href="obForm">OB</a></li>
            <li><a href="overtimeForm">Overtime</a></li>
          </ul>
        </li>        
      </ul>
    </div>

    <div class="name">
      <ul>
        <li class="dropdown">
          <a href="#"><?php echo $myName ?></a>
          <ul class="dropdown-menu">
            <li><a href="setting">Setting</a></li>
            <li><a href="../controller/logout/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
</div>

<div class="mobile-responsive">
  <ul>
    <li><a href="#"><img src="assets/img/dashboard.png" alt="dash"></a></li>
    <li><a href="#"><img src="assets/img/details.png" alt="dash"></a></li>
    <li><a href="#"><img src="assets/img/salary.png" alt="dash"></a></li>
    <li><a href="#"><img src="assets/img/give-money.png" alt="dash"></a></li>
  </ul>
</div>