<?php
session_start();
include 'db.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$fullname = $_SESSION['fullname'];

// Fetch ALL volunteers (No filter, so you see everyone)
$query = "SELECT * FROM volunteers ORDER BY applied_at DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Volunteers - Admin</title>
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
            <a href="manage_volunteers.php" class="list-group-item list-group-item-action active rounded-3 mb-2"><i class="fas fa-users-cog me-2"></i>Volunteers</a>
            <a href="logout.php" class="list-group-item list-group-item-action border-0 rounded-3 mb-2"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
        </div>
    </div>

    <div id="page-content-wrapper" class="w-100">
        <div class="px-4 py-3 bg-white border-bottom shadow-sm mb-4">
            <h4 class="fw-bold m-0">Volunteer Management</h4>
        </div>

        <div class="container-fluid p-4">
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-body p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Role/Specialty</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)) { 
                                // Logic for Badge Color
                                $badge_class = "bg-warning text-dark"; // Default Pending
                                if($row['status'] == 'approved') $badge_class = "bg-success";
                                if($row['status'] == 'rejected') $badge_class = "bg-danger";
                            ?>
                            <tr>
                                <td><strong><?php echo $row['fullname']; ?></strong></td>
                                <td><?php echo $row['roll_no']; ?></td>
                                <td><span class="badge" style="background-color: #6c8672;"><?php echo $row['specialty']; ?></span></td>
                                <td><span class="badge <?php echo $badge_class; ?>"><?php echo ucfirst($row['status']); ?></span></td>
                                <td>
                                    <a href="update_volunteer.php?id=<?php echo $row['id']; ?>&action=approve" class="btn btn-sm btn-outline-success"><i class="fas fa-check"></i></a>
                                    <a href="update_volunteer.php?id=<?php echo $row['id']; ?>&action=reject" class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>