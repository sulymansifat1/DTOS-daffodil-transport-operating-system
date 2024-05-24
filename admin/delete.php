<?php
include 'inc/db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM BusSchedule WHERE id = ?";
    $result = delete($sql, [$id], "i");

    if ($result) {
        header("Location: busDetails.php");
        exit();
    } else {
        echo "Error deleting record.";
    }
}
?>