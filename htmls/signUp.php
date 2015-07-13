<!DOCTYPE html>	
<html lang="en">
<head>
	<title>Subscribe</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body>
<?php
	 $firstname=$lastname=$secondlastname=$username=$password=$email=" ";
	 $firstnameErr=$lastnameErr=$secondlastnameErr=$usernameErr=$passwordErr=$emailErr=" ";
	 if($_SERVER["REQUEST_METHOD"]=="POST")
	 	{

	 		if (empty($_POST["firstname"])) 
	 		{
    			$firstnameErr = "Name is required";
  			} 
  			else 
  			{
    			$firstname = test_input($_POST["firstname"]);
 			}

  			if (empty($_POST["email"])) 
  			{
    			$emailErr = "Email is required";
 			} 
 			else 
 			{
    		$email = test_input($_POST["email"]);
  			}
  			if (empty($_POST["lastname"])) 
  			{
    			$lastnameErr = "Lastname is required";
 			} 
 			else 
 			{
    		$lastname = test_input($_POST["lastname"]);
  			}
  			if (empty($_POST["password"])) 
  			{
    			$passwordErr = "Password is required";
 			} 
 			else 
 			{
    		$password = test_input($_POST["password"]);
  			}
  			if (empty($_POST["username"])) 
  			{
    			$usernameErr = "username is Required";
 			} 
 			else 
 			{
    		$username = test_input($_POST["username"]);
  			}

 
  		$secondlastname = test_input($_POST["secondlastname"]);
  		
  		
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
		<form id = "userForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		
		First Name:
		<br><input type="text" name="firstname" placeholder="firstname" autofocus ="autofocus"><span class="error">* <?php echo $firstnameErr;?></span><br><hr>
		Lastname:
		<br><input type="text" name="lastname" placeholder="lastname"><span class="error">* <?php echo $lastnameErr;?></span><br><hr>
		Second Lastname:
		<br><input type="text" name="secondLastname" placeholder="secondlastname" onchange="getUser()"><br><hr>
		Username:
		<br><input type="text" name="username" placeholder="username" ><span class="error">* <?php echo $usernameErr;?></span><br><hr>
		Password:
		<br><input type="password" name="password" placeholder="password"><span class="error">* <?php echo $passwordErr;?></span><br><hr>
		
		email:
		<br><input type="text" name="email" placeholder="email" ><span class="error">* <?php echo $emailErr;?></span><br><hr>

		<input id="submit" type="submit" name="submit" value="create account">


		</form>


	</section>

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
<script type="text/javascript" src = "signup.js"></script>
</body>
</html>
