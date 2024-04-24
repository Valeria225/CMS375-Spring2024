<!DOCTYPE html>
<html>
<head>
  <title>From the Hearth</title>
</head>
<body style="text-align:center;" bgcolor="#f2d6b3">

  <h1 style="color:Orange;">From The Hearth</h1>

  <img src="Pasted Graphic.png" alt="Logo" width="200" height="150" />
  
  <form method="GET">
    <label for="search">Enter name:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Search</button>
  </form>

  <h2 style="color:Orange;">Add New Employee</h2>

  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="employee_name">Employee Name:</label>
    <input type="text" id="employee_name" name="employee_name" required>
    <label for="Date_of_birth">Date of Birth:</label>
    <input type="text" id="Date_of_birth" name="Date_of_birth" required>
    <br>
    <label for="ssn">Social Security Number:</label>
    <input type="text" id="ssn" name="ssn" required>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
    <label for="Salary">Employee Salary:</label>
    <input type="text" id="Salary" name="Salary" required>
    <br>
    <input type="submit" name="submit" value="Add Employee">
  </form>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "restaurant";

  // Create connection
  $connection = mysqli_connect($servername, $username, $password, $dbname);
  if (!$connection) {
    die("Couldn't connect: " . mysqli_connect_error());
  }

  // Handle form submission
  if (isset($_POST['submit'])) {
    $employee_name = $_POST['employee_name'];
    $dob = $_POST['Date_of_birth'];
    $ssn = $_POST['ssn'];
    $address = $_POST['address'];
    $salary = $_POST['Salary'];

    // Insert new employee into the database
    $sql = "INSERT INTO Employee (name, dateOfBirth, ssn, address, salary) VALUES ('$employee_name', '$dob', '$ssn', '$address', '$salary')";
    
    if ($connection->query($sql) === TRUE) {
      echo "New employee added successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $connection->error;
    }
  }

  $connection->close();
  ?>
  
</body>
</html>

