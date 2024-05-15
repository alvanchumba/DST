<?php
// Database connection
$servername = "localhost";
$username = "chumba";
$password = "Landscape45";
$dbname = "designthinking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if user exists with the provided credentials
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        echo "success";
    } else {
        // Login failed
        echo "failed";
    }
}

// Signup action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert new user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Signup successful
        echo "success";
    } else {
        // Signup failed
        echo "failed";
    }
}

$conn->close();
?>






