<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$employee = $_POST['employee'];
		$leavetype = $_POST['leavetype'];
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$adminremark = $_POST['adminremark'];

		
		$sql = "SELECT * FROM employees WHERE employee_id = '$employee'";
		$query = $conn->query($sql);
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Employee not found';
		}
		else{
			$row = $query->fetch_assoc();
			$employee_id = $row['id'];
			$sql = "INSERT INTO tbleave (employee_id, posting, leavetype_id, fromdate, todate, adminremark) VALUES ('$employee_id', NOW(), '$leavetype', '$fromdate', '$todate', '$adminremark')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Employee added successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: leave.php');

?>