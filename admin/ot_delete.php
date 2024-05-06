<?php
include("Database/config.php");
?>

<?php
if(isset($_POST["ot_id"])) {
   $id = $_POST['ot_id'];

   $sql = "DELETE FROM overtime WHERE id = '$id'";
   $result = mysqli_query($db, $sql);

   if($result) {
      echo "success";
   } else {
      echo "error";
   }
}
?>
