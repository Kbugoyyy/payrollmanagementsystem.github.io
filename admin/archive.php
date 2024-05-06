<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Archive</title>
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
  <script src="dist/js/1.js"></script>
  <script src="dist/js/2.js"></script>
  <script src="dist/js/3.js"></script>

</head>



<body style="background-image: linear-gradient(190deg, yellow, green);"  class="hold-transition sidebar-mini layout-fixed">



  <center><div class="col-md-3"></div>
  <div class="col-md-6 well"><br>
    <h3 class="text-light"><strong>Archive List</strong></h3>
    <hr style="border-top:1px solid-line #ccc;"/></div></center>
    <a href="employee_list.php" class="col-md-6"><i class="fa fa-arrow-circle-left"></i>BACK</a>
    <br /><br />
    <center><div class="alert alert-danger">TRASH BIN</div></center>
    <table class="table table-bordered">
      <thead>
                <tr>
                  <th class="text-light"><center>Employee ID</center></th>
                  <th class="text-light"><center>Photo</center></th>
                  <th class="text-light"><center>Name</center></th>
                  <th class="text-light"><center>Position ID</center></th>
                  <th class="text-light"><center>Schedule</center></th>
                  <th class="text-light"><center>Member Since</center></th>
                  <th class="text-light"><center>Action</center></th>
                </tr>
                </thead>




          <?php
                    require 'controller.php';


                    $query = mysqli_query($db, "SELECT * FROM archive") or die(mysqli_error());
            while($fetch = mysqli_fetch_array($query)){

          ?>
              <tr class="text-light">
                <td><?php echo $fetch['emp_card']; ?></td>
                <td><center><img src="<?php echo $fetch['emp_photo']; ?>" style="width: 40px;height: 40px;"></center></td>
                <td><?php echo $fetch['emp_lname'];echo ", "; ?> <?php echo $fetch['emp_fname']; ?></td>
                <td><?php echo $fetch['emp_position']; ?></td>
                <td><?php echo $fetch['emp_timein']; ?> - <?php echo $fetch['emp_timeout']; ?></td>
                <td><?php echo $fetch['emp_regdate']; ?></td>

                <td><center><button class="btn btn-warning btn-flat emp_restore" id="<?php echo $fetch['emp_id']; ?>"><i class="fas fa-undo"></i></button>
                            <button class="btn btn-warning btn-flat emp_permanent" id="<?php echo $fetch['emp_id']; ?>"><i class="fas fa-trash"></i></button></center></td>

              </tr>

          <?php
            }
          ?>
      </tbody>
    </table>



    <div id="emp_restore_modal" class="modal fade">
      <div class="modal-dialog text-light" role="document">
        <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">

          <div class="modal-header">
            <h5><p><i class="fas fa-exclamation-triangle" style="color: orange;"></i> Notice!</p></h5>
          </div>

<form method="POST">

            <div class="modal-body" id="emp_restore_details"> </div>
            <div class="modal-body"></div>
            <div class="modal-footer justify-content-between">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="emp_restore">Yes</button>
</form>

          </div>
        </div>
      </div>
    </div>

  <script>

    $(document).ready(function(){
         $('.emp_restore').click(function(){
              var emp_res_id = $(this).attr("id");
              $.ajax({
                   url:"controller.php",
                   method:"post",
                   data:{emp_res_id:emp_res_id},
                   success:function(data){
                        $('#emp_restore_details').html(data);
                        $('#emp_restore_modal').modal("show");
                   }
              });
         });
    });

    </script>



        <div id="emp_permanent_modal" class="modal fade">
          <div class="modal-dialog text-light" role="document">
            <div style="background-image: linear-gradient(190deg, yellow, green);" class="modal-content">

              <div class="modal-header">
                <h5> <p><i class="fas fa-exclamation-triangle" style="color: red;"></i> WARNING!!</p></h5>
              </div>

    <form method="POST">

                <div class="modal-body" id="emp_permanent_details"> </div>
                <div class="modal-body"></div>
                <div class="modal-footer justify-content-between">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" style="background-color: red; "class="btn btn-primary" name="emp_permanent">DELETE</button>
    </form>

              </div>
            </div>
          </div>
        </div>

      <script>

        $(document).ready(function(){
             $('.emp_permanent').click(function(){
                  var emp_perma_id = $(this).attr("id");
                  $.ajax({
                       url:"controller.php",
                       method:"post",
                       data:{emp_perma_id:emp_perma_id},
                       success:function(data){
                            $('#emp_permanent_details').html(data);
                            $('#emp_permanent_modal').modal("show");
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
