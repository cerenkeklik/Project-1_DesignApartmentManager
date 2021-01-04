<?php
include('dbConnection.php');

if (!$_SESSION['username']) {
    echo "Please login first.";
?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
<?php
}










 ?>