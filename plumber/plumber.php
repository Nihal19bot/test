<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bookings (name, email, mobile, type, service, date, timeslot, state, district, street, colony, pincode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $name, $email, $mobile, $type, $service, $date, $timeslot, $state, $district, $street, $colony, $pincode);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$type = $_POST['type'];
$service = $_POST['service']; // Updated to match 'service' field
$date = $_POST['date'];
$timeslot = $_POST['timeslot'];
$state = $_POST['state'];
$district = $_POST['district'];
$street = $_POST['street'];
$colony = $_POST['colony'];
$pincode = $_POST['pincode'];

if ($stmt->execute()) {
    // Send email
    $to = $email;
    $subject = "Booking Confirmation";
    $message = "Dear $name,\n\nYour booking has been confirmed.\n\nDetails:\nService: $service\nDate: $date\nTimeslot: $timeslot\n\nThank you.";
    $headers = "From: no-reply@yourdomain.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully to $email.";
    } else {
        echo "Failed to send email to $email.";
    }

    // Generate OTP
    $otp = rand(100000, 999999);

    // Send OTP via SMS (using a fictional SMS API for illustration)
    $sms_api_url = "https://api.yoursmsgateway.com/send";
    $sms_api_key = "your_sms_api_key";
    $sms_message = "Your OTP is $otp.";
    $sms_url = "$sms_api_url?apikey=$sms_api_key&number=$mobile&message=" . urlencode($sms_message);

    $sms_response = file_get_contents($sms_url);
    $sms_result = json_decode($sms_response, true);

    if ($sms_result['status'] == "success") {
        echo "OTP sent successfully to $mobile.";
    } else {
        echo "Failed to send OTP to $mobile.";
    }

    header("Location: done.html"); // Redirect to a success page
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
