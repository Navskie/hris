<?php
  include_once '../../../cores/database.php';

  $idNumber = $_POST['idNumber'];
  $credit = $_POST['credit'];

  $query = "UPDATE leave_credit SET credit = ? WHERE idNumber = ?";
  $stmt = $db->prepare($query);
  $stmt->bind_param('is', $credit, $idNumber);
  $result = $stmt->execute();

  if ($result) {
    $remarks = "The ".$myName." updated the ".$idNumber." leave credit to ".$credit.".";
    $page = 'Leave Credit';

    $sql_logs = mysqli_query($db, "INSERT INTO users_log (`idNumber`, `remarks`, `page`) VALUES ('$myidNumber', '$remarks', '$page')");


    echo json_encode(['status' => 'success']);
  } else {
    echo json_encode(['status' => 'error']);
  }

  $stmt->close();
  $db->close();
?>
