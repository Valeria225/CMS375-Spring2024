<?php
require 'db_connect.php';

if(isset($_GET['employee_name']) && is_numeric($_GET['id'])){
    $employee_name = $_GET['employee_name'];

    $sql = "DELETE FROM Employee WHERE employee_name = '$employee_name'";

    if ($conn->query($sql) === TRUE){
        echo "Employee deleted from system";
    } else{
        echo "Error: " . $conn->error;
    }
} else{
    echo "Invalid Request";
}

$conn->close();
?>
