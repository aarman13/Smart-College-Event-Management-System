<?php
mysqli_report(MYSQLI_REPORT_OFF);
include 'db.php'; 

$message = ""; 
$message_type = "";

if (isset($_POST['signup_btn'])) {

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $password = $_POST['password'];


    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (fullname, email, password, student_id) VALUES ('$fullname', '$email', '$hashed_password', '$student_id')";

    if (mysqli_query($conn, $query)) {
    $message = "Account created successfully! You can now proceed to login.";
    $message_type = "success"; 
} else {
    $message = "Error: " . mysqli_error($conn);
    $message_type = "error";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Smart College Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-body">

    <div class="auth-card">
        <div class="icon-circle">
            <span>🎓</span>
        </div>
        <h2 class="fw-bold">Create Account</h2>
        <p class="text-muted mb-4">Join the college event community</p>
<?php if ($message != ""): ?>
    <div style="
        padding: 15px; 
        margin-bottom: 20px; 
        border-radius: 5px; 
        text-align: center;
        font-weight: bold;
        border: 1px solid <?php echo ($message_type == 'success') ? '#6c8672' : '#ff0000'; ?>;
        background-color: <?php echo ($message_type == 'success') ? '#d1dbd2' : '#f8d7da'; ?>;
        color: <?php echo ($message_type == 'success') ? '#405d4b' : '#721c24'; ?>;
    ">
        <?php echo $message; ?>
    </div>
<?php endif; ?>
       <form action="signup.php" method="POST">
            <div class="row g-3 mb-3">
                <div class="col-md-6 text-start">
                    <label class="form-label small fw-bold">First Name</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Fairy" required>
                </div>
                <div class="col-md-6 text-start">
                    <label class="form-label small fw-bold">Last Name</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Danny" required>
                </div>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label small fw-bold">Student ID / Roll No</label>
                <input type="text" name="student_id" class="form-control" placeholder="e.g. 45257" required>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label small fw-bold">College Email</label>
                <input type="email" name="email" class="form-control" placeholder="fairy@college.edu" required>
            </div>

            <div class="mb-4 text-start">
                <label class="form-label small fw-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Create a password" required>
            </div>
            
            <button type="submit" name="signup_btn" class="btn btn-signin">Create Account</button>
        </form>

        <div class="links mt-4">
            Already have an account? <a href="login.html" class="fw-bold">Sign In</a>
        </div>
        
        <a href="index.php" class="back-home mt-3">← Back to Home</a>
    </div>

</body>
</html>