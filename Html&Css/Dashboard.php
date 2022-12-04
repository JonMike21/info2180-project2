<?php
$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// SELECT firstname, lastname, email, company, type FROM `contacts`;

if ($_SERVER['REQUEST_METHOD'] === 'GET'):
  $q = $_REQUEST['q'];
  echo $q;

  if ($q == 'Sales'){
    $stmt = $conn->query("SELECT * FROM contacts WHERE type = 'Sales Lead'");
  }

  if ($q == 'Support'){
    $stmt = $conn->query("SELECT * FROM contacts WHERE type = 'Support'");
  }

  if ($q == 'Assigned'){
    $stmt = $conn->query("SELECT * FROM contacts WHERE assigned_to = 2");
  }
  
  if ($q == 'All'){
    $stmt = $conn->query("SELECT * FROM contacts");

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
          <td><?=$tdv['type'];?></td>
          <td><button type="button">View</button></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?> 
  
  