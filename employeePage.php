<!DOCTYPE html>

<html>
<head>
  <title>From the Hearth</title>
</head>

<style>
  body {
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .button {
    width: 200px;
    height: 80px; /* Adjust height as needed */
    background-color: #D97904;
    color: white;
    font-size: 24px;
    text-decoration: none;
    font
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-radius: 20px;
    text-align: center;
    margin: 10px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
  }
  .button:hover {
    background-color: #BF4904;
  }
  img{
    top: 0%;
  }
  .container{
    display: flex;
    flex-direction: column;
    align-items: center;
  }

</style>

<body style="text-align:center;" bgcolor="#f2d6b3">


  <!-- <h1 style="color:Orange;">From The Hearth</h1> -->
<img src="Logo.png" alt="Logo" width="325" height="250" />
  
  <!-- Search form -->

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
<div class="container">



<h2 style="color: #59302D;"> Find Employee</h2>
  <form method="GET">
    <label for="search">Enter name:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Search</button>
  </form>
 <!-- Add Employee form -->
 <h2 style="color: #59302D;">Add New Employee</h2>
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
<h2 style="color: #59302D; ";> Delete Employee from System</h2>
<form action="delete_employee.php" method="get">
        <label for="employee_name">Employee Name:</label>
        <input type="text" id="employee_name" name="employee_name">
        <button type="submit">Delete Employee</button>
    </form>

<!-- Update Employee Form-->
<h2 style="color: #59302D;";> Update Employee</h2>
<form action="update_employee.php" method="GET">
        <label for="employee_name">Employee Name:</label>
        <input type="text" id="employee_name" name="employee_name">
        <label for="new_name">New Name:</label>
        <input type="text" id="new_name" name="new_name">
        <button type="submit">Update Employee</button>
    </form>

</div>
  
</body>
</html>