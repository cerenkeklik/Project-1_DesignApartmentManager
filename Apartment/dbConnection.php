<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "apartment";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    mysqli_select_db($conn,'apartment') or die(mysqli_connect_error());
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
 
   
   
    
    ?>