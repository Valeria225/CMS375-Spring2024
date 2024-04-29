<?php
// Displays any possible errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php';

if(isset($_GET['itemName']) && isset($_GET['newName'])){
    $shiftLength = $_GET['itemName'];
    $newName = $_GET['newName'];

    // Prepare SQL and bind parameters
    $sql = "UPDATE Inventory SET itemName = ? WHERE itemName = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $newName, $itemName);
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