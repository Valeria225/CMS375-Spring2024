<!DOCTYPE html>
<html>
 
<head>
  <title>
    Testing Html ?
  </title>
</head>

<body style="text-align:center;">
 
  <h1 style="color:green;">
    Test Code
  </h1>
  
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

  // create connection

  $connection = mysqli_connect($servername, $username, $password, $dbname);
  if(!$connection)
      die("couldn't connect".mysqli_connect_error());
  else
  echo 'connection established';

 
  $searchTerm = $_GET['search'];
  $sql = "SELECT * from Employee where name='$searchTerm'";
  $result = $connection->query($sql);


  if ($result->num_rows > 0) {   // -> object operator for property
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Address: " . $row["address"]. "- DOB " . $row["dateOfBirth"]."- SSN " . $row["ssn"]. "- Salary: " . $row["salary"]. "<br>";
      }
    } else {
      echo "0 results";
    }
    $connection->close();

  ?>
  
</body>
</html>