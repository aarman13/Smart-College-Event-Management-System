<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['user_id'];
$event_id = $_GET['id'];

$query = "INSERT INTO registrations (student_id, event_id, status)
VALUES ('$student_id', '$event_id', 'Registered')";

mysqli_query($conn, $query);

header("Location: my_registrations.php");
exit();
?>