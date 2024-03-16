<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ticket";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $startStation = $_POST["start_station"];
    $destinationStation = $_POST["destination_station"];
    $trainId = $_POST["train_id"];
    $trainName = $_POST["train_name"];
    $seatNumber = $_POST["is_booked"]; // Assuming you want to use the selected seat number
    $acNonAc = $_POST["ac_non_ac"];
    $bookingDate = $_POST["booking_date"];
    $passengerName = $_POST["passenger_name"];
    $passengerMobile = $_POST["passenger_mobile_number"];
    $passengerEmail = $_POST["passenger_email"];
    $passengerAddress = $_POST["passenger_address"];

    // Insert data into the database
    $insertQuery = "INSERT INTO reserve_tickets (start_station, destination_station, train_id, train_name, seat_number, ac_non_ac, booking_date, passenger_name, passenger_mobile_number, passenger_email, passenger_address)
                    VALUES ('$startStation', '$destinationStation', '$trainId', '$trainName', '$seatNumber', '$acNonAc', '$bookingDate', '$passengerName', '$passengerMobile', '$passengerEmail', '$passengerAddress')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "<script>alert('Ticket booked successfully!');</script>";
    } else {
        echo "<script>alert('Error booking ticket: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
