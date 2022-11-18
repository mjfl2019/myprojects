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
	padding: 0px;
}

table {
	border-spacing: 0;
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
	/*height: 70vh;*/

}

#tblContent {
	/*border: 1px solid black;*/
	background-color: green;
	color: white;
	/*height: 70vh;*/
}

#tblContent td, th {
	border: 0.1px solid black;
	border-collapse: collapse;
	margin: 0;
	/*border-spacing: 0;*/
	/*height: auto;*/
}

#tblFtr {
	border: 1px solid black;
	background-color: green;
	color: white;
	/*border-spacing: 0;*/
}

#hAnimate {
	position: relative;
	animation-name: hAnimate;
	animation-duration: 15s;
	animation-iteration-count: infinite;
}

.pressBlink{
    animation:pressedBlinkingN 1.2s infinite;
}

.pressBlink_Tel1{
    animation:pressedBlinkingT1 1.2s infinite;
}

.pressBlink_Tel2{
    animation:pressedBlinkingT2 1.2s infinite;
}

.pressBlink_Loan1{
    animation:pressedBlinkingL1 1.2s infinite;
}

.pressBlink_Loan2{
    animation:pressedBlinkingL2 1.2s infinite;
}

@keyframes hAnimate {
  0%  {left:100px; top:0px;}
  50%  {left:750px; top:0px;}
  100%  {left:100px; top:0px;}
}

@keyframes pressedBlinkingN{
    0%{color:#ff1919;font-weight:bold;}
    49%{color:#ff1919;font-weight:bold;}
    60%{color:transparent;}
    99%{color:transparent;}
    100%{color: #ff1919;font-weight:bold;}
}

@keyframes pressedBlinkingT1{
    0%{color:#ff1919;font-weight:bold;}
    49%{color:#ff1919;font-weight:bold;}
    60%{color:transparent;}
    99%{color:transparent;}
    100%{color: #ff1919;font-weight:bold;}
}

@keyframes pressedBlinkingT2{
    0%{color:#ff1919;font-weight:bold;}
    49%{color:#ff1919;font-weight:bold;}
    60%{color:transparent;}
    99%{color:transparent;}
    100%{color: #ff1919;font-weight:bold;}
}

@keyframes pressedBlinkingL1{
    0%{color:#ff1919;font-weight:bold;}
    49%{color:#ff1919;font-weight:bold;}
    60%{color:transparent;}
    99%{color:transparent;}
    100%{color: #ff1919;font-weight:bold;}
}

@keyframes pressedBlinkingL2{
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

v0="<b id='bText'><i>Main Branch - 0917-674-9746</i></b>";
v1="<b id='bText'><i>Aborlan Branch-Lite - 0917-627-2552</i></b>";
v2="<b id='bText'><i>Narra Branch - 0917-629-8846</i></b>";
v3="<b id='bText'><i>Espa&ntilde;ola Branch-Lite - 0917-627-2552</i></b>";
v4="<b id='bText'><i>Brooke's Pt. Branch - 0917-594-8003</i></b>";
v5="<b id='bText'><i>Bataraza Branch-Lite - 0917-624-6162</i></b>";
v6="<b id='bText'><i>El Nido Branch - 0977-853-3002</i></b>";


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
	//$("#pTeller").text("1");
	//$("#pLoans").text("1");
	//$("#pNewAcct").text("1");

	//GetComputerName();

	//$("#cbpVideo").load();
	//$("#cbpIMG").click();
	//setTimeout(playVideo,2000);
	setInterval(changeFooter,7000);
	setInterval(numsToFunctionCallOut,300);
});

function numsToFunctionCallOut() {
	return 0;
}

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

	    case 97: // num1
	    	backNewAcct();
	    break;

	    case 98: // num2
	    	repeatNewAcct();
	    break;

	    case 99: // num3
	    	playNewAcct();
	    break;

	    case 100: // num4
	    	backLoans();
	    break;

	    case 101: // num5
	    	repeatLoans1();
	    break;

	    case 102: // num6
	    	playLoans();
	    break;

	    case 103: // num7
	    	backLoans2();
	    break;

	    case 104: // num8
	    	repeatLoans2();
	    break;

	    case 105: // num9
	    	playLoans2();
	    break;

	    case 106: // num *
	    	repeatTeller2();
	    break;
		
		case 107: // num +
	    	playTeller2();
	    break;

	    case 109: // num -
	    	backTeller2();
	    break;

	    case 110: // num .
	    	repeatTeller1();
	    break;

	    case 111: // num /
	    	
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
	<audio id="myAudio_y1">
	  <source src="audio/doorbell6.mp3" type="audio/mpeg">
	  <!--Your browser does not support the audio element.-->
	</audio>
	<audio id="myAudio_y2">
	  <source src="audio/doorbell6.mp3" type="audio/mpeg">
	  <!--Your browser does not support the audio element.-->
	</audio>
	<audio id="myAudio_z1">
	  <source src="audio/doorbell6.mp3" type="audio/mpeg">
	  <!--Your browser does not support the audio element.-->
	</audio>
	<audio id="myAudio_z2">
	  <source src="audio/doorbell6.mp3" type="audio/mpeg">
	  <!--Your browser does not support the audio element.-->
	</audio>
	<table width="100%" id="tblHdr">
		<tr width="100%">
			<td align="center" width="30%"><img id="cbpIMG" src="img/cbplogo.png" alt="CBP Logo" width="80%"></td>
			<td width="70%"><h1 id="hAnimate" style="font-size:80px">NOW SERVING</h1></td>
		</tr>
	</table>
</header>
<section>
	<table width="100%" id="tblBody">
		<tr>
			<td width="40%">
				<table id="tblContent">
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">NEW ACCOUNTS</td>
						<td width="20%" align="center" id="pNewAcct" style="font-size:120px;font-weight:bold;">1</td>
					</tr>
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">TELLER 1</td>
						<td width="20%" align="center" id="pTeller" style="font-size:120px;font-weight:bold;">1</td>
					</tr>
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">TELLER 2</td>
						<td width="20%" align="center" id="pTeller2" style="font-size:120px;font-weight:bold;">1</td>
					</tr>
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">LOANS 1</td>
						<td width="20%" align="center" id="pLoans" style="font-size:120px;font-weight:bold;">1</td>
					</tr>
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">LOANS 2</td>
						<td width="20%" align="center" id="pLoans2" style="font-size:120px;font-weight:bold;">1</td>
					</tr>
				</table>
			</td>
			<td width="60%" align="center">
				<video id="cbpVideo" width="97%" controls loop autoplay="true" muted="muted">
					<source src="video/cbpads_exe.mp4" type="video/mp4">
					Your browser does not support the video.
				</video>
			</td>
		</tr>
	</table>
</section>
<footer>
	<table width="100%" id="tblFtr">
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<td width="50%">
				<p style="font-size:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><i>Your Cooperative Bank.</i><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Your Success.</i></b></p>
			</td>
			<td width="50%" align="center">
				<p style="font-size:30px;" class="fadingFooter">&nbsp;&nbsp;<b id="bText"><i>Main Branch - 0917-674-9746</i></b></p>
			</td>
		</tr>
	</table>
</footer>
<script>
var myVideo = document.getElementById("cbpVideo"); 

x = document.getElementById("myAudio");       //New Accts
y1 = document.getElementById("myAudio_y1");   //Teller1
y2 = document.getElementById("myAudio_y2");   //Teller2
z1 = document.getElementById("myAudio_z1");   //Loans1
z2 = document.getElementById("myAudio_z2");   //Loans2

num = 0;      //Teller 1
num2 = 0;     //Teller 2
num3 = 0;     //New Accts
loans = 0;    //Loans
loans2 = 0;   //Loans2

nNum = 0;
nNum2 = 0;

nLoans = 0;
nLoans2 = 0;

function getNums() {
	nNum = parseInt($("#pTeller").text());
	nNum2 = parseInt($("#pTeller2").text());
}

function getLoans() {
	nLoans = parseInt($("#pLoans").text());
	nLoans2 = parseInt($("#pLoans2").text());
}

function playNewAcct() {
	x.play();

	num3 = parseInt($("#pNewAcct").text());

	if (num3 == 10) {
		num3 = 1;
	} else {
		num3 = num3 + 1;
	}

	$("#pNewAcct").text(num3);
	$("#pNewAcct").addClass("pressBlink");
	setTimeout(removeBlink,2500);
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
	y1.play();
	//num += 1;
	getNums();

	if ((nNum == nNum2) || (nNum > nNum2)) {
		num = nNum + 1;
	} else {
		num2 = nNum2 + 1;
		num = num2;
	}

	if (nNum == 50) {
		num = 1;
	}

	console.log("num = "+num);
	console.log("num2 = "+num2);

	$("#pTeller").text(num);
	$("#pTeller").addClass("pressBlink_Tel1");
	setTimeout(removeBlink2,2500);
}

function backTeller() {
	getNums();
	
	if (parseInt($("#pTeller").text()) != 1) {
		num = nNum - 1;
		$("#pTeller").text(num);
	}
}

function playTeller2() {
	y2.play();
	//num += 1;
	getNums();

	if ((nNum2 == nNum) || (nNum2 > nNum)){
		num2 = nNum2 + 1;
	} else {
		num = nNum + 1;
		num2 = num;
	}

	if (nNum2 == 50) {
		num2 = 1;
	}

	console.log("num = "+num);
	console.log("num2 = "+num2);

	$("#pTeller2").text(num2);
	$("#pTeller2").addClass("pressBlink_Tel2");
	setTimeout(removeBlink3,2500);
}

function backTeller2() {
	getNums();
	
	if (parseInt($("#pTeller2").text()) != 1) {
		num2 = nNum2 - 1;
		$("#pTeller2").text(num2);
	}
}

function playLoans() {
	z1.play();
	getLoans();

	if ((nLoans == nLoans2) || (nLoans > nLoans2)){
		loans = nLoans + 1;
	} else {
		loans2 = nLoans2 + 1;
		loans = loans2;
	}

	if (nLoans == 10) {
		loans = 1;
	}

	console.log("loans = "+loans);
	console.log("loans2 = "+loans2);

	$("#pLoans").text(loans);
	$("#pLoans").addClass("pressBlink_Loan1");
	setTimeout(removeBlink4,2500);
}

function backLoans() {
	getLoans();
	
	if (parseInt($("#pLoans").text()) != 1) {
		loans = nLoans - 1;
		$("#pLoans").text(loans);
	}
}

function playLoans2() {
	z2.play();
	getLoans();

	if ((nLoans2 == nLoans) || (nLoans2 > nLoans)){
		loans2 = nLoans2 + 1;
	} else {
		loans = nLoans + 1;
		loans2 = loans;
	}

	if (nLoans2 == 10) {
		loans2 = 1;
	}

	console.log("loans = "+loans);
	console.log("loans2 = "+loans2);

	$("#pLoans2").text(loans2);
	$("#pLoans2").addClass("pressBlink_Loan2");
	setTimeout(removeBlink5,2500);
}

function backLoans2() {
	getLoans();
	
	if (parseInt($("#pLoans2").text()) != 1) {
		loans2 = nLoans2 - 1;
		$("#pLoans2").text(loans2);
	}
}

function repeatNewAcct() {
	x.play();
	$("#pNewAcct").addClass("pressBlink");
	setTimeout(removeBlink,2500);
}

function repeatTeller1() {
	y1.play();
	$("#pTeller").addClass("pressBlink_Tel1");
	setTimeout(removeBlink2,2500);
}

function repeatTeller2() {
	y2.play();
	$("#pTeller2").addClass("pressBlink_Tel2");
	setTimeout(removeBlink3,2500);
}

function repeatLoans1() {
	z1.play();
	$("#pLoans").addClass("pressBlink_Loan1");
	setTimeout(removeBlink4,2500);
}

function repeatLoans2() {
	z2.play();
	$("#pLoans2").addClass("pressBlink_Loan2");
	setTimeout(removeBlink5,2500);
}

function playVideo() {
	myVideo.play();
}

function removeBlink() {
	$("#pNewAcct").removeClass("pressBlink");
}

function removeBlink2() {
	$("#pTeller").removeClass("pressBlink_Tel1");
}

function removeBlink3() {
	$("#pTeller2").removeClass("pressBlink_Tel2");
}

function removeBlink4() {
	$("#pLoans").removeClass("pressBlink_Loan1");
}

function removeBlink5() {
	$("#pLoans2").removeClass("pressBlink_Loan2");
}

</script>

</body>
</html>