<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CoopBank Queuing</title>
<script src="js/jquery-3.6.1.min.js"></script>
<style>

#hAnimate {
	position: relative;
	animation-name: hAnimate;
	animation-duration: 15s;
	animation-iteration-count: infinite;
} 

@keyframes hAnimate {
  0%  {left:30px; top:0px;}
  50%  {left:637px; top:0px;}
  100%  {left:30px; top:0px;}
}


body {
	font-family: Arial, Helvetica, sans-serif;
}
table {
	border-spacing: 0px;
}
th, td {
	word-wrap: break-word;
	padding: 0; 
	margin: 0;
}
</style>
<script>

function GetComputerName() {
	try {
	    var network = new ActiveXObject('WScript.Network');
	    // Show a pop up if it works
	    //alert(network.computerName);
	    console.log(network.computerName);
	}
	catch (e) { }
}

$(function() {
	$("#pNum").text("1");
	$("#pNum2").text("1");
	$("#pNum3").text("1");

	GetComputerName();
});

$(document).keydown(function(e) {

	switch(e.which) {

		case 13: // enter
	    	playNewAcct();
	    break;
		
		/*case 18: // alt
	    break;

	    case 17: // ctrl
	    break;
		
		case 37: // left
	    break;

	    case 39: // right
	    break;*/

	    case 107: // num-add
	    	playTeller();
	    break;

	    case 109: // num-subtract
	    	backTeller();
	    break;

	    case 97: // num-1
	    	backTeller2();
	    break;

	    case 99: // num-3
	    	playTeller2();
	    break;
		
		case 96: // num0
	    	backNewAcct();
	    break;

	    default: return;
	}
	e.preventDefault();
});

</script>
</head>
<body>
<!--<div id="cbp" align="center"><h1 style="font-size:120%;color:green;">COOPERATIVE BANK OF PALAWAN   THANKING YOU FOR YOUR PATRONAGE!</h1></div>-->

<audio id="myAudio">
  <source src="audio/doorbell.mp3" type="audio/mpeg">
  <!--Your browser does not support the audio element.-->
</audio>

<table width="100%">
	<tr width="100%">
		<td align="center" width="30%"><img src="img/cbplogo.png" alt="CBP Logo" width="70%"></td>
		<td width="70%"><h1 id="hAnimate" style="font-size:40px">NOW SERVING</h1></td>
	</tr>
</table>
<table width="100%">
<tr>
	<td>
		<table width="100%">
			<tr>
				<td align="center" style="vertical-align:top">.
					<div><p style="font-size:55px;color:green;">TELLER 1</p></div>
					<div><p id="pNum" style="font-size:70px;color:green;font-family:'Times New Romans';"><b>1</b></p></div>
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table width="100%">
			<tr>
				<td align="center" style="vertical-align:top">.
					<div><p style="font-size:55px;color:green;">TELLER 2</p></div>
					<div><p id="pNum2" style="font-size:70px;color:green;font-family:'Times New Romans';"><b>1</b></p></div>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<table width="100%">
			<tr>
				<td align="center" style="vertical-align:top">.
					<div><p style="font-size:55px;color:red;">NEW ACCTS</p></div>
					<div><p id="pNum3" style="font-size:70px;color:red;font-family:'Times New Romans';"><b>1</b></p></div>
				</td>
			</tr>
		</table>
	</td>
	<td width="50%" align="center" style="vertical-align:top">
		<video width="75%" controls loop>
			<!--<source src="video/cbpads.webm" type="video/webm">-->
				<source src="video/cbpadsnew.mp4" type="video/mp4">
		</video>
	</td>
</tr>
</table>

<script>

x = document.getElementById("myAudio");

num = 0;
num2 = 0;
num3 = 0;

nNum = 0;
nNum2 = 0;

function getNums() {
	nNum = parseInt($("#pNum").text());
	nNum2 = parseInt($("#pNum2").text());
}

function playTeller() {
	x.play();
	//num += 1;
	getNums();

	if ((nNum == nNum2) || (nNum > nNum2)){
		num = nNum + 1;
	} else {
		num2 = nNum2 + 1;
		num = num2;
	}

	console.log("num = "+num);
	console.log("num2 = "+num2);

	$("#pNum").text(num);
}

function playTeller2() {
	x.play();
	//num += 1;
	getNums();

	if ((nNum2 == nNum) || (nNum2 > nNum)){
		num2 = nNum2 + 1;
	} else {
		num = nNum + 1;
		num2 = num;
	}

	console.log("num = "+num);
	console.log("num2 = "+num2);

	$("#pNum2").text(num2);
}

function backTeller() {
	x.play();
	getNums();
	
	if (parseInt($("#pNum").text()) != 1) {
		num = nNum - 1;
		$("#pNum").text(num);
	}
}

function backTeller2() {
	x.play();
	getNums();
	
	if (parseInt($("#pNum2").text()) != 1) {
		num2 = nNum2 - 1;
		$("#pNum2").text(num2);
	}
}

function playNewAcct() {
	x.play();
	num3 = parseInt($("#pNum3").text()) + 1;
	$("#pNum3").text(num3);
}

function backNewAcct() {
	num3 = parseInt($("#pNum3").text() - 1);
	if(num3 >= 1){
		$("#pNum3").text(num3);
	} else {
		num3 = 1;
	}
}

</script>

</body>
</html>