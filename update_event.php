<?php
session_start();
include 'db.php';

// Security Check
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$msg = "";

// 1. GET EXISTING DATA: Fetch details of the event we want to edit
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM events WHERE id = '$id'");
    $event = mysqli_fetch_assoc($res);
}

// 2. UPDATE DATA: Handle the form submission
if (isset($_POST['update_event'])) {
    $id = mysqli_real_escape_string($conn, $_POST['event_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $update_query = "UPDATE events SET 
                    title = '$title', 
                    event_date = '$date', 
                    location = '$location', 
                    description = '$description' 
                    WHERE id = '$id'";

    if (mysqli_query($conn, $update_query)) {
        header("Location: all_events.php?msg=updated");
        exit();
    } else {
        $msg = "Error updating: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card border-0 shadow-sm rounded-4 p-4 mx-auto" style="max-width: 600px;">
            <h3 class="fw-bold mb-4" style="color: #6c8672;">Edit Event</h3>
            
            <form action="update_event.php" method="POST">
                <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">Event Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $event['title']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="<?php echo $event['event_date']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo $event['location']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="4"><?php echo $event['description']; ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="update_event" class="btn btn-success w-100 py-2 rounded-pill">Save Changes</button>
                    <a href="all_events.php" class="btn btn-outline-secondary w-100 py-2 rounded-pill">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>