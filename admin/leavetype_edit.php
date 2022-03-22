<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$description = $_POST['description'];

		$sql = "UPDATE tbleavetype SET description = '$description' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Leave Type updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:leavetype.php');

?>