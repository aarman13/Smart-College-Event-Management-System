<?php
session_start();
include 'db.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$fullname = $_SESSION['fullname'];

$query = "SELECT 
            e.id AS event_id, 
            e.title AS event_title, 
            e.event_date, 
            u.fullname AS student_name, 
            u.student_id AS student_official_id
          FROM events e
          LEFT JOIN registrations r ON e.id = r.event_id
          LEFT JOIN users u ON r.student_id = u.id
          ORDER BY e.event_date DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event Registrations - Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

<div class="d-flex">

<!-- SIDEBAR -->
<div class="bg-white border-end" style="width:250px; min-height:100vh;">
    
    <div class="p-3 fw-bold border-bottom">
        <i class="fas fa-graduation-cap me-2 text-success"></i>
        College Events
    </div>

    <div class="list-group list-group-flush">

        <a href="admin_dashboard.php" class="list-group-item list-group-item-action border-0 py-3">
            <i class="fas fa-th-large me-2"></i> Dashboard
        </a>

        <a href="all_events.php" class="list-group-item list-group-item-action border-0 py-3 active">
            <i class="fas fa-calendar-alt me-2"></i> All Events
        </a>

        <a href="logout.php" class="list-group-item list-group-item-action border-0 py-3 text-success fw-semibold">
    <i class="fas fa-sign-out-alt me-2"></i> Logout
</a>

    </div>
</div>


<!-- PAGE CONTENT -->
<div class="w-100">

<div class="px-4 py-3 bg-white border-bottom d-flex justify-content-between align-items-center">
    <div>
        <small class="text-muted fw-bold text-uppercase">Management</small>
        <h3 class="fw-bold m-0">Event Registrations</h3>
    </div>

    <div class="d-flex align-items-center">
        <div class="text-end me-3">
            <p class="mb-0 fw-bold"><?php echo htmlspecialchars($fullname); ?></p>
            <small class="text-muted">Administrator</small>
        </div>

        <div style="width:40px;height:40px;background:#6c8672;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:bold;">
            <?php echo substr($fullname, 0, 1); ?>
        </div>
    </div>
</div>


<div class="p-4">
<div class="card border-0 shadow-sm rounded-4">
<div class="card-body p-4">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold m-0">Event Participation List</h5>
</div>

<div class="table-responsive">
<table class="table align-middle">

<thead class="table-light">
<tr style="font-size: 0.85rem; color: #666;">
<th>EVENT NAME</th>
<th>EVENT DATE</th>
<th>REGISTERED STUDENT</th>
<th>STUDENT ID</th>
<th class="text-end">ACTIONS</th>
</tr>
</thead>

<tbody>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>

<td class="fw-bold text-dark">
<?php echo htmlspecialchars($row['event_title']); ?>
</td>

<td class="text-muted">
<?php echo $row['event_date']; ?>
</td>

<td>
<?php if($row['student_name']): ?>
<span class="badge bg-light text-dark border fw-medium px-3 py-2">
<i class="fas fa-user me-2 text-success"></i>
<?php echo htmlspecialchars($row['student_name']); ?>
</span>
<?php else: ?>
<span class="text-muted small">No registrations yet</span>
<?php endif; ?>
</td>

<td>
<code class="text-muted">
<?php echo $row['student_official_id'] ? $row['student_official_id'] : 'N/A'; ?>
</code>
</td>

<td class="text-end">
<a href="update_event.php?id=<?php echo $row['event_id']; ?>" 
   class="btn btn-link text-primary">
<i class="fas fa-edit"></i>
</a>

<a href="delete_event.php?id=<?php echo $row['event_id']; ?>" 
   class="btn btn-link text-danger"
   onclick="return confirm('Delete this record?')">
<i class="fas fa-trash"></i>
</a>
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
</div>

</body>
</html>