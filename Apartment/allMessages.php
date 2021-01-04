<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<head>
    <title>Requests/Chat</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
<?php include "allMessages.css";
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

$sql2 = "SELECT * FROM chat ORDER BY id DESC ";
$query2 = mysqli_query($conn, $sql2);
while($pull2 = mysqli_fetch_array($query2)){ ?>
<p> <strong><?php  echo $pull2['username'] ?>:</strong> <?php echo $pull2['message']; ?>(<?php echo $pull2['time']; ?>) </p> <br>
  <?php
}
?>
</body>
</html>