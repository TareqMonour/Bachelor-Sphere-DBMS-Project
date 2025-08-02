<?php
include 'admin_class.php';
$action = new Action();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        if (isset($_POST['item_name'])) {
            $response = $action->save_lost_found();
        } elseif (isset($_POST['student_name'])) {
            $response = $action->save_tuition();
        } elseif (isset($_POST['location']) && isset($_POST['fare'])) {
            $response = $action->save_rickshaw_fare();
        } elseif (isset($_POST['mess_name'])) {
            $response = $action->save_mess();
        }

        // Check response and handle accordingly
        if ($response == 1) {
            echo 'Data saved successfully!';
        } elseif ($response == 2) {
            echo 'Error: Duplicate entry!';
        } else {
            echo 'Error: Data saving failed!';
        }
    }

    // Handle deletion if needed
    if (isset($_POST['delete'])) {
        if (isset($_POST['item_id'])) {
            $response = $action->delete_lost_found();
        } elseif (isset($_POST['tuition_id'])) {
            $response = $action->delete_tuition();
        } elseif (isset($_POST['fare_id'])) {
            $response = $action->delete_rickshaw_fare();
        } elseif (isset($_POST['mess_id'])) {
            $response = $action->delete_mess();
        }

        if ($response == 1) {
            echo 'Data deleted successfully!';
        } else {
            echo 'Error: Data deletion failed!';
        }
    }
}
?>
