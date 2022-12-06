<?php
require "config.php";

// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
// SELECT firstname, lastname, email, company, type FROM `contacts`;

if ($_SERVER['REQUEST_METHOD'] === 'GET'):

    $stmt = $conn->query("SELECT * FROM users ");
    //NOTE User Table nor user creation store the title for the individual therefore for this, it wouldnt be added in list.
 

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?> 
    
    <table style="width:100%" CELLSPACING=0>
      <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($results as $tdv): ?>
        <tr>
          <td><?=$tdv['firstname']." ".$tdv['lastname'];?></td> 
          <td><?=$tdv['email'];?></td>
          <td><?=$tdv['role'];?></td>
          <td><?=$tdv['created_at'];?></td>
        <?php endforeach; ?>
      </tbody>
    </table>
<?php endif; ?> 
  
  