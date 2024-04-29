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
 <h2 style="color: #59302D;">Add New Menu Item</h2>
  <form action="menu.php" method="post">
    <label for="dishName">Dish Name:</label><br>
    <input type="text" id="dishName" name="dishName" required><br>
    <label for="price">Price:</label><br>
    <input type="int" id="price" name="price" required><br>
    <label for="weeklySales">Weekly Sales:</label><br>
    <input type="int" id="weeklySales" name="weeklySales" required><br>
    <label for="dailySales">Daily Sales:</label><br>
    <input type="int" id="dailySales" name="dailySales" required><br>
    <label for="monthlySales">Monthly Sales:</label><br>
    <input type="int" id="monthlySales" name="SmonthlySalesalary" required><br>
    <input type="submit" value="Submit">
</form>

<!-- Delete Employee Form -->
<h2 style="color: #59302D;";> Delete Menu Item from System</h2>
<form action="delete_menu.php" method="get">
        <label for="dishName">Dish Name:</label>
        <input type="text" id="dishName" name="dishName">
        <button type="submit">Delete Dish</button>
    </form>

<!-- Update Employee Form-->
<h2 style="color: #59302D;";> Update Menu</h2>
<form action="update_menu.php" method="GET">
        <label for="dishName">Dish Name:</label>
        <input type="text" id="dishName" name="dishName">
        <label for="newName">New Name:</label>
        <input type="text" id="newName" name="newName">
        <button type="submit">Update Employee</button>
    </form>


  
</body>
</html>