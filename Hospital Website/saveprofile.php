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
$email = $_POST['email'];
$medicalHistory = $_POST['medicalHistory'];
$preferences = $_POST['preferences'];

// Handle profile picture upload
$targetDir = "images/patients/";
$fileName = $_FILES["image"]["name"];
$targetFilePath = $targetDir . $fileName;

move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

// Check if the user exists in the database
$sqlCheck = "SELECT * FROM patients WHERE uname='$uname'";
$resultCheck = $conn->query($sqlCheck);

if ($resultCheck->num_rows > 0) {
    // User exists, update the details
    $sqlUpdate = "UPDATE patients 
                  SET email = '$email', medical_history = '$medicalHistory', preferences = '$preferences', profile_picture = '$fileName'
                  WHERE uname = '$uname'";

    if ($conn->query($sqlUpdate) === TRUE) {
        // Redirect to displayprofile.php after saving changes
        header("Location: displayprofile.php");
    } else {
        echo "Error: " . $sqlUpdate . "<br>" . $conn->error;
    }
} else {
    // User doesn't exist, insert the details
    $sqlInsert = "INSERT INTO patients (uname, email, medical_history, preferences, profile_picture) 
                  VALUES ('$uname', '$email', '$medicalHistory', '$preferences', '$fileName')";

    if ($conn->query($sqlInsert) === TRUE) {
        // Redirect to displayprofile.php after saving changes
        header("Location: displayprofile.php");
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}

$conn->close();
?>

