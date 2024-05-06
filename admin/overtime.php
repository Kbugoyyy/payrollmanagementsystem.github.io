<?php
include("controller.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Employee Overtime</title>
  <link rel="icon" href="img/PIF.png">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="edit_overtime.js"></script>
  <script src="dist/js/1.js"></script>
  <script src="dist/js/2.js"></script>
  <script src="dist/js/3.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
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
          <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="max-height: 150px; overflow:hidden; background:darkslategrey;">
            <div class="image">
              <img src="dist/img/user-logo.jpg" style="border-radius: 50%;width: 100x;height: 100px;" alt="User Image">
            </div>
          </span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Settings</a>
          <div class="dropdown-divider"></div>
          <form method="POST">
            <button type="submit" name="logout" class="dropdown-item dropdown-footer">Logout</a>
          </form>
        </div>
      </li>

    </ul>
  </nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222d32;">

    <a href="home.php" class="brand-link">
      <img src="img/fujifilm.png" alt="Admin Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">FUJIFILM</span>
    </a>


    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user-logo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="home.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE</li>
          <li class="nav-item">
            <a href="employee_attendance.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Attendance
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
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
                <a href="overtime.php" class="nav-link active">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Overtime</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cashadvance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cash Advance</p>
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
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Deduction
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="employee_positions.php" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Positions
              </p>
            </a>
          </li>
          <li class="nav-header">PRINTABLES</li>
          <li class="nav-item">
            <a href="print_payroll.php" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>Payroll</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="print_sched.php" class="nav-link">
              <i class="nav-icon far fa-clock"></i>
              <p>Schedules</p>
            </a>
          </li>
        </ul>
      </nav>

    </div>

  </aside>


  <div style="background-image: linear-gradient(190deg, yellow, green);" class="content-wrapper">

    <div style="background-image: linear-gradient(190deg, yellow, green);;" class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-light">Overtime</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active text-light">Overtime</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">

      <div class="row">
        <div class="col-12">
          <div style="background-image: linear-gradient(190deg, yellow, green);" class="card">
            <div class="card-body text-light">
              <div align="right">
                <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> New</button>
              </div><br>
              <table id="example1" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                <thead>
                <tr>

                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>No. of Hours</th>
                  <th>Rate</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>


        <?php

          $sql = "SELECT *, overtime.id AS otid, emp_list.emp_card AS empid FROM overtime LEFT JOIN emp_list ON emp_list.emp_card=overtime.emp_card ORDER BY date_overtime DESC";
          $query = $db->query($sql);

          while($fetch = $query->fetch_assoc())
          {
            echo "
              <tr>

                <td>".$fetch['empid']."</td>
                <td>".$fetch['emp_lname'].', '.$fetch['emp_fname']."</td>

                <td style='text-align: left;'>".$fetch['emp_hours'].'h : '.$fetch['emp_mins'].'m'."
                    <button class='btn btn-default btn-xs overtime_time_edit' data-id='".$fetch['otid']."' data-toggle='modal' data-target='#edit_time_modal' style='background-color: transparent; float: right;'><i class='fa fa-edit'></i></button>
                </td>

                <td style='text-align: left;'>".$fetch['emp_rate']."
                  <button class='btn btn-default btn-xs overtime_rate_edit' data-emp_card='".$fetch['emp_card']."' data-overtime-id='".$fetch['otid']."' data-toggle='modal' data-target='#edit_rate_modal' style='background-color: transparent; float: right;'><i class='fa fa-edit'></i></button>
                </td>

                <td style='text-align: left;'>
                    <button class='btn btn-default btn-xs overtime_date_edit' data-overtime-id='".$fetch['otid']."' data-date_overtime='".$fetch['date_overtime']."' data-toggle='modal' data-target='#edit_date_modal' style='background-color: transparent; float: right;'>
                        <i class='fa fa-calendar'></i>
                    </button>
                    ".date('M d, Y', strtotime($fetch['date_overtime']))."
                </td>

                <td>

                  <center><button class='btn btn-danger btn-flat overtime_delete' data-otid='".$fetch['otid']."' data-toggle='modal' data-target='#overtime_delete_modal'><i class='fa fa-trash'></i></button></center>
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

  </div>

</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-light">Add Overtime</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label text-light">Employee ID</label>
            <div class="col-sm-7">
              <select class="form-control" name="emp_card" required>
                <?php
                $sql = "SELECT emp_card FROM emp_list";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['emp_card'] . "'>" . $row['emp_card'] . "</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label text-light">Date</label>
            <div class="col-sm-7">
              <input type="date" class="form-control" name="date_overtime" placeholder="" required>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-3 col-form-label text-light">No. of Hour</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="emp_hours" name="emp_hours" placeholder="" required max="23">
            </div>
            <label class="col-sm-1 col-form-label text-light">:</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="emp_mins" name="emp_mins" placeholder="" required max="59" >
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label text-light">Rate</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" id="emp_rate" name="emp_rate" placeholder="" required >
            </div>
          </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-flat" name="add_overtime"><i class="fas fa-save"></i> Save</button>
      </form>
      </div>
    </div>

  </div>

</div>






<div class="modal fade" id="edit_time_modal" tabindex="-1" role="dialog" aria-labelledby="editTimeModalLabel" aria-hidden="true">
  <div class="modal-dialog text-light" role="document">
    <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTimeModalLabel">Edit Time</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_time_form">
          <input type="hidden" id="edit_time_otid" name="otid">
          <div class="form-group">
            <label for="edit_hours">Hours</label>
            <input type="number" class="form-control" id="edit_hours" name="hours">
          </div>
          <div class="form-group">
            <label for="edit_minutes">Minutes</label>
            <input type="number" class="form-control" id="edit_minutes" name="minutes">
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="edit_rate_modal" tabindex="-1" role="dialog" aria-labelledby="edit_rate_modal_label" aria-hidden="true">
  <div class="modal-dialog text-light" role="document">
    <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_rate_modal_label">Edit Overtime Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit_rate_form">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_rate">Edit Rate:</label>
            <input type="number" class="form-control" id="edit_rate" name="edit_rate" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="overtime_id_rate" name="overtime_id_rate">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="edit_date_modal" tabindex="-1" role="dialog" aria-labelledby="edit_date_modal_label">
  <div class="modal-dialog text-light" role="document">
    <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="edit_date_modal_label">Edit Overtime Date</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="overtime_id_date" value="">
          <div class="form-group">
            <label for="overtime_date">New Date:</label>
            <input type="date" class="form-control" id="overtime_date" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="update_overtime_date">Save changes</button>
      </div>
    </div>
  </div>
</div>





<script >

$(document).ready(function() {
  $('.overtime_time_edit').click(function(e) {
    e.preventDefault();
    var otid = $(this).data('id');
    var hours = $(this).closest('tr').find('.edit_hours').val();
    var minutes = $(this).closest('tr').find('.edit_minutes').val();
    $('#edit_time_form input[name="otid"]').val(otid);
    $('#edit_time_form input[name="hours"]').val(hours);
    $('#edit_time_form input[name="minutes"]').val(minutes);
  });

  $('#edit_time_form').submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var otid = form.find('input[name="otid"]').val();
    var hours = form.find('input[name="hours"]').val();
    var minutes = form.find('input[name="minutes"]').val();
    var errorMessage = "";

    if (hours > 23) {
      errorMessage += "Invalid hour input. Maximum of 23 hours.\n\n\n";
    }
    if (hours < 0) {
      errorMessage += "Invalid! Enter a positive number for hours.\n\n\n";
    }

    if (minutes > 59) {
      errorMessage += "Invalid minute input. Maximum of 59 minutes.\n";
    }
    if (minutes < 0) {
      errorMessage += "Invalid! Enter a positive number for minutes.\n";
    }

    if (errorMessage !== "") {
      alert(errorMessage);
      return;
    }

    $.ajax({
      url: 'edit_overtime.php',
      method: 'POST',
      data: {
        otid: otid,
        hours: hours,
        minutes: minutes
      },
      success: function(response) {
        var data = JSON.parse(response);
        if (data.status === 'success') {
          $('#edit_time_modal').modal('hide');
          alert(data.message);
          location.reload();
        } else {
          alert(data.message);
        }
      },
      error: function() {
        alert('An error occurred while updating the time.');
      }
    });

    $('#edit_time_modal').modal('hide');
  });

  $('.overtime_rate_edit').click(function(e) {
    e.preventDefault();
    var otid = $(this).data('overtime-id');
    var edit_rate = $(this).data('edit_rate');
    $('#edit_rate_form input[name="overtime_id_rate"]').val(otid);
    $('#edit_rate_form input[name="edit_rate"]').val(edit_rate);
  });

  $('#edit_rate_form').submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var otid = form.find('input[name="overtime_id_rate"]').val();
    var edit_rate = form.find('input[name="edit_rate"]').val();

    var errorMessage = "";
    if (edit_rate > 10000) {
      errorMessage += "Maximum amount reached.\n\n\n";
    }
    if (edit_rate < 0) {
      errorMessage += "Enter a valid amount.\n\n\n";
    }
    if (errorMessage !== "") {
      alert(errorMessage);
      return;
    }

    $.ajax({
      url: 'rate_edit.php',
      method: 'POST',
      data: {
        otid: otid,
        edit_rate: edit_rate
      },
      success: function(response) {
        var data = JSON.parse(response);
        if (data.status === 'success') {
          $('#edit_rate_modal').modal('hide');
          alert(data.message);
          location.reload();
        } else {
          alert(data.message);
        }
      },
      error:
 function() {
        alert('An error occurred while updating the rate.');
      }
    });

    $('#edit_rate_modal').modal('hide');
  });
});



$(document).ready(function() {
  $('.overtime_date_edit').click(function(e) {
    e.preventDefault();
    var otid = $(this).data('overtime-id');
    var overtimeDate = $(this).data('date_overtime');
    $('#overtime_id_date').val(otid);
    $('#overtime_date').val(overtimeDate);
  });

  $('#update_overtime_date').click(function(e) {
    e.preventDefault();
    var otid = $('#overtime_id_date').val();
    var newDate = $('#overtime_date').val();

    $.ajax({
      url: 'controller.php',
      method: 'POST',
      data: {
        otid: otid,
        newDate: newDate
      },
      success: function(response) {
        var data = JSON.parse(response);
        if (data.status === 'success') {
          $('#edit_date_modal').modal('hide');
          alert(data.message);
          location.reload();
        } else {
          alert(data.message);
        }
      },
      error: function() {
        alert('An error occurred while updating the date.');
      }
    });
  });
});



</script>




<div class="modal fade" id="overtime_delete_modal" tabindex="-1" role="dialog" aria-labelledby="modal_label" aria-hidden="true">
  <div class="modal-dialog text-light" role="document">
    <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_label">Delete Overtime Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
                <p>Are you sure you want to <b>DELETE</b> this Overtime record?</p>
                <p>note: This action connot be undone!</p>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="overtime_delete_confirm">Delete</button>
      </div>
    </div>
  </div>
</div>



<script>

        $(document).ready(function()
        {

            $(document).on("click", ".overtime_delete", function() {
                var ot_id = $(this).data("otid");

                                $("#overtime_delete_confirm").off("click").on("click", function() {
                                    $.ajax({
                                        type: "POST",
                                        url: "ot_delete.php",
                                        data: {ot_id: ot_id},
                                        success: function(response) {
                              if(response.trim() === "success") {
                                  Swal.fire({
                                      title: "Success!",
                                      text: "Overtime record has been deleted permanently!",
                                      type: "success"
                                  }).then(function() {
                                      window.location = "overtime.php";
                                  });
                              } else {
                                  Swal.fire({
                                      title: "Error!",
                                      text: "An error occurred while deleting the overtime record.",
                                      type: "error"
                                  });
                              }
                          }

                    });
                });
            });
        });

</script>


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
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
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
