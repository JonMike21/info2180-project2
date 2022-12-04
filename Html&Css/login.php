<?php
// session_start();
// include "config.php";


$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if($_SERVER["REQUEST_METHOD"] == 'POST') {
    #$email = $_POST['loginEmail'];
    #$pass = $_POST['loginPassword'];
    $stmt= $conn->query("SELECT * FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $email =  filter_input(INPUT_POST, 'loginEmail', FILTER_VALIDATE_EMAIL);
    $loginPassword = filter_input(INPUT_POST, 'loginPassword', FILTER_SANITIZE_STRING);

    ?>

    <script>
        console.log("yessir")
    </script>
    
    <?php
    echo $email;

    foreach($results as $option){
        $checkEmail = $option['email'];
        $checkPassword = $option['password'];

        if ($checkEmail === $email){
            // $_SESSION["user_login"] = $option["id"];
            // $loginMsg = "Successfully Login...";
            // echo $option['email'];
            // header("refresh:2; Dashboard.php");
            echo "well done";
            break;
        }
        // $loginMsg = "Invalid Login...";
        // echo $loginMsg;
    }
}
?>