<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Ticket Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(photo-1442570468985-f63ed5de9086.avif);
            background-size: cover;
            background-position: center;

            background-repeat: no-repeat;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .ticket-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        h2 {
            color: #333;
        }

        .result {
            margin-top: 20px;
        }

        .result p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <div class="ticket-details">
        <h2>Ticket Details</h2>

        <?php
            // Establish a connection to your MySQL database
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "ticket";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the form is submitted
            if (isset($_GET['ticket_number'])) {
                // Get the search term from the form
                $ticketNumber = $_GET['ticket_number'];

                // Prepare and execute the SQL query
                $sql = "SELECT * FROM reserve_tickets WHERE train_ticket = '$ticketNumber'";
                $result = $conn->query($sql);

                // Display search results
                if ($result->num_rows > 0) {
                    echo '<div class="result">';
                    while ($row = $result->fetch_assoc()) {
                        // Output passenger details
                        echo "<p><strong>Ticket Number:</strong> " . $row["train_ticket"] . "</p>";
                        echo "<p><strong>Passenger Name:</strong> " . $row["passenger_name"] . "</p>";
                        echo "<p><strong>Departure City:</strong> " . $row["start_station"] . "</p>";
                        echo "<p><strong>Destination City:</strong> " . $row["destination_station"] . "</p>";
                        echo "<p><strong>Travel Date:</strong> " . $row["booking_date"] . "</p>";
                        echo "<p><strong>Train Name:</strong> " . $row["train_name"] . "</p>";
                        echo "<p><strong>Seat Number:</strong> " . $row["seat_number"] . "</p>";
                    }
                    echo '</div>';
                } else {
                    echo "<p>No results found for the given ticket number.</p>";
                }

                // Close the database connection
                $conn->close();
            }
        ?>
    </div>

</body>
</html>
