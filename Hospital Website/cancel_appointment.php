<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $cancelName = $_POST["cancelName"];
    $cancelEmail = $_POST["cancelEmail"];
    $cancelContactNumber = $_POST["cancelContactNumber"];

    // Perform the deletion in the database
    $sql = "DELETE FROM appointments WHERE name = '$cancelName' AND email = '$cancelEmail' AND contactNumber = '$cancelContactNumber'";

    if ($conn->query($sql) === TRUE) {
        header("Location: appointments.php?cancelled=1");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
