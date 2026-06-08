<?php
include 'db.php'; // Using your existing database connection

$status_message = "";

if (isset($_POST['send_message'])) {
    // Sanitize inputs to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contact_messages (name, email, subject, message) 
              VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $query)) {
        $status_message = "<div class='alert alert-success'>Message sent successfully!</div>";
    } else {
        $status_message = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Smart College Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-graduation-cap"></i> College Event Management System </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row g-5">
            <div class="col-lg-5">
                <h2 class="fw-bold mb-4">Get in Touch</h2>
                <p class="text-muted mb-5">Have questions about an upcoming event or need help with registration? Our team is here to help you.</p>
                
                <div class="d-flex mb-4">
                    <div class="icon-box me-3">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Email Us</h6>
                        <p class="text-muted">events@smartcollege.edu</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="icon-box me-3">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Call Us</h6>
                        <p class="text-muted">+91 6677889900</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="icon-box me-3">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">Location</h6>
                        <p class="text-muted">Art Block,101 room</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4 rounded-4">
                    <?php echo $status_message; ?>

<form action="contact.php" method="POST">
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Message</label>
        <textarea name="message" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" name="send_message" class="btn btn-success">Send Message</button>
</form>
                    <div id="formSuccess" class="alert alert-success mt-3 d-none">
                        Message sent successfully! We'll get back to you soon.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Show success message
            document.getElementById('formSuccess').classList.remove('d-none');
            this.reset(); // Clear form
        });
    </script>
</body>
</html>