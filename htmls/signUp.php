<!DOCTYPE html>	
<html lang="en">
<head>
	<title>Subscribe</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body <!-- onload = "getUser()" --> >

	<h2 id="bodyh2">Sign Up</h2>
	<section>
		<form id = "userForm" action=" " method="post">
		
		First Name:
		<br><input type="text" name="firstname" placeholder="firstname" autofocus ="autofocus" onchange="getUser()" required><br><hr>
		Lastname:
		<br><input type="text" name="lastname" placeholder="lastname" onchange="getUser()" required ><br><hr>
		Second Lastname:
		<br><input type="text" name="secondLastname" placeholder="secondlastname" onchange="getUser()" required><br><hr>
		Username:
		<br><input type="text" name="username" placeholder="username" onchange="getUser()" required><br><hr>
		Password:
		<br><input type="password" name="password" placeholder="password" onchange="getUser()" required><br><hr>
		
		email:
		<br><input type="text" name="email" placeholder="email" onchange="getUser()" required><span id="incEmail">* Invalid Email</span><br><hr>

		<input id="submit" type="submit" name="submit" value="create account">


		</form>


	</section>
<script type="text/javascript" src = "signup.js"></script>

<?php

 echo $_POST["firstname"]; 
 echo $_POST["lastname"]; 

?>
</body>
</html>
