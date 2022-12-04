<?php
session_start();
$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    #$hashp02 = '$argon2i$v=19$m=1024,t=2,p=2$d1JJWnNHMkVEekZwcTFUdA$zeSi7c/Adh/1KCTHddoF39Xxwo9ystxRzHEnRA0lQeM';

    #$test02 = password_verify($passw01, $hashp02);

    if(isset($email)){

        if(isset($password)){
            $message ='<label>All field is required</label>';
        }
        else
        {
            try{
                $sql=$conn->prepare($query);
                $sql->execute(
                    array(
                        ':email' => $email,
                        ':password' => $password
                    )
                );

                $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
                    if($email==$row["email"]){
                        if(($password==$row["password"])){
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
    }
}

?>