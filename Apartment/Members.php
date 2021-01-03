<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
    
    <title>Members</title>
    <link rel="stylesheet" href="Members.css">
<link rel="stylesheet" href="bootstrap.min.css">
<script type="text/javascript" src="Members.js"></script>
<script type="text/javascript" src="popper.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>

<style>
<?php include "Members.css";
      include "Members.js" ;
      include "bootstrap.min.css";
      include "popper.js";
      include "bootstrap.min.js";
      include "jquery.js";
      
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
   <li><a href="HomePage.php">HomePage</a></li>
   <li><a class="active" href="Members.php">Members</a></li>
   <li><a  href="Payments.php">Payments</a></li>
   <li><a href="GeneralExpenses.php">General Expenses</a> </li>
   <li><a href="Chat.php">Chat</a></li>
   <li><a href="Settings.php">Settings</a></li>
   <li><a href="logout.php">LogOut</a></li>
  
</ul></div>
<div class="col-md-10"><br><br>
<h2 >Members</h2>
<br><br>
<table class="table table-striped" style="text-align: center; width:60%;position:absolute;float:left;left:28%;">
<tr>
    <td style="color: #455490;">Apartment Number</td>
    <td style="color: #455490;">Full Name</td>
    <td style="color: #455490;">Phone Number</td>
    <td style="color: #455490;">Moving Date</td>
</tr>
<?php
$sql = "SELECT * FROM members ORDER BY apartmentID ASC";
$query=mysqli_query($conn,$sql);
              while($pull=mysqli_fetch_array($query)) {
              ?>
              <tr>
              <td><?php echo $pull['apartmentID']; ?></td>
              <td><?php echo $pull['fullname']; ?></td>
              <td><?php echo $pull['phoneNumber']; ?></td>
              <td><?php echo $pull['month']; ?>/<?php echo $pull['year']; ?></td>
              
              </tr>
              <?php } ?>


</table>

</div>
</div>
</div>







</body>
</html>