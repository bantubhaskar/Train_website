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
    // Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $trainReminderText = $_POST["trainReminder"];
    $reminderDate = $_POST["reminderDate"];
    $reminderTime = $_POST["reminderTime"];

    // Combine date and time into a single string
    $reminderDateTime = $reminderDate . " " . $reminderTime;

    // Insert data into the database ('train_reminders' with your actual table name)
    $sql = "INSERT INTO train_reminder (reminder_text, reminder_date)
            VALUES ('$trainReminderText', '$reminderDateTime')";

    if ($conn->query($sql) === TRUE) {
        echo "Reminder added successfully!";
    } else {
        echo "Error adding reminder: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
