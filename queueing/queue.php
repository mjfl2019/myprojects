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
    animation:pressedBlinking 1.2s infinite;
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

.marquee {
  width: 1400px;
  margin: 0 auto;
  overflow: hidden;
  white-space: nowrap;
}

.marquee span {
  display: inline-block;
  position: relative;
  left: 100%;
  animation: marquee 100s linear infinite;
}

.marquee span:nth-child(1) {
  animation-delay: 0s;
}
.marquee span:nth-child(2) {
  animation-delay: 0.3s;
}
.marquee span:nth-child(3) {
  animation-delay: 0.6s;
}
.marquee span:nth-child(4) {
  animation-delay: 0.9s;
}
.marquee span:nth-child(5) {
  animation-delay: 1.3s;
}
.marquee span:nth-child(6) {
  animation-delay: 1.7s;
}
.marquee span:nth-child(7) {
  animation-delay: 2.1s;
}
.marquee span:nth-child(8) {
  animation-delay: 2.5s;
}
.marquee span:nth-child(9) {
  animation-delay: 2.9s;
}
.marquee span:nth-child(10) {
  animation-delay: 3.3s;
}
.marquee span:nth-child(11) {
  animation-delay: 3.7s;
}

@keyframes marquee {
  0%   { left: 100%; }
  100% { left: -1165%; }
}

@keyframes hAnimate {
  0%  {left:100px; top:0px;}
  50%  {left:750px; top:0px;}
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

v0="<b id='bText'><i>Main Branch - 0917-674-9746</i></b>";
v1="<b id='bText'><i>Aborlan Branch-Lite - 0917-627-2552</i></b>";
v2="<b id='bText'><i>Narra Branch - 0917-629-8846</i></b>";
v3="<b id='bText'><i>Espa&ntilde;ola Branch-Lite - 0917-627-2552</i></b>";
v4="<b id='bText'><i>Brooke's Pt. Branch - 0917-594-8003</i></b>";
v5="<b id='bText'><i>Bataraza Branch-Lite - 0917-624-6162</i></b>";
v6="<b id='bText'><i>El Nido Branch - 0977-853-3002</i></b>";


var v = new Array(v0,v1,v2,v3,v4,v5,v6);
// var myNewAcct;
// var myTel1;
// var myTel2;
// var myLoans1;
// var myLoans2;

// localStorage.setItem("gNewAccts",1);
// localStorage.setItem("gTeller1",1);
// localStorage.setItem("gTeller2",1);
// localStorage.setItem("gLoans1",1);
// localStorage.setItem("gLoans2",1);

// localStorage.setItem("isPressed_NewAccts",0);
// localStorage.setItem("isPressed_Teller1",0);
// localStorage.setItem("isPressed_Teller2",0);
// localStorage.setItem("isPressed_Loans1",0);
// localStorage.setItem("isPressed_Loans2",0);

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
	//setInterval(changeFooter,7000);

	myNewAcct = setInterval(contQueueNewAcct,200);
	myTel1 = setInterval(contQueueTel1,200);
	myTel2 = setInterval(contQueueTel2,200);
	myLoans1 = setInterval(contQueueLoans1,200);
	myLoans2 = setInterval(contQueueLoans2,200);

	$("#cbpIMG").click(function(){
		var txt;
		var r = confirm("DO YOU WANT TO RESET QUEUING?");
		if (r == true) {
			resetQueue();
		}
	});
});

/*function contQueueNewAcct() {
	console.log("NewAccts = "+localStorage.getItem("gNewAccts"));
	$("#pNewAccts").text(localStorage.getItem("gNewAccts"));
	if (localStorage.getItem("isPressed_NewAccts") == 1) {
		clearInterval(myNewAcct);
		n.play();		
		$("#pNewAccts").addClass("pressBlink");
		setTimeout(removeBlink,2500);
	}
}
*/

function resetQueue() {
	$.ajax({
			type: 'POST',
			url: 'reset_queue.php',
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				alert("QUEUING RESET SUCCESSFULLY!");
			},
			error: function (jqXHR, exception) {
					var msg = '';
					console.log("Fetching data error!");
					$('.modaloader').hide();
					if (jqXHR.status === 0) {
						msg = 'Not connected.\n Verify the network first.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
						this.tryCount++;//                         ]
			            if (this.tryCount <= this.retryLimit) {//  ]
			                //try again                            ]
			                $.ajax(this);//                        ]--> This whole statement handles the retry function
			                return;//                              ]    if the connection was cut.
			            }//                                        ]
			            return;//                                  ]
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					console.log(msg);
				}
          });
}

function contQueueNewAcct() {
	$.ajax({
			type: 'POST',
			url: 'cont_queuing.php',
			data: { queue_id:1},
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				var pData = JSON.parse(d);
				//console.log("Queuer = " + pData.queuer +".");
				//var pData = JSON.parse(d);
				//console.log("Data is " + sData.queuer);
				//$.each(d, function(i,v) {
					//var nVal = JSON.stringify(v);
					//console.log("Data is " + v + ".");
					//$("#pNewAcct").text(v);
				//});

				$("#pNewAccts").text(pData.q_no);

				if (pData.q_class == "pressBlink") {
					n.play();
					clearInterval(myNewAcct);
					$("#pNewAccts").addClass(pData.q_class);
					setTimeout(removeBlink,2500);
				}
			},
			error: function (jqXHR, exception) {
					var msg = '';
					console.log("Fetching data error!");
					$('.modaloader').hide();
					if (jqXHR.status === 0) {
						msg = 'Not connected.\n Verify the network first.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
						this.tryCount++;//                         ]
			            if (this.tryCount <= this.retryLimit) {//  ]
			                //try again                            ]
			                $.ajax(this);//                        ]--> This whole statement handles the retry function
			                return;//                              ]    if the connection was cut.
			            }//                                        ]
			            return;//                                  ]
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					console.log(msg);
				}
          });
}

function contQueueTel1() {
	$.ajax({
			type: 'POST',
			url: 'cont_queuing.php',
			data: { queue_id:2},
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				var pData = JSON.parse(d);

				$("#pTeller").text(pData.q_no);

				if (pData.q_class == "pressBlink") {
					t1.play();
					clearInterval(myTel1);
					$("#pTeller").addClass(pData.q_class);
					setTimeout(removeBlink2,2500);
				}
			},
			error: function (jqXHR, exception) {
					var msg = '';
					console.log("Fetching data error!");
					$('.modaloader').hide();
					if (jqXHR.status === 0) {
						msg = 'Not connected.\n Verify the network first.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
						this.tryCount++;//                         ]
			            if (this.tryCount <= this.retryLimit) {//  ]
			                //try again                            ]
			                $.ajax(this);//                        ]--> This whole statement handles the retry function
			                return;//                              ]    if the connection was cut.
			            }//                                        ]
			            return;//                                  ]
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					console.log(msg);
				}
          });
}

function contQueueTel2() {
	$.ajax({
			type: 'POST',
			url: 'cont_queuing.php',
			data: { queue_id:3},
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				var pData = JSON.parse(d);

				$("#pTeller2").text(pData.q_no);

				if (pData.q_class == "pressBlink") {
					t2.play();
					clearInterval(myTel2);
					$("#pTeller2").addClass(pData.q_class);
					setTimeout(removeBlink3,2500);
				}
			},
			error: function (jqXHR, exception) {
					var msg = '';
					console.log("Fetching data error!");
					$('.modaloader').hide();
					if (jqXHR.status === 0) {
						msg = 'Not connected.\n Verify the network first.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
						this.tryCount++;//                         ]
			            if (this.tryCount <= this.retryLimit) {//  ]
			                //try again                            ]
			                $.ajax(this);//                        ]--> This whole statement handles the retry function
			                return;//                              ]    if the connection was cut.
			            }//                                        ]
			            return;//                                  ]
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					console.log(msg);
				}
          });
}

function contQueueLoans1() {
	$.ajax({
			type: 'POST',
			url: 'cont_queuing.php',
			data: { queue_id:4},
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				var pData = JSON.parse(d);

				$("#pLoans").text(pData.q_no);

				if (pData.q_class == "pressBlink") {
					l1.play();
					clearInterval(myLoans1);
					$("#pLoans").addClass(pData.q_class);
					setTimeout(removeBlink4,2500);
				}
			},
			error: function (jqXHR, exception) {
					var msg = '';
					console.log("Fetching data error!");
					$('.modaloader').hide();
					if (jqXHR.status === 0) {
						msg = 'Not connected.\n Verify the network first.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
						this.tryCount++;//                         ]
			            if (this.tryCount <= this.retryLimit) {//  ]
			                //try again                            ]
			                $.ajax(this);//                        ]--> This whole statement handles the retry function
			                return;//                              ]    if the connection was cut.
			            }//                                        ]
			            return;//                                  ]
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					console.log(msg);
				}
          });
}

function contQueueLoans2() {
	$.ajax({
			type: 'POST',
			url: 'cont_queuing.php',
			data: { queue_id:5},
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				var pData = JSON.parse(d);

				$("#pLoans2").text(pData.q_no);

				if (pData.q_class == "pressBlink") {
					l2.play();
					clearInterval(myLoans2);
					$("#pLoans2").addClass(pData.q_class);
					setTimeout(removeBlink5,2500);
				}
			},
			error: function (jqXHR, exception) {
					var msg = '';
					console.log("Fetching data error!");
					$('.modaloader').hide();
					if (jqXHR.status === 0) {
						msg = 'Not connected.\n Verify the network first.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {
						msg = 'Requested JSON parse failed.';
					} else if (exception === 'timeout') {
						msg = 'Time out error.';
						this.tryCount++;//                         ]
			            if (this.tryCount <= this.retryLimit) {//  ]
			                //try again                            ]
			                $.ajax(this);//                        ]--> This whole statement handles the retry function
			                return;//                              ]    if the connection was cut.
			            }//                                        ]
			            return;//                                  ]
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					console.log(msg);
				}
          });
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
	    	
	    break;
		
		case 107: // num +
	    	
	    break;

	    case 109: // num -
	    	
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
						<td width="20%" align="center" id="pNewAccts" style="font-size:120px;font-weight:bold;"></td>
					</tr>
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">TELLER 1</td>
						<td width="20%" align="center" id="pTeller" style="font-size:120px;font-weight:bold;"></td>
					</tr>
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">TELLER 2</td>
						<td width="20%" align="center" id="pTeller2" style="font-size:120px;font-weight:bold;"></td>
					</tr>
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">LOANS 1</td>
						<td width="20%" align="center" id="pLoans" style="font-size:120px;font-weight:bold;"></td>
					</tr>
					<tr>
						<td width="80%" align="center" style="font-size:60px;font-weight:bold;">LOANS 2</td>
						<td width="20%" align="center" id="pLoans2" style="font-size:120px;font-weight:bold;"></td>
					</tr>
				</table>
			</td>
			<td width="60%" align="center">
				<video id="cbpVideo" width="97%" controls loop autoplay="true" muted="muted">
					<source src="video/exe_cbpads.mp4" type="video/mp4">
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
			<td width="40%" align="center">
				<p style="font-size:40px;">&nbsp;&nbsp;<b><i>Your Cooperative Bank.</i><br>&nbsp;&nbsp;<i>Your Success.</i></b></p>
			</td>
			<td width="60%" align="center" style="vertical-align:center;">
				<!--<marquee width="auto" direction="left" scrollamount="30" scrolldelay="40">
					<p style="font-size:40px;font-weight:bold;" id="pText"><img src="img/cbp_logo.png" width="38px"> Welcome to the Cooperative Bank of Palawan (CBP), regulated by the &nbsp; <img src="img/bsp_logo.png" width="33px"> Bangko Sentral ng Pilipinas (BSP) with Customer Assistance Hotline <img src="img/cp_ico.jpg" width="35px">(02) 8708-7087 and &nbsp; <img src="img/cda_logo.png" width="33px"> Cooperative Development Authority (CDA) with Customer Care Hotline <img src="img/cp_ico.jpg" width="35px">(02) 8725-3764. &nbsp; <img src="img/cbp_logo.png" width="38px"> Tuloy po kayo sa ating Bangko. Dayon Camo sa ateng Bangko. Para sa mga iba pang katanungan, narito ang mga numero ng aming mga opisinang lagi kayong handang paglingkuran. &nbsp; <img src="img/cbp_logo.png" width="38px"> Main Branch - <img src="img/cp_ico.jpg" width="35px">(0917) 674-9746. &nbsp; <img src="img/cbp_logo.png" width="38px"> Aborlan Branch-Lite - <img src="img/cp_ico.jpg" width="35px">(0917) 627-2552. &nbsp; <img src="img/cbp_logo.png" width="38px"> Narra Branch - <img src="img/cp_ico.jpg" width="35px">(0917) 629-8846. &nbsp; <img src="img/cbp_logo.png" width="38px"> Espa&ntilde;ola Branch-Lite - <img src="img/cp_ico.jpg" width="35px">(0917) 625-2719. &nbsp; <img src="img/cbp_logo.png" width="38px"> Brooke's Point Branch - <img src="img/cp_ico.jpg" width="35px">(0917) 594-8003. &nbsp; <img src="img/cbp_logo.png" width="38px"> Bataraza Branch-Lite - (0917) 624-6162. &nbsp; <img src="img/cbp_logo.png" width="38px"> El Nido Branch - <img src="img/cp_ico.jpg" width="35px">(0977) 853-3002. &nbsp; <img src="img/cbp_logo.png" width="38px"> Thank you for your continued patronage. Maraming salamat po sa inyong lahat. Matamang salamat canindong tanan.</p>
				</marquee>-->
				<p style="font-size:40px;font-weight:bold;" id="pText" class="marquee">
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Welcome to the Cooperative Bank of Palawan (CBP), regulated by the &nbsp;<img src="img/bsp_logo.png" width="33px"> Bangko Sentral ng Pilipinas (BSP) with Customer Assistance Hotline <img src="img/tel_ico.png" width="37px">(02) 8708-7087 and &nbsp;&nbsp;&nbsp; <img src="img/cda_logo.png" width="33px"> Cooperative Development Authority (CDA) with Customer Care Hotline <img src="img/tel_ico.png" width="37px">(02) 8725-3764.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Tuloy po kayo sa ating Bangko.&nbsp;&nbsp;&nbsp;Dayon Camo sa ateng Bangko.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Para sa mga iba pang katanungan, narito ang mga numero ng aming mga opisinang lagi kayong handang paglingkuran.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Main Branch - <img src="img/cp_ico.jpg" width="35px">(0917) 674-9746.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Aborlan Branch-Lite - <img src="img/cp_ico.jpg" width="35px">(0917) 627-2552.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Narra Branch - <img src="img/cp_ico.jpg" width="35px">(0917) 629-8846.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Espa&ntilde;ola Branch-Lite - <img src="img/cp_ico.jpg" width="35px">(0917) 625-2719.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Brooke's Point Branch - <img src="img/cp_ico.jpg" width="35px">(0917) 594-8003.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Bataraza Branch-Lite - <img src="img/cp_ico.jpg" width="35px">(0917) 624-6162.
					</span>
					<span>
						 <img src="img/cbp_logo.png" width="38px"> El Nido Branch - <img src="img/cp_ico.jpg" width="35px">(0977) 853-3002.
					</span>					
					<span>
						 <img src="img/cbp_logo.png" width="38px"> Thank you for your continued patronage.&nbsp;&nbsp;&nbsp;Maraming salamat po sa inyong lahat.&nbsp;&nbsp;&nbsp;Matamang salamat canindong tanan.
					</span>
				</p>
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

var myVideo; 
var n;
var t1;
var t2;
var l1;
var l2;

myVideo = document.getElementById("cbpVideo"); 

n = document.getElementById("myAudio");       //New Accts
t1 = document.getElementById("myAudio_y1");   //Teller1
t2 = document.getElementById("myAudio_y2");   //Teller2
l1 = document.getElementById("myAudio_z1");   //Loans1
l2 = document.getElementById("myAudio_z2");   //Loans2

function repeatNewAcct() {
	n.play();
	$("#pNewAccts").addClass("pressBlink");
	setTimeout(removeBlink,2500);
}

function repeatTeller1() {
	t1.play();
	$("#pTeller").addClass("pressBlink_Tel1");
	setTimeout(removeBlink2,2500);
}

function repeatTeller2() {
	t2.play();
	$("#pTeller2").addClass("pressBlink_Tel2");
	setTimeout(removeBlink3,2500);
}

function repeatLoans1() {
	l1.play();
	$("#pLoans").addClass("pressBlink_Loan1");
	setTimeout(removeBlink4,2500);
}

function repeatLoans2() {
	l2.play();
	$("#pLoans2").addClass("pressBlink_Loan2");
	setTimeout(removeBlink5,2500);
}

function playVideo() {
	myVideo.play();
}

function removeBlink() {
	$("#pNewAccts").removeClass("pressBlink");
	myNewAcct = setInterval(contQueueNewAcct,200);
	//localStorage.setItem("isPressed_NewAccts",0);
}

function removeBlink2() {
	$("#pTeller").removeClass("pressBlink");
	myTel1 = setInterval(contQueueTel1,200);
	//localStorage.setItem("isPressed_Teller1",0);
}

function removeBlink3() {
	$("#pTeller2").removeClass("pressBlink");
	myTel2 = setInterval(contQueueTel2,200);
	//localStorage.setItem("isPressed_Teller2",0);
}

function removeBlink4() {
	$("#pLoans").removeClass("pressBlink");
	myLoans1 = setInterval(contQueueLoans1,200);
	//localStorage.setItem("isPressed_Loans1",0);
}

function removeBlink5() {
	$("#pLoans2").removeClass("pressBlink");
	myLoans2 = setInterval(contQueueLoans2,200);
	//localStorage.setItem("isPressed_Loans2",0);
}

/*function playNewAcct() {
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
}*/

</script>

</body>
</html>