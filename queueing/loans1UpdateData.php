<?php

$mysqli = new mysqli("localhost","root","","queuing");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$mode = $_POST['mode'];
$val1 = "";
$val2 = "";
$newVal = "";

$itmObj = new \stdClass(); //initialize variable so that no warning will be echoed

$sql = "SELECT q_no FROM qtable where q_id='4'";
$sql1 = "SELECT q_no FROM qtable where q_id='5'";

$result = $mysqli -> query($sql);
$result1 = $mysqli -> query($sql1);

if ($row = mysqli_fetch_assoc($result)) {
	$val1 = $row["q_no"];
}

if ($row1 = mysqli_fetch_assoc($result1)) {
	$val2 = $row1["q_no"];
}

if ($mode=='add') {
	if ($val1>$val2) {
		$newVal = $val1 + 1;
	} else if ($val2>$val1) {
		$newVal = $val2 + 1;
	} else {
		$newVal = $val1 + 1;
	}
} else if ($mode=='sub') {
	if ($val1<>1) {
		$newVal = $val1 - 1;
	} else {
		$newVal = $val1;
	}
}

if ($mode=='repeat') {
	$sql2 = "UPDATE qtable set q_class = 'pressBlink' where q_id = '4'";
} else {
	$sql2 = "UPDATE qtable set q_no = '$newVal', q_class = 'pressBlink' where q_id = '4'";
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