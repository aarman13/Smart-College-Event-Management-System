<?php
session_start();
include 'db.php';

// Security check: Redirect to login if user is not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add_event_btn'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $date = $_POST['event_date'];
    $time = $_POST['event_time'];
    $loc = mysqli_real_escape_string($conn, $_POST['location']);
    $admin_id = $_SESSION['user_id'];

    $query = "INSERT INTO events (title, description, event_date, event_time, location, created_by) 
              VALUES ('$title', '$desc', '$date', '$time', '$loc', '$admin_id')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Event Published Successfully!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Event - Smart College System</title>
    <style>
        body { background-color: #f1f3f0; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); width: 400px; border-top: 5px solid #6c8672; }
        h2 { color: #6c8672; text-align: center; margin-bottom: 20px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #d1dbd2; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #6c8672; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: 0.3s; }
        button:hover { background-color: #a7bcad; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #6c8672; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create New Event</h2>
    <form action="add_event.php" method="POST">
        <input type="text" name="title" placeholder="Event Title" required>
        <textarea name="description" placeholder="Event Description" rows="4" required></textarea>
        <input type="date" name="event_date" required>
        <input type="time" name="event_time" required>
        <input type="text" name="location" placeholder="Venue/Location" required>
        <button type="submit" name="add_event_btn">Publish Event</button>
    </form>
    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
</div>

</body>
</html>