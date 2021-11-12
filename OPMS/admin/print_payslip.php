<?php
include("controller.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR | Dashboard</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">

  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

<style>
@page { size: auto;  margin: 0mm; }
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body onload="window.print()" style="background-color: #A9A9A9">

<div class="row">
  <div class="col-12"><br><br>
    <h1 align="center">Daily Time Record</h1>
    <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info" style="background-color: #87CEFA">
      <thead>
      <tr>
        <th>Date</th>
        <th>Employee Name</th>
        <th>Total Rendered Time</th>
      </tr>
      </thead>
      <tbody>
      <?php
      ini_set('display_errors', 0);
      ini_set('display_errors', false);

      $s = $_SESSION['start_month'];
      $e = $_SESSION['end_month'];
      $id = $_SESSION['card'];


      $sql0 = "SELECT *, SUM(attendance_hour) as Total_dtr FROM attendance WHERE LOGDATE BETWEEN '$s' AND '$e' AND STUDENTID = '$id'";
      $result0 = mysqli_query($db, $sql0);
      while($row0 = mysqli_fetch_array($result0))
      {
        $name = $row0['employee_name'];
      ?>
      <tr>
        <td><?php echo $s; ?> - <?php echo $e; ?></td>
        <td><?php echo $row['employee_name'] ?></td>
        <td><?php echo $row0['Total_dtr']; ?></td>
      </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    <br><br><br>
    <h1 align="center">Payslip</h1>
    <hr>
    <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info" >
      <?php
      ini_set('display_errors', 0);
      ini_set('display_errors', false);

      $s = $_SESSION['start_month'];
      $e = $_SESSION['end_month'];

      $sql = "SELECT *, SUM(deduct_amount) as Deductions FROM salary_deduct";
      $result = mysqli_query($db, $sql);
      $drow = mysqli_fetch_array($result);
      $TotalDeduction = $drow['Deductions'];
      
      $sqlGross ="SELECT *, SUM(attendance_hour) AS Hours, attendance.STUDENTID AS ID
      FROM attendance 
      LEFT JOIN wy_employees ON wy_employees.emp_code = attendance.STUDENTID
      LEFT JOIN emp_position ON emp_position.pos_id = wy_employees.blood_group
      WHERE LOGDATE BETWEEN '$s' AND '$e' AND STUDENTID = '$id'
      GROUP BY attendance.STUDENTID ORDER BY wy_employees.last_name ASC, wy_employees.first_name ASC, emp_position.position_title ASC, wy_employees.emp_type ASC";
      $resultGross = mysqli_query($db, $sqlGross);
      $rowGross = mysqli_fetch_array($resultGross);
      
      $GrossPay = $rowGross['position_rate'] * $rowGross['Hours'];
      
      $sqlAttendance = "SELECT * FROM attendance WHERE LOGDATE BETWEEN '$s' AND '$e' AND STUDENTID = '$id'";
      $resultAttendance = mysqli_query($db, $sqlAttendance);

      $total_late_deduction = 0;
      $total_overtime_pay = 0;
      while ($rowAttendance = mysqli_fetch_array($resultAttendance)) {
        // Computation of late.
        $late_in_min = strtotime($rowAttendance['TIMEIN']) - strtotime($rowGross['emp_timein']);
        $late_in_min = max(0, $late_in_min); // Will result to negative if employee comes early; this limit it to 0.
        $late_in_min /= 60; // Convert to minutes.
        $late_rate_per_min = 7;
        $total_late_deduction += $late_in_min * $late_rate_per_min;
  
        // Computation of overtime.
        $overtime_in_hr = strtotime($rowAttendance['TIMEOUT']) - strtotime($rowGross['emp_timeout']);
        $overtime_in_hr = max(0, $overtime_in_hr); // Will result to negative if employee ends early; this limit it to 0.
        $overtime_in_hr /= 60 * 60; // Convert to hours.
        $overtime_rate_per_hr = $rowGross['position_rate'] / 2;
        $total_overtime_pay += $overtime_in_hr * $overtime_rate_per_hr;
      }

      $NetPay = $GrossPay - $TotalDeduction - $total_late_deduction + $total_overtime_pay;
      ?>

        <p align="center" style="background-color: #87CEFA">Employee Name: <b><?php echo $rowGross['last_name']?>,<?php echo $rowGross['first_name']?></b></p>
        <p align="center" style="background-color: #87CEFA">Position: <b><?php echo $rowGross['position_title']?>  </b>Type: <b><?php echo $rowGross['emp_card']?></b></p>
        <p align="center" style="background-color: #87CEFA">Pay date: <b><?php echo $s; ?>-<?php echo $e; ?></b></p>
        <p align="center" style="background-color: #87CEFA">Rendered Time to be pay To: <b><?php echo $e; ?></b></p>
        <hr>
        <p align="center" style="background-color: #87CEFA"><b>Gross Montly Income: <?php echo number_format($GrossPay); ?> <?php echo $Position; ?> </b></p>
        <hr>  

        <p align="center" style="background-color: #FA8072"><b>Total Deduction<br>
          <?php
            $deduct_sql = "SELECT * FROM salary_deduct";
            $deduct_result = mysqli_query($db, $deduct_sql);
            while ($deduct_row = mysqli_fetch_array($deduct_result)) {
              echo $deduct_row['deduct_desc'] . ": ₱" . $deduct_row['deduct_amount'] . "<br>";
            }

            if ($total_late_deduction > 0) {
              echo "Accumulated Late (" . ($total_late_deduction / $late_rate_per_min) . "): ₱" . number_format($total_late_deduction);
            }
          ?>
          <br>Total Deduction: <?php echo number_format($TotalDeduction); ?></b></p>
        <hr>

        <?php
          if ($total_overtime_pay > 0) {
        ?>
        <p align="center" style="background-color: #71EFA3">
          <b>Total Overtime Pay <?php echo "(" . ($total_overtime_pay / $overtime_rate_per_hr) . "): ₱" . number_format($total_overtime_pay); ?>.00 </b>
        </p>
        <hr> 
        <?php }?>

        <p align="center" style="background-color: #87CEFA"><b>Net Pay: ₱<?php echo number_format($NetPay, 2); ?></b></p>
    </table>
    <br>
    <p align="center">
      <u>____<b><?php echo $name; ?></b>____</u>
      <br>
      Signature over printed name
    </p>


  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>

<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script src="plugins/moment/moment.min.js"></script>

<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

</body>
</html>
