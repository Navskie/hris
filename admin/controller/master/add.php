<?php
  include_once '../../../cores/database.php';

  header('Content-Type: application/json');

  $response = [];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idNumber = htmlspecialchars($_POST['idNumber']);
    $getFullname = htmlspecialchars($_POST['fullname']);
    $fullname = ucwords($getFullname);
    $mobile = htmlspecialchars($_POST['mobile']);
    $email = htmlspecialchars($_POST['email']);
    $civilstatus = htmlspecialchars($_POST['civilstatus']);
    $address = htmlspecialchars($_POST['address']);
    $gender = htmlspecialchars($_POST['gender']);
    $datehired = htmlspecialchars($_POST['datehired']);
    $position = htmlspecialchars($_POST['position']);
    $sss = htmlspecialchars($_POST['sss']);
    $phil = htmlspecialchars($_POST['phil']);
    $pagibig = htmlspecialchars($_POST['pagibig']);
    $tin = htmlspecialchars($_POST['tin']);

    $sql = "INSERT INTO masterlist 
    (`idNumber`, `fullName`, `mobileNumber`, `emailAddress`, `civilStatus`, `gender`, `address`, `dateHired`, `position`, `sss`, `philhealth`, `pagibig`, `tin`)
    VALUES 
    ('$idNumber','$fullname','$mobile','$email','$civilstatus','$gender','$address','$datehired','$position','$sss','$phil','$pagibig', '$tin')";
    $sql_query = mysqli_query($db,$sql);

    if ($sql_query) {
      $status = 'success';
      $title = 'Success';
      $message = 'Data has been saved';
    } else {
      $status = 'failed';
      $title = 'Failed';
      $message = 'Please try again';
    }

    $response = [
      'status' => $status,
      'title' => $title,
      'message' => $message,
    ];

  }

  echo json_encode($response);

?>