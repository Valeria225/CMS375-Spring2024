<?php
// Displays any possible errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php';

if(isset($_GET['dishName']) && isset($_GET['newName'])){
    $shiftLength = $_GET['dishName'];
    $newName = $_GET['newName'];

    // Prepare SQL and bind parameters
    $sql = "UPDATE Menu SET dishName = ? WHERE dishName = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $newName, $dishName);
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