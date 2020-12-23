<?php include('dbConnection.php'); 
session_start();
if(!$_SESSION['username']){
    echo "Please login first.";
    ?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
<?php }

date_default_timezone_set('Europe/Istanbul');
$lastMonth = date("m");
$lastYear = date("Y");

$id=$_GET['id'];

$sql="SELECT * FROM members WHERE id='$id'" ;
if($query=mysqli_query($conn,$sql)){
    $pull=mysqli_fetch_array($query);

    $apartmentID = $pull['apartmentID'];
    $fullname = $pull['fullname'];
    $phoneNumber = $pull['phoneNumber'];
    $firstMonth = $pull['month'];
    $firstYear = $pull['year'];
    $secondPhoneNumber = $pull['secondPhoneNumber'];
    $whoseNumber = $pull['whoseNumber'];
}
   
$sql2="INSERT INTO previousmembers(apartmentID,fullName,phoneNumber,firstMonth,firstYear,lastMonth,lastYear,secondPhoneNumber,whoseNumber) 
VALUES(?,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql2);
if($stmt != false){
$stmt->bind_param('sssssssss',$apartmentID,$fullname,$phoneNumber,$firstMonth,$firstYear,$lastMonth,$lastYear,$secondPhoneNumber,$whoseNumber);
$stmt->execute();
$stmt->close();
}
else{
    die('prepare() failed: ' . htmlspecialchars($conn->error));
}

$sql3="DELETE FROM members WHERE id='$id'" ;
if($query=mysqli_query($conn,$sql3)){
    header("Location:AdminMembers.php");
    exit;
}



?>