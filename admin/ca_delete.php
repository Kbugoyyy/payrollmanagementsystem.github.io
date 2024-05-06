<?php

include("Database/config.php");


if(isset($_POST["caid"])) {
    $caid = $_POST["caid"];


    $sql = "DELETE FROM cashadvance WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$caid]);


    header("Location: cashadvance.php?success=deleted");
    exit();
}

if(isset($_POST["ca_id"])) {
   $id = $_POST['ca_id'];

   $sql = "DELETE FROM cashadvance WHERE id = '$id'";
   $result = mysqli_query($db, $sql);

   if($result) {
      echo "success";
   } else {
      echo "error";
   }
}

?>
