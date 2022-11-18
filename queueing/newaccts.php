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

.pressBlink{
    animation:pressedBlinking 1.2s infinite;
}

@keyframes pressedBlinking{
    0%{color:#ff1919;font-weight:bold;}
    49%{color:#ff1919;font-weight:bold;}
    60%{color:transparent;}
    99%{color:transparent;}
    100%{color: #ff1919;font-weight:bold;}
}

</style>
<script>
var vMode;
//var vNewAccts;

$(function() {
	// vNewAccts = localStorage.getItem("gNewAccts");

	// $("#newAccts").text(vNewAccts);

	// console.log("NewAccts = "+localStorage.getItem("gNewAccts"));

	getDataNewAcct();

	$('#btnInc').click(function(){
		vMode = "add";
		updateData();
		// var val = 0;
		// val = localStorage.getItem("gNewAccts");
		
		// if (val < 10) {
		// 	vNewAccts = parseFloat(val) + 1;
		// } else {
		// 	vNewAccts = 1;
		// }

		// localStorage.setItem("isPressed_NewAccts",1);
		// localStorage.setItem("gNewAccts",vNewAccts);
		// $("#newAccts").text(localStorage.getItem("gNewAccts"));
	});

	$('#btnDec').click(function(){
		vMode = "sub";
		updateData();
		// var val = 0;
		// val = localStorage.getItem("gNewAccts");

		// if (val != 1) {
		// 	vNewAccts = parseFloat(val) - 1;
		// } else {
		// 	vNewAccts = 1;
		// }

		// localStorage.setItem("gNewAccts",vNewAccts);
		// $("#newAccts").text(localStorage.getItem("gNewAccts"));
	});

	$('#btnRepeat').click(function(){
		vMode = "repeat";
		updateData();
		//localStorage.setItem("isPressed_NewAccts",1);
	});

});

$(document).keydown(function(e) {

	switch(e.which) {

		case 13: // enter
	    	$('#btnRepeat').click();
	    break;
		
		case 107: // num +
	    	$('#btnInc').click();
	    break;

	    case 109: // num -
	    	$('#btnDec').click();
	    break;

	    default: return;
	}
	e.preventDefault();
});

function removeBlink() {
	$("#newAccts").removeClass("pressBlink");
}

function getDataNewAcct() {
	$.ajax({
			type: 'POST',
			url: 'get_data.php',
			data: { queue_id:1},
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				var pData = JSON.parse(d);
				$("#newAccts").text(pData.q_no);
				$("#newAccts").addClass("pressBlink");
				setTimeout(removeBlink,2500);
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
					$("#newAccts").text(msg);
				}
          });
}

function updateData() {
	$.ajax({
			type: 'POST',
			url: 'newAcctsUpdateData.php',
			data: { mode: vMode},
			dataType: 'text',
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				//var pData = JSON.parse(d);
				//console.log("Queuer = " + pData.queuer +".");
				//var pData = JSON.parse(d);
				//console.log("Data is " + sData.queuer);

				console.log(d);
				if (vMode != "repeat") {
					$("#newAccts").text(d);
				}
				$("#newAccts").addClass("pressBlink");
				setTimeout(removeBlink,2500);
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
					$("newAccts").text(msg);
				}
          });
}

</script>
</head>
<body>
<table width="100%" id="tblHdr">
	<tr width="100%">
		<td align="center" width="50%"><img id="cbpIMG" src="img/cbplogo.png" alt="CBP Logo" width="80%"></td>
		<td width="50%"><h1 style="font-size:80px">NEW ACCOUNTS</h1></td>
	</tr>
</table>
<table width="100%" id="tblBody">
	<tr width="100%">
		<td width="40%" id="newAccts" align="right" style="font-size:400px;font-weight:bold;" >
		</td>
		<td width="60%" align="center">
			<button type="button" id="btnDec" title="Decrease" style="width:180px;font-size:150px;font-weight:bold;border-radius:7px;">-</button>
			<button type="button" id="btnInc" title="Increase" style="width:180px;font-size:150px;font-weight:bold;border-radius:7px;">+</button>
			<button type="button" id="btnRepeat" title="Repeat" style="width:180px;font-size:150px;font-weight:bold;border-radius:7px;">R</button>
		</td>
	</tr>
</table>
<script>

</script>
</body>
</html>