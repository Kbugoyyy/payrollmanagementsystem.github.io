<?php
include("controller.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Print Schedule</title>
  <link rel="icon" href="img/PIF.png">

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
<body>

<div class="row">
  <div class="col-12">
    <table>
      <tr>
        <th>Empoyee ID</th>
        <th>Name</th>
        <th>Schedule</th>
      </tr>
      <?php
   
      $sql = "SELECT * FROM emp_list, emp_sched WHERE emp_list.sched_id = emp_sched.sched_id ";
      $result = mysqli_query($db, $sql);
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
        <td><?php echo $row['emp_card']; ?></td>
        <td><?php echo $row['emp_fname']; ?> <?php echo $row['emp_lname']; ?></td>
        <td><?php echo $row['sched_in']; ?> AM - <?php echo $row['sched_out']; ?> PM</td>
      </tr>
      <?php
      }
      ?>
    </table>
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
