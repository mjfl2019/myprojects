<?php

$mysqli = new mysqli("localhost","root","","queuing");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$mode = $_POST['mode'];

$newVal = "";

$itmObj = new \stdClass(); //initialize variable so that no warning will be echoed

$sql = "SELECT q_no FROM qtable where q_id='1'";

$result = $mysqli -> query($sql);

if ($row = mysqli_fetch_assoc($result)) {
	$val = $row["q_no"];
}

if ($mode=='add') {
	$newVal = $val + 1;
} else if ($mode=='sub') {
	if ($val<>1) {
		$newVal = $val - 1;
	} else {
		$newVal = $val;
	}
}

if ($mode=='repeat') {
	$sql2 = "UPDATE qtable set q_class = 'pressBlink' where q_id = '1'";
} else {
	$sql2 = "UPDATE qtable set q_no = '$newVal', q_class = 'pressBlink' where q_id = '1'";
}

$success = $mysqli -> query($sql2);
	
if ($success !== false) {
	echo $newVal;
} else {
	echo("Error.");	    
}

//echo $array;

//Free result set
$result -> free_result();

$mysqli -> close();


?>