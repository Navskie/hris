<?php
  include_once '../../cores/database.php';

  header('Content-Type: application/json');

  $response = [];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idNumber = trim($db->real_escape_string($_POST['idNumber']));
    $passWord = trim($db->real_escape_string($_POST['passWord']));

    $sql = "SELECT passWord, role, id FROM users WHERE idNumber = '$idNumber'";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['passWord'];
        
        if (password_verify($passWord, $hashedPassword)) {
          $_SESSION['role'] = $row['role'];
          $_SESSION['id'] = $row['id'];

          $status = 'success';
          $title = 'Success';
          $message = 'Credentials correct please wait';
          $role = $row['role'];
        } else {
          $status = 'failed';
          $title = 'Failed';
          $message = 'Invalid credentials please try again';
          $role = '';
        }
    } else {
      $status = 'failed';
      $title = 'Failed';
      $message = 'Invalid credentials please try again';
      $role = '';
    }

    $response = [
      'status' => $status,
      'title' => $title,
      'message' => $message,
      'role' => $role
    ];
  }

  echo json_encode($response);
?>
