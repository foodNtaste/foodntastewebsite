<?php
  $host_name = "localhost";
  $database = "***";          // Change your database name
  $username = "***";          // Your database user id
  $password = "***";          // Your password

  //error_reporting(0);// With this no error reporting will be there
  //////// Do not Edit below /////////

  $connection = mysqli_connect($host_name, $username, $password, $database);

  if (!$connection) {
      echo "Error: Unable to connect to MySQL.<br>";
      echo "<br>Debugging errno: " . mysqli_connect_errno();
      echo "<br>Debugging error: " . mysqli_connect_error();
      exit;
  }
  $sql = "select * from bewertungen";
  $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
  $emparray = array();
  while($row =mysqli_fetch_assoc($result))
  {
      $emparray[] = $row;
  }
  echo json_encode($emparray);
?>
