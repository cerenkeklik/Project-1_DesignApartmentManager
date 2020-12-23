<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
    <title>Nature Apartment-General Expenses</title>
    <style>
<?php include "AdminGeneralExpenses.css";
      include "AdminGeneralExpenses.js" ;
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
   <li><a href="Members.php">Members</a></li>
   <li><a href="Payments.php">Payments</a></li>
   <li><a class="active"  href="GeneralExpenses.php">General Expenses</a> </li>
   <li><a href="Chat.php">Chat</a></li>
   <li><a href="Settings.php">Settings</a></li>
   <li><a href="logout.php">LogOut</a></li>
  
 
</ul></div>

  <div class="col-md-10"><br><br>
  <p style="font-size: 35px; text-align: center;">November</p>
  <br>
<table class="table table-striped" style="width: 60%;position:absolute;float:left;left:28%; " >
<tr>
    <td>(0)Cleaning</td>
    <td>$500</td>
</tr>
<tr>
    <td>(1)Repairing(If sth need to repair)</td>
    <td>-</td>
</tr>
<tr>
    <td>(2)Elevator Maintenance</td>
    <td>$100</td>
</tr>
<tr>
    <td>(3)Gardening</td>
    <td>$500</td>
</tr>
<tr>
    <td>(4)Security</td>
    <td>$2000</td>
</tr>
<tr>
    <td>(5)Salary For Apartment Manager</td>
    <td>$400</td>
</tr>
<tr>
    <td>(6)Total</td>
    <td>$3500</td>
</tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h2>Invoices</h2>
<br><br>


<img class="rose" src="roses.jpg" alt="rose"><img>
<img class="rose" src="roses.jpg" alt="rose"><img>
<img class="rose" src="roses.jpg" alt="rose"><img> 
<img class="rose" src="roses.jpg" alt="rose"><img> 
</div></div>
</div>
</div>
<br><br><br><br>


</body>
</html>