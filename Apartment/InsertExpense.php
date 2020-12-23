<?php
include('dbConnection.php');
session_start();
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="InsertExpense.css">
    <style>
        <?php
        include "InsertExpense.css";
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
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $cleaningErr = $repairingErr = $elevatorErr = $gardeningErr = $securityErr = $managerSalaryErr = $billsErr = $extraErr = $monthErr = $yearErr = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        if (empty($_POST['month'])) {
            $monthErr = "*Please choose a month";
        } else {
            $Month = $_POST['month'];
        }
        if (empty($_POST['year'])) {
            $yearErr = "*Please choose a year";
        } else {
            $Year = $_POST['year'];
        }
        if (!filter_var($_POST["cleaning"], FILTER_VALIDATE_INT)) {
            $cleaningErr = "*Cleaning should be a number.";
        } else {
            $Cleaning = test_input($_POST['cleaning']);
        }
        if (!filter_var($_POST["repairing"], FILTER_VALIDATE_INT)) {
            $repairingErr = "*Repairing should be a number.";
        } else {
            $Repairing = test_input($_POST['repairing']);
        }
        if (!filter_var($_POST["elevator"], FILTER_VALIDATE_INT)) {
            $elevatorErr = "*Elevator should be a number.";
        } else {
            $Elevator = test_input($_POST['elevator']);
        }
        if (!filter_var($_POST["gardening"], FILTER_VALIDATE_INT)) {
            $gardeningErr = "*Gardening should be a number.";
        } else {
            $Gardening = test_input($_POST['gardening']);
        }
        if (!filter_var($_POST["security"], FILTER_VALIDATE_INT)) {
            $securityErr = "*Security should be a number.";
        } else {
            $Security = test_input($_POST['security']);
        }
        if (!filter_var($_POST["managerSalary"], FILTER_VALIDATE_INT)) {
            $managerSalaryErr = "*Manager Salary should be a number.";
        } else {
            $ManagerSalary = test_input($_POST['managerSalary']);
        }
        if (!filter_var($_POST["bills"], FILTER_VALIDATE_INT)) {
            $billsErr = "*Bills should be a number.";
        } else {
            $Bills = test_input($_POST['bills']);
        }
        if (!filter_var($_POST["extra"], FILTER_VALIDATE_INT)) {
            $extraErr = "*Extra should be a number.";
        } else {
            $Extra = test_input($_POST['extra']);
        }
        if (
            filter_var($_POST["cleaning"], FILTER_VALIDATE_INT) && filter_var($_POST["repairing"], FILTER_VALIDATE_INT)
            && filter_var($_POST["elevator"], FILTER_VALIDATE_INT) && filter_var($_POST["gardening"], FILTER_VALIDATE_INT)
            && filter_var($_POST["security"], FILTER_VALIDATE_INT) && filter_var($_POST["managerSalary"], FILTER_VALIDATE_INT) &&
            filter_var($_POST["bills"], FILTER_VALIDATE_INT) && filter_var($_POST["extra"], FILTER_VALIDATE_INT)
        ) {
            $Total = $Cleaning + $Repairing + $Elevator + $Gardening + $Security + $ManagerSalary + $Bills + $Extra;
        }
        date_default_timezone_set('Europe/Istanbul');
        $date = date("Y-m-d h:i:sa");


        $stmt = $conn->prepare("INSERT INTO expenses(Month,Year,Cleaning,Repairing,Elevator,Gardening,Security,ManagerSalary,Bills,Extra,Total,Date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        if ($stmt != false) {
            $stmt->bind_param('ssssssssssss', $Month, $Year, $Cleaning, $Repairing, $Elevator, $Gardening, $Security, $ManagerSalary, $Bills, $Extra, $Total, $date);
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
    <h2 class="title">Add New Expense</h2><br><br>
    <form method="POST" id="submit" enctype="multipart/form-data">

        <select name="month" class="form-control" required>
            <option disabled selected>Month</option>
            <?php for ($i = 1; $i < 13; $i++) { ?>
                <option><?php echo $i ?></option>
            <?php } ?>
        </select>
        <span class="error"> <?php echo $monthErr; ?></span><br><br>

        <select name="year" class="form-control" required>
            <option disabled selected>Year</option>
            <?php for ($i = 2020; $i < 2050; $i++) { ?>
                <option><?php echo $i ?></option>
            <?php } ?>
        </select>
        <span class="error"> <?php echo $yearErr; ?></span><br><br>
        <input class="form-control" type="text" placeholder="Cleaning" name="cleaning" required>
        <span class="error"> <?php echo $cleaningErr; ?></span><br><br>
        <input class="form-control" type="text" placeholder="Repairing" name="repairing" required>
        <span class="error"> <?php echo $repairingErr; ?></span><br><br>
        <input class="form-control" type="text" placeholder="Elevator" name="elevator" required>
        <span class="error"> <?php echo $elevatorErr; ?></span><br><br>
        <input class="form-control" type="text" placeholder="Gardening" name="gardening" required>
        <span class="error"> <?php echo $gardeningErr; ?></span><br><br>
        <input class="form-control" type="text" placeholder="Security" name="security" required>
        <span class="error"> <?php echo $securityErr; ?></span><br><br>
        <input class="form-control" type="text" placeholder="ManagerSalary" name="managerSalary" required>
        <span class="error"> <?php echo $managerSalaryErr; ?></span><br><br>
        <input class="form-control" type="text" placeholder="Bills" name="bills" required>
        <span class="error"> <?php echo $billsErr; ?></span><br><br>
        <input class="form-control" type="text" placeholder="Extra" name="extra" required>
        <span class="error"> <?php echo $extraErr; ?></span><br><br>
        <input type="submit" name="Submit">
    </form>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <a href="AdminGeneralExpenses.php" class="previousPage">Click to return to previous page.</a>
</body>

</html>