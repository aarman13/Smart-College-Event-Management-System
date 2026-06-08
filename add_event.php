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
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $date = $_POST['event_date'];
    
    // --- AM/PM TIME FORMATTING ---
    // This converts the HTML time (24hr) into a readable 12hr format with AM/PM
    $raw_time = $_POST['event_time'];
    $time = date("h:i A", strtotime($raw_time)); 
    
    $loc = mysqli_real_escape_string($conn, $_POST['location']);
    $admin_id = $_SESSION['user_id'];

    // Logic for Default Image
    if (!empty($_FILES['event_image']['name'])) {
        $image = $_FILES['event_image']['name'];
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['event_image']['tmp_name'], $target);
    } else {
        $image = "default.jpg"; 
    }

    $query = "INSERT INTO events (title, description, category, image, event_date, event_time, location, created_by) 
              VALUES ('$title', '$desc', '$category', '$image', '$date', '$time', '$loc', '$admin_id')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Event Published Successfully!'); window.location='admin_dashboard.php';</script>";
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
        body { background-color: #f1f3f0; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 110vh; margin: 0; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); width: 400px; border-top: 5px solid #6c8672; }
        h2 { color: #6c8672; text-align: center; margin-bottom: 20px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #d1dbd2; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #6c8672; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; transition: 0.3s; }
        button:hover { background-color: #a7bcad; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #6c8672; text-decoration: none; font-size: 14px; }
        label { font-size: 13px; font-weight: bold; color: #6c8672; display: block; margin-top: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create New Event</h2>
    <form action="add_event.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Event Title" required>
        <textarea name="description" placeholder="Event Description" rows="4" required></textarea>
        <input type="text" name="category" placeholder="Event Category" required>
        
        <label>Event Date</label>
        <input type="date" name="event_date" required>
        
        <label>Event Time</label>
        <input type="time" name="event_time" required>
        
        <input type="text" name="location" placeholder="Venue/Location" required>
        
        <label>Event Image</label>
        <input type="file" name="event_image">
        
        <button type="submit" name="add_event_btn">Publish Event</button>
    </form>
    <a href="admin_dashboard.php" class="back-link">← Back to Dashboard</a>
</div>

</body>
</html>