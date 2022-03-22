<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$age = $_POST['age'];
		$contact_info = $_POST['contact_info'];
		$created_on = $_POST['created_on'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$sg = $_POST['sg'];
		$monthly_rate = $_POST['monthly_rate'];
		$gsis = $_POST['gsis'];
		$philhealth = $_POST['philhealth'];
		$pagibig = $_POST['pagibig'];
		$bir = $_POST['bir'];
		$comelec = $_POST['comelec'];
		$green_card = $_POST['green_card'];
		$remarks = $_POST['remarks'];
		$vaccinated = $_POST['vaccinated'];
		
		$sql = "UPDATE employees SET firstname = '$firstname', lastname = '$lastname', address = '$address', birthdate = '$birthdate', age = '$age', contact_info = '$contact_info', created_on = '$created_on', gender = '$gender', position_id = '$position', sg = '$sg', monthly_rate = '$monthly_rate', gsis = '$gsis', philhealth = '$philhealth', pagibig = '$pagibig', bir = '$bir', comelec = '$comelec', green_card = '$green_card', remarks = '$remarks', vaccinated = '$vaccinated' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: employee.php');
?>