<?php
session_start();
include "config.php";
#admin@project.com
#pass1234

$stmt= $conn->query("SELECT * FROM users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPassword'];
    if( $email == NULL || $pass == NULL ){
        echo('Email or Password missing');
    }
    foreach($results as $tdv){
        if($email == $tdv['email'] && $pass == $tdv['password']){
            echo('Successfully Login...');     
        }
    }
}
?>