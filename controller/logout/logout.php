<?php

  include_once '../../cores/database.php';

  unset($_SESSION['role']);
  unset($_SESSION['id']);

  header('location: ../../index');

?>