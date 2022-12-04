<?php
session_start();
include "config.php";

echo "Hello";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    #$email = $_POST['loginEmail'];
    #$pass = $_POST['loginPassword'];
    $stmt= $conn->query("SELECT * FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    #$email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    #$loginPassword = filter_input(INPUT_POST, 'loginPassword', FILTER_SANITIZE_STRING);

    foreach($results as $option){
        $checkEmail = $option['email'];
        $checkPassword = $option['password'];
        if ($checkEmail == $email && $checkPassword == $loginPassword){
            $_SESSION["user_login"] = $row["user.id"];
            $loginMsg = "Successfully Login...";
            echo $loginMsg;
            header("refresh:2; Dashboard.php");
            break;
        }
        $loginMsg = "Invalid Login...";
        echo $errorMsg;
    }

 /*   if(isset($email)){

        if(empty($pass)){
            $message ='<label>All fields required</label>';
        }
        else
        {
            try{
                $sql=$conn->prepare($query);
                $sql->execute(
                    array(
                        ':email' => $email,
                        ':password' => $pass
                    )
                );

                $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
                    if($email==$row["email"]){
                        if(($pass==$row["password"])){
                            $_SESSION["user_login"] = $row["user.id"];
                            $loginMsg = "Successfully Login...";
                            header("refresh:2; Dashboard.php");
                        }
                        else
                        {
                            $errorMsg[]="Wrong password";
                        }
                    }else
                    {
                        $errorMsg[]="Wrong email";
                    }
                }
            }
            catch(PDOException $e){$e->getMessage();}     
        }
    }*/
}

?>