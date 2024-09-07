<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-GLhlTQ8iQ73ZuH2Bz02uMz9Pmk/8KPEsUJ94Qw1xlAz9M6st89muDgmjQ5t9t" crossorigin="anonymous">

    <title>Our Hospitals</title>
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
        img{
            height: 300px;
        }
        .hospital-card {
            background-color: white;
            margin-bottom: 20px; /* Add margin between cards */
        }
        h1{
            margin: 1rem;
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
        </ul>
    </div>
</nav>

<div class="container mt-2">
    <h1>Our Hospitals</h1>

    <div class="row">
        <!-- First Hospital Card -->
        <!-- First Hospital Card -->
    <div class="col-md-6">
        <div class="card hospital-card">
            <img src="images/Bangalore.jpg" class="card-img-top" alt="Hospital Image" id="hospitalImage1">
            <div class="card-body">
                <h4 class="card-title" id="hospitalName1">Bangalore Hospital</h4>
                <p class="card-text" id="hospitalAddress1"><h6>Address: </h6>123 Main Street, Cityville</p>
                <p class="card-text" id="emergencyNumber1"><h6>Emergency Number: </h6>123-456-7890</p>
                <!-- Learn More Button with Icon -->
                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent1" aria-expanded="false" aria-controls="learnMoreContent1">
                    Learn More <i class="fas fa-info-circle"></i>
                </button>
            </div>
        </div>
    </div>


        <!-- Second Hospital Card -->
        <div class="col-md-6">
            <div class="card hospital-card">
                <img src="images/Hyderabad.jpg" class="card-img-top" alt="Hospital Image" id="hospitalImage2">
                <div class="card-body">
                    <h4 class="card-title" id="hospitalName2">Hyderabad Hospital</h4>
                    <p class="card-text" id="hospitalAddress2"><h6>Address: </h6>456 Oak Avenue, Townsville</p>
                    <p class="card-text" id="emergencyNumber2"><h6>Emergency Number: </h6>987-654-3210</p>
                    <!-- Add more details as needed -->
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent1" aria-expanded="false" aria-controls="learnMoreContent1">
                    Learn More <i class="fas fa-info-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Third Hospital Card -->
        <div class="col-md-6">
            <div class="card hospital-card">
                <img src="images/Chennai.jpg" class="card-img-top" alt="Hospital Image" id="hospitalImage1">
                <div class="card-body">
                    <h4 class="card-title" id="hospitalName1">Chennai Hospital</h4>
                    <p class="card-text" id="hospitalAddress1"><h6>Address: </h6>789 Pine Road, Villagetown</p>
                    <p class="card-text" id="emergencyNumber1"><h6>Emergency Number: </h6>555-123-4567</p>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent1" aria-expanded="false" aria-controls="learnMoreContent1">
                    Learn More <i class="fas fa-info-circle"></i>
                </button>
                </div>
            </div>
        </div>

        <!-- Second Hospital Card -->
        <div class="col-md-6">
            <div class="card hospital-card">
                <img src="images/Mumbai.jpg" class="card-img-top" alt="Hospital Image" id="hospitalImage2">
                <div class="card-body">
                    <h4 class="card-title" id="hospitalName2">Mumbai Hospital</h4>
                    <p class="card-text" id="hospitalAddress2"><h6>Address: </h6>321 Cedar Lane, Hamletville</p>
                    <p class="card-text" id="emergencyNumber2"><h6>Emergency Number: </h6>777-888-9999</p>
                    <!-- Add more details as needed -->
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent1" aria-expanded="false" aria-controls="learnMoreContent1">
                    Learn More <i class="fas fa-info-circle"></i>
                </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Third Hospital Card -->
        <div class="col-md-6">
            <div class="card hospital-card">
                <img src="images/Delhi.jpg" class="card-img-top" alt="Hospital Image" id="hospitalImage1">
                <div class="card-body">
                    <h4 class="card-title" id="hospitalName1">Delhi Hospital</h4>
                    <p class="card-text" id="hospitalAddress1"><h6>Address: </h6>654 Birch Boulevard, Countryside</p>
                    <p class="card-text" id="emergencyNumber1"><h6>Emergency Number: </h6>111-222-3333</p>
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#learnMoreContent1" aria-expanded="false" aria-controls="learnMoreContent1">
                    Learn More <i class="fas fa-info-circle"></i>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
