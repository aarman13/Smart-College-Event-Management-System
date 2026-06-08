<?php
session_start();
include 'db.php';

// Security: Only admins should be able to trigger this
if (!isset($_SESSION['user_id'])) {
    exit("Access Denied");
}

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $action = $_GET['action'];

    // Determine the new status based on the button clicked
    $new_status = ($action == 'approve') ? 'approved' : 'rejected';

    $query = "UPDATE volunteers SET status = '$new_status' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        // Redirect back to the dashboard to see the updated list
        header("Location: admin_dashboard.php?msg=updated");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>