<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusEvents - Smart System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-graduation-cap"></i> College Events
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


    <header id="home" class="hero d-flex align-items-center">
        <div class="container text-center text-md-start">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <p class="text-uppercase fw-bold mb-1">Make your college life.</p>
                    <h1 class="display-4 fw-bold">Welcome to College Event Management.</h1>
                    <div class="bg-white p-2 rounded shadow-sm mt-4 d-flex">
                        <input type="text" class="form-control border-0" placeholder="Search events...">
                        <button class="btn btn-primary ms-2 px-4">Search</button>
                    </div>
                    <div class="mt-3">
                        <a href="contact.html" class="btn btn-outline-light px-4 py-2">Contact Support</a>
                        </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n5">
        <div class="row bg-dark text-white rounded p-4 text-center shadow">
            <div class="col-md-4 border-end border-secondary">
                <h3>80+</h3>
                <p class="small mb-0 text-secondary">EVENTS HOSTED</p>
            </div>
            <div class="col-md-4 border-end border-secondary">
                <h3>5000+</h3>
                <p class="small mb-0 text-secondary">STUDENTS REGISTERED</p>
            </div>
            <div class="col-md-4">
                <h3>120+</h3>
                <p class="small mb-0 text-secondary">EVENT CATEGORIES</p>

            </div>
        </div>
    </div>

   <section id="events" class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Event Categories</h2>
        <a href="events.html" class="btn btn-link text-decoration-none fw-bold">
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
                        <div class="calendar-controls">
                            <span class="me-3 fw-bold">March 2026</span>
                            <button class="btn btn-sm btn-light" aria-label="Previous month">
    <i class="fas fa-chevron-left"></i>
</button>

<button class="btn btn-sm btn-light" aria-label="Next month">
    <i class="fas fa-chevron-right"></i>
</button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-borderless text-center calendar-table">
                            <thead>
                                <tr class="text-muted small">
                                    <th>MON</th><th>TUE</th><th>WED</th><th>THU</th><th>FRI</th><th>SAT</th><th>SUN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td><td>2</td><td class="calendar-event">3</td><td>4</td><td>5</td><td>6</td><td>7</td>
                                </tr>
                                <tr>
                                    <td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td>
                                </tr>
                                <tr>
                                    <td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td>
                                </tr>
                                <tr>
                                    <td>22</td><td>23</td><td>24</td><td class="calendar-event">25</td><td>26</td><td>27</td><td class="calendar-event">28</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-navy text-white d-flex justify-content-between align-items-center p-3">
                        <span class="fw-bold">Announcements</span>
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <h6 class="fw-bold mb-1">Campus Festival a Great Success!</h6>
                            <small class="text-muted">Mar 03, 2026</small>
                        </li>
                        <li class="list-group-item p-3">
                            <h6 class="fw-bold mb-1">Farewell 2026</h6>
                            <small class="text-muted">Mar 25, 2026</small>
                        </li>
                        <li class="list-group-item p-3">
                            <h6 class="fw-bold mb-1">Nail/Resin art expo.</h6>
                            <small class="text-muted">Mar 28, 2026</small>
                        </li>
                    </ul>
                    <div class="card-footer bg-white border-0 text-center">
    <button class="btn btn-link btn-sm text-decoration-none" data-bs-toggle="modal" data-bs-target="#announcementsModal">
        View All Updates
    </button>
</div>
                </div>
            </div>

        </div>
    </section>
      <section class="container-fluid py-5 bg-navy text-white mt-5">
    <div class="container">
        <div class="row align-items-center g-4">
            
            <div class="col-lg-8">
                <h5 class="fw-bold mb-4">Event Gallery</h5>
                <div class="row g-2">
                    <div class="col-3">
                         <img src="images/AIexpo_img5.png" 
                         class="img-fluid rounded-3 gallery-img" alt="AI Expo"
                        style="cursor: pointer;"
          onclick="openEventModal('AI Expo', 'images/AIexpo_img5.png', 'An exciting exhibition showcasing AI innovations.', 'March 20, 2026', 'Technical')">
        <p class="small mt-2 mb-0 text-white">AI Expo</p>
               </div>

             <div class="col-3">
    <img src="images/fest_img2.png" class="img-fluid rounded-3 gallery-img" alt="Concert"
     style="cursor: pointer;"
         onclick="openEventModal('Fiesta', 'images/fest_img2.png', 'A vibrant celebration filled with music, dance, performances, games, and live Concert.', 'March 05, 2026', 'Cultural')">
    <p class="small mt-2 mb-0">Fiesta</p>
</div>
<div class="col-3">
    <img src="images/sportsday_img3.png" class="img-fluid rounded-3 gallery-img" alt="Sports" style="cursor: pointer;"
         onclick="openEventModal('Sports Day', 'images/sportsday_img3.png', 'An energetic showcase of athletic talent, teamwork, and competitive spirit.', 'April 10, 2026', 'Sports')">
    <p class="small mt-2 mb-0">Sports Day</p>
</div>
                    <div class="col-3">
    <img src="images/freshers2026_img4.png" 
         class="img-fluid rounded-3 gallery-img" 
         alt="Cultural" 
         style="cursor: pointer;"
         onclick="openEventModal('Freshers 2026', 'images/freshers2026_img4.png', 'The official welcome party for the new batch of 2026! A night of music, dance, and networking.', 'September 15, 2026', 'Cultural')">
    <p class="small mt-2 mb-0">Freshers 2026</p>
</div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="community-box p-4 rounded-4 border border-secondary text-center text-lg-start">
                    <h5 class="fw-bold">Join Our Student Community!</h5>
                    <p class="small text-secondary">Sign up to stay updated on all the latest events and news!</p>
                    <div class="input-group mb-3 mt-3">
                        <input type="email" class="form-control bg-light border-0" placeholder="Enter Your Email">
                        <button class="btn btn-primary px-3" type="button">Subscribe</button>
                    </div>
                 <div class="social-icons pt-2">
    <a href="#" class="text-white me-3" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
    <a href="#" class="text-white me-3" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
    <a href="#" class="text-white me-3" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
</div>
        </div>
    </div>
</section>
<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row g-4">
            
            <div class="col-md-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-graduation-cap me-2"></i>Smart College Events</h5>
                <p class="small text-secondary">Your gateway to amazing campus events and activities. Stay connected and never miss out on what's happening at your college.</p>
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
                <button type="button" class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close">
</button>
            </div>
            <div class="modal-body text-center">
                <img id="eventImage" src="" class="img-fluid rounded mb-3" alt="">
                <p id="eventDescription"></p>
                <p><strong>Date:</strong> <span id="eventDate"></span></p>
                <p><strong>Category:</strong> <span id="eventCategory"></span></p>
                <button class="btn btn-primary rounded-pill px-4 mt-3" onclick="alert('Registration Successful!')">Register Now</button>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<div class="modal fade" id="announcementsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header bg-navy text-white">
                <h5 class="modal-title fw-bold">All Campus Updates</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <h6 class="fw-bold mb-1">Campus Festival a Great Success!</h6>
                        <small class="text-muted">Mar 15, 2026</small>
                    </li>
                    <li class="list-group-item p-3">
                        <h6 class="fw-bold mb-1">Farewell 2026</h6>
                        <small class="text-muted">Mar 25, 2026</small>
                    </li>
                    <li class="list-group-item p-3">
                        <h6 class="fw-bold mb-1">Nail/Resin art expo.</h6>
                        <small class="text-muted">Mar 28, 2026</small>
                    </li>
                    <li class="list-group-item p-3 bg-light">
                        <h6 class="fw-bold mb-1">Guest Lecture: The Future of AI</h6>
                        <small class="text-muted">Apr 02, 2026</small>
                    </li>
                    <li class="list-group-item p-3 bg-light">
                        <h6 class="fw-bold mb-1">Cultural fest</h6>
                        <small class="text-muted">Apr 05, 2026</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
