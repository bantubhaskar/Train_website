<?php
// Database connection
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ticket";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example: Simple validation (insecure, for demonstration purposes)
    if (!empty($username) && !empty($password)) {
        // Retrieve user from the database
        $get_user_sql = "SELECT * FROM register WHERE username = '$username'";
        $result = $conn->query($get_user_sql);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                echo '<script>alert("Login successful! Redirecting to the dashboard..."); window.location.href = "interface.html";</script>';
                exit;
            } else {
                echo '<script>alert("Incorrect password. Please try again."); window.location.href = "login.html";</script>';
                exit;
            }
        } else {
            echo '<script>alert("User not found. Please register."); window.location.href = "register.html";</script>';
            exit;
        }
    } else {
        echo '<script>alert("Please enter both username and password."); window.location.href = "login.html";</script>';
        exit;
    }
}

$conn->close();
?>
