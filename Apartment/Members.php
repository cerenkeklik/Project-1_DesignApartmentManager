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
   <li><a  href="AdminMembers.php">Members</a></li>
   <li><a class="active" href="Payments.php">Payments</a></li>
   <li><a href="GeneralExpenses.php">General Expenses</a> </li>
   <li><a href="Chat.php">Chat</a></li>
   <li><a href="Settings.php">Settings</a></li>
   <li><a href="logout.php">LogOut</a></li>
  
</ul></div>
<div class="col-md-10"><br><br>
<h2 style="text-align: center;">Members</h2>
<br><br>
<table class="table table-striped" style="text-align: center;">
<tr>
    <td>Apartment Number</td>
    <td>Full Name(1)</td>
    <td>Phone Number(2)</td>
</tr>
<tr>
    <td>01</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>

</tr>
<tr>
    <td>02</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>
<tr>
    <td>03</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>
<tr>
    <td>04</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>
<tr>
    <td>05</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>
<tr>
    <td>06</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>
<tr>
    <td>07</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>
<tr>
    <td>08</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>
<tr>
    <td>09</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>
<tr>
    <td>10</td>
    <td>John Doe</td>
    <td>555 555 55 55</td>
</tr>

</table>

</div>
</div>
</div>







</body>
</html>