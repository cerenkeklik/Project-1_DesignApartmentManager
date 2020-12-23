<?php include('dbConnection.php'); 
session_start();
if(!$_SESSION['username']){
    echo "Please login first.";
    ?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
<?php }


$id=$_GET['id'];

$sql="DELETE FROM payments WHERE id='$id'" ;
if($query=mysqli_query($conn,$sql)){
    header("Location:AdminPayments.php");
    exit;
}

?>