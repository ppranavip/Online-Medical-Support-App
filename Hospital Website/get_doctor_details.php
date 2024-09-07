<?php
// Connect to your database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected department from the AJAX request
$selectedDepartment = $_GET['department'];

// Fetch doctor details based on the selected department
$sql = "SELECT * FROM doctors WHERE department = '$selectedDepartment'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display doctor details in cards
        echo "<div class='col-md-4 mb-3'>";
        echo "<div class='card'>";
        echo "<img src='images/" . $row['doctor_name'] . ".jpg' class='card-img-top doctor-photo' alt='" . $row['doctor_name'] . "'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row['doctor_name'] . "</h5>";
        echo "<p class='card-text'>Specialization: " . $row['specialization'] . "<br>Contact: " . $row['contact_number'] . "<br>Email: " . $row['email'] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    // If no doctors found for the selected department
    echo "<div class='col-12'><p>No doctors found for the selected department.</p></div>";
}

$conn->close();
?>
