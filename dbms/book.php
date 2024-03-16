<?php

// Database connection details
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "ticket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $startStation = $_POST["start_station"];
    $destinationStation = $_POST["destination_station"];
    $trainId = $_POST["train_id"];
    $trainName = $_POST["train_name"];
    $seatNumber = $_POST["seat_number"];
    $acNonAc = $_POST["ac_non_ac"];
    $bookingdate = $_POST["booking_date"];
    $passengerName = $_POST["passenger_name"];
    $passengerMobile = $_POST["passenger_mobile_number"];
    $passengerEmail = $_POST["passenger_email"];
    $passengerAddress = $_POST["passenger_address"];

    // Prepare and execute an SQL statement to update the reservation
    $sql = $conn->prepare("UPDATE reserve_tickets
        SET 
            start_station = start_station,
            destination_station = destination_station,
            train_id = train_id,
            train_name = train_name,
            seat_number = seat_number,
            ac_non_ac = ac_non_ac,
            booking_date = booking_date,
            passenger_name = passenger_name,
            passenger_mobile_number = passenger_mobile_number,
            passenger_email = passenger_email,
            passenger_address = passenger_address
        WHERE is_booked = seat_number");

    // Set $isBooked to the appropriate value (true/false) based on your logic
    $isBooked = 1; // Change this to your actual logic


    if ($sql->execute()) {
        echo "<script>alert('Ticket updated successfully!');</script>";

        // Select data from the table
        $selectSql = "SELECT train_ticket, seat_number, train_id, train_name, start_station, destination_station, ac_non_ac, booking_date, passenger_name, passenger_mobile_number, passenger_email 
            FROM reserve_tickets 
            ORDER BY train_ticket DESC LIMIT 1";

        $result = $conn->query($selectSql);

        if ($result->num_rows > 0) {
            // Output the ticket details in an HTML table
            echo "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Booked Tickets</title>
                    <style>
                        /* Your CSS styles */
                    </style>
                </head>
                <body>
                    <header>
                        <h1>Your Ticket</h1>
                    </header>
                    <main>";

            echo "<table>
                    <tr>
                        <th>Ticket No</th>
                        <th>Train ID</th>
                        <th>Start Station</th>
                        <th>Destination Station</th>
                        <th>Train Name</th>
                        <th>Seat Number</th>
                        <th>AC or Non-AC</th>
                        <th>Passenger Name</th>
                        <th>Passenger Mobile</th>
                        <th>Passenger Email</th>
                        <th>Booking Date</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['train_ticket']}</td>
                        <td>{$row['train_id']}</td>
                        <td>{$row['start_station']}</td>
                        <td>{$row['destination_station']}</td>
                        <td>{$row['train_name']}</td>
                        <td>{$row['seat_number']}</td>
                        <td>{$row['ac_non_ac']}</td>
                        <td>{$row['passenger_name']}</td>
                        <td>{$row['passenger_mobile_number']}</td>
                        <td>{$row['passenger_email']}</td>
                        <td>{$row['booking_date']}</td>
                    </tr>";
            }

            echo "</table>
                </main>
            </body>
            </html>";
        } else {
            echo "<p>No booked tickets found.</p>";
        }
    } else {
        echo "<script>alert('Error updating ticket: " . $conn->error . "');</script>";
    }

    // Close the database connection
    $conn->close();
}

?>
