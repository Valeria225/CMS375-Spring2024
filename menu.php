<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check and sanitize input before insertion
    $dishName = isset($_POST['dishName']) ? mysqli_real_escape_string($conn, $_POST['dishName']) : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $weeklySales = isset($_POST['weeklySales']) ? $_POST['weeklySales'] : '';
    $dailySales = isset($_POST['dailySales']) ? $_POST['dailySales'] : '';
    $monthlySales = isset($_POST['monthlySales']) ? $_POST['monthlySales'] : '';

    // Prepare SQL and bind parameters
    $sql = "INSERT INTO Menu (dishName, price, weeklySales, dailySales, monthlySales) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $dishName, $price, $weeklySales, $dailySales, $monthlySales);
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
