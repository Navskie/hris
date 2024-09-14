<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT * FROM ob ORDER BY id DESC";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'id' => $row['id'],
      'company' => $row['company'],
      'dateApplied' => $row['dateApplied'],
      'employee' => $row['idNumber'] . ' - ' . $row['fullName'],
      'position' => $row['position'],
      'purpose' => $row['purpose'],
      'departureTime' => $row['departureTime'],
      'returnTime' => $row['returnTime'],
      'arrivalTime' => $row['arrivalTime'],
      'departureEndTime' => $row['departureEndTime'],
      'status' => $row['status'],
    );
  }

  echo json_encode($data);

  $db->close();
?>
