<?php 

    $servername = "localhost";
    $username = "pjmn";
    $password = "20092524Poom@";
    $dbname = "amzdb";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 

?>