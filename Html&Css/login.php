<?php

require "config.php";
$isUser=false;
$errorMsg="";

$stmt= $conn->query("SELECT * FROM users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = filter_input(INPUT_POST, 'loginEmail', FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, 'loginPassword', FILTER_SANITIZE_STRING);

    if($email === "" && $pass === ""){
        $errorMsg="Please enter email and password";
        echo($errorMsg);
           
    }
    elseif($email === "" || $pass === ""){
        $errorMsg = "Both Email and Paswword required.";
        echo($errorMsg);

    }elseif(!empty($email) && !empty($pass)){
        foreach($results as $tdv){
            //if($email == $tdv['email'] && $pass == $tdv['password']){
            if($email == $tdv['email'] && password_verify($pass,$tdv['password'])){
                $_SESSION["user_id"] =$tdv['id']; 
                $_SESSION["firstname"] =$tdv['firstname']; 
                $_SESSION["lastname"] =$tdv['lastname']; 
                $_SESSION["password"] =$tdv['password']; 
                $_SESSION["email"] =$tdv['email']; 
                $_SESSION["role"] =$tdv['role'];
                $_SESSION["created_at"] =$tdv['created_at'];  
                
                $isUser=true;
            }
        }
        if($isUser == true){
            $_SESSION["user_id"] =$tdv['id']; 
            $_SESSION["firstname"] =$tdv['firstname']; 
            $_SESSION["lastname"] =$tdv['lastname']; 
            $_SESSION["password"] =$tdv['password']; 
            $_SESSION["email"] =$tdv['email']; 
            $_SESSION["role"] =$tdv['role'];
            $_SESSION["created_at"] =$tdv['created_at']; 
            echo($isUser);
        }else{
            $errorMsg= "Invalid Credentials";
            echo($errorMsg);
        }
    }else{
        $errorMsg= "Invalid Credentials";
        echo($errorMsg);
    }
}

?>

