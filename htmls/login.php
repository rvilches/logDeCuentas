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
try{
	
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
  	try{
  	$stmt=$dbh->query($sql);
  	$result = $stmt->setFetchMode(PDO::FETCH_NUM);
  	echo "here";
  	while ($row = $stmt->fetch()) {
    echo "something + $row[0] + '\n'";
	}
	catch (PDOExeption $e)
	{
		echo "e + getMessage()";
	}
  }
    
	}
catch(Exception $e)
	{
    die(print_r($e));
	}



}
?>