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
 <h2 style="color: #59302D;">Add New Inventory</h2>
  <form action="inventory.php" method="post">
    <label for="itemName">Employee Name:</label><br>
    <input type="text" id="itemName" name="itemName" required><br>
    <label for="totalStock">Total Stock:</label><br>
    <input type="int" id="totalStock" name="totalStock" required><br>
    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" required><br>
    <label for="upcomingShipments">Upcoming Shipments:</label><br>
    <input type="text" id="upcomingShipments" name="upcomingShipments" required><br>
    <label for="orderSchedule">Salary:</label><br>
    <input type="text" id="orderSchedule" name="orderSchedule" required><br>
    <input type="submit" value="Submit">
</form>

<!-- Delete Employee Form -->
<h2 style="color: #59302D;"> Delete Inventory from System</h2>
<form action="delete_inventory.php" method="get">
        <label for="itemName">Item Name:</label>
        <input type="text" id="itemName" name="itemName">
        <button type="submit">Delete Item</button>
    </form>

<!-- Update Employee Form-->
<h2 style="color: #59302D;"> Update Inventory</h2>
<form action="update_inventory.php" method="GET">
        <label for="itemName">Item Name:</label>
        <input type="text" id="itemName" name="itemName">
        <label for="newName">New Name:</label>
        <input type="text" id="newName" name="newName">
        <button type="submit">Update Inventory</button>
    </form>

  
</body>
</html>