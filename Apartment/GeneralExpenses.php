<?php
include('dbConnection.php');
session_start();
?>
<!DOCTYPE html>

<head>
    <title>Nature Apartment-General Expenses</title>
    <style>
        <?php include "GeneralExpenses.css";
       
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
 $aptID=0;
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
                        <br> <br><br>
                        <li><a href="HomePage.php">HomePage</a></li>
                        <li><a href="Members.php">Members</a></li>
                        <li><a href="Payments.php">Payments</a></li>
                        <li><a class="active" href="GeneralExpenses.php">General Expenses</a> </li>
                        <li><a href="Chat.php">Chat</a></li>
                        <li><a href="Settings.php">Settings</a></li>
                        <li><a href="logout.php">LogOut</a></li>


                </ul>
            </div>

            <div class="col-md-10"><br><br>
                <p style="font-size: 35px; text-align: center; color:#455490;">Expenses</p>
                <br>
                <table class="table table-striped" style="width: 70%;position:absolute;float:left;left:24%; ">
                    <tr>
                        <td style="color: #455490;">Month</td>
                        <td style="color: #455490;">Year</td>
                        <td style="color: #455490;">Cleaning</td>
                        <td style="color: #455490;">Repairing</td>
                        <td style="color: #455490;">Elevator</td>
                        <td style="color: #455490;">Gardening</td>
                        <td style="color: #455490;">Security</td>
                        <td style="color: #455490;">Manager Salary</td>
                        <td style="color: #455490;">Bills</td>
                        <td style="color: #455490;">Extra</td>
                        <td style="color: #455490;">Total</td>
                        <td style="color: #455490;">Inserted Date</td>
                    </tr>
                    
                    <?php $sql = "SELECT * FROM expenses  ORDER BY Year DESC, Month DESC";
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
                        <tr>
                        <?php } ?>
                </table>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <h2 style="color: #455490;text-align:center; ">Invoices</h2>

                <table class="table table-striped" style="width: 65%; position:absolute;float:left;left:26%;text-align:center; ">
                    <tr>

                        <td class="blue">Month</td>
                        <td class="blue">Year</td>
                        <td class="blue">Name</td>
                        <td class="blue">File</td>
                        <td class="blue">Inserted Date</td>

                    </tr>

                    <?php
                    $sql2 = "SELECT * FROM invoices WHERE apartmentID='0' ORDER BY Year DESC, Month DESC";
                    $query2 = mysqli_query($conn, $sql2);

                    while ($pull2 = mysqli_fetch_array($query2)) {
                    ?>
                        <tr>

                            <td><?php echo $pull2['Month'] ?></td>
                            <td><?php echo $pull2['Year'] ?></td>
                            <td><?php echo $pull2['Name'] ?></td>
                            <td><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($pull2['File']) . '" style="height:100px;width:100px;" id="image"/>'; ?></td>
                            <td><?php echo $pull2['Date'] ?></td>
                        </tr>
                    <?php } ?>



            </div>
        </div>
    </div>
    </div>
    <br><br><br><br>


</body>

</html>