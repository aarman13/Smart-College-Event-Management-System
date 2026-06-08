<?php
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusEvents - Smart System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-graduation-cap"></i> College Event Management System
        </a>

        <!-- Toggler Button (for mobile) -->
        <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
               <li class="nav-item">
                    <a class="nav-link" href="#events">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="studentcouncil.php">Student Council</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a href="/fyp/login.php" class="btn btn-outline-primary me-2">Login</a>
                </li>
                <li class="nav-item">
                    <a href="/fyp/signup.php" class="btn btn-primary">Sign Up</a>
               </li>
            </ul>
        </div>

    </div>
</nav>


   <header id="home" class="hero-slider-section position-relative overflow-hidden">
    
    <div id="heroCarousel" class="carousel slide carousel-fade position-absolute w-100 h-100" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100">
                <div class="hero-slide-overlay" style="background-image: url('images/hero_img1.png');"></div>
            </div>
            <div class="carousel-item h-100">
                <div class="hero-slide-overlay" style="background-image: url('images/hero_img2.png');"></div>
            </div>
            <div class="carousel-item h-100">
                <div class="hero-slide-overlay" style="background-image: url('images/hero_img3.png');"></div>
            </div>
        </div>
    </div>

   <div class="container position-relative h-100 d-flex flex-column justify-content-between z-index-10 py-4 text-center">
    
    <div class="mt-2 invisible">
        &nbsp;
    </div>

    <div class="mb-4">
        <p class="lead text-white opacity-90 mb-4 mx-auto fw-bold" style="max-width: 700px; text-shadow: 2px 2px 10px rgba(0,0,0,1);">
            Streaming College Traditions, from annual fashion shows to cultural milestones.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="contact.php" class="btn btn-primary px-4 py-2 rounded-pill shadow">Contact Support</a>
            <a href="#events" class="btn btn-outline-light px-4 py-2 rounded-pill">Browse Events</a>
        </div>
    </div>

</div>
</header>
     
   <section id="events" class="container my-5">  
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Event Categories</h2>
        <a href="events.php" class="btn btn-link text-decoration-none fw-bold">
    View All <i class="fas fa-chevron-right small ms-1"></i>
</a>
    </div>

    <div class="row g-4">
        <div class="col-md-4 col-6">
            <div class="category-box text-center p-4 shadow-sm border rounded-4 bg-white h-100">
                <i class="fas fa-chalkboard-teacher fa-3x mb-3 text-info"></i>
                <h5 class="fw-bold">Workshops</h5>
            </div>
        </div>

        <div class="col-md-4 col-6">
            <div class="category-box text-center p-4 shadow-sm border rounded-4 bg-white h-100">
                <i class="fas fa-theater-masks fa-3x mb-3 text-info"></i>
                <h5 class="fw-bold">Event Culture</h5>
            </div>
        </div>

        <div class="col-md-4 col-6">
            <div class="category-box text-center p-4 shadow-sm border rounded-4 bg-white h-100">
                <i class="fas fa-football-ball fa-3x mb-3 text-info"></i>
                <h5 class="fw-bold">Sports Clubs</h5>
            </div>
        </div>

        <div class="col-md-4 col-6">
            <div class="category-box text-center p-4 shadow-sm border rounded-4 bg-white h-100">
                <i class="fas fa-code fa-3x mb-3 text-info"></i>
                <h5 class="fw-bold">Technical</h5>
            </div>
        </div>

        <div class="col-md-4 col-6">
            <div class="category-box text-center p-4 shadow-sm border rounded-4 bg-white h-100">
                <i class="fas fa-th fa-3x mb-3 text-info"></i>
                <h5 class="fw-bold">All Events</h5>
            </div>
        </div>
    </div>
</section>
        <section class="container my-5">
    <div class="row g-4">
        
       <div class="col-lg-8">
    <div class="card border-0 shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Upcoming Events</h4>
            <div id="calendar-header-info" class="fw-bold" style="color: #6c8672;"></div>
        </div>
        
        <div id="calendar"></div>
    </div>
</div>

     <div class="col-lg-4">
    <div class="card border-0 shadow-sm h-100">
        <div class="card-header text-white d-flex justify-content-between align-items-center p-3" style="background-color: #6c8672;">
            <span class="fw-bold">Announcements</span>
            <i class="fas fa-bullhorn"></i>
        </div>
        <ul class="list-group list-group-flush">
            <?php
            $announce_query = "SELECT title, event_date FROM events ORDER BY created_at DESC LIMIT 3";
            $announce_res = mysqli_query($conn, $announce_query);

            if (mysqli_num_rows($announce_res) > 0) {
                while($row = mysqli_fetch_assoc($announce_res)) { ?>
                    <li class="list-group-item p-3">
                        <h6 class="fw-bold mb-1"><?php echo $row['title']; ?></h6>
                        <small class="text-muted"><?php echo date('M d, Y', strtotime($row['event_date'])); ?></small>
                    </li>
                <?php }
            } else {
                echo "<li class='list-group-item p-3'>No updates available.</li>";
            } ?>
        </ul>
         <button class="btn btn-link btn-sm text-decoration-none" style="color:#6c8672;" data-bs-toggle="modal" data-bs-target="#announcementModal">
                                     View All Updates
         </button>
    </div>
</div>
<div class="modal fade"
id="announcementModal"
tabindex="-1">

<div class="modal-dialog modal-lg">

<div class="modal-content border-0 shadow">

<div class="modal-header text-white" style="background-color: #6c8672;">

<h5 class="modal-title">
All Announcements
</h5>

<button type="button"
class="btn-close"
data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body p-0">

<?php

$query="SELECT title,event_date
FROM events
ORDER BY created_at DESC";

$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="list-group-item p-3 border-bottom">

<h6 class="fw-bold mb-1 text-dark">

<?php echo $row['title']; ?>

</h6>

<small class="text-muted">

<?php
echo date(
'M d, Y',
strtotime(
$row['event_date']
));
?>

</small>

</div>

<?php } ?>

</div>

</div>

</div>

</div>

    </div>
</section>
      <section class="container-fluid py-5 bg-navy text-white mt-5">
<div class="container">
<div class="row align-items-center g-4">
<div class="col-md-8">
<div class="gallery-header">
        <h2 class="gallery-title">Event Gallery</h2>
        <a href="gallery.php" class="gallery-btn">
            View All Gallery <i class="fa fa-arrow-right"></i>
        </a>
    </div>

<div class="row g-3 align-items-stretch">
<div class="col-md-3 col-6">
<img src="images/aiexpo_img5.png" class="img-fluid rounded shadow-sm gallery-img" style="cursor:pointer"
onclick="openEventModal('AI Expo','images/aiexpo_img5.png','An exciting exhibition showcasing AI innovations.','March 11, 2026','Technical')">
<p class="small mt-2 mb-0">AI Expo</p>
</div>

<div class="col-md-3 col-6">
<img src="images/fest_img2.png" class="img-fluid rounded shadow-sm gallery-img" style="cursor:pointer"
onclick="openEventModal('Fiesta','images/fest_img2.png','A vibrant celebration filled with music and dance.','Feburary 08, 2026','Cultural')">
<p class="small mt-2 mb-0">Fiesta</p>
</div>

<div class="col-md-3 col-6">
<img src="images/sportsday_img3.png" class="img-fluid rounded shadow-sm gallery-img" style="cursor:pointer"
onclick="openEventModal('Sports Day','images/sportsday_img3.png','A day of athletic competition and teamwork.','April 10, 2025','Sports')">
<p class="small mt-2 mb-0">Sports Day</p>
</div>

<div class="col-md-3 col-6">
<img src="images/freshers_img4.png" class="img-fluid rounded shadow-sm gallery-img" style="cursor:pointer"
onclick="openEventModal('Freshers 2025','images/freshers_img4.png','Welcome party for the new batch of 2025.','September 16, 2025','Cultural')">
<p class="small mt-2 mb-0">Freshers 2025</p>
</div>
</div>
</div>
<div class="col-md-4">
<div style="background-color: rgba(255,255,255,0.1); padding:20px; border-radius:20px; border:1px solid rgba(255,255,255,0.2);">
<h3 style="font-size:22px;">Become a Volunteer ⭐</h3>

<p style="font-size:14px; opacity:0.8;">
Join the <strong>Student Council</strong> team! Help us with Registrations,
Technical Support, and Discipline.
</p>

<a href="volunteers.php" class="btn btn-primary">Apply Now</a>
</div>
</div>

</div>
</div>
</section>
<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row g-4">
            
            <div class="col-md-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-graduation-cap me-2"></i>Smart College Events</h5>
                <p class="small text-secondary">Your gateway to amazing campus events and activities. Stay connected and never miss out on what's happening at our college.</p>
            </div>

            <div class="col-md-4 px-md-5">
                <h6 class="fw-bold mb-3">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="index.php" class="text-secondary text-decoration-none footer-link">Home</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none footer-link">Events</a></li>
                    <li class="mb-2"><a href="contact.php" class="text-secondary text-decoration-none footer-link">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Contact</h6>
                <p class="small text-secondary mb-1">Email: events@smartcollege.edu</p>
                <p class="small text-secondary">Phone: +91 6677889900</p>
               <div class="social-icons pt-2">
    <a href="#" class="text-white me-3" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="#" class="text-white me-3" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
    <a href="#" class="text-white me-3" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
</div>
            </div>

        </div>

        <hr class="mt-4 border-secondary opacity-25">
        
        <div class="text-center mt-3">
            <p class="small text-secondary mb-0">&copy; 2026 Smart College Event Management System. All rights reserved.</p>
        </div>
    </div>
</footer>

<div class="modal fade" id="eventModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title" id="eventTitle">Event Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
aria-label="Close">
</button>
            </div>
            <div class="modal-body text-center">
                <img id="eventImage" src="" class="img-fluid rounded mb-3" alt="">
                <p id="eventDescription"></p>
                <p><strong>Date:</strong> <span id="eventDate"></span></p>
                <p><strong>Category:</strong> <span id="eventCategory"></span></p>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    // Check if the element exists in the console
    if (!calendarEl) {
        console.error("Error: Could not find the 'calendar' div!");
        return;
    }

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 350,
        contentHeight: 350,
        headerToolbar: {
            left: 'prev' ,
            center: 'title',
            right: 'next'
        },
        events: 'fetch_events.php',
        eventDisplay: 'block' // This is the important step for centering highlights
    });
    
    calendar.render();
    console.log("Calendar should be rendered now.");
});
</script>
</body>
</html>
