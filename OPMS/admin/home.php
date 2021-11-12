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
 
  <?php
  include("header.php");

  ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed" style="background-color: silver" >
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
          <!--span class="hidden-xs"><?php echo $_SESSION['name'];?></span-->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:#00162A;">
            <!--div class="image">
              <img src="dist/img/user2-160x160.jpg" style="border-radius: 50%;width: 100x;height: 100px;" alt="User Image">
            </div-->
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
            <a href="home.php" class="nav-link active">
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6" >
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content" >
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-6">

            <div class="small-box bg-gray">
              <div class="inner">
                <?php
                $sql0 = "SELECT count(emp_id) As 'Total' FROM wy_employees";
                $result0 = mysqli_query($db, $sql0);
                $row0 = mysqli_fetch_array($result0);
                $num0 = $row0['Total'];
                ?>
                <h3><?php echo $num0; ?></h3>

                <p>Employee / Staff</p>
              </div>
              <div class="icon">
                <!--i class="ion ion-bag"></i-->
              </div>
              <a href="employee_list.php" class="small-box-footer" style="color: black">Employee details  <i class="fas fa-arrow-circle-rights"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-gray">
              <div class="inner">
                <?php
                $sql1 = "SELECT count(pos_id) As 'Pos' FROM emp_position";
                $result1 = mysqli_query($db, $sql1);
                $row1 = mysqli_fetch_array($result1);
                $num1 = $row1['Pos'];
                ?>
                <h3><?php echo $num1; ?></h3>

                <p>Total Positions</p>
              </div>
              <div class="icon">
                <!--i class="ion ion-stats-bars"></i-->
              </div>
              <a href="employee_positions.php" class="small-box-footer">Position details <i class="fas fa-arrow-circle-rights"></i></a>
            </div>
          </div>

          <!--div class="col-lg-3 col-6">

            <div class="small-box bg-gray">
              <div class="inner">
                <?php
                $sql2 = "SELECT count(*) As 'Ontime' FROM emp_attendance, emp_list, emp_sched WHERE emp_attendance.attendance_timein <= emp_sched.sched_in AND emp_attendance.employee_id = emp_list.emp_id AND emp_sched.sched_id = emp_list.sched_id AND emp_attendance.attendance_date = CURDATE(); ";
                $result2 = mysqli_query($db, $sql2);
                $row2 = mysqli_fetch_array($result2);
                ?>
                <h3><?php echo $row2['Ontime']; ?></h3>

                <p>On Time Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i-->
              </div>
              <!--a href="employee_attendance.php" class="small-box-footer">Attendance details<i class="fas fa-arrow-circle-rights"></i></a-->
            </div>
          </div>

          <!--div class="col-lg-3 col-6">
            <div class="small-box bg-gray">
              <div class="inner">
                <?php
                $sql3 = "SELECT count(*) As 'Late' FROM emp_attendance, emp_list, emp_sched WHERE emp_attendance.attendance_timein > emp_sched.sched_in AND emp_attendance.employee_id = emp_list.emp_card AND emp_sched.sched_id = emp_list.sched_id AND emp_attendance.attendance_date = CURDATE(); ";
                $result3 = mysqli_query($db, $sql3);
                $row3 = mysqli_fetch_array($result3);
                ?>
                <h3><?php echo $row3['Late']; ?></h3>
                <p>Late Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div-->
              <!--a href="employee_attendance.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a-->
            </div>
          </div>

        </div>

        <div class="row">
          <section class="col-lg-5 connectedSortable">


          </section>
        </div>

      </div>
    </section>

  </div>

</div>

<?php
include("footer.php");
?>
</body>
</html>
