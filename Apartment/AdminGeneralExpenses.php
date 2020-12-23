<?php
include('dbConnection.php');
session_start();
?>
<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="AdminGeneralExpenses.css">
  <style>
    <?php include "AdminGeneralExpenses.css";
    include "AdminGeneralExpenses.js";
    include "bootstrap.min.css";
    include "popper.js";
    include "bootstrap.min.js";
    include "jquery.js";
    include "fullcalendar-5.3.2/lib/main.min.css";
    include "fullcalendar-5.3.2/lib/main.min.js";
    ?>
  </style>

  <title>General Expenses</title>

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
            <li><a class="active" href="AdminGeneralExpenses.php">General Expenses</a> </li>
            <li><a href="AdminChat.php">Chat</a></li>
            <li><a href="AdminSettings.php">Settings</a></li>
            <li><a href="Adminlogout.php">LogOut</a></li>


        </ul>
      </div>

      <div class="col-md-10"><br><br>
        <a href="InsertExpense.php" class="insert" type="button">Add New Expense</a>
        <br><br>
        <p style="font-size: 35px; text-align: center;color:#455490;">General Expenses</p><br>
        <table class="table table-striped" style="width: 70%; position:absolute;float:left;left:23%;text-align:center; ">
          <tr>

            <td> Month</td>
            <td> Year</td>
            <td>Cleaning</td>
            <td>Repairing</td>
            <td>Elevator</td>
            <td>Gardening</td>
            <td>Security</td>
            <td>ManagerSalary</td>
            <td>Bills</td>
            <td>Extra</td>
            <td>Total</td>
            <td>Inserted Date</td>
            <td>Delete</td>
          </tr>

          <?php $sql = "SELECT * FROM expenses ORDER BY Year DESC, Month DESC";
          $query = mysqli_query($conn, $sql);
          while ($pull = mysqli_fetch_array($query)) {
          ?>
            <tr>

              <td><?php echo $pull['Month'] ?></td>
              <td><?php echo $pull['Year'] ?></td>
              <td>$<?php echo $pull['Cleaning'] ?></td>
              <td>$<?php echo $pull['Repairing'] ?></td>
              <td>$<?php echo $pull['Elevator'] ?></td>
              <td>$<?php echo $pull['Gardening'] ?></td>
              <td>$<?php echo $pull['Security'] ?></td>
              <td>$<?php echo $pull['ManagerSalary'] ?></td>
              <td>$<?php echo $pull['Bills'] ?></td>
              <td>$<?php echo $pull['Extra'] ?></td>
              <td>$<?php echo $pull['Total'];  ?></td>
              <td><?php echo $pull['Date'] ?></td>
              <td><a href="deleteExpense.php?ID=<?php echo $pull['ID']; ?>" class="btn btn-danger btn-sm">X</button></td>
            </tr>
          <?php } ?>



        </table>
        <br><br><br><br><br><br><br><br><br><br>
        <a href="InsertInvoice.php" class="insert" type="button">Add New Invoice</a>
        <br><br><br>
        <h2 class="title">Invoices</h2><br><br>

        <table class="table table-striped" style="width: 50%; position:absolute;float:left;left:32%;text-align:center; ">
          <tr>

            <td>Month</td>
            <td>Year</td>
            <td>Name</td>
            <td>File</td>
            <td>Inserted Date</td>
            <td>Delete</td>
          </tr>

          <?php
          $sql2 = "SELECT * FROM invoices ORDER BY Year DESC, Month DESC";
          $query2 = mysqli_query($conn, $sql2);
          
          while ($pull2 = mysqli_fetch_array($query2)) {
          ?>
            <tr>

              <td><?php echo $pull2['Month'] ?></td>
              <td><?php echo $pull2['Year'] ?></td>
              <td><?php echo $pull2['Name'] ?></td>
             <td ><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($pull2['File'] ).'" style="height:70px;width:70px;" id="image"/>';?></td>
             <td><?php echo $pull2['Date'] ?></td>
             <td><a href="DeleteInvoice.php?ID=<?php echo $pull2['ID']; ?>" class="btn btn-danger btn-sm">X</button></td>
            </tr>
          <?php } ?>

      </div>
    </div>
  </div>

</body>

</html>