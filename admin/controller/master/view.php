<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $query = "SELECT * FROM masterlist";
  $result = $db->query($query);

  $data = array();

  while ($row = $result->fetch_assoc()) {
    $data[] = array(
      'employee' => $row['idNumber'] . ' - ' . $row['fullName'],
      'mobileNumber' => $row['mobileNumber'],
      'emailAddress' => $row['emailAddress'],
      'bday' => $row['bday'],
      'civilStatus' => $row['civilStatus'],
      'gender' => $row['gender'],
      'address' => $row['address'],
      'dateHired' => $row['dateHired'],
      'position' => $row['position'],
      'contactPerson' => $row['contactPerson'],
      'contactNumber' => $row['contactNumber'],
      'bloodType' => $row['bloodType'],
      'allergies' => $row['allergies'],
      'sss' => $row['sss'],
      'philhealth' => $row['philhealth'],
      'pagibig' => $row['pagibig'],
      'tin' => $row['tin'],
    );
  }

  echo json_encode($data);

  $db->close();
?>
