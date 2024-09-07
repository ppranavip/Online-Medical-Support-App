<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Home</title>

    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 56px;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-item:hover .dropdown-menu {
            display: block;
        }

        .carousel-item {
            height: 450px;
        }

        .container {
            max-width: 100%;
            padding: 2rem;
            padding-top: 0;
        }
        .carousel-caption {
            color: white;
            padding: 2px;
            border-radius: 5px;
        }
        img{
            height: 100vh;
        }
        .category-card {
            width: 150px;
            height: 150px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .p-3{
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
        }
        .card{
            background-color: #007bff;
            color: #f8f9fa;
        }
        footer{
            background-color: #007bff;
            color: white;
            margin: 0;
        }
        #cont{
            margin: 0;
        }
        li a{
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="#">Your Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="landing.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="diagnosis.php">Diagnosis</a>
                    <a class="dropdown-item" href="appointments.php">Book an appointment</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/slide1.jpg" class="d-block w-100" alt="Slide 1" style="background: linear-gradient(rgba(1, 9, 1, 0.6), rgba(1, 9, 20, 0.3));">
                <div class="carousel-caption">
                    <h3>Title 1</h3>
                    <p>Caption for Slide 1.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/slide2.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h3>Title 2</h3>
                    <p>Caption for Slide 2.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/slide3.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h3>Title 3</h3>
                    <p>Caption for Slide 3.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Carousel -->

    <div class="row" style="margin:2rem;">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Book an appointment easily</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="appointments.php" class="btn btn-primary" style = "background-color:#f8f9fa; color:black">Try it</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Try our Quick diagnosis</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="http://127.0.0.1:5000/" class="btn btn-primary" style = "background-color:#f8f9fa; color:black">Try it</a>
            </div>
            </div>
        </div>
    </div>

    <!-- Category Cards -->
    <div class="container text-center">
        <h2 style="margin: 2rem;">Our Services</h2>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <div class="col">
            <div class="p-3"><a href="appointments.php" style="color:black;" id="link">Book appointment</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="our_hospitals.php" style="color:black;" id="link">Our Network</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="buy_medicine.php" style="color:black;" id="link">Buy Medicine</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="displayprofile.php" style="color:black;" id="link">View Profile</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="doctors_dept.php" style="color:black;" id="link">Find a doctor</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="landing.php" style="color:black;" id="link">About Us</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="contact.php" style="color:black;" id="link">Contact us</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="http://127.0.0.1:5000/" style="color:black;" id="link">Quick Diagnosis</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="disease_info.php" style="color:black;" id="link">Diseases Information</a></div>
            </div>
            <div class="col">
            <div class="p-3"><a href="testimonials.php" style="color:black;" id="link">Patient Testimonials</a></div>
            </div>
        </div>
    </div>
</div>


<footer class="footer py-3">
    <div class="container">
        <div class="row justify-content-center" style="margin:auto;">
            <div class="col-md-4">
                <h5>Services</h5>
                <ul class="list-unstyled">
                    <li><a href="appointments.php">Book appointment</a></li>
                    <li><a href="our_hospitals.php">Our Network</a></li>
                    <li><a href="buy_medicine.php">Buy Medicine</a></li>
                    <li><a href="buy_medicine.php">Check Disease Info</a></li>
                    
                    <!-- Add more service links as needed -->
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="landing.php">About Us</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                    <!-- Add more quick links as needed -->
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Legal</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <!-- Add more legal links as needed -->
                </ul>
            </div>
        </div>
    </div>
    <!-- Divider -->
    <div style="background-color: white; height:1px; margin:1rem 3rem;"></div>
    <!-- Copyright -->
    <p class="text-center" style="margin:0;">&copy; <?php echo date("Y"); ?> Pabbisetty Pranavi. All rights reserved.</p>
</footer>




    <!-- End Category Cards -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
