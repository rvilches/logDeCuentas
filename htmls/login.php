<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cuentas</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
<?php
$server = "tcp:cszcc1h0ac.database.windows.net,1433";
$user = "kindergame"@cszcc1h0ac;
$pwd = "baconPancakes#12345";
$db = "lodDeCuentas_db";

try{
	echo "trying...";
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo"connected";
}
catch(Exception $e){
    die(print_r($e));
}

?>
 <h1>Estado de cuentas - DEV<span id="signup"><a href="htmls/signup.html"><i>Sign Up</i></a></span></h1>
 
 <section>
 	<h3>Login:</h3>
 	<article>

 		<form>
 		<span class="formusername">Username:</span>
 		<br><input id="username" type="text" name="username" placeholder="username" ><br>
 		<span class="formpassword">Password:</span>
 		<br><input id="passwordinput" type="text" name="password" placeholder="password" ><br><br>
 		<a id="submit" value="login" href="htmls/home.html">Login</a>
 		<!-- <input type="submit" name="submit" value="Login" onclick="<a href=htmls/signup.html\">"><br> -->
 		
		</form>

 				

 	</article>
 </section>
 <script type="text/javascript" src="login.js"></script>
</body>
</html>