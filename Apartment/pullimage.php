<?php include('dbConnection.php'); 
session_start();
if(!$_SESSION['username']){
    echo "Please login first.";
    ?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
<?php }


$id=$_GET['ID'];

$sql="SELECT File FROM invoices WHERE ID='$id'" ;
$query=mysqli_query($conn,$sql);
if($pull=mysqli_fetch_array($query)){
   $pull['File'];
}

?>