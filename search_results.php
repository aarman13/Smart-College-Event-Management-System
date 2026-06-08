<?php
session_start();
include 'db.php';

$query_term = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : '';

// Search for matches in title, location, or category
$sql = "SELECT * FROM events 
        WHERE title LIKE '%$query_term%' 
        OR location LIKE '%$query_term%' 
        OR category LIKE '%$query_term%' 
        ORDER BY event_date ASC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results | College Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sage-green: #5b7c61; --light-sage: #f1f5f1; }
        body { background-color: #f8fafc; font-family: 'Plus Jakarta Sans', sans-serif; padding: 50px; }
        .event-card { background: white; border-radius: 20px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; height: 100%; }
        .event-card:hover { transform: translateY(-5px); }
        .accent-text { color: var(--sage-green); }
        .btn-back { color: var(--sage-green); text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>

<div class="container">
    <a href="about.html" class="btn-back mb-4 d-inline-block"><i class="fas fa-arrow-left"></i> Back to About</a>
    
    <header class="mb-5">
        <h1 class="fw-bold">Results for "<span class="accent-text"><?php echo htmlspecialchars($query_term); ?></span>"</h1>
        <p class="text-muted">Found <?php echo mysqli_num_rows($result); ?> matching events.</p>
    </header>

    <div class="row g-4">
        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4">
                    <div class="event-card">
                        <span class="badge bg-success mb-2"><?php echo strtoupper($row['category']); ?></span>
                        <h4 class="fw-bold"><?php echo $row['title']; ?></h4>
                        <p class="text-muted mb-1"><i class="far fa-calendar-alt me-2"></i><?php echo date('M d, Y', strtotime($row['event_date'])); ?></p>
                        <p class="text-muted"><i class="fas fa-map-marker-alt me-2"></i><?php echo $row['location']; ?></p>
                        <a href="available_events.php" class="btn btn-outline-success w-100 rounded-pill mt-2">View Details</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h3 class="text-muted">No events found matching your search.</h3>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>