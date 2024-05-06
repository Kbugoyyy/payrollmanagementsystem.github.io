<?php
include("controller.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Employee Cash Advance</title>
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
                <a href="overtime.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Overtime</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cashadvance.php" class="nav-link active">
                  <i class="fas fa-circle nav-icon"></i>
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

    <div style="background-image: linear-gradient(190deg, yellow, green);" class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-light">Cash Advance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active text-light">Cash Advance</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section  class="content">

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
                  <th>Date</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>


                  <?php
                    $sql = "SELECT *, cashadvance.id AS caid, emp_list.emp_card AS empid FROM cashadvance LEFT JOIN emp_list ON emp_list.emp_card=cashadvance.emp_card ORDER BY date_advance DESC";
                    $query = $db->query($sql);

                    while($fetch = $query->fetch_assoc())
                    {
                      echo "
                            <tr>
                              <td>".date('M d, Y', strtotime($fetch['date_advance']))."</td>
                              <td>".$fetch['empid']."</td>
                              <td>".$fetch['emp_fname'].' '.$fetch['emp_lname']."</td>
                              <td style='text-align: left;'>".number_format($fetch['amount'], 2)."
                                  <button class='btn btn-default btn-xs editca' data-id='".$fetch['caid']."' data-toggle='modal' data-target='#edit_modal' style='background-color: transparent; float: right;'><i class='fa fa-edit'></i></button>
                              </td>
                              <td>
                                <center><button class='btn btn-danger btn-flat emp_deleteca' data-id='".$fetch['caid']."' data-toggle='modal' data-target='#emp_deleteca_modal'><i class='fa fa-trash'></i></button>
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
  <div class="modal-dialog text-light">
    <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Cash Advance</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">

          <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <label class="col-sm-3 col-form-label">Employee ID</label>
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
            <label class="col-sm-3 col-form-label">Amount</label>
            <div class="col-sm-7">
              <input type="number" class="form-control" name="amount" placeholder="" required>
            </div>
          </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button type="submit" class="btn btn-primary btn-flat" name="add_cashadvance"><i class="fas fa-save"></i> Save</button>
      </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_amount_modal_label" aria-hidden="true">
  <div class="modal-dialog text-light" role="document">
    <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_amount_modal_label">Edit Cash Advance Amount</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_amount_form">
          <input type="hidden" name="caid">
          <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
$(document).ready(function() {

  $('.editca').click(function() {
    var caid = $(this).data('id');
    var amount = $(this).closest('tr').find('.amount').text();
    $('#edit_amount_form input[name="caid"]').val(caid);
    $('#edit_amount_form input[name="amount"]').val(amount);
  });


  $('#edit_amount_form').submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var caid = form.find('input[name="caid"]').val();
    var amount = form.find('input[name="amount"]').val();


    if(!$.isNumeric(amount) || amount < 0) {
      alert('Invalid amount');
      return false;
    }


    $.ajax({
      url: 'controller.php',
      method: 'POST',
      data: {
        ca_id: caid,
        new_amount: amount
      },
      success: function(response) {
      var data = JSON.parse(response);
      if (data.status === 'success') {
        $('#edit_modal').modal('hide');
        alert(data.message);
        location.reload();
      } else {
        alert( data.message);
      }
    },

      error: function() {
        alert('An error occurred while updating the cash advance amount.');
      }
    });
  });
});
</script>


<div id="emp_deleteca_modal" class="modal fade" role="dialog">
   <div class="modal-dialog text-light">

      <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">
         <div class="modal-header">
              <h5><p><i class="fas fa-exclamation-triangle" style="color: red;"></i> WARNING!!</p></h5>
         </div>
         <div class="modal-body">
                   <center><p>Are you sure you want to <b>DELETE</b> this cash advance record?</p>
                   <p>note: This action connot be undone!</p></center>
         </div>
         <div class="modal-footer">
            <form id="emp_deleteca_form" method="post">
               <input type="hidden" name="ca_id" id="ca_id" value="">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-danger">Delete</button>
            </form>
         </div>
      </div>
   </div>
</div>

<script>



$(document).ready(function() {
   $('.emp_deleteca').click(function() {
      var id = $(this).data('id');
      $('#ca_id').val(id);
   });


   $('#emp_deleteca_form').submit(function(e) {
      e.preventDefault();
      var id = $('#ca_id').val();
      $.ajax({
         type: 'POST',
         url: 'ca_delete.php',
         data: {ca_id: id},
         success: function(response) {
            if(response == "success") {
               Swal.fire({
                  title: "Success !",
                  text: "Cash advance record has been DELETED PERMANENTLY !",
                  type: "success"
               }).then(function() {
                  window.location = "cashadvance.php";
               });
            } else {
               Swal.fire({
                  title: "Error !",
                  text: "An error occurred while deleting the cash advance record.",
                  type: "error"
               });
            }
         }
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

    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    $('#secondpicker').datetimepicker({
      format: 'LT'
    })

    $('#thirdpicker').datetimepicker({
      format: 'LT'
    })

    $('#fourthpicker').datetimepicker({
      format: 'LT'
    })

  })
</script>

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
