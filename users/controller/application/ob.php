<?php
include_once '../../../cores/database.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company = htmlspecialchars($_POST['company']);
    $startDate = htmlspecialchars($_POST['startDate']);
    $detime = htmlspecialchars($_POST['detime']);
    $retime = htmlspecialchars($_POST['retime']);
    $arrtime = htmlspecialchars($_POST['arrtime']);
    $deendtime = htmlspecialchars($_POST['deendtime']);
    $purpose = htmlspecialchars($_POST['purpose']);
    $status = 'Pending';

    if (empty($company) || empty($startDate) || empty($detime) || empty($retime) || empty($arrtime) || empty($deendtime) || empty($purpose)) {
        $response = [
            'status' => 'failed',
            'title' => 'Failed',
            'message' => 'All fields are required.'
        ];
    } else {
        $stmt = $db->prepare("INSERT INTO ob 
            (`dateApplied`, `purpose`, `departureTime`, `returnTime`, `arrivalTime`, `departureEndTime`, `company`, `fullName`, `idNumber`, `position`, `date`, `status`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt->bind_param('ssssssssisss', $startDate, $purpose, $detime, $retime, $arrtime, $deendtime, $company, $myName, $myidNumber, $myPosition, $dateNow, $status);

            $remarks = 'Employee Applied for Official Business';
            $page = 'Official Business File';

            $sql_logs = mysqli_query($db, "INSERT INTO users_log (`idNumber`, `remarks`, `page`) VALUES ('$myidNumber', '$remarks', '$page')");

            if ($stmt->execute()) {
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
