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

// Retrieve booked tickets from the database
$sql = "SELECT * FROM reserve_tickets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(premium_photo-1670287058956-83755a30dc6f.avif);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }

        main {
            max-width: 1000px;
            margin: 10px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Booked Tickets</h1>
    </header>

    <main>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                    
            
                        <th>ticket number</th>
                        <th>Start Station</th>
                        <th>Destination Station</th>
                        <th>Train ID</th>
                        <th>Train Name</th>
                        <th>Seat Number</th>
                        <th>AC or Non-AC</th>
                        <th>Passenger Name</th>
                        <th>Passenger Mobile</th>
                        <th>Passenger Email</th>
                        
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        
                        <td>{$row['train_ticket']}</td>
                        <td>{$row['start_station']}</td>
                        <td>{$row['destination_station']}</td>
                        <td>{$row['train_id']}</td>
                        <td>{$row['train_name']}</td>
                        <td>{$row['seat_number']}</td>
                        <td>{$row['ac_non_ac']}</td>
                        <td>{$row['passenger_name']}</td>
                        <td>{$row['passenger_mobile_number']}</td>
                        <td>{$row['passenger_email']}</td>
                    
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No booked tickets found.</p>";
        }
        ?>
    </main>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
