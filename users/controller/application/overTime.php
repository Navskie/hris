<?php
include_once '../../../cores/database.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startDate = htmlspecialchars($_POST['startDate']);
    $startTime = htmlspecialchars($_POST['startTime']);
    $endTime = htmlspecialchars($_POST['endTime']);
    $hours = htmlspecialchars($_POST['hours']);
    $reason = htmlspecialchars($_POST['reason']);
    $company = htmlspecialchars($_POST['company']);
    $status = 'Pending';

    if (empty($startDate) || empty($startTime) || empty($endTime) || empty($hours) || empty($reason) || empty($company)) {
        $response = [
            'status' => 'failed',
            'title' => 'Failed',
            'message' => 'All fields are required.'
        ];
    } else {
        $stmt = $db->prepare("INSERT INTO overtime 
            (`date`, `startTime`, `endTime`, `hours`, `reason`, `company`, `fullName`, `idNumber`, `position`, `dateApplied`, `status`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt->bind_param('sssssssisss', $startDate, $startTime, $endTime, $hours, $reason, $company, $myName, $myidNumber, $myPosition, $dateNow, $status);

            $remarks = 'Employee Applied for Overtime';
            $page = 'Overtime File';

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
