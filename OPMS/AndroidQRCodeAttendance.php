<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "opms";

$conn = new mysqli($server,$username,$password,$dbname);

if ($conn->connect_error) {
    die("Connection failed" .$conn->connect_error);
}

if (isset($_POST['studentID'])) {
    $studentID = $_POST['studentID'];
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');
    $time = date('H:i:s A');

    $sql = "SELECT emp_code, first_name, last_name FROM wy_employees WHERE emp_code='$studentID'";
    $query = $conn->query($sql);

    if ($query->num_rows < 1) {
        http_response_code(400);
        echo json_encode(["message" => 'Cannot find employee ' . $studentID]);
        return;
    } else {
        $row = $query->fetch_assoc();
        $id = $row['emp_code'];
        $sql = "SELECT * FROM attendance WHERE STUDENTID='$id' AND LOGDATE='$date' AND STATUS='0'";
        $query=$conn->query($sql);
        
        if ($query->num_rows > 0) {
            // Update TIMEOUT.
            $sql = "UPDATE attendance SET TIMEOUT='$time', STATUS='1' WHERE STUDENTID='$id' AND LOGDATE='$date'";
            $query=$conn->query($sql);

            // Retrieve TIMEIN.
            $sql = "SELECT TIMEIN FROM attendance WHERE STUDENTID='$id' AND LOGDATE='$date'";
            $query=$conn->query($sql);
            $timeinRow = $query->fetch_assoc();
            
            $row['TIMEIN'] = $timeinRow['TIMEIN'];
            $row['TIMEOUT'] = $time;
            $message = 'Successfuly Time Out: '.$row['first_name'].' '.$row['last_name'];
        } else {
            $sql = "INSERT INTO attendance(STUDENTID,TIMEIN,LOGDATE,STATUS) VALUES('$id','$time','$date','0')";
            if ($conn->query($sql) === TRUE) {
                $row['TIMEIN'] = $time;
                $message = 'Successfuly Time In: '.$row['first_name'].' '.$row['last_name'];
            } else {
                http_response_code(503);
                echo json_encode(["message" => $conn->error]);
                return;
            }
        }

        // Get employee.
        http_response_code(200);
        echo json_encode(["message" => $message, "emp_code" => $row['emp_code'], "first_name" => $row['first_name'], 
            "last_name" => $row['last_name'], "emp_time_in" => $row['TIMEIN'], "emp_time_out" => $row['TIMEOUT'] ?? ""]);
        return;
    }
}

http_response_code(400);
echo json_encode(["message" => 'Invalid request. Employee ID missing.']);
?>