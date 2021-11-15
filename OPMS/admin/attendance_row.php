<?php 
include("controller.php");

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, attendance.id as attid FROM attendance LEFT JOIN wy_employees ON wy_employees.emp_code=attendance.STUDENTID WHERE attendance.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>