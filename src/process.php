<?php
// Database connection credentials
$host = "localhost";
$dbname = "your_database_name";
$username = "your_username";
$password = "your_password";

try {
    // Establish database connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted via POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data using $_POST array
        $username = $_POST['signupUsername'];
        $email = $_POST['signupEmail'];
        $password = $_POST['signupPassword'];

        // Hash the password for security (using bcrypt)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to insert user data into database
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        // Execute the prepared statement with user data
        if ($stmt->execute([$username, $email, $hashedPassword])) {
            // Registration successful
            echo "User registered successfully!";
            // You can redirect to a success page or perform other actions here
        } else {
            // Registration failed
            echo "Failed to register user.";
        }
    } else {
        // Redirect to sign-up page if accessed directly without POST request
        header("Location: index.html");
        exit();
    }
} catch (PDOException $e) {
    // Handle database connection or query errors
    die("Database error: " . $e->getMessage());
}
?>


