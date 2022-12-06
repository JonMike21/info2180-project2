<?php
require "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET'):
  $q = $_REQUEST['q'];
  $val = $_SESSION["user_id"];


  if ($q == "All"){
    $stmt = $conn->query("SELECT * FROM contacts ");
  }
  if ($q == "Sales"){
    $stmt = $conn->query("SELECT * FROM contacts WHERE type = 'Sales Lead'");
  }
  if ($q == "Support"){
    $stmt = $conn->query("SELECT * FROM contacts WHERE type = 'Support'");
  }
  if ($q == "Assigned"){
    $stmt = $conn->query("SELECT * FROM contacts WHERE assigned_to = '$val'"); 
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
        <?php 
        $str = "note.php?p=" . $tdv['id'];
        $name = $tdv['title']." ".$tdv['firstname']." ".$tdv['lastname'];
        echo "<td><button class='dname' type=button><a href=". $str ."> $name </a></button></td>";
        ?>
        
        <td><?=$tdv['email'];?></td>
        <td><?=$tdv['company'];?></td>

        <?php
          if ($tdv['type'] == "Sales Lead") {
            echo '<td class="SL">Sales Lead</td>';
          }
          else if ($tdv['type'] == "Support"){
              echo '<td class="Sup">Support</td>';
          }

          $str = "note.php?p=" . $tdv['id'];

          echo "<td><button class='view' type=button><a href=". $str .">View</a></button></td>";
        ?>
       
    
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?> 
  
  
