<?php
include("Database/config.php");

if (isset($_POST['otid']) && isset($_POST['hours']) && isset($_POST['minutes'])) {
    $otid = $_POST['otid'];
    $hours = $_POST['hours'];
    $minutes = $_POST['minutes'];

    $sql = "UPDATE overtime SET emp_hours = $hours, emp_mins = $minutes WHERE id = $otid";
    $result = $db->query($sql);

    if ($result) {
        $response = array('status' => 'success', 'message' => 'Time updated successfully');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to update time');
        echo json_encode($response);
    }
}


if (isset($_POST['otid']) && isset($_POST['edit_rate'])) {
    $otid = $_POST['otid'];
    $rate = $_POST['edit_rate'];

    if ($rate > 10000) {
        $response = array('status' => 'error', 'message' => 'Maximum number reached');
        echo json_encode($response);
    } else {
        $sql = "UPDATE overtime SET emp_rate = $rate WHERE id = $otid";
        $result = $db->query($sql);

        if ($result) {
            $response = array('status' => 'success', 'message' => 'Rate updated successfully');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to update rate');
            echo json_encode($response);
        }
    }
}
?>
