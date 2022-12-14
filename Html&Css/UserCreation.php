<?php
require "config.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = 'localhost';
    $username = 'project2_user';
    $password = 'password123';
    $dbname = 'dolphin_crm';

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    //$stmt = $conn->query("SELECT * FROM users");

    //values from HTML
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
	$email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $loginPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $role= filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

    //Encrypts password
    $hash = password_hash($loginPassword, PASSWORD_DEFAULT);
    
    
    //if password_verify($loginPassword.$hash){}   //can use this for verification

  

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $loginPassword);
    $lowercase = preg_match('@[a-z]@', $loginPassword);
    $number    = preg_match('@[0-9]@', $loginPassword);
    $specialChars = preg_match('@[^\w]@', $loginPassword);
    $val=0;
  
    if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['role'])){
        echo 'Fields(s) are empty. ';
        $val=1;
    } 
    elseif(empty($firstName) || empty($lastName)  || /*empty($email)  ||*/ empty($loginPassword)  || empty($firstName)){
        echo 'Fields(s) are empty. ';
        $val=1;
    }
    
    if ($val==0){
        // Check if email is valid
        if (!$email ) {
            echo 'That email is not valid!<br/>';
            $val=2;
        }


        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($loginPassword) < 8) {
            echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }
        else{
            if ($val==0){
                //Adds user to database
                $SQL="INSERT INTO `users` (firstname, lastname, password, email, role) 
                VALUES ('$firstName', '$lastName', '$hash', '$email', '$role')";
            
                //echo "<p>" . $SQL . "</p>";
            
                $stmt = $conn->query($SQL);    
                $added="User Added Sucessfully";
                
                echo("<meta http-equiv='refresh' content='1'>"); 
                //header('Location: Dashboard.html');
            }
        }


    }

} 



?> 