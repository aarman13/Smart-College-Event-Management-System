<?php
session_start(); 
include 'db.php'; 

$error = "";

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row['password'])) {

        $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['fullname'] = $row['fullname'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password. Please try again.";
        }
    } else {
        $error = "No account found with that email.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Event Management</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="login-page">

<div class="login-card">
    <div class="icon-circle">🎓</div>
    <h2 class="fw-bold">Welcome Back</h2>
    <p class="text-muted mb-4">Sign in to manage your events</p>

<?php if($error != ""): ?>
    <p style="color: #721c24; background: #f8d7da; padding: 10px; border-radius: 5px;"><?php echo $error; ?></p>
<?php endif; ?>

<form action="login.php" method="POST">
    <div class="mb-3 text-start">
        <label class="form-label small fw-bold">Email Address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
    </div>
    
    <div class="mb-3 text-start">
        <label class="form-label small fw-bold">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
    </div>
    
    <button type="submit" name="login_btn" class="btn-signin w-100" style="background-color: #6c8672; color: white; border: none; padding: 10px; border-radius: 5px;">Sign In</button>
</form>

<div class="links mt-3">
    Don't have an account? <a href="signup.php">Sign up</a>
     <a href="index.php" class="back-home">← Back to Home</a>
</div>

</body>
</html>