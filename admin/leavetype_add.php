<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$description = $_POST['description'];

		$sql = "INSERT INTO tbleavetype (description) VALUES ('$description')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Leave Type added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: leavetype.php');

?>