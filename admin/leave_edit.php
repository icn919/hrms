<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$leavetype = $_POST['leavetype'];
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$adminremark = $_POST['adminremark'];
		
		$sql = "UPDATE tbleave SET leavetype_id = '$leavetype', fromdate = '$fromdate', todate = '$todate', adminremark = '$adminremark' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:leave.php');

?>