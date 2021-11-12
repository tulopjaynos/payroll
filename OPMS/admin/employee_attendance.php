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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: silver">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-barss"></i></a>
      </li>
    </ul>

    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">

      </div>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
          <!--span class="hidden-xs"><?php echo $_SESSION['name']; ?></span-->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:darkslategrey;">
            <div class="image">
              <!--img src="dist/img/user2-160x160.jpg" style="border-radius: 50%;width: 100x;height: 100px;" alt="User Image"-->
            </div>
          </span>
          <div class="dropdown-divider"></div>
          <!--a href="#" class="dropdown-item dropdown-footer">Settings</a-->
          <div class="dropdown-divider"></div>
          <form method="POST">
            <button type="submit" name="logout" class="dropdown-item dropdown-footer">Logout</a>
          </form>
        </div>
      </li>

    </ul>
  </nav>



  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #00162A;">

    <a href="home.php" class="brand-link">
      <!--img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"-->
      <span class="brand-text font-weight-light">Online Management System</span>
    </a>


    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"-->
        </div>
        <div class="info">
          <!--a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a-->
          <h1 style="font-size: 35px;color: silver ">Accounting</h1>
        </div>
      </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="home.php" class="nav-link">
              <!--i class="nav-icon fas fa-tachometer-alt"></i-->
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE</li>
          <li class="nav-item">
            <a href="employee_attendance.php" class="nav-link active">
              <!--i class="nav-icon far fa-calendar-alt"></i-->
              <p>
                Attendance
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <!--i class="nav-icon fas fa-users"></i-->
              <p>
                Employees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee_sched.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedules</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="employee_deduction.php" class="nav-link">
              <!--i class="nav-icon fas fa-sticky-note"></i-->
              <p>
                Deduction
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="employee_positions.php" class="nav-link">
              <!--i class="nav-icon fas fa-briefcase"></i-->
              <p>
                Positions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="type_employee.php" class="nav-link">
              <!--i class="nav-icon fas fa-sticky-note"></i-->
              <p>
                Type of Employee
              </p>
            </a>
          </li>

           <!--li class="nav-item">
            <a href="staff_employee.php" class="nav-link ">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Staff
              </p>
            </a>
          </li-->
          <li class="nav-header">PRINTABLES</li>
          <li class="nav-item">
            <a href="print_payroll.php" class="nav-link">
              <!--i class="nav-icon fas fa-money-bill-alt"></i-->
              <p>Payroll</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="print_sched.php" class="nav-link">
              <!--i class="nav-icon far fa-clock"></i-->
              <p>Schedules</p>
            </a>
          </li>
        </ul>
      </nav>

    </div>

  </aside>

  <div class="content-wrapper" style="background-color: silver">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">
            
          <div class="card" style="background-color: gray">

            <div class="card-body">
              <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
              <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info" >
               <thead>
                  
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Tools</th>
                </thead>
                <tbody style="color: white">
                <?php
                    $sql = "SELECT *, wy_employees.emp_code AS empid, attendance.ID AS attid FROM attendance LEFT JOIN wy_employees ON wy_employees.emp_code=attendance.STUDENTID ORDER BY attendance.LOGDATE DESC, attendance.TIMEIN DESC";
                    $query = mysqli_query($db, $sql);
                    while($row = $query->fetch_assoc()){
                      $status = ($row['STATUS'])?'<span class="float-right badge bg-success">ontime</span>':'<span class="float-right badge bg-warning">late</span>';
                      echo "
                        <tr>
                          
                          <td>".date('M d, Y', strtotime($row['LOGDATE']))."</td>
                          <td>".$row['empid']."</td>
                          <td>".$row['first_name'].' '.$row['last_name']."</td>
                          <td>".date('h:i A', strtotime($row['TIMEIN'])).$status."</td>
                          <td>".date('h:i A', strtotime($row['TIMEOUT']))."</td>
                          <td>
                            <button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['attid']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['attid']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php include 'includes/attendance_modal.php';?>
  </div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'attendance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#datepicker_edit').val(response.date);
      $('#attendance_date').html(response.date);
      $('#edit_time_in').val(response.time_in);
      $('#edit_time_out').val(response.time_out);
      $('#attid').val(response.attid);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#del_attid').val(response.attid);
      $('#del_employee_name').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>


</script>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
