<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "database"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $mobile = trim($_POST["mobile"]);
    $engineer = trim($_POST["engineer"]);
    $state = trim($_POST["state"]);
    $district = trim($_POST["district"]);
    $street = trim($_POST["street"]);
    $colony = trim($_POST["colony"]);
    $pincode = trim($_POST["pincode"]);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO engineer (name, email, mobile, engineer, state, district, street, colony, pincode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $email, $mobile, $engineer, $state, $district, $street, $colony, $pincode);

    // Execute the statement
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 500px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #1e90ff;
        }
        p {
            font-size: 1.1em;
            color: #333333;
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #1e90ff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #1c86ee;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Confirmation</h2>
        <p>Thank you for joining our service! We will get in touch with you soon.</p>
        <a href="../index.html" class="back-button">Back to Home</a>
    </div>
</body>
</html>
