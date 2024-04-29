<?php
// Displays any possible errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php';

if(isset($_GET['employeeName']) && isset($_GET['new_Name'])){
    $shiftLength = $_GET['employeeName'];
    $new_Name = $_GET['new_Name'];

    // Prepare SQL and bind parameters
    $sql = "UPDATE Schedule SET employeeName = ? WHERE employeeName = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $new_Name, $employeeName);
        if ($stmt->execute()) {
            echo "Shift updated successfully";
            header("Location: restaurant.php"); // Redirect back to the main customer page
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