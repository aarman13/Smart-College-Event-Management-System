<?php
session_start();
include 'db.php'; 

// 1. Security Check
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$fullname = $_SESSION['fullname'];

// 2. Fetch Dashboard Statistics
$res_students = mysqli_query($conn, "SELECT COUNT(*) as total FROM users WHERE role='student'");
$total_students = mysqli_fetch_assoc($res_students)['total'];

$res_events = mysqli_query($conn, "SELECT COUNT(*) as total FROM events");
$total_events = mysqli_fetch_assoc($res_events)['total'];

$res_reg = mysqli_query($conn, "SELECT COUNT(*) as total FROM registrations");
$total_registrations = $res_reg ? mysqli_fetch_assoc($res_reg)['total'] : 0;

$res_app = mysqli_query($conn, "SELECT COUNT(*) as total FROM registrations WHERE status='approved'");
$approved_registrations = $res_app ? mysqli_fetch_assoc($res_app)['total'] : 0;

$res_vol = mysqli_query($conn, "SELECT COUNT(*) as total FROM volunteers");
$total_volunteers = $res_vol ? mysqli_fetch_assoc($res_vol)['total'] : 0;

$vol_list_res = mysqli_query($conn, "SELECT * FROM volunteers WHERE status='pending' ORDER BY applied_at DESC LIMIT 5");
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
    <a href="admin_dashboard.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-th-large me-2"></i>Dashboard</a>
    <a href="all_events.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-calendar-alt me-2"></i>All Events</a>
    <a href="add_event.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-plus-circle me-2"></i>Create Event</a>
    <a href="students.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fa-solid fa-users"></i>All Students</a>
    <a href="manage_volunteers.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-users-cog me-2"></i>Volunteers</a>
    <a href="logout.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
</div>
    </div>

    <div id="page-content-wrapper" class="w-100">
        
        <?php if(isset($_GET['msg']) && $_GET['msg'] == 'updated'): ?>
            <div class="mx-4 mt-3 alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color: #d1dbd2; color: #405d4b;">
                <i class="fas fa-check-circle me-2"></i> <strong>Success!</strong> Volunteer status has been updated.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="px-4 py-3 bg-white border-bottom shadow-sm mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1 fw-semibold">Admin Dashboard</p>
                    <h2 class="fw-bold text-dark">Welcome back, <span style="color: #6c8672;"><?php echo $fullname; ?></span></h2>
                </div>

                <div class="d-flex align-items-center">
                    <div class="text-end me-3 d-none d-md-block">
                        <p class="mb-0 fw-bold"><?php echo $fullname; ?></p>
                        <small class="text-muted">Administrator</small>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=<?php echo $fullname; ?>&background=6c8672&color=fff" 
                         alt="Admin" class="rounded-circle shadow-sm" width="45" height="45">
                </div>
            </div>
        </div>

        <div class="container-fluid p-4">
            <div class="row g-4 mb-4"> 
                <div class="col-md-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm text-center border-top border-danger border-4">
                        <h2 class="fw-bold m-0"><?php echo $total_events; ?></h2>
                        <p class="text-muted small mb-0 fw-bold">TOTAL EVENTS</p>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm text-center border-top border-warning border-4">
                        <h2 class="fw-bold m-0"><?php echo $total_registrations; ?></h2> 
                        <p class="text-muted small mb-0 fw-bold">REGISTRATIONS</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm text-center border-top border-primary border-4">
                        <h2 class="fw-bold m-0"><?php echo $total_students; ?></h2> 
                        <p class="text-muted small mb-0 fw-bold">TOTAL STUDENTS</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card p-4 bg-white rounded-4 shadow-sm text-center border-top border-info border-4">
                        <h2 class="fw-bold m-0"><?php echo $total_volunteers; ?></h2> 
                        <p class="text-muted small mb-0 fw-bold">VOLUNTEERS</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card border-0 rounded-4 shadow-sm h-100"> 
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Recent Events Created</h5> 
                            <table class="table align-middle">
                                <thead>
                                    <tr><th>Event Name</th><th>Date</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $fetch_events = "SELECT * FROM events ORDER BY created_at DESC LIMIT 5";
                                    $event_result = mysqli_query($conn, $fetch_events);

                                    if ($event_result && mysqli_num_rows($event_result) > 0) {
                                        while($row = mysqli_fetch_assoc($event_result)) {
                                            echo "<tr>
                                                    <td>" . $row['title'] . "</td>
                                                    <td>" . $row['event_date'] . "</td>
                                                    <td><span class='badge bg-success'>Live</span></td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3' class='text-center'>No events created yet.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Platform Analytics</h5>
                            <div class="mb-3 d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Total Events: <strong><?php echo $total_events; ?></strong></span>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Total Students: <strong><?php echo $total_students; ?></strong></span>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Approved Reg: <strong><?php echo $approved_registrations; ?></strong></span>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span>Pending Reg: <strong><?php echo ($total_registrations - $approved_registrations); ?></strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-2">
                <div class="col-md-12">
                    <div class="card border-0 rounded-4 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">New Volunteer Requests (Pending)</h5>
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialty</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if ($vol_list_res && mysqli_num_rows($vol_list_res) > 0) {
                                            while($row = mysqli_fetch_assoc($vol_list_res)) { ?>
                                            <tr>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><span class="badge" style="background-color: #6c8672;"><?php echo $row['specialty']; ?></span></td>
                                                <td><span class="badge bg-warning text-dark"><?php echo $row['status']; ?></span></td>
                                                <td>
                                                    <a href="update_volunteer.php?id=<?php echo $row['id']; ?>&action=approve" class="btn btn-sm btn-outline-success rounded-pill"><i class="fas fa-check"></i></a>
                                                    <a href="update_volunteer.php?id=<?php echo $row['id']; ?>&action=reject" class="btn btn-sm btn-outline-danger rounded-pill"><i class="fas fa-times"></i></a>
                                                </td>
                                            </tr>
                                        <?php } 
                                        } else {
                                            echo "<tr><td colspan='4' class='text-center'>No pending volunteer applications.</td></tr>";
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> 
    </div> 
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>