<?php
include('dbConnection.php');
$title = $_POST['title'];
$date = $_POST['date'];

$stmt = $conn->prepare("INSERT INTO events(title,date) VALUES (?,?)");
  if ($stmt != false) {
    $stmt->bind_param('ss', $title,$date);
$stmt->execute();
    $stmt->close();
  } else {
    die('prepare() failed: ' . htmlspecialchars($conn->error));
  }







?>