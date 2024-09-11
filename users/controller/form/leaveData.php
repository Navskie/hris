<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT * FROM leaves WHERE idNumber = '$myidNumber'";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'id' => $row['id'],
      'company' => $row['company'],
      'dateApplied' => $row['dateApplied'],
      'employee' => $row['idNumber'] . ' - ' . $row['fullName'],
      'position' => $row['position'],
      'date' => $row['startDate'] . ' - ' . $row['endDate'],
      'days' => $row['days'],
      'typeofLeave' => $row['typeofLeave'],
      'reason' => $row['reason'],
      'leavestatus' => $row['leaveStatus'],
      'status' => $row['status'],
    );
  }

  echo json_encode($data);

  $db->close();
?>
