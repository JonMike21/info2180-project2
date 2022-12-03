<?php
$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// SELECT firstname, lastname, email, company, type FROM `contacts`;

if ($_SERVER['REQUEST_METHOD'] === 'GET') :
    $stmt = $conn->query("SELECT * FROM contacts");
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
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?> 
  
  
  <?php 
    if(isset($_GET["city"])):
      $city= $_GET["city"];
      $stmt=$conn->query("SELECT c.name, c.district, c.population FROM cities c join countries cs on c.country_code = cs.code WHERE cs.name LIKE '%$city%' ");
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>
  
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>District</th>
            <th>Population</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($results as $tdv): ?>
          <tr>
            <td><?=$tdv['name'];?></td>
            <td><?=$tdv['district'];?></td>
            <td><?=$tdv['population'];?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
  <?php endif; ?> 