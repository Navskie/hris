<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT * FROM overtime ORDER BY id DESC";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'id' => $row['id'],
      'company' => $row['company'],
      'dateApplied' => $row['dateApplied'],
      'position' => $row['position'],
      'employee' => $row['idNumber'] . ' - ' . $row['fullName'],
      'date' => $row['date'],
      'hours' => $row['hours'],
      'reason' => $row['reason'],
      'status' => $row['status'],
    );
  }

  echo json_encode($data);

  $db->close();
?>
