<?php

require "config.php";
$logout=true;
$errorMsg="";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $request = filter_input(INPUT_POST, 'logout', FILTER_VALIDATE_BOOLEAN);
   

    if($logout === $request){
        $logout=false;
        echo($logout);
           
    }else{
        $errorMsg= "Invalid";
        echo($errorMsg);
    }
}
?>