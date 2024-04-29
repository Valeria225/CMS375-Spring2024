  <!-- Database Connection -->
  <?php include 'db_connect.php'; ?>

<!DOCTYPE html>

<html>
<head>
  <title>From the Hearth</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
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
     position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
  }

</style>

<body style="text-align:center;" bgcolor="#f2d6b3">

  <!-- <h1 style="color:Orange;">From The Hearth</h1> -->

  <img src="Logo.png" alt="Logo" width="325" height="250" />

  
  
  <!-- Search form -->
  <!-- <h2 style="color:Orange;"> Find Employee</h2>
  <form method="GET">
    <label for="search">Enter name:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Search</button>
  </form> -->

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "restaurant";

  if (isset($_POST['button1'])) {
    // Redirect to a new page
    header("Location: employeePage.php");
    exit(); // Make sure that no other code is executed after the redirection
}

  if (isset($_POST['button2'])) {
    // Redirect to a new page
    header("Location: schedulingPage.php");
    exit(); // Make sure that no other code is executed after the redirection
}

  if (isset($_POST['button3'])) {
    // Redirect to a new page
    header("Location: inventoryPage.php");
    exit(); // Make sure that no other code is executed after the redirection
}

if (isset($_POST['button4'])) {
  // Redirect to a new page
  header("Location: menuPage.php");
  exit(); // Make sure that no other code is executed after the redirection
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

    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if (!$connection) {
      die("Couldn't connect: " . mysqli_connect_error());
    } else {
      echo 'Connection established<br>';
    }
  

  $connection->close();
  ?>

<form method= "post">
        <input type="submit" name="button1" class="button" value="Employees">
    </form>

<form method= "post">
        <input type="submit" name="button2" class="button" value="Shifts">
    </form>

<form method= "post">
        <input type="submit" name="button3" class="button" value="Inventory">
    </form>

    <form method= "post">
        <input type="submit" name="button4" class="button" value="Menu">
    </form>
  
</body>
</html>

