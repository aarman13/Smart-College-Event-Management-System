<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Gallery | College Event Management System</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<style>
        :root {
            --primary-green: #4e6e58;
            --dark-maroon: #800000;
            --light-gray: #f4f4f4;
            --text-dark: #333;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #fff;
            color: var(--text-dark);
        }

        /* Header / Navbar Styles */
        nav {
            background: #fff;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .logo { font-weight: 600; font-size: 1.2rem; color: var(--primary-green); text-decoration: none; }

       
        /* Optimized Gallery Hero with Background Image */
.gallery-hero {
    position: relative;
    width: 100%;
    height: 70vh;

    background: linear-gradient(rgba(10,20,15,0.6), rgba(10,20,15,0.6)),
                url("images/event gallery/eg_img1.png");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column; /* ✅ THIS FIX */
}

/* Ensure text pops against the image */
.gallery-hero h1 {
    font-size: 3.2rem;
    font-weight: 800;
    color: #ffffff;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.9);
    margin-bottom: 10px;
}

.gallery-hero p {
    font-size: 1.1rem;
    color: rgba(255,255,255,0.9);
    text-shadow: 1px 1px 5px rgba(0,0,0,0.8);
    margin-bottom: 25px;
}

        .search-container {
            margin-top: 25px;
            display: flex;
            justify-content: center;
        }

        .search-bar {
            width: 100%;
            max-width: 500px;
            padding: 12px 20px;
            border-radius: 30px;
            border: none;
            outline: none;
            font-size: 16px;
        }

        /* Grid Layout */
        .gallery-grid {
            max-width: 1200px;
            margin: 50px auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .gallery-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            transition: 0.3s;
        }

        .gallery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-color: var(--dark-maroon);
        }

        .img-holder {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .img-holder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.5s;
        }

        .gallery-card:hover .img-holder img {
            transform: scale(1.1);
        }

        .card-caption {
            padding: 15px;
            text-align: center;
            font-size: 15px;
            border-top: 1px solid var(--light-gray);
            min-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-count {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0,0,0,0.6);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        @media (max-width: 768px) {
            nav { padding: 20px; }
            .gallery-grid { grid-template-columns: 1fr; }
        }
</style>
</head>
<body>

    <nav>
        <a href="index.php" class="logo"><i class="fas fa-graduation-cap""></i> College Event Management System</a>
        <div class="nav-links">
            <a href="index.php" style="text-decoration:none; color:var(--text-dark);">Back to Home</a>
        </div>
    </nav>

   <div class="gallery-header">
    <div class="gallery-hero">
        <h1>Event Gallery</h1>
        <p>Glimpses of Traditions, Excellence, and Campus Milestones</p>
        
        <div class="search-container mt-3">
            <input type="text" id="gallerySearch" class="search-bar" placeholder="Filter events by name...">
        </div>
    </div>
</div>

    <div class="gallery-grid" id="galleryGrid">
        
        <div class="gallery-card">
    <div class="img-holder">

        <a href="images/event gallery/fest1 (1).png" data-lightbox="fiesta-album" data-title="Fiesta Fest 2026">
            <img src="images/event gallery/fest1 (1).png" alt="Fiesta Fest">
            <span class="image-count"><i class="far fa-images"></i> 5 Images</span>
        </a>

        <a href="images/event gallery/fest1 (2).png" data-lightbox="fiesta-album"></a>
        <a href="images/event gallery/fest1 (3).png" data-lightbox="fiesta-album"></a>
        <a href="images/event gallery/fest1 (4).png" data-lightbox="fiesta-album"></a>
        <a href="images/event gallery/fest1 (5).png" data-lightbox="fiesta-album"></a>
        

    </div>
    <div class="card-caption">
        Fiesta Fest 2026 – Celebrating Culture, Creativity and Joy
    </div>
</div>

       <div class="gallery-card"> 
    <div class="img-holder">

        <a href="images/event gallery/holi2 (1).png" data-lightbox="holi-album" data-title="Eco Friendly Holi Celebration">
            <img src="images/event gallery/holi2 (1).png" alt="Holi Celebration">
            <span class="image-count"><i class="far fa-images"></i> 4 Images</span>
        </a>

        <a href="images/event gallery/holi2 (2).png" data-lightbox="holi-album"></a>
        <a href="images/event gallery/holi2 (3).png" data-lightbox="holi-album"></a>
        <a href="images/event gallery/holi2 (4).png" data-lightbox="holi-album"></a>

    </div>

    <div class="card-caption">
        Eco-Friendly Holi Celebration – Promoting Colors of Joy and Sustainability
    </div>
</div>

        <div class="gallery-card">
    <div class="img-holder">

        <a href="images/event gallery/ai3 (1).jpeg" data-lightbox="ai-album" data-title="AI Expo - Robot ChiChi">
            <img src="images/event gallery/ai3 (1).jpeg" alt="AI Expo">
            <span class="image-count"><i class="far fa-images"></i> 6 Images</span>
        </a>

        <a href="images/event gallery/ai3 (2).jpeg" data-lightbox="ai-album"></a>
        <a href="images/event gallery/ai3 (3).jpeg" data-lightbox="ai-album"></a>
        <a href="images/event gallery/ai3 (4).jpeg" data-lightbox="ai-album"></a>
        <a href="images/event gallery/ai3 (5).jpeg" data-lightbox="ai-album"></a>
        <a href="images/event gallery/ai3 (6).jpeg" data-lightbox="ai-album"></a>

    </div>

    <div class="card-caption">
        AI Expo – Interactive Demonstration with Robot Dog ChiChi
    </div>
</div>
<div class="gallery-card">
    <div class="img-holder">
        <a href="images/event gallery/youth4(1).png" data-lightbox="youth-album" data-title="Youth Fest">
            <img src="images/event gallery/youth4(1).png" alt="Youth Fest">
            <span class="image-count"><i class="far fa-images"></i> 2 Images</span>
        </a>

        <a href="images/event gallery/youth4 (2).jpeg" data-lightbox="youth-album"></a>
    </div>

    <div class="card-caption">
        Youth Fest – Celebrating Talent, Tradition and Team Spirit
    </div>
</div>
       <div class="gallery-card">
    <div class="img-holder">
        <a href="images/event gallery/folk5(1).jpeg" data-lightbox="folk-album" data-title="Folk Art Exhibition">
            <img src="images/event gallery/folk5(1).jpeg" alt="Folk Art Exhibition">
            <span class="image-count"><i class="far fa-images"></i> 1 Image</span>
        </a>
    </div>

    <div class="card-caption">
        Folk Art Exhibition – Preserving Heritage and Celebrating Cultural Excellence
    </div>
</div>
        <div class="gallery-card">
    <div class="img-holder">
        <a href="images/event gallery/plasma6 (1).jpeg" data-lightbox="plasma-album" data-title="AI Matrix Plasma 2026">
            <img src="images/event gallery/plasma6 (1).jpeg" alt="AI Matrix Plasma 2026">
            <span class="image-count"><i class="far fa-images"></i> 4 Images</span>
        </a>

        <a href="images/event gallery/plasma6 (2).jpeg" data-lightbox="plasma-album"></a>
        <a href="images/event gallery/plasma6 (3).jpeg" data-lightbox="plasma-album"></a>
        <a href="images/event gallery/plasma6 (4).jpeg" data-lightbox="plasma-album"></a>

    </div>

    <div class="card-caption">
        AI Matrix – Plasma 2026 Inter-College IT Fest Celebrating Innovation and Technology
    </div>
</div>
       <div class="gallery-card">
    <div class="img-holder">
        <a href="images/event gallery/farewell8 (1).JPG" data-lightbox="farewell-album" data-title="Farewell 2025">
            <img src="images/event gallery/farewell8 (1).JPG" alt="Farewell 2025">
            <span class="image-count"><i class="far fa-images"></i> 3 Images</span>
        </a>

        <a href="images/event gallery/farewell8 (2).JPG" data-lightbox="farewell-album"></a>
        <a href="images/event gallery/farewell8 (3).JPG" data-lightbox="farewell-album"></a>
    </div>

    <div class="card-caption">
        Farewell 2025 – Celebrating Memories and Wishing Success for the Future
    </div>
</div>
    <div class="gallery-card">
    <div class="img-holder">
        <a href="images/event gallery/yoga7 (01).JPG" data-lightbox="yoga-album" data-title="International Yoga Day 2025">
            <img src="images/event gallery/yoga7 (01).JPG" alt="Yoga Day">
            <span class="image-count"><i class="far fa-images"></i> 3 Images</span>
        </a>
        <a href="images/event gallery/yoga7 (02).JPG" data-lightbox="yoga-album"></a>
        <a href="images/event gallery/yoga7 (03).JPG" data-lightbox="yoga-album"></a>
    </div>

    <div class="card-caption">
        International Yoga Day 2025 – Promoting Health, Harmony and Well-Being
    </div>
</div>
<div class="gallery-card">
    <div class="img-holder">
        <a href="images/event gallery/farewell 2026.jpeg" data-lightbox="yoga-album" data-title="Farewell 2026">
            <img src="images/event gallery/farewell 2026.jpeg" alt="Farewell 2026">
        </a>
       
    </div>

    <div class="card-caption">
        Farewell 2026
    </div>
</div>
</div>
        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <script>
        // Initialize Lightbox options
        lightbox.option({
            'resizeDuration': 300,
            'wrapAround': true,
            'alwaysShowNavOnTouchDevices': true
        });

        // Simple Search Filter Logic
        $(document).ready(function(){
            $("#gallerySearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#galleryGrid .gallery-card").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>