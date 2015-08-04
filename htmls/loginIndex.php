<?php


if(isset($_SESSION['login_user']))
{
	header('Location: http://logdecuentas.azurewebsites.net/htmls/paymentslogs.php');
}
include 'session.php';
// session_start();
// $error='';
// if($_SERVER["REQUEST_METHOD"]=="POST")
// {
// 	if(empty($_POST['username'])||empty($_POST['password']))
// 	{
// 		$error="Username or password is invalid";
// 		echo "$error";

// 	}
// 	else
// 	{
// 		$username=$_POST['username'];
// 		$password=$_POST['password'];
// 		connectTodb();
// 	}
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cuentas</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>

 <h1>Estado de cuentas - DEV<span id="signup"><a href="htmls/signUp.php"><i>Sign Up</i></a></span></h1>
 
 <section>
 	<h3>Login:</h3>
 	<article>

 		<form action="session.php" method="post">
 		<input type="hidden" name="action" value="login">
 		<span class="formusername">Username:</span>
 		<br><input id="username" type="text" name="username" placeholder="username" ><br>
 		<span class="formpassword">Password:</span>
 		<br><input id="passwordinput" type="password" name="password" placeholder="password" ><br><br>
 		<input type="submit" name="submit" value="Login"><br> 
 		
		</form>

 				

 	</article>
 </section>
 <script type="text/javascript" src="login.js"></script>
</body>
</html>
