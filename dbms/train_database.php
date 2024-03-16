<?php


    // Database connection details
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "train_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $trainId = $_POST["train_id"];
        $trainName = $_POST["train_name"];
        $fromAddress = $_POST["starting_point"];
        $toAddress = $_POST["ending_point"];
        $departureDate = $_POST["date"];
        $departureTime = $_POST["time"];


    // Insert data into the database
    $sql = "INSERT INTO available_trains (train_id, train_name, starting_point, ending_point, date, time)
            VALUES ('$trainId', '$trainName', '$fromAddress', '$toAddress', '$departureDate', '$departureTime')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Train Data Saved Successfully</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the form page if accessed directly without form submission
    header("Location: train_form.html");
    exit();
}
?>
