<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$role = $_POST['role']; 


    $hash = password_hash($password, PASSWORD_BCRYPT);
    
} 


//echo "<h2>" . $firstName . "</h2>";
echo "<h2>" . $firstName . "</h2>";


?> 