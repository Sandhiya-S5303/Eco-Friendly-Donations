<?php
// Database connection parameters
$servername = "localhost"; // Change if necessary
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (if any)
$dbname = "donations"; // Name of your MySQL database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$message = $_POST['message'];

// Prepare SQL statement
$sql = "INSERT INTO contacts (first_name, last_name, email, phone_number, message) 
        VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$message')";

if ($conn->query($sql) === TRUE) {
    // Redirect to success page
    header("Location: message-sent.html");
    exit(); // Ensure that script execution stops after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
