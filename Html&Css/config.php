<?php
#session_start();

$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Working Login
    #admin@project.com
    #pass1234

// Start Session (should be on all php files)
    #session_start();

// Get session id
    #echo session_id();

// Get any other session info
    # $_SESSION[""] --E.g $_SESSION["id"] 

// remove all session variables
    #session_unset();

// destroy the session
    #session_destroy();

?>
