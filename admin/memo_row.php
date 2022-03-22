<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, tbmemo.id AS memoid FROM tbmemo LEFT JOIN employees on employees.id=tbmemo.employee_id WHERE tbmemo.id='$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>