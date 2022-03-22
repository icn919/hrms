<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, tbleave.id AS leaveid, employees.employee_id AS empid FROM tbleave LEFT JOIN employees ON employees.id=tbleave.employee_id LEFT JOIN tbleavetype ON tbleavetype.id=tbleave.leavetype_id WHERE tbleave.id='$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>