<?php
// 1. Database Connection - Updated to your actual DB name
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_event_system"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Fetch Students - Updated to match your 'fullname' column in phpMyAdmin
$sql = "SELECT id, fullname, email, student_id FROM users WHERE role = 'student'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List | College Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <aside class="sidebar">
       <div class="p-3 fw-bold border-bottom" style="color:#4f6f52;">
    <i class="fas fa-graduation-cap me-2" style="color:#4f6f52;"></i>
    College Events
</div>
        <nav class="nav flex-column mt-3">
            <a class="nav-link" href="admin_dashboard.php">
                <i class="fa-solid fa-table-cells-large"></i> <span>Dashboard</span>
            </a>
            <a class="nav-link active" href="students.php">
                <i class="fa-solid fa-users"></i> <span>Students</span>
            </a>
            <a class="nav-link" href="all_events.php">
                <i class="fa-solid fa-calendar-days"></i> <span>Events Registered</span>
            </a>
            <a class="nav-link" href="logout.php">
                <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
            </a>
        </nav>
    </aside>

    <main class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-5">
            <div class="header-title">
                <h6 class="text-muted text-uppercase fw-bold mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">Management</h6>
                <h2 class="fw-bold m-0 text-dark">Student Directory</h2>
            </div>
            <div class="user-meta d-flex align-items-center gap-3">
                <div class="text-end">
                    <div class="fw-bold small">Admin</div>
                    <div class="text-muted small">Arman Chopra</div>
                </div>
                <div class="profile-circle shadow-sm">AC</div>
            </div>
        </header>

        <section class="table-container shadow-sm">
            <div class="table-header p-4 border-bottom d-flex justify-content-between">
                <h5 class="fw-bold m-0">Registered Students</h5>
                <button class="btn btn-sm btn-success px-3 rounded-pill" style="background-color: #4d6b53; border:none;">
                    <i class="fa-solid fa-plus me-1"></i> Add Student
                </button>
            </div>
            <div class="table-responsive">
                <table class="table align-middle m-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">STUDENT NAME</th>
                            <th>ID NUMBER</th>
                            <th>EMAIL</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-end pe-4">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                // Using 'fullname' to match your database column exactly
                                echo "<td class='ps-4 fw-bold text-dark'>" . htmlspecialchars($row["fullname"]) . "</td>";
                                echo "<td><span class='text-muted small'>" . htmlspecialchars($row["student_id"]) . "</span></td>";
                                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                                echo "<td class='text-center'><span class='badge bg-success opacity-75 rounded-pill px-3'>Active</span></td>";
                                echo "<td class='text-end pe-4'>
                                        <button class='btn btn-sm text-primary'><i class='fa-solid fa-pen-to-square'></i></button>
                                        <button class='btn btn-sm text-danger'><i class='fa-solid fa-trash'></i></button>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center p-4'>No students found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>