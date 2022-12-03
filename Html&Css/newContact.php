<?php

header('Access-Control-Allow-Origin: *');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $host = 'localhost';
    $username = 'project2_user';
    $password = 'password123';
    $dbname = 'dolphin_crm';

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    
    $firstName = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$lastName = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_SPECIAL_CHARS);
    $title = $_POST['title'];
    $assign = $_POST['assign'];
    $type = $_post['type'];
    $tel = preg_replace('/[^0-9]/', '', $_POST['tel']);

  
    // Check if email is valid
    if (!$email) {
        echo 'That email is not valid!<br/>';
    }


    $SQL="INSERT INTO `contacts` (title, firstname, lastname, email, telephone, company, 'type', assigned_to) 
    VALUES ('$title', '$firstname', '$lastname', '$email', '$tel', '$company', '$type', '$assign')";

    // echo "<h3>" . $SQL . "</h3>";

    
    $stmt = $conn->query($SQL);


} 

?> 