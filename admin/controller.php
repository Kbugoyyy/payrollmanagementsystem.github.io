<?php

include("Database/config.php");

date_default_timezone_set('Asia/Manila');

if(isset($_POST['Sign_in']))
{
  $username = mysqli_real_escape_string($db,$_POST['log_username']);
  $password = mysqli_real_escape_string($db,$_POST['log_password']);

  $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
  $result = mysqli_query($db, $sql);

  if (!$row = $result->fetch_assoc()){
    echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Failed !",
                     text: "Username or Password is incorrect !",
                     type: "error"
                   }).then(function() {
                       window.location = "index.php";
                   });
             }, 30);
         </script>';
  }
  else {
      $_SESSION['name'] = $row['name'];
      $_SESSION['username'] = $row['username'];
      $sql = "SELECT * FROM accounts WHERE username = '$username' and password = '$password' ";
      $result = mysqli_query($db, $sql);
      $row = $result->fetch_assoc();
      $_SESSION['username'] = $username;
      if ($row['type'] === 'Admin')
            header("Location: home.php");
  }
}

if(isset($_POST['logout'])) {
  session_start();
  if(session_destroy())
  {
    header("Location: index.php");
  }
}

if(isset($_POST['add_position']))
{

  $title = $_POST['position_title'];
  $rate = $_POST['position_rate'];

  $chkquery = "SELECT * FROM emp_position WHERE position_title = '$title' AND position_rate = '$rate'";
  $chkresult = mysqli_query($db, $chkquery);

    $sql = "INSERT INTO emp_position (position_title, position_rate) VALUES ('$title', '$rate')";
  $result = mysqli_query($db, $sql);

  echo '<script>
           setTimeout(function() {
               Swal.fire({
                   title: "Success !",
                   text: "New Position has been Added !",
                   type: "success"
                 }).then(function() {
                     window.location = "employee_positions.php";
                 });
           }, 30);
       </script>';
}

if(isset($_POST['add_employee']))
{
  $tag = $_POST['emp_tag'];
  $fname = $_POST['emp_name'];
  $lname = $_POST['emp_lastname'];
  $address = $_POST['emp_address'];
  $contact = $_POST['emp_contact'];
  $gender = $_POST['emp_gender'];
  $position = $_POST['emp_position'];
  $sched = $_POST['emp_schedule'];
  $regdate = date("Y-m-d");

  $sql = "SELECT sched_in, sched_out FROM emp_sched WHERE sched_id = '$sched'";
  $result = mysqli_query($db, $sql);
  while($row = mysqli_fetch_array($result))
  {
    $in = $row['sched_in'];
    $out = $row['sched_out'];
  }

  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  $filename = $_FILES['fileToUpload']['name'];
  if(!empty($filename)){
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'img/'.$filename);
  }

  $query = "INSERT INTO emp_list (emp_card, emp_fname, emp_lname, emp_position, emp_address, emp_contact, emp_gender, emp_timein, emp_timeout, sched_id, emp_regdate, emp_photo)
                          VALUES ('$tag', '$fname', '$lname', '$position', '$address', '$contact', '$gender', '$in', '$out', '$sched', '$regdate', '$target_file')";
  $resquery = mysqli_query($db, $query);

  echo '<script>
           setTimeout(function() {
               Swal.fire({
                   title: "Success !",
                   text: "New Employee has been Added!",
                   type: "success"
                 }).then(function() {
                     window.location = "employee_list.php";
                 });
           }, 30);
       </script>';

}



if(isset($_POST['add_sched']))
{

  $in = $_POST['sched_timein'];
  $out = $_POST['sched_timeout'];

  $in_24  = date("H:i", strtotime($in));
  $out_24 = date("H:i", strtotime($out));

  $chkquery = "SELECT * FROM emp_sched WHERE sched_in = '$in_24' AND sched_out = '$out_24'";
  $chkresult = mysqli_query($db, $chkquery);

    $sql = "INSERT INTO emp_sched (sched_in, sched_out) VALUES ('$in_24', '$out_24')";
    $result = mysqli_query($db, $sql);

  echo '<script>
           setTimeout(function() {
               Swal.fire({
                   title: "Success !",
                   text: "New Schedule has been Added !",
                   type: "success"
                 }).then(function() {
                     window.location = "employee_sched.php";
                 });
           }, 30);
       </script>';
}

if(isset($_POST["pos_id"]))
{
    $output = '';
    $sql = "SELECT * FROM emp_position WHERE pos_id = '".$_POST["pos_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["pos_id"];
          $title = $row['position_title'];
          $rate = $row['position_rate'];

         $output .= '
              <input type="text" name="update_id" class="form-control" value="'.$id.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Position Title</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_title" value="'.$title.'" placeholder="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Rate / Hour</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="update_rate" value="'.number_format($rate,2).'" placeholder="" required>
                </div>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;

}


if(isset($_POST["pos_update"]))
 {
   $id = $_POST['update_id'];
   $title = $_POST['update_title'];
   $rate = $_POST['update_rate'];

   $sql = "UPDATE emp_position SET position_title = '".$title."', position_rate = '".$rate."' WHERE pos_id = '".$id."'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Position Information has been Updated!",
                    type: "success"
                  }).then(function() {
                      window.location = "employee_positions.php";
                  });
            }, 30);
        </script>';
}

if(isset($_POST["pos_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM emp_position WHERE pos_id = '".$_POST["pos_del_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["pos_id"];
          $title = $row['position_title'];
          $rate = $row['position_rate'];

         $output .= '
              <input type="text" name="update_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
                    <p>DELETE POSITION</p>
                    <h2>'.$title.'</h2>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;




}

if(isset($_POST["pos_delete"]))
 {
   $id = $_POST['update_id'];

   $sql = "DELETE FROM emp_position WHERE pos_id = '$id'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Position has been Deleted !",
                    type: "success"
                  }).then(function() {
                      window.location = "employee_positions.php";
                  });
            }, 30);
        </script>';
}



if (isset($_POST["emp_edit_id"])) {
    $output = '';
    $empId = $_POST["emp_edit_id"];


    $query = mysqli_query($db, "SELECT * FROM emp_list WHERE emp_id = '$empId'");
    $row = mysqli_fetch_assoc($query);


    $output .= '
    <form id="updateForm">
        <input type="hidden" name="emp_id" value="' . $row['emp_id'] . '">
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" class="form-control" name="emp_fname" value="' . $row['emp_fname'] . '">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" class="form-control" name="emp_lname" value="' . $row['emp_lname'] . '">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control" name="emp_address" value="' . $row['emp_address'] . '">
        </div>
        <div class="form-group">
            <label>Contact:</label>
            <input type="text" class="form-control" name="emp_contact" value="' . $row['emp_contact'] . '">
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <select class="form-control" name="emp_gender">
                <option value="Male" ' . ($row['emp_gender'] == "Male" ? 'selected' : '') . '>Male</option>
                <option value="Female" ' . ($row['emp_gender'] == "Female" ? 'selected' : '') . '>Female</option>
                <option value="Prefer Not to Say" ' . ($row['emp_gender'] == "Prefer Not to Say" ? 'selected' : '') . '>Prefer Not to Say</option>
            </select>
        </div>
    </form>';

    echo $output;
}

if (isset($_POST["emp_photo_edit"])) {
    $output = '';
    $empId = $_POST["emp_photo_edit"];


    $query = mysqli_query($db, "SELECT * FROM emp_list WHERE emp_id = '$empId'");
    $row = mysqli_fetch_assoc($query);


    $output .= '
    <form id="updatePhotoForm" enctype="multipart/form-data">
        <input type="hidden" name="emp_id" value="' . $row['emp_id'] . '">
        <div class="form-group">
            <label>Current Photo:</label>
            <img src="' . $row['emp_photo'] . '" style="width: 100px;height: 100px;">
        </div>
        <div class="form-group">
            <label>New Photo:</label>
            <input type="file" class="form-control-file" name="fileToUpload">
        </div>
    </form>';

    echo $output;
}
if (isset($_POST["emp_id"])) {
    $empId = $_POST["emp_id"];
    $fname = $_POST['emp_fname'];
    $lname = $_POST['emp_lname'];
    $address = $_POST['emp_address'];
    $contact = $_POST['emp_contact'];
    $gender = $_POST['emp_gender'];


    $query = "UPDATE emp_list SET emp_fname = '$fname', emp_lname = '$lname', emp_address = '$address', emp_contact = '$contact', emp_gender = '$gender' WHERE emp_id = '$empId'";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}

if(isset($_POST["emp_del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM emp_list WHERE emp_id = '".$_POST["emp_del_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["emp_id"];

         $output .= '
              <input type="text" name="del_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
                    <p>ARE YOU SURE YOU WANT TO REMOVE </p>
                    <p>  </p>
                    <h1>'.$row['emp_fname'] .' ' . ' '. $row['emp_lname'].'</h1>
                    <p>  </p>
                    <p>FROM THE LIST OF EMPLOYEE?</p>
              </div>
              ';
    }

    $output .= "</form>";
    echo $output;

}

if(isset($_POST["emp_delete"]))
 {
   $id = $_POST['del_id'];
   $sql = "INSERT INTO archive SELECT * FROM emp_list WHERE emp_id = '$id'";
   $db->query($sql);

   $sql = "DELETE FROM emp_list WHERE emp_id = '$id'";
   $result = mysqli_query($db, $sql);



   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Employee has been Removed !",
                    type: "success"
                  }).then(function() {
                      window.location = "employee_list.php";
                  });
            }, 30);
        </script>';
}


if(isset($_POST["emp_res_id"]))
{
    $output = '';
    $sql = "SELECT * FROM archive WHERE emp_id = '".$_POST["emp_res_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["emp_id"];

         $output .= '
              <input type="text" name="res_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
                    <p>ARE YOU SURE YOU WANT TO RETRIEVE ?</p>
                    <p>  </p>
                    <h1>'.$row['emp_fname'] .' ' . ' '. $row['emp_lname'].'<span> \'s</span></h1>
                    <p>  </p>
                    <p>INFORMATION FROM THE RECYCLE BIN ?</p>
              </div>
              ';
    }

    $output .= "</form>";
    echo $output;

}

if(isset($_POST["emp_restore"]))
 {
   $id = $_POST['res_id'];
   $sql = "INSERT INTO emp_list SELECT * FROM archive WHERE emp_id = '$id'";
   $db->query($sql);

   $sql = "DELETE FROM archive WHERE emp_id = '$id'";
   $result = mysqli_query($db, $sql);



   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Employee has been Restored !",
                    type: "success"
                  }).then(function() {
                      window.location = "archive.php";
                  });
            }, 30);
          </script>';
}


if(isset($_POST["emp_perma_id"]))
{
    $output = '';
    $sql = "SELECT * FROM archive WHERE emp_id = '".$_POST["emp_perma_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["emp_id"];

         $output .= '
              <input type="text" name="perma_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
                    <h4>YOU ARE ABOUT TO DELETE</h4>
                    <p>  </p>
                    <h1><b>'.$row['emp_lname'] .' </b><span>, </span>' . ' '. $row['emp_fname'].'</b><span> \'s</span></h1>
                    <h4>DATA PERMANENTLY? </h4>
                    <h5> THIS ACTION CONNOT BE UNDONE! </h5>
              </div>
              ';
    }

    $output .= "</form>";
    echo $output;

}

if(isset($_POST["emp_permanent"]))
 {
   $id = $_POST['perma_id'];

   $sql = "DELETE FROM archive WHERE emp_id = '$id'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Employee has been DELETED PERMANENTLY !",
                    type: "success"
                  }).then(function() {
                      window.location = "archive.php";
                  });
            }, 30);
        </script>';
}

if(isset($_POST['add_overtime'])) {
    $card = $_POST['emp_card'];
    $date = $_POST['date_overtime'];
    $hours = $_POST['emp_hours'];
    $mins = $_POST['emp_mins'];
    $rate = $_POST['emp_rate'];

    $chkquery = "SELECT * FROM emp_list WHERE emp_card = '$card'";
    $chkresult = mysqli_query($db, $chkquery);

    if(mysqli_num_rows($chkresult) > 0) {

        $sql = "INSERT INTO overtime (emp_card, date_overtime, emp_hours, emp_mins, emp_rate) VALUES ('$card', '$date', '$hours', '$mins', '$rate')";
        $result = mysqli_query($db, $sql);

        echo '<script>
                 setTimeout(function() {
                     Swal.fire({
                         title: "Success !",
                         text: "New Overtime has been Added !",
                         type: "success"
                       }).then(function() {
                           window.location = "overtime.php";
                       });
                 }, 30);
             </script>';
    } else {

        echo '<script>
                 setTimeout(function() {
                     Swal.fire({
                         title: "Error !",
                         text: "Employee does not exist !",
                         type: "error"
                       }).then(function() {
                           window.location = "overtime.php";
                       });
                 }, 30);
             </script>';
    }
}






if (isset($_POST['otid']) && isset($_POST['hours'])) {
    $otid = $_POST['otid'];
    $rate = $_POST['edit_rate'];


    $sql = "UPDATE overtime SET emp_rate = $rate WHERE id = $otid";
    $result = $db->query($sql);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Rate updated successfully');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update Rate');
        echo json_encode($response);
    }
}



if (isset($_POST['otid']) && isset($_POST['newDate'])) {
  $otid = $_POST['otid'];
  $newDate = $_POST['newDate'];

  $sql = "UPDATE overtime SET date_overtime = '$newDate' WHERE id = $otid";
  $result = $db->query($sql);

  if ($result) {
    $response = array('status' => 'success', 'message' => 'Date updated successfully');
    echo json_encode($response);
  } else {
    $response = array('status' => 'error', 'message' => 'Failed to update date');
    echo json_encode($response);
  }
}






if(isset($_POST['ca_id']) && isset($_POST['new_amount'])) {


    $ca_id = $_POST['ca_id'];
    $new_amount = $_POST['new_amount'];

    $sql = "UPDATE cashadvance SET amount = $new_amount WHERE id = $ca_id";
    $result = $db->query($sql);

    if($result) {

        $response = array('status' => 'success', 'message' => 'Cash advance amount updated successfully');
        echo json_encode($response);
    } else {

        $response = array('status' => 'error', 'message' => 'Failed to update cash advance amount');
        echo json_encode($response);
    }
}


if(isset($_POST['add_cashadvance'])) {
    $card = $_POST['emp_card'];
    $amount = $_POST['amount'];

    $chkquery = "SELECT * FROM emp_list WHERE emp_card = '$card'";
    $chkresult = mysqli_query($db, $chkquery);

    if(mysqli_num_rows($chkresult) > 0) {

        $sql = "INSERT INTO cashadvance (emp_card, date_advance, amount) VALUES ('$card', NOW(), '$amount')";
        $result = mysqli_query($db, $sql);

        echo '<script>
                 setTimeout(function() {
                     Swal.fire({
                         title: "Success !",
                         text: "New Cash Advance has been Added !",
                         type: "success"
                       }).then(function() {
                           window.location = "cashadvance.php";
                       });
                 }, 30);
             </script>';
    } else {

        echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Error !",
                     text: "Employee does not exist !",
                     type: "error"
                   }).then(function() {
                       window.location = "cashadvance.php";
                   });
             }, 30);
         </script>';
  }
}





if(isset($_POST["sched_id"]))
{
    $output = '';
    $sql = "SELECT * FROM emp_sched WHERE sched_id = '".$_POST["sched_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["sched_id"];

         $output .= '
              <input type="text" name="del_id" class="form-control" value="'.$id.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Time in</label>
                <div class="col-sm-7">
                  <div class="bootstrap-timepicker">
                    <div class="input-group date" id="thirdpicker" data-target-input="nearest">
                      <input type="time" value="'.$row['sched_in'].'" name="sched_update_in" class="form-control datetimepicker-input" data-target="#timepicker" data-toggle="datetimepicker" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Time out</label>
                <div class="col-sm-7">
                  <div class="bootstrap-timepicker">
                    <div class="input-group date" id="fourthpicker" data-target-input="nearest">
                      <input type="time" value="'.$row['sched_out'].'" name="sched_update_out" class="form-control datetimepicker-input" data-target="#secondpicker" data-toggle="datetimepicker" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;

}

if(isset($_POST["edit_sched"]))
 {
   $id = $_POST['del_id'];
   $in = $_POST['sched_update_in'];
   $out = $_POST['sched_update_out'];

   $sql = "UPDATE emp_sched SET sched_in = '$in', sched_out = '$out' WHERE sched_id = '$id'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Schedule has been updated !",
                    type: "success"
                  }).then(function() {
                      window.location = "employee_sched.php";
                  });
            }, 30);
        </script>';
}

if(isset($_POST["delsched_id"]))
{
    $output = '';
    $sql = "SELECT * FROM emp_sched WHERE sched_id = '".$_POST["delsched_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["sched_id"];

         $output .= '
              <input type="text" name="del_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
                    <p>DELETE SCHEDULE</p>
                    <h2>'.$row['sched_in'] .' ' .'-'. ' '. $row['sched_out'].'</h2>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;

}



if(isset($_POST["delete_sched"]))
 {
   $id = $_POST['del_id'];

   $sql = "DELETE FROM emp_sched WHERE sched_id = '$id'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Schedule has been Deleted !",
                    type: "success"
                  }).then(function() {
                      window.location = "employee_sched.php";
                  });
            }, 30);
        </script>';
}

if(isset($_POST['add_deduct']))
{
  $desc = $_POST['add_desc'];
  $amount = $_POST['add_amount'];

  $sql = "INSERT INTO salary_deduct (deduct_desc, deduct_amount) VALUES ('$desc', '$amount')";
  $result = mysqli_query($db, $sql);

  echo '<script>
           setTimeout(function() {
               Swal.fire({
                   title: "Success !",
                   text: "Deduction has been Added !",
                   type: "success"
                 }).then(function() {
                     window.location = "employee_deduction.php";
                 });
           }, 30);
       </script>';

}

if(isset($_POST["deduct_id"]))
{
    $output = '';
    $sql = "SELECT * FROM salary_deduct WHERE deduct_id = '".$_POST["deduct_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["deduct_id"];

         $output .= '
              <input type="text" name="deduct_edit_id" class="form-control" value="'.$id.'" hidden>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="deduct_edit_description" value="'.$row['deduct_desc'].'" placeholder="" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-1 col-form-label"></label>
                <label class="col-sm-3 col-form-label">Amount</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="deduct_edit_amount" value="'.$row['deduct_amount'].'" placeholder="" required>
                </div>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;

}

if(isset($_POST["deduct_update"]))
 {
   $id = $_POST['deduct_edit_id'];
   $desc = $_POST['deduct_edit_description'];
   $amount = $_POST['deduct_edit_amount'];

   $sql = "UPDATE salary_deduct SET deduct_desc = '$desc', deduct_amount = '$amount' WHERE deduct_id = '$id'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Deduction information has been updated !",
                    type: "success"
                  }).then(function() {
                      window.location = "employee_deduction.php";
                  });
            }, 30);
        </script>';
}

if(isset($_POST["del_id"]))
{
    $output = '';
    $sql = "SELECT * FROM salary_deduct WHERE deduct_id = '".$_POST["del_id"]."'";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">';
    while($row = mysqli_fetch_array($result))
    {
          $id = $row["deduct_id"];

         $output .= '
              <input type="text" name="del_id" class="form-control" value="'.$id.'" hidden>
              <div class="text-center">
                    <p>DELETE DEDUCTION</p>
                    <h2>'.$row['deduct_desc'].'</h2>
              </div>
              ';
    }
    $output .= "</form>";
    echo $output;

}

if(isset($_POST["del_deduct"]))
 {
   $id = $_POST['del_id'];

   $sql = "DELETE FROM salary_deduct WHERE deduct_id = '$id'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Deduction has been Deleted !",
                    type: "success"
                  }).then(function() {
                      window.location = "employee_deduction.php";
                  });
            }, 30);
        </script>';
}

if(isset($_POST['apply_date']))
{
  $_SESSION['start_month'] = $_POST['startmonth'];
  $_SESSION['end_month'] = $_POST['endmonth'];

  header('location: print_payroll.php');
}

if(isset($_POST["change_id"]))
{
    $output = '';
    $sql = "SELECT * FROM emp_sched";
    $result = mysqli_query($db, $sql);
    $output .= '
    <form method="POST">
    <br>
    <input type="text" name="change_sched_id" class="form-control" value="'.$_POST['change_id'].'" hidden>
    <div class="form-group row">
      <label class="col-sm-1 col-form-label"></label>
      <label class="col-sm-3 col-form-label">Schedule</label>
      <div class="col-sm-7">
        <select class="form-control" name="new_sched">
    ';
    while($row = mysqli_fetch_array($result))
    {
         $hold = $_POST['change_id'];
         $output .= '

                  <option value='.$row['sched_id'].'>'.$row['sched_in'].' - '.$row['sched_out'].'</option>

              ';
    }
    $output .= "
    </div>
    </div>
    </form>";
    echo $output;

}

if(isset($_POST["change"]))
 {
   $id = $_POST['change_sched_id'];
   $new = $_POST['new_sched'];

   $sql = "UPDATE emp_list SET sched_id = '$new' WHERE emp_id = '$id'";
   $result = mysqli_query($db, $sql);

   echo '<script>
            setTimeout(function() {
                Swal.fire({
                    title: "Success !",
                    text: "Schedule information has been updated !",
                    type: "success"
                  }).then(function() {
                      window.location = "print_sched.php";
                  });
            }, 30);
        </script>';
}

if(isset($_POST['new_payslip']))
{
  $_SESSION['card'] = $_POST['new_payslip'];
  header("location: print_payslip.php");
}



?>
