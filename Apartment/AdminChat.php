<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
    <title>Requests/Chat</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
<?php include "Chat.css";
      include "Chat.js" ;
      include "bootstrap.min.css";
      include "popper.js";
      include "bootstrap.min.js";
      include "jquery.js";
      include "fullcalendar-5.3.2/lib/main.min.css";
      include "fullcalendar-5.3.2/lib/main.min.js";
      ?>
</style>
    </head>
<body>
<?php
    if(!$_SESSION['username']){
    echo "Please login first.";
    ?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
    <?php
}
$un=$_SESSION['username'];
$sqlphoto = "SELECT * FROM admin where username='$un' ";
$queryphoto = mysqli_query($conn, $sqlphoto);

$pullphoto= mysqli_fetch_array($queryphoto);
?>

<div class="container-fluid">
<div class="row">
  <div class="col-md-2"><ul>
  <?php 
if($_SESSION['username']){ 
?>  
<br><br>
     <li>Welcome <?php echo $_SESSION['username'];} ?></li>
   <br><br><br>
   <li><a  href="AdminHomePage.php">HomePage</a></li>
   <li><a href="AdminMembers.php">Members</a></li>
   <li><a href="AdminPayments.php">Payments</a></li>
   <li><a href="AdminGeneralExpenses.php">General Expenses</a> </li>
   <li><a class="active" href="AdminChat.php">Chat</a></li>
   <li><a href="AdminSettings.php">Settings</a></li>
   <li><a href="Adminlogout.php">LogOut</a></li>
  
 
</ul></div>
<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

 date_default_timezone_set('Europe/Istanbul');
 $date = date("Y-m-d h:i:sa");
 $username = $_SESSION['username'];
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if(!empty($_POST['text'])){
 $text=test_input($_POST['text']);
   }
 }

 $stmt = $conn->prepare("INSERT INTO chat(username,message,time) VALUES (?,?,?)");
        if ($stmt != false) {
            $stmt->bind_param('sss',$username, $text, $date);
          $stmt->execute();
         
            $stmt->close();
        } else {
            die('prepare() failed: ' . htmlspecialchars($conn->error));
        }
    

        $sql3= "SELECT MAX(id) FROM chat";
        $query3=mysqli_query($conn, $sql3);
        $pull3 = mysqli_fetch_array($query3);
        $maxid = $pull3[0];
       
        ?>

  <div class="col-md-10"><br><br>
  
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 style="color:#455490;" >Requests/Complaint Chat</h2><br><br>
        <div class="w3-container">
       <?php 
   $sql2 = "SELECT * FROM chat ORDER BY id DESC LIMIT 5";
   $query2 = mysqli_query($conn, $sql2);
   while($pull2 = mysqli_fetch_array($query2)){ ?>
  <p><strong> <?php  echo $pull2['username'] ?>:</strong> <?php echo $pull2['message']; ?>(<?php echo $pull2['time']; ?>) </p> <br>
     <?php
   }
   
  ?>
        </div>
  <br><br>
  <div class="w3-container">
      <textarea class="form-control" name="text" style="width: 50%;height:15%;position:absolute;float:left;left:33.5%" required></textarea>
    
     <br><br><br><br><br><br>
     <input type="submit" name="Submit" value="Send!" style="position: absolute;float:left;left:55.5%">
  </div>
     </form>
     <br><br><br>
     <a style="position:absolute;float:left;left:49.5%;" href="allMessages.php" >Click to see all messages.</a>
</div></div>
</div>
</div>



</body>
</html>