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
    // check if rating is not gut, mittel or schlecht
    if ($rating != "gut" && $rating != "mittel" && $rating != "schlecht") {
        echo "Error: Invalid rating";
        exit;
    }
    // insert rating into database
    // get current date
    $date = date('Y-m-d');
    // get current time
    $time = date('H:i:s');
    $query = "INSERT INTO bewertungen (essen, bewertung, datum, zeit) VALUES ('m1', '$rating', '$date', '$time')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed.");
    }
    print($result);
    // close connection
    mysqli_close($connection);
?>