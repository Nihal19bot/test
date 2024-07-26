<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyadmin";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO newbookings (name, email, mobile, service, date, timeslot, state, district, street, colony, pincode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $name, $email, $mobile, $service, $date, $timeslot, $state, $district, $street, $colony, $pincode);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$service = $_POST['service'];
$date = $_POST['date'];
$timeslot = $_POST['timeslot'];
$state = $_POST['state'];
$district = $_POST['district'];
$street = $_POST['street'];
$colony = $_POST['colony'];
$pincode = $_POST['pincode'];

if ($stmt->execute()) {
    echo "New record created successfully";
    header("Location: success.html"); // Redirect to a success page
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
