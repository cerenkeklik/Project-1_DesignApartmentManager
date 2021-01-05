<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
    <title>Settings</title>
    <style>
<?php include "Settings.css";
      
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
  $sql = "SELECT * FROM members where username='$un' ";
  $query = mysqli_query($conn, $sql);

 $pull= mysqli_fetch_array($query);
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
   <li><a href="HomePage.php">HomePage</a></li>
   <li><a href="Members.php">Members</a></li>
   <li><a href="Payments.php">Payments</a></li>
   <li><a href="GeneralExpenses.php">General Expenses</a> </li>
   <li><a href="Chat.php">Chat</a></li>
   <li><a class="active" href="Settings.php">Settings</a></li>
   <li><a href="logout.php">LogOut</a></li>
  
 
</ul></div>

  <div class="col-md-10"><br><br>
  <br><br>

<table  style="width: 30%;position:absolute;float:left;left:42%;text-align:center;height:50%;font-size:20px;">

<tr>
  <td><?php echo $pull['fullname'] ?></td>
</tr>
<tr>
 <td>Apartment Number: <?php echo $pull['apartmentID'] ?></td>
</tr>
<tr>
 <td>Phone Number: <?php echo $pull['phoneNumber'] ?></td>
</tr>


<?php ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a class="changePassword" href="updateInfo.php" >I want to change my informations.</a>
  
        
</div>
</div>
</div>
       
</body>
</html>