<?php

// Establish connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from form
$email = $_POST["email"];
$password = $_POST["password"];

// Check if the user exists with the provided email
$sql = "SELECT * FROM signup WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User found, verify the password
    $row = $result->fetch_assoc();
    $storedPassword = $row["password"];

    if ($password === $storedPassword) {
        // Start a session
        session_start();
        $_SESSION['email'] = $row['email'];
        $_SESSION['uname'] = $row['uname'];

        header("Location: home.php");
        exit();
    } else {
        header("Location: login.php?error=1");
    }
} else {
    header("Location: login.php?mistake=1");
}

$conn->close();
?>

