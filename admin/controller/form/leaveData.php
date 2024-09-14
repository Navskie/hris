<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT * FROM leaves ORDER BY id DESC";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'id' => $row['id'],
      'company' => $row['company'],
      'dateApplied' => $row['dateApplied'],
      'employee' => $row['idNumber'] . ' - ' . $row['fullName'],
      'days' => $row['days'],
      'date' => $row['startDate'] . ' - ' . $row['endDate'],
      'typeofLeave' => $row['typeofLeave'],
      'leaveStatus' => $row['leaveStatus'],
      'reason' => $row['reason'],
      'status' => $row['status'],
    );
  }

  echo json_encode($data);

  $db->close();
?>
