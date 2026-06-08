<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// FIXED: Using student_id based on your phpMyAdmin screenshot
$query = "SELECT r.id as reg_id, e.title, e.event_date, e.location, r.status 
          FROM registrations r 
          JOIN events e ON r.event_id = e.id 
          WHERE r.student_id = '$user_id' 
          ORDER BY e.event_date DESC";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Registrations | College Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 280px;
            --sage-green: #5b7c61;
            --light-sage: #f1f5f1;
            --bg-gray: #f8fafc;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-gray);
            margin: 0;
        }

        .sidebar {
    width: 280px; /* INCREASED from 260px for a 'bigger' feel */
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background: #ffffff;
    border-right: 1px solid #eeeeee;
    padding: 25px 0; /* More breathing room at the top */
    display: flex;
    flex-direction: column;
    z-index: 1000;
}
         .sidebar-brand {
    padding: 10px 30px 40px 30px;
    font-weight: 800;
    font-size: 1.4rem;
    color: #5b7c61;
    display: flex;
    align-items: center;
    gap: 12px;
}

       .sidebar-brand i{
    color: #5b7c61;
}

        .brand-text { display: flex; flex-direction: column; line-height: 1.1; }
        .brand-text span:first-child { font-size: 1.4rem; font-weight: 800; color: #333; }
        .brand-text span:last-child { font-size: 1.4rem; font-weight: 500; color: #777; }

        .nav-link {
            padding: 16px 25px;
            margin: 6px 20px;
            color: #6c757d;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 15px;
            border-radius: 12px;
            transition: all 0.3s;
            text-decoration: none;
        }

        .nav-link:hover { background: var(--light-sage); color: var(--sage-green); transform: translateX(5px); }
        .nav-link.active { background: var(--sage-green) !important; color: white !important; box-shadow: 0 6px 15px rgba(91, 124, 97, 0.3); }

        /* LOGOUT: GREEN AS REQUESTED */
        .logout-link {
            margin-top: auto;
            color: var(--sage-green) !important;
            font-weight: 700;
        }
        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 40px;
            width: calc(100% - var(--sidebar-width));
        }
        .welcome-text{
          color: #5b7c61;
}

        .accent-text{
           color: #5b7c61;
}
        /* --- TABLE STYLING --- */
        .reg-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            border: none;
        }

        .table thead th {
            background-color: var(--light-sage);
            color: var(--sage-green);
            padding: 15px;
            border: none;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table tbody td {
            padding: 20px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f1f1;
        }

        .status-pill {
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .status-confirmed { background: #e8f5e9; color: #2e7d32; }
        .status-pending { background: #fff3e0; color: #ef6c00; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
    <i class="fa-solid fa-graduation-cap"></i>
    <span class="brand-text">College Events</span>
</div>
        </div>
        <nav class="flex-grow-1">
            <a href="student_dashboard.php" class="nav-link"><i class="fa-solid fa-table-cells-large"></i> Dashboard</a>
            <a href="events.php" class="nav-link"><i class="fa-solid fa-calendar-days"></i> Available Events</a>
            <a href="my_registrations.php" class="nav-link active"><i class="fa-solid fa-list-check"></i> My Registrations</a>
            <a href="logout.php" class="nav-link logout-link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>

        </nav>
    </aside>

    <main class="main-content">
        <header class="mb-5">
            <h6 class="text-muted fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 2px;">Records</h6>
            <h1 class="fw-bold welcome-text">My <span class="accent-text">Registrations</span></h1>
        </header>

        <div class="reg-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysqli_num_rows($result) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td class="fw-bold text-dark"><?php echo $row['title']; ?></td>
                                <td><?php echo date('d M, Y', strtotime($row['event_date'])); ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td>
                                  <?php echo '
                                    <a href="withdraw_registration.php?id='.$row['reg_id'].'"class="btn btn-outline-danger btn-sm" onclick="return confirm(\'Are you sure you want to withdraw from this event?\')">
                                       Withdraw
                                     </a>';
                                   ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">You haven't registered for any events yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>