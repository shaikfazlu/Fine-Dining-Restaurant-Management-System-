<?php
// Database connection (update with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$room = $_POST['room'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$guests = $_POST['guests'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO booking (name, email, phone_number, roomtype, checkin, checkout, guests) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssi", $name, $email, $phone, $room, $checkin, $checkout, $guests);

// Execute the statement
if ($stmt->execute()) {
    header('Location:paying.html');
    exit;
    // Redirect to confirmation.html after successful booking
} else {
    echo "Error: " . $stmt->error;
}
$conn->close();
?>
