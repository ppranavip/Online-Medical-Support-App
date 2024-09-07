<?php

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

// Enable CORS (adjust the origin to match your client's domain)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Collect data from the form (sanitize user inputs)
$postData = json_decode(file_get_contents("php://input"), true);

$productName = mysqli_real_escape_string($conn, $postData['productName']);
$quantity = (int)$postData['quantity'];
$totalPrice = (float)$postData['totalPrice'];
$productPrice = (float)$postData['productPrice'];
$deliveryAddress = mysqli_real_escape_string($conn, $postData['deliveryAddress']);



// SQL query to insert values into the 'orders' table
// SQL query to insert values into the 'orders' table
$sql = "INSERT INTO orders (productName, quantity, totalPrice, productPrice, deliveryAddress) VALUES ('$productName', $quantity, {$postData['totalPrice']}, $productPrice, '$deliveryAddress')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Order submitted successfully"]);
} else {
    echo json_encode(["error" => "Error submitting order: " . $conn->error]);
}

// Close the database connection
$conn->close();

?>
