<?php
include('dbConnection.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Add Member</title>
  <style>
    <?php include "addMember.css";
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


  $sql = "SELECT id FROM members ORDER BY id DESC limit 1";
  $query = mysqli_query($conn, $sql);
  $pull = mysqli_fetch_assoc($query);
  $maxID = $pull['id'];
  $maxID2 = mysqli_insert_id($conn);

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $apartmentIDErr = $unameErr = $pwdErr = $phoneNumberErr = $secondPhoneNumberErr = $whoseNumberErr = "";
  $apartmentIDErr2 = $phoneNumberErr2 = $secondPhoneNumberErr2 = $whoseNumberErr2 = $fullnameErr = "";



  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_SESSION['loggedIn']) {

      if (empty($_POST["apartmentID"])) {
        $apartmentIDErr = "*ApartmentID is required";
      } else if (!filter_var($_POST["apartmentID"], FILTER_VALIDATE_INT)) {
        $apartmentIDErr2 = "Apartment ID should be a number.";
      } else {
        $apartmentID = test_input($_POST["apartmentID"]);
        try {
          $sql2 = "SELECT COUNT(*) as count FROM members WHERE apartmentID = '$apartmentID'";
          $query2 = mysqli_query($conn, $sql2);
          $pull2 = mysqli_fetch_assoc($query2);
          if ($pull2['count'] > 0) {
            echo '<center>ApartmentID ALREADY IN USE</center>';
          }
        } catch (Exception $e) {
        }
      }
      if (empty($_POST['uname'])) {
        $unameErr = "*Username is required";
      } else {
        $uname = test_input($_POST['uname']);
      }
      if (empty($_POST['fullname'])) {
        $fullnameErr = "*Full name is required";
      } else {
        $fullname = test_input($_POST['fullname']);
      }
      if (empty($_POST['pwd'])) {
        $pwdErr = "*Password is required";
      } else {
        $pwd = md5(test_input($_POST['pwd']));
      }
      if (empty($_POST['phoneNumber'])) {
        $phoneNumberErr = "*Phone Number is required";
      } else if (!filter_var($_POST["phoneNumber"], FILTER_VALIDATE_INT)) {
        $phoneNumberErr2 = "PhoneNumber should be a number.";
      } else {
        $phoneNumber = test_input($_POST['phoneNumber']);
      }
      if (empty($_POST['secondPhoneNumber'])) {
        $secondPhoneNumberErr = "*Second Phone Number is required";
      } else if (!filter_var($_POST["secondPhoneNumber"], FILTER_VALIDATE_INT)) {
        $secondPhoneNumberErr2 = "Second Phone Number should be a number.";
      } else {
        $secondPhoneNumber = test_input($_POST['secondPhoneNumber']);
      }
      if (empty($_POST['whoseNumber'])) {
        $whoseNumberErr = "*Whose Phone number is required";
      } else if (filter_var($_POST["whoseNumber"], FILTER_VALIDATE_INT)) {
        $whoseNumberErr2 = "Whose Phone Number should be a word.";
      } else {
        $whoseNumber = test_input($_POST['whoseNumber']);
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
 

  $stmt = $conn->prepare("INSERT INTO members(apartmentID,fullname,username,password,phoneNumber,month,year,secondPhoneNumber,whoseNumber) VALUES (?,?,?,?,?,?,?,?,?)");
  if ($stmt != false) {
    $stmt->bind_param('sssssssss', $apartmentID, $fullname, $uname, $pwd, $phoneNumber,$month,$year, $secondPhoneNumber, $whoseNumber);
    if($stmt->execute()){
      ?> <p class="success"><?php echo "Insertion successful"; ?></p> <?php
   }else{
      ?> <p class="fail"><?php echo "Insertion failed"; ?></p> <?php
   }
    $stmt->close();
  } else {
    die('prepare() failed: ' . htmlspecialchars($conn->error));
  }
  if (!$_SESSION['username']) {
    echo "Please login first.";
  ?>
    <a id="loginn" href="GeneralLogin.html" title="generalLogin">Click to login</a>
  <?php
  }
}
  ?>

        <br><p id="title">Add New Member</p><br>

        <form id="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  
          <select class="form-control" name="apartmentID" id="apartmentID">
            <?php
            $monthErr = $yearErr = ""; ?>
            <option selected disabled>Apartment Number</option>
            <?php
            for ($i = 1; $i < 17; $i++) { ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>

          </select>
          <span class="error"> <?php echo $apartmentIDErr, $apartmentIDErr2; ?></span><br><br>
          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
          <span class="error"> <?php echo $fullnameErr; ?></span><br><br>
          <input type="text" class="form-control" id="uname" name="uname" placeholder="Username" required>
          <span class="error"> <?php echo $unameErr; ?></span><br><br>
          <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
          <span class="error"> <?php echo $pwdErr; ?></span><br><br>
          <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
          <span class="error"> <?php echo $phoneNumberErr; ?></span>
          <span class="error"> <?php echo $phoneNumberErr2; ?></span><br><br>

          <select class="form-control" name="month" class="form-control" required>
            <option disabled selected>Month</option>
            <?php for ($i = 1; $i < 13; $i++) { ?>
              <option><?php echo $i ?></option>
            <?php } ?>
          </select>
          <span class="error"> <?php echo $monthErr; ?></span><br><br>

          <select class="form-control" name="year" class="form-control" required>
            <option disabled selected>Year</option>
            <?php for ($i = 2000; $i < 2050; $i++) { ?>
              <option><?php echo $i ?></option>
            <?php } ?>
          </select>
          <span class="error"> <?php echo $yearErr; ?></span><br><br>
          <input class="form-control" type="text" id="secondPhoneNumber" name="secondPhoneNumber" placeholder="Second Phone Number" required>
          <span class="error"> <?php echo $secondPhoneNumberErr; ?></span><br><br>
          <input class="form-control" type="text" id="whoseNumber" name="whoseNumber" placeholder="Owner Of The Second Phone Number" required>
          <span class="error"> <?php echo $whoseNumberErr; ?></span><br><br>
          <input class="form-control" type="submit" value="Add" name="submit">
        </form>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="AdminMembers.php" class="previousPage" >Click to return to previous page.</a>
        
        
</body>
</html>