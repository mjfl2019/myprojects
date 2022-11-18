<?php

$mysqli = new mysqli("localhost","root","","queuing");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$itmObj = new \stdClass(); #initialize variable so that no warning will be echoed
$q_class = "";

if(isset($_POST['queue_id'])){
    $q_id = $_POST['queue_id'];
}

$sql = "SELECT q_no FROM qtable where q_id='$q_id' ;";
$result = $mysqli -> query($sql);

//$array = array();

//while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
while ($row = mysqli_fetch_assoc($result)) {
	$itmObj->q_no = $row["q_no"];
}

$encItmObj = json_encode($itmObj);

echo $encItmObj;

//Free result set
$result -> free_result();

$mysqli -> close();

?>