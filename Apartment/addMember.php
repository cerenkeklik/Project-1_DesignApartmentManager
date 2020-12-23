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
      if ($maxID2++) {
        echo "New member added.";
      }
    } else {
      "Please login first";
    }
  }

  $stmt = $conn->prepare("INSERT INTO members(apartmentID,fullname,username,password,phoneNumber,secondPhoneNumber,whoseNumber) VALUES (?,?,?,?,?,?,?)");
  if ($stmt != false) {
    $stmt->bind_param('sssssss', $apartmentID, $fullname, $uname, $pwd, $phoneNumber, $secondPhoneNumber, $whoseNumber);
    $stmt->execute();
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
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <ul>
          <?php
          if ($_SESSION['username']) {
          ?>
            <br>
            <li>Welcome <?php echo $_SESSION['username'];
                      } ?></li>
            <br>
            <li><img id="pp" src="roses.jpg"></img></li>
            <br><br>
            <li><a href="AdminHomePage.php">HomePage</a></li>
            <li><a href="AdminMembers.php">Members</a></li>
            <li><a href="AdminPayments.php">Payments</a></li>
            <li><a href="AdminGeneralExpenses.php">General Expenses</a> </li>
            <li><a href="AdminChat.php">Chat</a></li>
            <li><a href="AdminSettings.php">Settings</a></li>
            <li><a href="Adminlogout.php">LogOut</a></li>


        </ul>
      </div>

      <div class="col-md-10"><br><br>
        <p id="title">Add New Member</p><br>

        <form id="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <label for="apartmentID">Apartment ID</label><br>
          <select name="apartmentID" id="apartmentID">
            <?php

            for ($i = 1; $i < 17; $i++) { ?>
              <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>

          </select>
          <span class="error"> <?php echo $apartmentIDErr, $apartmentIDErr2; ?></span><br><br>
          <label for="fullname">Full name</label><br>
          <input type="text" id="fullname" name="fullname" required>
          <span class="error"> <?php echo $fullnameErr; ?></span><br><br>
          <label for="username">Username</label><br>
          <input type="text" id="uname" name="uname" required>
          <span class="error"> <?php echo $unameErr; ?></span><br><br>
          <label for="Password">Password</label><br>
          <input type="password" id="pwd" name="pwd" required>
          <span class="error"> <?php echo $pwdErr; ?></span><br><br>
          <label for="phoneNumber">Phone number</label><br>
          <input type="text" id="phoneNumber" name="phoneNumber" required>
          <span class="error"> <?php echo $phoneNumberErr; ?></span><br><br>
          <label for="secondPhoneNumber">Second phone number</label><br>
          <input type="text" id="secondPhoneNumber" name="secondPhoneNumber" required>
          <span class="error"> <?php echo $secondPhoneNumberErr; ?></span><br><br>
          <label for="whoseNumber">Whose phone number? </label><br>
          <input type="text" id="whoseNumber" name="whoseNumber" required>
          <span class="error"> <?php echo $whoseNumberErr; ?></span><br><br>
          <input type="submit" value="Add" name="submit">
        </form>

      </div>
    </div>
  </div>





</body>

</html>