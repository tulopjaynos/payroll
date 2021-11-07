<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="payroll_mdb";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['studentID'])){
        
        $studentID =$_POST['studentID'];
		$date = date('Y-m-d');
		$time = date('H:i:s A');

		$sql = "SELECT * FROM wy_employees WHERE emp_code = '$studentID'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find QRCode number '.$studentID;
		}else{
				$row = $query->fetch_assoc();
				$id = $row['emp_code'];
				$sql ="SELECT * FROM wy_attendance WHERE emp_code='$id' AND attendance_date='$date' AND STATUS='0'";
				$query=$conn->query($sql);
				if($query->num_rows>0){
				$sql = "UPDATE wy_attendance SET action_time='$time', STATUS='1' WHERE emp_code='$studentID' AND wy_attendance='$date'";
				$query=$conn->query($sql);
				$_SESSION['success'] = 'Successfuly Time Out: '.$row['first_name'].' '.$row['last_name'];
			}else{
					$sql = "INSERT INTO wy_attendance(emp_code,action_time,attendance_date,action_name) VALUES('$studentID','$time','$date','punchin')";
					if($conn->query($sql) ===TRUE){
					 $_SESSION['success'] = 'Successfuly Time In: '.$row['first_name'].' '.$row['last_name'];
			 }else{
			  $_SESSION['error'] = $conn->error;
		   }	
		}
	}

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: index.php");
	   
$conn->close();
?>