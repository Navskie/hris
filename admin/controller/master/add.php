<?php
include_once '../../../cores/database.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idNumber = htmlspecialchars($_POST['idNumber']);
    $fullnames = htmlspecialchars($_POST['fullname']);
    $fullname = ucwords($fullnames);
    $mobile = htmlspecialchars($_POST['mobile']);
    $email = htmlspecialchars($_POST['email']);
    $civilstatus = htmlspecialchars($_POST['civilstatus']);
    $address = ucwords(htmlspecialchars($_POST['address']));
    $gender = htmlspecialchars($_POST['gender']);
    $datehired = htmlspecialchars($_POST['datehired']);
    $position = htmlspecialchars($_POST['position']);
    $contactPerson = ucwords(htmlspecialchars($_POST['contactPerson']));
    $contactNumber = ucwords($_POST['contactNumber']);
    $bloodType = htmlspecialchars($_POST['bloodType']);
    $allergies = ucwords(htmlspecialchars($_POST['allergies']));
    $bday = htmlspecialchars($_POST['bday']);
    $sss = htmlspecialchars($_POST['sss']);
    $phil = htmlspecialchars($_POST['phil']);
    $pagibig = htmlspecialchars($_POST['pagibig']);
    $tin = htmlspecialchars($_POST['tin']);

    if (empty($idNumber) || empty($fullname) || empty($mobile) || empty($email) ||
        empty($civilstatus) || empty($address) || empty($gender)) {
        $response = [
            'status' => 'failed',
            'title' => 'Failed',
            'message' => 'All fields are required.'
        ];
    } else {
        $stmt = $db->prepare("INSERT INTO masterlist 
            (`idNumber`, `fullName`, `mobileNumber`, `emailAddress`, `civilStatus`, `gender`, `address`, `dateHired`, `position`, `sss`, `philhealth`, `pagibig`, `tin`, `bday`, `contactPerson`, `contactNumber`, `bloodType`, `allergies`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt->bind_param('issssssssssssssiss', $idNumber, $fullname, $mobile, $email, $civilstatus, $gender, $address, $datehired, $position, $sss, $phil, $pagibig, $tin, $bday, $contactPerson, $contactNumber, $bloodType, $allergies);

            if ($stmt->execute()) {
                $user_stmt = $db->prepare("INSERT INTO users (`idNumber`, `passWord`, `fullName`, `role`) VALUES (?, ?, ?, ?)");
                $password = password_hash('123456', PASSWORD_DEFAULT);
                $user_stmt->bind_param('isss', $idNumber, $password, $fullname, $role);
    
                $role = 'employee';
    
                $user_stmt->execute();

                $credit = mysqli_query($db, "INSERT INTO leave_credit (`idNumber`) VALUES ('$idNumber')");

                $remarks = "The ".$myName." added the ".$idNumber." to the masterlist";
                $page = 'Masterlist';

                $sql_logs = mysqli_query($db, "INSERT INTO users_log (`idNumber`, `remarks`, `page`) VALUES ('$myidNumber', '$remarks', '$page')");

                $response = [
                    'status' => 'success',
                    'title' => 'Success',
                    'message' => 'Data has been saved successfully.'
                ];
            } else {
                $response = [
                    'status' => 'failed',
                    'title' => 'Failed',
                    'message' => 'Failed to execute query: ' . $stmt->error
                ];
            }

            $stmt->close();
        } else {
            $response = [
                'status' => 'failed',
                'title' => 'Failed',
                'message' => 'Failed to prepare the SQL statement.'
            ];
        }
    }

    $db->close();
}

echo json_encode($response);
?>
