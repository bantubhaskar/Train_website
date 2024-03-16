<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-image: url(photo-1442570468985-f63ed5de9086.avif);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #2e24bd;
            color: white;
            text-align: center;
            padding: 1em;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #555;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #2e24bd;
            color: white;
        }
    
    </style>
</head>
<body>
    <header>
        <h1>Ticket Booking</h1>
    </header>

    <main>
    <form action="booking.php" method="post">
        
            <!-- Start Station -->
            <label for="start_station">Start Station:</label>
            <select name="start_station" required>
            <?php
                // Fetch seat numbers from the database and populate the dropdown
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "ticket";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $query = "SELECT departure_station FROM trains";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['departure_station'] . "'>" . $row['departure_station'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No seats available</option>";
                }

                $conn->close();
                ?>
                </select>

            </select>




            <!-- Destination Station -->
            <label for="destination_station">Destination Station:</label>
            <select name="destination_station" required>
            <?php
                // Fetch seat numbers from the database and populate the dropdown
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "ticket";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $query = "SELECT arrival_station FROM trains";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['arrival_station'] . "'>" . $row['arrival_station'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No seats available</option>";
                }

                $conn->close();
                ?> 
                </select>           




            <!-- Train ID -->
            <label for="train_id">Train ID:</label>
            <select name="train_id" required>
            <?php
                // Fetch seat numbers from the database and populate the dropdown
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "ticket";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $query = "SELECT train_id FROM trains";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['train_id'] . "'>" . $row['train_id'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No train id</option>";
                }

                $conn->close();
                ?>

                
            </select>




            <!-- Train Name -->
            <label for="train_name">Train Name:</label>
            <select name="train_name" required>
            <?php
                // Fetch seat numbers from the database and populate the dropdown
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "ticket";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $query = "SELECT train_name FROM trains";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['train_name'] . "'>" . $row['train_name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No seats available</option>";
                }

                $conn->close();
                ?>
           
            </select>




            <!-- Seat Number -->
            <?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ticket";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the seat number is selected
    if (isset($_POST['is_booked'])) {
        // Extract the selected seat number
        $selectedSeat = $_POST['is_booked'];

        // Perform the update query
        $updateQuery = "UPDATE `reserve_tickets` SET `seat_number` = '$selectedSeat' WHERE `is_booked` = '$selectedSeat' AND `seat_number` IS NULL";

        if ($conn->query($updateQuery) === TRUE) {
            echo "Seat updated successfully.";
        } else {
            echo "Error updating seat: " . $conn->error;
        }
    }
}

// Fetch seat numbers from the database and populate the dropdown
$query = "SELECT DISTINCT is_booked FROM reserve_tickets WHERE seat_number IS NULL";
$result = $conn->query($query);
?>


    <label for="is_booked">Select Seat Number:</label>
    <select name='is_booked" required>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['seat_number'] . "'>" . $row['is_booked'] . "</option>";
            }
        } else {
            echo "<option value=''>No seats available</option>";
        }
        ?>
    </select>
    

<?php
$conn->close();
?>




            




            <!-- AC or Non-AC -->
            <label for="ac_non_ac">AC or Non-AC:</label>
            <select name="ac_non_ac" required>
                <option value="ac">AC</option>
                <option value="non_ac">Non-AC</option>
            </select>





            <!-- Booking Date -->
            <label for="booking_date">Date:</label>
            <select name="booking_date" required>
                <?php fetchAndPrintOptions("SELECT arrival_date FROM trains"); ?>
            </select>




            <!-- Passenger Details -->
            <label for="passenger_name">Passenger Name:</label>
            <input type="text" name="passenger_name" required>



            <label for="passenger_mobile_number">Passenger Mobile:</label>
            <input type="tel" name="passenger_mobile_number" required>



            <label for="passenger_email">Passenger Email:</label>
            <input type="email" name="passenger_email" required>



            <label for="passenger_address">Passenger Address:</label>
            <textarea name="passenger_address" rows="4" required></textarea>
            
            
            
            <button type="submit">Book Ticket</button>

        </form>
    </main>
</body>
</html>

<?php
// Function to fetch data from the database and print options
function fetchAndPrintOptions($query) {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ticket";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row[key($row)] . "'>" . $row[key($row)] . "</option>";
        }
    } else {
        echo "<option value=''>No options available</option>";
    }

    $conn->close();
}
?>
