<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donations"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $donation_type = isset($_POST['donation_type']) ? $_POST['donation_type'] : '';
    $address = $_POST["address"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $pincode = $_POST["pincode"];

    // SQL query to insert data into the table
    $sql = "INSERT INTO donations (first_name, last_name, email, phone_number, donation_type, address, state, city, pincode)
    VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$donation_type', '$address', '$state', '$city', '$pincode')";

if ($conn->query($sql) === TRUE) {
    header("Location: donation-submit.html");
    exit; // Make sure to exit after the redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

// Close the database connection
$conn->close();
?>
