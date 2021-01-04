<?php
session_start();
include('dbConnection.php');

if (!$_SESSION['username']) {
    echo "Please login first.";
?>
<html>
<head></head>
<body>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>

<?php
}

  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = md5($_POST['pwd']);
    $phoneNumber=$_POST['phoneNumber'];
    $aptID=$_SESSION['apartmentID'];
  }

?>
<br><br>
<h3 style="text-align: center;">UPDATE SETTINGS</h3>
<form method="POST" style="width: 40%;position:absolute;float:left;left:43.5%;"><br><br><br><br>
<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required><br><br>
<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required><br><br>
  <input type="submit" name="submit">
  
</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a style="position:absolute;float:left;left:41.5%;" href="Settings.php" >Click to return previous page.</a>
<?php
if(isset($_POST['submit'])){
  
$stmt = $conn->prepare("UPDATE members SET password=?, phoneNumber=? WHERE apartmentID=?");
if ($stmt != false) {
    $stmt->bind_param('sss',$password,$phoneNumber,$aptID);
   $stmt->execute();
    $stmt->close();
} else {
    die('prepare() failed: ' . htmlspecialchars($conn->error));
}
}


 ?>
</body>
</html>