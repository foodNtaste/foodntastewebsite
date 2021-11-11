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

    // get data from GET request
    $rating = $_GET['rating'];
    $essen = $_GET['essen'];
    // check if rating is not gut, mittel or schlecht
    if ($rating != "gut" && $rating != "mittel" && $rating != "schlecht") {
        echo "<h1>Error: Invalid rating</h1>";
        echo "<h2>Argumente für rating sind gut, mittel oder schlecht</h2>";
        exit;
    }
    // check if essen is m1 m2 or m3
    if ($essen != "m1" && $essen != "m2" && $essen != "m3") {
        echo "<h1>Error: Invalid essen</h1>";
        echo "<h2>Argumente für essen sind m1, m2 oder m3</h2>";
        exit;
    }
    // insert rating into database
    // get current date
    $date = date('Y-m-d');
    // get current time
    $time = date('H:i:s');
    $query = "INSERT INTO bewertungen (essen, bewertung, datum, zeit) VALUES ('$essen', '$rating', '$date', '$time')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed.");
    }
    print($result);
    // close connection
    mysqli_close($connection);
?>
