<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT * FROM shift WHERE idNumber = '$myidNumber'";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'id' => $row['id'],
      'company' => $row['company'],
      'dateApplied' => $row['dateApplied'],
      'employee' => $row['idNumber'] . ' - ' . $row['fullName'],
      'shiftWith' => $row['shiftWith'],
      'date' => $row['startDate'] . ' - ' . $row['endDate'],
      'originalTime' => $row['originalTime'],
      'newTime' => $row['newTime'],
      'reason' => $row['reason'],
      'status' => $row['status'],
    );
  }

  echo json_encode($data);

  $db->close();
?>
