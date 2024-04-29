<?php
// Displays any possible errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php';

if(isset($_GET['employee_name']) && isset($_GET['new_name'])){
    $employee_name = $_GET['employee_name'];
    $new_name = $_GET['new_name'];

    // Prepare SQL and bind parameters
    $sql = "UPDATE Employee SET employee_name = $new_name WHERE employee_id = $employee_name";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $new_name, $employee_id);
        if ($stmt->execute()) {
            echo "Employee updated successfully";
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
