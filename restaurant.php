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
  $username = "root"; // Change this to your actual MySQL username
  $password = ""; // Change this to your actual MySQL password
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

  // Handle add employee form submission
  if (isset($_POST['submit_employee'])) {
    $employee_name = $_POST['employee_name'];
    $dateOfBirth = $_POST['Date_of_birth'];
    $ssn = $_POST['ssn'];
    $address = $_POST['address'];
    $salary = $_POST['Salary'];

    // Insert new employee into the database
    $sql_employee = "INSERT INTO Employee (name, address, dateOfBirth, ssn, salary) VALUES ('$employee_name', '$address', '$dateOfBirth', '$ssn', '$salary')";
    
    if ($connection->query($sql_employee) === TRUE) {
      echo "New employee added successfully";
    } else {
      echo "Error adding employee: " . $sql_employee . "<br>" . $connection->error;
    }
  }

  // Handle add menu item form submission
  if (isset($_POST['submit_menu_item'])) {
    $dish_name = $_POST['dish_name'];
    $price = (int)$_POST['price'];
    $weekly_sales = (int)$_POST['weekly_sales'];
    $daily_sales = (int)$_POST['daily_sales'];
    $monthly_sales = (int)$_POST['monthly_sales'];

    // Insert new menu item into the database
    $sql_menu_item = "INSERT INTO Menu (dishName, price, weeklySales, dailySales, monthlySales) VALUES ('$dish_name', $price, $weekly_sales, $daily_sales, $monthly_sales)";
    
    if ($connection->query($sql_menu_item) === TRUE) {
      echo "New menu item added successfully";
    } else {
      echo "Error adding menu item: " . $sql_menu_item . "<br>" . $connection->error;
    }
  }

  $connection->close();
  ?>

  <!-- Add Employee form -->
  <h2 style="color:Orange;">Add New Employee</h2>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="employee_name">Employee Name:</label>
    <input type="text" id="employee_name" name="employee_name" required>
    <label for="Date_of_birth">Birthday:</label>
    <input type="text" id="Date_of_birth" name="Date_of_birth" required>
    <br>
    <label for="ssn">Social Security Number:</label>
    <input type="text" id="ssn" name="ssn" required>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
    <label for="Salary">Employee Salary:</label>
    <input type="text" id="Salary" name="Salary" required>
    <br>
    <input type="submit" name="submit_employee" value="Add Employee">
  </form>

  <!-- Add Menu Item form -->
  <h2 style="color:Orange;">Add New Menu Item</h2>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="dish_name">Dish Name:</label>
    <input type="text" id="dish_name" name="dish_name" required>
    <br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required>
    <br>
    <label for="weekly_sales">Weekly Sales:</label>
    <input type="number" id="weekly_sales" name="weekly_sales" required>
    <br>
    <label for="daily_sales">Daily Sales:</label>
    <input type="number" id="daily_sales" name="daily_sales" required>
    <br>
    <label for="monthly_sales">Monthly Sales:</label>
    <input type="number" id="monthly_sales" name="monthly_sales" required>
    <br>
    <input type="submit" name="submit_menu_item" value="Add Menu Item">
  </form>
  
</body>
</html>
