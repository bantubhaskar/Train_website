<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ticket";

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the seat number is selected
    if (isset($_POST['seat_number'])) {
        // Extract the selected seat number
        $selectedSeat = $_POST['seat_number'];

        // Perform the update query to mark the seat as booked
        $updateQuery = "UPDATE `reserve_tickets` SET `seat_number` = '$selectedSeat' WHERE `is_booked` = 0 AND `seat_number` IS NULL";

        if ($conn->query($updateQuery) === TRUE) {
            echo "Seat booked successfully.";
        } else {
            echo "Error booking seat: " . $conn->error;
        }
    }
}

// Fetch available seat numbers from the database and populate the dropdown
$query = "SELECT DISTINCT is_booked FROM reserve_tickets WHERE seat_number IS NULL";
$result = $conn->query($query);
?>

<!-- HTML Form -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="seat_number">Select Seat Number:</label>
    <select name="seat_number" required>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['is_booked'] . "'>" . $row['is_booked'] . "</option>";
            }
        } else {
            echo "<option value='' disabled>No seats available</option>";
        }
        ?>
    </select>
    <button type="submit">Book Seat</button>
</form>

<?php
// Close the database connection
$conn->close();
?>
