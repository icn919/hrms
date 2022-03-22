<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$lastname = strtoupper($lastname);
		$address = $_POST['address'];
		$sg = $_POST['sg'];
		$birthdate = $_POST['birthdate'];
		$created_on = $_POST['created_on'];
		$contact_info = $_POST['contact_info'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$filename = $_FILES['photo']['name'];
		$monthly_rate = $_POST['monthly_rate'];
		$age = $_POST['age'];
		$gsis = $_POST['gsis'];
		$philhealth = $_POST['philhealth'];
		$pagibig = $_POST['pagibig'];
		$bir = $_POST['bir'];
		$comelec = $_POST['comelec'];
		$green_card = $_POST['green_card'];
		$remarks = $_POST['remarks'];
		$vaccinated = $_POST['vaccinated'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating employeeid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 4; $i++){
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO employees (employee_id, firstname, lastname, address, birthdate, contact_info, created_on, gender, position_id, sg, photo, monthly_rate, age, gsis, philhealth, pagibig, bir, comelec, green_card, remarks, vaccinated) VALUES ('$employee_id', '$firstname', '$lastname', '$address', '$birthdate', '$contact_info', '$created_on','$gender', '$position', '$sg','$filename', '$monthly_rate', '$age', '$gsis', '$philhealth', '$pagibig', '$bir', '$comelec', '$green_card', '$remarks','$vaccinated')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: employee.php');
?>