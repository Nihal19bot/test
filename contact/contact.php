<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert the form data into the contacts table
    $sql = "INSERT INTO contacts (name, email, mobile, subject, message) VALUES ('$name', '$email', '$mobile', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the confirmation page
        header("Location: conformation.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
