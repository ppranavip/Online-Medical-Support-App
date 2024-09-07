<?php
// get_doctors.php

// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$department = $_GET['department'];

// Fetch doctors based on the selected department
$sql = "SELECT doctor_id, doctor_name FROM doctors WHERE department = '$department'";
$result = $conn->query($sql);

$doctors = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
}

// Return the doctors as JSON
echo json_encode($doctors);

$conn->close();
?>
