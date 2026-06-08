<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) { exit("Access Denied"); }

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Delete the event
    $query = "DELETE FROM events WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: all_events.php?msg=deleted");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>