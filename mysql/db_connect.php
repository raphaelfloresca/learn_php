<?php 
    // Database of username and password
    DEFINE('DB_USER', 'studentweb');
    DEFINE('DB_PASSWORD', 'P@$$w0rd0!799!');

    // Name of database
    $dsn = 'mysql:host=localhost;dbname=students';
    // Try to connect to database via PDO, but return error if there's a problem
    try {
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        $err_msg = $e -> getMessage();
        include('db_error.php');
        exit();
    }
?>