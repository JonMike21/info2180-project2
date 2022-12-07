<?php
include "config.php";
define('DB_HOST','localhost');
define('DB_USER','project2_user');
define('DB_PASS','password123');
define('DB_NAME','dolphin_crm');

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$contid = $_REQUEST['p'];
$UID = $_SESSION["user_id"];

$sql= 'SELECT * FROM notes';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);


//$sqql='SELECT contacts.firstname,contacts.lastname,notes.comment,contacts.id,notes.contact_id FROM contacts JOIN notes ON contacts.id=notes.contact_id';
$sqql='SELECT contacts.firstname,contacts.lastname,notes.comment,contacts.id,notes.contact_id,contacts.email,contacts.telephone,contacts.company,contacts.created_at,contacts.updated_at,contacts.assigned_to FROM contacts JOIN notes ON contacts.id=notes.contact_id';
$result = mysqli_query($conn, $sqql);
$notes = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sqqll="SELECT contacts.firstname,contacts.lastname,contacts.id,users.id,contacts.email,contacts.telephone,contacts.company,contacts.created_at,contacts.updated_at,contacts.assigned_to FROM contacts JOIN users ON contacts.id=users.id";
$result = mysqli_query($conn, $sqqll);
$adm = mysqli_fetch_all($result, MYSQLI_ASSOC);

$usr = "SELECT * FROM users";
$spurm = mysqli_query($conn, $usr);
$balls = mysqli_fetch_all($spurm, MYSQLI_ASSOC);


if($_SERVER['REQUEST_METHOD']==='POST'){
    $textarea = filter_input(INPUT_POST, 'textarea', FILTER_SANITIZE_STRING);
    echo $textarea;
}
foreach($adm as $item) if($item['id']==$contid) $us=$item;

if(isset($_POST['submit']))
{
	$textareaValue = trim($_POST['content']);
	//$sql = "insert into notes (contact_id,comment,created_by) values ('".$UID.",".$textareaValue.",".$UID."')";
    $sql="INSERT INTO `notes` (contact_id,comment,created_by) VALUES ('$contid', '$textareaValue', '$UID')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
}
if(isset($_POST['Assign']))
{
    $sql="UPDATE TABLE `contacts` SET assigned_to=$UID WHERE $contid=contacts.id";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
}
if(isset($_POST['SwitchSale']))
{
    $sql="INSERT INTO `notes` (contact_id,comment,created_by) VALUES ('$contid', '$textareaValue', '$UID')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
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
            <h2><?php echo $us['firstname'].' ' .$us['lastname'];?><span>Created On <?php echo $us['created_at']?></span><span>Updated On <?php echo $us['updated_at']?></span></h2> 
           
            <button id="Assign" type="Assign">&#128400; Assign to Me</button>
            <button id="SwitchSale" type="SwitchSale">&#8644; Switch to Sales Lead</button>
       
        </div>
     
                <div class="boxx">
                    
                    <div class="container">
                    <!--You can add code inside this div--> 
                        <div id="loginboxsinfo">
                            <label for="email">Email<span><?php echo $us['email']?></span></label>
                           <!-- <input id="email" type="search" name="email" placeholder="Something@example.com" />--> 

                            <label for="telephone">Telephone<span><?php echo $us['telephone']?></span></label>
                            
                            <!--<input id="telephone" type="search" name="telephone" placeholder="876" />--> 

                            <label for="company">Company<span><?php echo $us['company']?></span></label>
                            
                            <!--<input id="company" type="search" name="company" placeholder="Dolphin" />--> 
                        
                            <label for="assigned to">Assigned to<span><?php foreach($balls as $item) if($item['id']==$us['assigned_to']) echo $item['firstname'].' ' .$item['lastname']?></span></label>
                            
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
                                <?php foreach ($notes as $item):
                                    if ($item['contact_id'] == $contid) { ?>
                              </div>
                             <div id="notes">
                              <h3><?php echo $item['firstname'] . ' ' . $item['lastname']; ?></h3>
                              <p><?php echo $item['comment']; ?></p>
                              <?php }endforeach; ?>
                                <div id="note">
                                <h3>Add a Note About <?php  echo $us['firstname']?></h3>
                                <form method="post">
                                <div>
                                <textarea name="content"></textarea>
                                    </div>
                                <input type="submit"name="submit" value="Add Note">
                                    </form>
                               
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