<?php

session_start();
$error='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($_POST['username'])||empty($_POST['password']))
	{
		$error="Username or password is invalid";
		echo "$error";

	}
	else
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		connectTodb();
	}
}

function connectTodb()
{
	
$server = "tcp:cszcc1h0ac.database.windows.net,1433";
$user = "kindergame";
$pwd = "baconPancakes#12345";
$db = "lodDeCuentas_db";
global $username;
global $password;

echo "$username + user + $password";
try{
	
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql ="SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$conn->exec($sql);
  	$result = $conn->query($sql);
  	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
    
	}
catch(Exception $e)
	{
    die(print_r($e));
	}



}
?>