<?php
session_start();
include('dbConnection.php');

if (!$_SESSION['username']) {
    echo "Please login first.";
?>
<html>
<head>
</head>
<body style="font-family: monospace;">
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
<?php
}

  $un=$_SESSION['username'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
 
    $password = md5($_POST['pwd']);
    $phoneNumber=$_POST['phoneNumber'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
  }

?>

<br><br>
<h3 style="text-align: center;">UPDATE SETTINGS</h3>
<form method="POST"  enctype="multipart/form-data" style="width: 40%;position:absolute;float:left;left:43.5%;"><br><br><br><br>
<input type="text" class="form-control" name="fullname" placeholder="Full Name" required><br><br>
<input type="text" class="form-control"  name="username" placeholder="Username" required><br><br>
<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required><br><br>
<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required><br><br>
  
  <input type="submit" name="submit">
  
</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a style="position:absolute;float:left;left:43%;" href="AdminSettings.php" >Click to return previous page.</a>
<?php
if(isset($_POST['submit'])){
  $_SESSION['username']=$username;
$stmt = $conn->prepare("UPDATE admin SET fullname=?, username=? ,password=? ,phoneNumber=? WHERE id=2");
if ($stmt != false) {
    $stmt->bind_param('ssss',$fullname,$username,$password,$phoneNumber);
   $stmt->execute();
    $stmt->close();
} else {
    die('prepare() failed: ' . htmlspecialchars($conn->error));
}
}

 ?>
</body>
</html>