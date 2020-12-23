<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
    <title>Members</title>
    <link rel="stylesheet" href="AdminMembers.css">
    <style>
<?php include "AdminMembers.css";
      include "AdminMembers.js" ;
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
   <li><a class="active" href="AdminMembers.php">Members</a></li>
   <li><a href="AdminPayments.php">Payments</a></li>
   <li><a href="AdminGeneralExpenses.php">General Expenses</a> </li>
   <li><a href="AdminChat.php">Chat</a></li>
   <li><a href="AdminSettings.php">Settings</a></li>
   <li><a href="Adminlogout.php">LogOut</a></li>
  
</ul></div>
<div class="col-md-10"><br><br>
<a href="#" class="update" type="button">Update Members</a><br>
<h2 style="text-align: center; color:#455490; font-size:36px; ">Members</h2>
<br><br>
<table class="table table-striped" style="text-align: center; width:60%;position:absolute;float:left;left:29%;">
<tr>
    <td style="color: #455490;">Apartment Number</td>
    <td style="color: #455490;">Full Name</td>
    <td style="color: #455490;">Phone Number</td>
    <td style="color: #455490;">Second Phone Number</td>
    <td style="color: #455490;">Owner Of The Second Phone Number</td>
</tr>
              <?php  
              $sql="SELECT * FROM members ORDER BY apartmentID ASC";
              $query=mysqli_query($conn,$sql);
              while($pull=mysqli_fetch_array($query)) {
              ?>
              <tr>
              <td><?php echo $pull['apartmentID']; ?></td>
              <td><?php echo $pull['fullname']; ?></td>
              <td><?php echo $pull['phoneNumber']; ?></td>
              <td><?php echo $pull['secondPhoneNumber'];?></td>
              <td><?php echo $pull['whoseNumber'];  ?></td>
              </tr>
              <?php } ?>
          
    

</table>

</div>
</div>
</div>



</body>
</html>