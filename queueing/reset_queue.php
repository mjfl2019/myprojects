<?php

$mysqli = new mysqli("localhost","root","","queuing");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$c;

for ($c=1;$c<=5;$c++) {
	$sql = "UPDATE qtable set q_no='1' where q_id='$c' ;";
	$result = $mysqli -> query($sql);
	if ($result === false) {
		die("Database Error! Due to: " . mysqli_connect_error());
	}
}

if ($c == 5) {
	echo "success";
}

$result -> free_result();
$mysqli -> close();

?>