<?php
// Include your database connection code here

// Example: Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db"; // Change this to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Example: Insert appointment into the database
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contactNumber = $_POST["contactNumber"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $department = $_POST["department"];
    $doctor = $_POST["doctor"];
    $payment = $_POST["payment"];

    $sql = "INSERT INTO appointments (name, email, contactNumber, date, time, department, doctor, paymentDone) 
            VALUES ('$name', '$email', '$contactNumber', '$date', '$time', '$department', '$doctor', '$payment')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the appointments.php page or show a success message
        header("Location: appointments.php?booked=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
