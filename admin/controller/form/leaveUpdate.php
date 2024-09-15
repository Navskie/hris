<?php
	include_once '../../../cores/database.php';

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
	$query = "UPDATE leaves SET status = ? WHERE id = ?";
	$stmt = $db->prepare($query);

	if ($stmt === false) {
		echo json_encode(['success' => false, 'message' => 'Database prepare error: ' . $db->error]);
		exit;
	}

	$stmt->bind_param('si', $status, $id);
	$response = ['success' => false];

	if ($stmt->execute()) {
		if ($status === 'Approved') {
			// Fetch idNumber and leaveStatus
			$query = "SELECT idNumber, leaveStatus FROM leaves WHERE id = '$id'";
			$result = mysqli_query($db, $query);
		
			if ($row = mysqli_fetch_assoc($result)) {
				$userIdNumber = $row['idNumber'];
				$userLeaveStatus = $row['leaveStatus'];
		
				if ($userLeaveStatus === 'With Pay') {
					// Update leave credit
					$updateQuery = "UPDATE leave_credit SET credit = credit - 1 WHERE idNumber = '$userIdNumber'";
					mysqli_query($db, $updateQuery);
				}
			}
		}	
	
		$remarks = $myName.' User Update Leave Status into '.$status;
		$page = 'Leave File';

		$sql_logs = mysqli_query($db, "INSERT INTO users_log (`idNumber`, `remarks`, `page`) VALUES ('$myidNumber', '$remarks', '$page')");

		$response['success'] = true;
	} else {
		$response['message'] = 'Error updating status: ' . $stmt->error;
	}

	$stmt->close();
	$db->close();

	// Output JSON
	echo json_encode($response);
?>
