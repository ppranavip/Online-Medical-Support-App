<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['uname'])) {
    header("Location: login.php");
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

// Initialize variables with default values
$fullName = $email = $medicalHistory = $preferences = $profilePicture = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fullName = $row["uname"];
    $email = $row["email"];
    $medicalHistory = $row["medical_history"];
    $preferences = $row["preferences"];
    $profilePicture = $row["profile_picture"];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Existing head content -->
</head>
<body>


<div class="container mt-5">
    <h2>User Profile</h2>

    <!-- User Profile Details -->
    <form id="profileDetailsForm" enctype="multipart/form-data" action="saveprofile.php" method="POST">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : ''; ?>" readonly>
    </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label for="medicalHistory">Medical History</label>
            <textarea class="form-control" id="medicalHistory" name="medicalHistory" rows="3" ><?php echo $medicalHistory; ?></textarea>
        </div>
        <div class="form-group">
            <label for="preferences">Preferences</label>
            <input type="text" class="form-control" id="preferences" name="preferences" value="<?php echo $preferences; ?>">
        </div>
        <div class="form-group">
        <label for="image">Choose an image:</label>
        <input type="file" name="image" id="image" accept="image/*">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Profile</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
