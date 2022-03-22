<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$empid = $_POST['id'];
		$reason = $_POST['reason'];

		$sql = "UPDATE employees SET reason = '$reason', deleted_on = NOW() WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: employee.php');
	
?>