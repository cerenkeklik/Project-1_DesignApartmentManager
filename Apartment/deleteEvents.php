<?php include('dbConnection.php'); 
session_start();
if(!$_SESSION['username']){
    echo "Please login first.";
    ?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
<?php }
if(isset($_POST['id'])){
$id = $_POST['id'];
}

$sql="DELETE FROM events WHERE id=?" ;
$stmt = $conn->prepare($sql);
if ($stmt != false) {
  $stmt->bind_param('i',$id);
$stmt->execute();

}else {
  die('prepare() failed: ' . htmlspecialchars($conn->error));
}

?>