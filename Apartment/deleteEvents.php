<?php
include('dbConnection.php');
$id = $_POST['id'];


$stmt = $conn->prepare("DELETE FROM events WHERE id=? ");
  if ($stmt != false) {
    $stmt->bind_param('s', $id);
$stmt->execute();
    $stmt->close();
  } else {
    die('prepare() failed: ' . htmlspecialchars($conn->error));
  }







?>