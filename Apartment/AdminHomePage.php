<?php 
include("dbConnection.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<meta charset='utf-8' />
<link rel="stylesheet" href="AdminHomePage.css">
<link rel="stylesheet" href="bootstrap.min.css">
<script type="text/javascript" src="AdminHomePage.js"></script>
<script type="text/javascript" src="popper.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<link rel='stylesheet' type='text/css' href="fullcalendar-5.3.2/lib/main.min.css" />
<script type='text/javascript' src="fullcalendar-5.3.2/lib/main.min.js"></script>

<style>
<?php include "AdminHomePage.css";
      include "AdminHomePage.js" ;
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
   <li><a class="active" href="AdminHomePage.php">HomePage</a></li>
   <li><a href="AdminMembers.php">Members</a></li>
   <li><a href="AdminPayments.php">Payments</a></li>
   <li><a href="AdminGeneralExpenses.php">General Expenses</a> </li>
   <li><a href="AdminChat.php">Chat</a></li>
   <li><a href="AdminSettings.php">Settings</a></li>
   <li><a href="Adminlogout.php">LogOut</a></li>
  
 
</ul></div>

  <div class="col-md-10"><br><br><div id="calendar"></div></div>
</div>
</div>


</body>
</html>