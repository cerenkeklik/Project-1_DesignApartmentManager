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
   <li><a href="AdminHomePage.php">HomePage</a></li>
   <li><a class="active" href="AdminMembers.php">Members</a></li>
   <li><a href="AdminPayments.php">Payments</a></li>
   <li><a href="AdminGeneralExpenses.php">General Expenses</a> </li>
   <li><a href="AdminChat.php">Chat</a></li>
   <li><a href="AdminSettings.php">Settings</a></li>
   <li><a href="Adminlogout.php">LogOut</a></li>
  
</ul></div>
<div class="col-md-8">
  <br><br>
<h2 id="memberTitle">Members</h2>
<br><br><br><br>
<table class="table table-striped" style="text-align: center; width:60%;position:absolute;float:left;left:23%;">
<tr>
    <td style="color: #455490;">Apartment Number</td>
    <td style="color: #455490;">Full Name</td>
    <td style="color: #455490;">Phone Number</td>
    <td style="color: #455490;">Moving Date</td>
    <td style="color: #455490;">Second Phone Number</td>
    <td style="color: #455490;">Owner Of The Second Phone Number</td>
    <td style="color: #455490;">Delete</td>
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
              <td><?php echo $pull['month']; ?>/<?php echo $pull['year']; ?></td>
              <td><?php echo $pull['secondPhoneNumber'];?></td>
              <td><?php echo $pull['whoseNumber'];  ?></td>
              <td><a href="deleteMember.php?id=<?php echo $pull['id']; ?>" onclick="return confirm('Are you sure you want to delete this member?');" class="btn btn-danger btn-sm">X</button></td>
              </tr>
              <?php } ?>
          
</table>
</div>
<div class="col-md-2"><br><br>
<a href="addMember.php" class="update" type="button">Add New Member</a><br><br><br><br>
<a href="previousMembers.php" class="previousMembers" type="button">Previous Members</a><br>
</div> 
</div>
</div>



</body>
</html>