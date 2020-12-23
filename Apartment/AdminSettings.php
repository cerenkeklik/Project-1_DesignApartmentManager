<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
    <title>Settings</title>
    <style>
<?php include "AdminSettings.css";
      include "AdminSettings.js" ;
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
?>

<div class="container-fluid">
<div class="row">
  <div class="col-md-2"><ul>
  <?php 
if($_SESSION['username']){ 
?>  
<br>
     <li>Welcome <?php echo $_SESSION['username'];} ?></li>
   <br>
   <li><img  id="pp" src="roses.jpg"></img></li>
   <br><br>
   <li><a href="AdminHomePage.php">HomePage</a></li>
   <li><a href="AdminMembers.php">Members</a></li>
   <li><a href="AdminPayments.php">Payments</a></li>
   <li><a href="AdminGeneralExpenses.php">General Expenses</a> </li>
   <li><a href="AdminChat.php">Chat</a></li>
   <li><a class="active" href="AdminSettings.php">Settings</a></li>
   <li><a href="Adminlogout.php">LogOut</a></li>
  
 
</ul></div>

  <div class="col-md-10"><br><br>
  <img id="profilepic" src="roses.jpg" alt="profilepic">
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <h2 id="name">John Doe</h2>
        <br><br><br>
        <p id="num">01</p>
        <br><br>
        <p id="phoneNum">555 555 55 55</p>
        <br><br> <br><br>
        <a class="addMember" href="addMember.php" >Add new member.</a>
        <br><br>
        <a class="changePassword" href="changePassword" >I want to change my password.</a>
</div>
</div>
</div>
       >









</body>
</html>