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
$uname = $_POST["fullName"];
$password = $_POST["password"];
$email = $_POST["email"];
$dob = $_POST["dob"];

// Check if username already exists in database
$sql = "SELECT uname FROM signup WHERE uname='$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: signup.php?error=1");
} else {
    $sql = "INSERT INTO signup (uname, email, password, dob) VALUES ('$uname', '$email', '$password', '$dob')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?signup=success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
