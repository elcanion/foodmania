<?php
    //Session
    session_start();

    define('SITEURL', 'http://localhost/food-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD);
    if (mysqli_connect_errno()) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $db_select = mysqli_select_db($conn, DB_NAME);
    if (mysqli_connect_errno()) {
        echo "Error description: " . mysqli_connect_error();
        exit();
    }
?>