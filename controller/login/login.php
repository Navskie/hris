<?php
  include_once '../../core/database.php';

  header('Content-Type: application/json');

  $response = [];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idNumber = trim($db->real_escape_string($_POST['idNumber']));
    $passWord = trim($db->real_escape_string($_POST['passWord']));

    $sql = "SELECT passWord FROM users WHERE idNumber = '$idNumber'";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['passWord'];
        
        if (password_verify($passWord, $hashedPassword)) {
          $status = 'success';
          $title = 'Success';
          $message = 'Credentials correct please wait';
        } else {
          $status = 'failed';
          $title = 'Failed';
          $message = 'Invalid credentials please try again';
        }
    } else {
      $status = 'failed';
      $title = 'Failed';
      $message = 'Invalid credentials please try again';
    }

    $response = [
      'status' => $status,
      'title' => $title,
      'message' => $message
    ];
  }

  echo json_encode($response);
?>
