<!DOCTYPE html>	
<html lang="en">
<head>
	<title>Subscribe</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body>
<?php
	 $firstname=$lastname=$secondlastname=$username=$password=$email="";
	 $firstnameErr=$lastnameErr=$secondlastnameErr=$usernameErr=$passwordErr=$emailErr="";
	 if($_SERVER["REQUEST_METHOD"]=="POST")
	 	{

	 		if (empty($_POST["firstname"])) 
	 		{
    			$firstnameErr = "Name is required";
  			} 
  			else 
  			{
  				if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) 
  				{
  				$firstnameErr = "Only letters and white space allowed"; 
  				}
  				else
  				{
    			$firstname = test_input($_POST["firstname"]);
    			}
 			}

  			if (empty($_POST["email"])) 
  			{
    			$emailErr = "Email is required";
 			} 
 			else 
 			{
 				$email = test_input($_POST["email"]);
 				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
 				{
  				$emailErr = "Invalid email format"; 
				}
				 			
  			}
  			if (empty($_POST["lastname"])) 
  			{
    			$lastnameErr = "Lastname is required";
 			} 
 			else 
 			{
 				if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) 
  				{
  				$lastnameErr = "Only letters and white space allowed"; 
  				}
  				else
  				{
    			$lastname= test_input($_POST["lastname"]);
    			}
    		
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

 
  	$secondlastname = test_input($_POST["secondLastname"]);
  	connectToDb($firstname,$lastname,$secondlastname,$email,$password,$username);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function connectToDb($firstname,$lastname,$secondlastname,$email,$password,$username)
{
	$server = "tcp:cszcc1h0ac.database.windows.net,1433";
	$user = "kindergame";
	$pwd = "baconPancakes#12345";
	$db = "lodDeCuentas_db";
	
	try{
	echo "trying...";
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    echo "connected";
    $sql ="INSERT INTO users (firstName, lastName, secondLastName, email, password, username) VALUES 
  		('$firstname', '$lastname', '$secondlastname', '$email', '$password', '$username')";
  		$conn->exec($sql);
  		echo "New record created successfully";
    
    }
	catch(Exception $e)
	{
    die(print_r($e));
	}

}
?>

	

	<h2 id="bodyh2">Sign Up</h2>
	<section>
		<form id = "userForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		
		First Name:
		<br><input type="text" name="firstname" placeholder="firstname" value="<?php echo $firstname;?>" autofocus ="autofocus"><span class="error">* <?php echo $firstnameErr;?></span><br><hr>
		Lastname:
		<br><input type="text" name="lastname" placeholder="lastname" value="<?php echo $lastname;?>"><span class="error">* <?php echo $lastnameErr;?></span><br><hr>
		Second Lastname:
		<br><input type="text" name="secondLastname" placeholder="secondlastname" value="<?php echo $secondlastname;?>"><br><hr>
		Username:
		<br><input type="text" name="username" placeholder="username" value="<?php echo $username;?>"><span class="error">* <?php echo $usernameErr;?></span><br><hr>
		Password:
		<br><input type="password" name="password" placeholder="password" value="<?php echo $password;?>"><span class="error">* <?php echo $passwordErr;?></span><br><hr>
		
		email:
		<br><input type="text" name="email" placeholder="email" value="<?php echo $email;?>" ><span class="error">* <?php echo $emailErr;?></span><br><hr>

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
echo "<br>";
echo $email;

?>
<script type="text/javascript" src = "signup.js"></script>
</body>
</html>
