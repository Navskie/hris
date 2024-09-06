<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT idNumber, fullName, mobileNumber, emailAddress, dateHired, position FROM masterlist ORDER BY id DESC";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }

  echo json_encode($data);

  $db->close();
?>
