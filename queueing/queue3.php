<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CoopBank Queuing</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<script src="js/jquery-3.6.1.min.js"></script>
<style>

body {
	font-family: Arial, Helvetica, sans-serif;
	/*overflow-y: hidden;*/
	overflow-x: hidden;
}

table, th, td {
	border-spacing: 0;
	padding: 0px;
}
th, td {
	padding: 0px;
}

#tblHdr {
	background-color: white;
	color: black;
	margin: 0;
}

#tblBody {
	border: 1px solid black;
	background-color: green;
	color: white;
	height: 70vh;

}

#tblContent {
	/*border: 1px solid black;*/
	background-color: green;
	color: white;
	height: 70vh;
}

#tblContent td, th {
	border: 0.1px solid black;
	border-collapse: collapse;
	margin: 0;
	border-spacing: 0;
	height: auto;
}

#tblFtr {
	border: 1px solid black;
	background-color: green;
	color: white;
	border-spacing: 0;
}

#hAnimate {
	position: relative;
	animation-name: hAnimate;
	animation-duration: 15s;
	animation-iteration-count: infinite;
}

.pressBlink{
    animation:pressedBlinking 1.2s infinite;
}

@keyframes hAnimate {
  0%  {left:100px; top:0px;}
  50%  {left:570px; top:0px;}
  100%  {left:100px; top:0px;}
}

@keyframes pressedBlinking{
    0%{color:#ff1919;font-weight:bold;}
    49%{color:#ff1919;font-weight:bold;}
    60%{color:transparent;}
    99%{color:transparent;}
    100%{color: #ff1919;font-weight:bold;}
}

/*.blinkingFooter{
    animation:blinkingText 2s;
}*/

/*@keyframes blinkingText{
    0%{ color: #white; }
    10%{ color: #white; }
    20%{ color: #white; }
    30%{ color: #white; }
    40%{ color: #white; }
    50%{ color: #white; }
    60%{ color: #white; }
    70%{ color: #white; }
    80%{ color: #white; }
    90%{ color: transparent; }
    100%{ color: transparent; }
}*/

</style>
<script>

c=0;

v0="<b id='bText'><i>CBP PPC(Main) Branch - 09176749746</i></b>";
v1="<b id='bText'><i>CBP Aborlan Branch-Lite - 09176272552</i></b>";
v2="<b id='bText'><i>CBP Narra Branch - 09176298846</i></b>";
v3="<b id='bText'><i>CBP Espa&ntilde;ola Branch-Lite - 09176272552</i></b>";
v4="<b id='bText'><i>CBP Brooke's Pt. Branch - 09175948003</i></b>";
v5="<b id='bText'><i>CBP Bataraza Branch-Lite - 09176246162</i></b>";
v6="<b id='bText'><i>CBP El Nido Branch - 09778533002</i></b>";


var v = new Array(v0,v1,v2,v3,v4,v5,v6);

/*function GetComputerName() {
	try {
	    var network = new ActiveXObject('WScript.Network');
	    // Show a pop up if it works
	    //alert(network.computerName);
	    console.log(network.computerName);
	}
	catch (e) { }
}*/

$(function() {
	$("#pTeller").text("1");
	$("#pLoans").text("1");
	$("#pNewAcct").text("1");

	//GetComputerName();

	//$("#cbpVideo").play();
	setInterval(changeFooter,7000);
});

function changeFooter() {
	c=c+1;
	if (c == 7) {
		c=0;
	}
	$("#bText").fadeOut();
	setTimeout(fetchIn,500);
}

function fetchIn() {
	$("#bText").remove();
	$(".fadingFooter").hide();
	$(".fadingFooter").append(v[c]);
	setTimeout(fadeIn,500);
}

function fadeIn() {
	$(".fadingFooter").fadeIn();
}

$(document).keydown(function(e) {

	switch(e.which) {

		case 13: // enter
	    	playTeller();
	    break;
		
		/*case 18: // alt
	    break;

	    case 17: // ctrl
	    break;
		
		case 37: // left
	    break;

	    case 39: // right
	    break;*/

	    case 96: // num0
	    	backTeller();
	    break;

	    case 106: // num-*
	    	playLoans();
	    break;
		
		case 107: // num-add
	    	playNewAcct();
	    break;

	    case 109: // num-subtract
	    	backNewAcct();
	    break;

	    case 111: // num-/
	    	backLoans();
	    break;

	    default: return;
	}
	e.preventDefault();
});

</script>
</head>
<body>
<!--<div id="cbp" align="center"><h1 style="font-size:120%;color:green;">COOPERATIVE BANK OF PALAWAN   THANKING YOU FOR YOUR PATRONAGE!</h1></div>-->

<header>
	<audio id="myAudio">
	  <source src="audio/doorbell6.mp3" type="audio/mpeg">
	  <!--Your browser does not support the audio element.-->
	</audio>
	<audio id="myAudio2">
	  <source src="audio/doorbell6.mp3" type="audio/mpeg">
	  <!--Your browser does not support the audio element.-->
	</audio>
	<audio id="myAudio3">
	  <source src="audio/doorbell6.mp3" type="audio/mpeg">
	  <!--Your browser does not support the audio element.-->
	</audio>
	<table width="100%" id="tblHdr">
		<tr width="100%">
			<td align="center" width="30%"><img src="img/cbplogo.png" alt="CBP Logo" width="70%"></td>
			<td width="70%"><h1 id="hAnimate" style="font-size:50px">NOW SERVING</h1></td>
		</tr>
	</table>
</header>
<section>
	<table width="100%" id="tblBody">
		<tr>
			<td width="50%">
				<table width="100%" id="tblContent">
					<tr>
						<td width="80%" align="center"><p style="font-size:50px;"><b>NEW ACCOUNTS</b></p></td>
						<td width="20%" align="center"><p id="pNewAcct" style="font-size:55px;word-wrap:break-word;"><b>1</b></p></td>
					</tr>
					<tr>
						<td width="80%" align="center"><p style="font-size:50px;"><b>TELLER</b></p></td>
						<td width="20%" align="center"><p id="pTeller" style="font-size:55px;"><b>1</b></p></td>
					</tr>
					<tr>
						<td width="80%" align="center"><p style="font-size:50px;"><b>LOANS</b></p></td>
						<td width="20%" align="center"><p id="pLoans" style="font-size:55px;"><b>1</b></p></td>
					</tr>
				</table>
			</td>
			<td width="50%" align="center">
				<video id="cbpVideo" width="97%" controls loop>
					<source src="video/cbpadsnew.mp4" type="video/mp4">
					Your browser does not support the video.
				</video>
			</td>
		</tr>
	</table>
</section>
<footer>
	<br>
	<table width="100%" id="tblFtr">
		<tr>
			<td width="50%">
				<p style="font-size:25px;">&nbsp;&nbsp;<b><i>Your Cooperative Bank Your Success</i></b></p>
			</td>
			<td width="50%" align="center">
				<p style="font-size:25px;" class="fadingFooter">&nbsp;&nbsp;<b id="bText"><i>CBP PPC(Main) Branch - 09176749746</i></b></p>
			</td>
		</tr>
	</table>
</footer>
<!--<table width="100%">
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
		<video id="cbpVideo" width="75%" controls loop>
			<source src="video/cbpads.webm" type="video/webm">
				<source src="video/cbpadsnew.mp4" type="video/mp4">
				Your browser does not support the video.
		</video>
	</td>
</tr>
</table>-->

<script>

x = document.getElementById("myAudio");
y = document.getElementById("myAudio2");
z = document.getElementById("myAudio3");

num = 0;
num2 = 0;
num3 = 0;

/*nNum = 0;
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

function playLoans() {
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

function backLoans() {
	x.play();
	getNums();
	
	if (parseInt($("#pNum2").text()) != 1) {
		num2 = nNum2 - 1;
		$("#pNum2").text(num2);
	}
}*/

function playNewAcct() {
	x.play();
	num3 = parseInt($("#pNewAcct").text()) + 1;
	$("#pNewAcct").text(num3);
	$("#pNewAcct").addClass("pressBlink");
	setTimeout(removeBlink1,4000);
}

function backNewAcct() {
	num3 = parseInt($("#pNewAcct").text() - 1);
	if(num3 >= 1){
		$("#pNewAcct").text(num3);
	} else {
		num3 = 1;
	}
}

function playTeller() {
	y.play();
	num = parseInt($("#pTeller").text()) + 1;
	$("#pTeller").text(num);
	$("#pTeller").addClass("pressBlink");
	setTimeout(removeBlink2,4000);
}

function backTeller() {
	num = parseInt($("#pTeller").text() - 1);
	if(num >= 1){
		$("#pTeller").text(num);
	} else {
		num = 1;
	}
}

function playLoans() {
	z.play();
	num2 = parseInt($("#pLoans").text()) + 1;
	$("#pLoans").text(num2);
	$("#pLoans").addClass("pressBlink");
	setTimeout(removeBlink3,4000);
}

function backLoans() {
	num2 = parseInt($("#pLoans").text() - 1);
	if(num2 >= 1){
		$("#pLoans").text(num2);
	} else {
		num2 = 1;
	}
}

function removeBlink1() {
	$("#pNewAcct").removeClass("pressBlink");
}

function removeBlink2() {
	$("#pTeller").removeClass("pressBlink");
}

function removeBlink3() {
	$("#pLoans").removeClass("pressBlink");
}

</script>

</body>
</html>