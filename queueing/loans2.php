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

$(function() {

	getDataLoans2();

	$('#btnInc').click(function(){
		vMode = "add";
		updateData();
	});

	$('#btnDec').click(function(){
		vMode = "sub";
		updateData();
	});

	$('#btnRepeat').click(function(){
		vMode = "repeat";
		updateData();
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
	$("#loans2").removeClass("pressBlink");
}


function getDataLoans2() {
	$.ajax({
			type: 'POST',
			url: 'get_data.php',
			data: { queue_id:5},
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				var pData = JSON.parse(d);
				$("#loans2").text(pData.q_no);
				$("#loans2").addClass("pressBlink");
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
					$("#loans2").text(msg);
				}
          });
}

function updateData() {
	$.ajax({
			type: 'POST',
			url: 'loans2UpdateData.php',
			data: { mode: vMode},
			dataType: 'text',
			cache: false,
			tryCount : 0,
    		retryLimit : 3,
			success: function (d) {
				console.log(d);
				if (vMode != "repeat") {
					$("#loans2").text(d);
				}
				$("#loans2").addClass("pressBlink");
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
					$("#loans2").text(msg);
				}
          });
}

</script>
</head>
<body>
<table width="100%" id="tblHdr">
	<tr width="100%">
		<td align="center" width="50%"><img id="cbpIMG" src="img/cbplogo.png" alt="CBP Logo" width="80%"></td>
		<td width="50%"><h1 style="font-size:80px">LOANS 2</h1></td>
	</tr>
</table>
<table width="100%" id="tblBody">
	<tr width="100%">
		<td width="40%" id="loans2" align="right" style="font-size:400px;font-weight:bold;" >
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