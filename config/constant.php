<?php
    //Start Session
    session_start();

    //3. Execute SQL Query and Save data in Database
    //Create Constant to Store Non- Repeating Values
    define('SITEURL', 'http://localhost/jkafwebsite/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','jkafwebsite');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting database
?>