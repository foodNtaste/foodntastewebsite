<!DOCTYPE html>

<html>
  <html lang="de">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Füge deine eigene Bewertung hinzu.">
    <meta name="author" content="foodNtaste">
    <meta property="og:title" content="foodNtaste" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://foodntaste.senfauge.de/addRating.php" />
    <title>foodNtaste | Essensbewertung</title>
    <style>
      html {overflow-y: scroll;}

      body {
        margin: 0;
      }

      h1 {
        color: #ffd700;
        text-align: center;
        font-size: 40px;
        font-family: Sans-Serif;
      }

      h2 {
        color: #fc0303;
        text-align: center;
        font-size: 40px;
        font-family: Sans-Serif;
      }

      h3 {
        color: inherit;
        text-align: center;
        font-size: 20px;
        font-family: sans-serif;
      }
    </style>
  </head>
</html>

<?php
    $host_name = "foodntaste.senfauge.de";
    $database = "***";
    $username = "***";
    $password = "***";

    $connection = mysqli_connect($host_name, $username, $password, $database);

    if (!$connection) {
        echo "Error: Unable to connect to MySQL.<br>";
        echo "<br>Debugging errno: " . mysqli_connect_errno();
        echo "<br>Debugging error: " . mysqli_connect_error();
        exit;
    }

    echo "<body style='background-color: #3b4d61;'>";

    $rating = $_GET['rating'];
    $essen = $_GET['essen'];
    if ($rating != "gut" && $rating != "mittel" && $rating != "schlecht") {
        echo "<h2>Error: Invalid rating</h2>";
        echo "<h3>Argumente für rating sind gut, mittel oder schlecht</h3>";
        exit;
    }
    if ($essen != "m1" && $essen != "m2" && $essen != "m3") {
        echo "<h2>Error: Invalid essen</h2>";
        echo "<h3>Argumente für essen sind m1, m2 oder m3</h3>";
        exit;
    }
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $query = "INSERT INTO bewertungen (essen, bewertung, datum, zeit) VALUES ('$essen', '$rating', '$date', '$time')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed.");
    }
    echo "<h1>Bewertung erfolgreich hinzugefügt</h1>";
    echo "<h3>Deine Bewertung (" . $rating . ") wurde erfolgreich registriert.</h3>";
    echo "</body>";
    mysqli_close($connection);
?>
