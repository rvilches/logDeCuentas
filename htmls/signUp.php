<!DOCTYPE html>	
<html lang="en">
<head>
	<title>Subscribe</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body>
<?php
	 $firstname=$lastname=$secondlastname=$username=$password=$email="";
	 if($_SERVER["_REQUEST METHOD"]=="POST")
	 	{
  		$firstname = test_input($_POST["firstname"]);
  		$lastname = test_input($_POST["lastname"]);
  		$email = test_input($_POST["email"]);
  		$secondlastname = test_input($_POST["secondlastname"]);
  		$password = test_input($_POST["password"]);
  		$username = test_input($_POST["username"]);
		}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

	

	<h2 id="bodyh2">Sign Up</h2>
	<section>
		<form id = "userForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		
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
echo "<h2>Your Input:</h2>";
echo $firstname;
echo "<br>";
echo $email;
echo "<br>";
echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $lastname;
?>

</body>
</html>
