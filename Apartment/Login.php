<?php 
include('dbConnection.php');
session_start(); 
  ?>
<!DOCTYPE html>
<head>
   
    <title>Nature Apartment-Login</title>
    <style>
  <?php include "Login.css";
     ?>
      
</style>
</head>
<body>
<?php
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
      if(empty($_REQUEST['uname']) || empty($_REQUEST['pwd'])){
        echo "All fields are required.";
      }
      else{
          $uname= $_REQUEST['uname'];
          $pwd= md5($_REQUEST['pwd']);
          $sql="SELECT * FROM members ";
          $result= mysqli_query($conn,$sql);
         
        if(mysqli_num_rows($result) !=0){
         
         while( $row=mysqli_fetch_assoc($result)){
              $dbUsername = $row['username'];
              $dbPassword = $row['password'];
              $apartmentID = $row['apartmentID'];
         
              if($uname == $dbUsername && $pwd == $dbPassword){
  
                $_SESSION['username']= $dbUsername;
                $_SESSION['password']= $dbPassword;
                $_SESSION['apartmentID'] = $apartmentID;
                $_SESSION['loggedIn'] = true;
                  header("Location: HomePage.php");  
                  
                }
          }
        
          if("Location: Login.php"){
              echo "Invalid username or password.";
          }
        
     }
      } 
  }
      ?>

    <br>
    <h1>Login</h1>
    <br><br><br>
    <form id="form" method="POST">
        <label for="username">Username</label><br>
        <input type="text" id="uname" name="uname" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" id="pwd" name="pwd" required><br><br>
        <input  type="submit" value="Login" name="submit" >
      </form>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <a id="fp" href="#forgotPassword">I forgot my password.</a>
      <a id="al" href="AdminLogin.php">Log in as Admin</a>
   
     


</body>
</html>