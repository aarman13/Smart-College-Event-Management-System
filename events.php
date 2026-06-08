<?php 
session_start(); 
include("db.php"); // Database configuration file

// Default routing role is student for safety
$verified_database_role = 'student';

// Strictly fetch the fresh database role for the logged-in ID to prevent session overlapping bugs
if (isset($_SESSION['user_id'])) {
    $session_uid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $role_check_query = "SELECT role FROM users WHERE id = '$session_uid'";
    $role_query_result = mysqli_query($conn, $role_check_query);
    
    if ($role_query_result && mysqli_num_rows($role_query_result) > 0) {
        $user_data_row = mysqli_fetch_assoc($role_query_result);
        $verified_database_role = $user_data_row['role'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events - College Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="fas fa-graduation-cap"></i> College Event Management System
        </a>
        <div class="ms-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php 
                    // STRICT ROLE ROUTING: Admin dashboard is completely untouched. 
                    // This uses the explicit role value saved in your phpMyAdmin database row.
                    if ($verified_database_role === 'admin') {
                        $dashboard_url = 'admin_dashboard.php';
                    } else {
                        $dashboard_url = 'student_dashboard.php';
                    }
                ?>
                <a href="<?php echo $dashboard_url; ?>" class="btn btn-outline-secondary me-2">Dashboard</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            <?php else: ?>
                <a href="index.php" class="btn btn-outline-secondary me-2">Home</a>
                <a href="signup.php" class="btn btn-primary me-2">Sign up</a>
                <a href="login.php" class="btn btn-outline-secondary me-2">Login</a>
            <?php endif; ?>
        </div> 
    </div>
</nav>

<div class="container my-5">
    <div class="row align-items-center mb-4">
        <div class="col-12 text-start">
            <h1 class="fw-bold campus-title">Campus Events</h1>
            <p class="text-muted">Explore and register for upcoming campus events across various categories!</p>
        </div>
    </div>

    <div class="d-flex gap-2 mb-5 flex-wrap">
        <button class="btn btn-outline-secondary filter-btn active" onclick="filterEvents('All')">All</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterEvents('Workshops')">🏆 Workshops</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterEvents('Technical')">💡 Technical</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterEvents('Culture')">🎭 Culture</button>
        <button class="btn btn-outline-secondary filter-btn" onclick="filterEvents('Sports')">🏆 Sports</button>
    </div>

    <div class="row g-4" id="eventContainer">

<?php 
$query = "SELECT * FROM events ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>

    <div class="col-md-4 event-card-item" data-category="<?php echo $row['category']; ?>">
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
<?php
$imagePath = "images/events/" . $row['image'];

if (empty($imagePath) || !file_exists($imagePath)) {
    $imagePath = "images/events/default.jpg";
}
?>

<img src="<?php echo $imagePath; ?>" alt="Event Image" style="height: 300px; object-fit: cover;">

            <div class="card-body text-center">
                <span class="badge bg-light text-success border mb-2">
                    <?php echo $row['category']; ?>
                </span>

                <h5 class="card-title fw-bold">
<?php echo $row['title']; ?>
</h5>

<p class="text-muted small event-desc">

<?php
echo substr(
$row['description'],
0,
80
);
?>...

</p>

<p class="text-muted small">
<i class="fas fa-calendar"></i>

<?php echo $row['event_date']; ?>

</p>

                <p class="text-muted small">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php echo $row['location']; ?>
                </p>

                <?php
$current_date = date("Y-m-d");

if($row['event_date'] >= $current_date){
?>
    <a href="register_events.php?id=<?php echo $row['id']; ?>" class="btn btn-success w-100">
         Register Now
    </a>

<?php } else { ?>

    <button class="event-ended-btn" disabled>
        Event Ended
    </button>

<?php } ?>
            </div>
        </div>
    </div>

<?php 
    }
}
?>

</div>

</div>

<script src="events.js"></script>
</body>
</html>