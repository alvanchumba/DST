<?php
// Establish connection to the database
$servername = "localhost"; // Change this to your database server name
$username = "alvan"; // Change this to your database username
$password = "@Akc15064"; // Change this to your database password
$dbname = "designthinking"; // Change this to your database name

// Create connection
$conn = new mysqli("localhost","alvan","@Akc15064","designthinking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login request
if(isset($_GET['action']) && $_GET['action'] == 'login') {
    // Retrieve username and password from GET parameters
    $username = $_GET['username'];
    $password = $_GET['password'];

    // SQL query to check if the username and password match in the database
    $sql = "SELECT * FROM userdetails WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If a row is returned, the user exists in the database and the credentials are correct
        echo "success";
    } else {
        // If no row is returned, the user does not exist or the credentials are incorrect
        echo "failure";
    }
}

// Handle signup request
if(isset($_GET['action']) && $_GET['action'] == 'signup') {
    // Retrieve signup form data from GET parameters
    $username = $_GET['username'];
    $password = $_GET['password'];

    // SQL query to insert new user into the database
    $sql = "INSERT INTO userdetails (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // If the user is successfully inserted into the database, return success
        echo "success";
    } else {
        // If an error occurs during insertion, return failure
        echo "failure";
    }
}

// Close the database connection
$conn->close();


