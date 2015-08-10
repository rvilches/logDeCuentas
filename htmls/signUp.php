<!DOCTYPE html>	
<html lang="en">
<head>
	<title>Subscribe</title>
	<link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body>
<?php
include 'session.php';
$emailErr = "JUANN";
	 
	 if($_SERVER["REQUEST_METHOD"]=="POST")
	 	{
      formPostController();
    }


// function connectToDb($firstname,$lastname,$secondlastname,$email,$password,$username)
// {
// 	$server = "tcp:cszcc1h0ac.database.windows.net,1433";
// 	$user = "kindergame";
// 	$pwd = "baconPancakes#12345";
// 	$db = "lodDeCuentas_db";
	
// 	try{
	
//     $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd); 
//     $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     
//     $sql ="INSERT INTO users (firstName, lastName, secondLastName, email, password, username) VALUES 
//   		('$firstname', '$lastname', '$secondlastname', '$email', '$password', '$username')";
//   		$conn->exec($sql);
//   		echo "New record created successfully";
//   		header('Location: http://logdecuentas.azurewebsites.net');

    
//     }
// 	catch(Exception $e)
// 	{
//     die(print_r($e));
// 	}

// }
?>

	

	<h2 id="bodyh2">Sign Up</h2>
	<section>
		<form id = "userForm" method="post" action="" >
		<input type="hidden" id='controller' name="controller" value="signUpController">
		First Name:
		<br><input type="text" id="firstname" name="firstname" placeholder="firstname" value="<?php echo $firstname;?>" autofocus ="autofocus"><span class="error">* <?php echo $firstnameErr;?></span><br><hr>
		Lastname:
		<br><input type="text" name="lastname" placeholder="lastname" value="<?php echo $lastname;?>"><span class="error">* <?php echo $lastnameErr;?></span><br><hr>
		Second Lastname:
		<br><input type="text" name="secondLastname" placeholder="secondlastname" value="<?php echo $secondlastname;?>"><br><hr>
		Username:
		<br><input type="text" name="username" placeholder="username" value="<?php echo $username;?>"><span class="error">* <?php echo $usernameErr;?></span><br><hr>
		Password:
		<br><input type="password" name="password" placeholder="password" value="<?php echo $password;?>"><span class="error">* <?php echo $passwordErr;?></span><br><hr>
		email:
		<br><input type="text" name="email" placeholder="email" value="<?php echo $email;?>" ><span class="error"> <?php $emailErr;?></span><br><hr>

		<input id="submit" type="submit" name="submit" value="create account">


		</form>


	</section>

<script type="text/javascript" src = "signup.js"></script>
</body>
</html>
