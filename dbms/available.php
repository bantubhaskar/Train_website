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

// Fetch data from the trains table
$sql = "SELECT * FROM trains";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trains</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
   <th> <h2>Available Trains</h2></th>
    <table>
        <thead>
            <tr>
                <th>Train ID</th>
                <th>Train Name</th>
                <th>Departure Station</th>
                <th>Arrival Station</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Seat Capacity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['train_id'] . '</td>';
                    echo '<td>' . $row['train_name'] . '</td>';
                    echo '<td>' . $row['departure_station'] . '</td>';
                    echo '<td>' . $row['arrival_station'] . '</td>';
                    echo '<td>' . $row['departure_time'] . '</td>';
                    echo '<td>' . $row['arrival_time'] . '</td>';
                    echo '<td>' . $row['seat_capacity'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="7">No data available</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
