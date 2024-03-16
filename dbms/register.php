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

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Example: Simple validation (insecure, for demonstration purposes)
    if ($password === $_POST['confirm_password']) {
        // Check if the username or email already exists
        $check_user_sql = "SELECT * FROM register WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($check_user_sql);

        if ($result && $result->num_rows > 0) {
            echo '<script>alert("Username or email already exists. Please choose a different one."); window.location.href = "register.html";</script>';
            exit;
        }

        // Insert user into the database
        $insert_user_sql = "INSERT INTO register (fullname, username, email, password) VALUES
                                           ('$fullname', '$username', '$email', '$hashed_password')";
        if ($conn->query($insert_user_sql) === TRUE) {
            echo '<script>alert("Registration successful! Redirecting to the login page..."); window.location.href = "login.html";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . $conn->error . '"); window.location.href = "register.html";</script>';
            exit;
        }
    } else {
        echo '<script>alert("Password and confirm password do not match. Please try again."); window.location.href = "register.html";</script>';
        exit;
    }
}

$conn->close();
?>
