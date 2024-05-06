<?php

include("Database/config.php");

if (isset($_POST["emp_id"])) {
    $empId = $_POST["emp_id"];
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $filename = $_FILES['fileToUpload']['name'];
    if (!empty($filename)) {
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'img/' . $filename);

        $query = "UPDATE emp_list SET emp_photo = '$target_file' WHERE emp_id = '$empId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
?>
