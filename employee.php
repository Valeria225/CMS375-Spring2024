<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check and sanitize input before insertion
    $employee_name = isset($_POST['employee_name']) ? mysqli_real_escape_string($conn, $_POST['employee_name']) : '';
    $dateOfBirth = isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : '';
    $ssn = isset($_POST['ssn']) ? mysqli_real_escape_string($conn, $_POST['ssn']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $salary = isset($_POST['Salary']) ? mysqli_real_escape_string($conn, $_POST['Salary']) : '';

    // Prepare SQL and bind parameters
    $sql = "INSERT INTO Employee (name, address, dateOfBirth, ssn, salary) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $employee_name, $address, $dateOfBirth, $ssn, $salary);
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
