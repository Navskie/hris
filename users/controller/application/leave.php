<?php
include_once '../../../cores/database.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company = htmlspecialchars($_POST['company']);
    $startDate = htmlspecialchars($_POST['startDate']);
    $endDate = htmlspecialchars($_POST['endDate']);
    $days = htmlspecialchars($_POST['days']);
    $typeofLeave = htmlspecialchars($_POST['types']);
    $leaveStatus = htmlspecialchars($_POST['leaveStatus']);
    $reason = htmlspecialchars($_POST['reason']);
    $status = 'Pending';

    if (empty($company) || empty($startDate) || empty($endDate) || empty($days) || empty($typeofLeave) || empty($leaveStatus) || empty($reason)) {
        $response = [
            'status' => 'failed',
            'title' => 'Failed',
            'message' => 'All fields are required.'
        ];
    } else {
        $stmt = $db->prepare("INSERT INTO leaves 
            (`startDate`, `endDate`, `days`, `typeofLeave`, `leaveStatus`, `reason`, `company`, `fullName`, `idNumber`, `position`, `dateApplied`, `status`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt->bind_param('ssssssssisss', $startDate, $endDate, $days, $typeofLeave, $leaveStatus, $reason, $company, $myName, $myidNumber, $myPosition, $dateNow, $status);

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
