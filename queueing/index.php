<?php



?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CBP Queue Login</title>
<link rel="stylesheet" href="css/jquery-ui-1.12.1.css">
<script src="js/jquery-ui.1.12.1.js"></script>
<script src="js/jquery-3.6.1.min.js"></script>
<style>
	body {
		background-color: green;
	}

	input {
		border-radius: 7px 7px 7px 7px;
	}

	button {
		height: 27px;
		border-radius: 5px 5px 5px 5px;
	}

	.textlogin {
		width: 247px;
		height: 20px;
		text-align: center;
		font-size: 15px;
		font-family: Arial, Helvetica, sans-serif;
	}

	.tdlabel {
		white-space:nowrap;
		font-size:18px;
		color:white;
		font-family: Arial, Helvetica, sans-serif;
	}

	footer {
		width: 100%;
		position: fixed;
		text-align: center;
	}
</style>
<script>
$(function() {
	$('#uid').keypress(function (e) {
		var key = e.which;
		if(key == 13) {  // the enter key code
			login();
			return false;  
		}
	});

	$('#pw').keypress(function (e) {
		var key = e.which;
		if(key == 13) {  // the enter key code
			login();
			return false;  
		}
	}); 

	$('#btnLogin').click(function() {
		login();
	});
});

function login() {
	if ($('#uid').val().length == 0 && $('#pw').val().length == 0) {
		//$('#uid').effect("shake");
		//$('#pw').effect("shake");
		$('#uid').css('border-color','red');
		$('#pw').css('border-color','red');
		$('#uid').focus();
	} else if($('#uid').val().length == 0 || $('#uid').val() != "admin") {
		//$('#uid').effect("shake");
		$('#uid').css('border-color','red');
		$('#uid').focus();
	} else if ($('#pw').val().length == 0 || $('#pw').val() != "admin") {
		//$('#pw').effect("shake");
		$('#pw').css('border-color','red');
		$('#pw').focus();
	} else if ($('#uid').val() == "admin" && $('#pw').val() == "admin") {
		location.href = "http://localhost:8080/queuing/queue.php";
	}
}
	// $(function() {
	// 	$('#uid').focus();
	// 	//$('#btnLogin').attr('disabled',true);
	// 	$('#uid').css('border','inset 3px');
	// 	$('#pw').css('border','inset 3px');
	// 	$('#uid').keydown(function() {
	// 	// 	if($(this).val() != ""  && $('#pw').val() != "") {
	// 	// 		$('#btnLogin').attr('disabled',false);
	// 	// 	} else {
	// 	// 		$('#btnLogin').attr('disabled',true);
	// 	// 	}
	// 	// });
	// 	// $('#pw').keydown(function() {
	// 	// 	if($(this).val() != "" && $('#uid').val() != "") {
	// 	// 		$('#btnLogin').attr('disabled',false);
	// 	// 	} else {
	// 	// 		$('#btnLogin').attr('disabled',true);
	// 	// 	}
	// 	// });
	// 	// $('#btnLogin').click(function() {
	// 	// 	if($('#uid').val().length == 0) {
	// 	// 		$('#uid').effect("shake");
	// 	// 	} else if ($('#pw').val().length == 0) {
	// 	// 		$('#pw').effect("shake");
	// 	// 	}
	// 		$('#uid').css('border','inset 3px');
	// 		$('#pw').css('border','inset 3px');
	// 	});
	// 	$('#pw').keydown(function() {
	// 		$('#uid').css('border','inset 3px');
	// 		$('#pw').css('border','inset 3px');
	// 	});
	// });
</script>
</head>
<body>
<br><br>
<div align="center">
	<img src="img/cbplogo.png" alt="CBP Logo" width="50%">
</div>
<br><br><br>
<table id="tbl1" width="100%">
<tr>
	<td width="43%" class="tdlabel" align="right">Username:</td>
	<td width="57%" align="left"><input id="uid" class="textlogin" type="text" /></td>
</tr>
<tr>
	<td width="43%" class="tdlabel" align="right">Password:</td>
	<td width="57%" align="left"><input id="pw" class="textlogin"  type="password" /></td>
</tr>
</table>
<table width="100%">
	<tr>
	<td width="62%" style="white-space:nowrap;font-size:20px;color:white;" align="right">
		<button id="btnLogin">Login</button>
	</td>
	<td width="38%" align="left"></td>
	</tr>
</table>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<footer>
	<div style="font-size:12px;color:white;">
		Cooperative Bank of Palawan © 2020
	</div>
</footer>
</body>
</html>