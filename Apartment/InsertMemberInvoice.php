<?php
include('dbConnection.php');
session_start();
?>
<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="InsertInvoice.css">
  <style>
    <?php
    include "InsertMemberInvoice.css";
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
  
  $monthErr = $yearErr = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES['fileName']['size'] > 0) {
    if (empty($_POST['month'])) {
      $monthErr = "*Please choose a month";
  } else {
      $fileMonth = $_POST['month'];
  }
  if (empty($_POST['year'])) {
      $yearErr = "*Please choose a year";
  } else {
      $fileYear = $_POST['year'];
  }
 
    $Name = test_input($_POST['name']);
    $fileName = $_FILES['fileName']['name'];
    $img = file_get_contents($fileName);
    date_default_timezone_set('Europe/Istanbul');
    $date = date("Y-m-d h:i:sa");

$apartmentID = $_SESSION['apartmentID'];
    $stmt = $conn->prepare("INSERT INTO invoices(apartmentID,Month,Year,Name,Date,File) VALUES (?,?,?,?,?,?)");
    if ($stmt != false) {
      $stmt->bind_param('ssssss',$apartmentID, $fileMonth, $fileYear, $Name,$date, $img);
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
  <h2 class="title">Add New Invoice</h2><br><br>
  <form method="POST" id="submit" enctype="multipart/form-data">
  <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['apartmentID'] ?>" disabled checked><br><br>
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
    <input class="form-control" type="text" placeholder="Name" name="name" required><br><br>
    <input name="fileName" type="file" class="form-control-file" id="exampleFormControlFile1" required><br><br>
    <input type="submit" name="Submit">
  </form>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <a href="Payments.php" class="previousPage" >Click to return to previous page.</a>
</body>
</html>