<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check and sanitize input before insertion
    $employeeName = isset($_POST['employeeName']) ? mysqli_real_escape_string($conn, $_POST['employeeName']) : '';
    $shiftLength = isset($_POST['shiftLength']) ? $_POST['shiftLength'] : '';
    $shiftStartTime = isset($_POST['shiftStartTime']) ? $_POST['shiftStartTime'] : '';
    $shiftEndTime = isset($_POST['shiftEndTime ']) ? $_POST['shiftEndTime '] : '';
    $break= isset($_POST['break']) ? $_POST['break'] : '';

    // Prepare SQL and bind parameters
    $sql = "INSERT INTO Scheduling (employeeName, shiftLength, shiftStartTime, shiftEndTIme, break) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $employeeName, $shiftLength, $shiftStartTime, $shiftEndTime, $break);
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
