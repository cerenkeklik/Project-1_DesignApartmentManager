<?php 
include('dbConnection.php');

$sql = "SELECT * FROM events ";
$query = mysqli_query($conn, $sql);    
   
while($pull = mysqli_fetch_array($query)){
    $event_array[] = array(
        'title' => $pull['title'],
        'date' => $pull['date']
    );

}
echo json_encode($event_array);

?>