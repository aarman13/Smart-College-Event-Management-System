<?php
session_start();
include 'db.php'; // Ensure this file has your $conn connection

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$fullname = $_SESSION['fullname'] ?? 'Student';

// --- DATABASE LOGIC FOR AUTO-UPDATING STATS ---

// 1. Fetch Total Events
$total_ev_query = "SELECT COUNT(*) as total FROM events";
$total_ev_res = mysqli_query($conn, $total_ev_query);
$total_events = mysqli_fetch_assoc($total_ev_res)['total'];

// 2. Fetch Registered Events for this student
$reg_query = "SELECT COUNT(*) as total FROM registrations WHERE student_id = '$user_id'";
$reg_res = mysqli_query($conn, $reg_query);
$registered_count = mysqli_fetch_assoc($reg_res)['total'];

// 3. Fetch Attended
$att_query = "SELECT COUNT(*) as total
FROM registrations
WHERE student_id = '$user_id'
AND status = 'Attended'";

$att_res = mysqli_query($conn, $att_query);
$attended_count = mysqli_fetch_assoc($att_res)['total'];
$att_res = mysqli_query($conn, $att_query);
$attended_count = mysqli_fetch_assoc($att_res)['total'];

// 4. Fetch Pending Feedback
$pen_query = "SELECT COUNT(*) as total
FROM registrations
WHERE student_id = '$user_id'
AND status = 'Attended'";

$pen_res = mysqli_query($conn, $pen_query);
$pending_count = mysqli_fetch_assoc($pen_res)['total'];
$pen_res = mysqli_query($conn, $pen_query);
$pending_count = mysqli_fetch_assoc($pen_res)['total'];

// --- FETCH UPCOMING EVENTS FOR THE TABLE ---
// We only select title, date, and id now
$events_table_query = "SELECT id, title, event_date FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC LIMIT 5";
$events_table_result = mysqli_query($conn, $events_table_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | College Events</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-heading p-4 fw-bold border-bottom">
            <i class="fas fa-graduation-cap me-2 text-success"></i>College Events
        </div>
        <nav class="nav flex-column mt-3">
            <a class="nav-link active" href="student_dashboard.php">
                <i class="fa-solid fa-table-cells-large"></i> <span>Dashboard</span>
            </a>
            <a class="nav-link" href="events.php">
                <i class="fa-solid fa-calendar-days"></i> <span>Available Events</span>
            </a>
            <a class="nav-link" href="my_registrations.php">
                <i class="fa-solid fa-list-check"></i> <span>My Registrations</span>
            </a>
            <a class="nav-link logout-link" href="logout.php">
                <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
            </a>
        </nav>    
    </aside>

    <main class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-5">
            <div class="header-title">        
                <h2 class="welcome-text fw-bold">
                    Welcome back, <span class="name-highlight"><?php echo htmlspecialchars($fullname); ?></span>
                </h2>
            </div>

            <div class="user-meta d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <div class="fw-bold role-text">Student</div>
                    <div class="text-muted status-online">Online</div>
                </div>
                
                <div class="profile-circle shadow-sm">
                    <?php 
                        $words = explode(" ", $fullname);
                        $initials = strtoupper($words[0][0] . (isset($words[1]) ? $words[1][0] : ""));
                        echo $initials;
                    ?>
                </div>
            </div>
        </header>

        <section class="row g-4 mb-5">
            <div class="col-md-3 col-sm-6"> 
                <div class="stat-card border-total h-100">
                    <div class="stat-number"><?php echo $total_events; ?></div>
                    <div class="stat-label">Total Events</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card border-registered h-100">
                    <div class="stat-number"><?php echo $registered_count; ?></div>
                    <div class="stat-label">Registered</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card border-upcoming h-100">
                    <div class="stat-number"><?php echo $attended_count; ?></div>
                    <div class="stat-label">Attended</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card border-pending h-100">
                    <div class="stat-number"><?php echo $pending_count; ?></div>
                    <div class="stat-label">Pending Feedback</div>
                </div>
            </div>
        </section>

        <section class="table-container shadow-sm bg-white rounded-4 overflow-hidden">
            <div class="table-header p-4 border-bottom">
                <h5 class="fw-bold m-0 text-dark">Upcoming Events for You</h5>
            </div>
            <div class="table-responsive">
                <table class="table align-middle m-0">
                    <thead class="table-light">
                        <tr style="font-size: 0.85rem; color: #666;">
                            <th class="ps-4">EVENT NAME</th>
                            <th>DATE</th>
                            <th class="text-end pe-4">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysqli_num_rows($events_table_result) > 0): ?>
                            <?php while($event = mysqli_fetch_assoc($events_table_result)): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?php echo htmlspecialchars($event['title']); ?></div>
                                </td>
                                <td class="text-muted"><?php echo $event['event_date']; ?></td>
                                <td class="text-end pe-4">
                                    <a href="register_events.php?id=<?php echo $event['id']; ?>" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold" style="font-size: 0.75rem;">
                                        REGISTER NOW
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="p-5 text-center text-muted">No upcoming events found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>