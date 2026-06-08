<?php
include 'db.php';

$query = "SELECT title, event_date as start FROM events";
$result = mysqli_query($conn, $query);

$events = array();
while($row = mysqli_fetch_assoc($result)) {
    $events[] = $row;
}

// Send the data to the calendar in a format it understands (JSON)
echo json_encode($events);
?>