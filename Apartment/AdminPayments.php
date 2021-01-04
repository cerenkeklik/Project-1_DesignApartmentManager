<?php
include('dbConnection.php');
session_start();
?>
<!DOCTYPE html>

<head>

    <title>Payments</title>
    <style>
        <?php include "AdminPayments.css";
        include "AdminPayments.js";
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
    $sqlphoto = "SELECT * FROM admin where username='$un' ";
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
                        <li><a href="AdminHomePage.php">HomePage</a></li>
                        <li><a href="AdminMembers.php">Members</a></li>
                        <li><a class="active" href="AdminPayments.php">Payments</a></li>
                        <li><a href="AdminGeneralExpenses.php">General Expenses</a> </li>
                        <li><a href="AdminChat.php">Chat</a></li>
                        <li><a href="AdminSettings.php">Settings</a></li>
                        <li><a href="Adminlogout.php">LogOut</a></li>


                </ul>
            </div>

            <div class="col-md-10">
                <a href="InsertPayments.php" class="insert" type="button">Add New Payment</a>

                <br><br><br>
                <p id="month">Payments</p>
                <br><br><br>
                <p class="text" style="color:rgb(256, 55, 55)">(Apartment Number = 0 shows the price that you should pay in that month.)</p><br><br><br>
                <table class="table table-striped" style="text-align: center;position:absolute;float:left;left:35%;width:40%; ">
                    <tr>
                        <td class="blue">Apartment Number</td>
                        <td class="blue">Price</td>
                        <td class="blue">Month</td>
                        <td class="blue">Year</td>
                        <td class="blue">Inserted Date</td>
                        <td class="blue">Delete</td>
                    </tr>
                    <?php

                    $sql = "SELECT * FROM payments ORDER BY year DESC, month DESC";
                    $query = mysqli_query($conn, $sql);
                    while ($pull = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                        <?php if ($pull['apartmentID'] == 0) { ?>
                            <td class="red"><?php echo $pull['apartmentID'] ?></td>
                            <td class="red">$<?php echo $pull['price'] ?></td>
                            <td class="red"><?php echo $pull['month']  ?></td>
                            <td class="red"><?php echo $pull['year']  ?></td>
                            <td class="red"><?php echo $pull['date']  ?></td>
                            <?php if ($pull['apartmentID'] == 0) { ?>
                                <td><a href="deletePayment.php?ID=<?php echo $pull['ID']; ?>" onclick="return confirm('Are you sure you want to delete this payment?');" class="btn btn-danger btn-sm">X</button></td>
                            <?php } else { ?>
                                <td>-</td>
                            <?php } }
                            else{
                            ?>
                            <td><?php echo $pull['apartmentID'] ?></td>
                            <td>$<?php echo $pull['price'] ?></td>
                            <td><?php echo $pull['month']  ?></td>
                            <td><?php echo $pull['year']  ?></td>
                            <td><?php echo $pull['date']  ?></td>
                            <?php if ($pull['apartmentID'] == 0) { ?>
                                <td><a href="deletePayment.php?ID=<?php echo $pull['ID']; ?>" onclick="return confirm('Are you sure you want to delete this payment?');" class="btn btn-danger btn-sm">X</button></td>
                            <?php } else { ?>
                                <td>-</td>
                            <?php } ?>

                        </tr>
                    <?php } } ?>



                </table>
                <br><br><br>

            </div>
        </div>
    </div>


</body>

</html>