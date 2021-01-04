<?php 
include("dbConnection.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<meta charset='utf-8' />
<head>
<link rel="stylesheet" href="HomePage.css">
<link rel="stylesheet" href="bootstrap.min.css">
<script type="text/javascript" src="HomePage.js"></script>
<script type="text/javascript" src="popper.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<link rel='stylesheet' type='text/css' href="fullcalendar-5.3.2/lib/main.min.css" />
<script type='text/javascript' src="fullcalendar-5.3.2/lib/main.min.js"></script>
<style>
<?php include "HomePage.css";
      include "HomePage.js" ;
      include "bootstrap.min.css";
      include "popper.js";
      include "bootstrap.min.js";
      include "jquery.js";
      include "fullcalendar-5.3.2/lib/main.min.css";
      include "fullcalendar-5.3.2/lib/main.min.js";
      ?>
</style>
    <title>Homepage</title>
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
$sqlphoto = "SELECT * FROM members where username='$un' ";
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
   <li><a class="active" href="HomePage.php">HomePage</a></li>
   <li><a href="Members.php">Members</a></li>
   <li><a href="Payments.php">Payments</a></li>
   <li><a href="GeneralExpenses.php">General Expenses</a> </li>
   <li><a href="Chat.php">Chat</a></li>
   <li><a href="Settings.php">Settings</a></li>
   <li><a href="logout.php">LogOut</a></li>
  
 
</ul></div>

  <div class="col-md-10"><br><br><div id="calendar"></div></div>
</div>
</div>

    
    
    </body>
    </html>