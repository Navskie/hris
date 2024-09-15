<?php
include_once '../../../cores/database.php'; // Include your database connection

// Ensure the user is logged in
if (!isset($_SESSION['id'])) {
  echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
  exit;
}

$userId = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve posted data
  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];
  $reNewPassword = $_POST['ReNewPassword'];

  // Validate inputs
  if (empty($oldPassword) || empty($newPassword) || empty($reNewPassword)) {
      echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
      exit;
  }

  if ($newPassword !== $reNewPassword) {
      echo json_encode(['status' => 'error', 'message' => 'New passwords do not match.']);
      exit;
  }

  // Fetch the current hashed password from the database
  $query = "SELECT password FROM users WHERE id = ?";
  $stmt = $db->prepare($query);
  $stmt->bind_param('i', $userId);
  $stmt->execute();
  $stmt->bind_result($hashedPassword);
  $stmt->fetch();
  $stmt->close();

  // Debug: Check fetched hashed password
  if (!$hashedPassword) {
      echo json_encode(['status' => 'error', 'message' => 'No user found.']);
      exit;
  }

  // Verify the old password
  if (!password_verify($oldPassword, $hashedPassword)) {
      echo json_encode(['status' => 'error', 'message' => 'Old password is incorrect.']);
      exit;
  }

  // Hash the new password
  $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

  // Update the new password in the database
  $updateQuery = "UPDATE users SET password = ? WHERE id = ?";
  $stmt = $db->prepare($updateQuery);
  $stmt->bind_param('si', $newHashedPassword, $userId);
  
  if ($stmt->execute()) {
      echo json_encode(['status' => 'success', 'message' => 'Password updated successfully.']);
  } else {
      echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
  }
  
  $stmt->close();
  $db->close();
}
?>
