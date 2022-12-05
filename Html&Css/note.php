<?php

require "config.php";

define('DB_HOST','localhost');
define('DB_USER','project2_user');
define('DB_PASS','password123');
define('DB_NAME','dolphin_crm');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);


$sql= 'SELECT * FROM notes';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sqql='SELECT contacts.firstname,contacts.lastname,notes.comment,contacts.id,notes.contact_id FROM contacts JOIN notes ON contacts.id=notes.contact_id';
$result = mysqli_query($conn, $sqql);
$notes = mysqli_fetch_all($result, MYSQLI_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST'){
    $textarea = filter_input(INPUT_POST, 'textarea', FILTER_SANITIZE_STRING);
    echo $textarea;
}

if(isset($_POST['submit']))
{
	$textareaValue = trim($_POST['content']);
	
	$sql = "insert into notes (comment) values ('".$textareaValue."')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
	if($affectedRows == 1)
	{
		$successMsg = "Record has been saved successfully";
	}
}



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $q = $_REQUEST['q'];

    $sql = "SELECT title, firstname, lastname FROM contacts WHERE id=$q";
    $rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);


    foreach ($results as $option) {
        // echo '<option>' . $option['firstname'] . " " . $option['lastname'] . '</option>';
    }

    
}


?>

<!DOCTYPE html>
<html>
    <head>
    <title>Info2180-Project2</title>
 
        <link rel="stylesheet" href="styless.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="scripts/createissue.js" type="text/javascript"></script> 
        <script src="notes.js" type="text/javascript"></script> 
         
    </head>

    <body>
        <div class= "header">
            <h1>&#128044; Dolphin CRM</h1> 
        </div>
        
         <div class = "sidebar">
            <div>
                <i class="fa fa-home"></i>
                <a href="dashboard.html">Home</a>
            </div>

            <div>
                <i class="fa fa-user-plus"></i>
                <a href="newContact.html">New Contact</a>
            </div>

            <div>
                <i class="far fa-user-circle"></i>
                <a href="UserCreation.html">Users</a>
            </div>

            <div class="line">
                <hr>
              </div>

            <div>
                <i class="fa fa-sign-out"></i>
                <a href="">Logout</a>
            </div>       

        </div>
        <div class= "notSidebar">
            <div id="head">
            <img src="./assets/blank avatar (2).jpg" alt="" id="avatar">
            <h2 id="newName">Mr. Michael Scott
                <span>Created on November 9 2022 by David Wallace</span>
                <span>Updated on November 13,2022</span>
            </h2> 
           
            <button id="Assign">&#128400; Assign to Me</button>
            <button id="SwitchSale">&#8644; Switch to Sales Lead</button>
       
        </div>
     
                <div class="boxx">
                    
                    <div class="container">
                    <!--You can add code inside this div--> 
                        <div id="loginboxsinfo">
                            <label for="email">Email<span>michaelscott@paper.co</span></label>
                           <!-- <input id="email" type="search" name="email" placeholder="Something@example.com" />--> 

                            <label for="telephone">Telephone<span>876-999-9999</span></label>
                            
                            <!--<input id="telephone" type="search" name="telephone" placeholder="876" />--> 

                            <label for="company">Company<span>The Paper Company</span></label>
                            
                            <!--<input id="company" type="search" name="company" placeholder="Dolphin" />--> 
                        
                            <label for="assigned to">Assigned to<span>Jen Leninson</span></label>
                            
                           <!-- <input id="assigned to" type="search" name="assigned to" placeholder="Jen Levinson" />--> 
                           
                           
                         <!--  <label for="role">Role</label>
                            <select id="role" name="role">
                                <option value="member">Member</option>
                                <option value="admin">Admin</option>
                            </select>--> 
                            </div>
                        </div>     
                    </div>
                    
                        <div class="container">
                            <div id="Notes">
                            <i class="fas fa-edit"></i>
                            <span id="Notes">Notes</span>
                             </div>
                             <div class="line">
                                <hr>
                                <?php foreach($notes as $item): ?>
                              </div>
                             <div id="notes">
                              <h3><?php echo $item['firstname'].' ' .$item['lastname']; ?></h3>
                              <p><?php echo $item['comment'];?></p>
                              <?php endforeach; ?>
                                <div id="note">
                                <h3>Add a Note About Michael</h3>
                                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                <div>
                                <textarea name="content"></textarea>
                                    </div>
                                <input type="submit"name="submit" value="Add Note">
                                    </form>
                                    <?php    
                                    if(isset($successMsg))
                                    {
                                        if(isset($successMsg)) 
                                        print_r($successMsg);
                                        echo "</div>";
                                    }?>
                                <!--<textarea id="textarea" name="comment" placeholder="Enter details here"></textarea>-->
                                    
                                <!--<button id="addNote">Add Note</button>-->
                                
                                </div>
                            </div>
                            </div>
                    </div>
                    
                </div>
            </section>
            <footer>
                <p>Copyright &copy; 2022, Dolphin CRM</p>
            </footer>
    </body>

</html>