<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = $_SESSION['uname'];

// Retrieve user details from the patients table
$sql = "SELECT * FROM patients WHERE uname = '$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fullName = $uname; // Assuming you have a 'full_name' column
    $email = $row["email"]; // Assuming you have an 'email' column
    $medicalHistory = $row["medical_history"];
    $preferences = $row["preferences"];
    $profilePicture = $row["profile_picture"];
} else {
    // Handle the case where user details are not found
    $fullName = "N/A";
    $email = "N/A";
    $medicalHistory = "N/A";
    $preferences = "N/A";
    $profilePicture = "default.jpg"; // Assuming default image name
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile</title>
    <style>
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .profile-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        img{
            height: 250px;
            width: 250px;
        }
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

<div class="container mt-5">
    <h2>User Profile</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- User details -->
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" value="<?php echo $fullName; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="medicalHistory">Medical History</label>
                        <textarea class="form-control" id="medicalHistory" rows="3" disabled><?php echo $medicalHistory; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="preferences">Preferences</label>
                        <input type="text" class="form-control" id="preferences" value="<?php echo $preferences; ?>" disabled>
                    </div>
                    <!-- Add other details as needed -->
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <!-- Profile picture -->
                    <img src="images/patients/<?php echo $profilePicture; ?>" alt="Profile Picture" class="profile-image">
                </div>
                <!-- Add this button in the displayprofile.php file -->
                <div class="form-group" style="margin-left:1rem;">
                    <a href="userprofile.php?fullName=<?php echo urlencode($fullName); ?>&email=<?php echo urlencode($email); ?>&medicalHistory=<?php echo urlencode($medicalHistory); ?>&preferences=<?php echo urlencode($preferences); ?>" class="btn btn-primary">Edit Profile</a>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
