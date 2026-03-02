<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$fullname = $_SESSION['fullname'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Smart College Event System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<div class="d-flex" id="wrapper">
    <div class="bg-white shadow-sm" id="sidebar-wrapper">
        <div class="sidebar-heading p-4 fw-bold border-bottom">
            <i class="fas fa-graduation-cap me-2 text-success"></i>College Events
        </div>
        <div class="list-group list-group-flush p-3">
            <a href="dashboard.php" class="list-group-item list-group-item-action active rounded-3 mb-2"><i class="fas fa-th-large me-2"></i>Dashboard</a>
            <a href="events.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-calendar-alt me-2"></i>All Events</a>
            <a href="#" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-plus-circle me-2"></i>Create Event</a>
            <a href="logout.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
        </div>
    </div>

    <div id="page-content-wrapper" class="w-100">
       <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 px-4 shadow-sm">
    <h4 class="m-0 fw-bold">Welcome, <?php echo $fullname; ?></h4>
    <div class="ms-auto d-flex align-items-center">
            </div>
        </nav>

        <div class="container-fluid p-4">
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm text-center border-top border-danger border-4">
                        <h2 class="fw-bold m-0">12</h2>
                        <p class="text-muted small mb-0 fw-bold">TOTAL EVENTS</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm text-center border-top border-warning border-4">
                        <h2 class="fw-bold m-0">850</h2>
                        <p class="text-muted small mb-0 fw-bold">REGISTRATIONS</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm text-center border-top border-primary border-4">
                        <h2 class="fw-bold m-0">5</h2>
                        <p class="text-muted small mb-0 fw-bold">UPCOMING</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm text-center border-top border-success border-4">
                        <h2 class="fw-bold m-0">3</h2>
                        <p class="text-muted small mb-0 fw-bold">PENDING</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Recent Registrations</h5>
                            <table class="table align-middle">
                                <thead><tr><th>Student</th><th>Event</th><th>Status</th></tr></thead>
                                <tbody>
                                    <tr><td>Alice Smith</td><td>Music Fest</td><td><span class="badge bg-success">Registered</span></td></tr>
                                    <tr><td>David Lee</td><td>AI Workshop</td><td><span class="badge bg-warning text-dark">Pending</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Task List</h5>
                            <div class="form-check mb-2"><input class="form-check-input" type="checkbox" checked><label class="form-check-label">Review Proposals</label></div>
                            <div class="form-check mb-2"><input class="form-check-input" type="checkbox"><label class="form-check-label">Send Emails</label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>