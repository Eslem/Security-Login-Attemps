<?php    
	require "checkUser.php";
	session_start();

	if(isset($_POST['submit'])){
		$nombre=$_POST['user'];
		$pass=$_POST['pass'];
		log($nombre, $pass);
	}

	echo time();
	$menos=time()-(60*30*24);
	echo "<br>".$menos;

	$ip=$_SERVER['REMOTE_ADDR'];
	echo "<br>".$ip; 

?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Lang" content="en">
		<meta name="author" content="">
		<meta http-equiv="Reply-to" content="@.com">
		<meta name="generator" content="PhpED 6.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="creation-date" content="06/01/2011">
		<meta name="revisit-after" content="15 days">
		<title>Login</title>
		<link rel="stylesheet"  href="js/bootstrap/css/bootstrap.min.css">
		<style>
			body{
				padding-top:50px;
				background-color: #eee;
			}

			.form{
				width: 350px;
				margin-right:auto;
				margin-left:auto;
				background-color: #fff;
				padding:10px;
				text-align:center;
				border-width: 1px;
				border-style: solid;
				border-color:#ddd;
				box-shadow: 5px 5px 20px #888888;
				border-radius: 5px;
			}

			#error{
				display:none;
			}
		</style>
		<script src="js/jquery.min.js"></script>
	</head>
	<body>

		<div class="form container">
			<form method="POST" action="#">
				<h3>Login</h3>
				<input id="user" type="text" name="user" placeholder="name" required="">
				<input type="password" name="pass" placeholder="password" required>
				<p id="error" style="color:red"></p>

				<input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="log in" >
			</form>
		</div>

	</body>
	<script type="text/javascript">
		function getSession(){
			var session="<?php mostrarErrorJS() ?>";
			if(session != ""){
				$("#error").fadeIn();
				$("#error").text(session);
				if(session != "Usuario o contraseña incorrectos"){
					var user="<?php mostrarUserJS() ?>";
					if(user != ""){
						$("#user").keyup(function(){
							if(user == $("#user").val()){
								$("#submit").attr("disabled", "disabled");
							}
							else{
							   $("#submit").removeAttr( "disabled" )
							}
						});
					}
					if(session=="ipBlock"){
						$("#error").text("Ha sobrepasado el numero de intentos con ese ordenador");
					 	$("#submit").attr("disabled", "disabled");
					}
				}
				setTimeout(function(){$("#error").slideUp();},5000);
			}
		}

		$(document).ready(getSession());

	</script>

</html>