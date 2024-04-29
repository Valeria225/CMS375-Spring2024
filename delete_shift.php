<?php
// Displays any possible errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php';

if(isset($_GET['employeeName'])){
    $employeeName = $_GET['employeeName'];

    // Prepare SQL and bind parameters
    $sql = "DELETE FROM Scheduling WHERE employeeName = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $employeeName);
        if ($stmt->execute()) {
            echo "Shift deleted from system";
            header("Location: restaurant.php"); // Redirect back to the main page
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else{
    echo "Invalid Request";
}

$conn->close();
?>
