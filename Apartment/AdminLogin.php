<?php 
include('dbConnection.php'); 
session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Nature Apartment-Admin Login</title>
    <style>
  <?php include "AdminLogin.css";
      ?>
      
</style>
</head>

<body>
    <?php
  function test_input($data)
  {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }
   $unameErr = $pwdErr = "";





if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["uname"]) || empty($_POST["pwd"])){
 echo "All fields are required.";
  }
  else{
        $uname =$_REQUEST['uname'];
        $pwd = md5($_REQUEST['pwd']);
        $sql="SELECT * FROM admin ";
        $result= mysqli_query($conn,$sql);
       
      if(mysqli_num_rows($result) !=0){
       
       while( $row=mysqli_fetch_assoc($result)){
            $dbUsername = $row['username'];
            $dbPassword = $row['password'];
            
       
            if($uname == $dbUsername && $pwd == $dbPassword){

              $_SESSION['username']= $dbUsername;
              $_SESSION['password']= $dbPassword;
             
              $_SESSION['loggedIn'] = true;

                header("Location: AdminHomePage.php");  
                
              }
        }
      
        if("Location: AdminLogin.html"){
            echo "Invalid username or password.";
        }
      }
   }
    }  

    ?>
    
    <br>
    <h1>Admin Login</h1>
    <br><br><br>
    <form id="form" method="POST" >
        <label for="username">Username</label><br>
        <input type="text" id="uname" name="uname" required><br><br>
        <label for="Password">Password</label><br>
        <input type="password" id="password" name="pwd" required><br><br>
        <input  type="submit" value="Login" name="submit" >
      </form>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <a id="fp" href="#forgotPassword">I forgot my password.</a>
      <a id="al" href="Login.php">Log in as User</a>

      
   </body>
   </html>
     