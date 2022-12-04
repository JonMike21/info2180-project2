<?php


$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->query("SELECT id, firstname, lastname FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    echo '<select id="assign">';
        foreach($results as $option){
            echo '<option>' . $option['firstname']." ".$option['lastname'] . '</option>';
        }
    echo '</select>';

    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $conn->query("SELECT id, firstname, lastname FROM users");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


    $firstName = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$lastName = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$email =  filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_SPECIAL_CHARS);
    $title = $_POST['title'];
    $type = $_POST['type'];
    $assign = $_POST['assign'];
    $tel = preg_replace('/[^0-9]/', '', $_POST['tel']);
    $telLength = strlen((string)$tel);
  
    // Check if email is valid
    if (!$email) {
        echo '<script language="javascript">';
        echo 'alert("That email is not valid!")';
        echo '</script>';
    
    }elseif(!($telLength == 10)){
        echo '<script language="javascript">';
        echo 'alert("Incorrect Telephone number length!")';
        echo '</script>';
    }else{
        foreach($results as $option){
            $check = $option['firstname']." ".$option['lastname'];
            if ($check == $assign){
                $identity = $option['id'];
                break;
            }
        }
    
        $current = date('Y-m-d H:i:s');
    
        echo $current;
    
        $SQL="INSERT INTO `contacts` (title, firstname, lastname, email, telephone, company, type, created_by, assigned_to, created_at, updated_at) 
        VALUES ('$title', '$firstName', '$lastName', '$email', '$tel', '$company', '$type', '$identity', '$identity', '$current', '$current')";
        
        $stmt = $conn->query($SQL);
    }


} 

?> 