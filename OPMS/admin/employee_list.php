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
  <script src="dist/js/1.js"></script>
  <script src="dist/js/2.js"></script>
  <script src="dist/js/3.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed" style="background-color: silver">
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
      <span class="brand-text font-weight-light"><h5 style="color: white">Online Management System</h5></span>
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
            <a href="employee_attendance.php" class="nav-link">
              <!--i class="nav-icon far fa-calendar-alt"></i-->
              <p>
                Attendance
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <!--i class="nav-icon fas fa-users"></i-->
              <p>
                Employees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="employee_list.php" class="nav-link active">
                  <i class="fas fa-circle nav-icon"></i>
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
            <h1 class="m-0 text-dark">Employee List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content" >
      <div class="row">
        <div class="col-12">
          <div class="card" style="background-color: gray">
            <div class="card-body">
              <div align="right">
                <button class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-default">Add Employee<i class="fas fa-pluss"></i>   </button>
              </div><br>
              <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                <thead>
                <tr style="color: white">
                  <th>ID</th>
                  <th>Type</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Schedule</th>
                  <th>Member Since</th>
                  <th>Tools</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $sql = "SELECT * FROM wy_employees 
                LEFT JOIN emp_position ON emp_position.pos_id = wy_employees.blood_group
                LEFT JOIN emp_sched ON emp_sched.sched_id = wy_employees.sched_id";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <tr style="color: white">
                  <td><?php echo $row['emp_code']; ?></td>
                  <!--td><img src="<?php echo $row['emp_photo']; ?>" style="width: 40px;height: 40px;"></td-->
                
                  <td><?php echo $row['emp_type']; ?></td>

                  <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['position_title']; ?></td>
                  <td><?php echo $row['sched_in']; ?> - <?php echo $row['sched_out']; ?></td>
                  <td><?php echo $row['joining_date']; ?></td>
                  <td>
                    <button class="btn btn-default btn-flat emp_edit" id="<?php echo $row['emp_code']; ?>" style="background-color: yellow">Edit<i class=""></i></button>
                    <button class="btn btn-default btn-flat emp_delete" id="<?php echo $row['emp_code']; ?>" style="background-color: pink">Delete<i class="fas fa-trashh"></i></button>
                  </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

</div>

<div class="modal fade" id="modal-default" style="background-color: #00162A ">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: silver">
      <div class="modal-header">
        <h4 class="modal-title">Add Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Employee Tag</label>
           <div class="col-sm-7">
              <select name="employee_type" class="form-control" required>
                <option hidden> - Select -</option>
                <?php
                $sql = "SELECT * FROM employee_type";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <option value="<?php echo $row['typeofemployee']; ?>"><?php echo $row['typeofemployee']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Firstname</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="emp_name" placeholder="Enter First Name" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Lastname</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="emp_lastname" placeholder="Enter Last Name" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="emp_address" placeholder="Enter Address" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Contact Info</label>
            <div class="col-sm-7">
               <input type="number" class="form-control" name="emp_contact"placeholder="+63" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-7">
              <select name="emp_gender" class="form-control" required>
                <option hidden> - Select -</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Prefer Not">Prefer Not to say</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Position</label>
            <div class="col-sm-7">
              <select name="emp_position" class="form-control" required>
                <option hidden>- Select -</option>
                <?php
                $sql = "SELECT * FROM emp_position";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <option value="<?php echo $row['pos_id']; ?>"><?php echo $row['position_title']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Schedule</label>
            <div class="col-sm-7">
              <select name="emp_schedule" class="form-control" required>
                <option hidden> - Select -</option>
                <?php
                $sql = "SELECT * FROM emp_sched";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <option value="<?php echo $row['sched_id']; ?>"><?php echo $row['sched_in']; ?> - <?php echo $row['sched_out']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="emp_pass" placeholder="********" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10"required>
            </div>
          </div>

          <!--div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Photo</label>
            <div class="col-sm-7">
              <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">

            </div>
          </div-->

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-timess"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-flat" name="add_employee"><i class="fas fa-saves"></i> Save</button>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div id="emp_edit_modal" class="modal fade" >
     <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #00162A">
               <div class="modal-header" style="background-color: #00162A">
                 <h5 class="modal-title" id="exampleModalLabel" style="color: white">Editing...</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                 </button>  
               </div>
               <form method="POST">
               <div class="modal-body" id="emp_edit_details" style="color: white">
               </div>
               <div class="modal-body"></div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                 <button type="submit" class="btn btn-primary btn-flat" name="emp_update"><i class="fas fa-check"></i> Update</button>
               </form>
               </div>
          </div>
     </div>
</div>
<script>
$(document).ready(function(){
     $('.emp_edit').click(function(){
          var emp_edit_id = $(this).attr("id");
          $.ajax({
               url:"controller.php",
               method:"post",
               data:{emp_edit_id:emp_edit_id},
               success:function(data){
                    $('#emp_edit_details').html(data);
                    $('#emp_edit_modal').modal("show");
               }
          });
     });
});
</script>

<div id="emp_delete_modal" class="modal fade">
     <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #00162A">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel" style="color: silver">Deleting...</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
                 </button>
               </div>
               <form method="POST">
               <div class="modal-body" id="emp_delete_details" style="color: silver">
               </div>
               <div class="modal-body"></div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                 <button type="submit" class="btn btn-danger btn-flat" name="emp_delete"><i class="fas fa-trash"></i> Delete</button>
               </form>
               </div>
          </div>
     </div>
</div>
<script>
$(document).ready(function(){
     $('.emp_delete').click(function(){
          var emp_del_id = $(this).attr("id");
          $.ajax({
               url:"controller.php",
               method:"post",
               data:{emp_del_id:emp_del_id},
               success:function(data){
                    $('#emp_delete_details').html(data);
                    $('#emp_delete_modal').modal("show");
               }
          });
     });
});
</script>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>  <!--button for previous,next and texbox--
<!--script src="dist/js/adminlte.min.js"></script-->
<!--script src="dist/js/demo.js"></script-->

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,  
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
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
