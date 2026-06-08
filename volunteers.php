<?php
include 'db.php'; 

$msg = "";

if (isset($_POST['submit_volunteer'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
    $specialty = mysqli_real_escape_string($conn, $_POST['specialty']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);

    $sql = "INSERT INTO volunteers (fullname, roll_no, specialty, reason) 
            VALUES ('$fullname', '$roll_no', '$specialty', '$reason')";

    if (mysqli_query($conn, $sql)) {
        $msg = "Application submitted successfully! Our team will contact you.";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join the Team - Student Council</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

    <div class="application-card">
        <h1>Join the Team ⭐</h1>
        <p class="sub-text">Help us manage Discipline & Cybersecurity for College Events.</p>

        <?php if($msg != ""): ?>
            <div class="success-msg">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <form action="volunteers.php" method="POST">
            <label class="small fw-bold text-muted">Full Name</label>
            <input type="text" name="fullname" placeholder="Enter your name" required>
            
            <label class="small fw-bold text-muted">Student Roll No.</label>
            <input type="text" name="roll_no" placeholder="e.g. 2023CS101" required>
            
            <label class="small fw-bold text-muted">Specialty</label>
            <select name="specialty" required>
                <option value="">Choose your role...</option>
                <option value="Discipline">Discipline</option>
                <option value="Cybersecurity">Cybersecurity</option>
                <option value="Technical Support">Technical Support</option>
            </select>

            <label class="small fw-bold text-muted">Why should we pick you?</label>
            <textarea name="reason" placeholder="Experience in Student Council..." rows="3" required></textarea>

            <button type="submit" name="submit_volunteer">Submit Application</button>
        </form>
        
        <div class="text-center mt-3">
            <a href="index.php" style="color: #6c8672; text-decoration: none; font-size: 0.8rem;">← Return to Home</a>
        </div>
    </div>

</body>
</html>