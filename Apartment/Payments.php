<?php
include('dbConnection.php');
session_start();

?>
<!DOCTYPE html>

<head>
<link rel = "stylesheet" href="Payments.css">

  <title>Payments</title>
  <style>
    <?php include "Payments.css";
    include "Payments.js";
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
  $un=$_SESSION['username'];
  $sqlphoto = "SELECT * FROM members where username='$un' ";
  $queryphoto = mysqli_query($conn, $sqlphoto);

 $pullphoto= mysqli_fetch_array($queryphoto);
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <ul>
          <?php
          if ($_SESSION['username']) {
          ?>
            <br><br>
            <li>Welcome <?php echo $_SESSION['username'];
                      } ?></li>
            <br><br><br>
            <li><a href="HomePage.php">HomePage</a></li>
            <li><a href="Members.php">Members</a></li>
            <li><a class="active" href="Payments.php">Payments</a></li>
            <li><a href="GeneralExpenses.php">General Expenses</a> </li>
            <li><a href="Chat.php">Chat</a></li>
            <li><a href="Settings.php">Settings</a></li>
            <li><a href="logout.php">LogOut</a></li>


        </ul>
      </div>

      <div class="col-md-10"><br><br>
      <div class="w3-container">
      <a href="InsertMemberPayments.php" class="insert" type="button">Add New Payment</a>
        <p id="month">Payments</p>
        <br>
        <p style="text-align: center; font-size: 15px;">IBAN: 00000000000000000000000000</p>
        <p class="text" style="color:rgb(256, 55, 55); text-align:center; ">(Apartment Number = 0 shows the price that you should pay in that month.)</p><br><br>

        <table class="table table-striped" style="text-align: center;position:absolute;float:left;left:29%;width:60%; ">
          <tr>
            <td style="color: #455490;">Apartment Number</td>
            <td style="color: #455490;">Month</td>
            <td style="color: #455490;">Year</td>
            <td style="color: #455490;">Price</td>
            <td style="color: #455490;">Inserted Date</td>
            <td style="color: #455490;">Delete</td>

          </tr>
          <?php
$aptID = $_SESSION['apartmentID'];
$managerID =0;
          $sql = "SELECT * FROM payments WHERE apartmentID = '$aptID' OR apartmentID = '$managerID' ORDER BY year DESC, month DESC";
          $query = mysqli_query($conn, $sql);
          while ($pull = mysqli_fetch_array($query)) {

          ?>
            <tr>
              <?php if ($pull['apartmentID'] == 0) { ?>
                <td style="color:rgb(256, 55, 55)"><?php echo $pull['apartmentID'] ?></td>
                <td style="color:rgb(256, 55, 55)"><?php echo $pull['month'] ?></td>
                <td style="color:rgb(256, 55, 55)"><?php echo $pull['year'] ?></td>
                <td style="color:rgb(256, 55, 55)">$<?php echo $pull['price'] ?></td>
                <td style="color:rgb(256, 55, 55)"><?php echo $pull['date'] ?> </td>
                 <?php if ($pull['apartmentID'] == $_SESSION['apartmentID']) { ?>
                  <td><a href="DeleteMemberPayments.php?ID=<?php echo $pull['ID']; ?>" onclick="return confirm('Are you sure you want to delete this payment?');" class="btn btn-danger btn-sm">X</button></td>
              <?php } else { ?>
                  <td>-</td>
              <?php } } else { ?></td>

                <td><?php echo $pull['apartmentID'] ?></td>
                <td><?php echo $pull['month'] ?></td>
                <td><?php echo $pull['year'] ?></td>
                <td>$<?php echo $pull['price'] ?></td>
                <td><?php echo $pull['date'];  ?></td>
                <?php if ($pull['apartmentID'] == $_SESSION['apartmentID']) { ?>
                  <td><a href="DeleteMemberPayments.php?ID=<?php echo $pull['ID']; ?>" onclick="return confirm('Are you sure you want to delete this payment?');" class="btn btn-danger btn-sm">X</button></td>
              <?php } else { ?>
                  <td>-</td>

            </tr>
          <?php } } }?>

        </table >
      </div>
        <br><br><br><br><br><br><br><br><br><br>
        <div class="w3-container">
        <h2 style="text-align: center; font-size: 25px; color:#455490; ">My Invoices</h2>
        <a href="InsertMemberInvoice.php" class="insert" type="button">Add New Invoice</a>
        <br><br>
      
        <br><br><br>
        <table class="table table-striped" style="text-align: center;position:absolute;float:left;left:29%;width:60%; " > 
<tr>
  <td style="color: #455490;">Month</td>
  <td style="color: #455490;">Year</td>
  <td style="color: #455490;">Name</td>
  <td style="color: #455490;">File</td>
  <td style="color: #455490;">Updated Date</td>
  <td style="color: #455490;">Delete</td>
</tr>
        <?php
       
$sql2 = "SELECT * FROM invoices WHERE apartmentID ='$aptID' ORDER BY year DESC, month DESC";
$query2 = mysqli_query($conn, $sql2);
while ($pull2 = mysqli_fetch_array($query2)) {
  ?>
    <tr>

      <td><?php echo $pull2['Month'] ?></td>
      <td><?php echo $pull2['Year'] ?></td>
      <td><?php echo $pull2['Name'] ?></td>
     <td ><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($pull2['File'] ).'"id="image"/>';?></td>
     <td><?php echo $pull2['Date'] ?></td>
     <td><a href="DeleteMemberInvoice.php?ID=<?php echo $pull2['ID']; ?>" onclick="return confirm('Are you sure you want to delete this invoice?');" class="btn btn-danger btn-sm">X</button></td>
    </tr>
  <?php } ?>
        </table>
        </div>
      </div>
    </div>
  </div>
























</body>

</html>