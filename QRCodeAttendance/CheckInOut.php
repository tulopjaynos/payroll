<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="opms";

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['studentID'])){
        
        $studentID =$_POST['studentID'];
		$date = date('Y-m-d');
		$time = date('H:i:s A');
		

		$sql = "SELECT * FROM wy_employees WHERE qr_code= '$studentID'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find QRCode number '.$studentID;
		}else{
				$row = $query->fetch_assoc();
				$id = $row['emp_code'];
				$sql ="SELECT * FROM attendance WHERE STUDENTID='$id' AND LOGDATE='$date' AND STATUS='0'";
				$query=$conn->query($sql);
				if($query->num_rows>0){
				$sql = "UPDATE attendance SET TIMEOUT='$time', STATUS='1' WHERE STUDENTID='$id' AND LOGDATE='$date'";
				$query=$conn->query($sql);
				$_SESSION['success'] = 'Successfuly Time Out: '.$row['first_name'].' '.$row['last_name'];
			}else{
					$sql = "INSERT INTO attendance(STUDENTID,TIMEIN,LOGDATE,STATUS) VALUES('$id','$time','$date','0')";
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