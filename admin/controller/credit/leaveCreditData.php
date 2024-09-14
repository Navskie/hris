<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT masterlist.idNumber AS idNumber, masterlist.fullName AS fullName, masterlist.position AS position, leave_credit.credit AS credit FROM leave_credit INNER JOIN masterlist ON masterlist.idNumber = leave_credit.idNumber";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'idNumber' => $row['idNumber'],
      'fullName' => $row['fullName'],
      'position' => $row['position'],
      'credit' => $row['credit'],
    );
  }

  echo json_encode($data);

  $db->close();
?>
