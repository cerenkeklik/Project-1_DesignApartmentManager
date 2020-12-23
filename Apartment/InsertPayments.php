<?php
include('dbConnection.php');
session_start();
?>
<!DOCTYPE html>

<head>

  <title>Insert New Payment</title>
  <style>
    <?php include "InsertPayments.css";
    include "InsertPayments.js";
    include "bootstrap.min.css";
    include "popper.js";
    include "bootstrap.min.js";
    include "jquery.js";
    include "fullcalendar-5.3.2/lib/main.min.css";
    include "fullcalendar-5.3.2/lib/main.min.js";
    ?>
  </style>
</head>

<body>
  <?php
  if (!$_SESSION['username']) {
    echo "Please login first.";
  ?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
  <?php
  }
  ?>

  

      <?php
      function test_input($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $priceErr = $monthErr = $yearError = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit'])) {
          if ($_SESSION['loggedIn']) {
            if (empty($_POST['price'])) {
              $priceErr = "*Price is required";
            } else if (!filter_var($_POST["price"], FILTER_VALIDATE_INT)) {
              $priceErr = "Price should be a number.";
            } else {
              $price = test_input($_POST['price']);
            }
            if (empty($_POST['month'])) {
              $monthErr = "*Please choose a month";
          } else {
              $month = $_POST['month'];
          }
          if (empty($_POST['year'])) {
              $yearErr = "*Please choose a year";
          } else {
              $year = $_POST['year'];
          }
          } else {
            "Please login first";
          }
        }
     

      $apartmentID = 0;
      date_default_timezone_set('Europe/Istanbul');
      $date = date("Y-m-d h:i:sa");
      $stmt = $conn->prepare("INSERT INTO payments(apartmentID,month,year,price,date) VALUES (?,?,?,?,?)" );
      if ($stmt != false) {
        $stmt->bind_param('sssss', $apartmentID, $month, $year, $price,$date);
        if($stmt->execute()){
          ?> <p class="success"><?php echo "Insertion successful"; ?></p> <?php
       }else{
          ?> <p class="fail"><?php echo "Insertion failed"; ?></p> <?php
       }
        $stmt->close();
      } else {
        die('prepare() failed: ' . htmlspecialchars($conn->error));
      }
    }
      ?>
<br>
       <p class="title">Add New Payment</p><br>
        <form method="POST" id="form">
        <input class="form-control" id="disabledInput" type="text" placeholder="ApartmentID=0" disabled><br><br>
          <select name="month" class="form-control" required>
            <option disabled selected>Month</option>
            <?php for ($i = 1; $i < 13; $i++) { ?>
              <option><?php echo $i ?></option>
            <?php } ?>
          </select><br><br>

          <select name="year" class="form-control">
            <option disabled selected>Year</option>
            <?php for ($i = 2020; $i < 2050; $i++) { ?>
              <option><?php echo $i ?></option>
            <?php } ?>
          </select><br><br>

          <input type="text" class="form-control" name="price" placeholder="Price" required>
          <span class="error"> <?php echo $priceErr; ?></span><br><br>
          <input type="submit" value="Add" name="submit" id="submit">
        </form>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="AdminPayments.php" class="previousPage" >Click to return to previous page.</a>
  
</body>

</html>