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

$sql = "SELECT q_no, q_class FROM qtable where q_id='$q_id' ;";
$result = $mysqli -> query($sql);

//$array = array();

while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
//while ($row = mysqli_fetch_assoc($result)) {
	//$itmObj->queuer = $row["queuer"];
	//$itmObj->q_no = $row["q_no"];

	//Encode json to output
	//$encodeItmObj = json_encode($itmObj);
	//echo $encodeItmObj;*/
	//$array[] = array($row);
	//array_push($array, $row);

	//$array[] = $itmObj;
	//$array[] = $row["q_no"];
	$itmObj->q_no = $row["q_no"];
	$itmObj->q_class = $row["q_class"];
	$q_class = $row["q_class"];
}

$encItmObj = json_encode($itmObj);

echo $encItmObj;
//echo $array;

if ($q_class == "pressBlink") {
	$sql2 = "UPDATE qtable set q_class = '' where q_id = '$q_id'";

	$success = $mysqli -> query($sql2);
		
	if ($success !== false) {
		//Free result set
		$result -> free_result();
		$mysqli -> close();
	} else {
		throw new Exception("Database connection error!");  
	}
}

?>