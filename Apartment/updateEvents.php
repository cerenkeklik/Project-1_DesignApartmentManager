<?php
include('dbConnection.php');

$stmt =  $conn->prepare("UPDATE events SET title=?, date=? WHERE id=? ");
if ($stmt != false) {
    $stmt->bind_param('ss', $title,$date);
$stmt->execute();
    $stmt->close();
  } else {
    die('prepare() failed: ' . htmlspecialchars($conn->error));
  }
echo json_encode($event_array);



?>