<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT * FROM ob WHERE idNumber = '$myidNumber'";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'id' => $row['id'],
      'company' => $row['company'],
      'dateApplied' => $row['dateApplied'],
      'employee' => $row['idNumber'] . ' - ' . $row['fullName'],
      'position' => $row['position'],
      'date' => $row['dateApplied'],
      'detime' => $row['departureTime'],
      'retime' => $row['returnTime'],
      'arrtime' => $row['arrivalTime'],
      'deendtime' => $row['departureEndTime'],
      'purpose' => $row['purpose'],
      'status' => $row['status'],
    );
  }

  echo json_encode($data);

  $db->close();
?>
