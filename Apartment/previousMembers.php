<?php include('dbConnection.php'); 
session_start();
if(!$_SESSION['username']){
    echo "Please login first.";
    ?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
<?php } ?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="previousMembers.css">
    <style>
<?php include "previousMembers.css";
      include "bootstrap.min.css";
      include "popper.js";
      include "bootstrap.min.js";
      include "jquery.js";
      ?>
</style>

</head>
<body>
    <br>
    <h2 class="title">Previous Members</h2>
    <br>
<table class="table table-striped" id="table" >
<tr>
    <td style="color: #455490;">Apartment Number</td>
    <td style="color: #455490;">Full Name</td>
    <td style="color: #455490;">Phone Number</td>
    <td style="color: #455490;">Date Of Moving To Here</td>
    <td style="color: #455490;">Date Of Moving From Here</td>
    <td style="color: #455490;">Second Phone Number</td>
    <td style="color: #455490;">Owner Of The Second Phone Number</td>
    
</tr>
<?php
$sql="SELECT * FROM previousmembers ORDER BY lastYear DESC, lastMonth DESC" ;
$query=mysqli_query($conn,$sql);
  while($pull=mysqli_fetch_array($query)){
?>
    <tr>
    <td><?php echo $pull['apartmentID']; ?></td>
    <td><?php echo $pull['fullname']; ?></td>
    <td><?php echo $pull['phoneNumber']; ?></td>
    <td><?php echo $pull['firstMonth']; ?>/<?php echo $pull['firstYear']; ?></td>
    <td><?php echo $pull['lastMonth']; ?>/<?php echo $pull['lastYear']; ?></td>
    <td><?php echo $pull['secondPhoneNumber'];?></td>
    <td><?php echo $pull['whoseNumber'];  ?></td>
  </tr>
  <?php } ?>
 </table>
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <a href="AdminMembers.php" class="previousPage" >Click to return to previous page.</a>
 </body>
</html>
   