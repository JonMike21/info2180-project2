<?php
session_start();
$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// SELECT firstname, lastname, email, company, type FROM `contacts`;

if ($_SERVER['REQUEST_METHOD'] === 'GET'):
  $q = $_REQUEST['q'];

  if ($q == "All"){
    $stmt = $conn->query("SELECT * FROM contacts ");
  }
  if ($q == "Sales"){
    $stmt = $conn->query("SELECT * FROM contacts WHERE type = 'Sales Lead'");
  }
  if ($q == "Support"){
    $stmt = $conn->query("SELECT * FROM contacts WHERE type = 'Support'");
  }

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?> 
    <table style="width:100%" CELLSPACING=0>
      <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Type</th>
            <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($results as $tdv): ?>
        <tr>
          <td><?=$tdv['title']." ".$tdv['firstname']." ".$tdv['lastname'];?></td>
          <td><?=$tdv['email'];?></td>
          <td><?=$tdv['company'];?></td>
 
          <?php
            

            if ($tdv['type'] == "Sales Lead") {
            echo '<td class="SL">Sales Lead</td>';
            }
            else{
                echo '<td class="Sup">Support</td>';
            }
        ?>
          
        
          
          <td><button type="button">View</button></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?> 
  
  