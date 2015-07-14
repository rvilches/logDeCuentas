<?php

session_start();
$error='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(empty($POST['username'])||empty($POST['password']))
	{
		$error="Username or password is invalid";
		
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

try{
	
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql ="SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$conn->exec($sql);
  	echo "gotemm";
    
	}
catch(Exception $e)
	{
    die(print_r($e));
	}



}
?>