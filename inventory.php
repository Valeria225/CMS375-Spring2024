<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check and sanitize input before insertion
    $itemName = isset($_POST['itemName']) ? mysqli_real_escape_string($conn, $_POST['itemName']) : '';
    $totalStock = isset($_POST['totalStock ']) ? $_POST['totalStock '] : '';
    $location = isset($_POST['location']) ? mysqli_real_escape_string($conn, $_POST['location']) : '';
    $upcomingShipments = isset($_POST['upcomingShipments']) ? mysqli_real_escape_string($conn, $_POST['upcomingShipments']) : '';
    $orderSchedule = isset($_POST['orderSchedule']) ? mysqli_real_escape_string($conn, $_POST['orderSchedule']) : '';

    // Prepare SQL and bind parameters
    $sql = "INSERT INTO Inventory (itemName, totalStock, location, upcomingShipments, orderSchedule) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $itemName, $totalStock, $location, $upcomingShipments, $orderSchedule);
        if ($stmt->execute()) {
            echo "New record created successfully.";
            header("Location: restaurant.php"); // Redirect back to the main customer page
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
} else {
    echo "No data submitted.";
}
