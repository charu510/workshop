<?php





    //Start the Session
    session_start();

    //Create constants to store non-repeating values
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    define('SITE_URL', 'http://localhost/restaurant-management-website/');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //database connection
    $con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database
?>
