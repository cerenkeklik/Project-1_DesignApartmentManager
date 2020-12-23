<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
    <title>Requests/Chat</title>
    <style>
<?php include "Chat.css";
      include "Chat.js" ;
      include "bootstrap.min.css";
      include "popper.js";
      include "bootstrap.min.js";
      include "jquery.js";
      include "fullcalendar-5.3.2/lib/main.min.css";
      include "fullcalendar-5.3.2/lib/main.min.js";
      ?>
</style>
    </head>
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
   <li><a  href="AdminHomePage.php">HomePage</a></li>
   <li><a href="AdminMembers.php">Members</a></li>
   <li><a href="AdminPayments.php">Payments</a></li>
   <li><a href="AdminGeneralExpenses.php">General Expenses</a> </li>
   <li><a class="active" href="AdminChat.php">Chat</a></li>
   <li><a href="AdminSettings.php">Settings</a></li>
   <li><a href="Adminlogout.php">LogOut</a></li>
  
 
</ul></div>

  <div class="col-md-10"><br><br>
  <form>
        <h2 style=" text-decoration: underline;" >Requests/Complaint Chat</h2>
        <br><br><br>
        <p id="ent" style="text-align: center;"  ></p>
        <br><br><br>
     <textarea name="announc" rows= "5" cols="80" ></textarea>
    </form>
     <br><br><br><br><br><br>
     <button type="button" onclick="" >Publish!</button>
     <script>  
        var d = new Date();
           d.setHours(17);
           d.setDate(26);
       document.getElementById("ent").innerHTML="John Doe:" +"Can you talk with cleaning company about their cleaning property? " + "(Written at :" +d +")";
</script>
</div></div>
</div>
</div>

       

















</body>
</html>