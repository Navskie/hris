<?php
include_once '../../../cores/database.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Clear any previous output
ob_clean();

header('Content-Type: application/json');

// Get POST data
$id = isset($_POST['id']) ? $_POST['id'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;

// Validate input
if ($id === null || $status === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit;
}

// Prepare and execute update query
$query = "UPDATE overtime SET status = ? WHERE id = ?";
$stmt = $db->prepare($query);

if ($stmt === false) {
  echo json_encode(['success' => false, 'message' => 'Database prepare error: ' . $db->error]);
  exit;
}

$stmt->bind_param('si', $status, $id);
$response = ['success' => false];

if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['message'] = 'Error updating status: ' . $stmt->error;
}

$stmt->close();
$db->close();

// Output JSON
echo json_encode($response);
?>
