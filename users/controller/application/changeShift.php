<?php
include_once '../../../cores/database.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $withwhom = htmlspecialchars($_POST['with']);
    $with = ucwords($withwhom);
    $startDate = htmlspecialchars($_POST['startDate']);
    $endDate = htmlspecialchars($_POST['endDate']);
    $originalTime = htmlspecialchars($_POST['originalTime']);
    $newTime = htmlspecialchars($_POST['newTime']);
    $reason = htmlspecialchars($_POST['reason']);
    $company = htmlspecialchars($_POST['company']);
    $status = 'Pending';

    if (empty($with) || empty($startDate) || empty($endDate) || empty($originalTime) ||
        empty($newTime) || empty($reason)) {
        $response = [
            'status' => 'failed',
            'title' => 'Failed',
            'message' => 'All fields are required.'
        ];
    } else {
        $stmt = $db->prepare("INSERT INTO shift 
            (`shiftWith`, `startDate`, `endDate`, `originalTime`, `newTime`, `reason`, `company`, `fullName`, `idNumber`, `position`, `dateApplied`, `status`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt) {
            $stmt->bind_param('ssssssssisss', $with, $startDate, $endDate, $originalTime, $newTime, $reason, $company, $myName, $myidNumber, $myPosition, $dateNow, $status);

            $remarks = $myName.' Employee Applied for Change Shift';
            $page = 'Change Shift File';

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
