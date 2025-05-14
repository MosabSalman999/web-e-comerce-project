<?php
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "gamers.jo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT * FROM products");
?>
