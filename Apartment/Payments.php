<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
  
    <title>Nature Apartment-Payments</title>
    <style>
<?php include "Payments.css";
      include "Payments.js" ;
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
   <li><a  href="HomePage.php">HomePage</a></li>
   <li><a href="Members.php">Members</a></li>
   <li><a class="active" href="Payments.php">Payments</a></li>
   <li><a href="GeneralExpenses.php">General Expenses</a> </li>
   <li><a href="Chat.php">Chat</a></li>
   <li><a href="Settings.php">Settings</a></li>
   <li><a href="logout.php">LogOut</a></li>
  
 
</ul></div>

  <div class="col-md-10"><br><br> <p id="month">November</p>
    <br><br><br>
    <p style="text-align: center; font-size: 15px;">IBAN: 00000000000000000000000000</p>
    <table class="table table-striped" style="text-align: center;">
<tr>
    <td>Apartment Number</td>
    <td>Cleaning(1)</td>
    <td>Repairing(If sth need to repair)(2)</td>
    <td>Elevator Maintenance(3)</td>
    <td>Gardening(4)</td>
    <td>Security(5)</td>
    <td>Salary For Apartment Manager(6)</td>
</tr>
<tr>
    <td>-</td>
    <td>$10</td>
    <td>-</td>
    <td>$5</td>
    <td>$5</td>
    <td>$15</td>
    <td>$25</td>
</tr>
    </table>
    <br><br><br><br><br><br>
    <h2 style="text-align: center; font-size: 25px;">My Invoices</h2>
    <br><br>
    <form id="submit" >
        <input type="file" id="file" name="fileName"><br><br>
        <input type="submit" name="Submit" >
      </form>
      <br><br><br><br><br><br><br>
    
      <img class="rose" src="roses.jpg" alt="rose"><img>
      <img class="rose" src="roses.jpg" alt="rose"><img>
      <img class="rose" src="roses.jpg" alt="rose"><img> 
      <img class="rose" src="roses.jpg" alt="rose"><img> 
    </div>
</div>
</div>

   






















</body>
</html>

