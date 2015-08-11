<?php

include 'session.php';
if(isset($_SESSION['login_user']))
{
	header('Location: http://logdecuentas.azurewebsites.net/htmls/paymentslogs.php');
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	formPostController();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cuentas</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>

 <h1>Estado de cuentas<span id="signup"><a href="htmls/signUp.php"><i>Sign Up</i></a></span></h1>
 
 <section>
 	<h3>Login:</h3>
 	<article>

 		<form action="" method="post">
 		<input type="hidden" name="controller" value="loginController">
 		<span class="formusername">Username:</span>
 		<br><input id="username" type="text" name="username" placeholder="username" ><br>
 		<span class="formpassword">Password:</span>
 		<br><input id="passwordinput" type="password" name="password" placeholder="password" >
 		<p id ="loginErr" visibility="hidden">Invalid username/password</p><br><br>
 		<input type="submit" name="submit" value="Login"><br> 
 		
		</form>

 	</article>
 </section>
 <script type="text/javascript" src="login.js"></script>
</body>
</html>
