<?php
// ... (existing code)

// Fetch available seats based on the selected train
if (isset($_GET['train_id'])) {
    $trainId = $_GET['train_id'];

    $fetchSeatsSql = "SELECT reserve_tickets FROM seat_number WHERE train_id = $trainId AND is_available = 1";
    $result = $conn->query($fetchSeatsSql);

    $seats = array();
    while ($row = $result->fetch_assoc()) {
        $seats[] = $row['seat_number'];
    }

    echo json_encode($seats);
    exit;
}

// ... (existing code)
?>
