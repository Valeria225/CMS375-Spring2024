  <!-- Database Connection -->
  <?php include 'db_connect.php'; ?>

<!DOCTYPE html>

<html>
<head>
  <title>From the Hearth</title>
</head>
<body style="text-align:center;" bgcolor="#f2d6b3">

  <h1 style="color:Orange;">From The Hearth</h1>

  <img src="Pasted Graphic.png" alt="Logo" width="200" height="150" />
  
  <!-- Search form -->
  <form method="GET">
    <label for="search">Enter name:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Search</button>
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
  } else {
    echo 'Connection established<br>';
  }

  // Handle search form submission
  if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $sql = "SELECT * FROM Employee WHERE name='$searchTerm'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . " - Address: " . $row["address"] . " - DOB: " . $row["dateOfBirth"] . " - SSN: " . $row["ssn"] . " - Salary: " . $row["salary"] . "<br>";
      }
    } else {
      echo "0 results";
    }
  }

  $connection->close();
  ?>


 <!-- Add Employee form -->
 <h2 style="color:Orange;">Add New Employee</h2>
  <form action="employee.php" method="post">
    <label for="employee_name">Employee Name:</label><br>
    <input type="text" id="employee_name" name="employee_name" required><br>
    <label for="dateOfBirth">Birthday:</label><br>
    <input type="date" id="dateOfBirth" name="dateOfBirth" required><br>
    <label for="ssn">Social Security Number:</label><br>
    <input type="text" id="ssn" name="ssn" required><br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" required><br>
    <label for="Salary">Salary:</label><br>
    <input type="text" id="Salary" name="Salary" required><br>
    <input type="submit" value="Submit">
</form>

<!-- Delete Employee Form -->
<h2 style="color:Orange";> Delete Employee from System</h2>
<form action="delete_employee.php" method="get">
        Employee Name: <input type="text" name="employee_name"><br><br>
        <input type="submit" value="Delete Employee">
    </form>

  
</body>
</html>
